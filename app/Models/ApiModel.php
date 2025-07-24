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
        $db = $this->service->initializeDatabase('mybrada_dispatcher', 'uid');
        try{
            $data = $db->delete($userId);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }   
        if (!$data) {
            return [
                'status' => 'error',
                'message' => 'Failed to delete responder'
            ];
        }

        if ($data) {
            $db = $this->service->initializeDatabase('mybrada_users', 'id');
            try{
                $data = $db->delete($userId);
            }
            catch(Exception $e){
                echo $e->getMessage();
            }    
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
        $db = $this->service->initializeDatabase('mybrada_professionals', 'id');
   
        try{
            $data = $db->delete($professionalId);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }    
        
        return [
            'data' => $data
        ];
    }


}
