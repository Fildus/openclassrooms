<?php
declare(strict_types=1);

namespace App\Form;


use Symfony\Component\Translation\Translator;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class GetOrder
 * @package App\Form
 */
class GetOrder extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $translator = new Translator('');
        $builder
            ->add('name', TextType::class,[
                'label' =>  false,
                'attr'  =>  [
                    'class'       => 'form-control mb-2',
                    'placeholder' => $translator->trans('getorder.code')
                ]
            ])
            ->add('submit',SubmitType::class,[
                'attr'  =>  ['class' => 'btn btn-outline-success col-12'],
                'label' =>  $translator->trans('getorder.submit')
            ])
            ;
    }
}