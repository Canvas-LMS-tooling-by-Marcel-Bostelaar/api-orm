<?php
/* Automatically generated based on model properties.*/
namespace CanvasApiLibrary\Core\Models\Generated;

use CanvasApiLibrary\Core\Exceptions\NotPopulatedException;
use CanvasApiLibrary\Core\Exceptions\MixingDomainsException;
use CanvasApiLibrary\Core\Models\OutcomeResult;

trait OutcomeResultProperties{
    public \DateTime $submitted_or_assessed_at{
        get {
            return $this->submitted_or_assessed_at;
        }
        set(\DateTime $value) {
            $this->submitted_or_assessed_at = $value;
        }
    }

    public ?float $score{
        get {
            return $this->score;
        }
        set(?float $value) {
            $this->score = $value;
        }
    }

}