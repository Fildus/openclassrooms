<?php
declare(strict_types=1);

namespace App\Form\Order;

use App\Entity\Order;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Translation\Translator;

/**
 * Class OrderType
 * @package App\Form
 */
class OrderType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @throws \Symfony\Component\Translation\Exception\InvalidArgumentException
     */
    public function buildForm(FormBuilderInterface $builder, array $options):void
    {
        $translator = new Translator('');
        $builder
            ->add('mail',   TextType::class,[
                'label'         =>  $translator->trans('email.label'),
                'attr'          =>  [
                    'placeholder'   =>  $translator->trans('email.placeholder'),
                ]
            ])
            ->add('ticket', CollectionType::class, [
                'entry_type'    =>  TicketType::class,
                'allow_add'     =>  true,
                'allow_delete'  =>  true,
                'prototype'     =>  true,
                'label'         =>  false,
            ])
            ->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event)
            {
                $this
                    ->setTotal($event)
                    ->setParent($event)
                ;
            })
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
            'data_class' => Order::class
        ]);
        $resolver->setRequired(['order']);
    }

    /**
     * @param $event
     * @return OrderType
     */
    private function setTotal($event):self
    {
        $total = 0;
        foreach ($event->getData()->getTicket() as $ticket){
            $total += $ticket->getFare()->getPrice();
        }
        if ($total >= 5){
            $event->getData()->setTotal($total) ;
        }else{
            $event->getData()->setTotal(5) ;
        }
        return $this;
    }

    /**
     * @param $event
     * @return OrderType
     */
    private function setParent($event):self
    {
        foreach ($event->getData()->getTicket() as $ticket){
            $ticket->setOrder($event->getData());
        }
        return $this;
    }

}
