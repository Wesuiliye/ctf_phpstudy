<?php
session_start();

$host = 'db';  // 关键：使用服务名而不是 localhost 或 127.0.0.1
$user = 'root';
$pass = 'root';
$dbname = 'phptopic';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = mysqli_connect($host, $user, $pass, $dbname);
    if (mysqli_connect_errno($conn)) {
        echo "连接 MySQL 失败: " . mysqli_connect_error();
        exit;
    }

    // SQL注入漏洞：直接将用户输入拼接到SQL查询中
    $query = "SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . $password . "'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['logged_in'] = true;
        header("Location: flag.php");
        exit;
    } else {
        echo "<p style='color:red;'>用户名或密码错误</p>";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录页面</title>
</head>
<body>
<h1>登录(强)</h1>
<form method="post">
    <label for="username">用户名:</label>
    <input type="text" id="username" name="username" required>
    <br><br>
    <label for="password">密码:</label>
    <input type="password" id="password" name="password" required>
    <br><br>
    <button type="submit">登录</button>
</form>
</body>
</html>