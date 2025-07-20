<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

helper('jwt');

class Auth extends BaseController
{
    public function index(): string
    {
        return view('auth/login');
    }

    // public function attemptLogin()
    // {
    //     helper('form');
    //     $validation =  \Config\Services::validation();

    //     $rules = [
    //         'email' => 'required|valid_email',
    //         'password' => 'required|min_length[6]'
    //     ];

    //     if (!$this->validate($rules)) {
    //         // Return back with validation errors & old input
    //         return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    //     }

    //     $email = $this->request->getPost('email');
    //     $password = $this->request->getPost('password');
    //     $remember = $this->request->getPost('remember');

    //     $userModel = new UserModel();
    //     $user = $userModel->where('email', $email)->first();

    //     if ($user && password_verify($password, $user['password'])) {
    //         $expireIn = $remember ? (86400 * 30) : 3600; // 30 days vs 1 hour

    //         $accessToken = generateJWT([
    //             'id' => $user['id'],
    //             'email' => $user['email'],
    //             'name' => $user['name']
    //         ], $expireIn);

    //         $refreshToken = generateJWT([
    //             'id' => $user['id'],
    //             'email' => $user['email'],
    //             'name' => $user['name'],
    //             'refresh' => true
    //         ], 86400 * 30); // refresh token valid for 30 days

    //         // Set tokens in HTTP-only cookies
    //         $this->response->setCookie('access_token', $accessToken, $expireIn, '', '', false, true);
    //         $this->response->setCookie('refresh_token', $refreshToken, 86400 * 30, '', '', false, true);

    //         // Redirect to dashboard or intended page
    //         // return redirect()->to('/dashboard');
    //         return $this->response->setJSON([
    //             'status' => 'success',
    //             'token' => $accessToken,
    //             'expires_in' => $expireIn
    //         ]);
    //     }

    //     return $this->response->setJSON([
    //         'status' => 'error',
    //         'message' => 'Invalid credentials'
    //     ]);

    // }


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
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Instead of validating user credentials, just simulate success:
        $email = $this->request->getPost('email');
        $remember = $this->request->getPost('remember');

        // Fake user data
        $user = [
            'id' => 1,
            'email' => $email,
            'name' => 'Test User',
            'password' => password_hash('password123', PASSWORD_DEFAULT) // not actually used here
        ];

        $expireIn = $remember ? (86400 * 30) : 3600; // 30 days vs 1 hour

        $accessToken = generateJWT([
            'id' => $user['id'],
            'email' => $user['email'],
            'name' => $user['name']
        ], $expireIn);


        $refreshToken = generateJWT([
            'id' => $user['id'],
            'email' => $user['email'],
            'name' => $user['name'],
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

    public function login()
    {
        return view('auth/login');
    }

    public function logout()
    {
        // Remove the cookies
        helper('cookie');
        delete_cookie('access_token');
        delete_cookie('refresh_token');

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
