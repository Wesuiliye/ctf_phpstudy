<?php
include 'jwtencode.php';
/**
 * 验证并解析 JWT
 * @param string $jwt 待验证的Token
 * @param string $secret 签名密钥
 * @return array|null 成功返回Payload数组，失败返回null
 */


/**
 * Base64Url 安全解码（还原-_为+/，补全=填充）
 */
function base64UrlDecode(string $data): string {
    // 步骤1：补全可能的缺失填充符号（=）
    $remainder = strlen($data) % 4;
    if ($remainder) {
        $data .= str_repeat('=', 4 - $remainder);
    }

    // 步骤2：还原字符替换（-_ → +/）
    $base64 = strtr($data, '-_', '+/');

    // 步骤3：标准 Base64 解码
    return base64_decode($base64);
}

function validateJWT(string $jwt, string $secret): ?array {
    // 步骤1：分割 Header、Payload、Signature
    $parts = explode('.', $jwt);
    if (count($parts) !== 3) {
        return null; // Token格式错误
    }

    list($base64UrlHeader, $base64UrlPayload, $base64UrlSignature) = $parts;

    // 步骤2：解码 Header 和 Payload
    try {
        $header = json_decode(base64UrlDecode($base64UrlHeader), true);
        $payload = json_decode(base64UrlDecode($base64UrlPayload), true);
    } catch (Exception $e) {
        return null; // 解码失败
    }

    // 步骤3：检查算法是否支持
    if (!isset($header['alg']) || $header['alg'] !== 'HS256') {
        return null; // 不支持的算法
    }

    // 步骤4：重新计算签名
    $signature = base64UrlEncode(
        hash_hmac('sha256', $base64UrlHeader . '.' . $base64UrlPayload, $secret, true)
    );

    // 步骤5：验证签名一致性
    if (!hash_equals($base64UrlSignature, $signature)) {
        return null; // 签名无效
    }
    /*
    // 步骤6：检查过期时间
    if (isset($payload['exp']) && $payload['exp'] < time()) {
        return null; // Token已过期
    }
    */

    return $payload; // 验证通过
}


#var_dump(validateJWT("eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpYXQiOjE3NDMwODIxNDEsImV4cCI6MTc0MzA4NTc0MSwic3ViIjoxLCJuYW1lIjoidGVzdCIsInJvbGUiOiJ0ZXN0In0.B87xSLTafGCCK-qM1a5E3pdz_R8sYiGaa8TpawlNuig",'test'));