<?php

namespace TDD\Helper;

use TDD\Form\InputInterface;

class InputHelper implements RenderInterface
{
    public function render(InputInterface $input)
    {
        $output = '<input';
        
        foreach ($input->getAttributes() as $key => $value) {
            $output .= " {$key}=\"{$value}\"";
        }
        
        return "$output />";
    }
}
