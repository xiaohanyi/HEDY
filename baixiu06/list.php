<?php
    require_once "./config.php";
    require_once "./function.php";
    /*根据id对文章进行查询
        1、获取id值
        2、根据id值查询数据库
        3、动态生成结构
    */
/*1、获取id*/
    $categoryId=$_GET['categoryId'];
/*2.根据id查询*/
    /*2.1连接数据库*/
    $conn=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
    /*2.2 sql语句*/
    $sql="SELECT p.id,p.title,p.feature,p.created,p.content,p.views,p.likes,c.`name`,u.`nickname`,
        (SELECT COUNT(id) FROM comments WHERE comments.post_id=p.`id`) AS  commentCount
        FROM posts p
        LEFT JOIN  categories c ON  c.`id`=p.`category_id`
        LEFT JOIN  users u ON  u.`id`=p.`user_id`
        WHERE p.`category_id`={$categoryId}
        LIMIT 10";
    /*2.3执行查询语句*/
    header("Content-Type:text/html;charset=utf-8");
    $postArr=query($conn,$sql);
    //print_r($postArr);
   /* header("Content-Type:text/html;charset=utf-8");
    $postArr=query($conn,$sql);
    print_r($postArr);*/

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>阿里百秀-发现生活，发现美!</title>
  <link rel="stylesheet" href="static/assets/css/style.css">
  <link rel="stylesheet" href="static/assets/vendors/font-awesome/css/font-awesome.css">
</head>
<body>
  <div class="wrapper">
    <div class="topnav">
      <ul>
        <li><a href="javascript:;"><i class="fa fa-glass"></i>奇趣事</a></li>
        <li><a href="javascript:;"><i class="fa fa-phone"></i>潮科技</a></li>
        <li><a href="javascript:;"><i class="fa fa-fire"></i>会生活</a></li>
        <li><a href="javascript:;"><i class="fa fa-gift"></i>美奇迹</a></li>
      </ul>
    </div>
      <!-- <div class="header">
     <h1 class="logo"><a href="index.html"><img src="assets/img/logo.png" alt=""></a></h1>
     <ul class="nav">
       <li><a href="javascript:;"><i class="fa fa-glass"></i>奇趣事</a></li>
       <li><a href="javascript:;"><i class="fa fa-phone"></i>潮科技</a></li>
       <li><a href="javascript:;"><i class="fa fa-fire"></i>会生活</a></li>
       <li><a href="javascript:;"><i class="fa fa-gift"></i>美奇迹</a></li>
     </ul>
     <div class="search">
       <form>
         <input type="text" class="keys" placeholder="输入关键字">
         <input type="submit" class="btn" value="搜索">
       </form>
     </div>
     <div class="slink">
       <a href="javascript:;">链接01</a> | <a href="javascript:;">链接02</a>
     </div>
   </div>-->
      <!--头部-->
      <?php include_once "public/_header.php";?>
      <!-- <div class="aside">
         <div class="widgets">
           <h4>搜索</h4>
           <div class="body search">
             <form>
               <input type="text" class="keys" placeholder="输入关键字">
               <input type="submit" class="btn" value="搜索">
             </form>
           </div>
         </div>
         <div class="widgets">
           <h4>随机推荐</h4>
           <ul class="body random">
             <li>
               <a href="javascript:;">
                 <p class="title">废灯泡的14种玩法 妹子见了都会心动</p>
                 <p class="reading">阅读(819)</p>
                 <div class="pic">
                   <img src="static/static/uploads/widget_1.jpg" alt="">
                 </div>
               </a>
             </li>
             <li>
               <a href="javascript:;">
                 <p class="title">可爱卡通造型 iPhone 6防水手机套</p>
                 <p class="reading">阅读(819)</p>
                 <div class="pic">
                   <img src="static/uploads/widget_2.jpg" alt="">
                 </div>
               </a>
             </li>
             <li>
               <a href="javascript:;">
                 <p class="title">变废为宝！将手机旧电池变为充电宝的Better</p>
                 <p class="reading">阅读(819)</p>
                 <div class="pic">
                   <img src="static/uploads/widget_3.jpg" alt="">
                 </div>
               </a>
             </li>
             <li>
               <a href="javascript:;">
                 <p class="title">老外偷拍桂林芦笛岩洞 美如“地下彩虹”</p>
                 <p class="reading">阅读(819)</p>
                 <div class="pic">
                   <img src="static/uploads/widget_4.jpg" alt="">
                 </div>
               </a>
             </li>
             <li>
               <a href="javascript:;">
                 <p class="title">doge神烦狗打底南瓜裤 就是如此魔性</p>
                 <p class="reading">阅读(819)</p>
                 <div class="pic">
                   <img src="static/uploads/widget_5.jpg" alt="">
                 </div>
               </a>
             </li>
           </ul>
         </div>
         <div class="widgets">
           <h4>最新评论</h4>
           <ul class="body discuz">
             <li>
               <a href="javascript:;">
                 <div class="avatar">
                   <img src="static/uploads/avatar_1.jpg" alt="">
                 </div>
                 <div class="txt">
                   <p>
                     <span>鲜活</span>9个月前(08-14)说:
                   </p>
                   <p>挺会玩的</p>
                 </div>
               </a>
             </li>
             <li>
               <a href="javascript:;">
                 <div class="avatar">
                   <img src="static/uploads/avatar_1.jpg" alt="">
                 </div>
                 <div class="txt">
                   <p>
                     <span>鲜活</span>9个月前(08-14)说:
                   </p>
                   <p>挺会玩的</p>
                 </div>
               </a>
             </li>
             <li>
               <a href="javascript:;">
                 <div class="avatar">
                   <img src="static/uploads/avatar_2.jpg" alt="">
                 </div>
                 <div class="txt">
                   <p>
                     <span>鲜活</span>9个月前(08-14)说:
                   </p>
                   <p>挺会玩的</p>
                 </div>
               </a>
             </li>
             <li>
               <a href="javascript:;">
                 <div class="avatar">
                   <img src="static/uploads/avatar_1.jpg" alt="">
                 </div>
                 <div class="txt">
                   <p>
                     <span>鲜活</span>9个月前(08-14)说:
                   </p>
                   <p>挺会玩的</p>
                 </div>
               </a>
             </li>
             <li>
               <a href="javascript:;">
                 <div class="avatar">
                   <img src="static/uploads/avatar_2.jpg" alt="">
                 </div>
                 <div class="txt">
                   <p>
                     <span>鲜活</span>9个月前(08-14)说:
                   </p>
                   <p>挺会玩的</p>
                 </div>
               </a>
             </li>
             <li>
               <a href="javascript:;">
                 <div class="avatar">
                   <img src="static/uploads/avatar_1.jpg" alt="">
                 </div>
                 <div class="txt">
                   <p>
                     <span>鲜活</span>9个月前(08-14)说:
                   </p>
                   <p>挺会玩的</p>
                 </div>
               </a>
             </li>
           </ul>
         </div>
       </div>-->
      <!--左边-->
      <?php include_once "public/_aside.php";?>
    <div class="content">
      <div class="panel new">
        <h3><?php echo $postArr[0]['name'] ?></h3>
       <!-- <h3>会生活</h3>
        <div class="entry">
          <div class="head">
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div>
        <div class="entry">
          <div class="head">
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div>
        <div class="entry">
          <div class="head">
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div>-->
          <?php foreach($postArr as $key=>$value):?>
              <div class="entry">
                  <div class="head">
                      <a href="detail.php?postId=<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a>
                  </div>
                  <div class="main">
                      <p class="info"><?php echo $value['nickname'] ?> 发表于 <?php echo $value['created'] ?></p>
                      <p class="brief"><?php echo $value['content'] ?></p>
                      <p class="extra">
                          <span class="reading">阅读(<?php echo $value['views'] ?>)</span>
                          <span class="comment">评论(<?php echo $value['commentCount'] ?>)</span>
                          <a href="javascript:;" class="like">
                              <i class="fa fa-thumbs-up"></i>
                              <span>赞(<?php echo $value['likes'] ?>)</span>
                          </a>
                          <a href="javascript:;" class="tags">
                              分类：<span><?php echo $value['name'] ?></span>
                          </a>
                      </p>
                      <a href="javascript:;" class="thumb">
                          <img src="<?php echo $value['feature'] ?>" alt="">
                      </a>
                  </div>
              </div>
          <?php endforeach; ?>

          <!--点击加载更多按钮-->
          <div class="loadmore">
              <span class="btn">加载更多</span>
          </div>

      </div>
    </div>
    <div class="footer">
      <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
    </div>
  </div>

  <script src="static/assets/vendors/jquery/jquery.min.js"></script>
  <script>
      $(function(){
          var currentPage=1;
            $(".loadmore .btn").on('click',function(){
                //console.log(22);
                var categoryId=location.search.split("=")[1]; /*分割之后返回的是一个数组[categoryId,4]*/
                currentPage++;
                $.ajax({
                    type:"post",
                    url:"api/_getMorePost.php",
                    data:{
                        categoryId:categoryId,
                        currentPage:currentPage,
                        pageSize:10
                    },
                    beforeSend:function(){
                        $('.loadmore .btn').html("正在加载。。。。");
                    },
                    success:function(res){
                        console.log(res);
                        if(res.code==1){
                            var  data=res.data;
                            $.each(data,function(index,val){
                                var  str='<div class="entry">' +
                                        '     <div class="head">' +
                                        '         <a href="detail.php?postId='+val.id+'">'+val.title+'</a>' +
                                        '     </div>' +
                                        '     <div class="main">' +
                                        '         <p class="info">'+val['nickname']+' 发表于'+val['created']+' </p>' +
                                        '         <p class="brief">'+val['nickname']+'</p>' +
                                        '         <p class="extra">' +
                                        '             <span class="reading">阅读('+val['nickname']+')</span>' +
                                        '             <span class="comment">评论('+val['commentCount']+')</span>' +
                                        '             <a href="javascript:;" class="like">' +
                                        '                 <i class="fa fa-thumbs-up"></i>' +
                                        '                 <span>赞('+val['likes']+')</span>' +
                                        '             </a>' +
                                        '             <a href="javascript:;" class="tags">' +
                                        '                 分类：<span>'+val['title']+'</span>' +
                                        '             </a>' +
                                        '         </p>' +
                                        '         <a href="javascript:;" class="thumb">' +
                                        '             <img src="'+val['feature']+'" alt="">' +
                                        '         </a>' +
                                        '     </div>' +
                                        ' </div>';

                                var entry=$(str);
                                setTimeout(function(){
                                    entry.insertBefore('.loadmore');

                                    var maxPage=Math.ceil(res.pageCount/10);
                                    $('.loadmore .btn').html("加载更多");
                                    //console.log(maxPage);
                                    if(currentPage==maxPage){
                                        $('.loadmore .btn').hide();
                                    }
                                },2000)


                            })
                        }
                    }
                })
            })
      })
  </script>
</body>
</html>