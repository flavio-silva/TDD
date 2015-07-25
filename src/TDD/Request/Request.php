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

    public function getPost()
    {
        if(isset($_POST)) {
            return $_POST;
        }
    }

    public function getGet()
    {
        if(isset($_GET)) {
            return $_GET;
        }
    }
}
