<?php

namespace App\Entities\Kuyu;

use CodeIgniter\Entity\Entity;

class WellEntity extends Entity {

	protected $id;
	protected $tanim;
	protected $yerlesim_id;
	protected $aktif;

	protected $ekleyen_id;
	protected $ekleme_tarihi;
	protected $guncelleyen_id;
	protected $guncelleme_tarihi;
	protected $silme_tarihi;

	protected $dates = ["ekleme_tarihi", "guncelleme_tarihi", "silme_tarihi"];

}