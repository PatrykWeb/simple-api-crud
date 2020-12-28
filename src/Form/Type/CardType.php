<?php


namespace App\Form\Type;


use App\Entity\Card;
use App\Entity\Customer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotNull;

class CardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateTime',DateTimeType::class, [
                'widget' => 'single_text',
                'constraints' => [
                    new NotNull()
                ]
            ])
            ->add('customer', EntityType::class, [
                'class' => Customer::class,
                'constraints' => [
                    new NotNull()
                ]
            ])
            ->add('products', EntityType::class, [
                'class' => ProductType::class,
                'multiple' => true,
                'constraints' => [
                    new NotNull()
                ]
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
           'data_class' => Card::class
        ]);
    }

}