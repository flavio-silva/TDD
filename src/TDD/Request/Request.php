<?php

namespace TDD\Request;

class Request implements RequestInterface
{
    
    public function isPost()
    {
        if($_SERVER['REQUEST_METHOD']) {
            if($_SERVER['REQUEST_METHOD'] ==  'POST') {
                return true;
            }
        }
        return false;
    }
    
    public function isGet()
    {
        if($_SERVER['REQUEST_METHOD']) {
            if($_SERVER['REQUEST_METHOD'] ==  'GET') {
                return true;
            }
        }
        return false;
    }
}
