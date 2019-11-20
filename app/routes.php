<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;

use App\Application\Actions\Producto\ProductoCambiarEstadoAction;
use App\Application\Actions\Producto\ProductoCrearAction;
use App\Application\Actions\Producto\ProductoListarAction;
use App\Application\Actions\Producto\ProductoModificarAction;
use App\Application\Actions\Producto\ProductoObtenerAction;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->post('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hola Mundo!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });

    $app->group('/producto', function (Group $group) {
        $group->get('', ProductoListarAction::class);
        $group->get('/{id}', ProductoObtenerAction::class);
        $group->post('', ProductoCrearAction::class);
        $group->put('', ProductoModificarAction::class);
        $group->patch('/{id}/{estado}', ProductoCambiarEstadoAction::class);
    });


};
