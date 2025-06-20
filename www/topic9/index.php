<?php
#error_reporting(0);
include 'initialize.php';
/*
    $_SERVER['REMOTE_ADDR']; //访问端（有可能是用户，有可能是代理的）IP
    $_SERVER['HTTP_CLIENT_IP']; //代理端的（有可能存在，可伪造）
    $_SERVER['HTTP_X_FORWARDED_FOR']; //用户是在哪个IP使用的代理（有可能存在，也可以伪造）
 */
// IP白名单验证
$client_ip = $_SERVER["HTTP_X_FORWARDED_FOR"] ?? '';
if ($client_ip !== '127.0.0.2') {
    header("HTTP/1.1 403 Forbidden");
    die("<h2>⛔ 警告：本接口仅限127.0.0.2访问！</h2>");
}

// UA验证（存在缺陷的验证方式）
$ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
if (strpos($ua, 'hacker') === false) {
    header("HTTP/1.1 403 Forbidden");
    die("<h2>⚠️ 非法客户端：请使用hacker浏览器访问</h2>");
}

// Referer检测
$currentUrl = 'http://www.hacker.com';
$referer = $_SERVER['HTTP_REFERER'] ?? '';
# parse_url($referer, PHP_URL_HOST) 设置 PHP_URL_HOST 的目的是精确提取URL中的域名信息
if (parse_url($referer, PHP_URL_HOST) !== parse_url($currentUrl, PHP_URL_HOST)) {
    die('<h2>🚫 非法来源：请求必须来自'.$currentUrl.'</h2>');
}

// 身份伪造
if ($_COOKIE['user'] !== 'admin') {
    die('<h2>🚫 非法访问：验证失败！你不是管理员！</h2>');
}

// JWT
$jwt = validateJWT($_COOKIE['token'], 'test');
if($jwt['role'] !== 'admin') {
    die('<h2>🚫 你知道jwt吗？？？（ps. key=test）</h2>');
}

echo "flag{th1s_1s_sup3r_s3cr3t}";