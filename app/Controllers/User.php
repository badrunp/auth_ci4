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

    public function profile(){

        $data = [
            'title' => 'User Profile',
            'validation' => \Config\Services::validation()
        ];
        
        return view('dashboard/user/profil', $data);

    }

    public function update(){
        
        if(!$this->validate([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'image' => 'max_size[image, 1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]'
        ])){
            return redirect()->back()->withInput();
        }

        $image = $this->request->getFile('image');
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');

        if($email == auth('email')){
            
            if($image->getError() === 4){
                $nameFile = auth('image');
            }else{
                if(auth('image') != 'default.png'){
                      if(file_exists('uploads/' . auth('image'))){
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
}
