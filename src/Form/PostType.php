<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('FristName',TextType::class,[
                'attr' =>[
                    'placeholder' =>'Enter Your Name...',
                ]
            ])
            ->add('LastName',TextType::class,[
                'attr' =>[
                    'placeholder' =>'Enter Your LastName...',
                ]
            ])
            ->add('Email',TextType::class,[
                'attr' =>[
                    'placeholder' =>'Enter Your Email...',
                ]
            ])
            ->add('Mobile',NumberType::class,[
                'attr' =>[
                    'placeholder' =>'Enter Your Mobile...'
                ]
                ])
            ->add('save',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
