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
//    2、连接数据库
    $connect=connect();
//    3、执行sql
    $sql="update categories set ";

    /*遍历$_POST数组,把每个键和值拼接到sql中*/
    /*遍历$_POST数组之前，需先把id从数组中给去掉*/
    unset($_POST["id"]);
    foreach($_POST as $key=>$value){
        $sql.="{$key}='{$value}',"; /*  类似set name='张三',slug='fa'  */
    };
    /*循环导致sql语句末尾多一个逗号，通过substr()把,去掉*/
    /*去掉最后一个逗号，即可 substr语法 substr(裁切的对象，开始位置，从字符串末端返回的长度)*/
    $sql=substr($sql,0,-1);
    //echo $sql;
    $sql.=" where id='{$id}'";
    //echo $sql;
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