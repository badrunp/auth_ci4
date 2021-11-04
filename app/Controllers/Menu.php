<?php 

namespace App\Controllers;

use App\Models\MenuModel;

class Menu extends BaseController {

    protected $menu;

    public function __construct()
    {
        $this->menu = new MenuModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Menu',
            'menus' => $this->menu->findAll()
        ];

        return view('dashboard/menu/index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Menu Create',
            'validate' => \Config\Services::validation()
        ];

        return view('dashboard/menu/create', $data);
    }

    public function store()
    {

        if (!$this->validate([
            'title' => 'required|min_length[3]|is_unique[user_menu.title]'
        ])) {
            return redirect()->back()->withInput();
        }

        $data = [
            'title' => $this->request->getPost('title')
        ];

        $this->menu->insert($data);

        return redirect()->to('menu')->with('message', 'Create menu successfuly');
    }


    public function delete($id)
    {

        if(true){
            return redirect()->back()->with('error', 'No deleted is menu!');
        }else{
            $this->menu->delete($id); 
        }

        return redirect()->to('menu')->with('message', 'Delete menu successfuly');
    }

}