<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\DiscountsController;

/** @var Laravel\Lumen\Routing\Router $router */

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

$router->group(['prefix' => 'companies'], function () use ($router) {
    $router->get('/{id}', [CompaniesController::class, 'show']);
    $router->get('/', [CompaniesController::class, 'list']);
    $router->post('/', [CompaniesController::class, 'save']);
    $router->put('/{id}', [CompaniesController::class, 'update']);
    $router->delete('/{id}', [CompaniesController::class, 'delete']);
});

$router->group(['prefix' => 'discounts'], function () use ($router) {
    $router->get('/{id}', [DiscountsController::class, 'show']);
    $router->get('/', [DiscountsController::class, 'list']);
    $router->post('/', [DiscountsController::class, 'save']);
    $router->put('/{id}', [DiscountsController::class, 'update']);
    $router->delete('/{id}', [DiscountsController::class, 'delete']);
});
