<?php
include 'jwtdecode.php';
if (!isset($_COOKIE['token'])) {
    $secretKey = 'test'; // 替换为你的密钥（建议32字节以上）

// 自定义载荷数据
    $payload = [
        'sub' => 1,          // 用户ID
        'name' => 'test',         // 用户名
        'role' => 'test'             // 用户角色
    ];
    $jwt = generateJWT($payload, $secretKey);
    #$_COOKIE['token'] = $jwt;
    setcookie('token', $jwt);
}
if (!isset($_COOKIE['user'])) {
    setcookie('user', 'test');
}