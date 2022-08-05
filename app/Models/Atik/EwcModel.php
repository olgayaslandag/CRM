<?php

namespace App\Models\Atik;

use CodeIgniter\Model;

class EwcModel extends Model
{

    protected $table = 'ewc_kodlar';
    // protected $primaryKey = 'id';

    // protected $useAutoIncrement = true;

    protected $returnType     = \App\Entities\Atik\EwcEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = ['aciklama', 'kisa', 'sinif', 'birim_id', 'ekleyen_id', 'guncelleyen_id'];

    protected $useTimestamps = false;
    protected $createdField  = 'ekleme_tarihi';
    protected $updatedField  = 'guncelleme_tarihi';
    protected $deletedField  = 'silme_tarihi';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}