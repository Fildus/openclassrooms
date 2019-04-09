<?php


namespace App\Model\Crud;

use App\Model\Manager\Manager;

/**
 * Class Images
 * @package App\Model\Crud
 */
class Images
{
    private $pdo;

    private $authorisedExtensions = ['png','jpg','jpeg','gif'];

    private $rep = 'Web/assets/img/users/';

    /**
     * Images constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param array $data
     */
    public function create(array $data):void
    {
        $Extension = explode('/',$data['img']['type']);

        if (in_array(end($Extension),$this->authorisedExtensions)){
            if ($data['img']['size'] <= 5000000){
                if ($data['img']['error'] === 0){
                    if (file_exists($this->rep.$data['img']['name'])){
                        unlink($this->rep.$data['img']['name']);
                    }
                    if (!file_exists($this->rep.$data['img']['name'])){
                        move_uploaded_file($data['img']['tmp_name'],$this->rep.$data['img']['name']);
                        ( new Manager )->crud('Chapters','update',[
                            'id'    => $_POST['img']['id'],
                            'img'   => '/'.$this->rep.$data['img']['name']
                        ]);
                    }else{
                        echo "une image du même nom existe déjà";
                    }
                }else{
                    echo "L'image n'a pas été uplodé correctement, veuillez recommencer";
                }
            }else{
                echo "l'image est trop grosse ".$data['img']['size'];
            }
        }else{
            echo "Cette extension de fichier n'est pas reconnue";
        }
    }

    /**
     * @param $data
     */
    public function delete($data):void
    {
        if (file_exists($_ENV['dir'].$data['path'])){
            unlink($_ENV['dir'].$data['path']);
            ( new Manager )->crud('Chapters','update',[
                'id' => $data['id'],
                'img' => NULL
            ]);
        }
    }
}