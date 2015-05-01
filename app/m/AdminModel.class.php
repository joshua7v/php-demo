<?php
/**
 * Created by PhpStorm.
 * User: Joshua
 * Date: 15/4/30
 * Time: 下午9:05
 */

class AdminModel extends Model {

    /**
     * authenticate
     * @param $admin_name string name
     * @param $admin_pass string pass
     *
     * @return bool
     */
    public function check($admin_name, $admin_pass) {
        $admin_pass_md5 = md5($admin_pass); // md5
        $sql = "SELECT * FROM `sh_admin` WHERE admin_name='$admin_name' and admin_pass='$admin_pass_md5'";
        return (bool)$this->_db->fetchRow($sql);
    }
} 