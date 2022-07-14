<?php

namespace App\Models\Kullanici;

use CodeIgniter\Model;

class YetkiModel extends Model
{

    protected $table = 'yetkiler';
    // protected $primaryKey = 'id';

    // protected $useAutoIncrement = true;

    protected $returnType     = \App\Entities\Kullanici\YetkiEntity::class;
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