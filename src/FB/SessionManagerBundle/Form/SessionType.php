<?php

namespace FB\SessionManagerBundle\Form;

use FB\TournamentBundle\Form\Type\TeamType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SessionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('trainingStart',  'datetime', array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',))
            ->add('teams', 'collection', array(
                'type'          => new TeamType(),
                'allow_add'     => true,
                'allow_delete'  => true,
            ))
            ->add('save', 'submit')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver  $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FB\SessionManagerBundle\Entity\Session'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fb_sessionmanagerbundle_session';
    }
}
