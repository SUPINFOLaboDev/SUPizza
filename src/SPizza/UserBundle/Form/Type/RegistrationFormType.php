<?php

namespace SPizza\UserBundle\Form\Type;

use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends BaseType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('email', 'text', array(
                'attr' => array('placeholder' => 'Anakin.SKYWALKER@supinfo.com')
            ))
            ->add('username', 'text', array(
                'attr' => array('placeholder' => 'darthVader')
            ))
            ->add('firstname', 'text', array(
                'required'  => true,
                'label' => 'Prénom',
                'translation_domain' => 'FOSUserBundle',
                'attr' => array('placeholder' => 'Anakin')
            ))
            ->add('lastname', 'text', array(
                'required'  => true,
                'label' => 'Nom',
                'translation_domain' => 'FOSUserBundle',
                'attr' => array('placeholder' => 'Skywalker')
            ))
            ->add('idBooster', 'text', array(
                'required'  => true,
                'label' => 'ID Booster',
                'translation_domain' => 'FOSUserBundle',
                'attr' => array('placeholder' => '158420')
            ))
        ;
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'spizza_user_registration';
    }
}