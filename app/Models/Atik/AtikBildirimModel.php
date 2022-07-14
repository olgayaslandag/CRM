<?php

namespace App\Models\Atik;

use CodeIgniter\Model;

class AtikBildirimModel extends Model
{

    protected $table = 'atik_bildirimler';
    // protected $primaryKey = 'id';

    // protected $useAutoIncrement = true;

    protected $returnType     = \App\Entities\Atik\AtikBildirimEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = ['atik_kod', 'aciklama', 'birim', 'miktar', 'notlar', 'dosya', 'ekleyen_id', 'guncelleyen_id'];

    protected $useTimestamps = false;
    protected $createdField  = 'ekleme_tarihi';
    protected $updatedField  = 'guncelleme_tarihi';
    protected $deletedField  = 'silme_tarihi';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getall()
    {

        $builder = $this->builder($this->table);
        $builder = $builder->select("
            atik_kodlar.kod,
            atik_bildirimler.aciklama,
            birimler.ad,
            atik_bildirimler.miktar,
            atik_bildirimler.notlar,
            atik_bildirimler.dosya,
            atik_bildirimler.id
        ");
        $builder = $builder->join("birimler", "birimler.id=atik_bildirimler.birim");
        $builder = $builder->join("atik_kodlar", "atik_kodlar.id=atik_bildirimler.atik_kod");
        if($this->tempUseSoftDeletes){
            $builder->where($this->table . '.' . $this->deletedField, null);
        }
        $builder = $builder->get();
        return $builder->getResult();

    }

}