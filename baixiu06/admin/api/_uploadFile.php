<?php
//1、获取上传的文件
    $file=$_FILES["file"];
    //print_r($_FILES["file"]);
        /*Array
            (
                [name] => img-01-a.gif
                [type] => image/gif
                [tmp_name] => C:\Users\silence\AppData\Local\Temp\php583E.tmp
                [error] => 0
                [size] => 3651
            )*/
//2、得到文件的后缀名
    //$ext=strrchr(文件名,从哪开始截取);
    $ext=strrchr($file["name"],'.');
//3、生成一个不重名的文件名： 时间戳+随机数+后缀名
    $fileName=time().rand(1000,9999).$ext;
//4、将临时文件存储为永久文件
    //move_uploaded_file(临时文件,永久文件)
    //move_uploaded_file($file["tmp_name"],"../../static/uploads".$fileName);
    $bool=move_uploaded_file($file["tmp_name"],"../../static/uploads".$fileName);
    //echo $bool;
//5、将数据返回给前端
    $response=["code"=>0,"msg"=>"操作失败"];
    if($bool){
        $response["code"]=1;
        $response["msg"]="操作成功";
        $response["src"]="/static/uploads".$fileName;
    };

    header("content-type:application/json;charset=utf-8");
    echo json_encode($response);
?>