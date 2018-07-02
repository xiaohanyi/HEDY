<?php
    require_once "./config.php";
    require_once "./function.php";
/*
 * 根据文章id获取数据，动态生成结构即可
 * 1、获取id
 * 2、根据id查找数据库对应的文章
 * 3、动态生成结构
 * */
//1、获取文章id
    $postId=$_GET["postId"];
//2、根据id查找数据库
    /*2.1 连接数据库*/
    $connect=connect();
    /*2.2  sql语句*/
    $sql="
        SELECT p.title,p.feature,p.created,p.content,p.views,p.likes,u.nickname,c.name FROM posts p
        LEFT JOIN  categories c ON  c.`id`=p.`category_id`
        LEFT JOIN  users u ON u.`id`=p.`user_id`
        WHERE p.`id`={$postId}";
    /*2.3   执行sql查询*/
    $postArr=query($connect,$sql);
    //print_r($postArr);
//3、把文章数据从二维数组中取出来，方便后面生成结构的时候使用
    $postData=$postArr[0];
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
                   <img src="static/static/static/uploads/widget_1.jpg" alt="">
                 </div>
               </a>
             </li>
             <li>
               <a href="javascript:;">
                 <p class="title">可爱卡通造型 iPhone 6防水手机套</p>
                 <p class="reading">阅读(819)</p>
                 <div class="pic">
                   <img src="static/static/uploads/widget_2.jpg" alt="">
                 </div>
               </a>
             </li>
             <li>
               <a href="javascript:;">
                 <p class="title">变废为宝！将手机旧电池变为充电宝的Better</p>
                 <p class="reading">阅读(819)</p>
                 <div class="pic">
                   <img src="static/static/uploads/widget_3.jpg" alt="">
                 </div>
               </a>
             </li>
             <li>
               <a href="javascript:;">
                 <p class="title">老外偷拍桂林芦笛岩洞 美如“地下彩虹”</p>
                 <p class="reading">阅读(819)</p>
                 <div class="pic">
                   <img src="static/static/uploads/widget_4.jpg" alt="">
                 </div>
               </a>
             </li>
             <li>
               <a href="javascript:;">
                 <p class="title">doge神烦狗打底南瓜裤 就是如此魔性</p>
                 <p class="reading">阅读(819)</p>
                 <div class="pic">
                   <img src="static/static/uploads/widget_5.jpg" alt="">
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
                   <img src="static/static/uploads/avatar_1.jpg" alt="">
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
                   <img src="static/static/uploads/avatar_1.jpg" alt="">
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
                   <img src="static/static/uploads/avatar_2.jpg" alt="">
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
                   <img src="static/static/uploads/avatar_1.jpg" alt="">
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
                   <img src="static/static/uploads/avatar_2.jpg" alt="">
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
                   <img src="static/static/uploads/avatar_1.jpg" alt="">
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
      <div class="article">
        <div class="breadcrumb">
          <dl>
            <dt>当前位置：</dt>
            <dd><a href="javascript:;"><?php echo $postData["name"] ?></a></dd>
            <dd><?php echo $postData["title"] ?></dd>
          </dl>
        </div>
        <h2 class="title">
          <a href="javascript:;"><?php echo $postData["title"] ?></a>
        </h2>
        <div class="meta">
          <span><?php echo $postData["nickname"] ?> 发布于 <?php echo $postData["created"] ?></span>
          <span>分类: <a href="javascript:;"><?php echo $postData["name"] ?></a></span>
          <span>阅读: (<?php echo $postData["views"] ?>)</span>
          <span>点赞: (<?php echo $postData["likes"] ?>)</span>
        </div>
        <div class="content-detail"><?php echo $postData["content"] ?></div>
      </div>
      <div class="panel hots">
        <h3>热门推荐</h3>
        <ul>
          <li>
            <a href="javascript:;">
                <img src="static/uploads/hots_2.jpg" alt="">
              <span>星球大战:原力觉醒视频演示 电影票68</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <img src="static/uploads/hots_3.jpg" alt="">
              <span>你敢骑吗？全球第一辆全功能3D打印摩托车亮相</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <img src="static/uploads/hots_4.jpg" alt="">
              <span>又现酒窝夹笔盖新技能 城里人是不让人活了！</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <img src="static/uploads/hots_5.jpg" alt="">
              <span>实在太邪恶！照亮妹纸绝对领域与私处</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="footer">
      <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
    </div>
  </div>
</body>
</html>
