<?php


namespace App\Form\Type;


use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', TextType::class, [
                'constraints' => [
                    new Length([
                        'max' => 100
                    ])
                ]
            ])
            ->add('title', TextType::class, [
                'constraints' => [
                    new NotNull([
                        'message' => 'The title cannot be empty'
                    ])
                ]
            ])
            ->add('price', IntegerType::class, [
               'constraints' => [
                   new NotNull([
                       'message' => 'The price cannot be empty'
                   ]),
                   new GreaterThan([
                       'value' => 0
                   ])
               ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver ->setDefaults([
           'data_class' => Product::class
        ]);
    }

}