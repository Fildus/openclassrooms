<?php


namespace App\Model\Lib;


use App\Model\Router\Route;


/**
 * Class Nav
 * @package App\Model\Lib
 */
class Nav
{

    use DbConnect;

    private $pdo;

    private $callable;

    private $id;

    private $url;

    private $sql = [

        /*                                              Users                                          */
        ['Front', 'chapters', 'SELECT Chapters.id FROM Chapters ORDER BY id', '/chapitres/page-'            ],
        ['Front', 'chapter' , 'SELECT Chapters.id FROM Chapters ORDER BY id', '/chapitre-'                  ],
        ['Front', 'post'    , 'SELECT Articles.id FROM Articles ORDER BY id', '/article-'                   ],

        /*                                              Admin                                          */
        ['Back' , 'chapters', 'SELECT Chapters.id FROM Chapters ORDER BY id', '/admin/chapitres/page-'      ],
        ['Back' , 'chapter' , 'SELECT Chapters.id FROM Chapters ORDER BY id', '/admin/chapitre-'            ],
        ['Back' , 'articles', 'SELECT Articles.id FROM Articles ORDER BY id', '/admin/articles/page-'       ],
        ['Back' , 'article' , 'SELECT Articles.id FROM Articles ORDER BY id', '/admin/article-'             ],
        ['Back' , 'comments', 'SELECT Comments.id FROM Comments INNER JOIN AlertComments ON Comments.id = AlertComments.comment_id ORDER BY Comments.id', '/admin/commentaires/page-'   ],
        ['Back' , 'comment' , 'SELECT Comments.id FROM Comments INNER JOIN AlertComments ON Comments.id = AlertComments.comment_id ORDER BY Comments.id', '/admin/commentaire-' ],
        ['Back' , 'users'   , 'SELECT Users.   id FROM Users    ORDER BY id', '/admin/utilisateurs/page-'   ],
        ['Back' , 'user'    , 'SELECT Users.   id FROM Users    ORDER BY id', '/admin/utilisateur-'         ]

    ];

    public function __construct()
    {
        $this->getPDO();
        $this->callable = ( new Route )->getCallable();
        $req = $this->query($this->isSQL());
        foreach ($req as $item){
            $this->id[] = $item['id'];
        }
    }

    /**
     * @return mixed
     */
    private function isSQL()
    {
        foreach ($this->sql as $item) {
            if ($item['0'] === $this->callable['Controller'] AND $item['1'] === $this->callable['Method']){
                $this->url = $item['3'];
                RETURN $item['2'];
            }
        }
    }

    /**
     * @param string $string
     * @return mixed
     */
    private function query(string $string)
    {
        return $this->pdo->query($string)->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public function searchById():array
    {
        $id = $this->id;
        foreach ($id as $k => $v){
            if ($v === end($this->callable['Parameter'])){
                if (isset($id[$k+1])){
                    if (isset($id[$k+1])){
                        $next = ($id[$k+1]);
                    }
                }
                if (isset($id[$k-1])){
                    if (isset($id[$k-1])){
                        $previous = ($id[$k-1]);
                    }
                }
            }
        }
        isset($next    )?: $next     = end($this->callable['Parameter']);
        isset($previous)?: $previous = end($this->callable['Parameter']);


        RETURN [(object) ['next' => $this->url.$next, 'previous' => $this->url.$previous]];
    }

    /**
     * @param array $limit
     * @return array
     */
    public function searchBypage(array $limit):array
    {
        $nbrPages = count($this->id)/$limit['limit'];

        if (end($this->callable['Parameter']) < $nbrPages){
            $next = end($this->callable['Parameter']) + 1;
        }else{
            $next = end($this->callable['Parameter']);
        }

        if (end($this->callable['Parameter']) != 1){
            $previous = end($this->callable['Parameter'])-1;
        }else{
            $previous = end($this->callable['Parameter']);
        }

        RETURN [(object) ['next' => $this->url.$next, 'previous' => $this->url.$previous]];
    }
}