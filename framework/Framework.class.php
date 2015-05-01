<?php
/**
 * Created by PhpStorm.
 * User: Joshua
 * Date: 15/5/1
 * Time: 上午9:08
 */

class Framework {

    private $classes = array(
//        'class name' => 'path'
        'MySQLDB' => './framework/MySQLDB.class.php',
        'Model' => './framework/Model.class.php',
        'Framework' => './framwork/Framework.class.php'
    );

    public function run() {
        $this->_initDispatchParam();
        // register autoload
        spl_autoload_register(array($this, 'userAutoload'));
        $this->_dispatch();
    }

    private function _dispatch() {
        $c = ucfirst(CONTROLLER);
//        $c_file = './app/c/'. PLATFORM . '/' . $c . 'Controller.class.php';
//        require $c_file;
        $c_name = $c . 'Controller';
        $controller = new $c_name;
        $a = ACTION;
        $controller->$a();
    }

    public function userAutoload($class_name) {
        if (isset($this->classes[$class_name])) {
            // load
            require $this->classes[$class_name];
        } else if (substr($class_name, -5) == 'Model') {
            require './app/m/' . $class_name . '.class.php';
        } else if (substr($class_name, -10) == 'Controller') {
            require './app/c/' . PLATFORM . '/' . $class_name . '.class.php';
        }
    }

    private function _initDispatchParam() {
        define('PLATFORM', isset($_GET['p']) ? $_GET['p'] : 'f');
        define('CONTROLLER', isset($_GET['c']) ? $_GET['c'] : 'UEFA Champions League');
        define('ACTION', isset($_GET['a']) ? $_GET['a'] : 'match');
    }

    private function initPath() {

    }

    private function initConfig() {

    }
} 