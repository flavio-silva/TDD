<?php

namespace TDD\Request;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    private $request;
    
    public function setUp()
    {        
        $this->request = new Request();        
    }

    public function tearDown()
    {
        $this->request = null;
    }

    public function testVerificaSeOTipoEstaCorreto()
    {
        $this->assertInstanceOf('TDD\Request\RequestInterface', $this->request);
    }
    
    public function testVerificaSeOMetodoIsGetFunciona()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        
        $this->assertTrue($this->request->isGet());
        
        $_SERVER['REQUEST_METHOD'] = 'POST';
        
        $this->assertFalse($this->request->isGet());
    }
    
    public function testVerificaSeOMetodoIsPostFunciona()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        
        $this->assertTrue($this->request->isPost());
        
        $_SERVER['REQUEST_METHOD'] = 'GET';
        
        $this->assertFalse($this->request->isPost());
    }
}
