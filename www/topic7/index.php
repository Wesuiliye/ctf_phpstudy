<?php
if (isset($_REQUEST['ip'])) {
    $ip = $_REQUEST['ip'];
    system("ping  ". $ip );
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ping Master Ultra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f0f0f0;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        form {
            text-align: center;
        }
        input[type="text"] {
            padding: 10px;
            width: 300px;
            margin: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            background: #4CAF50;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        input[type="submit"]:hover {
            background: #45a049;
        }
        pre {
            background: #1e1e1e;
            color: #00ff00;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
            overflow-x: auto;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>🛰️ Ping Me</h1>
    <form method="POST">
        <input type="text" name="ip" placeholder="输入要检测的IP地址" required>
        <br>
        <input type="submit" value="开始网络诊断