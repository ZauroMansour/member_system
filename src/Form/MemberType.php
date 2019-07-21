<?php

namespace App\Form;

use App\Entity\Member;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class MemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('datenaiss', DateType::class, array(
                'label' => "Date de naissance",
                'widget' => 'single_text',
                'html5' => true,
                'required' => true,
                'attr' => ['class' => 'datepicker'],))
            ->add('genre', ChoiceType::class, array('choices' => array('Masculin' => 'Masculin', 'Féminin' => 'Féminin')))
            ->add('situationFamiliale', ChoiceType::class, array('choices' => array('Célibataire' => 'Celibataire', 'Marié(e)' => 'Marié', 'Divorcé(e)' => 'Divorcé', 'Veuf(ve)' => 'Veuf')))
            ->add('structure', TextType::class)
            ->add('phone', TextType::class, ['required'  =>  true])
            ->add('autrephone', TextType::class, ['required'  =>  false])
            ->add('anneeAdhesion', DateType::class, array(
                'label' => "Date d'adhésion",
                'widget' => 'single_text',
                'html5' => true,
                'required' => true,
                'attr' => ['class' => 'datepicker'],
                ))
            ->add('address', TextareaType::class)
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Member::class,
        ]);
    }
}
