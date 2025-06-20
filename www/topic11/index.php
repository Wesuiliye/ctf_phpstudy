<?php
error_reporting(0);
highlight_file(__FILE__);

class Testserialize{
    function __construct() {
        echo "hello,world!\n";
    }
    function __destruct() {
        echo "!dlrow,olleh\n";
        echo file_get_contents("flag.php");
    }
}
unserialize($_POST['cmd']);
