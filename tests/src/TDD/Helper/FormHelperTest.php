<?php

namespace TDD\Helper;

use TDD\Form\Form;

class FormHelperTest extends \PHPUnit_Framework_TestCase
{
    
    protected $form;
    protected $helper;
            
    public function setUp()
    {
        $this->helper = new FormHelper();
        $this->form = new Form('contact');
    }
    
    public function tearDown()
    {
        $this->form = null;
        $this->helper = null;
    }
    
    public function testVerificaSeOTipoEstaCorreto()
    {
        $this->assertInstanceOf('\TDD\Helper\RenderFormInterface', $this->helper);
    }
    
    public function testVerificaSeOMetodoOpenTagFunciona()
    {
        $this->assertRegExp('/^<form .*?name=".+">$/', $this->helper->openTag($this->form));
    }
    
    public function testVerificaSeOMetodoCloseTagFunciona()
    {
        $this->assertEquals('</form>', $this->helper->closeTag($this->form));
    }
}
