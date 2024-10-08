<?php
class Home extends Controller
{
    public $province, $data = [];
    public function __construct()
    {
        $this->province = $this->model('HomeModel');
    }
    public function index()
    {   
        /* $check = Session::data('username', [
            'name' => 'Xuan Thai',
            'email' => 'xuanthai0304@gmail.com',
        ]);
        var_dump($check);
        Session::data('academy', 'unicode');
        Session::delete('academy');
        $sessionData = Session::data();
        echo '<pre>';
        print_r($sessionData);
        echo '</pre>'; */

        //Session::flash('msg', 'Thêm dữ liệu thành công');
        /* $msg = Session::flash('msg');
        echo $msg; */
        //echo toSlug('Thời sự');
    }
    public function get_user()
    {
        $this->data['errors'] = Session::flash('errors');
        $this->data['msg'] = Session::flash('msg');
        $this->data['old'] = Session::flash('old');
        $this->render('users/add', $this->data);
    }
    public function post_user()
    {
        $userId = 20;
        $request = new Request();
        if ($request->isPost()) {
            // Set rules
            $request->rules([
                'fullname' => 'required|min:5|max:30',
                'email' => 'required|email|min:6|unique:users:email:id='.$userId,
                'password' => 'required|min:3',
                'confirm_password' => 'required|match:password',
                'age' => 'required|callback_check_age',
            ]);

            // Set message
            $request->message([
                'fullname.required' => 'Họ tên không được để trống',
                'fullname.min' => 'Họ tên phải lớn hơn 5 ký tự',
                'fullname.max' => 'Họ tên phải nhỏ hơn 30 ký tự',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Định dạng email không hợp lệ',
                'email.min' => 'Độ dài email phải lớn hơn 6 ký tự',
                'email.unique' => 'Email đã tồn tại trong hệ thống',
                'age.required' => 'Tuổi không được để trống',
                'age.callback_check_age' => 'Tuổi không được nhỏ hơn 20',
                'password.required' => 'Mật khẩu không được để trống',
                'password.min' => 'Mật khẩu phải lớn hơn 3 ký tự',
                'confirm_password.required' => 'Nhập lại mật khẩu không được để trống',
                'confirm_password.match' => 'Mật khẩu nhập lại không khớp',
            ]);

            $validate = $request->validate();
            if (!$validate) {
                Session::flash('msg', 'Đã có lỗi xảy ra vui lòng thử lại sau.');
            }
            //$this->render('users/add', $this->data);
        }
        $reponse = new Response();
        $reponse->redirect('home/get_user');
    }
    public function check_age($age) {
        if ($age >= 20) {
            return true;
        }
        return false;
    }
}
