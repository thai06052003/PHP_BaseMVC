<?php
class Home extends Controller{
    public $province;
    public function __construct() {
        $this->province = $this->model('HomeModel');
    }
    public function index () {
        $data = $this->province->getListProvince();
        echo '<pre>';
        print_r($data);
        echo '</pre>';

        $detail = $this->province->getDetailProvince('Hà Nội');
        echo '<pre>';
        print_r($detail);
        echo '</pre>';

        echo '<hr>';

        //$data = $this->province->all();
        $data = $this->province->find(1);
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}
    