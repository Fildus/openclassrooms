<?php
declare(strict_types=1);

namespace App\Form\Order;

use App\Entity\Ticket;
use App\Repository\FareRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Translation\Translator;

/**
 * Class TicketType
 * @package App\Form
 */
class TicketType extends AbstractType
{

    /**
     * TicketType constructor.
     * @param FareRepository $fareRepository
     */
    public function __construct(FareRepository $fareRepository)
    {
        $this->fareRepository = $fareRepository;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @throws \Symfony\Component\Translation\Exception\InvalidArgumentException
     */
    public function buildForm(FormBuilderInterface $builder, array $options):void
    {
        $translator = new Translator('');
        $builder
            ->add('visitor',VisitorType::class,[
                'required'  =>  true,
                'label'     =>  false
            ])
            ->add('date',DateType::class,[
                'label'     =>  $translator->trans('ticket.label.booking'),
                'required'  =>  true,
                'widget'    =>  'single_text',
            ])
            ->add('fareType',CheckboxType::class,[
                'required'  =>  false,
                'label'     =>  $translator->trans('ticket.label.faretype')
            ])
            ->add('discount',CheckboxType::class,[
                'required'  =>  false,
                'label'     =>  $translator->trans('ticket.label.discount')
            ])
            ->setRequired(true)
            ->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event)
            {
                $this->setFare($event);
            })
        ;
    }

    /**
     * @param OptionsResolver $resolver
     * @throws \Symfony\Component\OptionsResolver\Exception\AccessException
     */
    public function configureOptions(OptionsResolver $resolver):void
    {
        $resolver->setDefaults([
            'data_class'            =>  Ticket::class
        ]);
    }

    /**
     * @param $event
     * @return TicketType
     */
    private function setFare($event):self
    {
        $age = date_diff($event->getData()->getVisitor()->getBirthday(), new \DateTime())->format('%Y');
        if ($age >= 12)             {$fareName = 'normal'   ;}
        if ($age >= 4 && $age < 12) {$fareName = 'enfant'   ;}
        if ($age >= 60)             {$fareName = 'senior'   ;}
        if ($age <  4)              {$fareName = 'gratuit'  ;}
        if ($age >= 18 && $event->getData()->getDiscount() === true){
            $fareName = 'reduit';
        }else{
            $event->getData()->setDiscount(false);
        }

        $event->getData()->setFare($this->fareRepository->findOneBy(['name' => $fareName]));
        return $this;
    }

}
