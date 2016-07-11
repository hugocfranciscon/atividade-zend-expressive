<?php
namespace App\Middleware;

use Zend\Stratigility\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class Auth implements MiddlewareInterface
{
    public function __invoke(Request $request, Response $response, callable $out = null)
    {
        if(! $request->hasHeader('authorization')){
            return $response->withStatus(401);
        }

        if (!$this->isValid($request)) {
            return $response->withStatus(403);
        }

        return $out($request, $response);
    }

    private function isValid(Request $request)
    {
        $token = $request->getHeader('authorization');
        //validar o token de alguma forma...

        /*$objJWT = new \stdClass();
            $objJWT->uid = 123456;
            $objJWT->exp = time() + (60 * 60);
            $token = \Firebase\JWT\JWT::encode($objJWT, "webdev");*/

        //return $response->write($token);

        return true;
    }
}
