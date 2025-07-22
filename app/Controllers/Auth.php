<?php

namespace App\Controllers;

use App\Models\AuthModel;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Libraries\SupabaseService;

helper('jwt');
helper('cookie');

class Auth extends BaseController
{
    public function index(): string
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        helper('form');
        helper('cookie');
        $validation =  \Config\Services::validation();

        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(422);
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $remember = $this->request->getPost('remember');

        $AuthModel = new AuthModel();
        $user = $AuthModel->AuthLogin($email);
    
        if (!$user) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'User not found']);
            exit;
        }

        if ($user && password_verify($password, $user[0]->password)) {
            $expireIn = $remember ? (86400 * 30) : 3600; // 30 days vs 1 hour

            $accessToken = generateJWT([
                'id' => $user[0]->id,
                'email' => $user[0]->email_address,
                'first_name' => $user[0]->first_name,
                'last_name' => $user[0]->last_name
            ], $expireIn);


            $refreshToken = generateJWT([
                'id' => $user[0]->id,
                'email' => $user[0]->email_address,
                'first_name' => $user[0]->first_name,
                'last_name' => $user[0]->last_name,
                'refresh' => true
            ], 86400 * 30);

            set_cookie([
                'name'     => 'access_token',
                'value'    => $accessToken,
                'expire'   => $expireIn,
                'secure'   => false,
                'httponly' => true,
                'samesite' => 'Lax',
            ]);

            set_cookie([
                'name'     => 'refresh_token',
                'value'    => $refreshToken,
                'expire'   => 86400 * 30,
                'secure'   => false,
                'httponly' => true,
                'samesite' => 'Lax',
            ]);

            return $this->response->setJSON([
                'status' => 'success',
                'token' => $accessToken,
                'expires_in' => $expireIn
            ]);
            
            http_response(200);
        }

        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Invalid credentials'
        ]);

    }


    public function login()
    {
        return view('auth/login');
    }

    public function logout()
    {
        helper('cookie');
        setcookie('access_token', '', time() - 3600, '/', '', false, true);
        setcookie('refresh_token', '', time() - 3600, '/', '', false, true);
        // Optional: clear cookies from $_COOKIE superglobal
        unset($_COOKIE['access_token']);
        unset($_COOKIE['refresh_token']);
        return redirect()->to('/login');
    }


    public function refreshToken()
    {
        helper('cookie');
        $refreshToken = $this->request->getCookie('refresh_token');

        if (!$refreshToken) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'No refresh token found']);
        }

        try {
            $decoded = JWT::decode($refreshToken, new Key(getenv('JWT_SECRET_KEY'), 'HS256'));

            if (!isset($decoded->refresh) || !$decoded->refresh) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid refresh token']);
            }

            // Create new access token
            $expireIn = 3600; // 1 hour
            $newAccessToken = generateJWT([
                'id' => $decoded->id,
                'email' => $decoded->email,
                'name' => $decoded->name
            ], $expireIn);

            // Set new token in cookie
            $this->response->setCookie('access_token', $newAccessToken, $expireIn, '', '', false, true);

            return $this->response->setJSON([
                'status' => 'success',
                'token' => $newAccessToken,
                'expires_in' => $expireIn
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Refresh token expired or invalid']);
        }
    }
}
