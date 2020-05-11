<?php
    include("phpConnectDb.php");
    $newsTitle = DecBin(gzcompress("新闻标题"));
    $newsContent=DecBin(gzcompress("adfsdadfadfsdfsdfs"));
    $newsAuthor = "刘东";
    echo $newsTitle;
    $query = "INSERT INTO news(author,title,content) values ('刘东',$newsTitle,$newsContent)";
    //插入新闻
    if(!mysqli_query($link,$query)){
        echo "插入新闻失败！";
        echo mysqli_error($link);
    }
    //查询新闻
    $query = "select author,title,content from news where author = '$newsAuthor';";
    $result = mysqli_query($link,$query);
    $arr =  mysqli_fetch_row($result);  //抓取一行所有元素组成数组。
    var_dump($arr);
    echo $arr[1];
    echo gzuncompress($newsTitle);
?>
