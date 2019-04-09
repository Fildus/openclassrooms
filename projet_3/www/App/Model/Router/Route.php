<?php


namespace App\Model\Router;


/**
 * Class Route
 * @package App\Model\Router
 */
class Route
{
    /**
     * @var array $files Images send by $_FILE
     */
    public $files = [

        /*                      Images                             */
        'createImage'  => ['Images'          ,  'create'      ,  3 ]
    ];

    /**
     * @var array $filesCallable [controller,method,parameter]
     */
    private $filesCallable;

    /**
     * @var array $post html->name, Class, Method
     */
    public $post = [

        /*                       Users                             */
        'login'         => ['Loging'        ,  'login'        ,  1 ],
        'logout'        => ['Loging'        ,  'logout'       ,  1 ],
        'subscribe'     => ['Subscribing'   ,  'subscribe'    ,  1 ],
        'unSubscribe'   => ['Subscribing'   ,  'unSubscribe'  ,  1 ],
        'deleteUser'    => ['Users'         ,  'delete'       ,  4 ],
        'updateUsers'   => ['Users'         ,  'update'       ,  1 ],

        /*                      Chapters                           */
        'createChapter' => ['Chapters'       ,  'create'      ,  3 ],
        'updateChapter' => ['Chapters'       ,  'update'      ,  3 ],
        'deleteChapter' => ['Chapters'       ,  'delete'      ,  4 ],

        /*                      Articles                           */
        'createArticle' => ['Articles'       ,  'create'      ,  3 ],
        'updateArticle' => ['Articles'       ,  'update'      ,  3 ],
        'deleteArticle' => ['Articles'       ,  'delete'      ,  4 ],

        /*                      Comments                           */
        'createComment' => ['Comments'      ,  'create'        , 1 ],
        'updateComment' => ['Manager'       ,  'updateComment' , 1 ],
        'deleteComment' => ['Comments'      ,  'delete'        , 2 ],

        /*                    AlertComments                        */
        'createAlertComments' => ['AlertComments' ,  'create'  , 1 ],
        'deleteAlertComments' => ['AlertComments' ,  'delete'  , 2 ],

        /*                    Images                               */
        'deleteImage'         => ['Images'        ,  'delete' ,  4 ],
    ];

    /**
     * @var array $postCallable [controller,method,parameter]
     */
    private $postCallable = [];

    /**
     * @var array $get url, Controller, Method, Rights
     */
    public $get = [

        /*                         Users                                    */
        [ '/'                                   , 'Front' , 'chapters' , 1 ],
        [ '/chapitres/:page:id'                 , 'Front' , 'chapters' , 1 ],
        [ '/:chapitre:id'                       , 'Front' , 'chapter'  , 1 ],
        [ '/:article:id'                        , 'Front' , 'post'     , 1 ],

        /*                         Admin                                    */
        [ '/admin/chapitres/:page:id'           , 'Back'  , 'chapters' , 3 ],
        [ '/admin/:chapitre:id'                 , 'Back'  , 'chapter'  , 3 ],
        [ '/admin/articles/:page:id'            , 'Back'  , 'articles' , 3 ],
        [ '/admin/:article:id'                  , 'Back'  , 'article'  , 3 ],
        [ '/admin/commentaires/:page:id'        , 'Back'  , 'comments' , 2 ],
        [ '/admin/:commentaire:id'              , 'Back'  , 'comment'  , 2 ],
        [ '/admin/utilisateurs/:page:id'        , 'Back'  , 'users'    , 4 ],
        [ '/admin/:utilisateur:id'              , 'Back'  , 'user'     , 4 ]

    ];

    /**
     * @var array $getCallable Controller, Method, $data, Rights
     */
    private $getCallable = [];

    /**
     * Route constructor.
     */
    public function __construct()
    {
        $this->files();
        $this->post();
        $this->get();
    }

    private function files()
    {
        if(isset($_FILES) AND !empty($_FILES)){
            foreach ($this->files as $k => $v) {
                if (array_key_exists($k,$_POST)){
                    $this->filesCallable['route'] = $v;
                    $this->filesCallable['data'] = $_FILES;
                }
            }
        }
    }

    /**
     * @RETURN bool
     */
    private function post():bool
    {
        if (isset($_POST) AND !empty($_POST)){
            foreach ($_POST as $POSTkey => $POSTVALUE){
                CONTINUE;
            }
            foreach ($this->post as $key => $value){
                if ($key === $POSTkey){
                    $this->postCallable['route'] = $value;
                    $this->postCallable['data'] = $POSTVALUE;
                    RETURN TRUE;
                }
            }
        }
        RETURN FALSE;
    }

    /**
     * Parse url
     * @RETURN bool
     */
    private function get():bool
    {
        $regexSlugId = '%^([a-z0-9]+)-([0-9]+)$%i';

        if(!isset($_GET['url'])) {
            $url = '/';
        }else{
            $url = $_GET['url'];
        }

        $url = rtrim($url,'/');
        $urlexplode = explode('/',$url);

        $param = preg_grep($regexSlugId,$urlexplode);
        $paramslug = preg_replace($regexSlugId,'$1',$param);
        $paramslug = array_values($paramslug);
        $paramid   = preg_replace($regexSlugId,'$2',$param);
        $paramid = array_values($paramid);
        $param = [];
        for ($i = 0, $iMax = count($paramid); $i < $iMax; $i++){
            $param[$paramslug[$i]] = $paramid[$i];
        }
        foreach ($urlexplode as $value) {
            $urlTransformed[] = preg_replace($regexSlugId, ':$1:id', $value);
        }
        $urlTransformed = implode('/',$urlTransformed);
        foreach ( $this->get as $item ) {
            if($item['0'] === '/'.$urlTransformed){
                $this->getCallable['Controller']   = $item['1'];
                $this->getCallable['Method']       = $item['2'];
                $this->getCallable['Parameter']    = $param;
                $this->getCallable['Auth']         = $item['3'];
                RETURN TRUE;
            }
        }
        RETURN FALSE;
    }

    /**
     * @RETURN array filesCallable
     */
    public function filesCallable()
    {
        RETURN $this->filesCallable;
    }

    /**
     * @RETURN array getCallable
     */
    public function getCallable()
    {
        RETURN $this->getCallable;
    }

    /**
     * @RETURN array postCallable
     */
    public function postCallable()
    {
        RETURN $this->postCallable;
    }
}