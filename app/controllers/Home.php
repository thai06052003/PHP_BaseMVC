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
    public function get_user()
    {
        $request = new Request();
        $data = $request->getFields();
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        $this->render('users/add');
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
                $this->data['errors'] = $request->error();
                $this->data['msg'] = 'Đã có lỗi xảy ra vui lòng thử lại sau.';
                $this->data['old'] = $request->getFields();
            }
            $this->render('users/add', $this->data);
        }
        else {
            $reponse = new Response();
            $reponse->redirect('home/get_user');
        }
    }
    public function check_age($age) {
        if ($age >= 20) {
            return true;
        }
        return false;
    }
}
