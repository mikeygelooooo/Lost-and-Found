<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    public function landing()
    {
        return view('pages/landing');
    }

    public function about()
    {
        return view('pages/about');
    }

    public function privacy_policy()
    {
        return view('pages/privacy-policy');
    }

    public function terms_of_service()
    {
        return view('pages/terms-of-service');
    }
}
