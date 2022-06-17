<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\CountryValidator;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,[
                'label'=>'Quel nom souhaitez vous donner à votre adresse ?',
                'attr'=>[
                    'palceholder'=>'Nommez votre adresse'
                ]
            ])
            ->add('firstname',TextType::class,[
                'label'=>'Votre prènom',
                'attr'=>[
                    'palceholder'=>'Entrez votre prènom'
                ]
            ])
            ->add('lastname',TextType::class,[
                'label'=>'Votre nom',
                'attr'=>[
                    'palceholder'=>'Entrez votre nom'
                ]
            ])
            ->add('company',TextType::class,[
                'label'=>'Votre société',
                'attr'=>[
                    'palceholder'=>'facultatif'
                ]
            ])
            ->add('address',TextType::class,[
                'label'=>'Votre adresse',
                'attr'=>[
                    'palceholder'=>'2 rue des poissonier'
                ]
            ])
            ->add('postal',TextType::class,[
                'label'=>'Votre code postal',
                'attr'=>[
                    'palceholder'=>'Entrez votre code postal'
                ]
            ])
            ->add('city',TextType::class,[
                'label'=>'Ville',
                'attr'=>[
                    'palceholder'=>'Votre ville'
                ]
            ])
            ->add('country',CountryType::class,[
                'label'=>'Votre pays',
                'attr'=>[
                    'palceholder'=>'Votre pays'
                ]
            ])
            ->add('phone',TelType::class,[
                'label'=>'Votre téléphone',
                'attr'=>[
                    'palceholder'=>'votre numéro de télephone'
                ]
            ])
            ->add('submit',SubmitType::class,[
                'label'=>'Ajouter mon adresse',
                'attr'=>[
                    'class'=>'btn-block btn-info'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
