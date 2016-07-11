<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\FastRouteRouter::class,
            App\Action\PingAction::class => App\Action\PingAction::class,
            App\Middleware\Format\Json::class => App\Middleware\Format\Json::class,
            App\Middleware\Validate::class => App\Middleware\Validate::class,
            App\Middleware\Token::class => App\Middleware\Token::class,
        ],
        'factories' => [
            App\Action\HomePageAction::class => App\Action\HomePageFactory::class,
            App\Action\User\Index::class => App\Factory\User\Index::class,
            App\Action\User\Update::class => App\Factory\User\Update::class,
            App\Action\User\Create::class => App\Factory\User\Create::class,
            App\Action\User\Delete::class => App\Factory\User\Delete::class,
            App\Action\User\Login::class => App\Factory\User\Login::class,
            App\Middleware\Format\Html::class => App\Factory\Middleware\Format\Html::class
        ],
    ],

    'routes' => [
        [
            'name' => 'home',
            'path' => '/',
            'middleware' => App\Action\HomePageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'api.ping',
            'path' => '/api/ping',
            'middleware' => App\Action\PingAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'user.index',
            'path' => '/user',
            'middleware' => [
                App\Action\User\Index::class,
                App\Middleware\Format\Json::class,
                App\Middleware\Format\Html::class
            ],
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'user.create',
            'path' => '/user',
            'middleware' => [
                App\Middleware\Validate::class,
                App\Action\User\Create::class,
                App\Middleware\Format\Json::class,
            ],
            'allowed_methods' => ['POST'],
        ],
        [
            'name' => 'user.login',
            'path' => '/user/login',
            'middleware' => [
                App\Middleware\Validate::class,
                App\Action\User\Login::class,
                App\Middleware\Format\Token::class,
            ],
            'allowed_methods' => ['POST'],
        ],
        [
            'name' => 'user.update',
            'path' => '/user/{id}',
            'middleware' => [
                App\Middleware\Validate::class,
                App\Action\User\Update::class,
                App\Middleware\Format\Json::class,
            ],
            'allowed_methods' => ['PUT'],
        ],
        [
            'name' => 'user.delete',
            'path' => '/user/{id}',
            'middleware' => [
                App\Action\User\Delete::class,
                App\Middleware\Format\Json::class,
            ],
            'allowed_methods' => ['DELETE'],
        ],

    ],
];
