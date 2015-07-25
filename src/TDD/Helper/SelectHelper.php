<?php

namespace TDD\Helper;

use TDD\Form\InputInterface;
use TDD\Form\SelectInterface;

class SelectHelper implements RenderInterface
{
    public function render(InputInterface $input)
    {
        if(!$input instanceof SelectInterface) {
            throw new \InvalidArgumentException;
        }
        
        $output = '<select';
        
        foreach ($input->getAttributes() as $key => $value) {
            $output .= " {$key}=\"{$value}\"";
        }
        
        $output .= ">";
        
        foreach ($input->getValueOptions() as $key => $value) {
            $output .= "<option value=\"{$key}\">{$value}</option>";
        }
        
        $output .= '</select>';
        
        return $output;
    }

}
