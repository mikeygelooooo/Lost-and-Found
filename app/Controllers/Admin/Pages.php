<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ReportsModel;
use App\Models\UserModel;

class Pages extends BaseController
{
    public function dashboard()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$userId || $user['role'] !== 'admin') {
            return redirect()->to('home')->with('error', 'You do not have permission to access this page.');
        }

        $model = new ReportsModel();
        $data['reports'] = $model->dashboardAllReports();
        $data['lost_reports'] = $model->dashboardLostItems();
        $data['found_reports'] = $model->dashboardFoundItems();

        return view('admin/pages/dashboard', $data);
    }
}
