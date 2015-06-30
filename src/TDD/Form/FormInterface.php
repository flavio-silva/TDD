<?php

namespace TDD\Form;

interface FormInterface
{
    function createField(array $element);
    
    function addField(FormInterface $element);
    
    function getField($name);
    
}
