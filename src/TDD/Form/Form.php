<?php

namespace TDD\Form;

class Form extends AbstractForm
{
    
    public function __construct($name)
    {
        $this->setAttribute('name', $name);
        $this->setAttribute('method', 'get');
    }
}
