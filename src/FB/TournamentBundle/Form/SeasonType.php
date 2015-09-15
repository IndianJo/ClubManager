<?php

namespace FB\TournamentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SeasonType extends AbstractType
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
            ->add('startDate',  'date', array(
                'data' => $date,
                'format' => 'dd-MMM-y'))
            ->add('endDate',    'date', array(
                'data' => $date,
                'format' => 'dd-MMM-y'))
            ->add('Save',       'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FB\TournamentBundle\Entity\season'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fb_tournamentbundle_season';
    }
}
