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

        $reports = new ReportsModel();

        // Count by report type and category (for Bar Chart)
        $typeCategoryData = $reports->select("CONCAT(UPPER(LEFT(report_type, 1)), LOWER(SUBSTRING(report_type, 2))) AS report_type, category, COUNT(*) as total")
            ->groupBy('report_type, category')
            ->findAll();

        // Count by month (for Line Chart)
        $monthlyReports = $reports->select("DATE_FORMAT(date_of_event, '%Y-%m') as month, COUNT(*) as count")
            ->groupBy('month')
            ->orderBy('month', 'ASC')
            ->findAll();

        $reportStatusData = $reports->select("CONCAT(UPPER(LEFT(status, 1)), LOWER(SUBSTRING(status, 2))) AS status, COUNT(*) as total")
            ->groupBy('status')
            ->findAll();

        $data = [
            'lost_count' => $reports->where('report_type', 'lost')->countAllResults(),
            'found_count' => $reports->where('report_type', 'found')->countAllResults(),
            'pending_count' => $reports->where('status', 'pending')->countAllResults(),
            'total_users' => $userModel->countAllResults(),
            'typeCategoryData' => $typeCategoryData,
            'monthlyReports' => $monthlyReports,
            'reportStatusData' => $reportStatusData,
            'reports' => $reports->dashboardAllReports(),
            'lost_reports' => $reports->dashboardLostItems(),
            'found_reports' => $reports->dashboardFoundItems(),
        ];

        return view('admin/pages/dashboard', $data);
    }
}
