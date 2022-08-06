<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('HomeController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.




$routes->get('/', 'HomeController::index');
$routes->get('/dashboard', 'DashboardController::index');





/*
 *--------------------------------------------------
 * Auth Management
 *--------------------------------------------------
 */
$routes->group("/yetki", function($routes){
    $routes->get('giris', '\App\Controllers\Yetki\YetkiController::index', ["as" => "loginView"]);
    $routes->post('giris', '\App\Controllers\Yetki\YetkiController::girisPost', ["as" => "loginAction"]);
    $routes->post('ekle', '\App\Controllers\Yetki\YetkiController::kullaniciEkle', ["as" => "userAdd"]);
    $routes->get('kayit', '\App\Controllers\Yetki\YetkiController::kayit', ["as" => "registerView"]);
    $routes->get('sifremi_unuttum', '\App\Controllers\Yetki\YetkiController::sifremi_unuttum', ["as" => "rememberView"]);
    $routes->post('sifremi_unuttum', '\App\Controllers\Yetki\YetkiController::remember_action', ["as" => "rememberAction"]);
    $routes->get('cikis', '\App\Controllers\Yetki\YetkiController::cikis', ["as" => "logoutAction"]);
});










/*
 * --------------------------------------------------------------------
 * Users Management
 * --------------------------------------------------------------------
 */
$routes->group("/kullanici", function($routes){
    $routes->get("/", "\App\Controllers\Kullanici\KullaniciController::index", ["as" => "KullaniciView"]);
    $routes->get("sil/(:num)", "\App\Controllers\Kullanici\KullaniciController::delete/$1");
    $routes->get("getir/(:num)", "\App\Controllers\Kullanici\KullaniciController::getir/$1");
    $routes->post("ekle", "\App\Controllers\Kullanici\KullaniciController::add");
    $routes->get("duzenle/(:num)", "\App\Controllers\Kullanici\KullaniciController::editView/$1", ["as" => "editView"]);
    $routes->post("duzenle", "\App\Controllers\Kullanici\KullaniciController::editAction", ["as" => "editAction"]);

});




/*
 * --------------------------------------------------------------------
 * Waste Codes
 * --------------------------------------------------------------------
 */
$routes->group("/ewc_kodlar", function($routes){
    $routes->get("/", "\App\Controllers\Atik\EwcController::index", ["as" => "ewc_kodlar"]);
    $routes->post("ekle", "\App\Controllers\Atik\EwcController::ekle", ["as" => "ewcEkle"]);
    $routes->get("sil/(:num)", "\App\Controllers\Atik\EwcController::sil/$1", ["as" => "ewc_sil"]);
});


$routes->group("/sevkiyatlar", function($routes){
    $routes->get("/", "\App\Controllers\Sevkiyat\SevkiyatController::index", ["as" => "sevkiyatlarView"]);
    $routes->post("ekle", "\App\Controllers\Sevkiyat\SevkiyatController::ekle", ["as" => "sevkiyatEkle"]);
    $routes->get("sil/(:num)", "\App\Controllers\Sevkiyat\SevkiyatController::sil/$1", ["as" => "sevkiyatSil"]);
});



/*
 * --------------------------------------------------------------------
 * Departmant Managements
 * --------------------------------------------------------------------
 */
$routes->group("/birimler", function($routes){
    $routes->get("/", "\App\Controllers\Birim\BirimController::index", ["as" => "birimlerView"]);
    $routes->post("ekle", "\App\Controllers\Birim\BirimController::ekle", ["as" => "birimAdd"]);
    $routes->get("sil/(:num)", "\App\Controllers\Birim\BirimController::sil/$1", ["as" => "birimRemove"]);
});




/*
 * --------------------------------------------------------------------
 * Waste Notificationss
 * --------------------------------------------------------------------
 */
$routes->group("/atik_bildirimleri", function($routes){
    $routes->get("/", "\App\Controllers\Bildirim\BildirimController::index", ["as" => "atik_bildirimleri"]);
    $routes->post("ekle", "\App\Controllers\Bildirim\BildirimController::ekle");
    $routes->get("sil/(:num)", "\App\Controllers\Bildirim\BildirimController::sil/$1");
});




/*
 * --------------------------------------------------------------------
 * Documents Managements
 * --------------------------------------------------------------------
 */
$routes->group("/evrak", function($routes){
    $routes->get("gelen", "\App\Controllers\Evrak\GelenController::index", ["as" => "gelenlerView"]);
    $routes->post("gelen_ekle", "\App\Controllers\Evrak\GelenController::ekle", ["as" => "gelenEkle"]);
    $routes->get("gelen_sil/(:num)", "\App\Controllers\Evrak\GelenController::sil/$1", ["as" => "gelenSil"]);
    $routes->get("gelen_detay/(:num)", "\App\Controllers\Evrak\GelenController::detay/$1", ["as" => "gelenDetail"]);

    $routes->get("giden", "\App\Controllers\Evrak\GidenController::index", ["as" => "gidenlerView"]);
});




/*
 * --------------------------------------------------------------------
 * Corporates Managements
 * --------------------------------------------------------------------
 */
$routes->group("/yerlesim", function($routes){
    $routes->get("/", "\App\Controllers\Yerlesim\YerlesimController::index");
    $routes->post("ekle", "\App\Controllers\Yerlesim\YerlesimController::ekle");
    $routes->get("getir/(:num)", "\App\Controllers\Yerlesim\YerlesimController::getir/$1");
    $routes->get("sil/(:num)", "\App\Controllers\Yerlesim\YerlesimController::delete/$1");
    $routes->get("find_select", "\App\Controllers\Yerlesim\YerlesimController::find_select");
});





/*
 *--------------------------------------------------
 *    Well Managements
 *--------------------------------------------------
 */
$routes->group("/kuyu", function($routes){
    $routes->get("/", "\App\Controllers\Kuyu\KuyuController::index", ["as" => "wellsView"]);
    $routes->post("ekle", "\App\Controllers\Kuyu\KuyuController::ekle", ["as" => "wellsAdd"]);
    $routes->get("sil/(:num)", "\App\Controllers\Kuyu\KuyuController::sil/$1", ["as" => "wellsDelete"]);
});




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
