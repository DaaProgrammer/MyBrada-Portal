<?php

namespace App\Models;
use CodeIgniter\Model;
use PHPSupabase\Service;

class NoticesModel extends Model
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

    public function AllNotices()
    {

        $db = $this->service->initializeDatabase('mybrada_noticies', 'responder_uid');

        $query = [
            'select' => '*',
            'from'   => 'mybrada_noticies',
            'join'   => [
                [
                    'table' => 'mybrada_users',
                    'tablekey' => 'id'
                ]
            ],
        ];

        try{
            $notices = $db->createCustomQuery($query)->getResult();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }

        return [
            'notices' => $notices
        ];
    }
}
