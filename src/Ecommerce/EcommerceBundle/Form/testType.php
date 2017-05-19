<?php

namespace Ecommerce\EcommerceBundle\Form;



use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;


class testType extends AbstractType

{

   


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //Ici nous allons faire notre formulaire en PHP 

        //Le html c'est fini

        $builder

            ->add('email')
            ->add('date');
    }

     public function getName()
     {
               return 'ecommerce_ecommercebundle_test';
    }
}
    