<?php

namespace App\Entities\Kullanici;

use CodeIgniter\Entity\Entity;

class YetkiEntity extends Entity {

	protected $id;
	protected $tanim;

	protected $ekleyen_id;
	protected $ekleme_tarihi;
	protected $guncelleyen_id;
	protected $guncelleme_tarihi;
	protected $silme_tarihi;

	protected $dates = ["ekleme_tarihi", "guncelleme_tarihi", "silme_tarihi"];

}