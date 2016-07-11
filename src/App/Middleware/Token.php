<?php
namespace App\Middleware;

use Zend\Stratigility\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class Token implements MiddlewareInterface
{
    print("teste");
    public function __invoke(Request $request, Response $response, callable $out = null)
    {
        $response->getBody()->write('logado');
        return $out($request, $response);
    }

    private function gerarToken()
    {
        return "Token";
    }
}
