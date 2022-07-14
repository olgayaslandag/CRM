<?php

namespace App\Entities\Yerlesim;

use CodeIgniter\Entity\Entity;

class YerlesimEntity extends Entity {

	protected $id;
	protected $unvan;
	protected $adres;
	protected $tel;
	protected $faks;
	protected $eposta;
	protected $vergi_daire;
	protected $vergi_no;
	protected $il_id;
	protected $ilce_id;
	protected $yerlesim_tip;


	protected $ekleyen_id;
	protected $ekleme_tarihi;
	protected $guncelleyen_id;
	protected $guncelleme_tarihi;
	protected $silme_tarihi;

	protected $dates = ["ekleme_tarihi", "guncelleme_tarihi", "silme_tarihi"];

}