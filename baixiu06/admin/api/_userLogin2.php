<?php
    require_once "../../config.php";
    require_once "../../function.php";
    /* 1、得到用户的邮箱和密码
     * 2、根据邮箱和密码到数据库中去查找有没对应的数据
     * 3、最终通知前台通知是否成功
     * */
//    1、得到用户的邮箱和密码
    $email=$_POST["email"];
    $password=$_POST["password"];
    //print_r($email);
//    2、根据邮箱和密码到数据库中去查找有没对应的数据
        /*2.1 连接数据库*/
    $connect=connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
        /*2.2 sql语句*/
    $sql="select * from users where email='{$email}' and password='{$password}' and status='activated'";
        /*2.3 执行语句*/
    $queryResult=query($connect,$sql);
    //print_r($queryResult);      /* 这个需要在network下查看 */
//    3、判断查询的结果是不是数据
    $response=["code"=>0,"msg"=>"操作失败"];
    if($queryResult){
        $response["code"]=1;
        $response["msg"]="登录成功";
    };
//    4、以json格式返回数据
    header("content-type:application/json;charset=utf-8");
    echo json_encode($response);

?>