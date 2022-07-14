<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class YerlesimController extends BaseController
{

	public function index()
	{

		$YerlesimModel = new \App\Models\Yerlesim\YerlesimModel();
		$yerlesimler = $YerlesimModel->findAll();

		$data = [
			"yerlesimler" => $yerlesimler
		];

		return view("yerlesim/yerlesimler", $data);

	}

	public function ekle()
	{

		$entity = new \App\Entities\Yerlesim\YerlesimEntity();

		$posts = $this->request->getPost();


		foreach($posts as $k=>$v){
			$posts[$k] = inputRemoveTag($v);
			$entity->$k = inputRemoveTag($v);
		}
		
		$model = new \App\Models\Yerlesim\YerlesimModel();

		if($model->save($entity)){
			bilgiOlustur(["status" => TRUE, "message" => lang("Yerlesim.form_add_success")]);
		}else{
			bilgiOlustur(["status" => FALSE, "message" => lang("Yerlesim.form_add_error")]);
		}

		return redirect("/")->route("yerlesim");

	}

	public function getir($id)
	{

		$YerlesimModel = new \App\Models\Yerlesim\YerlesimModel();

		$yerlesim = $YerlesimModel->find($id);

		$data = [
			"status" => $yerlesim ? TRUE : FALSE,
			"result" => $yerlesim ? $yerlesim : null,
			"message"=> null
		];
		return $this->response->setJSON($data);

	}

	public function delete($id)
	{

		$YerlesimModel = new \App\Models\Yerlesim\YerlesimModel();

        if($YerlesimModel->delete($id)){
            bilgiOlustur(["status" => TRUE, "message" => lang("Yerlesim.remove_success")]);
        }else{
            bilgiOlustur(["status" => TRUE, "message" => lang("Yerlesim.remove_error")]);
        }

        return redirect()->route("yerlesim");

	}

}