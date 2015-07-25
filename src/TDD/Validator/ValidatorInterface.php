<?php

namespace TDD\Validator;

interface ValidatorInterface
{
    function isValid();
    
    function add(InputInterface $input);
    
    function get($name);
            
    function remove($name);
    
    function populate(array $data);

    function getMessages();
}
