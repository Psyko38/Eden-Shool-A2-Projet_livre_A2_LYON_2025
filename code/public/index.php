<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

require '../src/Controllers/BookContoller.php';

//print_r($_SERVER["REQUEST_URI"]);

$router = new Book\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "BookController@ShowHome");
$router->get('/book/new', "BookController@addBook");
$router->post('/book/new/sub', "BookController@PostAddBook");
$router->get('/book', "BookController@ShowBook");
$router->get('/book/id/:slug', "BookController@ShowOneBook");
$router->get('/book/id/:slug/remove', "BookController@RemoveOneBook");
$router->get('/book/id/:slug/edit', "BookController@Editook");
$router->post('/book/id/:slug/edit/sub', "BookController@PostEditook");

$router->run();
