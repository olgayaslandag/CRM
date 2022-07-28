<?php

namespace App\Models\Yerlesim;

use CodeIgniter\Model;

class YerlesimTipModel extends Model
{

    protected $table = 'yerlesim_tipler';
    // protected $primaryKey = 'id';

    // protected $useAutoIncrement = true;

    protected $returnType     = \App\Entities\Yerlesim\YerlesimTipEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = ['tanim', 'ekleyen_id', 'guncelleyen_id'];

    protected $useTimestamps = false;
    protected $createdField  = 'ekleme_tarihi';
    protected $updatedField  = 'guncelleme_tarihi';
    protected $deletedField  = 'silme_tarihi';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getAll($filter)
    {

        //$builder = $this->builder($this->table);


    }

}