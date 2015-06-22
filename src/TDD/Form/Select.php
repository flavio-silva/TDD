<?php

namespace TDD\Form;

class Select extends Form implements SelectInterface
{
    protected $options;
    
    public function getValueOptions()
    {
        return $this->options;
    }

    public function setValueOptions(array $options)
    {
        $this->options = $options;
    }

}
