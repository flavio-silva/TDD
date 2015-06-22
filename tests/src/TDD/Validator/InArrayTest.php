<?php

namespace TDD\Validator;

class InArrayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var InArray
     */
    private $inArray;

    public function setUp()
    {
        $this->inArray = new InArray('input');
    }
    
    public function tearDown()
    {
        $this->inArray = null;
    }
    
    public function testVerificaSeOMetodoSetEGetDataFuncionam()
    {
        $data = [
            'Eletrodomésticos',
            'Eletrônicos',
            'Games',
            'Lazer',
            'Telefonia'
        ];
        
        $this->inArray->setData($data);        
        $this->assertEquals($data, $this->inArray->getData());
    }
    
    public function testVerificaSeOMetodoIsValidRetornaTrue()
    {
        $data = [
            'Eletrodomésticos',
            'Eletrônicos',
            'Games',
            'Lazer',
            'Telefonia'
        ];
        
        $this->inArray->setData($data);
        $this->inArray->setValue('Lazer');
        $this->assertTrue($this->inArray->isValid());
        
        $this->inArray->setValue('Games');
        $this->assertTrue($this->inArray->isValid());        
    }
    
    public function testVerificaSeOMetodoIsValidRetornaFalse()
    {
        $data = [
            'Eletrodomésticos',
            'Eletrônicos',
            'Games',
            'Lazer',
            'Telefonia'
        ];
        
        $this->inArray->setData($data);
        $this->inArray->setValue('Informática');
        $this->assertFalse($this->inArray->isValid());
        
        $this->inArray->setValue('Celulares');
        $this->assertFalse($this->inArray->isValid());
    }
    
    
}
