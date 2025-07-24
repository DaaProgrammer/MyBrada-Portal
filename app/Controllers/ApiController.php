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
            'message' => 'User blocked successfully'
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
            'message' => 'User unblocked successfully'
        ]);

    }


    public function deleteResponder()
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
        $result = $ApiModel->deleteResponder($userId->user_id);

        if (!$result) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to delete a Responder'
            ])->setStatusCode(500);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Responder deleted successfully'
        ]);

    }



    public function deleteNewsfeed()
    {
        helper('form');
        $validation = \Config\Services::validation();
        $rules = [
            'post_id' => 'required|integer'
        ];
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(422);
        }
        $postId = $this->request->getJSON();
        if (!$postId) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Missing post_id'
            ])->setStatusCode(400);
        }

  
        $ApiModel = new ApiModel();
        $result = $ApiModel->deleteNewsfeed($postId->post_id);

        if (!$result) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to delete a Post'
            ])->setStatusCode(500);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Post deleted successfully'
        ]);

    }


    public function deleteNotice()
    {
        helper('form');
        $validation = \Config\Services::validation();
        $rules = [
            'notice_id' => 'required|integer'
        ];
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(422);
        }
        $noticeId = $this->request->getJSON();
        if (!$noticeId) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Missing notice_id'
            ])->setStatusCode(400);
        }

  
        $ApiModel = new ApiModel();
        $result = $ApiModel->deleteNotice($noticeId->notice_id);

        if (!$result) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to delete a Notice'
            ])->setStatusCode(500);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Notice deleted successfully'
        ]);

    }



    public function deleteAlert()
    {
        helper('form');
        $validation = \Config\Services::validation();
        $rules = [
            'alert_id' => 'required|integer'
        ];
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(422);
        }
        $alertId = $this->request->getJSON();
        if (!$alertId) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Missing alert_id'
            ])->setStatusCode(400);
        }

  
        $ApiModel = new ApiModel();
        $result = $ApiModel->deleteAlert($alertId->alert_id);

        if (!$result) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to delete the Alert'
            ])->setStatusCode(500);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Alert deleted successfully'
        ]);

    }


    public function deleteProfessionalSupport()
    {
        helper('form');
        $validation = \Config\Services::validation();
        $rules = [
            'professionalSupport_id' => 'required|integer'
        ];
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(422);
        }
        $professionalSupportId = $this->request->getJSON();
        if (!$professionalSupportId) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Missing professionalSupport_id'
            ])->setStatusCode(400);
        }

  
        $ApiModel = new ApiModel();
        $result = $ApiModel->deleteProfessionalSupport($professionalSupportId->professionalSupport_id);

        if (!$result) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to delete a Professional Support'
            ])->setStatusCode(500);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Professional Support deleted successfully',
        ]);

    }


    public function deleteProfessional()
    {
        helper('form');
        $validation = \Config\Services::validation();
        $rules = [
            'professional_id' => 'required|integer'
        ];
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(422);
        }
        $professionalId = $this->request->getJSON();
        if (!$professionalId) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Missing professional_id'
            ])->setStatusCode(400);
        }

  
        $ApiModel = new ApiModel();
        $result = $ApiModel->deleteProfessional($professionalId->professional_id);

        if (!$result) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to delete a Professional'
            ])->setStatusCode(500);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Professional deleted successfully',
        ]);

    }



    public function addResponder()
    {
        helper('form');
        $validation = \Config\Services::validation();
        $rules = [
            'name' => 'required|min_length[3]|max_length[50]',
            'surname' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|valid_email',
            'phone' => 'required|min_length[10]|max_length[15]'
        ];
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(422);
        }
        
        $responderData = $this->request->getJSON();
        if (!$responderData) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Missing responder data'
            ])->setStatusCode(400);
        }

        $ApiModel = new ApiModel();
        $result = $ApiModel->addResponder($responderData);

        if (!$result) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to add a Responder'
            ])->setStatusCode(500);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Responder added successfully'
        ]);
    }


    function addNewsfeed()
    {
        helper('form');
        $validation = \Config\Services::validation();
        $rules = [
            'post_img' => 'permit_empty|is_image[post_img]|max_size[post_img,2048]', // 2MB max
            'title' => 'required|min_length[3]|max_length[100]',
            'ckeditor' => 'required|min_length[10]',
            'category' => 'required|in_list[news,blog,resources]',
            'post_status' => 'required|in_list[draft,published]'
        ];
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(422);
        }
        
        $newsfeedData = $this->request->getJSON();
        if (!$newsfeedData) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Missing newsfeed data'
            ])->setStatusCode(400);
        }

        $ApiModel = new ApiModel();
        $result = $ApiModel->addNewsfeed($newsfeedData);

        if (!$result) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to add a Newsfeed'
            ])->setStatusCode(500);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Newsfeed added successfully'
        ]);
    }

}
