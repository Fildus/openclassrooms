<?php


namespace App\Model\Manager;
use App\Model\Crud\Comments;


/**
 * Trait CommentsManager
 * @package App\Model\Manager
 */
trait CommentsManager
{

    private $comments;

    private $comments_by_order;

    /**
     * @param $comments
     * @return mixed
     */
    public function commentsByOrder($comments)
    {
        $comments = $comments->fetchAll();

        $comments_by_id = [];

        foreach ($comments as $comment) {
            $comments_by_id[$comment->id] = $comment;
        }

        foreach ($comments_by_id as $value) {
            if ($value->parent_id != 0) {
                if (isset($comments_by_id[$value->parent_id]->lvl)) {
                    $value->lvl = $comments_by_id[$value->parent_id]->lvl + 1;
                } else {
                    $value->lvl = 1;
                }
            }
        }

        $this->comments = $comments_by_id;
        if (!empty($comments_by_id)){
            foreach ($comments_by_id as $k => $v){
                if ($v->parent_id == 0){
                    $this->recursivity($k);
                }
            }
        }
        RETURN $this->comments_by_order;
    }

    /**
     * @param $key
     */
    private function recursivity($key)
    {
        $this->comments_by_order[] = $this->comments[$key];

        foreach ($this->comments as $k => $comment) {
            if ($comment->parent_id == $key) {
                $this->recursivity($k);
            }
        }
    }

    /**
     * @param array $data
     */
    public function newComment(array $data)
    {
        if (isset($data['title']) AND !empty($data['title'])){
            $formatedData['title'] = $data['title'];
        }else{
            $formatedData['title'] = NULL;
        }
        if (isset($data['content']) AND !empty($data['content'])){
            $formatedData['content'] = $data['content'];
        }else{
            $formatedData['content'] = NULL;
        }
        if (isset($data['article_id']) AND !empty($data['article_id'])){
            $formatedData['article_id'] = $data['article_id'];
        }else{
            $formatedData['article_id'] = NULL;
        }
        if (isset($data['comment_id']) AND !empty($data['comment_id'])){
            $formatedData['parent_id'] = $data['comment_id'];
        }else{
            $formatedData['parent_id'] = NULL;
        }if (isset($_SESSION['id']) AND !empty($_SESSION['id'])){
            $formatedData['author_id'] = $_SESSION['id'];
        }else{
            $formatedData['author_id'] = 1   ;
        }
            ( new Comments($this->pdo) )->create($formatedData);
            header("Location: /$_GET[url]");
    }

    /**
     * @param \PDOStatement $object
     * @return array
     */
    public function oneEntry(\PDOStatement $object):array
    {
        $array = [];
        $id = [];

        foreach ($object as $k => $v) {
            if (!in_array($v->comment_id,$id)){
                $array[] = $v;
                $id[] = $v->comment_id;
            }
        }
        return $array;
    }
}