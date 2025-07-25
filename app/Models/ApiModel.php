<?php

namespace App\Models;
use CodeIgniter\Model;
use PHPSupabase\Service;

class ApiModel extends Model
{
    protected $service;

    public function __construct()
    {
        parent::__construct();

        $supabaseUrl = getenv('SUPABASE_URL');
        $supabaseKey = getenv('SUPABASE_API_KEY');

        // $this->service = new Service($supabaseKey, $supabaseUrl);

        if (!$supabaseUrl || !$supabaseKey) {
            log_message('error', 'Supabase credentials missing in .env');
        }

        try {
            $this->service = new Service($supabaseKey, $supabaseUrl);
        } catch (\Throwable $e) {
            log_message('error', 'Supabase Service init error: ' . $e->getMessage());
        }

    }

    public function blockUser($userId)
    {
        $db = $this->service->initializeDatabase('mybrada_users', 'id');
        $query = [
            'status' => 'blocked'
        ];

        try{
            $data = $db->update($userId, $query);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }    
        
        return [
            'data' => $data
        ];
    }


    public function unblockUser($userId)
    {
        $db = $this->service->initializeDatabase('mybrada_users', 'id');
        $query = [
            'status' => 'verified'
        ];

        try{
            $data = $db->update($userId, $query);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }    
        
        return [
            'data' => $data
        ];
    }

    public function deleteResponder($userId)
    {
        $db = $this->service->initializeDatabase('mybrada_users', 'id');
        try{
            $data = $db->delete($userId);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }    

        return [
            'data' => $data
        ];
    }


    public function deleteNewsfeed($postId)
    {
        $db = $this->service->initializeDatabase('mybrada_newsfeed', 'id');
   
        try{
            $data = $db->delete($postId);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }    
        
        return [
            'data' => $data
        ];
    }



    public function deleteNotice($noticeId)
    {
        $db = $this->service->initializeDatabase('mybrada_noticies', 'id');
   
        try{
            $data = $db->delete($noticeId);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }    
        
        return [
            'data' => $data
        ];
    }

    
    public function deleteAlert($alertId)
    {
        $db = $this->service->initializeDatabase('mybrada_alerts', 'id');
   
        try{
            $data = $db->delete($alertId);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }    
        
        return [
            'data' => $data
        ];
    }


    public function deleteProfessionalSupport($professionalSupport_id)
    {
        $db = $this->service->initializeDatabase('mybrada_support', 'id');
   
        try{
            $data = $db->delete($professionalSupport_id);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }    
        
        return [
            'data' => $data
        ];
    }


    public function deleteProfessional($professionalId)
    {

        $db = $this->service->initializeDatabase('mybrada_support', 'professional_id');
   
        try{
            $data = $db->delete($professionalId);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }    

        if (!$data) {
            return [
                'status' => 'error',
                'message' => 'Failed to delete professional'
            ];
        }

        if($data){
            $db = $this->service->initializeDatabase('mybrada_professionals', 'id');
   
            try{
                $data = $db->delete($professionalId);
            }
            catch(Exception $e){
                echo $e->getMessage();
            }               
        }
        
        return [
            'status' => 'success',
            'message' => 'Professional deleted successfully',
            'data' => $data
        ];
    }

     public function addResponder($responderData){
        $db = $this->service->initializeDatabase('mybrada_users', 'id');

        $query = [
            'user_role' => 'dispatcher',
            'first_name' => $responderData->name,
            'last_name' => $responderData->surname,
            'email_address' => $responderData->email,
            'phone_number' => $responderData->phone,
            'status' => $responderData->responder_status ?? 'inactive'
        ];

        try{
            $data = $db->insert($query);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }    
        
        if (!$data) {
            return [
                'status' => 'error',
                'message' => 'Failed to add responder'
            ];
        }

        return [
            'status' => 'success',
            'message' => 'Responder added successfully',
            'data' => $data
        ];
    }

    function addNewsfeed($newsfeedData) {
        $db = $this->service->initializeDatabase('mybrada_newsfeed', 'id');

        $query = [
            'image_path' => $newsfeedData->image ?? null,
            'post_title' => $newsfeedData->title,
            'post_content' => $newsfeedData->ckeditor,
            'status' => $newsfeedData->post_status ?? 'draft',
            'category' => $newsfeedData->category,
        ];

        try {
            $data = $db->insert($query);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        if (!$data) {
            return [
                'status' => 'error',
                'message' => 'Failed to add newsfeed post'
            ];
        }

        return [
            'status' => 'success',
            'message' => 'Post added successfully',
            'data' => $data
        ];
    }

    function assignResponder($responderData) {
        $db = $this->service->initializeDatabase('mybrada_alerts', 'id');
        $query = [
            'responder_uid' => $responderData->responder_uid,
            'controller_notes' => $responderData->controller_notes ?? null,
            'status' => 'Assigned',
        ];

        try {
            $data = $db->update($responderData->alert_id, $query);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        if (!$data) {
            return [
                'status' => 'error',
                'message' => 'Failed to assign responder'
            ];
        }

        return [
            'status' => 'success',
            'message' => 'Responder assigned successfully',
            'data' => $data
        ];
    }

    function addNotice($noticeData) {
        $db = $this->service->initializeDatabase('mybrada_noticies', 'id');

        $query = [
            'notice_title' => $noticeData->notice_title,
            'notice_content' => $noticeData->notice_contents,
            'responder_uid' => $noticeData->responder_uid ?? null,
            'status' => $noticeData->notice_status ?? 'draft',
        ];

        try {
            $data = $db->insert($query);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        if (!$data) {
            return [
                'status' => 'error',
                'message' => 'Failed to add notice'
            ];
        }

        return [
            'status' => 'success',
            'message' => 'Notice added successfully',
            'data' => $data
        ];
    }

    function assignProfessional($professionalData) {
        $db = $this->service->initializeDatabase('mybrada_professionals', 'id');

        if (empty($professionalData->support_id) && empty($professionalData->professional_id)) {
            return [
                'status' => 'error',
                'message' => 'Support ID and Professional ID are required'
            ];
        }
        
        $query = [
            'select' => '*',
            'from'   => 'mybrada_professionals',
            'where' => 
            [
                'id' => 'eq.'.$professionalData->professional_id
            ]
        ];

        try {
            $data = $db->createCustomQuery($query)->getResult();
        } catch (Exception $e) {
            echo $e->getMessage();
        }


        if (empty($data)) {
            return [
                'status' => 'error',
                'message' => 'Professional not found'
            ];
        }


        $db = $this->service->initializeDatabase('mybrada_support', 'id');
        $query = [
            'professional_id' => $data[0]->id,
            'professional_name' => $data[0]->first_name . ' ' . $data[0]->last_name,
            'professional_email' => $data[0]->email_address,
            'professional_number' => $data[0]->phone_number ?? null,
            'status' => 'Assigned',
        ];

        try {
            $data = $db->update($professionalData->support_id, $query);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        if (empty($data)) {
            return [
                'status' => 'error',
                'message' => 'Failed to assign professional'
            ];
        }

        return [
            'status' => 'success',
            'message' => 'Professional assigned successfully',
            'data' => $data
        ];
    }

    function addProfessional($professionalData) {
        $db = $this->service->initializeDatabase('mybrada_professionals', 'id');

        $query = [
            'first_name' => $professionalData->first_name,
            'last_name' => $professionalData->last_name,
            'email_address' => $professionalData->email_address,
            'phone_number' => $professionalData->phone_number ?? null,
            'status' => $professionalData->professional_status ?? 'inactive',
        ];

        try {
            $data = $db->insert($query);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        if (!$data) {
            return [
                'status' => 'error',
                'message' => 'Failed to add professional'
            ];
        }

        return [
            'status' => 'success',
            'message' => 'Professional added successfully',
            'data' => $data
        ];
    }
}
