<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class WellController extends BaseController
{
	protected $WellModel;

	public function __construct()
	{
		$this->WellModel = new \App\Models\Kuyu\WellModel();
	}

	public function index()
	{
		$wells = $this->WellModel->getAll((Object) []);

		return view("kuyu/kuyular", [
			"kuyular" => $wells
		]);
	}

	public function ekle()
	{
		/*
		*--------------------------------------------------
		*    Clear special codes from POST
		*--------------------------------------------------
		*/
        $posts = removeHtml($this->request->getPost());


        /*
         *--------------------------------------------------
         *	Validation And Save Information
         *--------------------------------------------------
         */
		$validation = \Config\Services::validation();
        if($validation->run($posts, 'well')){
        	$entity = new \App\Entities\Kuyu\WellEntity();
        	$entity->tanim = $posts["tanim"];
        	$entity->ekleyen_id = $posts["ekleyen_id"];
        	$entity->yerlesim_id = $posts["yerlesim_id"];
        	$entity->aktif = 1;

        	if($this->WellModel->save($entity)){
                session()->set(["status" => true, "message" => lang("Kuyu.save_success")]);
            }else{
                session()->set(["status" => false, "message" => lang("Kuyu.save_error")]);
            }

        } else {
        	session()->set(["status" => false, "message" => implode("<br />", $validation->getErrors())]);
        }

		return redirect()->route("wellsView");
	}

	public function sil($id)
	{
		if($this->WellModel->delete($id)){
            bilgiOlustur(["status" => TRUE, "message" => lang("Kuyu.remove_success")]);
        }else{
            bilgiOlustur(["status" => TRUE, "message" => lang("Kuyu.remove_error")]);
        }

        return redirect()->route("wellsView");
	}
}