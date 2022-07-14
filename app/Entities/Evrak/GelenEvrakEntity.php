<?php

namespace App\Entities\Evrak;

use CodeIgniter\Entity\Entity;

class GelenEvrakEntity extends Entity {

	protected $id;
	protected $belge_no;
	protected $tarih;
	protected $alici_firma;
	protected $alici_kisi;
	protected $evrak_tur_id;
	protected $ilgili_firma;
	protected $ilgili_firma2;
	protected $ilgili_firma3;
	protected $kargo_firma;
	protected $barkod_no;
	protected $konu;
	protected $arsiv_klasor_bilgi;
	
	protected $ekleyen_id;
	protected $ekleme_tarihi;
	protected $guncelleyen_id;
	protected $guncelleme_tarihi;
	protected $silme_tarihi;

	protected $dates = ["ekleme_tarihi", "guncelleme_tarihi", "silme_tarihi"];

}