<?php

namespace App\Factory\User;

use Interop\Container\ContainerInterface;
use Zend\Db\TableGateway\TableGateway;
use App\Action\User\Delete as Action;

class Delete
{
    public function __invoke(ContainerInterface $container)
    {
        $adapter = $container->get('App\Factory\Db\Adapter\Adapter');
        $tableGateway = new TableGateway('user', $adapter);

        return new Action($tableGateway);
    }
}
