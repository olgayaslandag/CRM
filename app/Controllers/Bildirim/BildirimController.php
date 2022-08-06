<?php

namespace App\Controllers\Bildirim;

use App\Controllers\BaseController;
use App\Entities\Atik\AtikBildirimEntity;

use App\Models\Atik\AtikBildirimModel;
use App\Models\Atik\AtikKodModel;
use App\Models\Birim\BirimModel;

class BildirimController extends BaseController
{
    protected $BildirimModel;
    protected $AtikKodModel;
    protected $BirimModel;

    public function __construct()
    {
        $this->BildirimModel = new AtikBildirimModel();
        $this->AtikKodModel = new AtikKodModel();
        $this->BirimModel = new BirimModel();
    }

    public function index()
    {
        $bildirimler = $this->BildirimModel->getall();
        $atikKodlar = $this->AtikKodModel->findAll();
        $birimler = $this->BirimModel->findAll();


        $data = [
            "bildirimler" => $bildirimler,
            "atik_kodlar" => $atikKodlar,
            "birimler" => $birimler
        ];

        return view("atik/bildirimler", $data);
    }

    public function ekle()
    {
        $posts = $this->request->getPost();

        $entity = new AtikBildirimEntity();
        $entity->atik_kod = $posts["kod"];
        $entity->aciklama = $posts["aciklama"];
        $entity->birim = $posts["birim"];
        $entity->miktar = $posts["miktar"];
        $entity->notlar = $posts["notlar"];
        $entity->dosya = $posts["dosya"];
        $entity->ekleyen_id = $posts["user_id"];
        $entity->guncelleyen_id = $posts["user_id"];

        $id = $this->BildirimModel->save($entity);

        if($id){
            bilgiOlustur(["status" => TRUE, "message" => lang("AtikBildirim.add_success")]);
        }else{
            bilgiOlustur(["status" => FALSE, "message" => lang("AtikBildirim.add_remove")]);
        }

        return redirect()->route('atik_bildirimleri');
    }

    public function sil($id)
    {
        if($this->AtikBildirimModel->delete($id)){
            bilgiOlustur(["status" => TRUE, "message" => lang("AtikBildirim.remove_success")]);
        }else{
            bilgiOlustur(["status" => FALSE, "message" => lang("AtikBildirim.remove_error")]);
        }

        return redirect()->route("atik_bildirimleri");
    }
}
