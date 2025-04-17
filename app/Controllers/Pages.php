<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReportsModel;

class Pages extends BaseController
{
    public function landing()
    {
        $model = new ReportsModel();
        $data['reports'] = $model->landingAllReports();

        return view('pages/landing', $data);
    }

    public function about()
    {
        return view('pages/about', ['title' => '| About Us']);
    }

    public function privacy_policy()
    {
        return view('pages/privacy-policy', ['title' => '| Privacy Policy']);
    }

    public function terms_of_service()
    {
        return view('pages/terms-of-service', ['title' => '| Terms of Service']);
    }
}
