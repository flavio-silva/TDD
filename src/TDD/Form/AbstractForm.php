<?php

namespace TDD\Form;

abstract class AbstractForm implements FormInterface, PopulateInterface, InputInterface
{    
    protected $attributes = [];
    /**
     * @var FormInterface | array
     */
    protected $fields = [];
        
    public function addField(FormInterface $element)
    {
        $this->fields[$element->getName()] = $element;
    }

    public function getField($name)
    {        
        if(!array_key_exists($name, $this->fields)) {
            throw new \InvalidArgumentException;
        }
        
        return $this->fields[$name];
    }
    
    public function createField($element)
    {
        
    }

    public function getAttribute($name)
    {
        if(!array_key_exists($name, $this->attributes)) {
            throw new \InvalidArgumentException;
        }        
        
        return $this->attributes[$name];
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function populate(array $data)
    {
        foreach ($data as $key => $value) {
            if(array_key_exists($key, $this->fields)) {
                
                if(!is_scalar($value)) {
                    throw new \InvalidArgumentException("The value is not scalar");
                }
                
                $this->fields[$key]->setValue($value);
            }
        }
        
        return true;
    }

    public function setAttribute($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }
    
    public function setValue($value)
    {
        $this->attributes['value'] = $value;
        return $this;
    }
    
    public function getValue()
    {
        if(!isset($this->attributes['value'])) {
            throw new \InvalidArgumentException;
        }
        
        return $this->attributes['value'];

        
    }
}