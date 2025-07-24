<?php
namespace App\Controllers;
use App\Models\DashboardStatsModel;
use App\Models\AllUsersModel;
use App\Models\AllRespondersModel;
use App\Models\NewsfeedModel;
use App\Models\AlertsModel;
use App\Models\NoticesModel;
use App\Models\ProfessionalSupportModel;
use App\Models\personalDiaryModel;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Libraries\SupabaseService;

helper('jwt');
helper('cookie');

class PortalController extends BaseController
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

        $AllResponders = new AllRespondersModel();
        $AllResponders = $AllResponders->AllResponders();

        $data = [
            'title' => 'MyBrada - Responders',
            'showSidebar' => true,
            'activePage' => 'responders',
            'allResponders' => $AllResponders,
        ];

        echo view('partials/header', $data);
        echo view('portal/responders', $data);
        echo view('partials/footer');
    }


    public function newsfeeds() { 
        $Newsfeed = new NewsfeedModel();
        $Newsfeed = $Newsfeed->Newsfeed();

        $data = [
            'title' => 'MyBrada - Newsfeeds',
            'showSidebar' => true,
            'activePage' => 'newsfeeds',
            'newsfeed' => $Newsfeed,
        ];

        echo view('partials/header', $data);
        echo view('portal/newsfeeds',  $data);
        echo view('partials/footer');
    }


    public function alerts() { 
        $Alerts = new AlertsModel();
        $Alerts = $Alerts->AllAlerts();

        $data = [
            'title' => 'MyBrada - Alerts',
            'showSidebar' => true,
            'activePage' => 'alerts',
            'alerts' => $Alerts,
        ];

        echo view('partials/header', $data);
        echo view('portal/alerts');
        echo view('partials/footer');
    }

    
    public function notices() {
        $Notices = new NoticesModel();
        $Notices = $Notices->AllNotices();


        $data = [
            'title' => 'MyBrada - Notices',
            'showSidebar' => true,
            'activePage' => 'notices'
        ];
        echo view('partials/header', $data);
        echo view('portal/notices', $Notices);
        echo view('partials/footer');
    }


    public function professionalSupport() {
        $professionalSupportModel = new ProfessionalSupportModel();
        $professionalSupport = $professionalSupportModel->AllProfessionalSupport();
        $professionals = $professionalSupportModel->AllProfessionals();

        $data = [
            'title' => 'MyBrada - Professional Support',
            'showSidebar' => true,
            'activePage' => 'professional_support',
            'professionalSupport' => $professionalSupport,
            'professionals' => $professionals
        ];

        
        echo view('partials/header', $data);
        echo view('portal/professional_support', $data);
        echo view('partials/footer');
    }

    public function personalDiary() {
        $personalDiaryModel = new personalDiaryModel();
        $personalDiary = $personalDiaryModel->PersonalDiary();

        $data = [
            'title' => 'MyBrada - Personal Dairy',
            'showSidebar' => true,
            'activePage' => 'personal_diary',
            'personalDiary' => $personalDiary['diary']
        ];

        echo view('partials/header', $data);
        echo view('portal/personal_diary', $data);
        echo view('partials/footer');
    }
}
