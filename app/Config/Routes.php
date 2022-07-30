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

$routes->group("/yetki", function($routes){
    $routes->get('giris', 'YetkiController::index', ["as" => "loginView"]);
    $routes->post('giris', 'YetkiController::girisPost', ["as" => "loginAction"]);
    $routes->post('ekle', 'YetkiController::kullaniciEkle', ["as" => "userAdd"]);
    $routes->get('kayit', 'YetkiController::kayit', ["as" => "registerView"]);
    $routes->get('sifremi_unuttum', 'YetkiController::sifremi_unuttum', ["as" => "rememberView"]);
    $routes->post('sifremi_unuttum', 'YetkiController::remember_action', ["as" => "rememberAction"]);
    $routes->get('cikis', 'YetkiController::cikis', ["as" => "logoutAction"]);
});










/*
 * --------------------------------------------------------------------
 * Users Management
 * --------------------------------------------------------------------
 */
$routes->group("/kullanici", function($routes){
    $routes->get("/", "KullaniciController::index");
    $routes->get("sil/(:num)", "KullaniciController::delete/$1");
    $routes->get("getir/(:num)", "KullaniciController::getir/$1");
    $routes->post("ekle", "KullaniciController::add");
});




/*
 * --------------------------------------------------------------------
 * Waste Codes
 * --------------------------------------------------------------------
 */
$routes->group("/atik_kodlar", function($routes){
    $routes->get("/", "AtikController::kodlar");
    $routes->post("/ekle", "AtikController::ekle");
    $routes->get("/sil/(:num)", "AtikController::sil/$1");

    $routes->get("/sevkiyat", "AtikController::sevkiyat");
    $routes->post("/sevkiyat", "AtikController::sevkiyat_ekle");
    $routes->get("/sevkiyat/sil/(:num)", "AtikController::sevkiyat_sil/$1");
});



/*
 * --------------------------------------------------------------------
 * Departmant Managements
 * --------------------------------------------------------------------
 */
$routes->group("/birimler", function($routes){
    $routes->get("/", "BirimController::index");
    $routes->post("/ekle", "BirimController::ekle");
    $routes->get("/sil/(:num)", "BirimController::sil/$1");    
});




/*
 * --------------------------------------------------------------------
 * Waste Notificationss
 * --------------------------------------------------------------------
 */
$routes->group("/atik_bildirimleri", function($routes){
    $routes->get("/", "AtikController::bildirimler");
    $routes->post("/ekle", "AtikController::bildirim_ekle");
    $routes->get("/sil/(:num)", "AtikController::bildirim_sil/$1");
});




/*
 * --------------------------------------------------------------------
 * Documents Managements
 * --------------------------------------------------------------------
 */
$routes->group("/evrak", function($routes){
    $routes->get("gelen", "EvrakController::gelenler");
    $routes->post("gelen_ekle", "EvrakController::gelen_ekle");
    $routes->get("gelen_sil/(:num)", "EvrakController::gelen_sil/$1");
    $routes->get("gelen_detay/(:num)", "EvrakController::gelen_detay/$1");

    $routes->get("giden", "EvrakController::gidenler");
});




/*
 * --------------------------------------------------------------------
 * Corporates Managements
 * --------------------------------------------------------------------
 */
$routes->group("/yerlesim", function($routes){
    $routes->get("/", "YerlesimController::index");
    $routes->post("ekle", "YerlesimController::ekle");
    $routes->get("getir/(:num)", "YerlesimController::getir/$1");
    $routes->get("sil/(:num)", "YerlesimController::delete/$1");
    $routes->get("find_select", "YerlesimController::find_select");
});






$routes->get("/ewc_kodlar", "AtikController::ewc_kodlar");
$routes->post("/ewc_kodlar/import", "AtikController::ewc_import");

$routes->get('/dashboard', 'DashboardController::index');
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
