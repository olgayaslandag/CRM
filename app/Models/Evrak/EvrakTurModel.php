<?php

namespace App\Models\Evrak;

use CodeIgniter\Model;

class EvrakTurModel extends Model
{

    protected $table = 'evrak_tur';
    // protected $primaryKey = 'id';

    // protected $useAutoIncrement = true;

    protected $returnType     = \App\Entities\Evrak\EvrakTurEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = ['tanim', 'ekleyen_id', 'guncelleyen_id'];

    protected $useTimestamps = false;
    protected $createdField  = 'ekleme_tarihi';
    protected $updatedField  = 'guncelleme_tarihi';
    protected $deletedField  = 'silme_tarihi';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}