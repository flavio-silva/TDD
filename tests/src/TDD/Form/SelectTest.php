<?php

namespace TDD\Form;

class SelectTest extends \PHPUnit_Framework_TestCase
{
    private $select;

    public function setUp()
    {
        $this->select = new Select('select');
    }

    public function testVerificaSeOTipoEstaCorreto()
    {
        $this->assertInstanceOf('\TDD\Form\SelectInterface', $this->select);
        $this->assertInstanceOf('\TDD\Form\FormInterface', $this->select);
    }
    
    public function testVerificaSeOSetEGetOptionsFuncionam()
    {
        $options = ['Eletronicos', 'Eletrodomesticos', 'Moveis'];
        
        $this->select->setValueOptions($options);
        
        $this->assertEquals($options, $this->select->getValueOptions());
        
    }
    
    public function tearDown()
    {
        $this->select = null;
    }
}
