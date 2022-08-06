<?php

namespace App\Entities\Atik;

use CodeIgniter\Entity\Entity;

class SevkiyatEntity extends Entity {

	protected $id;
    protected $bildirim_id;
	protected $atik_kod;
	protected $tarih;
	protected $miktar;
	protected $birim;
	protected $plaka;
	protected $bertaraf;
	protected $motat;
	protected $km;



	protected $ekleyen_id;
	protected $ekleme_tarihi;
	protected $guncelleyen_id;
	protected $guncelleme_tarihi;
	protected $silme_tarihi;

	protected $dates = ["ekleme_tarihi", "guncelleme_tarihi", "silme_tarihi"];

}