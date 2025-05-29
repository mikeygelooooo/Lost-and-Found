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
        $userId = session()->get('user_id');

        // Update user data
        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'email' => $this->request->getPost('email'),
            'phone_number' => $this->request->getPost('phone_number')
        ];

        if ($userModel->update($userId, $data)) {
            // Update session variables
            session()->set([
                'first_name' => $data['first_name'],
                'last_name'  => $data['last_name'],
                'email'      => $data['email'],
            ]);
            return redirect()->to(base_url('profile/details'))->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to update profile.');
        }
    }
}
