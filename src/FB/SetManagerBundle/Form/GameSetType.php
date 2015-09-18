<?php

namespace FB\SetManagerBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GameSetType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $number = array();
        for ($i = 1; $i<100; $i++){
            $number[$i] = $i;
        }
        $builder
            ->add('number', 'choice', array(
                'choices' => $options['attr']
                ))
            ->add('size', 'choice', array(
                'choices' => array(
                    'S'=>'S',
                    'M'=>'M',
                    'L'=>'L',
                    'XL'=>'XL',
                    'XXL'=>'XXL'
                )))
            ->add('sexe','choice', array(
                'choices' => array(
                    'Men'=>'Men',
                    'Women' => 'Women'
                )))
            ->add('player', 'entity', array(
                'class' => 'FB\PlayerManagerBundle\Entity\Player',
                'property' => 'displayName',
                'empty_value' => 'Sélectionner un joueur',
                'required' => false
            ))
            ->add('save', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FB\SetManagerBundle\Entity\GameSet'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fb_setmanagerbundle_gameset';
    }
}
