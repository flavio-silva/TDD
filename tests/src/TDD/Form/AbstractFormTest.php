<?php

namespace TDD\Form;

class AbstractFormTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AbstractForm
     */
    private $abstractForm;

    public function setUp()
    {
        $this->abstractForm = $abstractForm = $this->getMockForAbstractClass('TDD\Form\AbstractForm');
    }
    
    public function tearDown()
    {
        $this->abstractForm = null;
    }
    
    public function testVerificaSeAClasseAbstracImplentaInterfaceCorreta()
    {
        $this->assertInstanceOf('TDD\Form\FormInterface', $this->abstractForm);
    }
    
    public function testVerificaSeOSetEGetNameFuncionam()
    {
        $this->abstractForm->setName('foo');
        $this->assertEquals('foo', $this->abstractForm->getName());
        
        $this->abstractForm->setName('bar');
        $this->assertEquals('bar', $this->abstractForm->getName());
    }
    
    public function testVerificaSeOSetEGetAttributeFuncionam()
    {
        $this->abstractForm->setAttribute('foo', 'bar');
        $this->assertEquals('bar', $this->abstractForm->getAttribute('foo'));
        
        $this->abstractForm->setAttribute('bar', 'foo');
        $this->assertEquals('foo', $this->abstractForm->getAttribute('bar'));
    }
    
    public function testVerificaSeOAddEGetFieldFuncionam()
    {
        $inputText = $this->getMockBuilder('TDD\Form\InputText')
            ->disableOriginalConstructor()
            ->getMock();
        
        $inputText->expects($this->any())
            ->method('getName')
            ->willReturn('input');
        
        $this->abstractForm->addField($inputText);
        $this->assertInstanceOf('TDD\Form\InputText', $this->abstractForm->getField('input'));
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    
    public function testVerificaSeOMetodoGetAttributeLancaUmaExcessao()
    {
        $this->abstractForm->getAttribute('test');
    }
    
    /**
     * @expectedException \InvalidArgumentException
     */
    
    public function testVerificaSeOMetodoGetFieldLancaUmaExcessao()
    {
        $this->abstractForm->getField('test');
    }
    
    public function testVerificaSeOMetodoPopulateFunciona()
    {
        $input = $this->getMockBuilder('\TDD\Form\InputText')
            ->disableOriginalConstructor()
            ->getMock();
        
        $input->expects($this->any())
            ->method('populate')
            ->willReturn(true);
        
        $input->expects($this->any())
            ->method('getName')
            ->willReturn('input');
        
        $this->abstractForm->addField($input);
        
        $data = ['input' => 'value'];
        
        $this->assertTrue($this->abstractForm->populate($data));
    }
    
    /**
     * @expectedException \InvalidArgumentException
     */
    
    public function testVerificaSeOMetodoPopulateLancaExcessao()
    {
        $input = $this->getMockBuilder('\TDD\Form\InputText')
            ->disableOriginalConstructor()
            ->getMock();
        
        $input->expects($this->any())
            ->method('populate')
            ->willReturn(true);
        
        $input->expects($this->any())
            ->method('getName')
            ->willReturn('input');
        
        $this->abstractForm->addField($input);
        
        $data = ['input' => []];
        
        $this->abstractForm->populate($data);
    }
    
    public function testVerificaSeOSetEGetValueFuncionam()
    {
        $this->abstractForm->setValue('value');        
        $this->assertEquals('value', $this->abstractForm->getValue());
        $this->abstractForm->setValue('other_value');
        $this->assertEquals('other_value', $this->abstractForm->getValue());
    }
    
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaSeOMetodoGetValueLancaUmaExcessao()
    {
        $this->abstractForm->getValue();
    }
}