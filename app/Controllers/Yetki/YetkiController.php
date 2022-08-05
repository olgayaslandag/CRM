<?php

namespace App\Controllers\Yetki;

use App\Controllers\BaseController;
use App\Entities\Kullanici\KullaniciEntity;
use App\Models\Kullanici\KullaniciModel;

class YetkiController extends BaseController
{
    protected $UserModel;
    protected $UserEntity;

    public function __construct()
    {

        $this->UserModel = new KullaniciModel();
        $this->UserEntity = new KullaniciEntity();

    }

    public function index()
    {

        return view('yetki/login');
    }

    public function girisPost()
    {
        /*
        *--------------------------------------------------
        *    Clear special codes from POST
        *--------------------------------------------------
        */
        $posts = removeHtml($this->request->getPost());





        /*
         *--------------------------------------------------
         *    Check validation inputs
         *--------------------------------------------------
         */
        $validation = \Config\Services::validation();
        if(!$validation->run($posts, 'login')){
            return redirect()->back()->withInput()->with('validation', $validation->getErrors());
        }




        /*
         *--------------------------------------------------
         *    Find the user and proccess other actions
         *--------------------------------------------------
         */
        $user = $this->UserModel->where(["eposta" => $posts["eposta"]])->first();
        if(!$user){

            return redirect()->back()->withInput()->with("validation", ["eposta" => "Sistemde kayıtlı kullanıcı bulunamdı!"]);

        } else {

            if(!password_verify($posts["sifre"], $user->sifre)) {

                return redirect()->back()->with("validation", ["sifre" => "Şifre doğru değil!"]);

            }else{

                session()->set("id", $user->id);
                session()->set("adsoyad", $user->adsoyad);
                session()->set("telefon", $user->telefon);
                session()->set("eposta", $user->eposta);
                session()->set("login", true);

                return redirect("/");

            }

        }

    }

    public function kullaniciEkle()
    {

        /*
         *--------------------------------------------------
         *    Clear special codes from POST
         *--------------------------------------------------
         */
        $posts = removeHtml($this->request->getPost());




        /*
         *--------------------------------------------------
         *    Validation Rules Check
         *--------------------------------------------------
         */
        $validation = \Config\Services::validation();
        if($validation->run($posts, 'user')){

            $this->UserEntity->adsoyad = $posts["adsoyad"];
            $this->UserEntity->eposta = $posts["eposta"];
            $this->UserEntity->telefon = $posts["telefon"];
            $this->UserEntity->setPassword($posts["sifre"]);
            $this->UserEntity->aktif = 1;
            $this->UserEntity->ekleyen_id = 1;
            $this->UserEntity->guncelleyen_id = 1;

            if($this->UserModel->save($this->UserEntity)){
                session()->set(["status" => true, "message" => lang("Yetki.save_success")]);
                return redirect()->route("loginView");
            }else{
                session()->set(["status" => false, "message" => lang("Yetki.save_error")]);
                return redirect()->back()->withInput();
            }

        } else {
            session()->set(["status" => false, "message" => implode("<br />", $validation->getErrors())]);
            return redirect()->back()->withInput();
        }

    }

    public function cikis()
    {
        echo "Çıkış yapılıyor.";
        session_destroy();
        return redirect()->route("loginView");

    }

    public function kayit()
    {
        return view('yetki/register');
    }

    public function sifremi_unuttum()
    {
        return view("yetki/sifremi_unuttum");
    }

    public function remember_action()
    {
        $posts = removeHtml($this->request->getPost());

        $user = $this->UserModel->where("eposta", $posts["eposta"])->find();

        if($user){
            session()->set(["status" => true, "message" => lang("Yetki.remember_success")]);
            return redirect()->route("loginView");
        } else {
            session()->set(["status" => false, "message" => lang("Yetki.remember_error")]);
            return redirect()->back()->withInput();
        }
    }
}
