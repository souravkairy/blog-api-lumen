<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return "created by sourav";
});
$router->post('/userSighUp', ['middleware' => 'auth','uses' => 'UserTableController@userSighUp']);
$router->get('/allUser', ['middleware' => 'auth','uses' => 'UserTableController@allUser']);
$router->post('/userSighIn', ['middleware' => 'auth','uses' => 'UserTableController@userSighIn']);


$router->post('/addBlog', ['middleware' => 'auth','uses' => 'BlogTableController@addBlog']);
$router->post('/deleteBlog/{id}', ['middleware' => 'auth','uses' => 'BlogTableController@deleteBlog']);

$router->get('/BlogListByPf/{user_id}', ['middleware' => 'auth','uses' => 'BlogTableController@blogListByProfile']);
$router->get('/GetAllBlog', ['middleware' => 'auth','uses' => 'BlogTableController@GetAllBlog']);

$router->get('/getBlog/{id}', ['middleware' => 'auth','uses' => 'BlogTableController@getBlog']);
$router->get('/getBlogByidForEdit/{id}', ['middleware' => 'auth','uses' => 'BlogTableController@getBlogByidForEdit']);
$router->post('/updateBlog/{id}', ['middleware' => 'auth','uses' => 'BlogTableController@updateBlog']);

$router->post('/addComment', ['middleware' => 'auth','uses' => 'CommentTableController@addComment']);
$router->get('/getCommentByBlog/{blog_id}', ['middleware' => 'auth','uses' => 'CommentTableController@getCommentByBlog']);
