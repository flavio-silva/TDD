<?php

namespace TDD\Validator;

class InArray extends AbstractInput
{
    protected $data = [];
    
    public function setData(array $data)
    {
        $this->data = $data;
    }
    
    public function getData()
    {
        return $this->data;
    }
    
    public function isValid()
    {
        if(in_array($this->getValue(), $this->data)) {
            return true;
        }
        
        return false;
    }
}
