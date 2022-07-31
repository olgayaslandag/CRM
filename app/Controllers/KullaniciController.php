<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class KullaniciController extends BaseController
{

	protected $KullaniciModel;
	protected $YerlesimModel;
	protected $YetkiModel;

	public function __construct()
	{

		$this->KullaniciModel = new \App\Models\Kullanici\KullaniciModel();
		$this->YerlesimModel = new \App\Models\Yerlesim\YerlesimModel();
		$this->YetkiModel = new \App\Models\Kullanici\YetkiModel();

	}

	public function index()
	{
		$filter = removeHtml((Object) $this->request->getGet(), "OBJECT");

		$kullanicilar = $this->KullaniciModel->getAll($filter);
		$yetkiler = $this->YetkiModel->findAll();

		$data = [
			"kullanicilar" => $kullanicilar,
			"yetkiler" => $yetkiler,
			"filter" => $filter
		];

		return view("kullanici/kullanicilar", $data);
	}

	public function delete($id)
	{

        if($this->KullaniciModel->delete($id)){
            bilgiOlustur(["status" => TRUE, "message" => lang("Kullanici.remove_success")]);
        }else{
            bilgiOlustur(["status" => TRUE, "message" => lang("Kullanici.remove_error")]);
        }

        return redirect()->route("kullanici");

	}

	public function getir($id)
	{

    	$kullanici = $this->KullaniciModel->getAll((Object) ["id" => $id]);

    	$data = [
    		"status" => $kullanici ? true : false,
    		"result" => $kullanici ? $kullanici[0] : null,
    		"message" => ""
    	];

    	return $this->response->setJSON($data);

	}

	public function add()
	{

		$validation = $this->validate([
            "eposta" => "required|valid_email",
            "sifre"  => "required|min_length[8]|max_length[10]"
        ]);


		$posts = $this->request->getPost();
		$entity = new \App\Entities\Kullanici\KullaniciEntity();

		foreach($posts as $k=>$v){
			$posts[$k] = inputRemoveTag($v);
			$entity->$k = inputRemoveTag($v);
		}

		if($this->KullaniciModel->save($entity)){
			bilgiOlustur(["status" => TRUE, "message" => lang("Kullanici.form_add_success")]);
		}else{
			bilgiOlustur(["status" => FALSE, "message" => lang("Kullanici.form_add_error")]);
		}

		return redirect()->route("kullanici");

	}

}