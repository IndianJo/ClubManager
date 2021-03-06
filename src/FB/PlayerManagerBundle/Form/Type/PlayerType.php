<?php
// src\FB\PlayerManagerBundle\Form\Type\PlayerType.php
namespace FB\PlayerManagerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PlayerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname',      'text')
            ->add('lastname',       'text')
            ->add('phonenumber',    'text')
            ->add('street',         'text')
            ->add('streetnumber',   'number')
            ->add('city',           'text')
            ->add('cp',             'number')
            ->add('email',          'email')
            ->add('throwDistances', 'collection',array(
                'type'          => new ThrowStatType(),
                'prototype'     => true,
                'allow_add'     => true,
                'allow_delete'  => true
            ))
            ->add('save',           'submit')
            ->add('saveexit',       'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FB\PlayerManagerBundle\Entity\Player'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fb_playermanagerbundle_player';
    }
}
