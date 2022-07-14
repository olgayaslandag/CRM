<?php

namespace App\Controllers;


class EvrakController extends BaseController
{

	protected $GelenEvrakModel;

	public function __construct()
	{

		$this->GelenEvrakModel = new \App\Models\Evrak\GelenEvrakModel;

	}

	public function gelenler()
	{

		$filter = (Object) $this->request->getGet();

		foreach($filter as $k=>$v){
			if($v == "" || !$v){
				unset($filter->$k);
			}else{
				$filter->$k = inputRemoveTag($v);
			}
		}

		$EvrakTurModel = new \App\Models\Evrak\EvrakTurModel();


		$evraklar = $this->GelenEvrakModel->getAll($filter);
		$turler = $EvrakTurModel->orderBy("tanim", "ASC")->findAll();

		$data = [
			"evraklar" => $evraklar,
			"evrakTurler" => $turler,
			"filter" => $filter
		];
		return view("evrak/gelenler", $data);

	}

	public function gelen_ekle()
	{

		$validation = $this->validate([
            "belge_no" => "required",
            "tarih"  	=> "required",
            "alici_firma" => "required",
            "tur"  		=> "required",
            "ilgili_firma" => "required",
            "konu"  	=> "required",
        ]);

        if(!$validation){
            session()->set(["status" => false, "message" => $this->validator->getErrors()]);
    		return redirect()->back();
        }



		$entity = new \App\Entities\Evrak\GelenEvrakEntity;
		$posts = $this->request->getPost();
		foreach($posts as $k=>$v){
			$posts[$k] = inputRemoveTag($v);
			$entity->$k = $v;
		}

		if($this->GelenEvrakModel->save($entity)){
			session()->set(["status" => true, "message" => lang("Evrak.save_success")]);
		} else {
			session()->set(["status" => false, "message" => lang("Evrak.save_error")]);
		}

		return redirect("/")->route("evrak/gelen");

	}

	public function gelen_sil($id)
    {

        if($this->GelenEvrakModel->delete($id)){
            bilgiOlustur(["status" => TRUE, "message" => lang("Evrak.remove_success")]);
        }else{
            bilgiOlustur(["status" => FALSE, "message" => lang("Evrak.remove_error")]);
        }

        return redirect("/")->route("evrak/gelen");

    }

    public function gelen_detay($id)
    {

    	$filter = (Object) ["id" => $id];
    	$evrak = $this->GelenEvrakModel->get($filter);

    	$data = [
    		"status" => $evrak ? true : false,
    		"result" => $evrak ? $evrak[0] : null,
    		"message" => ""
    	];

    	return $this->response->setJSON($data);

    }

}