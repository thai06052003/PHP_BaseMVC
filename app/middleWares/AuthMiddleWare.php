<?php
class AuthMiddleWare extends MiddleWare {
    public function handle(){
        $homeModel = Load::model('HomeModel');
        $data = $homeModel->all();
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        //var_dump('handle');
        //$data = $this->db->table('users')->get();

        if (Session::data('admin_login')==null) {
            $response = new Response();
            //$response->redirect('trang-chu');
        }
    }
}