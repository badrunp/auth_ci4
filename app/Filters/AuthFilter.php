<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $id = session()->get('id');
        $role = session()->get('role');

        if (!$id && !$role) {
            return redirect()->to('login');
        }

        $this->authenticate($id);
    }

    public function authenticate($id)
    {
        helper('auth_helper');
        helper('cookie');

        if (auth() == null) {
            $db = db_connect();

            $data = $db->table('users')->select([
                'users.id',
                'users.name',
                'users.email',
                'users.role',
                'user_role.name as role_name',
                'users.image',
                'users.remember_token',
                'users.verified_at',
                'users.created_at',
                'users.updated_at'
            ])->join('user_role', 'users.role = user_role.id')->where(['users.id' => $id])->get()->getRowArray();

            if($data['remember_token'] != null){
                set_cookie('remember_token', $data['remember_token']);
            }

            setAuth($data);
        }
    }



    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
