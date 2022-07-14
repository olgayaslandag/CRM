<?php

namespace App\Models\Kullanici;

use CodeIgniter\Model;

class KullaniciModel extends Model
{

    protected $table = 'sys_kullanici';
    // protected $primaryKey = 'id';

    // protected $useAutoIncrement = true;

    protected $returnType     = \App\Entities\Kullanici\KullaniciEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = ['adsoyad', 'yetki_id', 'eposta', 'sifre', 'telefon', 'ekleyen_id', 'guncelleyen_id'];

    protected $useTimestamps = false;
    protected $createdField  = 'ekleme_tarihi';
    protected $updatedField  = 'guncelleme_tarihi';
    protected $deletedField  = 'silme_tarihi';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getAll($filter=[])
    {

        $builder = $this->builder($this->table);
        $builder = $builder->select("
            sys_kullanici.adsoyad,
            sys_kullanici.telefon,
            sys_kullanici.eposta,
            sys_kullanici.id,
            sys_kullanici.aktif,
            yetkiler.tanim
        ");
        $builder = $builder->join("yetkiler", "yetkiler.id=sys_kullanici.yetki_id");
        
        if($this->tempUseSoftDeletes)
            $builder->where($this->table . '.' . $this->deletedField, null);


        $builder = $builder->get();
        return $builder->getResult();

    }

}