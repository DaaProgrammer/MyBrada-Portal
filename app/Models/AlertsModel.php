<?php

namespace App\Models;
use CodeIgniter\Model;
use PHPSupabase\Service;

class AlertsModel extends Model
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

    public function AllAlerts()
    {

        $db = $this->service->initializeDatabase('mybrada_alerts', 'uid');

        try {
            $alerts = $db->fetchAll()->getResult(); 
        } catch (Exception $e) {
            echo "<p>Error fetching alerts or users: {$e->getMessage()}</p>";
        }

            $dbUser = $this->service->initializeDatabase('mybrada_users', 'id');
        foreach ($alerts as &$alert) {
            if (!empty($alert->responder_uid) && $alert->responder_uid != 0) {

                try {
                    $users = $dbUser->findBy('id', $alert->responder_uid)->getResult();
                    $alert->responder_details = $users[0] ?? null;

                    // $users = $dbUser->findBy('id', $alert->uid)->getResult();
                    // $alert->user_details = $users[0] ?? null;

                } catch (Exception $e) {
                    echo "<p>Error fetching responder details: {$e->getMessage()}</p>";
                }

            } else {
                $alert->responder_details = null;
                try {
                    $users = $dbUser->findBy('id', $alert->uid)->getResult();
                    $alert->user_details = $users[0] ?? null;
                } catch (Exception $e) {
                    echo "<p>Error fetching responder details: {$e->getMessage()}</p>";
                }
            }


        }
        unset($alert);

        return [
            'alerts' => $alerts
        ];
    }
}
