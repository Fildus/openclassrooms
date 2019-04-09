<?php
declare(strict_types=1);

namespace App\Form\Order;

use App\Entity\Visitor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Translation\Translator;

/**
 * Class VisitorType
 * @package App\Form
 */
class VisitorType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @throws \Symfony\Component\Translation\Exception\InvalidArgumentException
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $translator = new Translator('');
        $builder
            ->add('firstName', TextType::class, [
                'label' => $translator->trans('visitor.label'),
                'attr' => [
                    'placeholder' => $translator->trans('visitor.firstname'),
                ],
            ])
            ->add('lastName', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => $translator->trans('visitor.lastname'),
                ],
            ])
            ->add('birthday', BirthdayType::class, [
                'widget' => 'single_text',
                'label' => $translator->trans('visitor.birthday'),
            ])
            ->add('country', CountryType::class, [
                'label' => $translator->trans('visitor.nationality')
            ])
            ->setRequired(true)
        ;
    }

    /**
     * @param OptionsResolver $resolver
     * @throws \Symfony\Component\OptionsResolver\Exception\AccessException
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Visitor::class
        ]);
    }

}
