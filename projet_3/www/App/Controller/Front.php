<?php


namespace App\Controller;
use App\Model\Lib\Nav;
use App\Model\Lib\Twig;
use App\Model\Manager\Manager;
use App\Model\Lib\Session;


/**
 * Class Front
 * @package App\Controller
 */
class Front{

    use \App\Model\Lib\Account;

    /**
     * @param array $data
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function chapters(array $data = ['page' => 1])
    {
        try {
            echo Twig::run()->render('Chapters.twig',[
                'chapters'      =>  ( new Manager )->crud('Chapters','read',[
                    'page'      => $data['page'],
                    'limit'     => 10
                    ]),
                'session'       =>  ( new Session )->session(),
                'page'          =>  ( new Nav )->searchBypage(['limit' => 10]),
                'user'          =>  $this->getAccount()
            ]);
        } catch (\Twig_Error_Loader $exception) {
            throw new \Twig_Error_Loader("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
        } catch (\Twig_Error_Runtime $exception) {
            throw new \Twig_Error_Runtime("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
        } catch (\Twig_Error_Syntax $exception) {
            throw new \Twig_Error_Syntax("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
        }
    }

    /**
     * @param array $data
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function chapter(array $data)
    {
        try {
            $array = ['chapter' => $data['chapitre']];
            echo Twig::run()->render('Posts.twig' , [
                'articles'  => ( new Manager )->crud('Articles' , 'read' , $array),
                'article'   => ( new Manager )->crud('Articles' , 'read' , $array),
                'session'   => ( new Session )->session(),
                'user'      =>  $this->getAccount()
            ]);
        } catch (\Twig_Error_Loader $exception) {
            throw new \Twig_Error_Loader("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
        } catch (\Twig_Error_Runtime $exception) {
            throw new \Twig_Error_Runtime("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
        } catch (\Twig_Error_Syntax $exception) {
            throw new \Twig_Error_Syntax("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
        }
    }

    /**
     * @param array $data
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function post(array $data)
    {
        try {
            echo Twig::run()->render('Post.twig' , [
                'article' => ( new Manager )->crud('SpecificRequest','readArticle',[
                    'id'  => $data['article']
                    ]),
                'session' => ( new Session )->session(),
                'user'    =>  $this->getAccount(),
                'comment' => ( new Manager )->crud('Comments' , 'read' , $data)
            ]);
        } catch (\Twig_Error_Loader $exception) {
            throw new \Twig_Error_Loader("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
        } catch (\Twig_Error_Runtime $exception) {
            throw new \Twig_Error_Runtime("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
        } catch (\Twig_Error_Syntax $exception) {
            throw new \Twig_Error_Syntax("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
        }
    }
}