<?php

namespace FB\SessionManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;


class TeamType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
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
            ->add('save',           'submit')
            ->add('saveaddmore',       'submit')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver  $resolver)
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
        return 'fb_sessionmanagerbundle_team';
    }
}
