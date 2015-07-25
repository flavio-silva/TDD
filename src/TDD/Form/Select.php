<?php

namespace TDD\Form;

class Select extends AbstractForm implements SelectInterface
{
    protected $options = [];
    
    public function __construct($name)
    {
        $this->attributes['name'] = $name;
    }
    
    public function getValueOptions()
    {
        return $this->options;
    }

    public function setValueOptions(array $options)
    {
        $this->options = $options;
    }

}
