<?php

namespace App\Models\Yerlesim;

use CodeIgniter\Model;

class YerlesimModel extends Model
{

    protected $table = 'yerlesimler';
    // protected $primaryKey = 'id';

    // protected $useAutoIncrement = true;

    protected $returnType     = \App\Entities\Yerlesim\YerlesimEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = ['unvan', 'yerlesim_tip', 'adres', 'tel', 'faks', 'eposta', 'vergi_daire', 'vergi_no', 'il_id', 'ilce_id', 'ekleyen_id', 'guncelleyen_id'];

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
            yerlesimler.id,
            yerlesimler.unvan,
            yerlesimler.adres,
            yerlesimler.tel,
            yerlesimler.faks,
            yerlesimler.eposta,
            yerlesimler.vergi_daire,
            yerlesimler.vergi_no,
            yerlesim_tipler.tanim as yerlesim_tip,
            iller.tanim as il_adi
        ");
        $builder = $builder->join("yerlesim_tipler", "yerlesim_tipler.id=yerlesimler.yerlesim_tip");
        $builder = $builder->join("iller", "iller.id=yerlesimler.il_id");

        if(isset($filter->unvan))
            $builder = $builder->like("yerlesimler.unvan", $filter->unvan);
        if(isset($filter->tel))
            $builder = $builder->where("yerlesimler.tel", $filter->tel);
        if(isset($filter->eposta))
            $builder = $builder->where("yerlesimler.eposta", $filter->eposta);
        if(isset($filter->vergi_no))
            $builder = $builder->where("yerlesimler.vergi_no", $filter->vergi_no);
        if(isset($filter->yerlesim_tip))
            $builder = $builder->where("yerlesimler.yerlesim_tip", $filter->yerlesim_tip);

        $builder = $builder->get();

        return $builder->getResult();
    }

}