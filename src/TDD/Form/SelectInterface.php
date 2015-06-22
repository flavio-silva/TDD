<?php

namespace TDD\Form;

interface SelectInterface
{
    function setValueOptions(array $options);
    
    function getValueOptions();
}
