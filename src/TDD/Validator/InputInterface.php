<?php
namespace TDD\Validator;

interface InputInterface
{
    function setName($name);
    
    function getName();
    
    function setValue($value);
    
    function getValue();
    
    function isValid();

    function getMessage();
}
