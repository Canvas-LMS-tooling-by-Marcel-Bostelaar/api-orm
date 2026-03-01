<?php

namespace CanvasApiLibrary\Core\Providers;

use CanvasApiLibrary\Core\Models\CourseStub;
use CanvasApiLibrary\Core\Models\OutcomeResult;
use CanvasApiLibrary\Core\Models\OutcomeStub;
use CanvasApiLibrary\Core\Models\OutcomeResultRollup;
use CanvasApiLibrary\Core\Models\OutcomeResultRollupStub;
use CanvasApiLibrary\Core\Models\UserStub;
use CanvasApiLibrary\Core\Providers\Generated\Traits\OutcomeResultRollupProviderProperties;
use CanvasApiLibrary\Core\Providers\Interfaces\OutcomeResultRollupProviderInterface;
use CanvasApiLibrary\Core\Providers\Traits\OutcomeResultRollupWrapperTrait;
use CanvasApiLibrary\Core\Providers\Utility\AbstractProvider;
use CanvasApiLibrary\Core\Providers\Utility\ClientIDProvider;
use CanvasApiLibrary\Core\Providers\Utility\Lookup;
use CanvasApiLibrary\Core\Providers\Utility\ModelPopulator\ModelPopulationConfigBuilder;
use CanvasApiLibrary\Core\Services\CanvasCommunicator;
use CanvasApiLibrary\Core\Providers\Utility\Results\ErrorResult;
use CanvasApiLibrary\Core\Providers\Utility\Results\NotFoundResult;
use CanvasApiLibrary\Core\Providers\Utility\Results\SuccessResult;
use CanvasApiLibrary\Core\Providers\Utility\Results\UnauthorizedResult;

/**
 * Does not support individual outcome population, as that is incredibly ineffiecient and has little use case.
 * @implements OutcomeResultRollupProviderInterface<SuccessResult,ErrorResult,NotFoundResult,UnauthorizedResult>
 * @extends parent<OutcomeResultRollup>
 */
class OutcomeResultRollupProvider extends AbstractProvider implements OutcomeResultRollupProviderInterface{
    use OutcomeResultRollupProviderProperties;
    use OutcomeResultRollupWrapperTrait;

    public function __construct(
        CanvasCommunicator $canvasCommunicator,
        ClientIDProvider $clientIDProvider
    ) {
        parent::__construct( $canvasCommunicator,
        (new ModelPopulationConfigBuilder(OutcomeResultRollup::class))
        ->keyCopy("score")
        ->from("links")
            ->processAnyValue(fn($x) => (int)$x["outcome"])
            ->to("learning_outcome")
            ->asModel(OutcomeStub::class)
        ->from("links")
            ->processAnyValue(fn($x) => $x["submitted_at"])
            ->to("submitted_at")
            ->asDateTime()
        ,$clientIDProvider
        );
    }

    /**
     * Gets the total outcomes in a course. Can be filtered to specific users.
     * @param CourseStub $course
     * @param string $userId
     * @param bool $skipCache
     * @param bool $doNotCache
     * @return ErrorResult|NotFoundResult|SuccessResult<OutcomeResultRollup[]>|UnauthorizedResult
     */
    public function getOutcomeResultRollupsInCourse(CourseStub $course, string $userId, bool $skipCache = false, bool $doNotCache = false): ErrorResult|NotFoundResult|SuccessResult|UnauthorizedResult {
        $params = "";
        $params .= "user_ids[]=" . $userId;
        return $this->GetMany(
            "courses/{$course->id}/outcome_rollups" . (empty($params) ? "" : "?" . $params),
            $course->getContext(),
            $this->modelPopulator->staticFrom($userId)->to("user")->asModel(UserStub::class),
            fn($x) => $x["rollups"][0]["scores"]
        );
    }
}