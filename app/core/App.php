<?php

class App
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        // Parse url into readable string
        $url = $this->parseUrl();  // get ten controller va cac thong tin tren url
        // $url[0] se tra ve ten 1 controller => kiem tra controller ton tai
        if (isset($url)) {
            if (file_exists('../app/controllers/' . $url[0] . '.php')) { // file_exists de kiem tra file co ton tai hay ko
            $this->controller = $url[0];    // neu ton tai thi thay doi controller, mac dinh la 'home'
            unset($url[0]);
            }
        }

        
        // If controller (url[0]) doesn't exist it will use 'home' automatically
        require_once '../app/controllers/' . $this->controller . '.php';  // include controller

        $this->controller = new $this->controller;  // Khoi tao 1 controller, VD: $this->controller = 'home' => $this->controller = new home()

        // Get method
        if (isset($url[1])) { // $url[1] la method, method nay nam trong controller, tuy vao method de goi ham tuong ung
            if (method_exists($this->controller, $url[1])) { // kiem tra method co ton tai hay khong
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Get parameters
        $this->params = $url ? array_values($url) : [];

        // Calls the specific controller, method and pass the parameters to them
        call_user_func_array([$this->controller, $this->method], $this->params); // goi controller, method va truyen cac params vao method neu co
    }

    // Get thong tin ve controller, method tren url
    // url: localhost:8001/?url=home/index
    // tra ve 1 array chua ten controller va method
    private function parseUrl() {
        if (isset($_GET['url'])){
            $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            return $url;
        }
    }
}

?>