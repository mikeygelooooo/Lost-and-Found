<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ReportsModel;
use App\Models\UserModel;

class Users extends BaseController
{
    public function users()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$userId || $user['role'] !== 'admin') {
            return redirect()->to('home')->with('error', 'You do not have permission to access this page.');
        }

        $data = [
            'users' => $userModel->findAll(),
            'title' => '| User Management'
        ];

        return view('admin/users/users', $data);
    }

    public function user_details($id)
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$userId || $user['role'] !== 'admin') {
            return redirect()->to('home')->with('error', 'You do not have permission to access this page.');
        }

        $data = [
            'user' => $userModel->find($id),
            'report_count' => (new ReportsModel())->where('reported_by', $id)->countAllResults(),
            'title' => '| User Details'
        ];

        return view('admin/users/user-details', $data);
    }

    public function new_user()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$userId || $user['role'] !== 'admin') {
            return redirect()->to('home')->with('error', 'You do not have permission to access this page.');
        }

        $data = [
            'form_action' => base_url('admin/users/create'),
            'title' => '| Create New User'
        ];

        return view('admin/users/new-user', $data);
    }

    public function edit_user($id)
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$userId || $user['role'] !== 'admin') {
            return redirect()->to('home')->with('error', 'You do not have permission to access this page.');
        }

        $data = [
            'user' => $userModel->find($id),
            'title' => '| Edit User'
        ];

        return view('admin/users/edit-user', $data);
    }

    public function create_user()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$userId || $user['role'] !== 'admin') {
            return redirect()->to('home')->with('error', 'You do not have permission to access this page.');
        }

        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if ($password !== $confirmPassword) {
            session()->setFlashdata('error', 'Passwords do not match.');
            return redirect()->back()->withInput();
        }

        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'email' => $this->request->getPost('email'),
            'phone_number' => $this->request->getPost('phone_number'),
            'role' => $this->request->getPost('role'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        if ($userModel->insert($data)) {
            session()->setFlashdata('message', 'User created successfully.');
            return redirect()->to('admin/users');
        } else {
            session()->setFlashdata('error', 'Failed to create user. Please try again.');
            return redirect()->back()->withInput();
        }
    }

    public function update_user($id)
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$userId || $user['role'] !== 'admin') {
            return redirect()->to('home')->with('error', 'You do not have permission to access this page.');
        }

        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'email' => $this->request->getPost('email'),
            'phone_number' => $this->request->getPost('phone_number'),
        ];

        if ($userModel->update($id, $data)) {
            session()->setFlashdata('message', 'User updated successfully.');
            return redirect()->to('admin/users/details/' . $id);
        } else {
            session()->setFlashdata('error', 'Failed to update user. Please try again.');
            return redirect()->back()->withInput();
        }
    }

    public function update_role($id)
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$userId || $user['role'] !== 'admin') {
            return redirect()->to('home')->with('error', 'You do not have permission to access this page.');
        }

        $newRole = $this->request->getPost('role');

        if (!in_array($newRole, ['admin', 'user'])) {
            session()->setFlashdata('error', 'Invalid role selected.');
            return redirect()->back();
        }

        if ($userModel->update($id, ['role' => $newRole])) {
            session()->setFlashdata('message', 'User role updated successfully.');
            return redirect()->to('admin/users/details/' . $id);
        } else {
            session()->setFlashdata('error', 'Failed to update user role. Please try again.');
            return redirect()->back();
        }
    }

    public function change_profile_picture($id)
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$userId || $user['role'] !== 'admin') {
            return redirect()->to('home')->with('error', 'You do not have permission to access this page.');
        }

        $data = [
            'user' => $userModel->find($id),
            'title' => '| Change Profile Picture'
        ];

        return view('admin/users/change-profile-picture', $data);
    }

    public function upload_profile_picture($id)
    {
        $userModel = new UserModel();
        $user = session()->get('user_id');

        $validationRule = [
            'profile_picture' => [
                'label' => 'Profile Picture',
                'rules' => 'uploaded[profile_picture]|is_image[profile_picture]|mime_in[profile_picture,image/jpg,image/jpeg,image/png]|max_size[profile_picture,2048]',
            ],
        ];

        if (!$this->validate($validationRule)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('profile_picture');

        if ($file->isValid() && !$file->hasMoved()) {
            // Get current user data
            $userData = $userModel->find($id);
            $oldPicture = isset($userData['profile_picture']) ? $userData['profile_picture'] : 'blank.jpg';

            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/profile_pictures', $newName);

            // Delete old profile picture if not blank.jpg
            if ($oldPicture && $oldPicture !== 'blank.jpg') {
                $oldPath = ROOTPATH . 'public/uploads/profile_pictures/' . $oldPicture;
                if (is_file($oldPath)) {
                    @unlink($oldPath);
                }
            }

            $userModel->update($id, ['profile_picture' => $newName]);

            return redirect()->to('admin/users/details/' . $id)->with('message', 'Profile picture uploaded successfully.');
        }

        return redirect()->back()->with('error', 'File upload failed.');
    }

    public function change_password($id)
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$userId || $user['role'] !== 'admin') {
            return redirect()->to('home')->with('error', 'You do not have permission to access this page.');
        }

        $data = [
            'user' => $userModel->find($id),
            'title' => '| Change Password'
        ];

        return view('admin/users/change-password', $data);
    }

    public function update_password($id)
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$userId || $user['role'] !== 'admin') {
            return redirect()->to('home')->with('error', 'You do not have permission to access this page.');
        }

        $currentPassword = $this->request->getPost('current_password');
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if ($newPassword !== $confirmPassword) {
            session()->setFlashdata('error', 'New passwords do not match.');
            return redirect()->back()->withInput();
        }

        $user = $userModel->find($id);

        // Verify current password
        if (!password_verify($currentPassword, $user['password'])) {
            session()->setFlashdata('error', 'Current password is incorrect.');
            return redirect()->back()->withInput();
        }

        // Update password
        if ($userModel->update($id, ['password' => password_hash($newPassword, PASSWORD_DEFAULT)])) {
            session()->setFlashdata('message', 'Password updated successfully.');
            return redirect()->to('admin/users/details/' . $id);
        } else {
            session()->setFlashdata('error', 'Failed to update password. Please try again.');
            return redirect()->back();
        }
    }

    public function delete_user($id)
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        if (!$userId || $user['role'] !== 'admin') {
            return redirect()->to('home')->with('error', 'You do not have permission to access this page.');
        }

        if ($userModel->delete($id)) {
            session()->setFlashdata('message', 'User deleted successfully.');
            return redirect()->to('admin/users');
        } else {
            session()->setFlashdata('error', 'Failed to delete user. Please try again.');
            return redirect()->back();
        }
    }
}
