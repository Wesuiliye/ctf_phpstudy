<?php
session_start();
$hidden_flag = "flag{hidden_flag_in_html_source}";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 模拟数据库查询
    $db_username = "admin";
    $db_password_hash = "123456";

    if ($username === $db_username && $password === $db_password_hash) {
        $_SESSION['logged_in'] = true;
        echo htmlspecialchars($hidden_flag);
        exit;
    } else {
        echo "<p style='color:#ffffff;'>用户名或密码错误</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录页面（弱）</title>
</head>
<body>
<h1>登录（弱）</h1>
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