<?php

namespace App\Models\Atik;

use CodeIgniter\Model;

class AtikKodModel extends Model
{

    protected $table = 'atik_kodlar';
    // protected $primaryKey = 'id';

    // protected $useAutoIncrement = true;

    protected $returnType     = \App\Entities\Atik\AtikKodEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = ['atik_kod', 'aciklama', 'kisa', 'ekleyen_id', 'guncelleyen_id'];

    protected $useTimestamps = false;
    protected $createdField  = 'ekleme_tarihi';
    protected $updatedField  = 'guncelleme_tarihi';
    protected $deletedField  = 'silme_tarihi';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}