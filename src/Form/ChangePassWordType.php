<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangePassWordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,[
                'disabled'=>true,
                'label'=>'Mon adresse email'
            ])


            ->add('firstname', TextType::class,[
                'disabled'=>true,
                'label'=>'Mon Prènom'
            ])
            ->add('lastname', TextType::class,[
                'disabled'=>true,
                'label'=>'Mon nom'
            ])
            ->add('old_password', PasswordType::class,[
                'mapped'=>false,
                'label'=>'Mon mot de passe actuel',
                'attr'=>[
                    'placeholder'=>'Veuillez saisir votre mot de passe'
                ]

            ])
            ->add('new_password',RepeatedType::class, [
                'mapped'=>false,
                'type'=> PasswordType::class,
                'invalid_message'=>'Le mot de passe et la confirmation doivent être identique au mot de passe',
                'required'=>true,
                'first_options'=>[
                    'label'=>'Mon nouveau mot de passe',
                    'attr'=>[
                        'placeholder'=>'Merci de saisir votre nouveau mot de passe'
                    ]

                ],
                'second_options'=>[
                    'label'=>'Merci de saisir un mot de passe à nouveau',
                    'attr'=>[
                        'placeholder'=>'Merci de confirmer votre  nouveau mot de passe'
                    ]
                ],

            ])
            ->add('submit',SubmitType::class, [
                'label'=>"Mettre à jour",

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
