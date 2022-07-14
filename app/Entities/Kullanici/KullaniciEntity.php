<?php

namespace App\Entities\Kullanici;

use CodeIgniter\Entity\Entity;

class KullaniciEntity extends Entity {

	protected $id;
	protected $adsoyad;
	protected $eposta;
	protected $telefon;
	protected $sifre;
	protected $aktif;
	protected $yetki_id;

	protected $ekleyen_id;
	protected $ekleme_tarihi;
	protected $guncelleyen_id;
	protected $guncelleme_tarihi;
	protected $silme_tarihi;

	protected $dates = ["ekleme_tarihi", "guncelleme_tarihi", "silme_tarihi"];

	public function setPassword(string $sifre)
    {
        $this->attributes['sifre'] = password_hash($sifre, PASSWORD_DEFAULT);

        return $this;
    }

}