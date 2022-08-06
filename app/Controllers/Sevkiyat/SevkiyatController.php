<?php

namespace App\Controllers\Sevkiyat;

use App\Controllers\BaseController;
use App\Entities\Atik\SevkiyatEntity;

use App\Models\Atik\AtikBildirimModel;
use App\Models\Atik\AtikKodModel;
use App\Models\Atik\SevkiyatModel;

class SevkiyatController extends BaseController
{
    protected $AtikKodModel;
    protected $SevkiyatModel;
    protected $BildirimModel;

    public function __construct()
    {
        $this->AtikKodModel = new AtikKodModel();
        $this->SevkiyatModel = new SevkiyatModel();
        $this->BildirimModel = new AtikBildirimModel();
    }

    public function index()
    {
        $atik_kodlar = $this->AtikKodModel->findAll();
        $sevkiyatlar = $this->SevkiyatModel->getAll();
        $bildirimler = $this->BildirimModel->getInSevkiyat();
        $data = [
            "kodlar" => $atik_kodlar,
            "sevkiyatlar" => $sevkiyatlar,
            "bildirimler" => $bildirimler
        ];
        return view("atik/sevkiyat", $data);
    }

    public function ekle()
    {
        $posts = $this->request->getPost();
        foreach($posts as $k=>$v){
            $posts[$k] = inputRemoveTag($v);
        }


        $entity = new SevkiyatEntity();
        $entity->atik_kod = intval($posts["kod"]);
        $entity->tarih = $posts["tarih"];
        $entity->miktar = $posts["miktar"];
        $entity->birim = $posts["birim"];
        $entity->plaka = $posts["plaka"];
        $entity->bertaraf = $posts["bertaraf"];
        $entity->motat = $posts["motat"];
        $entity->km = $posts["km"];


        $id = $this->SevkiyatModel->save($entity);

        if($id){
            bilgiOlustur(["status" => TRUE, "message" => "Atık sevkiyatı sistemden başarıyla silindi."]);
        }else{
            bilgiOlustur(["status" => FALSE, "message" => "Atık sevkiyatı sistemden silinemedi!"]);
        }

        return redirect()->route('atik_kodlar/sevkiyat'); exit;
    }

    public function sil($id)
    {
        if($this->SevkiyatModel->delete($id)){
            bilgiOlustur(["status" => TRUE, "message" => lang("Sevkiyat.remove_success")]);
        }else{
            bilgiOlustur(["status" => FALSE, "message" => lang("Sevkiyat.remove_error")]);
        }

        return redirect()->route("atik_kodlar/sevkiyat"); exit;
    }
}
