<?php
# src\FB\UserBundle\Form\RegistrationType.php

namespace FB\UserBundle\Form;

//use Symfony\Component\Form\AbstractType;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Symfony\Component\Form\FormBuilderInterface;
use FB\PlayerManagerBundle\Entity\Player;

class RegistrationType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('player','entity', array(
                'class' => 'FB\PlayerManagerBundle\Entity\Player',
                'property' => 'displayName',
                'empty_value' => 'Sélectionner un joueur',
                'required' => false
            ));
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'app_user_registration';
    }}