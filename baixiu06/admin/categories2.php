<?php
//    一定要记得使用session就必须先开启
    /*session_start();

    if(!isset($_SESSION["isLogin"]) || $_SESSION["isLogin"]!=1){
        header("Location:login.php");
    }*/

    require_once "../config.php";
    require_once "../function.php";

    checkLogin();
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Categories &laquo; Admin</title>
  <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../static/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../static/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../static/assets/css/admin.css">
  <script src="../static/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <!--<nav class="navbar">
      <button class="btn btn-default navbar-btn fa fa-bars"></button>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php"><i class="fa fa-user"></i>个人中心</a></li>
        <li><a href="login.php"><i class="fa fa-sign-out"></i>退出</a></li>
      </ul>
    </nav>-->
      <?php require_once "public/_header.php" ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>分类目录</h1>
      </div>
      <!-- 有错误信息时展示 -->
       <div class="alert alert-danger" style="display: none">
        <strong>错误！</strong><span id="msg">发生XXX错误</span>
      </div>

      <div class="row">
        <div class="col-md-4">
          <form id="data">
            <h2>添加新分类目录</h2>
            <div class="form-group">
              <label for="name">名称</label>
              <input id="name" class="form-control" name="name" type="text" placeholder="分类名称">
            </div>
            <div class="form-group">
              <label for="slug">别名</label>
              <input id="slug" class="form-control" name="slug" type="text" placeholder="slug">
              <p class="help-block"><!--https://zce.me/category/<strong>slug</strong></p>-->
            </div>
              <!--添加的分类-->
              <div class="form-group">
                  <label for="slug">类名</label>
                  <input id="classname" class="form-control" name="classname" type="text" placeholder="类名">
                  <p class="help-block"><!--https://zce.me/category/<strong>slug</strong></p>-->
              </div>
            <div class="form-group">
             <!-- <button class="btn btn-primary" type="submit">添加</button>-->
                <input  type="button" id="btn-add" value="添加" class="btn btn-primary">
                <input  style="display: none;" type="button" id="btn-edit" value="编辑完成" class="btn btn-primary">
                <input  style="display: none;" type="button" id="btn-cancel" value="取消编辑" class="btn btn-primary">
            </div>
          </form>
        </div>
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
            <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" width="40"><input type="checkbox"></th>
                <th>名称</th>
                <th>Slug</th>
                <th>类名</th>
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
            <tbody>
             <!-- <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                  <td>fa</td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                  <td>fa</td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                  <td>fa</td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>-->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!--<div class="aside">
    <div class="profile">
      <img class="avatar" src="../static/uploads/avatar.jpg">
      <h3 class="name">布头儿</h3>
    </div>
    <ul class="nav">
      <li>
        <a href="index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
      </li>
      <li class="active">
        <a href="#menu-posts" data-toggle="collapse">
          <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-posts" class="collapse in">
          <li><a href="posts.php">所有文章</a></li>
          <li><a href="post-add.php">写文章</a></li>
          <li class="active"><a href="categories.php">分类目录</a></li>
        </ul>
      </li>
      <li>
        <a href="comments.php"><i class="fa fa-comments"></i>评论</a>
      </li>
      <li>
        <a href="users.php"><i class="fa fa-users"></i>用户</a>
      </li>
      <li>
        <a href="#menu-settings" class="collapsed" data-toggle="collapse">
          <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-settings" class="collapse">
          <li><a href="nav-menus.php">导航菜单</a></li>
          <li><a href="slides.php">图片轮播</a></li>
          <li><a href="settings.php">网站设置</a></li>
        </ul>
      </li>
    </ul>
  </div>-->
  <?php
  $current_page="categories";
  ?>

  <?php require_once "public/_aside.php" ?>
  <script src="../static/assets/vendors/jquery/jquery.js"></script>
  <script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>

  <script>
      $(function(){
          $.ajax({
              url:"api/_getCategoryData.php",
              type:"post",
              success:function(res){
                    if(res.code==1){
                        var str='';
                        var  data=res.data;
                        $.each(data,function(i,e){
                            str+='<tr data-categoryId="'+e.id+'">\n' +
                                '  <td class="text-center"><input type="checkbox"></td>\n' +
                                '  <td>'+e.name+'</td>\n' +
                                '  <td>'+e.slug+'</td>\n' +
                                '  <td>'+e.classname+'</td>\n' +
                                '  <td class="text-center">\n' +
                                '    <a href="javascript:;" data-categoryId="'+e.id+'" class="btn btn-info btn-xs edit">编辑</a>\n' +
                                '    <a href="javascript:;" class="btn btn-danger btn-xs del">删除</a>\n' +
                                '  </td>\n' +
                                '</tr>'
                        });
                       /* $('tbody').html(str);*/
                        $(str).appendTo($('tbody'));
                    };
              }
          });

      //    点击添加
          $('#btn-add').on('click',function(){
              var  name=$("#name").val();
              var slug=$("#slug").val();
              var classname=$("#classname").val();

              if(name==''){
                  $('#msg').text("分类的名称不能为空");
                  $('.alert').show();
                  return;
              }else{
                  $('.alert').hide();
              };
              if(slug==''){
                  $('#msg').text("分类的别名不能为空");
                  $('.alert').show();
                  return;
              }else{
                  $('.alert').hide();
              };
              if(classname==''){
                  $('#msg').text("分类的类名不能为空");
                  $('.alert').show();
                  return;
              }else{
                  $('.alert').hide();
              };

              $.ajax({
                  url:'api/_addCategory.php',
                  type:'post',
                  data:$("#data").serialize(),
                  success:function(res){
                        console.log(res,888888);
                        if(res.code==1){
                            location.reload();
                            /*var str='<tr>\n' +
                                '  <td class="text-center"><input type="checkbox"></td>\n' +
                                '  <td>'+name+'</td>\n' +
                                '  <td>'+slug+'</td>\n' +
                                '  <td>'+classname+'</td>\n' +
                                '  <td class="text-center">\n' +
                                '    <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>\n' +
                                '    <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>\n' +
                                '  </td>\n' +
                                '</tr>';
                            $(str).appendTo('tbody');*/
                        }
                  }
              })
          });

      //    点击编辑
          var currentRow;

          $('tbody').on('click','.edit',function(){
              /*保存点击编辑按钮那一行*/
              //这行在点击编辑按钮完成时使用
              currentRow=$(this).parents('tr');

              /*点击按钮获取自定义data属性,并将这个值传给编辑完成按钮的自定义属性上*/
              var categoryId=$(this).attr("data-categoryId");
              $('#btn-edit').attr("data-categoryId",categoryId);

              //1、点击编辑按钮 添加按钮隐藏,完成编辑按钮和取消编辑按钮显示
              $('#btn-add').hide();
              $('#btn-edit').show();
              $('#btn-cancel').show();
              //获取点击按钮对应的数据
              var name=$(this).parents("tr").children().eq(1).text();
              var slug=$(this).parents("tr").children().eq(2).text();
              var classname=$(this).parents("tr").children().eq(3).text();
              //console.log(name);
              //2、把获取到的内容填充到对应的输入框
              $('#name').val(name);
              $('#slug').val(slug);
              $('#classname').val(classname);
          });

      //    点击编辑完成按钮
          $('#btn-edit').on('click',function(){
              //1、获取编辑完成按钮的id
              var categoryId=$(this).attr("data-categoryId");
              //console.log(categoryId);
              //2、表单数据校验
              var name=$('#name').val();
              var slug=$('#slug').val();
              var classname=$('#classname').val();
              if(name==''){
                  $('#msg').text("分类的名称不能为空");
                  $('.alert').show();
                  return;
              }else{
                  $('.alert').hide();
              };
              if(slug==''){
                  $('#msg').text("分类的别名不能为空");
                  $('.alert').show();
                  return;
              }else{
                  $('.alert').hide();
              };
              if(classname==''){
                  $('#msg').text("分类的类名不能为空");
                  $('.alert').show();
                  return;
              }else{
                  $('.alert').hide();
              };
              //3、发送ajax
              $.ajax({
                  url:"api/_updateCategory.php",
                  type:"post",
                  data:{
                      name:name,
                      slug:slug,
                      classname:classname,
                      id:categoryId
                  },
                  success:function(res){
                      console.log(res,9999);
                      if(res.code==1){
                          /*1、隐藏完成编辑按钮+取消编辑按钮+显示添加按钮*/
                          $('#btn-edit').hide();
                          $('#btn-cancel').hide();
                          $('#btn-add').show();

                          /*2、清空数据前先把之前修改后的数据保存*/
                          var name=$('#name').val();
                          var slug=$('#slug').val();
                          var classname=$('#classname').val();

                          //3、清空输入框*/
                          $('#name').val('');
                          $('#slug').val('');
                          $('#classname').val('');

                      //   4、把对应的数据显示在表格中
                            /*获取点击编辑按钮的那一行*/
                          currentRow.children().eq(1).text(name);
                          currentRow.children().eq(2).text(slug);
                          currentRow.children().eq(3).text(classname);
                      }
                  }
              })
          })

      //    取消编辑
          $('#btn-cancel').on('click',function(){
              //1、点击编辑按钮 添加按钮隐藏,完成编辑按钮和取消编辑按钮显示
              $('#btn-add').hide();
              $('#btn-edit').show();
              $('#btn-cancel').show();

              //2、清空输入框*/
              $('#name').val('');
              $('#slug').val('');
              $('#classname').val('');
          });

      //    点击删除按钮
          $('tbody').on('click','.del',function(){
              //1、先把当前行记录下来，当删除成功时我们就把这一行删除掉
                var row=$(this).parents('tr');
              //2、先获取当前数据的id
                var  categoryId=row.attr("data-categoryId");
                $.ajax({
                    url:"api/_delCategory.php",
                    type:"post",
                    data:{
                        id:categoryId
                    },
                    success:function(res){
                        //console.log(res);
                        if(res.code==1){
                            row.remove();
                        };
                    }
                });
          });

      //    全选功能的实现
          $('thead input').on('click',function(){
              /*获取自己的选中状态*/
              var status=$(this).prop('checked');
              /*控制别的多选框*/
              $('tbody input').prop('checked',status);
          });

      //    使用委托的方式为别的多选框注册点击事件
          $('tbody').on('click','input',function() {
              //控制全选的多选框是否选中，只有当所选的多选框都选中，全选才选中
              //获取全选多选框
              var all=$('thead input');
              var cks=$('tbody input');

              //如果cks中的多选框都选中了,全选也选中
              /*if(cks.size()==$('tbody input:checked').size()){
                    all.prop("checked",true);
              }else{
                  all.prop("checked",false);
              };*/

              all.prop("checked",cks.size()==$('tbody input:checked').size());
          });



      });
  </script>
</body>
</html>
