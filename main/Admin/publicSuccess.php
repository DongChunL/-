<?php


include '../../sql/phpConnectDb.php';
//求租
if ($_POST['toSuccess'] == 'qiuzu') {
    $seekClass = $_POST['seekStyle'];
    $seekTitle =  $_POST['txtTitle'];
    $publicProvince = $_POST['provinces'];   //子类
    $publicCity = $_POST['city'];        //子类
    $publicArea= $_POST['area'];        //子类
    $publicAddress = $_POST['address'];
    $seekDateStart = date("Y-m-d",strtotime($_POST['txtBeginTime']));
    $seekDateEnd  = date("Y-m-d",strtotime($_POST['txtEndTime']));
    $seekMoney  =$_POST['txtRentMoney'];
    $seekMoneyStyle =$_POST['RentMoneyStyle'];
    $seekPledge =intval($_POST['txtDepositMoney']);
    $seekNumber  =$_POST['txtNumber'];
    $seekInvoice =$_POST['sm'];
    $seekDescribe =$_POST['txtContent'];
    $seekPerson =$_POST['txtContact'];
    $seekGPhone  =$_POST['txtPre'].$_POST['txtMiddle'].$_POST['txtEnd'];
    $seekMPhone = $_POST['txtMobile'];
    $seekQQ = $_POST['txtQQ'];

    //处理省市区的转换；
    $sql = "SELECT province_name FROM province WHERE province_num ='$publicProvince'";
    if ($result = mysqli_query($link, $sql)) {
        $arr = mysqli_fetch_row($result);
        $publicProvince = $arr[0];
    }
    $sql = "SELECT city_name FROM city WHERE city_num ='$publicCity'";
    if ($result = mysqli_query($link, $sql)) {
        $arr = mysqli_fetch_row($result);
        $publicCity = $arr[0];
    }
    $sql = "SELECT area_name FROM area WHERE id ='$publicArea'";
    if ($result = mysqli_query($link, $sql)) {
        $arr = mysqli_fetch_row($result);
        $publicArea = $arr[0];
    }

    $sql="INSERT INTO carseek(seekId,seekTitle,seekClass,seekProvince,seekCity,seekArea,seekAddress,seekDateStart,seekDateEnd,seekMoney,seekMoneyStyle,seekPledge,seekNumber,seekInvoice,seekDescribe,seekPerson,seekGPhone,seekMPhone,seekQQ)VALUES (NULL,'$seekTitle','$seekClass','$publicProvince','$publicCity','$publicArea','$publicAddress','$seekDateStart','$seekDateEnd','$seekMoney','$seekMoneyStyle','$seekPledge','$seekNumber','$seekInvoice','$seekDescribe','$seekPerson','$seekGPhone','$seekMPhone','$seekQQ')";
    if(!$result = mysqli_query($link,$sql)){
        echo "求租信息插入失败!".mysqli_error($link);
        exit();
    }
}
//出租
if ($_POST['toSuccess'] == 'chuzu') {
    $timeToPublic = $_POST['timeToPublic'];
    $publicTitle = $_POST['TitleBox'];
    $publicClass = $_POST['classStyle'];  //类别
    $publicSheng = $_POST['provinces'];   //省
    $publicShi = $_POST['city'];        //市
    $publicQu = $_POST['area'];        //区
    $publicAddress = $_POST['address'];//地址
    $publicMoney = intval($_POST['RentMoneyBox']);//租金
    $publicMoneyStyle = $_POST['RentMoneyStyle']; //租金类型
    $publicPledge = $_POST['DepositBox'];//押金
    $publicMinRentTime = $_POST['ddlZuQi'];//最短租期天数
    $publicDemand = $_POST['ddlPayReq'];//付款要求
    $upload_file = $_FILES['upload_file']['name'];//图片
    $publicDescribe = $_POST['txtContent'];//详细描述
    $publicPerson = $_POST['RelationMan'];
    $publicMPhone = $_POST['MobileBox'];
    $publicGPhone = $_POST['AreaCodeBox'] . '' . $_POST['PhoneBox'] . $_POST['ExtensionBox'];
    $publicQQ = $_POST['QQBox'];

//处理省市区的转换；
    $sql = "SELECT province_name FROM province WHERE province_num ='$publicSheng'";
    if ($result = mysqli_query($link, $sql)) {
        $arr = mysqli_fetch_row($result);
        $publicSheng = $arr[0];
    }
    $sql = "SELECT city_name FROM city WHERE city_num ='$publicShi'";
    if ($result = mysqli_query($link, $sql)) {
        $arr = mysqli_fetch_row($result);
        $publicShi = $arr[0];
    }
    $sql = "SELECT area_name FROM area WHERE id ='$publicQu'";
    if ($result = mysqli_query($link, $sql)) {
        $arr = mysqli_fetch_row($result);
        $publicQu = $arr[0];
    }
    //添加一条自行车出租信息
    $sql = "INSERT INTO carpublic(publicId,publicTitle,publicClass,publicSheng,publicShi,publicQu,publicAddress,publicMoney,publicMoneyStyle,publicPledge,publicMinRentTime,publicDemand,publicDescribe,publicPerson,publicMPhone,publicGPhone,publicQQ,timeToPublic)VALUES(null,'$publicTitle','$publicClass','$publicSheng','$publicShi','$publicQu','$publicAddress','$publicMoney','$publicMoneyStyle','$publicPledge','$publicMinRentTime','$publicDemand','$publicDescribe','$publicPerson','$publicMPhone','$publicGPhone','$publicQQ','$timeToPublic')";
    if (!$result = mysqli_query($link, $sql)) {
        echo "添加出租信息错误" . mysqli_error($link);
        exit();
    }


    //图片处理
    $fileInfo = $_FILES['upload_file'];//接受表单上传文件的数据
    /*    echo $fileInfo['name'];*/
    /*    var_dump($fileInfo);*/
//var_dump($_FILES['file']);
    function upload_file($fileInfo, $upload, $imagesExt)
    {
        // 判断错误号
        //
        if ($fileInfo['error'] == 00) {
            // 判断文件类型
            $ext = strtolower(pathinfo($fileInfo['name'], PATHINFO_EXTENSION));

            if (!in_array($ext, $imagesExt)) {
                return "非法文件类型";
            }

            // 判断是否存在上传到的目录
            if (!is_dir($upload)) {
                //mkdir($upload, 0777, true);
                echo "false";
            }

            // 生成唯一的文件名
            $fileName = $fileInfo['name'];
            // 将文件名拼接到指定的目录下
            $destName = $upload . "/" . $fileName;
            // 进行文件移动
            if (!move_uploaded_file($fileInfo['tmp_name'], $destName)) {
                return "文件上传失败！";
            }
            return '上传成功';

        } else {
            // 根据错误号返回提示信息
            /*  switch (@$files['error']) {
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
              }*/
        }

    }

    /*echo upload_file($upfile);*/
    $upload = "../../bikeImage";
    $imagesExt = ['jpg', 'jpeg', 'png', 'mp4'];
    upload_file($fileInfo, $upload, $imagesExt);
    $ext = strtolower(pathinfo($fileInfo['name'], PATHINFO_EXTENSION));
    $j = 1048576;
    $size = $fileInfo['size'] / $j;
    $time = date("Y-m-d H:i:s");
    /*$tem=localhost/WebExam/finishphp/upload.php */
    $fileName = $fileInfo['name'];
    $src = "bikeImage" . "/" . $fileName . ".";
    if ($ext != "mp4") {
        $sql = "SELECT publicId FROM carpublic  ORDER BY publicId DESC LIMIT 1";
        $result = mysqli_query($link, $sql);
        $arr = mysqli_fetch_array($result);
        $publicId = $arr['publicId'];
        $addsql = "INSERT INTO tup(photoId,photoUrl,publicPerson,public_Id)VALUES(NULL,'$src','$publicPerson','$publicId')";
        /*echo "$addsql";*/
        /*$check_sql = $link->query($addsql);*/
        /*$data      = $check_sql->fetch_all();
        var_dump($data);*/
        /*$result=$link->query($addsql);
        var_dump($result);*/
        if ($link->query($addsql)) {
            /*            echo "<script> {window.alert('上传至数据库');
                    location.href='upload.php';
                }
              </script>";*/
        } else {
            echo mysqli_error($link);
            echo "添加失败?";
        }
    } else {
        echo "<script> {window.alert('文件格式不对'); 
    history.go(-1);}
    </script>";
    }
}
//更新出租
if ($_POST['toSuccess'] =='updatePublic'){
    $publicId= $_POST['publicId'];
    $timeToPublic = $_POST['timeToPublic'];
    $publicTitle = $_POST['TitleBox'];
    $publicClass = $_POST['classStyle'];  //类别
    $publicSheng = $_POST['provinces'];   //省
    $publicShi = $_POST['city'];        //市
    $publicQu = $_POST['area'];        //区
    $publicAddress = $_POST['address'];//地址
    $publicMoney = intval($_POST['RentMoneyBox']);//租金
    $publicMoneyStyle = $_POST['RentMoneyStyle']; //租金类型
    $publicPledge = $_POST['DepositBox'];//押金
    $publicMinRentTime = $_POST['ddlZuQi'];//最短租期天数
    $publicDemand = $_POST['ddlPayReq'];//付款要求
    $upload_file = $_FILES['upload_file']['name'];//图片
    $publicDescribe = $_POST['txtContent'];//详细描述
    $publicPerson = $_POST['RelationMan'];
    $publicMPhone = $_POST['MobileBox'];
    $publicGPhone = $_POST['AreaCodeBox'] . '' . $_POST['PhoneBox'] . $_POST['ExtensionBox'];
    $publicQQ = $_POST['QQBox'];
//处理省市区的转换；
    $sql = "SELECT province_name FROM province WHERE province_num ='$publicSheng'";
    if ($result = mysqli_query($link, $sql)) {
        $arr = mysqli_fetch_row($result);
        $publicSheng = $arr[0];
    }
    $sql = "SELECT city_name FROM city WHERE city_num ='$publicShi'";
    if ($result = mysqli_query($link, $sql)) {
        $arr = mysqli_fetch_row($result);
        $publicShi = $arr[0];
    }
    $sql = "SELECT area_name FROM area WHERE id ='$publicQu'";
    if ($result = mysqli_query($link, $sql)) {
        $arr = mysqli_fetch_row($result);
        $publicQu = $arr[0];
    }
    //更新一条自行车出租信息
    $sql = "UPDATE carpublic SET  publicTitle='$publicTitle',publicClass='$publicClass',publicSheng='$publicSheng',publicShi='$publicShi',publicQu='$publicQu',publicAddress='$publicAddress',publicMoney='$publicMoney',publicMoneyStyle='$publicMoneyStyle',publicPledge='$publicPledge',publicMinRentTime='$publicMinRentTime',publicDemand='$publicDemand',publicDescribe='$publicDescribe',publicPerson='$publicPerson',publicMPhone='$publicMPhone',publicGPhone='$publicGPhone',publicQQ='$publicQQ',timeToPublic='$timeToPublic' where publicId = '$publicId'";
    if (!$result = mysqli_query($link, $sql)) {
        echo "添加出租信息错误" . mysqli_error($link);
        exit();
    }


    //图片处理
    $fileInfo = $_FILES['upload_file'];//接受表单上传文件的数据
    /*    echo $fileInfo['name'];*/
    /*    var_dump($fileInfo);*/
//var_dump($_FILES['file']);
    function upload_file($fileInfo, $upload, $imagesExt)
    {
        // 判断错误号
        //
        if ($fileInfo['error'] == 00) {
            // 判断文件类型
            $ext = strtolower(pathinfo($fileInfo['name'], PATHINFO_EXTENSION));

            if (!in_array($ext, $imagesExt)) {
                return "非法文件类型";
            }

            // 判断是否存在上传到的目录
            if (!is_dir($upload)) {
                //mkdir($upload, 0777, true);
                echo "false";
            }

            // 生成唯一的文件名
            $fileName = $fileInfo['name'];
            // 将文件名拼接到指定的目录下
            $destName = $upload . "/" . $fileName;
            // 进行文件移动
            if (!move_uploaded_file($fileInfo['tmp_name'], $destName)) {
                return "文件上传失败！";
            }
            return '上传成功';

        } else {
            // 根据错误号返回提示信息
            /*  switch (@$files['error']) {
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
              }*/
        }

    }

    /*echo upload_file($upfile);*/
    $upload = "../../bikeImage";
    $imagesExt = ['jpg', 'jpeg', 'png', 'mp4'];
    upload_file($fileInfo, $upload, $imagesExt);
    $ext = strtolower(pathinfo($fileInfo['name'], PATHINFO_EXTENSION));
    $j = 1048576;
    $size = $fileInfo['size'] / $j;
    $time = date("Y-m-d H:i:s");
    /*$tem=localhost/WebExam/finishphp/upload.php */
    $fileName = $fileInfo['name'];
    $src = "bikeImage" . "/" . $fileName . ".";
    if ($ext != "mp4") {
        $first_sql = "SELECT public_Id from tup where public_Id = '$publicId'";
        $first_query = @mysqli_query($link,$first_sql);
        $first_result = @mysqli_fetch_array($first_query);
        $first_result = $first_result['public_Id'];
        if ($first_result==NULL){
            //原本无图的第一次插图
            $addsql =   "INSERT INTO tup(photoId,photoUrl,publicPerson,public_Id)VALUES(NULL,'$src','$publicPerson','$publicId')";
        }else{
            $addsql = "update tup set photoUrl='$src',publicPerson='$publicPerson'WHERE public_Id='$publicId'";
        }


        /*echo "$addsql";*/
        /*$check_sql = $link->query($addsql);*/
        /*$data      = $check_sql->fetch_all();
        var_dump($data);*/
        /*$result=$link->query($addsql);
        var_dump($result);*/
        if ($link->query($addsql)) {
            /*            echo "<script> {window.alert('上传至数据库');
                    location.href='upload.php';
                }
              </script>";*/
        } else {
            echo mysqli_error($link);
            echo "添加失败?";
        }
    } else {
        echo "<script> {window.alert('文件格式不对'); 
    history.go(-1);}
    </script>";
    }
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>自行车租赁 - 发布成功</title>
    <link href="../Css/nav.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../Css/public.css">
</head>
<body>
<!--    成功页主体-->
<div class="main" style=" margin: 0;">
    <div class="newFlow">
        免费发布出租信息步骤：<img src="../../image/icons/Gray_one.gif" alt="选择信息分类" border="0">选择信息分类 &gt;
        <img src="../../image/icons/Gray_two.gif" alt="填写详细内容" border="0">填写详细内容 &gt;
        <img src="../../image/icons/Green_three.gif" alt="发布成功" border="0"><span class="select">发布成功</span>
    </div>
    <div class="msgBorder">
        <div class="msgTitle1 sendSuc">
            <?php
            if ($_POST['toSuccess']=='chuzu'||$_POST['toSuccess']=='updatePublic'){
                echo '恭喜您，出租信息发布成功！';
            }
            else if ($_POST['toSuccess']=='qiuzu'){
                echo '恭喜您，求租信息发布成功！';
            }
            ?>
        </div>
        <ul>
            <li>
                <?php
                if ($_POST['toSuccess']=='chuzu'||$_POST['toSuccess']=='updatePublic'){
                    echo '您的出租信息';
                }
                else if ($_POST['toSuccess']=='qiuzu'){
                    echo '您的求租信息';
                }
                ?>
                <span class="colorBlue"><a href="<?php
                    if ($_POST['toSuccess']=='chuzu'||$_POST['toSuccess']=='updatePublic'){
                        echo '../User/bikeDetail.php?id='.$publicId;
                    }
                    else if ($_POST['toSuccess']=='qiuzu'){
                        echo 'qiuzu';
                    }
                    ?>" class="colorBlue" target="_blank"><?php
                        if ($_POST['toSuccess']=='chuzu'||$_POST['toSuccess']=='updatePublic'){
                            echo $publicTitle;
                        }
                        else if ($_POST['toSuccess']=='qiuzu'){
                            echo $seekTitle;
                        }
                        ?></a></span> 已经发布成功&nbsp;&nbsp;您可以对此信息进行&nbsp;&nbsp;<span class="colorBlue"><a id="LookLink" href="<?php
                    if ($_POST['toSuccess']=='chuzu'||$_POST['toSuccess']=='updatePublic'){
                        echo '../User/bikeDetail.php?id='.$publicId;
                    }
                    else if ($_POST['toSuccess']=='qiuzu'){
                        echo 'qiuzu';
                    }
                    ?>" target="_blank">查看</a>&nbsp;&nbsp;<a id="ViewLink" href="<?php
                    if ($_POST['toSuccess']=='chuzu'||$_POST['toSuccess']=='updatePublic'){
                        echo 'publicUpdate.php?publicId='.$publicId;
                    }
                    else if ($_POST['toSuccess']=='qiuzu'){
                        echo 'qiuzu';
                    }
                    ?>">修改</a></span></li>
            <li id="lipai" style="padding-top:10px;"><font style="font-size:14px;">您还可以</font>&nbsp;&nbsp;<span class="colorBlue"><a id="PublicLink" href="car<?php
                    if ($_POST['toSuccess']=='chuzu'||$_POST['toSuccess']=='updatePublic'){
                        echo 'Public';
                    }
                    else if ($_POST['toSuccess']=='qiuzu'){
                        echo 'Seek';
                    }
                    ?>.php"><?php
                        if ($_POST['toSuccess']=='chuzu'||$_POST['toSuccess']=='updatePublic'){
                            echo '继续发布出租信息';
                        }
                        else if ($_POST['toSuccess']=='qiuzu'){
                            echo '继续发布求租信息';
                        }
                        ?></a></span>。</li>
            <li><br><font style="font-size:14px;">您还可以到这些地方逛逛：</font><br><span class="colorBlue">&nbsp;&nbsp;&nbsp;<?php
                    if ($_POST['toSuccess']=='chuzu'||$_POST['toSuccess']=='updatePublic'){
                        echo '<a id="hyManageProduct" title="查看发布物品状态，信息越详细将有更多租家关注推荐信息" href="publicManage.php">管理出租信息</a>';
                    }
                    ?>&nbsp;&nbsp;&nbsp;<a href="../../index.php" class="colorBlue" title="首页" target="_blank">网站首页</a>&nbsp;&nbsp;&nbsp;</span>
            </li>
        </ul>
    </div>
</div>

</body>

</html>
