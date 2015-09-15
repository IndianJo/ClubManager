<?php

namespace FB\TournamentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TournamentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $date = new \DateTime();
        $builder
            ->add('name',       'text')
            ->add('address',    'text')
            ->add('city',       'text')
            ->add('country',    'country', array('preferred_choices' => array('FR')))
            ->add('startDate',  'date', array(
                'format' => 'dd-MMM-y'))
            ->add('endDate',    'date', array(
                'format' => 'dd-MMM-y'))
            ->add('category',   'choice', array('choices' => array(
                'Open'=>'Open',
                'Mixte'=>'Mixte',
                'Loose Mixte'=>'Loose Mixte',
                'Feminin'=>'Feminin')))
            ->add('division',   'choice', array('choices' =>array(
                'N1'=>'N1',
                'N2'=>'N2',
                'N3'=>'N3',
                'DR1'=>'DR1',
                'DR2'=>'DR2',
                'Amical'=>'Amical')))
            ->add('surface',    'choice', array('choices' => array(
                'Indoor'=>'Indoor',
                'Outdoor'=>'Outdoor',
                'Beach'=>'Beach')))
            ->add('season',      'entity', array('class' => 'FB\TournamentBundle\Entity\Season',
                'property' => 'name',
                'empty_value' => 'Sélectionner une saison',
            ))
            ->add('players', 'entity', array( 'class' => 'FB\PlayerManagerBundle\Entity\Player',
                'property' => 'firstname',
                'empty_value' => 'Sélectionner un joueur',
                'required' => false,
                'multiple' => true))
            ->add('save', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FB\TournamentBundle\Entity\Tournament'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fb_tournamentbundle_tournament';
    }
}
