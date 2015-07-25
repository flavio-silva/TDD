<?php

namespace TDD\Helper;

use TDD\Form\InputText;
use TDD\Form\Select;

class SelectHelperTest extends \PHPUnit_Framework_TestCase
{
    
    private $selectHelper;

    public function setUp()
    {
        $this->selectHelper = new SelectHelper();
    }
    
    public function tearDown()
    {
        unset($this->selectHelper);
    }
    
    public function testVerificaSeOTipoEstaCorreto()
    {
        $this->assertInstanceOf('TDD\Helper\RenderInterface', $this->selectHelper);
    }
    
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaSeOMetodoRenderLancaUmaExcessao()
    {
        $inputText = new InputText('text');
        
        $this->selectHelper->render($inputText);
    }
    
    public function testVerificaSeOMetodoRenderFuncionaCorretamente()
    {
        
        $select = new Select('select');
        
        $select->setValueOptions([
            1 => 'banana',
            2 => 'abacaxi',
            3 => 'morango',
            4 => 'maca',
            5 => 'uva'
        ]);
        
        $this->assertRegExp('/^<select(.*)?>(.*)?<\/select>$/', $this->selectHelper->render($select));
    }
}
