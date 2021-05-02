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
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class UserDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')

            ->add('lastname')

            ->add('contact',ContactUserType::class, ['error_bubbling' => true])
           
            ->add('address',CollectionType::class, [
                    'entry_type' => AddressUserType::class,
                    'entry_options' => ['label' => false],
                    'by_reference' => false,
                    'allow_add' => true,
                    'allow_delete' => true
              ])
            
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
