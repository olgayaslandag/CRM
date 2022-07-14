<?php

namespace App\Entities\Atik;

use CodeIgniter\Entity\Entity;

class EwcEntity extends Entity {

	protected $id;
	protected $atik_kod_id;
	protected $aciklama;
	protected $kisa;
	protected $sinif;
	protected $birim_id;
	protected $ekleyen_id;
	protected $ekleme_tarihi;
	protected $guncelleyen_id;
	protected $guncelleme_tarihi;
	protected $silme_tarihi;

	protected $dates = ["ekleme_tarihi", "guncelleme_tarihi", "silme_tarihi"];

}