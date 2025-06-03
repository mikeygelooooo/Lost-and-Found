<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ReportsModel;
use App\Models\UserModel;

class Reports extends BaseController
{
    public function reports()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$userId || $user['role'] !== 'admin') {
            return redirect()->to('home')->with('error', 'You do not have permission to access this page.');
        }

        $model = new ReportsModel();

        $data = [
            'categories'  => $model->getCategoryEnumValues(),
            'reports'     => $model->getAllReportsAdmin()
        ];

        return view('admin/reports/reports', $data, ['title' => '| Reports']);
    }

    public function new_report($report_type)
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$userId || $user['role'] !== 'admin') {
            return redirect()->to('home')->with('error', 'You do not have permission to access this page.');
        }

        $model = new ReportsModel();

        $data = [
            'categories'  => $model->getCategoryEnumValues(),
            'form_action' => base_url('admin/reports/create'),
            'report_type' => $report_type,
            'title'       => '| Report ' . ucfirst($report_type) . ' Item'
        ];

        return view('admin/reports/new-report', $data);
    }

    public function edit_report($id)
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$userId || $user['role'] !== 'admin') {
            return redirect()->to('home')->with('error', 'You do not have permission to access this page.');
        }

        $model = new ReportsModel();
        $report = $model->find($id);

        $data = [
            'report'      => $report,
            'categories'  => $model->getCategoryEnumValues(),
            'form_action' => base_url("admin/reports/update/{$id}"),
            'report_type' => $report['report_type'],
            'title'       => '| Edit Report'
        ];

        return view('admin/reports/edit-report', $data);
    }

    // CRUD Functionality
    public function report_details($id)
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$userId || $user['role'] !== 'admin') {
            return redirect()->to('home')->with('error', 'You do not have permission to access this page.');
        }

        $model = new ReportsModel();
        $data['report'] = $model->getReportById($id);

        if (empty($data['report'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Report not found');
        }

        return view('admin/reports/report-details', $data, ['title' => '| Report Details']);
    }

    public function create_report()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$userId || $user['role'] !== 'admin') {
            return redirect()->to('home')->with('error', 'You do not have permission to access this page.');
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

        return redirect()->to('admin/reports')->with('message', 'Report added successfully!');
    }

    public function update_report($id)
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$userId || $user['role'] !== 'admin') {
            return redirect()->to('home')->with('error', 'You do not have permission to access this page.');
        }

        $reportModel = new ReportsModel();
        $report = $reportModel->find($id);

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
            return redirect()->to(base_url('admin/reports/details/' . $id))->with('message', 'Report updated successfully!');
        } else {
            return redirect()->to(base_url('admin/reports/details/' . $id))->with('error', 'Failed to update the report.');
        }
    }

    public function update_status($id)
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$userId || $user['role'] !== 'admin') {
            return redirect()->to('home')->with('error', 'You do not have permission to access this page.');
        }

        $reportModel = new ReportsModel();

        $report = $reportModel->find($id);
        if (!$report) {
            return redirect()->back()->with('error', 'Report not found.');
        }

        $newStatus = $this->request->getPost('status');
        $reportModel->update($id, ['status' => $newStatus]);

        return redirect()->back()->with('message', 'Status updated successfully.');
    }


    public function delete_report($id)
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$userId || $user['role'] !== 'admin') {
            return redirect()->to('home')->with('error', 'You do not have permission to access this page.');
        }

        $model = new ReportsModel();

        if ($model->delete($id)) {
            return redirect()->to('admin/reports')->with('message', 'Report deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete report.');
        }
    }
}