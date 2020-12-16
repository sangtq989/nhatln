<?php
class User extends Controller {

    // login page
    public function index($param1= '', $param2= '', $param3= '') {
        $user = isset($_POST['user']) ? $_POST['user'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $error = '';
        if ($user !== '' && $password !== '') {
            $userModel = $this->model('UserModel');
            $checkUser = $userModel->login($user, $password);
            if ($checkUser[0]->user === 1) {
                $_SESSION['user'] = $user;
                header("location: " . URL);
                exit();
            }else {
                $error = "Tên đăng nhập hoặc mật khẩu không chính xác";
                $encode = base64_encode($error);
            }
        }
        $this->view('user/index', ['error' => $error]);
    }
}

?>