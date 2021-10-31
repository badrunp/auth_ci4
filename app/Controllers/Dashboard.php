<?php

namespace App\Controllers;

class Dashboard extends BaseController {

    public function index(){

        $data = [
            'title' => 'Home'
        ];

        return view('dashboard/index', $data);

    }

}