<?php


namespace App\Model\Lib;


use App\Controller\Errors;

/**
 * Trait GumpConfig
 * @package App\Model\Lib
 */
trait GumpConfig
{

    private $rules = [

        'pseudo'        => 'alpha_numeric|max_len,50|min_len,4',
        'username'      => 'alpha_numeric|max_len,50|min_len,4',
        'password'      => 'max_len,100|min_len,4',
        'content'       => 'max_len,10000',
        'title'         => 'max_len,50|min_len,4',
        'name'          => 'max_len,50|min_len,4',
        'summary'       => 'max_len,10000|min_len,4',
        'text'          => 'max_len,10000',
        'email'         => 'valid_email',

    ];

    private $filters = [
        'pseudo'        => 'trim|sanitize_string|addslashes',
        'password'	    => 'addslashes',
        'content'       => 'addslashes',
        'title'         => 'trim|sanitize_string|addslashes',
        'name'          => 'trim|sanitize_string|addslashes',
        'summary'       => 'trim|sanitize_string|addslashes',
        'email'    	    => 'trim|sanitize_email'
    ];

    private $data;

    /**
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    public function run(array $data)
    {
        require_once __DIR__.'../../../../Vendor/Gump/gump.class.php';
        $validator = new \GUMP();

        $data = $validator->filter($data, $this->filters);

        $validated = $validator->validate(
            $data, $this->rules
        );

        if($validated === TRUE)
        {
            RETURN $data;
        }
        Errors::badInformation();
        exit();
    }
}