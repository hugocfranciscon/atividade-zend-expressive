<?php

namespace App\Action\User;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;

class Delete
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
        $this->tableGateway->delete(['id' => $id]);

        $response->getBody()->write('Deleted');

        return $next($request, $response);
    }
}
