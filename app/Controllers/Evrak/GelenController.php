<?php

namespace App\Controllers\Evrak;

use App\Controllers\BaseController;

class GelenController extends BaseController
{
    protected $GelenEvrakModel;

    public function __construct()
    {

        $this->GelenEvrakModel = new \App\Models\Evrak\GelenEvrakModel;
        $this->DosyaModel = new \App\Models\Dosya\DosyaModel;
        $this->upload = new \App\Libraries\Upload;

    }

    public function index()
    {
        $filter = removeHtml((Object) $this->request->getGet(), "OBJECT");
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

    public function ekle()
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
            $last_id = $this->GelenEvrakModel->last_id();

            $entity = new \App\Entities\Evrak\GelenEvrakEntity;
            $posts = $this->request->getPost();
            foreach($posts as $k=>$v){
                $posts[$k] = inputRemoveTag($v);
                $entity->$k = $v;
            }
            $entity->produceDocNo($last_id);

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

        return redirect()->route("gelenlerView");

    }

    public function sil($id)
    {

        if($this->GelenEvrakModel->delete($id)){
            bilgiOlustur(["status" => TRUE, "message" => lang("Evrak.remove_success")]);
        }else{
            bilgiOlustur(["status" => FALSE, "message" => lang("Evrak.remove_error")]);
        }

        return redirect()->route("gelenlerView");

    }

    public function detay($id)
    {

        $filter = (Object) ["id" => $id];
        $evrak = $this->GelenEvrakModel->get($filter);

        if($evrak){
            $path = WRITEPATH . 'uploads/' . date("Ymd", strtotime($evrak[0]->dosya_tarih)) . "/" . $evrak[0]->dosya_adi;
            $file = new \CodeIgniter\Files\File($path);
            $evrak[0]->dosya_url = $file->getRealPath();
        }

        $data = [
            "status" => $evrak ? true : false,
            "result" => $evrak ? $evrak[0] : null,
            "message" => ""
        ];

        return $this->response->setJSON($data);

    }
}
