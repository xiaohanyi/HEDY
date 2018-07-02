<?php
    require_once "../../config.php";
    require_once "../../function.php";

//  获取用户图像和昵称，返回给前端动态生成
//  因为获取用户图像和昵称,需要用户的id,而我们一开始在登录的时候，
//  就把用户的id存放在session中，只需要从session中获取即可
    session_start();
    $user_id=$_SESSION['user_id'];
    //echo $user_id;

//    根据用户的id,到数据库中查询用户的图像和昵称
//  1、连接数据库
    $connect =connect();
//  2、准备sql语句
    $sql="select  *  from  users  where  id= {$user_id}";
//  3、执行查询
    $queryResult=query($connect,$sql);
    //print_r($queryResult);
//  4、判断是否查到数据，返回给前端
    $response=["code"=>0,"msg"=>"操作失败"];
    if($queryResult){
        $response["code"]=1;
        $response["msg"]="操作成功";
        $response["avatar"]=$queryResult[0]['avatar'];
        $response["nickname"]=$queryResult[0]['nickname'];
    };
//  5、以json格式返回数据
    header("Content-Type:application/json;charset=utf-8");
    echo json_encode($response);
?>