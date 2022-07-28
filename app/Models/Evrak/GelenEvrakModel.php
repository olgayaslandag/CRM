<?php

namespace App\Models\Evrak;

use CodeIgniter\Model;

class GelenEvrakModel extends Model
{

    protected $table = 'gelen_evraklar';
    // protected $primaryKey = 'id';

    // protected $useAutoIncrement = true;

    protected $returnType     = \App\Entities\Evrak\GelenEvrakEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = ['belge_no', 'tarih', 'alici_firma', 'alici_kisi', 'evrak_tur_id', 'ilgili_firma', 'ilgili_firma2', 'ilgili_firma3', 'kargo_firma', 'barkod_no', 'konu', 'arsiv_klasor_bilgi', 'ekleyen_id', 'guncelleyen_id'];

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
            gelen_evraklar.id as evrak_id,
            gelen_evraklar.belge_no,
            gelen_evraklar.tarih,
            y_alici.unvan as alici_firma,
            gelen_evraklar.alici_kisi,
            y_ilgili.unvan as ilgili_firma,
            y_kargo.unvan as kargo_firma,
            gelen_evraklar.konu,
            gelen_evraklar.barkod_no,
            gelen_evraklar.arsiv_klasor_bilgi,
            gelen_evraklar.ekleyen_id,
            evrak_tur.tanim,
            sys_kullanici.adsoyad
        ");
        $builder = $builder->join("evrak_tur", "evrak_tur.id=gelen_evraklar.evrak_tur_id");
        $builder = $builder->join("sys_kullanici", "sys_kullanici.id=gelen_evraklar.ekleyen_id");
        $builder = $builder->join("yerlesimler as y_alici", "y_alici.id=gelen_evraklar.alici_firma");
        $builder = $builder->join("yerlesimler as y_ilgili", "y_ilgili.id=gelen_evraklar.ilgili_firma");
        $builder = $builder->join("yerlesimler as y_kargo", "y_kargo.id=gelen_evraklar.kargo_firma", "LEFT");
        
        if($this->tempUseSoftDeletes)
            $builder->where($this->table . '.' . $this->deletedField, null);
        if(isset($filter->tarih))
            $builder = $builder->where("gelen_evraklar.tarih", $filter->tarih);
        if(isset($filter->alici_firma))
            $builder = $builder->like("gelen_evraklar.alici_firma", $filter->alici_firma);
        if(isset($filter->belge_tur))
            $builder = $builder->where("gelen_evraklar.evrak_tur_id", $filter->belge_tur);
        if(isset($filter->ilgili_firma))
            $builder = $builder->where("gelen_evraklar.ilgili_firma", $filter->ilgili_firma);


        $builder = $builder->orderBy("gelen_evraklar.id", "DESC");
        $builder = $builder->get();
        return $builder->getResult();

    }

    public function get(Object $filter)
    {

        $builder = $this->builder($this->table);
        $builder = $builder->select("*,
            gelen_evraklar.id as evrak_id,
            gelen_evraklar.belge_no,
            gelen_evraklar.tarih,
            gelen_evraklar.alici_firma,
            gelen_evraklar.alici_kisi,
            gelen_evraklar.ilgili_firma,
            gelen_evraklar.ilgili_firma2,
            gelen_evraklar.ilgili_firma3,
            gelen_evraklar.kargo_firma,
            gelen_evraklar.konu,
            gelen_evraklar.barkod_no,
            gelen_evraklar.arsiv_klasor_bilgi,
            gelen_evraklar.ekleyen_id,
            evrak_tur.tanim,
            sys_kullanici.adsoyad
        ");
        $builder = $builder->join("evrak_tur", "evrak_tur.id=gelen_evraklar.evrak_tur_id");
        $builder = $builder->join("sys_kullanici", "sys_kullanici.id=gelen_evraklar.ekleyen_id");
        if(isset($filter->id))
            $builder = $builder->where("gelen_evraklar.id", $filter->id);


        $builder = $builder->orderBy("gelen_evraklar.id", "DESC");
        $builder = $builder->get();
        return $builder->getResult();

    }

}