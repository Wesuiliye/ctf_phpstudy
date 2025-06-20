<?php
ini_set('display_errors', 0);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $target_dir = "uploads/";
    #basename用于从一个路径字符串中提取文件名部分（不包括目录路径），并返回提取的文件名
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;

    /*
    #pathinfo() 是一个 PHP 函数，用于获取文件路径的相关信息。
    #$target_file 是上传文件的完整路径。
    #PATHINFO_EXTENSION 是一个常量，表示我们想要获取的信息类型，这里是文件的扩展名。
    #strtolower() 是一个 PHP 函数，用于将字符串中的所有字母转换为小写。
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // 允许特定文件格式
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    */


    // 检查文件是否已存在
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }


    // upload_max_filesize写死了是不能大于2mb
    if ($_FILES['fileToUpload']['error'] === 1) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }




    // 允许上传
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        exit();
    } else {
        $fi = new finfo(FILEINFO_MIME_TYPE);
        #$mime_type = $fi->file($_FILES["fileToUpload"]["tmp_name"]);
        $mime_type = $_FILES['fileToUpload']['type'];
        $mime_types = ["image/gif", "image/jpeg", "image/png", "image/bmp", "image/pjpeg"];
        if (!in_array($mime_type, $mime_types)) {
            echo "Sorry, only JPG, JPEG, PNG, BMP & GIF files are allowed.";
            exit();
        }

        #move_uploaded_file() 是一个 PHP 函数，用于将上传的临时文件移动到指定的目标位置。
        #$_FILES["fileToUpload"]["tmp_name"] 是上传文件的临时文件路径。当用户通过表单上传文件时，文件首先会被存储在一个临时目录中，这个路径就是 tmp_name。
        #$target_file 是你希望将文件移动到的目标路径。例如，uploads/image.jpg。

        #这里有个坑。文件大于upload_max_filesize也就是2mb时会上传不上去。
        #echo ini_get('upload_max_filesize');   #限制PHP处理上传文件的最大值，此值必须小于post_max_size值
        #echo ini_get('post_max_size');         #限制通过POST方法可以接受的信息最大量
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            #basename($_FILES["fileToUpload"]["name"]) 获取上传文件的原始文件名（不包括路径）。
            echo "The file " . htmlspecialchars($target_file) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文件上传</title>
</head>
<body>
<h1>上传文件</h1>
<form action="index.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <button type="submit" name="submit" value="Upload Image">上传</button>
</form>
</body>
</html>