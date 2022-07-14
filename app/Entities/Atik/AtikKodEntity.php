<?php

namespace App\Entities\Atik;

use CodeIgniter\Entity\Entity;

class AtikKodEntity extends Entity {

	protected $id;
	protected $atik_kod;
	protected $aciklama;
	protected $kisa;
	protected $ekleyen_id;
	protected $ekleme_tarihi;
	protected $guncelleyen_id;
	protected $guncelleme_tarihi;
	protected $silme_tarihi;

	protected $dates = ["ekleme_tarihi", "guncelleme_tarihi", "silme_tarihi"];

}