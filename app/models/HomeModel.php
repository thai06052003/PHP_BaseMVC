<?php
/* 
* Kế thừa từ class Model
*/
class HomeModel extends Model{
    public function tableFill() {
        return 'blog';
    }
    public function fieldFill() {
        return '*';
    }
    function primaryKey() {
        return 'id';
    }
    public function getDetail($id) {
        $data = [
            'Item 1',
            'Item 2',
            'Item 3',
        ];
        return $data[$id];
    }
    public function getListProvince() {
        //$data = $this->db->table('province')->limit(4,2)->select('id, code, name')->orderBy('id', 'DESC')->get();
        $data = $this->db->table('blog as b')->join('blog_categories as bc', 'b.category_id  = bc.id')->join('users as u', 'u.id=b.user_id')->select('title, name, fullname, email')->get();
        //$data = $this->db->table('province')->where('id', '>', 1)->whereLike('name', '%Hồ%')->select('code, name')->get();
        return $data;
    }
    public function getDetailProvince($name) {
        $data = $this->db->table('province')->where('name', '=', $name)->first();
        return $data;
    }
    public function insertUser($data) {
        $this->db->table('users')->insert($data);
        return $this->db->lastId();
    }
    public function updateUser($data) {
        $this->db->table('users')->where('id','=',10)->update($data);
    }
    public function deleteUser($id) {
        $this->db->table('users')->where('id','=',$id)->delete();
    }
}
