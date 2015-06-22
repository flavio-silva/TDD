<?php

namespace TDD\Validator;

class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    
    private $validator;
    
    public function setUp()
    {
        $this->validator = new Validator();
    }
    
    public function tearDown()
    {
        $this->validator = null;
    }
    
    public function testVerificaSeOTipoEstaCorreto()
    {
        $this->assertInstanceOf('\TDD\Validator\ValidatorInterface', $this->validator);
    }
    
    
}
