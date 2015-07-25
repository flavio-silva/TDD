<?php

namespace TDD\Validator;

class StringLength extends AbstractInput
{
    protected $max = 255;
    protected $min = 0;
    
    public function getMax()
    {
        return $this->max;
    }

    public function getMin()
    {
        return $this->min;
    }

    public function setMax($max)
    {
        if(!is_int($max)) {
            throw new \InvalidArgumentException;
        }
        
        $this->max = $max;
        return $this;
    }

    public function setMin($min)
    {
        if(!is_int($min)) {
            throw new \InvalidArgumentException;
        }
        
        $this->min = $min;
        return $this;
    }

    public function isValid()
    {
        $return = true;
        
        $str = $this->getValue();
        
        if(!is_null($this->getMin())) {
            if(!(mb_strlen($str) >= $this->getMin())) {
                $return =  false;
            }
        }
        
        if(!is_null($this->getMax())) {
            if(!(mb_strlen($str) <= $this->getMax())) {
                $return = false;
            }
        }

        if(!$return) {
            $this->message = "The length value must be between {$this->getMin()} and {$this->getMax()}";
        }
        
        return $return;
    }
}
