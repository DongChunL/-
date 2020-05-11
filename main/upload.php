<?php
include  '../sql/phpConnectDb.php';
$fileInfo=$_FILES['xx'];//接受表单上传文件的数据
var_dump($fileInfo);
//var_dump($_FILES['file']);
function upload_file($fileInfo, $upload, $imagesExt)
  {
      // 判断错误号
      //
     if ($fileInfo['error'] == 00) {
         // 判断文件类型
         $ext = strtolower(pathinfo($fileInfo['name'],PATHINFO_EXTENSION));

         if (!in_array($ext,$imagesExt)) {
             return "非法文件类型";
         }

         // 判断是否存在上传到的目录
         if (!is_dir($upload)) {
             //mkdir($upload, 0777, true);
             echo "false";
         }

         // 生成唯一的文件名
         $fileName = md5(uniqid(microtime(true), true)).'.'.$ext;
         // 将文件名拼接到指定的目录下
        $destName = $upload . "/" . $fileName;
         // 进行文件移动
         if (!move_uploaded_file($fileInfo['tmp_name'], $destName)) {
             return "文件上传失败！";
         }
         return '上传成功';

     } else {
         // 根据错误号返回提示信息
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

 /*echo upload_file($upfile);*/
$upload = "../bikeImage";
$imagesExt = ['jpg','jpeg','png','mp4'];
upload_file($fileInfo,$upload,$imagesExt);
$ext       =strtolower(pathinfo($fileInfo['name'],PATHINFO_EXTENSION));
$j         =1048576;
$size      =$fileInfo['size']/$j;
$time      =date("Y-m-d H:i:s");
/*$tem=localhost/WebExam/finishphp/upload.php */
$fileName = md5(uniqid(microtime(true), true));
$src       ="bikeImage" . "/" . $fileName.".".$ext;
if($ext!="mp4"){

    $addsql = "INSERT INTO tup(photoUrl)VALUES('$src')";
    /*echo "$addsql";*/
    /*$check_sql = $link->query($addsql);*/
    /*$data      = $check_sql->fetch_all();
    var_dump($data);*/
    /*$result=$link->query($addsql);
    var_dump($result);*/
    if($link->query($addsql))
    {
        echo "<script> {window.alert('上传至数据库'); 
/*        location.href='upload.php';*/
    }
  </script>";
    }
    else
    {
        echo "添加失败?";
    }
}
else{
    echo "<script> {window.alert('文件格式不对'); 
    history.go(-1);}
    </script>";
}
 ?>


