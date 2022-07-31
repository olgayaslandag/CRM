<?php

namespace App\Models\Kuyu;

use CodeIgniter\Model;

class WellModel extends Model
{

    protected $table = 'kuyular';
    // protected $primaryKey = 'id';

    // protected $useAutoIncrement = true;

    protected $returnType     = \App\Entities\Kuyu\WellEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = ['tanim', 'yerlesim_id', 'aktif', 'ekleyen_id', 'guncelleyen_id'];

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
            kuyular.id,
            kuyular.tanim,
            kuyular.aktif,
            sys_kullanici.adsoyad,
            yerlesimler.unvan
        ");

        $builder = $builder->join("yerlesimler", "yerlesimler.id=kuyular.yerlesim_id");
        $builder = $builder->join("sys_kullanici", "sys_kullanici.id=kuyular.ekleyen_id");

        if(isset($filter->yerlesim_id))
            $builder = $builder->where("yerlesimler.id", $filter->yerlesim_id);
        if(isset($filter->tanim))
            $builder = $builder->like("kuyular.tanim", $filter->tanim);
        if(isset($filter->ekleyen_id))
            $builder = $builder->where("kuyular.ekleyen_id", $filter->ekleyen_id);
        if($this->tempUseSoftDeletes)
            $builder->where($this->table . '.' . $this->deletedField, null);


        $builder = $builder->get();
        return $builder->getResult();

    }

}