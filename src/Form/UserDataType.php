<?php

namespace App\Form;

use App\Entity\UserData;
use App\Form\AddressUserType;
use App\Form\ContactUserType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class)

            ->add('lastname',TextType::class)

            ->add('contact',ContactUserType::class, ['error_bubbling' => true])
           
            ->add('addr',CollectionType::class, [
                    'entry_type' => AddressUserType::class,
                    'entry_options' => ['label' => false],
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
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
