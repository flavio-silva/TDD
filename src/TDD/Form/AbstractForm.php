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
    
    public function createField(array $element)
    {
        if(!array_key_exists('type', $element)) {

            throw new \InvalidArgumentException('The key "type" does not exist');

        }

        if(!array_key_exists('name', $element)) {

            throw new \InvalidArgumentException('The key "name" does not exist');

        }

        if(!class_exists($element['type'])) {
            throw new \InvalidArgumentException('The classe named ' . $element['type'] . 'does not exist');            
        }

        $input = new $element['type']($element['name']);


        if(!$input instanceof InputInterface) {
            throw new \InvalidArgumentException('The class must be of InputInterface type');
            
        }

        if(array_key_exists('attributes', $element)) {
            
            if(!is_array($element['attributes'])) {
                throw new \InvalidArgumentException;
            }

            foreach($element['attributes'] as $name => $value) {
                $input->setAttribute($name, $value);
            }
        }


        if($input instanceof SelectInterface && array_key_exists('value_options', $element)) {

            if(!is_array($element['value_options'])) {
                throw new \InvalidArgumentException('The key "value_options" is not an array');
            }

            $input->setValueOptions($element['value_options']);
        }

        return $input;

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
    
    public function getAttributes()
    {
        return $this->attributes;
    }

}