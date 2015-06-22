<?php

namespace TDD\Form;

class InputTextTest extends \PHPUnit_Framework_TestCase
{
    public function testVerificaSeOTipoEstaCorreto()
    {
        $input = new InputText('input');
        $this->assertInstanceOf('TDD\Form\FormInterface', $input);
        $this->assertInstanceOf('TDD\Form\InputInterface', $input);
    }
    
    public function testVerificaSeOMetodoSetEGetValueFuncionam()
    {
        $input = new InputText('input');
        $input->setValue('foo');
        $this->assertEquals('foo', $input->getValue());
        
        $input->setValue('bar');
        $this->assertEquals('bar', $input->getValue());
    }
}
