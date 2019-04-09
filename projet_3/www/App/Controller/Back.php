<?php

namespace App\Controller;
use App\Model\Lib\Nav;
use App\Model\Lib\Session;
use App\Model\Lib\Twig;
use App\Model\Manager\Manager;

/**
 * Class Back
 * @package App\Controller
 */
class Back
{

    use \App\Model\Lib\Account;


    /**
     * @param array $data
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     * @throws \Exception
     */
    public function chapters(array $data)
    {
        try {
            echo Twig::run()->render('ChaptersAdmin.twig',[
                'chapters'      => ( new Manager )->crud('Chapters','read',[
                    'page'      =>  $data['page'],
                    'limit'     =>  10
                    ]),
                'session'       => ( new Session )->session(),
                'page'          => ( new Nav )->searchBypage(['limit' => 10]),
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
     * @throws \Exception
     */
    public function chapter(array $data)
    {
        try {
            echo Twig::run()->render('ChapterAdmin.twig',[
                'chapters'      => ( new Manager )->crud('Chapters','read',$data),
                'session'       => ( new Session )->session(),
                'page'          => ( new Nav )->searchById(),
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
     * @throws \Exception
     */
    public function articles(array $data)
    {
        try {
            echo Twig::run()->render('ArticlesAdmin.twig',[
                'articles'      => ( new Manager )->crud('SpecificRequest','readArticle',[
                    'page'      => $data['page'],'limit'=> 10
                    ]),
                'session'       => ( new Session )->session(),
                'page'          => ( new Nav )->searchBypage(['limit' => 10]),
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
     * @throws \Exception
     */
    public function article(array $data)
    {
        try {
            echo Twig::run()->render('ArticleAdmin.twig',[
                'article'       => ( new Manager )->crud('SpecificRequest','readArticle',[
                    'id' => $data['article']
                    ]),
                'chapters'      => ( new Manager )->crud('Chapters','read',[]),
                'session'       => ( new Session )->session(),
                'page'          => ( new Nav() )->searchById(),
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
     * @throws \Exception
     */
    public function comments(array $data)
    {
        try {
            echo Twig::run()->render('CommentsAdmin.twig',[
                'comments'      => ( new Manager )->crud('Comments','read',[
                    'page' => $data['page'],
                    'limit' => 10
                    ]),
                'session'       => ( new Session )->session(),
                'page'          => ( new Nav )->searchBypage(['limit' => 10]),
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
     * @throws \Exception
     */
    public function comment(array $data)
    {
        try {
            echo Twig::run()->render('CommentAdmin.twig',[
                'comments' => ( new Manager )->crud('Comments','read',$data),
                'alert'    => ( new Manager )->crud('AlertComments','read',$data),
                'session'       => ( new Session )->session(),
                'page'          => ( new Nav() )->searchById(),
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
     * @throws \Exception
     */
    public function users(array $data)
    {
        try {
            echo Twig::run()->render('UsersAdmin.twig',[
                'users'     => ( new Manager )->crud('Users','read',[
                    'range' => $data['page'],
                    'limit' => 10
                    ]),
                'session'       => ( new Session )->session(),
                'page'          => ( new Nav )->searchBypage(['limit' => 10]),
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
     * @throws \Exception
     */
    public function user(array $data)
    {
        try {
            echo Twig::run()->render('UserAdmin.twig',[
                'users' => ( new Manager )->crud('Users','read',[
                    'id' => $data['utilisateur']
                    ]),
                'session'       => ( new Session )->session(),
                'page'          => ( new Nav() )->searchById(),
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
}