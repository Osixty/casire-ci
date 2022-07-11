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
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', ['filter' => 'chain']);
$routes->get('/casier', 'Home::casir');
$routes->get('/checkout', 'Home::checkout');
$routes->get('/cart', 'Home::cart');
$routes->get('/category', 'Home::category');

service('auth')->routes($routes);

// $routes->presenter('admin/product',['filter' => 'chain']);
// Equivalent to the following:
$routes->group(
    'admin',
    [
        'namespace' => 'App\Controllers\Admin',
        'filter' => 'chain'
    ],
    static function ($routes) {
        $routes->get('product/new', 'product::new');
        $routes->post('product/create', 'product::create');
        $routes->post('product', 'product::create');   // alias
        $routes->get('product', 'product::index');
        $routes->get('product/show/(:segment)', 'product::show/$1');
        $routes->get('product/(:segment)', 'product::show/$1');  // alias
        $routes->get('product/edit/(:segment)', 'product::edit/$1');
        $routes->post('product/update/(:segment)', 'product::update/$1');
        $routes->get('product/remove/(:segment)', 'product::remove/$1');
        $routes->post('product/delete/(:segment)', 'product::delete/$1');
        /*  product */
        $routes->post('product/ajaxList', 'product::ajaxList');
        /*  product end */
        /* category */
        $routes->get('category/ajaxid/(:segment)', 'category::get/$1');
        $routes->get('category', 'category::index');
        $routes->post('category/ajaxList', 'category::ajaxList');
        $routes->post('category', 'category::create');
        $routes->post('category/delete/(:segment)', 'category::delete/$1');
        $routes->post('category/update/(:segment)', 'category::update/$1');
        /* category end */
    }
);
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
