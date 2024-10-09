<?php
class AuthMiddleWare extends MiddleWare {
    public function handle(){
        // TODO: Implement handle() method
        var_dump('handle');
        if (Session::data('admin_login')==null) {
            $response = new Response();
            $response->redirect('trang-chu');
        }
    }
}