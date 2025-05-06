<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Exception\HttpNotFoundException;
use gustavopereira16\Service\TarefasService;
use gustavopereira16\Math\Geometry;
 
require __DIR__ . '/vendor/autoload.php';
 
$app = AppFactory::create();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);
$errorMiddleware->setErrorHandler(HttpNotFoundException::class, function (Request $request, Throwable $excepition, bool $displayErrorDetails, bool $logErrors, bool $logErrorDetails, ) use ($app) {
    $response = $app->getResponseFactory()->createResponse();
    $response->getBody()->write('{"error": "Recurso não foi encontrado"}');
    return $response->withHeader('Content-Type', 'application/json')
        ->withStatus(404);
});
 
$app->post("/math/triangulo/{base}/{altura}", function (Request $request, Response $response, array $args) {
    $basic = new Geometry();
    $resultado = $basic->areaTriangulo($args["base"], $args["altura"]);
    $response->getBody()->write((string)$resultado);
 
    return $response;
});
 
$app->post("/math/retangulo/{base}/{altura}", function (Request $request, Response $response, array $args) {
    $basic = new Geometry();
    $resultado = $basic->areaRetangulo($args["base"], $args["altura"]);
    $response->getBody()->write((string)$resultado);
 
    return $response;
});
 
$app-> run();