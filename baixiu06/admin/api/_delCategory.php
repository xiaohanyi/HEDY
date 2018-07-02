<?php
    require_once "../../config.php";
    require_once "../../function.php";

    $id=$_POST["id"];
    //echo $id;
    /*
     * 1、连接数据库
     * 2、sql语句
     * 3、执行sql语句
     * 4、将数据返回给前端
     * */
//  1、连接数据库
    $connect=connect();
//  2、sql语句
    $sql="delete from  categories where id='{$id}'";
//  3、 执行sql语句
    $delResult=mysqli_query($connect,$sql);
//  4、将数据返回给前端
    $response=["code"=>0,"msg"=>"操作失败"];
    if($delResult){
        $response["code"]=1;
        $response["msg"]="操作成功";
    };

    header("Content-Type:application/json;charset=utf-8");
    echo  json_encode($response);

?>