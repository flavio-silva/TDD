<?php

namespace TDD\Validator;

class CurrencyTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     * @var AbstractInput
     */
    private $currency;

    public function setUp()
    {
        $this->currency = new Currency('currency');
    }
    
    public function tearDown()
    {
        $this->currency = null;
    }
    
    public function testVerificaSeOMetodoIsValidRetornaTrue()
    {
        $this->currency->setValue('2000,99');
        $this->assertTrue($this->currency->isValid());
        
        $this->currency->setValue('100');
        $this->assertTrue($this->currency->isValid());
    }
    
    public function testVerificaSeOMetodoIsValidRetornaFalse()
    {
        $this->currency->setValue('abc');
        $this->assertFalse($this->currency->isValid());
        
        $this->currency->setValue('100.00');
        $this->assertFalse($this->currency->isValid());
        
        $this->currency->setValue('737,001');
        $this->assertFalse($this->currency->isValid());
    }
}
