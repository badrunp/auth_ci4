<?php

namespace App\Controllers;

class Dashboard extends BaseController
{

    public function index()
    {
        // $email = \Config\Services::email();

        // $email->setFrom('test@example.com', 'Badrun');
        // $email->setTo('bbadrunn@gmail.com');

        // $email->setSubject('Email Test');
        // $email->setMessage('Testing the email class.');

        // $email->send();

        $data = [
            'title' => 'Home'
        ];

        return view('dashboard/index', $data);
    }
}
