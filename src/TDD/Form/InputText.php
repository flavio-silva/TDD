<?php

namespace TDD\Form;

class InputText extends AbstractForm implements InputInterface
{
    public function __construct($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['type'] = 'text';
    }
    
    public function getValue()
    {
        return $this->attributes['value'];
    }

    public function setValue($value)
    {
        $this->attributes['value'] = $value;
    }
}
