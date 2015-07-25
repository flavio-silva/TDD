<?php

namespace TDD\Validator;

class Currency extends AbstractInput
{

    public function isValid()
    {
        if(preg_match('/^[1-9][0-9]*(,[0-9]{2})?$/', $this->getValue())) {
            return true;
        }
        
        $this->message = "The value {$this->getValue()} is not valid";
        return false;
    }


}
