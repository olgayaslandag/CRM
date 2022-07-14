<?php

namespace App\Models\Birim;

use CodeIgniter\Model;

class BirimModel extends Model
{

    protected $table = 'birimler';
    // protected $primaryKey = 'id';

    // protected $useAutoIncrement = true;

    protected $returnType     = \App\Entities\Birim\BirimEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = ['ad', 'ekleyen_id', 'guncelleyen_id'];

    protected $useTimestamps = false;
    protected $createdField  = 'ekleme_tarihi';
    protected $updatedField  = 'guncelleme_tarihi';
    protected $deletedField  = 'silme_tarihi';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}