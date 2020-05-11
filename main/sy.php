
<?php
    $fileInfo  =$_FILES['file'];

    $upload    = "../bikeImage";
var_dump($upload );
    $imagesExt = ['jpg','jpeg','png','gif','mp4'];

    $filename  =$_POST['filename'];
var_dump($filename);

    function upload_file($fileInfo,$filename,$upload,$imagesExt)
    {
        if ($fileInfo['error'] == 00) {
            $ext = strtolower(pathinfo($fileInfo['name'],PATHINFO_EXTENSION));
            if (!in_array($ext, $imagesExt)) {
                return "非法文件类型";
            }
            if (!is_dir($upload)) {
                echo "false";
            }
            $fileName = $filename.'.'.$ext;
            $destName = $upload . "/" . $fileName;
            if (!move_uploaded_file($fileInfo['tmp_name'], $destName)) {
                return "文件上传失败！";
            }
            return "文件上传成功！";
        } else {
            switch (@$files['error']) {
                case 1:
                    echo "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值";
                    break;
                case 2:
                    echo "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值";
                    break;
                case 3:
                    echo "文件只有部分被上传";
                    break;
                case 4:
                    echo "没有文件被上传";
                    break;
                case 6:
                    echo "不知道什么错误";
                    break;
                case 7:
                    echo "系统错误";
                    break;
            }
        }
    }
?>
