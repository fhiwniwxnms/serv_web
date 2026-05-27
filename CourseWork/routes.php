<?php
$router = new Router();

// Главная
$router->get('/', 'HomeController@index');

// Статьи
$router->get('/articles', 'ArticlesController@index');
$router->get('/articles/(\d+)', 'ArticlesController@show');

// Комментарии
$router->post('/articles/(\d+)/comments', 'CommentsController@store');
$router->get('/comments/(\d+)/edit', 'CommentsController@edit');
$router->post('/comments/(\d+)/update', 'CommentsController@update');

// Подборщик
$router->get('/picker', 'TeaPickerController@index');
$router->post('/picker', 'TeaPickerController@filter');

// Контакты
$router->get('/contacts', 'ContactsController@index');
$router->post('/contacts', 'ContactsController@send');

// Админка
$router->get('/admin/articles', 'AdminController@articles');
$router->get('/admin/articles/create', 'AdminController@createArticle');
$router->post('/admin/articles/store', 'AdminController@storeArticle');
$router->get('/admin/articles/(\d+)/edit', 'AdminController@editArticle');
$router->post('/admin/articles/(\d+)/update', 'AdminController@updateArticle');
$router->post('/admin/articles/(\d+)/delete', 'AdminController@deleteArticle');
$router->get('/admin/comments', 'AdminController@comments');
$router->post('/admin/comments/(\d+)/delete', 'AdminController@deleteComment');

$router->run($uri);