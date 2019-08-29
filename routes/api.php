<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




$router->group(["prefix"=>"pizzas"],function($router){

    $router->get("/", "Pizzas@index");
    $router->get("{pizza}", "Pizzas@show");
    $router->put("{pizza}", "Pizzas@update");
    $router->delete("{pizza}", "Pizzas@destroy");
    $router->post("/", "Pizzas@store");
    $router->get("{topping}/pizzas", "Pizzas@pizzaIndex");

});


$router->group(["prefix"=>"toppings"],function($router){

    $router->get("/", "Toppings@index");
    $router->get("(topping)", "Toppings@show");
    $router->put("{topping}", "Toppings@update");
    $router->delete("{topping}", "Toppings@destroy");
    $router->post("/", "Toppings@store");
    


   






});

$router->group(["prefix"=>"diets"],function($router){

    $router->get("/", "Diets@index");
    $router->get("{diet}", "Diets@show");
    $router->put("{diet}", "Diets@update");
    $router->delete("{diet}", "Diets@destroy");
    $router->post("/", "Diets@store");
    $router->post("{diet}/pizzas", "Pizzas@store");
    $router->get("{diet}/pizzas", "Pizzas@dietIndex");








});