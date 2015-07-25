<?php

namespace TDD\Validator;

abstract class AbstractInput implements InputInterface
{
    protected $name;
    protected $value;
    protected $message;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }
    
    public function getMessage()
    {
        return $this->message;
    }
}
