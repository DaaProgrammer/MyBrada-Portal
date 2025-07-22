<?php

namespace App\Models;
use CodeIgniter\Model;
use PHPSupabase\Service;

class DashboardStatsModel extends Model
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

    public function DashboardStats()
    {
        $users_counter = 0;
        $responders_counter = 0;
        $open_alerts_counter = 0;
        $unassigned_support_requests_counter = 0;

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


        $db = $this->service->initializeDatabase('mybrada_dispatcher', 'id');

        $query = [
            'select' => '*',
            'from'   => 'mybrada_dispatcher',
            'where' => 
            [
                'status' => 'eq.active'
            ]
        ];

        try{
            $responders = $db->createCustomQuery($query)->getResult();
            $responders_counter = count($responders);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }



        $db = $this->service->initializeDatabase('mybrada_alerts', 'id');

        $query = [
            'select' => '*',
            'from'   => 'mybrada_alerts',
            'where' => 
            [
                'status' => 'eq.Open'
            ]
        ];

        try{
            $open_alerts = $db->createCustomQuery($query)->getResult();
            $open_alerts_counter = count($open_alerts);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }


        $db = $this->service->initializeDatabase('mybrada_support', 'id');

        $query = [
            'select' => '*',
            'from'   => 'mybrada_support',
            'where' => 
            [
                'status' => 'eq.unassigned '
            ]
        ];

        try{
            $unassigned_support_requests = $db->createCustomQuery($query)->getResult();
            $unassigned_support_requests_counter = count($unassigned_support_requests);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }

        return [
            'users_counter' => $users_counter,
            'responders_counter' => $responders_counter,
            'open_alerts_counter' => $open_alerts_counter,
            'unassigned_support_requests_counter' => $unassigned_support_requests_counter
        ];

    }
}
