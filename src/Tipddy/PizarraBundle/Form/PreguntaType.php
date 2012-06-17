<?php

namespace Tipddy\PizarraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PreguntaType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('etiqueta')
        ;
    }

    public function getName()
    {
        return 'tipddy_pizarrabundle_preguntatype';
    }
}
