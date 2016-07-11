<?php return array (
  'dependencies' => 
  array (
    'invokables' => 
    array (
      'Zend\\Expressive\\Helper\\ServerUrlHelper' => 'Zend\\Expressive\\Helper\\ServerUrlHelper',
      'Zend\\Expressive\\Whoops' => 'Whoops\\Run',
      'Zend\\Expressive\\WhoopsPageHandler' => 'Whoops\\Handler\\PrettyPageHandler',
      'Zend\\Expressive\\Router\\RouterInterface' => 'Zend\\Expressive\\Router\\FastRouteRouter',
      'App\\Action\\PingAction' => 'App\\Action\\PingAction',
      'App\\Middleware\\Format\\Json' => 'App\\Middleware\\Format\\Json',
      'App\\Middleware\\Validate' => 'App\\Middleware\\Validate',
      'App\\Middleware\\Token' => 'App\\Middleware\\Token',
    ),
    'factories' => 
    array (
      'Zend\\Expressive\\Application' => 'Zend\\Expressive\\Container\\ApplicationFactory',
      'Zend\\Expressive\\Helper\\UrlHelper' => 'Zend\\Expressive\\Helper\\UrlHelperFactory',
      'App\\Factory\\Db\\Adapter\\Adapter' => 'App\\Factory\\Db\\Adapter\\Adapter',
      'Zend\\Expressive\\FinalHandler' => 'Zend\\Expressive\\Container\\TemplatedErrorHandlerFactory',
      'Zend\\Expressive\\Helper\\ServerUrlMiddleware' => 'Zend\\Expressive\\Helper\\ServerUrlMiddlewareFactory',
      'Zend\\Expressive\\Helper\\UrlHelperMiddleware' => 'Zend\\Expressive\\Helper\\UrlHelperMiddlewareFactory',
      'App\\Action\\HomePageAction' => 'App\\Action\\HomePageFactory',
      'App\\Action\\User\\Index' => 'App\\Factory\\User\\Index',
      'App\\Action\\User\\Update' => 'App\\Factory\\User\\Update',
      'App\\Action\\User\\Create' => 'App\\Factory\\User\\Create',
      'App\\Action\\User\\Delete' => 'App\\Factory\\User\\Delete',
      'App\\Action\\User\\Login' => 'App\\Factory\\User\\Login',
      'App\\Middleware\\Format\\Html' => 'App\\Factory\\Middleware\\Format\\Html',
      'Zend\\Expressive\\Template\\TemplateRendererInterface' => 'Zend\\Expressive\\ZendView\\ZendViewRendererFactory',
      'Zend\\View\\HelperPluginManager' => 'Zend\\Expressive\\ZendView\\HelperPluginManagerFactory',
    ),
  ),
  'whoops' => 
  array (
    'json_exceptions' => 
    array (
      'display' => true,
      'show_trace' => true,
      'ajax_only' => true,
    ),
  ),
  'middleware_pipeline' => 
  array (
    'always' => 
    array (
      'middleware' => 
      array (
        0 => 'Zend\\Expressive\\Helper\\ServerUrlMiddleware',
      ),
      'priority' => 10000,
    ),
    'routing' => 
    array (
      'middleware' => 
      array (
        0 => 'App\\Middleware\\Auth',
        1 => 'EXPRESSIVE_ROUTING_MIDDLEWARE',
        2 => 'Zend\\Expressive\\Helper\\UrlHelperMiddleware',
        3 => 'EXPRESSIVE_DISPATCH_MIDDLEWARE',
      ),
      'priority' => 1,
    ),
    'error' => 
    array (
      'middleware' => 
      array (
      ),
      'error' => true,
      'priority' => -10000,
    ),
  ),
  'routes' => 
  array (
    0 => 
    array (
      'name' => 'home',
      'path' => '/',
      'middleware' => 'App\\Action\\HomePageAction',
      'allowed_methods' => 
      array (
        0 => 'GET',
      ),
    ),
    1 => 
    array (
      'name' => 'api.ping',
      'path' => '/api/ping',
      'middleware' => 'App\\Action\\PingAction',
      'allowed_methods' => 
      array (
        0 => 'GET',
      ),
    ),
    2 => 
    array (
      'name' => 'user.index',
      'path' => '/user',
      'middleware' => 
      array (
        0 => 'App\\Action\\User\\Index',
        1 => 'App\\Middleware\\Format\\Json',
        2 => 'App\\Middleware\\Format\\Html',
      ),
      'allowed_methods' => 
      array (
        0 => 'GET',
      ),
    ),
    3 => 
    array (
      'name' => 'user.create',
      'path' => '/user',
      'middleware' => 
      array (
        0 => 'App\\Middleware\\Validate',
        1 => 'App\\Action\\User\\Create',
        2 => 'App\\Middleware\\Format\\Json',
      ),
      'allowed_methods' => 
      array (
        0 => 'POST',
      ),
    ),
    4 => 
    array (
      'name' => 'user.login',
      'path' => '/user/login',
      'middleware' => 
      array (
        0 => 'App\\Middleware\\Validate',
        1 => 'App\\Action\\User\\Login',
        2 => 'App\\Middleware\\Format\\Token',
      ),
      'allowed_methods' => 
      array (
        0 => 'POST',
      ),
    ),
    5 => 
    array (
      'name' => 'user.update',
      'path' => '/user/{id}',
      'middleware' => 
      array (
        0 => 'App\\Middleware\\Validate',
        1 => 'App\\Action\\User\\Update',
        2 => 'App\\Middleware\\Format\\Json',
      ),
      'allowed_methods' => 
      array (
        0 => 'PUT',
      ),
    ),
    6 => 
    array (
      'name' => 'user.delete',
      'path' => '/user/{id}',
      'middleware' => 
      array (
        0 => 'App\\Action\\User\\Delete',
        1 => 'App\\Middleware\\Format\\Json',
      ),
      'allowed_methods' => 
      array (
        0 => 'DELETE',
      ),
    ),
  ),
  'templates' => 
  array (
    'layout' => 'layout/default',
    'map' => 
    array (
      'layout/default' => 'templates/layout/default.phtml',
      'error/error' => 'templates/error/error.phtml',
      'error/404' => 'templates/error/404.phtml',
    ),
    'paths' => 
    array (
      'app' => 
      array (
        0 => 'templates/app',
      ),
      'layout' => 
      array (
        0 => 'templates/layout',
      ),
      'error' => 
      array (
        0 => 'templates/error',
      ),
      'user' => 
      array (
        0 => 'templates/user',
      ),
    ),
  ),
  'view_helpers' => 
  array (
  ),
  'debug' => false,
  'config_cache_enabled' => true,
  'zend-expressive' => 
  array (
    'error_handler' => 
    array (
      'template_404' => 'error::404',
      'template_error' => 'error::error',
    ),
  ),
  'db' => 
  array (
    'driver' => 'Pdo_Mysql',
    'database' => 'webdev',
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
  ),
);