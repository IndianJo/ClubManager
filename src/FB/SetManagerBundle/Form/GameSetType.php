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
        //$em = $this->getDoctrine()->getManager();
        //$players = $em->getRepository('FBPlayerManagerBundle:Player')->findAll();
        $builder
            ->add('number', 'number')
            ->add('size', 'choice', array('choices' => array('S', 'M', 'L', 'XL', 'XXL')))
            ->add('sexe','choice', array('choices' => array('m'=>'Men', 'w' => 'Women')))
            ->add('player', 'entity', array( 'class' => 'FB\PlayerManagerBundle\Entity\Player',
                    'property' => 'firstname',
                    'empty_value' => 'Sélectionner un joueur'))
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
