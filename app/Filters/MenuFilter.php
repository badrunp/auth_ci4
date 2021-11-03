<?php

namespace App\Filters;

use App\Models\UserModel;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class MenuFilter implements FilterInterface
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
        $db = db_connect();
        $uuid = session()->get('id');

        if($uuid){
            $datas = $db->table('users')->select(['submenu.url'])
                    ->join('user_access_menu as amenu', 'users.role = amenu.user_role')
                    ->join('user_menu', 'amenu.user_menu = user_menu.id')
                    ->join('user_menu_submenu as submenu', 'user_menu.id = submenu.user_menu')->where(['users.id' => $uuid])->get()->getResultArray();
            $urls = [];
            if($datas){
                
                foreach($datas as $data){
                    $urls[] = explode(' ', trim(join(' ',explode('/', $data['url']))))[0];
                }

            }else{
                return redirect()->back();
            }
            
            if(count($urls) > 0){
                $path = explode('/', $request->getServer('PATH_INFO'))[1];
                $result = array_search($path, $urls);

                if($result == false){
                    return redirect()->back();
                }
            }else{
                return redirect()->back();
            }
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
