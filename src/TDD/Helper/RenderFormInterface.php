<?php

namespace TDD\Helper;

use TDD\Form\InputInterface;

interface RenderFormInterface
{
    function openTag(InputInterface $form);
    
    function closeTag();
}
