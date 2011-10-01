<?php

namespace Connect\ContactBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('email')
            ->add('location')
            ->add('website')
            ->add('tel')
            ->add('mobile')
            ->add('additional', 'textarea')
        ;
    }

    public function getName()
    {
        return 'contact';
    }
}
