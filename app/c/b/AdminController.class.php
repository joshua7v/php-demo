<?php
/**
 * Created by PhpStorm.
 * User: Joshua
 * Date: 15/4/30
 * Time: 下午5:50
 */

class AdminController {

    /**
     * display login form
     */
    public function login() {
        // display login template
        include './app/v/b/login.html';
    }

    /**
     * authenticate
     */
    public function authenticate() {
        header('Content-Type: text/html; charset=utf-8');
        // get form data
        $admin_name = $_POST['username'];
        $admin_pass = $_POST['password'];

        // invoke db model to authenticate
        require './app/m/AdminModel.class.php';
        $model_admin = new AdminModel;
        if ($model_admin->check($admin_name, $admin_pass)) {
            // success
            echo 'login success';
        } else {
            echo 'login failed';
        }
    }
}