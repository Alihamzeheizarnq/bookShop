<?php

$router->setNamespace('\App\Controller');

$router->get('/addUser', 'UserController@index');
$router->get('/', 'UserController@show');
$router->get('/deleteUser/{id}','UserController@deleteUser');
$router->post('/addUser', 'UserController@add');


$router->set404(function () {
    echo "not";
    // ... do something special here
});
$router->run();
