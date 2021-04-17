<?php

namespace App\Form;

use App\Entity\UserData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Form\ContactUserType;
use App\Form\AddressUserType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UserDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('lastname')
            ->add('contact',ContactUserType::class)
            ->add('address',AddressUserType::class)
            ->add('userType')
            ->add('gender', ChoiceType::class,[
                   'choices' => ['Male' => 'Male', 'Female' => "Female",'Other' => 'Other'],
                   'expanded' => true
                ]
            )
            ->add('hobbie',NULL,[
                'multiple' => true,
                'expanded' => true
            ])

            ->add('submit',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UserData::class,
        ]);
    }
}
