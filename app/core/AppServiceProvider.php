<?php
class AppServiceProvider extends ServiceProvider {
    public function boot() {
        /* $dataUsers = $this->db->table('users')->where('id', '=', 3)->first();
        $data['userInfo'] = $dataUsers; */
        $data['copyright'] = 'Copyright &copy; 2024 by XuanThai';
        View::share(($data));
    }
}