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
}