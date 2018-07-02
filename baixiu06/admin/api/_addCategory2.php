<?php
    require_once "../../config.php";
    require_once "../../function.php";

//  1、获取点击添加按钮传过来的值
    $name=$_POST["name"];
    //echo $name;
//  /2、连接数据库
    $connect=connect();
//  判断用户新增的分类是否跟数据库中存在的分类重名，如果重名不允许添加
//  3、根据用户新增的分类名称查找的条数大于0，就是已经存在
    $countSql="select count(*) as  count from categories where name = '{$name}'";
    $countResult=query($connect, $countSql);
   // print_r($countResult);
    $count=$countResult[0]['count'];
//  4、如果存在就提示用户是不能添加的
    $response = ["code"=>0,"msg"=>"操作失败"];

    if($count>0){
        $response["msg"] = "分类名称已经存在，不能重复添加";
    }else{
//      如果不存在就继续添加
        /*4.1准备sql语句*/

        /*4.2执行新增sql语句*/

    };
//  5、返回数据给前台
    header("Content-Type:application/json;charset=utf-8");
    echo  json_encode($response);
?>