<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Profiles extends Controller
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

        return view('profiles/profile-details', $data);
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

        return view('profiles/edit-profile', $data);
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
            // Update session variables
            session()->set(['user_id' => $user['id']]);
            return redirect()->to(base_url('profile/details'))->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to update profile.');
        }
    }

    public function change_profile_picture()
    {
        return view('profiles/change-profile-picture', ['title' => 'Change Profile Picture']);
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
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/profile_pictures', $newName);

            $userModel->update($user, ['profile_picture' => $newName]);

            return redirect()->to('profile/details')->with('message', 'Profile picture uploaded successfully.');
        }

        return redirect()->back()->with('error', 'File upload failed.');
    }
}
