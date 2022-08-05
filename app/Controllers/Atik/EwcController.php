<?php

namespace App\Controllers\Atik;

use App\Controllers\BaseController;
use App\Entities\Atik\AtikKodEntity;
use App\Models\Atik\EwcModel;
use App\Models\Birim\BirimModel;

class EwcController extends BaseController
{
    protected $BirimModel;
    protected $EwcModel;

    public function __construct()
    {
        $this->BirimModel  = new BirimModel();
        $this->EwcModel  = new EwcModel();
    }

    public function index()
    {
        $birimler    = $this->BirimModel->findAll();
        $siniflar = ["Tehlikeli", "Tehlikesiz", "Muamma"];


        $ewc_kodlar = $this->EwcModel->orderBy("id", "DESC")->findAll();

        $data = [
            "birimler" => $birimler,
            "siniflar" => $siniflar,
            "ewc_kodlar" => $ewc_kodlar
        ];

        return view("atik/ewc_kodlar", $data);
    }

    public function ekle()
    {
        $EWCModel = new \App\Models\Atik\EwcModel();

        $posts = $this->request->getPost();
        foreach($posts as $k=>$v){
            $posts[$k] = inputRemoveTag($v);
        }

        $entity = new AtikKodEntity();
        $entity->kod            = $posts["kod"];
        $entity->aciklama       = $posts["aciklama"];
        $entity->kisa           = $posts["kisa"];
        $entity->sinif          = $posts["sinif"];
        $entity->birim_id       = $posts["birim"];
        $entity->ekleyen_id     = $posts["user_id"];
        $entity->guncelleyen_id = $posts["user_id"];

        $EWCModel->save($entity);
        return redirect()->route('ewc_kodlar');
    }

    public function sil($id)
    {
        $proccess = $this->EwcModel->delete($id);
        if($proccess){
            bilgiOlustur(["status" => TRUE, "message" => lang("Ewc.remove_success")]);
        }else{
            bilgiOlustur(["status" => TRUE, "message" => lang("Ewc.remove_error")]);
        }
        return redirect()->route("ewc_kodlar");
    }

    public function import()
    {
        echo json_encode($this->request->getPost());
    }
}
