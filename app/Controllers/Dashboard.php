<?php

namespace App\Controllers;

class Dashboard extends BaseController {

    public function index(){

        $data = [
            'title' => 'Dashboard | Home'
        ];

        return view('dashboard/index');

    }

}