<?php
 
 
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Geometria\Geometria;
 
require __DIR__ . '/vendor/autoload.php';
 
$app = AppFactory::create();
 
// Rota para área do retângulo
$app->post('/area/retangulo', function (Request $request, Response $response) {
    $params = $request->getParsedBody();
    $base = $params['base'] ?? 0;
    $altura = $params['altura'] ?? 0;
 
    $geo = new Geometria();
    $area = $geo->calcularAreaRetangulo($base, $altura);
 
    $response->getBody()->write(json_encode(['area' => $area]));
    return $response->withHeader('Content-Type', 'application/json');
});
 
// Rota para área do triângulo
$app->post('/area/triangulo', function (Request $request, Response $response) {
    $params = $request->getParsedBody();
    $base = $params['base'] ?? 0;
    $altura = $params['altura'] ?? 0;
 
    $geo = new Geometria();
    $area = $geo->calcularAreaTriangulo($base, $altura);
 
    $response->getBody()->write(json_encode(['area' => $area]));
    return $response->withHeader('Content-Type', 'application/json');
});
 
$app->run();
 
 