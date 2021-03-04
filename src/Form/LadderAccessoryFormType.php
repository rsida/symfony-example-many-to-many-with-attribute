<?php

namespace App\Form;

use App\Entity\Accessory;
use App\Entity\LadderAccessory;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LadderAccessoryFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('accessory', EntityType::class, [
                'class' => Accessory::class,
                'choice_label' => 'label',
                'query_builder' => static function (EntityRepository $entityRepository) {
                    return $entityRepository->createQueryBuilder('a')->addOrderBy('a.label');
                },
            ])
            ->add('quantity')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LadderAccessory::class,
        ]);
    }
}