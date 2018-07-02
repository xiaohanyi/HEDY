<?php
require_once "../../config.php";
require_once "../../function.php";
    /*
     * 1、连接数据库
     * 2、sql
     * 3、执行sql
     * 4、将数据返回给前端
     * */
    /**/


//    1、连接数据库
    $connect=connect();
//    2、sql
    $sql="SELECT  p.id,p.title,p.created,p.status,u.nickname,c.name FROM posts p
LEFT JOIN users u ON u.`id`=p.`user_id`
LEFT JOIN categories c ON c.`id`=p.`category_id` ";
//    3、执行sql
    $result=query($connect,$sql);
//    4、返回数据给前端
    $response=["code"=>0,"msg"=>"操作失败"];
    if($result){
        $response["code"]=1;
        $response["msg"]="操作成功";
        $response["data"]=$result;
    };

    header("Content-Type:application/json;charset=utf-8");
    echo json_encode($response);

?>