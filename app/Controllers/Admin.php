<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReportsModel;

class Admin extends BaseController
{
    public function dashboard()
    {
        $model = new ReportsModel();
        $data['reports'] = $model->dashboardAllReports();
        $data['lost_reports'] = $model->dashboardLostItems();
        $data['found_reports'] = $model->dashboardFoundItems();

        return view('admin/dashboard', $data);
    }

    public function report_details($id)
    {
        $model = new ReportsModel();
        $data['report'] = $model->getReportById($id);

        if (empty($data['report'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Report not found');
        }

        return view('admin/report-details', $data, ['title' => '| Report Details']);
    }
}
