<?php


namespace App\Model\Lib;


/**
 * Trait CrudFunctions
 * @package App\Model\Lib
 */
trait CrudFunctions
{

    /**
     * @param array $data
     * @return array
     */
    public function createFunction(array $data):array
    {
        $key    =   [];
        $value  =   [];

        foreach ($data as $k => $v){
            if (!empty($v)){
                $key    []  = '`'.$k.'`';
                $value  []  = '\''.$v.'\'';
            }
        }

        $key      = '('.implode(",",$key  ).')';
        $value    = '('.implode(",",$value).')';

        RETURN ['key' => $key, 'value' => $value];
    }

    /**
     * @param array $data
     * @return array|string
     */
    public function updateFunction(array $data):string
    {
        $string = [];
        foreach ($data as $key => $value){
            if($key != 'id'){
                $string[$key] = " ".$key." = '".$value."' ";
            }
        }
        $string = implode(',',$string);
        RETURN $string;
    }

    /**
     * @param $class
     * @param $data
     * @return mixed
     */
    public function deleteFunction($class, $data)
    {
        RETURN $this->pdo->query("DELETE FROM $class WHERE id = $data[id]");
    }
}