<?php

namespace TDD\Helper;

use TDD\Form\InputInterface;

class FormHelper implements RenderFormInterface
{
    
    public function closeTag()
    {
        return '</form>';
    }

    public function openTag(InputInterface $form)
    {
        $html = '<form';
        
        foreach ($form->getAttributes() as $name => $value) {
            $html .= " {$name}=\"{$value}\"";
        }
        
        $html .= '>';
        
        return $html;
    }


}
