<?php

namespace App\Action\User;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;

class Update
{
    private $tableGateway;

    public function __construct($tableGateway)
    {
        $this->tableGateway   = $tableGateway;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $id = $request->getAttribute('id');
        $user = $this->tableGateway->select(['id' => $id]);
        if (count($user) == 0) {
            return $response->withStatus(404);
        }

        // não encontrei outra forma na documentação :/
        parse_str(file_get_contents("php://input"),$data);
        $this->tableGateway->update($data, ['id' => $id]);

        $response->getBody()->write('atualizado');

        return $next($request, $response);
    }
}
