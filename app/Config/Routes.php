<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('IndexUser');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// INDEX
$routes->add('/', 'IndexUser::index');

// SHOP
$routes->add('/shop', 'user\shop::index');

// DETAIL PRODUCT
$routes->add('/shop/detail-product/(:any)', 'user\DetailProduct::index/$1');

// AUTH
$routes->add('/auth', 'user\Auth::index');
$routes->add('/login', 'user\Auth::login');
$routes->add('/regis', 'user\Auth::regis');
$routes->add('/verify', 'user\Auth::verify');

// ACCOUNT
$routes->add('/account', 'user\Account::index');
$routes->add('/personaldata', 'user\Account::personaldata');
$routes->add('/logout', 'user\Account::logout');

// CART
$routes->add('/cart', 'user\Cart::index');
$routes->add('/addtocart', 'user\Cart::add');
$routes->add('/cart/updateitem', 'user\Cart::updatemultiple');
$routes->add('/cart/deleteitem', 'user\Cart::deleteitem');

// CHECKOUT
$routes->add('/checkout', 'user\Checkout::index');

// CONTACT
$routes->add('/contact', 'user\Contact::index');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
