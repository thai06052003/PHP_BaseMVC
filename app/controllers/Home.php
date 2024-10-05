<?php
class Home extends Controller{
    public $province;
    public function __construct() {
        $this->province = $this->model('HomeModel');
    }
    public function index () {
        /* $data = $this->province->getListProvince();
        echo '<pre>';
        print_r($data);
        echo '</pre>'; */

        /* $detail = $this->province->getDetailProvince('Hà Nội');
        echo '<pre>';
        print_r($detail);
        echo '</pre>';

        echo '<hr>';

        //$data = $this->province->all();
        $data = $this->province->find(1);
        echo '<pre>';
        print_r($data);
        echo '</pre>'; */
        $data = [
            'fullname' => 'Tran Van B',
            'email' => 'tranvanb@gmail.com',
            'password' => '123456789',
            'about_content' => 'hihi',
            'contact_facebook' => 'facebook',
            'group_id ' => '1',
        ];
        $id = $this->db->table('users')->insert($data);
        var_dump($id);
    }
    public function get_user() {
        $request = new Request();
        $data = $request->getFields();
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        $this->render('users/add');
    }
    public function post_user() {
        $request = new Request();

        // Set rules
        $request->rules([
            'fullname'=> 'required|min:5|max:30',
            'email' => 'required|email|min:6',
            'password' => 'required|min:3',
            'confirm_password' => 'required|min:3|match:password',
        ]);

        // Set message
        $request->message([
            'fullname.required' => 'Họ tên không được để trống',
            'fullname.min' => 'Họ tên phải lớn hơn 5 ký tự',
            'fullname.max' => 'Họ tên phải nhỏ hơn 30 ký tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Định dạng email không hợp lệ',
            'email.min' => 'Độ dài email phải lớn hơn 6 ký tự',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải lớn hơn 3 ký tự',
            'confirm_password.required' => 'Nhập lại mật khẩu không được để trống',
            'confirm_password.match' => 'Mật khẩu nhập lại không khớp',
        ]);
        $request->validate();
        echo '<pre>';
        print_r($request->errors);
        echo '</pre>';
        
    }
}
    