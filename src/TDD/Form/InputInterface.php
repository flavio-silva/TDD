<?php

namespace TDD\Form;

interface InputInterface
{
    function setValue($value);
    
    function getValue();
    
    function setName($name);
    
    function getName();
    
    function setAttribute($name, $value);
    
    function getAttribute($name);
}
