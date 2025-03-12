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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// HomeController
$routes->get('/', 'HomeController::index', ['filter' => 'logedin']);

// SubscribeController
$routes->get('subscribe', static function () {
    return redirect()->to('/#footer');
});
$routes->post('subscribe', 'SubscribeController::index');

// GalleryController
$routes->get('gallery', 'GalleryController::index');

// PostController
$routes->get('search', 'PostController::search');
$routes->get('post', 'PostController::index');
$routes->get('post/(:segment)', 'PostController::index/$1');
$routes->post('post/send_comment', 'PostController::send_comment');
// session author on frontend
$routes->get('authors/(:segment)', 'PostController::author/$1');

// CategoryController
$routes->get('tag/(:segment)', 'TagController::index/$1');
$routes->get('category/(:segment)', 'CategoryController::index/$1');
// $routes->get('category/(:any)/page/(:num)', 'CategoryController::index/$1');

$routes->get('dokumen/(:segment)', 'CategoryDocsController::index/$1');
$routes->get('laporan/(:segment)', 'CategoryLapController::index/$1');

// Publikasi Controller
$routes->get('publikasidosen', 'PudosController::index');
$routes->get('publikasimahasiswa', 'PumahController::index');
$routes->get('publikasidosen/(:segment)', 'CategoryPudosController::index/$1');
$routes->get('publikasimahasiswa/(:segment)', 'CategoryLapController::index/$1');

// AboutController
$routes->get('visimisi', 'TtgVmtsController::index');
$routes->get('nilai2', 'TtgNilai2Controller::index');
$routes->get('sejarah', 'TtgSejarahController::index');
$routes->get('pengelola', 'TtgPengelolaController::index');

# Program 
$routes->get('edu', 'PrgPendidikanController::index');
$routes->get('edu/tk', 'PrgPendidikanController::tk/$1');
$routes->get('edu/sd', 'PrgPendidikanController::sd/$1');
$routes->get('edu/smp', 'PrgPendidikanController::smp/$1');
$routes->get('edu/sma', 'PrgPendidikanController::sma/$1');
$routes->get('pemberdayaan', 'PrgPemberdayaanController::index');
$routes->get('sosialdakwah', 'PrgSosdakController::index');

// KerjasamaController
$routes->get('kerjasama', 'PartnershipController::index');

// DocumentController
$routes->get('dokumen', 'DocumentController::index');
$routes->get('dokumen/(:segment)', 'CategoryDocsController::index/$1');

// LaporanController
$routes->get('laporan', 'LaporanController::index');

// ContactController
$routes->get('kontak', 'ContactController::index');
$routes->post('contact', 'ContactController::inbox');

// PengaduanController
$routes->get('pengaduan', 'PengaduanController::index');

// LoginController & Logout
$routes->group('', ['filter' => 'logedin'], static function ($routes) {
    $routes->get('login', 'LoginController::index');
    $routes->post('login/validasi', 'LoginController::validasi');
});
$routes->get('logout', 'LoginController::logout');

// Admin Routes
$routes->group('admin', ['filter' => 'authadmin'], static function ($routes) {
    $routes->get('', 'Admin\AdminController::index');
    // Partners Route
    $routes->group('partner', static function ($routes) {
        $routes->get('', 'Admin\PartnerAdminController::index');
        $routes->post('', 'Admin\PartnerAdminController::insert');
        $routes->delete('', 'Admin\PartnerAdminController::delete');
        $routes->put('', 'Admin\PartnerAdminController::update');

        $routes->get('add_new', 'Admin\PartnerAdminController::add_new');
        $routes->get('(:num)/edit', 'Admin\PartnerAdminController::edit/$1');
        $routes->get('toggle_status/(:num)', 'Admin\PartnerAdminController::toggle_status/$1'); // toggle
    });
    // PartnerCategory Route
    $routes->group('partcat', static function ($routes) {
        $routes->get('', 'Admin\PartnerCategoryController::index');
        $routes->post('', 'Admin\PartnerCategoryController::save');
        $routes->put('', 'Admin\PartnerCategoryController::edit');
        $routes->delete('', 'Admin\PartnerCategoryController::delete');
    });
    // Program Route
    $routes->group('program', static function ($routes) {
        $routes->get('', 'Admin\ProgramAdminController::index');
        $routes->post('', 'Admin\ProgramAdminController::publish');
        $routes->delete('', 'Admin\ProgramAdminController::delete');
        $routes->put('', 'Admin\ProgramAdminController::update');
        $routes->get('add_new', 'Admin\ProgramAdminController::add_new');
        $routes->get('(:num)/edit', 'Admin\ProgramAdminController::edit/$1');
        $routes->get('toggle_status/(:num)', 'Admin\ProgramAdminController::toggle_status/$1'); // toggle
    });
    // ProgramCategory Route
    $routes->group('procat', static function ($routes) {
        $routes->get('', 'Admin\ProgramCategoryController::index');
        $routes->post('', 'Admin\ProgramCategoryController::save');
        $routes->put('', 'Admin\ProgramCategoryController::edit');
        $routes->delete('', 'Admin\ProgramCategoryController::delete');
    });
    // Post Route
    $routes->group('post', static function ($routes) {
        $routes->get('', 'Admin\PostAdminController::index');
        $routes->post('', 'Admin\PostAdminController::publish');
        $routes->delete('', 'Admin\PostAdminController::delete');
        $routes->put('', 'Admin\PostAdminController::update');
        $routes->get('add_new', 'Admin\PostAdminController::add_new');
        $routes->get('(:num)/edit', 'Admin\PostAdminController::edit/$1');
        $routes->get('toggle_status/(:num)', 'Admin\PostAdminController::toggle_status/$1'); // toggle
    });
    // Category Route
    $routes->group('category', static function ($routes) {
        $routes->get('', 'Admin\CategoryAdminController::index');
        $routes->post('', 'Admin\CategoryAdminController::save');
        $routes->put('', 'Admin\CategoryAdminController::edit');
        $routes->delete('', 'Admin\CategoryAdminController::delete');
    });
    // Tag Route
    $routes->group('tag', static function ($routes) {
        $routes->get('', 'Admin\TagAdminController::index');
        $routes->post('', 'Admin\TagAdminController::save');
        $routes->put('', 'Admin\TagAdminController::edit');
        $routes->delete('', 'Admin\TagAdminController::delete');
    });
    // Inbox Route
    $routes->group('inbox', static function ($routes) {
        $routes->get('', 'Admin\InboxAdminController::index');
        $routes->get('(:num)', 'Admin\InboxAdminController::read/$1');
        $routes->delete('', 'Admin\InboxAdminController::delete');
    });
    // Comment Route
    $routes->group('comment', static function ($routes) {
        $routes->get('', 'Admin\CommentAdminController::index');
        $routes->post('', 'Admin\CommentAdminController::reply');
        $routes->post('publish', 'Admin\CommentAdminController::publish');
        $routes->put('', 'Admin\CommentAdminController::edit');
        $routes->delete('', 'Admin\CommentAdminController::delete');
        $routes->get('unpublish', 'Admin\CommentAdminController::unpublish');
    });
    // Subscriber Route
    $routes->group('subscriber', static function ($routes) {
        $routes->get('', 'Admin\SubscriberAdminController::index');
        $routes->delete('', 'Admin\SubscriberAdminController::delete');
        $routes->get('increase/(:num)', 'Admin\SubscriberAdminController::increase/$1');
        $routes->get('decrease/(:num)', 'Admin\SubscriberAdminController::decrease/$1');
        $routes->get('activate/(:num)', 'Admin\SubscriberAdminController::activate/$1');
        $routes->get('deactivate/(:num)', 'Admin\SubscriberAdminController::deactivate/$1');
    });
    // Documents Route
    $routes->group('document', static function ($routes) {
        $routes->get('', 'Admin\DocsAdminController::index');
        $routes->post('', 'Admin\DocsAdminController::insert');
        $routes->put('', 'Admin\DocsAdminController::update');
        $routes->delete('', 'Admin\DocsAdminController::delete');
    });
    // Publikasi Route
    $routes->group('publikasi', static function ($routes) {
        $routes->get('', 'Admin\PudosAdminController::index');
        $routes->post('', 'Admin\PudosAdminController::insert');
        $routes->put('', 'Admin\PudosAdminController::update');
        $routes->delete('', 'Admin\PudosAdminController::delete');
    });
    // Documents Category Route
    $routes->group('docscategory', static function ($routes) {
        $routes->get('', 'Admin\DocsCategoryAdminController::index');
        $routes->post('', 'Admin\DocsCategoryAdminController::save');
        $routes->put('', 'Admin\DocsCategoryAdminController::edit');
        $routes->delete('', 'Admin\DocsCategoryAdminController::delete');
    });
    // Pudos Category Route
    $routes->group('pudoscategory', static function ($routes) {
        $routes->get('', 'Admin\PudosCategoryAdminController::index');
        $routes->post('', 'Admin\PudosCategoryAdminController::save');
        $routes->put('', 'Admin\PudosCategoryAdminController::edit');
        $routes->delete('', 'Admin\PudosCategoryAdminController::delete');
    });
    // Laporan Route
    $routes->group('laporan', static function ($routes) {
        $routes->get('', 'Admin\LapAdminController::index');
        $routes->post('', 'Admin\LapAdminController::insert');
        $routes->put('', 'Admin\LapAdminController::update');
        $routes->delete('', 'Admin\LapAdminController::delete');
    });
    // Laporan Category Route
    $routes->group('lapcategory', static function ($routes) {
        $routes->get('', 'Admin\LapCategoryAdminController::index');
        $routes->post('', 'Admin\LapCategoryAdminController::save');
        $routes->put('', 'Admin\LapCategoryAdminController::edit');
        $routes->delete('', 'Admin\LapCategoryAdminController::delete');
    });
    // Akreditasi Route
    $routes->group('akreditasi', static function ($routes) {
        $routes->get('', 'Admin\ApsAdminController::index');
        $routes->post('', 'Admin\ApsAdminController::insert');
        $routes->put('', 'Admin\ApsAdminController::update');
        $routes->delete('', 'Admin\ApsAdminController::delete');
    });
    // Prodi Route
    $routes->group('prodi', static function ($routes) {
        $routes->get('', 'Admin\ProdiAdminController::index');
        $routes->post('', 'Admin\ProdiAdminController::insert');
        $routes->put('', 'Admin\ProdiAdminController::update');
        $routes->delete('', 'Admin\ProdiAdminController::delete');
    });
    // Slider Route
    $routes->group('slider', static function ($routes) {
        $routes->get('', 'Admin\SliderAdminController::index');
        $routes->post('', 'Admin\SliderAdminController::insert');
        $routes->put('', 'Admin\SliderAdminController::update');
        $routes->delete('', 'Admin\SliderAdminController::delete');
    });
    // Member Route
    $routes->group('member', static function ($routes) {
        $routes->get('', 'Admin\MemberAdminController::index');
        $routes->post('', 'Admin\MemberAdminController::insert');
        $routes->put('', 'Admin\MemberAdminController::update');
        $routes->delete('', 'Admin\MemberAdminController::delete');
    });
    // Testimonial Route
    $routes->group('testimonial', static function ($routes) {
        $routes->get('', 'Admin\TestimonialAdminController::index');
        $routes->post('', 'Admin\TestimonialAdminController::insert');
        $routes->put('', 'Admin\TestimonialAdminController::update');
        $routes->delete('', 'Admin\TestimonialAdminController::delete');
    });
    // Team Route
    $routes->group('team', static function ($routes) {
        $routes->get('', 'Admin\TeamAdminController::index');
        $routes->post('', 'Admin\TeamAdminController::insert');
        $routes->put('', 'Admin\TeamAdminController::update');
        $routes->delete('', 'Admin\TeamAdminController::delete');
    });
    // Users Route
    $routes->group('users', static function ($routes) {
        $routes->get('', 'Admin\UsersAdminController::index');
        $routes->post('', 'Admin\UsersAdminController::insert');
        $routes->put('', 'Admin\UsersAdminController::update');
        $routes->delete('', 'Admin\UsersAdminController::delete');
        $routes->get('deactivate/(:num)', 'Admin\UsersAdminController::deactivate/$1');
        $routes->get('activate/(:num)', 'Admin\UsersAdminController::activate/$1');
    });
    // Setting Route
    $routes->group('setting', static function ($routes) {
        $routes->get('', static function () {
            return redirect()->to('admin/setting/profile');
        });
        // Setting My Profile
        $routes->get('profile', 'Admin\SettingAdminController::profile');
        $routes->post('profile', 'Admin\SettingAdminController::profile_update');
        $routes->put('profile', 'Admin\SettingAdminController::profile_password');
        // Setting Web
        $routes->get('web', 'Admin\SettingAdminController::web');
        $routes->put('web', 'Admin\SettingAdminController::web_update');

        // Setting Home
        $routes->get('home', 'Admin\SettingAdminController::home');
        $routes->put('home', 'Admin\SettingAdminController::home_update');

        // Setting About
        $routes->get('about', 'Admin\SettingAdminController::about');
        $routes->put('about', 'Admin\SettingAdminController::about_update');
    });
});

// Author Routes
$routes->group('author', ['filter' => 'authauthor'], static function ($routes) {
    $routes->get('', 'Author\AuthorController::index');
    // Post Route
    $routes->group('post', static function ($routes) {
        $routes->get('', 'Author\PostAuthorController::index');
        $routes->post('', 'Author\PostAuthorController::publish');
        $routes->delete('', 'Author\PostAuthorController::delete');
        $routes->put('', 'Author\PostAuthorController::update');
        $routes->get('add_new', 'Author\PostAuthorController::add_new');
        $routes->get('(:num)/edit', 'Author\PostAuthorController::edit/$1');
    });
    // Category Route
    $routes->group('category', static function ($routes) {
        $routes->get('', 'Author\CategoryAuthorController::index');
        $routes->post('', 'Author\CategoryAuthorController::save');
        $routes->put('', 'Author\CategoryAuthorController::edit');
        $routes->delete('', 'Author\CategoryAuthorController::delete');
    });
    // Tag Route
    $routes->group('tag', static function ($routes) {
        $routes->get('', 'Author\TagAuthorController::index');
        $routes->post('', 'Author\TagAuthorController::save');
        $routes->put('', 'Author\TagAuthorController::edit');
        $routes->delete('', 'Author\TagAuthorController::delete');
    });
    // Comment Route
    $routes->group('comment', static function ($routes) {
        $routes->get('', 'Author\CommentAuthorController::index');
        $routes->post('', 'Author\CommentAuthorController::reply');
        $routes->post('publish', 'Author\CommentAuthorController::publish');
        $routes->put('', 'Author\CommentAuthorController::edit');
        $routes->delete('', 'Author\CommentAuthorController::delete');
        $routes->get('unpublish', 'Author\CommentAuthorController::unpublish');
    });
    // Setting Route
    $routes->group('setting', static function ($routes) {
        $routes->get('', static function () {
            return redirect()->to('author/setting/profile');
        });
        // Setting My Profile
        $routes->get('profile', 'Author\SettingAuthorController::profile');
        $routes->post('profile', 'Author\SettingAuthorController::profile_update');
        $routes->put('profile', 'Author\SettingAuthorController::profile_password');
    });
});

// Edisi Ramadhan
$routes->get('/jadwal-sholat', 'PrayerTimesController::index');
$routes->get('/jadwalsholat', 'PrayerTimesController2::index');

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
