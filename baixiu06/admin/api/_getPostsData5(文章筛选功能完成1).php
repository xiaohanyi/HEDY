<?php
require_once "../../config.php";
require_once "../../function.php";
    /*
     * 1、连接数据库
     * 2、sql
     * 3、执行sql
     * 4、将数据返回给前端
     * */
    /*5、从前端获取两个数据：
        ①当前是第几页
        ②一共需要获取多少条
    */
    $currentPage = $_POST["currentPage"];
    $pageSize = $_POST["pageSize"];
//    获取文章筛选条件
    $status=$_POST["status"];

    /*5.1 计算sql语句是从哪里开始获取数据
    从哪里开始获取=(要获取的页码数-1)*每页获取的数据条数 */
    $offset=($currentPage-1)*$pageSize;
//    1、连接数据库
    $connect=connect();
//    2、sql
//获取文章数据
/*$sql="SELECT  p.id,p.title,p.created,p.status,u.nickname,c.name FROM posts p
LEFT JOIN users u ON u.`id`=p.`user_id`
LEFT JOIN categories c ON c.`id`=p.`category_id`
limit {$offset},{$pageSize}";*/
//根据status筛选条件查找sql语句
    $sql="SELECT  p.id,p.title,p.created,p.status,u.nickname,c.name FROM posts p
LEFT JOIN users u ON u.`id`=p.`user_id`
LEFT JOIN categories c ON c.`id`=p.`category_id` 
WHERE p.status='{$status}' 
limit {$offset},{$pageSize}";

//    3、执行sql
    $result=query($connect,$sql);

//    6获取中的页数
//
//    6.1 sql
    $countSql="select count(*) as count from posts";
//    6.2 执行sql语句
    $countArr=query($connect,$countSql);
    $postCount=$countArr[0]["count"];
//    6.3 计算总页数=ceil(总条数/每页显示条数);
    $pageCount=ceil($postCount/$pageSize);

//    4、返回数据给前端
    $response=["code"=>0,"msg"=>"操作失败"];
    if($result){
        $response["code"]=1;
        $response["msg"]="操作成功";
        $response["data"]=$result;
        $response["pageCount"]=$pageCount;
    };

    header("Content-Type:application/json;charset=utf-8");
    echo json_encode($response);

?>