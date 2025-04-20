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

    public function new_lost_report()
    {
        return view('reports/new-lost-report', ['title' => '| Report Lost Item']);
    }

    public function new_found_report()
    {
        return view('reports/new-found-report', ['title' => '| Report Found Item']);
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

    public function delete_report($id)
    {
        $model = new ReportsModel();

        if ($model->delete($id)) {
            return redirect()->to('reports')->with('message', 'Report deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete report.');
        }
    }
}
