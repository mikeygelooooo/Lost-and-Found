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

    public function new_report($report_type)
    {
        $categoryModel = new CategoriesModel();

        $data = [
            'categories'  => $categoryModel->findAll(),
            'form_action' => base_url('reports/create'),
            'report_type' => $report_type,
            'title'       => '| Report ' . ucfirst($report_type) . ' Item'
        ];

        return view('reports/new-report', $data);
    }

    public function edit_report($id)
    {
        $categoryModel = new CategoriesModel();
        $reportModel = new ReportsModel();

        $report = $reportModel->find($id);

        $data = [
            'report'         => $report,
            'categories'   => $categoryModel->findAll(),
            'form_action'  => base_url("reports/update/{$id}"),
            'report_type'  => $report['report_type'],
            'title'        => '| Edit Report'
        ];

        return view('reports/edit-report', $data);
    }

    // CRUD Functionality
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
        $reportModel = new ReportsModel();

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

    public function update_report($id)
    {
        // Load the necessary models
        $reportModel = new ReportsModel();

        // Get input data
        $data = [
            'item_name'     => $this->request->getPost('item-name'),
            'category_id'   => $this->request->getPost('category-id'),
            'report_type'   => $this->request->getPost('report-type'),
            'date_of_event' => $this->request->getPost('date-of-event'),
            'location'      => $this->request->getPost('location'),
            'description'   => $this->request->getPost('description'),
        ];

        // Update the report in the database
        if ($reportModel->update($id, $data)) {
            // Redirect to the report details page or show a success message
            return redirect()->to(base_url('reports/details/' . $id))->with('message', 'Report updated successfully!');
        } else {
            // Handle any failure in the update process
            return redirect()->to(base_url('reports/details/' . $id))->with('error', 'Failed to update the report.');
        }
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
