<?php

namespace App\Models;
use CodeIgniter\Model;
use PHPSupabase\Service;

class PersonalDiaryModel extends Model
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

    public function PersonalDiary()
    {

        $db = $this->service->initializeDatabase('mybrada_diary', 'uid');

        $query = [
            'select' => '*',
            'from'   => 'mybrada_diary',
            'join'   => [
                [
                    'table' => 'mybrada_users',
                    'tablekey' => 'id'
                ]
            ],
        ];

        try{
            $diary = $db->createCustomQuery($query)->getResult();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }

        return [
            'diary' => $diary
        ];
    }
}
