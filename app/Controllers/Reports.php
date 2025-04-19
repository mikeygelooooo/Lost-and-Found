<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReportsModel;

class Reports extends BaseController
{
    public function reports()
    {
        $model = new ReportsModel();
        $data['reports'] = $model->getAllReports();

        return view('reports/reports', $data, ['title' => '| Reports']);
    }

    public function report_details($id)
    {
        $model = new ReportsModel();
        $data['report'] = $model->getReportById($id);

        if (empty($data['report'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Report not found');
        }

        return view('reports/report-details', $data, ['title' => '| Report Details']);
    }
}
