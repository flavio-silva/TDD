<?php

namespace TDD\Form;

use TDD\Validator\ValidatorInterface;

class Form extends AbstractForm
{
    /**
     * @var ValidatorInterface
     */
    protected $validator;

    public function __construct($name, ValidatorInterface $validator)
    {
        $this->setAttribute('name', $name);
        $this->setAttribute('method', 'get');
        $this->validator = $validator;
    }
    
    public function populate(array $data)
    {
        parent::populate($data);
        
        $this->validator->populate($data);
    }
    
    public function isValid()
    {
        return $this->validator->isValid();
    }
    
    public function getValidator()
    {
        return $this->validator;
    }
}
