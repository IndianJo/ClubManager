<?php

namespace FB\TournamentBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use FB\PlayerManagerBundle\Entity\Player;


class TeamType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('players', 'entity', array( 'class' => 'FB\PlayerManagerBundle\Entity\Player',
              'property' => 'displayName',
              'required' => false,
              'multiple' => true,
              'query_builder' => function(EntityRepository $er)
              {
                  return $er->createQueryBuilder('Player')
                      ->where('Player.firstname != :fname ')
                      ->andWhere('Player.lastname != :lname')
                      ->setParameter('fname', 'club')
                      ->setParameter('lname', 'ucv');
              }
            ))
            ->add('session', 'entity', array(
                'class' => 'FB\SessionManagerBundle\Entity\Session',
                'property' => 'id',
                'empty_value' => '',
                'required' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FB\TournamentBundle\Entity\Team'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fb_tournamentbundle_team';
    }
}
