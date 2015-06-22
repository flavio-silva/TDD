<?php

namespace TDD\Validator;

class AbstractInputTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AbstractInput
     */
    private $input;
    
    public function setUp()
    {
        $this->input = $this->getMockForAbstractClass(
            '\TDD\Validator\AbstractInput',
            [],
            '',
            false
        );
    }
    
    public function tearDown()
    {
        $this->input = null;
    }

    public function testVerificaSeOTipoEstaCorreto()
    {
        $this->assertInstanceOf('\TDD\Validator\InputInterface', $this->input);
    }
    
    public function testVerificaSeOGetESetNameFuncionam()
    {
        $this->input->setName('input');
        $this->assertEquals('input', $this->input->getName());
        
        $this->input->setName('input2');
        $this->assertEquals('input2', $this->input->getName());
    }

    public function testVerificaSeOGetESetValueFuncionam()
    {
        $this->input->setValue('input');
        $this->assertEquals('input', $this->input->getValue());
    }
}
