<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table = 'sys_kullanici';
    // protected $primaryKey = 'id';

    // protected $useAutoIncrement = true;

    protected $returnType     = \App\Entities\UserEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = ['adsoyad', 'eposta', 'sifre', 'telefon', 'ekleyen_id', 'guncelleyen_id'];

    protected $useTimestamps = false;
    protected $createdField  = 'ekleme_tarihi';
    protected $updatedField  = 'guncelleme_tarihi';
    protected $deletedField  = 'silme_tarihi';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}