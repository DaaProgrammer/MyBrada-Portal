<?php
namespace App\Controllers;
use App\Models\DashboardStatsModel;
use App\Models\AllUsersModel;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Libraries\SupabaseService;

helper('jwt');
helper('cookie');

class Portal extends BaseController
{
    public function dashboard() { 

        $DashboardStatsModel = new DashboardStatsModel();
        $dashboardStats['dashboardStats'] = $DashboardStatsModel->DashboardStats();

        $AllUsers = new AllUsersModel();
        $allUsers = $AllUsers->AllUsers();

        $data = [
            'title' => 'MyBrada - Dashboard',
            'showSidebar' => true,
            'activePage' => 'dashboard',
            'dashboardStats' => $dashboardStats['dashboardStats'],
            'allUsers' => $allUsers,
        ];

        // print_r($allUsers);
        echo view('partials/header', $data);
        echo view('portal/dashboard', $data);
        echo view('partials/footer');
    }


    public function responders() { 
        $data = [
            'title' => 'MyBrada - Responders',
            'showSidebar' => true,
            'activePage' => 'responders'
        ];
        echo view('partials/header', $data);
        echo view('portal/responders');
        echo view('partials/footer');
    }


    public function newsfeeds() { 
        $data = [
            'title' => 'MyBrada - Newsfeeds',
            'showSidebar' => true,
            'activePage' => 'newsfeeds'
        ];
        echo view('partials/header', $data);
        echo view('portal/newsfeeds');
        echo view('partials/footer');
    }


    public function alerts() { 
        $data = [
            'title' => 'MyBrada - Alerts',
            'showSidebar' => true,
            'activePage' => 'alerts'
        ];
        echo view('partials/header', $data);
        echo view('portal/alerts');
        echo view('partials/footer');
    }

    
    public function notices() {
        $data = [
            'title' => 'MyBrada - Notices',
            'showSidebar' => true,
            'activePage' => 'notices'
        ];
        echo view('partials/header', $data);
        echo view('portal/notices');
        echo view('partials/footer');
    }


    public function professionalSupport() {
        $data = [
            'title' => 'MyBrada - Professional Support',
            'showSidebar' => true,
            'activePage' => 'professional_support'
        ];
        echo view('partials/header', $data);
        echo view('portal/professional_support');
        echo view('partials/footer');
    }

    public function personalDairy() {
        $data = [
            'title' => 'MyBrada - Personal Dairy',
            'showSidebar' => true,
            'activePage' => 'personal_diary'
        ];
        echo view('partials/header', $data);
        echo view('portal/personal_diary');
        echo view('partials/footer');
    }
}
