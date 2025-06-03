<?php

namespace App\Controllers\User;

use App\Models\UserModel;
use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function signup()
    {
        if (session()->has('user_id')) {
            return redirect()->to('home');
        }
        return view('user/auth/signup', ['title' => '| Sign Up']);
    }

    public function register()
    {
        if (session()->has('user_id')) {
            return redirect()->to('home');
        }

        $userModel = new UserModel();

        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if ($password !== $confirmPassword) {
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
        if (session()->has('user_id')) {
            return redirect()->to('home');
        }
        return view('user/auth/login', ['title' => '| Log In']);
    }

    public function authenticate()
    {
        if (session()->has('user_id')) {
            return redirect()->to('home');
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set(['user_id' => $user['id']]);
            return redirect()->to('home');
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }


    public function logout()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('login');
        }

        session()->destroy();

        return redirect()->to(base_url('login'));
    }
}
