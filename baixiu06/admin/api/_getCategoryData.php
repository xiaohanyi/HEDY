<?php
    require_once "../../config.php";
    require_once "../../function.php";

//  连接数据库查询出分类相关的数据，返回给前端即可
//  1、连接数据库
    $connect=connect();
//  2、sql语句
    $sql="select  *  from  categories";
//  3、执行查询
    $queryResult=query($connect,$sql);
//  4、把结果返回给前端
    $response=["code"=>0,"msg"=>"操作失败"];
    if($queryResult){
        $response["code"]=1;
        $response["msg"]="操作成功";
        $response["data"]=$queryResult;
    };
    header("Content-Type:application/json;charset=utf-8");
    echo  json_encode($response);
?>