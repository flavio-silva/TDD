<?php

namespace TDD\Validator;

class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ValidatorInterface
     */
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
    
    public function testVerificaSeOAddEGetFuncionam()
    {
        $stringLength = $this->getMockBuilder('\TDD\Validator\StringLength')
                ->disableOriginalConstructor()
                ->getMock();
        
        $stringLength->expects($this->once())
                ->method('getName')
                ->willReturn('string_length');
        
        $this->validator->add($stringLength);
        $this->assertEquals($stringLength, $this->validator->get('string_length'));
    }
    
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaSeMetodoGetLancaUmaExcessao()
    {
        $this->validator->get('input');
    }
    
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaSeOMetodoRemoveFunciona()
    {
        $stringLength = $this->getMockBuilder('\TDD\Validator\StringLength')
                ->disableOriginalConstructor()
                ->getMock();
        
        $stringLength->expects($this->once())
                ->method('getName')
                ->willReturn('string_length');
        
        $this->validator->add($stringLength);
        $this->validator->remove('string_length');
        $this->validator->get('string_length');
    }
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaSeOMetodoRemoveLancaUmaExcessao()
    {
        
        $this->validator->remove('input');
    }
    
    public function testVerificaSeOMetodoIsValidRetornaTrue()
    {
        $stringLength = $this->getMockBuilder('\TDD\Validator\StringLength')
                ->disableOriginalConstructor()
                ->getMock();
        
        $stringLength->expects($this->any())
                ->method('isValid')
                ->willReturn(true);
        
        $this->validator->add($stringLength);
        $this->assertTrue($this->validator->isValid());
    }
    
    public function testVerificaSeOMetodoIsValidRetornaFalse()
    {
        $stringLength = $this->getMockBuilder('\TDD\Validator\StringLength')
                ->disableOriginalConstructor()
                ->getMock();
        
        $stringLength->expects($this->any())
                ->method('isValid')
                ->willReturn(false);
        
        $this->validator->add($stringLength);
        $this->assertFalse($this->validator->isValid());
    }
    
    public function testVerificaSeOMetodoPopulateFunciona()
    {
        $input = new StringLength('descricao');
        
        $data = [
            'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
        ];
        
        $this->validator->add($input);        
        $this->validator->populate($data);
        
        $input = $this->validator->get('descricao');
        
        $this->assertEquals($data['descricao'], $input->getValue());
        
    }
    
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaSeOMetodoPopulateLancaUmaExcessao()
    {
        $input = new StringLength('descricao');
        
        $data = [
           'descricao' => []
        ];
        
        $this->validator->add($input);        
        $this->validator->populate($data);
    }
}
