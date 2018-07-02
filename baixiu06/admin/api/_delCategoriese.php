<?php
require_once "../../config.php";
require_once "../../function.php";

    $ids=$_POST["ids"];
    print_r($ids);
    /*
     * 1、连接数据库
     * 2、sql语句
     * 3、执行sql语句
     * 4、返回数据给前端
     * */
//    1、连接数据库
    $connect=connect();
//    2、sql语句
    $sql="delete from  categories where id in ('".implode("','",$ids)."')";
    echo $sql;
//    3、执行sql语句
    $result=mysqli_query($connect,$sql);
//    4、返回数据给前端
    $response=["code"=>0,"msg"=>"操作失败"];
    if($result){
        $response["code"]=1;
        $response["msg"]="操作成功";
    };

    header("Content-Type:application/json;charset=utf-8");
    echo json_encode($response);
?>