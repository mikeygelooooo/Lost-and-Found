<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ReportsModel;

class Pages extends BaseController
{
    public function landing()
    {
        $model = new ReportsModel();
        $data['reports'] = $model->landingAllReports();

        return view('user/pages/landing', $data);
    }

    public function about()
    {
        return view('user/pages/about', ['title' => '| About Us']);
    }

    public function contact()
    {
        return view('user/pages/contact', ['title' => '| Contact Us']);
    }

    public function privacy_policy()
    {
        return view('user/pages/privacy-policy', ['title' => '| Privacy Policy']);
    }

    public function terms_of_service()
    {
        return view('user/pages/terms-of-service', ['title' => '| Terms of Service']);
    }
}
