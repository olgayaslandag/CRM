<?php

namespace App\Entities\Atik;

use CodeIgniter\Entity\Entity;

class AtikBildirimEntity extends Entity {

	protected $id;
    protected $yerlesim_id;
	protected $atik_kod;
	protected $aciklama;
	protected $birim;
	protected $miktar;
	protected $notlar;
	protected $dosya;
	protected $ekleyen_id;
	protected $ekleme_tarihi;
	protected $guncelleyen_id;
	protected $guncelleme_tarihi;
	protected $silme_tarihi;

	protected $dates = ["ekleme_tarihi", "guncelleme_tarihi", "silme_tarihi"];

}