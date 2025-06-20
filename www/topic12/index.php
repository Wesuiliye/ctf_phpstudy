<?php
error_reporting(0);
highlight_file(__FILE__);

class Testserialize{
    function __wakeup() {
        exit(); // 反序列化时触发，直接终止程序
    }

    function __destruct() {
        echo file_get_contents("flag.php"); // 目标触发点
    }
}
unserialize($_POST['cmd']);
