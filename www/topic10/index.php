<?php
error_reporting(0);

$a1 = md5($_GET['a1']);
$a2 = md5($_GET['a2']);
$b1 = hash('sha1', $_GET['b1']);
$b2 = hash('sha1', $_GET['b2']);

if ($a1 == $a2 and $a1!==$a2) {
    if ($b1 == $b2  and $b1!==$b2) {
        highlight_file('flag.php');
        die();
    } else{
        echo "Come on, please continue";
    }
} else {
    highlight_file(__FILE__);
}
?>