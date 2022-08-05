<?php

namespace App\Controllers\Evrak;

use App\Controllers\BaseController;

class GidenController extends BaseController
{
    protected $GidenModel;

    public function __construct()
    {
        $this->GidenModel = new \App\Models\Evrak\GelenEvrakModel;
        $this->DosyaModel = new \App\Models\Dosya\DosyaModel;
        $this->upload = new \App\Libraries\Upload;

    }

    public function index()
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


        $evraklar = $this->GidenModel->getAll($filter);
        $turler = $EvrakTurModel->orderBy("tanim", "ASC")->findAll();

        $data = [
            "evraklar" => $evraklar,
            "evrakTurler" => $turler,
            "filter" => $filter
        ];
        return view("evrak/gidenler", $data);

    }

    public function ekle()
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
            return redirect()->back()->withInput();
        }



        $entity = new \App\Entities\Evrak\GidenEvrakEntity;
        $posts = $this->request->getPost();
        foreach($posts as $k=>$v){
            $posts[$k] = inputRemoveTag($v);
            $entity->$k = $v;
        }

        if($this->GidenModel->save($entity)){
            session()->set(["status" => true, "message" => lang("Evrak_giden.save_success")]);
        } else {
            session()->set(["status" => false, "message" => lang("Evrak_giden.save_error")]);
        }

        return redirect()->route("gidenlerView");

    }
}
