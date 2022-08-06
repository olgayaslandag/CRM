<?php

namespace App\Models\Atik;

use CodeIgniter\Model;

class SevkiyatModel extends Model
{

    protected $table = 'sevkiyatlar';
    // protected $primaryKey = 'id';

    // protected $useAutoIncrement = true;

    protected $returnType     = \App\Entities\Atik\SevkiyatEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = ['atik_kod', 'bildirim_id', 'tarih', 'miktar', 'birim', 'plaka', 'bertaraf', 'motat', 'km', 'ekleyen_id', 'guncelleyen_id'];

    protected $useTimestamps = false;
    protected $createdField  = 'ekleme_tarihi';
    protected $updatedField  = 'guncelleme_tarihi';
    protected $deletedField  = 'silme_tarihi';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getAll(){
        $builder = $this->builder($this->table);
        $builder = $builder->join("atik_kodlar", "atik_kodlar.id=sevkiyatlar.atik_kod");
        if($this->tempUseSoftDeletes){
            $builder->where($this->table . '.' . $this->deletedField, null);
        }
        $builder = $builder->get();
        return $builder->getResult();
    }
}