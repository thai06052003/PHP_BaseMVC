<?php
class Product extends Controller{
    public $data = [];
    public function index() {
        echo 'Index - Danh sách sản phẩm';
        $this->data['page_title'] = 'Danh sách sản phẩm';
    }
    public function list_product() {
        $product = $this->model('ProductModel');
        $dataProduct = $product->getProductLists();
        $title = 'Danh sách sản phẩm';

        $this->data['sub_content']['product_list'] = $dataProduct;
        $this->data['sub_content']['page_title'] = $title;

        $this->data['page_title'] = 'Danh sách sản phẩm';
        $this->data['content'] = 'products/list';

        $this->data['sub_content']['userInfo'] = [
            'fullname' => 'Xuan Thai',
        ];

        // Render views
        $this->render('layouts/client_layout', $this->data);
    }
    public function detail($id=0) {
        $product = $this->model('ProductModel');
        $this->data['sub_content']['info'] = $product->getDetail($id);
        $this->data['sub_content']['title'] = 'CHI TIET SAN PHAM';

        $this->data['page_title'] = 'Chi tiết sản phẩm';
        $this->data['content'] = 'products/detail';
        $this->data['sub_content']['userInfo'] = [
            'fullname' => 'Xuan Thai',
        ];
        
        $this->render('layouts/client_layout', $this->data);
    }
}