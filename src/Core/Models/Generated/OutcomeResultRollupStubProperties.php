<?php
/* Automatically generated based on model properties.*/
namespace CanvasApiLibrary\Core\Models\Generated;

use CanvasApiLibrary\Core\Exceptions\NotPopulatedException;
use CanvasApiLibrary\Core\Exceptions\MixingDomainsException;
use CanvasApiLibrary\Core\Models\UserStub;
use CanvasApiLibrary\Core\Models\OutcomeStub;
use CanvasApiLibrary\Core\Models\OutcomeResultRollupStub;

trait OutcomeResultRollupStubProperties{
    protected mixed $user_identity;
    public UserStub $user{
        get { 
            return UserStub::newFromMinimumDataRepresentation($this->user_identity, $this->getContext());
        }
        set (UserStub $value) {
            if($value->domain != $this->domain){
                $selfDomain = $this->domain->domain;
                $otherDomain = $value->domain->domain;
                throw new MixingDomainsException("Tried to save a UserStub from domain '$otherDomain' to OutcomeResultRollupStub.user from domain '$selfDomain'.");
            }
            $this->user_identity = $value->getMinimumDataRepresentation();
        }
    }

    protected mixed $learning_outcome_identity;
    public OutcomeStub $learning_outcome{
        get { 
            return OutcomeStub::newFromMinimumDataRepresentation($this->learning_outcome_identity, $this->getContext());
        }
        set (OutcomeStub $value) {
            if($value->domain != $this->domain){
                $selfDomain = $this->domain->domain;
                $otherDomain = $value->domain->domain;
                throw new MixingDomainsException("Tried to save a OutcomeStub from domain '$otherDomain' to OutcomeResultRollupStub.learning_outcome from domain '$selfDomain'.");
            }
            $this->learning_outcome_identity = $value->getMinimumDataRepresentation();
        }
    }

}