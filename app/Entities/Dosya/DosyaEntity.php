<?php

namespace App\Entities\Dosya;

use CodeIgniter\Entity\Entity;

class DosyaEntity extends Entity {

	protected $id;
	protected $dosya_adi;
	protected $gelen_evrak_id;
	protected $giden_evrak_id;

	protected $ekleyen_id;
	protected $ekleme_tarihi;
	protected $guncelleyen_id;
	protected $guncelleme_tarihi;
	protected $silme_tarihi;

	protected $dates = ["ekleme_tarihi", "guncelleme_tarihi", "silme_tarihi"];

}