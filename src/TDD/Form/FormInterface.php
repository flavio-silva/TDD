<?php

namespace TDD\Form;

interface FormInterface
{
    function createField($element);
    
    function addField(FormInterface $element);
    
    function getField($name);
    
}
