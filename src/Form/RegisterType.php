<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, ['label'=>'Prènom',
                'attr'=>[
                    'placeholder'=>'Merci de saisir votre Prènom'
                ]


            ])
            ->add('lastname', TextType::class,['label'=>'Nom',
                    'attr'=>[
                        'placeholder'=>'Merci de saisir votre nom'
                    ]

            ])
            ->add('email', EmailType::class,['label'=>'Email',
                'attr'=>[
                    'placeholder'=>'Merci de saisir votre email'
                ]
                ])
            ->add('password',PasswordType::class,
                ['label'=>'Mot de passe',
                    'attr'=>[
                        'placeholder'=>'Merci de saisir un mot de passe'
                    ]
                ])
            ->add('password_confirm',PasswordType::class,
                ['label'=>'Confirmer votre mot de passe',
                    'mapped'=>false,
                    'attr'=>[
                        'placeholder'=>'Confirmer votre mot de passe'
                    ]
                ])
            ->add('submit',SubmitType::class,
                ['label'=>"S'inscrire",

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
