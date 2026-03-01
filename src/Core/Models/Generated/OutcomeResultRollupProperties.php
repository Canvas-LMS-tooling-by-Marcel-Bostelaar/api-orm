<?php
/* Automatically generated based on model properties.*/
namespace CanvasApiLibrary\Core\Models\Generated;

use CanvasApiLibrary\Core\Exceptions\NotPopulatedException;
use CanvasApiLibrary\Core\Exceptions\MixingDomainsException;
use CanvasApiLibrary\Core\Models\OutcomeResultRollup;

trait OutcomeResultRollupProperties{
    public \DateTime $submitted_at{
        get {
            return $this->submitted_at;
        }
        set(\DateTime $value) {
            $this->submitted_at = $value;
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