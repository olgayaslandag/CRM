<?php 

namespace App\Libraries;

use CodeIgniter\Files\File;

class Upload {

	public $dene;

	public function __construct()
	{
		$this->dene = "deneme";
		return $this;
	}

	public function upload($img)
    {
        if (!$img->hasMoved()) {

            $filepath = WRITEPATH . 'uploads/' . $img->store();
            $data = new File($filepath);

            return [
            	"status" => true,
            	"message" => null,
            	"result" => $data->getBasename()
            ];

        } else {

        	return [
        		"status" => false,
        		"message"=> "The file has already been moved.",
        		"result" => null
        	];

        }

        return $data;
    }

}