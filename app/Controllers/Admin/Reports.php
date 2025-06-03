<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ReportsModel;
use App\Models\UserModel;

class Reports extends BaseController
{
    public function report_details($id)
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$userId || $user['role'] !== 'admin') {
            return redirect()->to('home')->with('error', 'You do not have permission to access this page.');
        }

        $model = new ReportsModel();
        $report = $model->getReportById($id);

        if (empty($report)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Report not found');
        }

        $data = [
            'report' => $report,
            'title'  => '| Report Details'
        ];

        return view('admin/reports/report-details', $data);
    }
}