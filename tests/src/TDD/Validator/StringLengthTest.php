<?php

namespace TDD\Validator;

class StringLengthTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var StringLength
     */
    private $stringLength;
    
    public function setUp()
    {
        $this->stringLength = new StringLength('input');        
    }
    
    public function tearDown()
    {
        $this->stringLength = null;
    }
    
    public function testVerificaSeOSetEGetMinFuncionam()
    {
        $this->stringLength->setMin(10);
        $this->assertEquals(10, $this->stringLength->getMin());
        
        $this->stringLength->setMin(255);
        $this->assertEquals(255, $this->stringLength->getMin());        
    }
    
    public function testVerificaSeOSetEGetMaxFuncionam()
    {
        $this->stringLength->setMax(10);
        $this->assertEquals(10, $this->stringLength->getMax());
        
        $this->stringLength->setMax(255);
        $this->assertEquals(255, $this->stringLength->getMax());
    }
    
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaSeOMetodoSetMinLancaExcessao()
    {
        $this->stringLength->setMin('Hello');
    }
    
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaSeOMetodoSetMaxLancaExcessao()
    {
        $this->stringLength->setMax('Hello');        
    }

    public function testVerificaSeOMetodoIsValidRetornaTrue()
    {
        $this->stringLength->setMin(11);        
        $this->stringLength->setValue('Lorem ipsum');
        $this->assertTrue($this->stringLength->isValid());
        
        $this->stringLength->setMax(13);
        $this->stringLength->setValue('Lorem ipsum ');
        $this->assertTrue($this->stringLength->isValid());
    }
    
    public function testVerificaSeOMetodoIsValidRetornaFalse()
    {
        $this->stringLength->setMin(12);
        $this->stringLength->setValue('Lorem ipsum');
        $this->assertFalse($this->stringLength->isValid());
        
        $this->stringLength->setMax(15);
        $this->stringLength->setValue('Lorem ipsum dolor');        
        $this->assertFalse($this->stringLength->isValid());        
    }
}