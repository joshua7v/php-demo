<?php
/**
 * Created by PhpStorm.
 * User: Joshua
 * Date: 15/4/30
 * Time: 下午6:06
 */

$p = isset($_GET['p']) ? $_GET['p'] : 'f';
$c = isset($_GET['c']) ? $_GET['c'] : 'UEFA Champions League';
$c = ucfirst($c);
$a = isset($_GET['a']) ? $_GET['a'] : 'match';

$c_file = './app/c/'. $p . '/' . $c . 'Controller.class.php';
require $c_file;
$c_name = $c . 'Controller';
$controller = new $c_name;
$controller->$a();
