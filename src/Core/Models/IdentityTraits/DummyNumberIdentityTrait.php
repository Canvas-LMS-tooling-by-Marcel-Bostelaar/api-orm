<?php

namespace CanvasApiLibrary\Core\Models\IdentityTraits;

use CanvasApiLibrary\Core\Models\IdentityTraits\Atomic\DomainIdentityTrait;
use CanvasApiLibrary\Core\Models\IdentityTraits\Atomic\IdentityBoiletplateTrait;
use CanvasApiLibrary\Core\Models\IdentityTraits\Atomic\NumberIdentityTrait;

/**
 * DIRTY HACK to quickly fix model populator assuming an id exists.
 */
//TODO FIX
trait DummyNumberIdentityTrait{
    use IdentityBoiletplateTrait;
    use DomainIdentityTrait;

    public ?int $id{
        get{
            return $this->id;
        }
        set (?int $value){
            $this->id = $value;
        }
    }

    public function getId(): string{
        return (string)$this->id;
    }

    protected function initIdentityTraits(){
        $this->initializeDomainIdentity();
    }

    public function isRegularModel() : bool{
        return false;
    }
    public function isUrlModel() : bool{
        return false;
    }
}
