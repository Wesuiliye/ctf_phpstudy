<?php
/**
 * 生成 JWT
 * @param array $payload 载荷数据（如用户ID、过期时间等）
 * @param string $secret 签名密钥
 * @return string 生成的JWT
 */
function generateJWT(array $payload, string $secret): string {
    // 1. 构建 Header
    $header = [
        'alg' => 'HS256', // 签名算法：HMAC SHA256
        'typ' => 'JWT'
    ];

    // 2. Base64Url 编码 Header
    $base64UrlHeader = base64UrlEncode(json_encode($header));

    // 3. 处理 Payload
    // 添加标准声明（如过期时间）
    # array_merge把两个数组合并为一个数组：
    $payload = array_merge([
        'iat' => time(),         // 签发时间
        'exp' => time() + 3600   // 过期时间（1小时后）
    ], $payload);

    // 4. Base64Url 编码 Payload
    $base64UrlPayload = base64UrlEncode(json_encode($payload));

    // 5. 生成签名
    $signature = hash_hmac(
        'sha256',
        $base64UrlHeader . '.' . $base64UrlPayload,
        $secret,
        true
    );

    // 6. Base64Url 编码签名
    $base64UrlSignature = base64UrlEncode($signature);

    // 7. 组合 JWT
    return $base64UrlHeader . '.' . $base64UrlPayload . '.' . $base64UrlSignature;
}

/**
 * Base64Url 安全编码（替换+/为-_，去掉末尾=）
 * 在平常的base64编码中其中 +、/ 和 = 这三个字符在 URL 或 Cookie 传输时会引发问题
 */
function base64UrlEncode(string $data): string {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}
/*
// ==================================================
// 使用示例
// ==================================================
$secretKey = 'test'; // 替换为你的密钥（建议32字节以上）

// 自定义载荷数据
$payload = [
    'sub' => 1,          // 用户ID
    'name' => 'admin',         // 用户名
    'role' => 'admin'             // 用户角色
];

try {
    $jwt = generateJWT($payload, $secretKey);
    echo "生成的JWT：\n" . $jwt;
} catch (Exception $e) {
    echo "生成失败：" . $e->getMessage();
}
*/

