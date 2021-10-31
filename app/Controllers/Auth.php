<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{

    protected $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function login()
    {

        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation()
        ];

        return view('auth/login', $data);
    }

    public function loginStore()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required'
            ],
            'password' => [
                'rules' => 'required'
            ]
        ])) {
            return redirect()->back()->withInput();
        }


        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->user->where(['email' => $email])->first();

        if($user){
            if(password_verify($password, $user['password'])){

                $data = $this->user->select([
                    'name',
                    'email',
                    'role',
                    'image',
                    'remember_token',
                    'verified_at',
                    'created_at',
                    'updated_at'
                ])->find($user['id']);
                
                session()->set('user', $data);

                return redirect()->to('/');

            }else{
                return redirect()->back()->with('error', 'Email or password is wrong!');
            }
        }else{
            return redirect()->back()->with('error', 'Email or password is wrong!');
        }


    }

    public function register()
    {

        $data = [
            'title' => 'Register',
            'validation' => \Config\Services::validation()
        ];

        return view('auth/register', $data);
    }

    public function registerStore()
    {

        if (!$this->validate([
            'name' => [
                'rules' => 'required'
            ],
            'role' => [
                'rules' => 'required'
            ],
            'email' => [
                'rules' => 'required'
            ],
            'password' => [
                'rules' => 'required'
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $role = $this->request->getPost('role');

        $user = $this->user->where(['email' => $email])->first();
        if (!$user) {

            $data = [
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role' => $role
            ];

            $this->user->insert($data);

            return redirect()->to('login')->with('message', 'Register successfully please login');
        } else {
            return redirect()->back()->with('error', 'Email has alrealdy exists');
        }
    }

    public function logout(){

        session()->destroy();

        return redirect()->to('login')->with('message', 'Logout successfully');

    }
}
