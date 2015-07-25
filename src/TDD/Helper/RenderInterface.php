<?php

namespace TDD\Helper;

use TDD\Form\InputInterface;

interface RenderInterface
{
    function render(InputInterface $input);
}
