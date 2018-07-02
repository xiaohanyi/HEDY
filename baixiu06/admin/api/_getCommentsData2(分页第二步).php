<?php
    require_once "../../config.php";
    require_once "../../function.php";

    /*1、获取从前端传过来的数据*/
    $currentPage=$_POST["currentPage"];
    $pageSize=$_POST["pageSize"];
//    计算从哪开始获取数据
    $pageCount=($currentPage-1)*$pageSize;

    /*2、连接数据库*/
    $connect=connect();
    /*3、sql语句*/
    $sql="SELECT  c.id,c.author,c.created,c.content,c.status,p.title FROM comments c
LEFT JOIN posts p ON p.id=c.`post_id`
LIMIT $pageCount,$pageSize";
    /*4、执行sql语句*/
    $queryResult=query($connect,$sql);
    /*5、将数据集转变成二维数组，返回数据给前端*/

    $response=["code"=>0,"msg"=>"操作失败"];
    if($queryResult){
        $response["code"]=1;
        $response["msg"]="操作成功";
        $response["data"]=$queryResult;
    };

    header("Content-Type:application/json;charset=utf-8");
    echo json_encode($response);
?>