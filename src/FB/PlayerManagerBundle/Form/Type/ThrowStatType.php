<?php

namespace FB\PlayerManagerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ThrowStatType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('backDistance', 'text')
            ->add('sideDistance', 'text')
            ->add('testDate', 'date', array(
        'widget' => 'single_text',
        'format' => 'dd/MM/yyyy',
    ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FB\PlayerManagerBundle\Entity\ThrowStat'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fb_playermanagerbundle_throwstat';
    }
}
