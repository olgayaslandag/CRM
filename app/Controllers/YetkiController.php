<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Entities\UserEntity;

class YetkiController extends BaseController
{

	protected UserModel $UserModel;
	protected UserEntity $UserEntity;

	public function __construct()
	{

		$this->UserModel = new UserModel();
		$this->UserEntity = new UserEntity();

	}

    public function index()
    {

        return view('yetki/login');
    }

    public function girisPost()
    {

        $validation = $this->validate([
            "eposta" => "required|valid_email",
            "sifre"  => "required|min_length[8]|max_length[10]"
        ]);

        if(!$validation){
            $data = ["validation" => $this->validator->getErrors()];
            return view("yetki/login", $data);
        }





    	$posts = (Object) $this->request->getPost();

    	$user = $this->UserModel->where(["eposta" => $posts->eposta])->first();
    	if(!$user){

    		session()->set(["status" => false, "message" => "Sistemde kayıtlı kullanıcı bulunamadı!"]);
    		return redirect()->back();

    	} else {

    		if(!password_verify($posts->sifre, $user->sifre)) {

    			session()->set(["status" => false, "message" => "Şifre doğru değil!"]);
    			return redirect()->back();

    		}else{

    			session()->set("id", $user->id);
    			session()->set("adsoyad", $user->adsoyad);
    			session()->set("telefon", $user->telefon);
    			session()->set("eposta", $user->eposta);
    			session()->set("login", true);

    			return redirect("/");

    		}

    	}
    	//return $this->response->setJSON($epostaBul);

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
        return redirect()->route("loginView"); exit;

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
