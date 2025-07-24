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

}
