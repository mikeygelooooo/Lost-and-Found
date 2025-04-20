<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\CategoriesModel;
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
        $categoryModel = new CategoriesModel();
        $data['categories'] = $categoryModel->findAll();

        return view('reports/new-lost-report', $data, ['title' => '| Report Lost Item']);
    }

    public function new_found_report()
    {
        $categoryModel = new CategoriesModel();
        $data['categories'] = $categoryModel->findAll();

        return view('reports/new-found-report', $data, ['title' => '| Report Found Item']);
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

    public function create_report()
    {
        $categoryModel = new CategoriesModel();
        $reportModel = new ReportsModel();
        $data['categories'] = $categoryModel->findAll();

        $reportData = [
            'report_type'   => $this->request->getPost('report-type'),
            'item_name'     => $this->request->getPost('item-name'),
            'category_id'   => $this->request->getPost('category-id'),
            'date_of_event' => $this->request->getPost('date-of-event'),
            'location'      => $this->request->getPost('location'),
            'description'   => $this->request->getPost('description'),
        ];

        $reportModel->insert($reportData);

        return redirect()->to('reports')->with('message', 'Report added successfully!');
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
