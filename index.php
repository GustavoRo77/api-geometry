<?php
 
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Geometria\Math\Geometry;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->post('/teste/tria/{base}/{altura}', function (Request $request, Response $response, array $args) {
    $Geometry = new Geometry();
    $resultado = $Geometry->tria($args['base'], $args['altura']);
    $response->getBody()->write((string) $resultado);
    return $response;
});
 
$app->post('/teste/reta/{base}/{altura}', function (Request $request, Response $response, array $args) {
    $Geometry = new Geometry();
    $resultado = $Geometry->reta($args['base'], $args['altura']);
    $response->getBody()->write((string) $resultado);
    return $response;
});
 
$app->run();