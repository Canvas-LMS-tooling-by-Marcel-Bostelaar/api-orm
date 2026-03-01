<?php
/* Automatically generated based on model properties.*/
namespace CanvasApiLibrary\Core\Models\Generated;

use CanvasApiLibrary\Core\Exceptions\NotPopulatedException;
use CanvasApiLibrary\Core\Exceptions\MixingDomainsException;
use CanvasApiLibrary\Core\Models\OutcomeResultRollup;

trait OutcomeResultRollupProperties{
    public ?float $score{
        get {
            return $this->score;
        }
        set(?float $value) {
            $this->score = $value;
        }
    }

}