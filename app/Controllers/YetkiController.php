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


    	$this->UserEntity->adsoyad = "Olgay Aslandağ";
    	$this->UserEntity->eposta = "olgay@toracevre.com";
    	$this->UserEntity->telefon = "05334137209";
    	$this->UserEntity->setPassword("Tora12345.");
    	$this->UserEntity->aktif = 1;
    	$this->UserEntity->ekleyen_id = 1;
    	$this->UserEntity->guncelleyen_id = 1;

    	
    	return $this->response->setJSON($model->findAll());

    }

    public function cikis()
    {
        echo "Çıkış yapılıyor.";
        session_destroy();
        return redirect()->route('giris'); exit;

    }

}
