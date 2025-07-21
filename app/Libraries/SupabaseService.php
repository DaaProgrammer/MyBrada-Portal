<?php

namespace App\Libraries;

use PHPSupabase\Service;

class SupabaseService
{
    protected $service;

    public function __construct()
    {
        $url = getenv('SUPABASE_URL');
        $key = getenv('SUPABASE_API_KEY');
        $this->service = new Service($key, $url);;
    }

    public function getClient()
    {
        return $this->service;
    }

}
