<?php
/*验证是否已经登录的函数封装*/
    function  checkLogin(){
        session_start();
        if(!isset($_SESSION["isLogin"]) || $_SESSION["isLogin"]!=1){
            header("Location:login.php");
        }
    }

/*1、连接数据库的封装*/
    function connect(){
        $connect=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
        return $connect;
    }
/*2、执行查询的封装*/
    function query($connect,$sql){
        $result=mysqli_query($connect,$sql);
       /* return $result;*/
       return  fetch($result);
    }
/*3、转换结果集为二维数组的封装*/
    function fetch($result){
        $arr=[];
        while($row=mysqli_fetch_assoc($result)){
            $arr[]=$row;
        }
        return  $arr;
    }
/*3、封装插入数据操作*/
    function  insert($connect,$tables,$arr){
        $keys=array_keys($arr);
        $values=array_values($arr);
        $sqlAdd="insert into $tables (".implode(',',$keys).") values ('".implode("','",$values)."')";
        $addResult=mysqli_query($connect,$sqlAdd);
        return  $addResult;
    }
?>