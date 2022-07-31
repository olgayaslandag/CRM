<?php

namespace App\Entities\Yerlesim;

use CodeIgniter\Entity\Entity;

class ilEntity extends Entity {

	protected $id;
	protected $tanim;


	protected $ekleyen_id;
	protected $ekleme_tarihi;
	protected $guncelleyen_id;
	protected $guncelleme_tarihi;
	protected $silme_tarihi;

	protected $dates = ["ekleme_tarihi", "guncelleme_tarihi", "silme_tarihi"];

}