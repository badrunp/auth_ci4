<?php 
 
namespace App\Controllers;

use App\Models\SubmenuModel;

class Submenu extends BaseController {

    protected $submenu;

    public function __construct()
    {
        $this->submenu = new SubmenuModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Submenu',
            'submenus' => $this->submenu->db->table('user_menu_submenu')->select([
                'user_menu_submenu.id',
                'user_menu_submenu.title',
                'user_menu_submenu.url',
                'user_menu_submenu.icon',
                'user_menu.title as menu',
            ])->join('user_menu', 'user_menu_submenu.user_menu = user_menu.id')->get()->getResultArray()
        ];

        return view('dashboard/submenu/index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Submenu Create',
            'validate' => \Config\Services::validation(),
            'menus' => $this->submenu->db->table('user_menu')->get()->getResultArray()
        ];

        return view('dashboard/submenu/create', $data);
    }

    public function store()
    {

        if (!$this->validate([
            'title' => 'required',
            'url' => 'required|min_length[3]|is_unique[user_menu_submenu.url]',
            'icon' => 'required',
            'user_menu' => 'required'
        ])) {
            return redirect()->back()->withInput();
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'url' => $this->request->getPost('url'),
            'icon' => $this->request->getPost('icon'),
            'user_menu' => $this->request->getPost('user_menu'),
        ];

        $this->submenu->insert($data);

        return redirect()->to('submenu')->with('message', 'Create submenu successfuly');
    }

    public function edit($id)
    {

        if($id == '4'){
            return redirect()->back()->with('error', 'No edited is submenu!');
        }

        $data = [
            'title' => 'Role Edit',
            'validate' => \Config\Services::validation(),
            'submenu' => $this->submenu->find($id),
            'menus' => $this->submenu->db->table('user_menu')->get()->getResultArray()
        ];

        return view('dashboard/submenu/edit', $data);
    }

    public function update($id){

        if(explode('/', $this->request->getPath())[0] == $this->request->getPost('oldurl')){
            return redirect()->back()->with('error', 'No updated is submenu!');
        }

        if (!$this->validate([
            'title' => 'required',
            'url' => 'required|min_length[3]|is_unique[user_menu_submenu.url,id,'.$id.']',
            'icon' => 'required',
            'user_menu' => 'required'
        ])) {
            return redirect()->back()->withInput();
        }
        

        $data = [
            'title' => $this->request->getPost('title'),
            'url' => $this->request->getPost('url'),
            'icon' => $this->request->getPost('icon'),
            'user_menu' => $this->request->getPost('user_menu'),
        ];

        $this->submenu->update($id, $data);

        return redirect()->to('submenu')->with('message', 'Update submenu successfuly');

    }

    public function delete($id)
    {
        if($id == '4'){
            return redirect()->back()->with('error', 'No deleted is submenu!');
        }else{
            $this->submenu->delete($id); 
        }

        return redirect()->to('submenu')->with('message', 'Delete submenu successfuly');
    }

}