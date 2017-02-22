<?php
// src/CUI/ContactBundle/Form/MessageType.php

namespace CUI\ContactBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', TextType::class, array('label' => 'Nom et Prénom*'))
                ->add('adresse', TextType::class, array('label' => 'Adresse*'))
                ->add('telephone', TextType::class, array('label' => 'Téléphone*'))
                ->add('fonction', TextType::class, array('label' => 'Fonction', 'required'=> false))
                ->add('entreprise', TextType::class, array('label' => 'Entreprise*'))
                ->add('codePostal', TextType::class, array('label' => 'Code postal*'))
                ->add('ville', TextType::class, array('label' => 'Ville*'))
                ->add('email', 'email', array('label' => 'Email*'))
                ->add('contenu', TextareaType::class, array('label' => 'Message*'))
                ->add('envoyer', SubmitType::class, array('attr'=>array('class' => 'btn btn-warning')));
    }

    public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'CUI\ContactBundle\Entity\Message'
		));
	}
}