<?php
/**
 * Created by PhpStorm.
 * User: Joshua
 * Date: 15/5/1
 * Time: 上午9:08
 */

class Framework {

    private $classes;

    private function _initClasses() {
        $this->classes = array(
            'MySQLDB' => FRAMEWORK_PATH . 'MySQLDB.class.php',
            'Model' => FRAMEWORK_PATH . 'Model.class.php',
            'Framework' => FRAMEWORK_PATH . 'Framework.class.php'
        );
    }

    public function run() {
        $this->_initPath();
        $this->_initDispatchParam();
        $this->_initClasses();
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
            require MODEL_PATH . $class_name . '.class.php';
        } else if (substr($class_name, -10) == 'Controller') {
            require CURRENT_CONTROLLER_PATH . $class_name . '.class.php';
        }
    }

    private function _initDispatchParam() {
        define('PLATFORM', isset($_GET['p']) ? $_GET['p'] : 'f');
        define('CONTROLLER', isset($_GET['c']) ? $_GET['c'] : 'UEFA Champions League');
        define('ACTION', isset($_GET['a']) ? $_GET['a'] : 'match');

        define('CURRENT_CONTROLLER_PATH', CONTROLLER_PATH . PLATFORM . '/');
        define('CURRENT_VIEW_PATH', VIEW_PATH . PLATFORM . '/');
    }

    private function _initPath() {
        define('ROOT_PATH', getcwd() . '/');
        define('FRAMEWORK_PATH', ROOT_PATH . 'framework/');
        define('APP_PATH', ROOT_PATH . 'app/');
        define('CONTROLLER_PATH', APP_PATH . 'c/');
        define('MODEL_PATH', APP_PATH . 'm/');
        define('VIEW_PATH', APP_PATH . 'v/');
        define('WEB_PATH', ROOT_PATH . 'web/');
    }

    private function initConfig() {

    }
} 