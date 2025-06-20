<?php
header("Content-type: text/html;charset=utf-8");
error_reporting(0);
define("UPLOAD_PATH", dirname(__FILE__) . "/upload/");
#将 UPLOAD_PATH（上传目录的绝对路径）中的文档根目录部分（如 /var/www/html）替换为空字符串，生成一个相对路径​（如 /uploads）。
define("UPLOAD_URL_PATH", str_replace($_SERVER['DOCUMENT_ROOT'], "", UPLOAD_PATH));
if (!file_exists(UPLOAD_PATH)) {
    mkdir(UPLOAD_PATH, 0755);
}
$is_upload = false;
if (!empty($_POST['submit'])) {
    #提取上传文件的原始文件名，并过滤掉路径信息。
    $name = basename($_FILES['file']['name']);
    #提取文件扩展名。
    $ext = strtolower(pathinfo($name)['extension']);
    $upload_file = UPLOAD_PATH . '/' . $name;
    $whitelist = array('jpg', 'png', 'gif', 'jpeg');

    if (move_uploaded_file($_FILES['file']['tmp_name'], UPLOAD_PATH . $name)) {
        if (in_array($ext, $whitelist)) {
            $rename_file = rand(10, 99) . date("YmdHis") . "." . $ext;
            $img_path = UPLOAD_PATH . '/' . $rename_file;
            #移动文件或重命名
            rename($upload_file, $img_path);
            $is_upload = true;
        } else {
            echo "<script>black();</script>";
            #删除文件
            unlink($upload_file);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文件上传(条件竞争)</title>
</head>
<body>
<h1>上传文件(条件竞争)</h1>
<form action="index.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file" id="file">
    <button type="submit" name="submit" value="Upload Image">上传</button>
</form>
</body>
</html>