<?php

namespace App\Entities\Birim;

use CodeIgniter\Entity\Entity;

class BirimEntity extends Entity {

	protected $id;
	protected $ad;
	protected $ekleyen_id;
	protected $ekleme_tarihi;
	protected $guncelleyen_id;
	protected $guncelleme_tarihi;
	protected $silme_tarihi;

	protected $dates = ["ekleme_tarihi", "guncelleme_tarihi", "silme_tarihi"];

}