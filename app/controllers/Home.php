<?php
class Home extends Controller {

    // Index of the home page (localhost/home(/index))
    // login page
    public function index($param1= '', $param2= '', $param3= '') {
        $productModel = $this->model('ProductModel');
        $products = $productModel->all();
        $this->view('home/index', ['products' => $products]);
    }

    public function ajaxPaginationProduct() {
        $productModel = $this->model('ProductModel');
        $products = $productModel->all();
        $result = json_encode($products, JSON_UNESCAPED_UNICODE);
//        $result = str_replace('{', "[", $result);
//        $result = str_replace('}', "]", $result);

        echo $result;
    }

    public function products($param1='', $param2='', $param3='') {
        $this->view('home/product');
    }
}
