<?php

namespace CanvasApiLibrary\Core\Models;
use CanvasApiLibrary\Core\Models\Generated\OutcomeResultRollupStubProperties;
use CanvasApiLibrary\Core\Models\IdentityTraits\DomainBoundIdTrait;
use CanvasApiLibrary\Core\Models\Utility\AbstractCanvasPopulatedModel;

class OutcomeResultRollupStub extends AbstractCanvasPopulatedModel{
    use DomainBoundIdTrait;
    use OutcomeResultRollupStubProperties;
    protected static array $properties = [
        [UserStub::class, "user"],
        [OutcomeStub::class, "learning_outcome"],
    ];
    protected static array $nullableProperties = [
    ];

    public static array $plurals = ["OutcomeResultRollupStubs"];
    protected function getClassName(): string{
        return $this::class;
    }
}
