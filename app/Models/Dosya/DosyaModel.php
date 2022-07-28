<?php

namespace App\Models\Dosya;

use CodeIgniter\Model;

class DosyaModel extends Model
{

    protected $table = 'dosyalar';
    // protected $primaryKey = 'id';

    // protected $useAutoIncrement = true;

    protected $returnType     = \App\Entities\Dosya\DosyaEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = ['dosya_adi', 'gelen_evrak_id', 'giden_evrak_id', 'ekleyen_id', 'guncelleyen_id'];

    protected $useTimestamps = false;
    protected $createdField  = 'ekleme_tarihi';
    protected $updatedField  = 'guncelleme_tarihi';
    protected $deletedField  = 'silme_tarihi';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}