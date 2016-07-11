<?php

namespace App\Action\User;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;

class Login
{
    private $tableGateway;

    public function __construct($tableGateway)
    {
        $this->tableGateway   = $tableGateway;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $data = $request->getParsedBody();

        $user = $this->tableGateway->select(['email' => $data['email'], 'senha' => $data['senha']]);
        if (count($user) == 0) {
            return $response->withStatus(401);
        }

        //$response->getBody()->write('logado');

        return $next($request, $response);
    }
}
