<?php

namespace App\Controllers\User;

use App\Models\UserModel;
use App\Models\ReportsModel;
use App\Controllers\BaseController;

class Profiles extends BaseController
{
    public function profile_details()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        $data = [
            'user' => $user,
            'title' => 'User Profile Details'
        ];

        return view('user/profiles/profile-details', $data);
    }

    public function edit_profile()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        $data = [
            'user' => $user,
            'title' => 'User Profile Details'
        ];

        return view('user/profiles/edit-profile', $data);
    }

    public function update_profile()
    {
        $userModel = new UserModel();
        $user = session()->get('user_id');

        // Update user data
        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'email' => $this->request->getPost('email'),
            'phone_number' => $this->request->getPost('phone_number')
        ];

        if ($userModel->update($user, $data)) {
            return redirect()->to(base_url('profile/details'))->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to update profile.');
        }
    }

    public function change_profile_picture()
    {
        return view('user/profiles/change-profile-picture', ['title' => 'Change Profile Picture']);
    }

    public function upload_profile_picture()
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
            $userData = $userModel->find($user);
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

            $userModel->update($user, ['profile_picture' => $newName]);

            return redirect()->to('profile/details')->with('message', 'Profile picture uploaded successfully.');
        }

        return redirect()->back()->with('error', 'File upload failed.');
    }

    public function report_history()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        $reportsModel = new ReportsModel();
        $reports = $reportsModel->getReportsByUser($userId);

        $data = [
            'user' => $user,
            'reports' => $reports,
            'title' => 'Item Report History'
        ];

        return view('user/profiles/report-history', $data);
    }

    public function account_settings()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        $data = [
            'user' => $user,
            'title' => 'Account Settings'
        ];

        return view('user/profiles/account-settings', $data);
    }

    public function update_password()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');

        $currentPassword = $this->request->getPost('current_password');
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if ($newPassword !== $confirmPassword) {
            return redirect()->back()->with('error', 'New passwords do not match.');
        }

        $user = $userModel->find($userId);

        if (!password_verify($currentPassword, $user['password'])) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        $data = [
            'password' => password_hash($newPassword, PASSWORD_DEFAULT)
        ];

        if ($userModel->update($userId, $data)) {
            return redirect()->to(base_url('profile/details'))->with('message', 'Password updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update password.');
        }
    }

    public function delete_account()
    {
        $userModel = new UserModel();
        $user = session()->get('user_id');

        if ($userModel->delete($user)) {
            session()->destroy();
            return redirect()->to(base_url('login'))->with('message', 'Account deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete account.');
        }
    }   
}
