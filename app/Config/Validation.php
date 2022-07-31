<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation extends BaseConfig
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------



    public $user = [
        "adsoyad" => "required|alpha_space|min_length[3]|max_length[30]",
        "telefon" => "required|is_unique[sys_kullanici.telefon]",
        "eposta"  => "required|valid_email|is_unique[sys_kullanici.eposta]",
        "sifre"   => "required|min_length[8]|max_length[20]"
    ];

    public $well = [
        "tanim" => "required",
        "ekleyen_id" => "required",
        "yerlesim_id" => "required"
    ];
}
