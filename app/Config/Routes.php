<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('/api/register', 'RegisterController::register');
$routes->post('/api/login', 'LoginController::login');


$routes->group('makanan', function ($routes) {
    $routes->post('/', 'MakananController::create');      // Menambahkan data makanan
    $routes->get('/', 'MakananController::list');         // Menampilkan semua data makanan
    $routes->get('(:segment)', 'MakananController::detail/$1'); // Menampilkan detail makanan berdasarkan ID
    $routes->put('(:segment)', 'MakananController::ubah/$1');   // Mengubah data makanan berdasarkan ID
    $routes->delete('(:segment)', 'MakananController::hapus/$1'); // Menghapus data makanan berdasarkan ID
});

$routes->group('minuman', function ($routes) {
    $routes->post('/', 'MinumanController::create');      // Menambahkan data minuman
    $routes->get('/', 'MinumanController::list');         // Menampilkan semua data minuman
    $routes->get('(:segment)', 'MinumanController::detail/$1'); // Menampilkan detail minuman berdasarkan ID
    $routes->put('(:segment)', 'MinumanController::ubah/$1');   // Mengubah data minuman berdasarkan ID
    $routes->delete('(:segment)', 'MinumanController::hapus/$1'); // Menghapus data minuman berdasarkan ID
});

$routes->group('petugas', function ($routes) {
    $routes->post('/', 'PetugasController::create');      // Menambahkan data petugas
    $routes->get('/', 'PetugasController::list');         // Menampilkan semua data petugas
    $routes->get('(:segment)', 'PetugasController::detail/$1'); // Menampilkan detail petugas berdasarkan ID
    $routes->put('(:segment)', 'PetugasController::ubah/$1');   // Mengubah data petugas berdasarkan ID
    $routes->delete('(:segment)', 'PetugasController::hapus/$1'); // Menghapus data petugas berdasarkan ID
});
