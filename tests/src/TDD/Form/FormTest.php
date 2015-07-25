<?php

namespace TDD\Form;

class FormTest extends \PHPUnit_Framework_TestCase
{
    private $form;
    private $validator;
    
    public function setUp()
    {
        $this->validator = $this->getMockBuilder('\TDD\Validator\Validator')
                ->disableOriginalConstructor()
                ->getMock();
        
        $this->form = new Form('form', $this->validator);
    }
    
    public function tearDown()
    {
        unset($this->validator);
        unset($this->form);
    }

    public function testVerificaSeOMetodoIsValidFunciona()
    {
        $this->validator->expects($this->any())
            ->method('isValid')
            ->willReturn(true);
        
        $this->assertTrue($this->form->isValid());
    }
}
