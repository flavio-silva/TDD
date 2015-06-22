<?php

namespace TDD\Request;

interface RequestInterface
{
    function isPost();
    
    function isGet();
}
