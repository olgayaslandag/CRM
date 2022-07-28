<?php

namespace App\Controllers;

class EvrakController extends BaseController
{

	protected $GelenEvrakModel;
	protected $GidenEvrakModel;
	protected $DosyaModel;
	protected $upload;

	public function __construct()
	{

		$this->GelenEvrakModel = new \App\Models\Evrak\GelenEvrakModel;
		$this->GidenEvrakModel = new \App\Models\Evrak\GidenEvrakModel;
		$this->DosyaModel = new \App\Models\Dosya\DosyaModel;
		$this->upload = new \App\Libraries\Upload;

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
            "belge_no" 		=> "required",
            "tarih"  		=> "required",
            "alici_firma" 	=> "required",
            "evrak_tur_id" 	=> "required",
            "ilgili_firma" 	=> "required",
            "konu"  		=> "required",
        ]);

        if(!$validation){
            session()->set(["status" => false, "message" => $this->validator->getErrors()]);
    		return redirect()->back();
        }




        $dosya = $this->upload->upload($this->request->getFile("dosya"));
        
        if($dosya["status"]){
        	$entity = new \App\Entities\Evrak\GelenEvrakEntity;
			$posts = $this->request->getPost();
			foreach($posts as $k=>$v){
				$posts[$k] = inputRemoveTag($v);
				$entity->$k = $v;
			}

			if($this->GelenEvrakModel->save($entity)){

				$dosyaEntity = new \App\Entities\Dosya\DosyaEntity;
				$dosyaEntity->dosya_adi = $dosya["result"];
				$dosyaEntity->gelen_evrak_id = $this->GelenEvrakModel->getInsertID();
				$dosyaEntity->ekleyen_id = $posts["ekleyen_id"];
				$this->DosyaModel->save($dosyaEntity);


				session()->set(["status" => true, "message" => lang("Evrak.save_success")]);

			} else {

				session()->set(["status" => false, "message" => lang("Evrak.save_error")]);

			}

        }else{

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

    public function gidenler()
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


		$evraklar = $this->GidenEvrakModel->getAll($filter);
		$turler = $EvrakTurModel->orderBy("tanim", "ASC")->findAll();

		$data = [
			"evraklar" => $evraklar,
			"evrakTurler" => $turler,
			"filter" => $filter
		];
		return view("evrak/gidenler", $data);

	}

	public function giden_ekle()
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



		$entity = new \App\Entities\Evrak\GidenEvrakEntity;
		$posts = $this->request->getPost();
		foreach($posts as $k=>$v){
			$posts[$k] = inputRemoveTag($v);
			$entity->$k = $v;
		}

		if($this->GidenEvrakModel->save($entity)){
			session()->set(["status" => true, "message" => lang("Evrak_giden.save_success")]);
		} else {
			session()->set(["status" => false, "message" => lang("Evrak_giden.save_error")]);
		}

		return redirect("/")->route("evrak/giden");

	}


}