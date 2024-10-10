<?php
class AuthMiddleWare extends MiddleWare {
    public function handle(){
        $homeModel = Load::model('HomeModel');
        $data = $homeModel->all();
        

        if (Session::data('admin_login')==null) {
            $response = new Response();
            //$response->redirect('trang-chu');
        }
    }
}