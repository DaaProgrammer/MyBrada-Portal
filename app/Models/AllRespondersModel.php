<?php

namespace App\Models;
use CodeIgniter\Model;
use PHPSupabase\Service;

class AllRespondersModel extends Model
{
    protected $service;

    public function __construct()
    {
        parent::__construct();

        $supabaseUrl = getenv('SUPABASE_URL');
        $supabaseKey = getenv('SUPABASE_API_KEY');

        if (!$supabaseUrl || !$supabaseKey) {
            log_message('error', 'Supabase credentials missing in .env');
        }

        try {
            $this->service = new Service($supabaseKey, $supabaseUrl);
        } catch (\Throwable $e) {
            log_message('error', 'Supabase Service init error: ' . $e->getMessage());
        }

    }

    public function AllResponders()
    {

        $db = $this->service->initializeDatabase('mybrada_users', 'id');

        $query = [
            'select' => '*',
            'from'   => 'mybrada_users',
            'where' => 
            [
                'user_role' => 'eq.dispatcher'
            ]
        ];

        try{
            $responders = $db->createCustomQuery($query)->getResult();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }

        return [
            'responders' => $responders
        ];
    }
}
