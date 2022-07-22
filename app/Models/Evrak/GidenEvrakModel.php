<?php

namespace App\Models\Evrak;

use CodeIgniter\Model;

class GidenEvrakModel extends Model
{

    protected $table = 'giden_evraklar';
    // protected $primaryKey = 'id';

    // protected $useAutoIncrement = true;

    protected $returnType     = \App\Entities\Evrak\GidenEvrakEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = ['belge_no', 'tarih', 'alici_firma', 'alici_kisi', 'evrak_tur_id', 'ilgili_firma', 'kargo_firma', 'barkod_no', 'konu', 'arsiv_klasor_bilgi', 'ekleyen_id', 'guncelleyen_id'];

    protected $useTimestamps = false;
    protected $createdField  = 'ekleme_tarihi';
    protected $updatedField  = 'guncelleme_tarihi';
    protected $deletedField  = 'silme_tarihi';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getAll(Object $filter)
    {

        $builder = $this->builder($this->table);
        $builder = $builder->select("
            giden_evraklar.id as evrak_id,
            giden_evraklar.belge_no,
            giden_evraklar.tarih,
            giden_evraklar.alici_firma,
            giden_evraklar.alici_kisi,
            giden_evraklar.ilgili_firma,
            giden_evraklar.kargo_firma,
            giden_evraklar.konu,
            giden_evraklar.barkod_no,
            giden_evraklar.arsiv_klasor_bilgi,
            giden_evraklar.ekleyen_id,
            evrak_tur.tanim,
            sys_kullanici.adsoyad
        ");
        $builder = $builder->join("evrak_tur", "evrak_tur.id=giden_evraklar.evrak_tur_id");
        $builder = $builder->join("sys_kullanici", "sys_kullanici.id=giden_evraklar.ekleyen_id");
        
        if($this->tempUseSoftDeletes)
            $builder->where($this->table . '.' . $this->deletedField, null);
        if(isset($filter->tarih))
            $builder = $builder->where("giden_evraklar.tarih", $filter->tarih);
        if(isset($filter->alici_firma))
            $builder = $builder->like("giden_evraklar.alici_firma", $filter->alici_firma);
        if(isset($filter->belge_tur))
            $builder = $builder->where("giden_evraklar.evrak_tur_id", $filter->belge_tur);
        if(isset($filter->ilgili_firma))
            $builder = $builder->where("giden_evraklar.ilgili_firma", $filter->ilgili_firma);


        $builder = $builder->orderBy("giden_evraklar.id", "DESC");
        $builder = $builder->get();
        return $builder->getResult();

    }

    public function get(Object $filter)
    {

        $builder = $this->builder($this->table);
        $builder = $builder->select("*,
            giden_evraklar.id as evrak_id,
            giden_evraklar.belge_no,
            giden_evraklar.tarih,
            giden_evraklar.alici_firma,
            giden_evraklar.alici_kisi,
            giden_evraklar.ilgili_firma,
            giden_evraklar.kargo_firma,
            giden_evraklar.konu,
            giden_evraklar.barkod_no,
            giden_evraklar.arsiv_klasor_bilgi,
            giden_evraklar.ekleyen_id,
            evrak_tur.tanim,
            sys_kullanici.adsoyad
        ");
        $builder = $builder->join("evrak_tur", "evrak_tur.id=giden_evraklar.evrak_tur_id");
        $builder = $builder->join("sys_kullanici", "sys_kullanici.id=giden_evraklar.ekleyen_id");
        if(isset($filter->id))
            $builder = $builder->where("giden_evraklar.id", $filter->id);


        $builder = $builder->orderBy("gelen_evraklar.id", "DESC");
        $builder = $builder->get();
        return $builder->getResult();

    }

}