<?php

namespace App\Models;
use CodeIgniter\Model;
use PHPSupabase\Service;

class AllUsersModel extends Model
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

    public function AllUsers()
    {

        $db = $this->service->initializeDatabase('mybrada_users', 'id');

        $query = [
            'select' => '*',
            'from'   => 'mybrada_users',
            'where' => 
            [
                'user_role' => 'neq.admin'
            ]
        ];

        try{
            $users = $db->createCustomQuery($query)->getResult();
            $users_counter = count($users);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }

        return [
            'users' => $users
        ];
    }
}
