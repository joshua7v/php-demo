<?php
/**
 * Created by PhpStorm.
 * User: Joshua
 * Date: 15/4/30
 * Time: 下午9:07
 */

class Model {
    protected $_db;//所实例化MySQLDB对象

    public function __construct() {
        $this->_initDB();
    }

    /**
     * init
     */
    protected function _initDB () {
        require_once './framework/MySQLDB.class.php';
        $config = array('host'=>'127.0.0.1', 'user'=>'root', 'pass'=>'419512', 'dbname'=>'shop');
        $this->_db = MySQLDB::getInstance($config);
    }

}