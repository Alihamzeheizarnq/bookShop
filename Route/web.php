<?php

$router->setNamespace('\App\Controller');


$router->get('/','IndexController@show');
$router->get('/Login-user','IndexController@Login');
$router->get('/register','IndexController@register');
$router->post('/auth','IndexController@auth');
$router->post('/auth-login','IndexController@auth_login');
$router->get('/panel/user','IndexController@panelUser');
$router->get('/logout/user','IndexController@logout');
$router->get('/books/{id}','IndexController@books');






















///////////////////////////////////////////////////////////////admin
$router->get('/addUser', 'AdminController@index');
$router->get('/doshbord', 'AdminController@show');
$router->post('/addUser', 'AdminController@add');
$router->get('/admin','AdminController@showLogin');
$router->post('/LoginAdmin','AdminController@LoginAdmin');
$router->get('/logout','AdminController@logout');


//end admin panel


//user route
$router->get('/users-list','UserController@listUser');
$router->get('/deleteUser/{id}','UserController@deleteUser');
//end user route
//book
$router->get('/lists-book','BookController@listBook');
$router->get('/add-book','BookController@addBook');
$router->post('/creatBook','BookController@creatBook');
$router->get('/deleteBook/{id}','BookController@deleteBook');
$router->get('/lists-book/text/{id}','BookController@text');
$router->get('/editBook/{id}','BookController@showEdit');
$router->post('/UpdateBook/{id}','BookController@UpdateBook');

$router->get('/list-buy','BuyController@show');
/////////////////////////////////////////////////////////////////////////////endadmin

$router->set404(function () {
    echo "not";
    // ... do something special here
});
$router->run();
