<?php
    require_once "../../config.php";
    require_once "../../function.php";
    /*
     * 1、获取表单数据和id
     * 2、连接数据库
     * 3、执行sql
     * 4、将数据返回给前端
     * */

//    1、获取表单数据和id
    $id=$_POST['id'];
    echo $_POST;
//    2、连接数据库
    $connect=connect();
//    3、执行sql
    $sql="";

    $result=mysqli_query($connect,$sql);
    $response=["code"=>0,"msg"=>"操作失败"];
    if($result){
        $response["code"]=1;
        $response["msg"]="操作成功";
    };
//    4、将数据返回给前端
    header("Content-Type:application/json;charset=utf-8");
    echo json_encode($response);
?>