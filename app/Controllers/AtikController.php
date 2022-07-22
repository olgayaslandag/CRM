<?php

namespace App\Controllers;

use App\Models\Atik\AtikKodModel;
use App\Entities\Atik\AtikKodEntity;

use App\Models\Atik\SevkiyatModel;
use App\Entities\Atik\SevkiyatEntity;

use App\Models\Atik\AtikBildirimModel;
use App\Entities\Atik\AtikBildirimEntity;

use App\Models\Birim\BirimModel;
use App\Entities\Birim\BirimEntity;

use App\Models\Atik\EwcModel;
use App\Entities\Atik\EwcEntity;

use App\Enums\SinifEnum;

class AtikController extends BaseController
{

    protected $AtikKodModel;
    protected $SevkiyatModel;

    protected $AtikBildirimModel;

    protected $BirimModel;

    protected $EwcModel;

    public function __construct()
    {

        $this->AtikKodModel  = new AtikKodModel();
        $this->SevkiyatModel = new SevkiyatModel();

        $this->AtikBildirimModel  = new AtikBildirimModel();
        $this->BirimModel  = new BirimModel();
        $this->EwcModel  = new EwcModel();

    }
    
    public function index()
    {
        
        return view('welcome_message');

    }

    public function kodlar()
    {
        $AtikKodModel = new AtikKodModel();

        $kodlar = $AtikKodModel->findAll();

        $data = [
            "kodlar" => $kodlar,
        ];
        return view("atik/kodlar", $data);

    }

    public function ekle()
    {

        $AtikKodModel = new AtikKodModel(); 

        $posts = $this->request->getPost();
        foreach($posts as $k=>$v){
            $posts[$k] = inputRemoveTag($v);
        }

        $entity = new AtikKodEntity();
        $entity->kod            = $posts["kod"];
        $entity->aciklama       = $posts["aciklama"];
        $entity->kisa           = $posts["kisa"];
        $entity->ekleyen_id     = $posts["user_id"];
        $entity->guncelleyen_id = $posts["user_id"];

        $AtikKodModel->save($entity);
        return redirect()->route('atik_kodlar'); exit;

    }

    public function sil($id)
    {

        $AtikKodModel = new AtikKodModel();

        if($AtikKodModel->delete($id)){
            bilgiOlustur(["status" => TRUE, "message" => lang("Atik.remove_success")]);
        }else{
            bilgiOlustur(["status" => TRUE, "message" => lang("Atik.remove_error")]);
        }

        return redirect()->route("atik_kodlar");

    }

    public function sevkiyat()
    {

        $atik_kodlar = $this->AtikKodModel->findAll();
        $sevkiyatlar = $this->SevkiyatModel->getAll();

        $data = [
            "kodlar" => $atik_kodlar,
            "sevkiyatlar" => $sevkiyatlar
        ];

        return view("atik/sevkiyat", $data);

    }

    public function sevkiyat_ekle()
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

    public function sevkiyat_sil($id)
    {

        if($this->SevkiyatModel->delete($id)){
            bilgiOlustur(["status" => TRUE, "message" => lang("Sevkiyat.remove_success")]);
        }else{
            bilgiOlustur(["status" => FALSE, "message" => lang("Sevkiyat.remove_error")]);
        }

        return redirect()->route("atik_kodlar/sevkiyat"); exit;

    }

    public function bildirimler()
    {

        $bildirimler = $this->AtikBildirimModel->getall();
        $atikKodlar = $this->AtikKodModel->findAll();
        $birimler = $this->BirimModel->findAll();


        $data = [
            "bildirimler" => $bildirimler,
            "atik_kodlar" => $atikKodlar,
            "birimler" => $birimler
        ];

        return view("atik/bildirimler", $data);

    }

    public function bildirim_ekle()
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

        $id = $this->AtikBildirimModel->save($entity);

        if($id){
            bilgiOlustur(["status" => TRUE, "message" => lang("AtikBildirim.add_success")]);
        }else{
            bilgiOlustur(["status" => FALSE, "message" => lang("AtikBildirim.add_remove")]);
        }

        return redirect()->route('atik_bildirimleri'); exit;

    }

    public function bildirim_sil($id)
    {

        if($this->AtikBildirimModel->delete($id)){
            bilgiOlustur(["status" => TRUE, "message" => lang("AtikBildirim.remove_success")]);
        }else{
            bilgiOlustur(["status" => FALSE, "message" => lang("AtikBildirim.remove_error")]);
        }

        return redirect()->route("atik_kodlar/sevkiyat"); exit;

    }

    public function ewc_kodlar()
    {

        $atik_kodlar = $this->AtikKodModel->findAll();
        $birimler    = $this->BirimModel->findAll();
        $siniflar = ["Tehlikeli", "Tehlikesiz", "Muamma"];


        $ewc_kodlar = $this->EwcModel->findAll();

        $data = [
            "atik_kodlar" => $atik_kodlar,
            "birimler" => $birimler,
            "siniflar" => $siniflar,
            "ewc_kodlar" => $ewc_kodlar
        ];

        return view("atik/ewc_kodlar", $data);

    }

    public function ewc_import()
    {
        echo json_encode($this->request->getPost());
    }

}
