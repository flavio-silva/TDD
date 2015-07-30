<?php

namespace TDD\Validator;

class Validator implements ValidatorInterface
{
    /**
     * @var array | InputInterface
     */
    protected $inputs = [];
    protected $messages = [];
    
    public function add(InputInterface $input)
    {
        $this->inputs[$input->getName()] = $input;
        return $this;
    }

    public function isValid()
    {
        $return = true;
        foreach ($this->inputs as $input ) {
            
            if(!$input->isValid()) {
                $this->messages[$input->getName()] = $input->getMessage();
                $return = false;
            }
        }
        return $return;
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

    public function getMessages()
    {
        return $this->messages;
    }

}
