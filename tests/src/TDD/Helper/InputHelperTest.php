<?php

namespace TDD\Helper;

use TDD\Form\InputText;

class InputHelperTest extends \PHPUnit_Framework_TestCase
{
    private $inputHelper;
    
    public function setUp()
    {
        $this->inputHelper = new InputHelper();
    }
    
    public function tearDown()
    {
        unset($this->inputHelper);
    }
    
    public function testVerificaSeOTipoEstaCorreto()
    {
        $this->assertInstanceOf('TDD\Helper\RenderInterface', $this->inputHelper);
    }
    
    public function testVerificaSeOMetodoRenderRetornaUmaTagValida()
    {
        $this->assertRegExp('/^<input .*?>$/', $this->inputHelper->render(new InputText('input')));
    }
}
