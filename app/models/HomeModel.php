<?php
/* 
* Kế thừa từ class Model
*/
class HomeModel extends Model{
    public function tableFill() {
        return 'province';
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
        $data = $this->db->table('province')->whereLike('name', '%Hồ%')->select('code, name')->get();
        //$data = $this->db->table('province')->where('id', '>', 1)->whereLike('name', '%Hồ%')->select('code, name')->get();
        return $data;
    }
    public function getDetailProvince($name) {
        $data = $this->db->table('province')->where('name', '=', $name)->first();
        return $data;
    }
}
