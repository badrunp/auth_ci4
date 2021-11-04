<?php

namespace App\Controllers;

use App\Models\RoleModel;

class Role extends BaseController
{

    protected $role;

    public function __construct()
    {
        $this->role = new RoleModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Role',
            'roles' => $this->role->findAll()
        ];

        return view('dashboard/role/index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Role Create',
            'validate' => \Config\Services::validation()
        ];

        return view('dashboard/role/create', $data);
    }

    public function store()
    {

        if (!$this->validate([
            'name' => 'required|min_length[3]|is_unique[user_role.name]'
        ])) {
            return redirect()->back()->withInput();
        }

        $data = [
            'name' => $this->request->getPost('name')
        ];

        $this->role->insert($data);

        return redirect()->to('role')->with('message', 'Create role successfuly');
    }

    public function edit($id)
    {

        if($id == '1' || $id == '2'){
            return redirect()->back()->with('error', 'No edited is role!');
        }

        $data = [
            'title' => 'Role Edit',
            'validate' => \Config\Services::validation(),
            'role' => $this->role->find($id)
        ];

        return view('dashboard/role/edit', $data);
    }

    public function update($id){

        if($id == '1' || $id == '2'){
            return redirect()->back()->with('error', 'No updated is role!');
        }

        if (!$this->validate([
            'name' => 'required|min_length[3]|is_unique[user_role.name,id,'.$id.']'
        ])) {
            return redirect()->back()->withInput();
        }

        $data = [
            'name' => $this->request->getPost('name')
        ];

        $this->role->update($id, $data);

        return redirect()->to('role')->with('message', 'Update role successfuly');

    }

    public function delete($id)
    {
        if($id == '1' || $id == '2'){
            return redirect()->back()->with('error', 'No deleted is role!');
        }else{
            $this->role->delete($id); 
        }

        return redirect()->to('role')->with('message', 'Delete role successfuly');
    }

    public function menuaccess($id){

        $data = [
            'title' => "Menu Access",
            'role' => $this->role->find($id),
            'menus' => $this->role->db->table('user_menu')->get()->getResultArray()
        ];

        return view('dashboard/role/menuaccess', $data);

    }
}
