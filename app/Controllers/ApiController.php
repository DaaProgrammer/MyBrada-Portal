<?php

namespace App\Controllers;

use App\Models\ApiModel;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Libraries\SupabaseService;

helper('jwt');
helper('cookie');

class ApiController extends BaseController
{
    public function blockUser()
    {
        helper('form');
        $validation = \Config\Services::validation();
        $rules = [
            'user_id' => 'required|integer'
        ];
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(422);
        }
        $userId = $this->request->getJSON();
        if (!$userId) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Missing user_id'
            ])->setStatusCode(400);
        }

  
        $ApiModel = new ApiModel();
        $result = $ApiModel->blockUser($userId->user_id);

        if (!$result) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to block user'
            ])->setStatusCode(500);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'User blocked successfully',
            'userid' => $userId
        ]);

    }


    public function unblockUser()
    {
        helper('form');
        $validation = \Config\Services::validation();
        $rules = [
            'user_id' => 'required|integer'
        ];
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(422);
        }
        $userId = $this->request->getJSON();
        if (!$userId) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Missing user_id'
            ])->setStatusCode(400);
        }

  
        $ApiModel = new ApiModel();
        $result = $ApiModel->unblockUser($userId->user_id);

        if (!$result) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to unblock user'
            ])->setStatusCode(500);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'User unblocked successfully',
            'userid' => $userId
        ]);

    }



}
