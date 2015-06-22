<?php

namespace TDD\Form;

interface FormInterface
{
    function createField($element);
    
    function addField(FormInterface $element);
    
    function getField($name);
    
    function setName($name);
    
    function getName();
    
    function setAttribute($name, $value);
    
    function getAttribute($name);
}
