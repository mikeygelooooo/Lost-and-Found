<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function signup()
    {
        return view('auth/signup', ['title' => '| Sign Up']);
    }

    public function register()
    {
        $userModel = new UserModel();

        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if ($password !== $confirmPassword) {
            // Handle password mismatch (e.g. set flashdata and redirect back)
            session()->setFlashdata('error', 'Passwords do not match.');
            return redirect()->back()->withInput();
        }

        $data = [
            'first_name'   => $this->request->getPost('first_name'),
            'last_name'    => $this->request->getPost('last_name'),
            'email'        => $this->request->getPost('email'),
            'password'     => password_hash($password, PASSWORD_DEFAULT),
            'phone_number' => $this->request->getPost('phone_number'),
        ];

        $userModel->insert($data);

        $userId = $userModel->getInsertID();
        $user = $userModel->find($userId);

        session()->set(['user_id' => $user['id']]);

        return redirect()->to('home');
    }


    public function login()
    {
        return view('auth/login', ['title' => '| Log In']);
    }

    public function authenticate()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        // CHANGE LATER FOR HASHED PASSWORDS
        if ($user && password_verify($password, $user['password'])) {
            session()->set(['user_id' => $user['id']]);

            return redirect()->to('home');
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }


    public function logout()
    {
        session()->destroy();

        return redirect()->to(base_url('login'));
    }
}
