<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $token = $request->getCookie('access_token');

        if (!$token) {
            return redirect()->to('/login')->with('error', 'Unauthorized - No token');
        }

        try {
            $decoded = JWT::decode($token, new Key(getenv('JWT_SECRET_KEY'), 'HS256'));

            // Optionally attach user data to request or session
            $request->user = $decoded;

        } catch (\Exception $e) {
            return redirect()->to('/login')->with('error', 'Unauthorized - Invalid token');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}
