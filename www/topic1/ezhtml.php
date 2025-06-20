<?php
// 设置HTTP响应头中的flag
header('X-CTF-Flag: CTF{H1dD1ng_F1ag_In_Resp0nse_He4d3r}');

// 输出一个简单的HTML页面
echo "<html>";
echo "<head><title>Secret Page</title></head>";
echo "<body>";
echo "<h1>Welcome to the Secret Page</h1>";
echo "<p>This page contains a hidden flag in the HTTP response headers.</p>";
echo "</body>";
echo "</html>";
?>