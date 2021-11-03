<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function profile()
    {

        $data = [
            'title' => 'User Profile',
            'validation' => \Config\Services::validation()
        ];

        return view('dashboard/user/profil', $data);
    }

    public function update()
    {

        if (!$this->validate([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'image' => 'max_size[image, 1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]'
        ])) {
            return redirect()->back()->withInput();
        }

        $image = $this->request->getFile('image');
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');

        if ($email == auth('email')) {

            if ($image->getError() === 4) {
                $nameFile = auth('image');
            } else {
                if (auth('image') != 'default.png') {
                    if (file_exists('uploads/' . auth('image'))) {
                        unlink('uploads/' . auth('image'));
                    }
                }

                $nameFile = $image->getRandomName();

                $image->move('uploads', $nameFile);
            }

            $data = [
                'name' => $name,
                'image' => $nameFile
            ];

            $this->user->update(auth('id'), $data);

            return redirect()->back()->with('message', 'Updated profile successfully');
        }
    }

    public function index()
    {

        $data = [
            'title' => 'User',
            'users' => $this->user->findAll()
        ];

        return view('dashboard/user/index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'User Create',
            'validate' => \Config\Services::validation(),
            'roles' => $this->user->db->table('user_role')->get()->getResultArray()
        ];

        return view('dashboard/user/create', $data);
    }

    public function store()
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
                'role' => $role,
                'image' => 'default.png'
            ];

            $this->user->insert($data);

            return redirect()->to('user')->with('message', 'Create user successfully');
        } else {
            return redirect()->back()->with('error', 'Email has alrealdy exists');
        }
    }

    public function delete($id)
    {
        $role = $this->request->getPost('role');
        $image = $this->request->getPost('image');
        
        if($role && $image){
            if ($role == 1) {
                return redirect()->back()->with('error', 'No deleted is user!');
            } else {

                if ($image != 'default.png') {
                    if (file_exists('uploads/' . auth('image'))) {
                        unlink('uploads/' . auth('image'));
                    }
                }

                $this->user->delete($id);
            }
        }else{
            return redirect()->back()->with('error', 'No deleted is user!');
        }


        return redirect()->to('admin/user')->with('message', 'Delete role successfuly');
    }
}
