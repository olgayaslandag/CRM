<?php

namespace App\Controllers\Birim;

use App\Controllers\BaseController;
use App\Entities\Birim\BirimEntity;
use App\Models\Birim\BirimModel;

class BirimController extends BaseController
{
    protected $BirimModel;
    protected $BirimEntity;

    public function __construct()
    {

        $this->BirimModel = new BirimModel();
        $this->BirimEntity = new BirimEntity();

    }

    public function index()
    {

        $birimler = $this->BirimModel->findAll();

        $data = [
            "birimler" => $birimler
        ];

        return view("birim/birimler", $data);

    }

    public function ekle()
    {

        $posts = $this->request->getPost();

        foreach($posts as $k=>$v){
            $posts[$k] = inputRemoveTag($v);
        }

        $this->BirimEntity->ad = $posts["ad"];
        $this->BirimEntity->ekleyen_id = $posts["user_id"];
        $this->BirimEntity->guncelleyen_id = $posts["user_id"];

        $id = $this->BirimModel->save($this->BirimEntity);

        if($id){
            bilgiOlustur(["status" => TRUE, "message" => lang("Birim.save_success")]);
        }else{
            bilgiOlustur(["status" => TRUE, "message" => lang("Birim.save_error")]);
        }


        return redirect()->route('birimler'); exit;

    }

    public function sil($id)
    {

        if($this->BirimModel->delete($id)){
            bilgiOlustur(["status" => TRUE, "message" => lang("Birim.remove_success")]);
        }else{
            bilgiOlustur(["status" => TRUE, "message" => lang("Birim.remove_error")]);
        }

        return redirect()->route("birimler"); exit;

    }
}
