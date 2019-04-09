<?php
declare(strict_types=1);


namespace App\Service;


use Swift_Mailer;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;


/**
 * Class MailerService
 * @package App\Service
 */
class MailerService
{

    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @var string
     */
    private $message;

    /**
     * @var array
     */
    private $order = [];

    /**
     * @var array
     */
    private $sender = [
        'host'      =>  'imap.gmail.com',
        'port'      =>  465,
        'security'  =>  'SSL',
        'username'  =>  'musedulouvre@gmail.com',
        'password'  =>  'JuIbOjubnoocnu5'
    ];

    /**
     * @var string
     */
    private $recipient;

    /**
     * @var array
     */
    private $template = [
        'order'     =>  'mail/mail.html.twig'
    ];

    /**
     * MailerService constructor.
     * @param Environment $twig
     */
    public function __construct(?Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param $order
     * @param $req
     * @return MailerService
     * @throws \Exception
     */
    public function sendTicketsByMail($order,?Request $req): self
    {
        if (!empty($order)){
            $this
                ->setRecipient($order->getMail())
                ->setMessage('Merci pour votre commande')
                ->setOrder($order)
                ->sendEmail('order')
            ;
            $req->getSession()->getFlashBag()->add('success','Un email vous a été envoyé à l\'adresse <strong>'.$order->getMail().'</strong>');
        }
        return $this;
    }
    
    /**
     * @param string $type
     * @return MailerService
     * @throws \Exception
     */
    public function sendEmail(string $type): MailerService
    {
        if ($this->isValid()){
            $templatePath = (string) '';
            foreach ($this->template as $k => $v) {
                if ($k === $type){
                    $templatePath = $v;
                }
            }
            if ($templatePath !== null || !empty($templatePath)){
                $transport = (new \Swift_SmtpTransport(
                    $this->sender['host'],
                    $this->sender['port'],
                    $this->sender['security']
                ))
                    ->setUsername($this->sender['username'])
                    ->setPassword($this->sender['password'])
                ;
                $mailer = new Swift_Mailer($transport);

                $message = (new \Swift_Message($this->message))
                    ->setFrom($this->sender['username'])
                    ->setTo($this->recipient)
                    ->setBody(
                        $this->twig->render(
                            $templatePath,[
                                'order' => $this->order
                            ]
                        ),
                        'text/html'
                    )
                ;

                $mailer->send($message);
            }else{
                throw new \Exception('Classe: '.__CLASS__.' \n n\'a pas envoyé le mail à '.$this->recipient);
            }
        }
        return $this;
    }

    /**
     * @return bool
     */
    private function isValid():bool
    {
        if ($this->message !== null && $this->recipient !== null){
            return true;
        }
        return false;
    }

    /**
     * @param mixed $message
     * @return MailerService
     */
    public function setMessage(string $message):MailerService
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @param $order
     * @return MailerService
     */
    public function setOrder($order):MailerService
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @param mixed $sender
     * @return MailerService
     */
    public function setSender(string $sender):MailerService
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * @param mixed $recipient
     * @return MailerService
     */
    public function setRecipient(string $recipient):MailerService
    {
        $this->recipient = $recipient;
        return $this;
    }
}