<?php


namespace App\Model\Manager;
use App\Model\Crud\AlertComments;
use App\Model\Crud\Articles;
use App\Model\Crud\Chapters;
use App\Model\Crud\Comments;
use App\Model\Crud\SpecificRequest;
use App\Model\Crud\Users;
use App\Model\Lib\Twig;
use App\Model\Crud\Images;


/**
 * Class Manager
 * @package App\Model\Manager
 */
class Manager{

    use \App\Model\Lib\DbConnect;
    use \App\Model\Manager\CommentsManager;
    use \App\Model\Manager\ArticleManager;
    use \App\Model\Lib\GumpConfig;

    private $pdo;

    public function __construct()
    {
        $this->getPDO();
    }

    /**
     * @param string $classeCRUD
     * @param string $method
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    public function crud(string $classeCRUD, string $method ,array $data)
    {
        $data = $this->run($data);
        if ( isset($method) AND !empty($method)     ){

            if ($classeCRUD === 'Articles'          ){
                if($method === 'create' ){
                    if ($this->articleExists($data) == TRUE){
                        echo Twig::run()->render('AlertArticleExist.twig');
                    }elseif ($this->articleExists($data) == FALSE){
                        ( new Articles ($this->pdo) )->$method($data);
                        $id = $this->lastArticleId();
                        header("Location: /admin/article-$id");
                        RETURN TRUE;
                    }
                }else{
                    return ( new Articles ($this->pdo) )->$method($data);
                }
            }
            if ($classeCRUD === 'Comments'          ){
                if ($method === 'read'              ){
                    if (isset($data['article'])){
                        $comments = $this->commentsByOrder(( new Comments  ($this->pdo) )->$method($data));
                        return $comments;
                    }
                }
                if ($method === 'create'){
                    $this->newComment($data);
                    unset($_POST);
                    return TRUE;
                }
                if ($method === 'read' and array_key_exists('page',$data)){
                    $object = ( new Comments ($this->pdo) )->$method($data);
                    return $this->oneEntry($object);
                }
                if ($method === 'delete'){
                    ( new Comments ($this->pdo) )->$method($data);
                    header("Location: /admin/commentaires/page-1");
                }
                return ( new Comments ($this->pdo) )->$method($data);
            }

            if ($classeCRUD === 'Users'             ){return ( new Users            ($this->pdo) )->$method($data);}
            if ($classeCRUD === 'Loging'            ){return ( new Logger           ($this->pdo) )->$method($data);}
            if ($classeCRUD === 'Subscribing'       ){return ( new Subscribing      ($this->pdo) )->$method($data);}
            if ($classeCRUD === 'AlertComments'     ){return ( new AlertComments    ($this->pdo) )->$method($data);}
            if ($classeCRUD === 'SpecificRequest'   ){return ( new SpecificRequest  ($this->pdo) )->$method($data);}
            if ($classeCRUD === 'Chapters'          ){return ( new Chapters         ($this->pdo) )->$method($data);}
            if ($classeCRUD === 'Images'            ){return ( new Images           ($this->pdo) )->$method($data);}
        }
    }
}