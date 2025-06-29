<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ReportsModel;

class Reports extends BaseController
{
    public function reports()
    {
        $model = new ReportsModel();

        $data = [
            'categories'  => $model->getCategoryEnumValues(),
            'reports'     => $model->getAllReports()
        ];

        return view('user/reports/reports', $data, ['title' => '| Reports']);
    }

    public function new_report($report_type)
    {
        if (!session()->get('user_id')) {
            return redirect()->to('login');
        }

        $model = new ReportsModel();

        $data = [
            'categories'  => $model->getCategoryEnumValues(),
            'form_action' => base_url('reports/create'),
            'report_type' => $report_type,
            'title'       => '| Report ' . ucfirst($report_type) . ' Item'
        ];

        return view('user/reports/new-report', $data);
    }

    public function edit_report($id)
    {
        if (!session()->get('user_id')) {
            return redirect()->to('login');
        }

        $model = new ReportsModel();
        $report = $model->find($id);

        // Check if report exists and user is the owner
        if (!$report || $report['reported_by'] != session()->get('user_id')) {
            return redirect()->to('reports')->with('error', 'Unauthorized access.');
        }

        $data = [
            'report'      => $report,
            'categories'  => $model->getCategoryEnumValues(),
            'form_action' => base_url("reports/update/{$id}"),
            'report_type' => $report['report_type'],
            'title'       => '| Edit Report'
        ];

        return view('user/reports/edit-report', $data);
    }

    // CRUD Functionality
    public function report_details($id)
    {
        $model = new ReportsModel();
        $data['report'] = $model->getReportById($id);

        if (empty($data['report'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Report not found');
        }

        return view('user/reports/report-details', $data, ['title' => '| Report Details']);
    }

    public function create_report()
    {
        if (!session()->get('user_id')) {
            return redirect()->to('login');
        }

        $reportModel = new ReportsModel();

        $reportData = [
            'report_type'   => $this->request->getPost('report-type'),
            'item_name'     => $this->request->getPost('item-name'),
            'category'      => $this->request->getPost('category'),
            'date_of_event' => $this->request->getPost('date-of-event'),
            'location'      => $this->request->getPost('location'),
            'description'   => $this->request->getPost('description'),
            'current_location' => $this->request->getPost('current_location') ?? null,
            'reported_by'   => session()->get('user_id'),
            // Handle image upload
            'image' => null,
        ];

        $imageFile = $this->request->getFile('image');
        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $newName = $imageFile->getRandomName();
            $imageFile->move(ROOTPATH . 'public/uploads/reports', $newName);
            $reportData['image'] = $newName;
        }

        $reportModel->insert($reportData);

        return redirect()->to('reports')->with('message', 'Report added successfully!');
    }

    public function update_report($id)
    {
        if (!session()->get('user_id')) {
            return redirect()->to('login');
        }

        $reportModel = new ReportsModel();
        $report = $reportModel->find($id);

        // Check if report exists and user is the owner
        if (!$report || $report['reported_by'] != session()->get('user_id')) {
            return redirect()->to('reports')->with('error', 'Unauthorized access.');
        }

        $data = [
            'item_name'     => $this->request->getPost('item-name'),
            'category'      => $this->request->getPost('category'),
            'report_type'   => $this->request->getPost('report-type'),
            'date_of_event' => $this->request->getPost('date-of-event'),
            'location'      => $this->request->getPost('location'),
            'description'   => $this->request->getPost('description'),
            'current_location' => $this->request->getPost('current_location') ?? null,
        ];

        // Handle image upload for update
        $imageFile = $this->request->getFile('image');
        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            // Delete the old image if it exists
            if (!empty($report['image'])) {
                $oldImagePath = ROOTPATH . 'public/uploads/reports/' . $report['image'];
                if (is_file($oldImagePath)) {
                    @unlink($oldImagePath);
                }
            }
            $newName = $imageFile->getRandomName();
            $imageFile->move(ROOTPATH . 'public/uploads/reports', $newName);
            $data['image'] = $newName;
        }

        if ($reportModel->update($id, $data)) {
            return redirect()->to(base_url('reports/details/' . $id))->with('message', 'Report updated successfully!');
        } else {
            return redirect()->to(base_url('reports/details/' . $id))->with('error', 'Failed to update the report.');
        }
    }

    public function update_status($id)
    {
        $reportModel = new ReportsModel();

        $report = $reportModel->find($id);
        if (!$report) {
            return redirect()->back()->with('error', 'Report not found.');
        }

        // Only the owner can change the status
        if (session()->get('user_id') != $report['reported_by']) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $newStatus = $this->request->getPost('status');
        $reportModel->update($id, ['status' => $newStatus]);

        return redirect()->back()->with('message', 'Status updated successfully.');
    }


    public function delete_report($id)
    {
        if (!session()->get('user_id')) {
            return redirect()->to('login');
        }

        $model = new ReportsModel();
        $report = $model->find($id);

        // Check if report exists and user is the owner
        if (!$report || $report['reported_by'] != session()->get('user_id')) {
            return redirect()->to('reports')->with('error', 'Unauthorized access.');
        }

        if ($model->delete($id)) {
            return redirect()->to('reports')->with('message', 'Report deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete report.');
        }
    }
}
