<?php

namespace TDD\Validator;

class Validator implements ValidatorInterface
{
    /**
     * @var array | InputInterface
     */
    protected $inputs = [];
    
    public function add(InputInterface $input)
    {
        $this->inputs[$input->getName()] = $input;
    }

    public function isValid()
    {
        foreach ($this->inputs as $input ) {
            
            if(!$input->isValid()) {
                return false;
            }
        }
        
        return true;
    }

    public function populate(array $data)
    {
        foreach ($data as $key => $value) {
            
            if(array_key_exists($key, $this->inputs)) {
                
                if(!is_scalar($value)) {
                    throw new \InvalidArgumentException;
                }
                
                $this->inputs[$key]->setValue($value);
            }
        }
    }

    public function remove($name)
    {
        if(!array_key_exists($name, $this->inputs)) {
            throw new \InvalidArgumentException;
        }
        
        unset($this->inputs[$name]);
    }
    
    public function get($name)
    {
        if(!array_key_exists($name, $this->inputs)) {
            
            throw new \InvalidArgumentException;
        }
        
        return $this->inputs[$name];
    }

}
