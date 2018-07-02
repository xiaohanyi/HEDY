
// 1 配置模块
// require.config({});
require.config({
    /*访问的是comments.php，所以文件都是以comments.php来找对应的路径*/
    paths:{
        // 模块的名字 : 模块对应的js的路径 - 注意路径是不带后缀名
        "jquery" : "/static/assets/vendors/jquery/jquery",
        "template" : "/static/assets/vendors/art-template/template-web",
        "pagination" : "/static/assets/vendors/twbs-pagination/jquery.twbsPagination",
        "bootstrap" : "/static/assets/vendors/bootstrap/js/bootstrap"
    },
    // 1.2 声明模块和模块之间的依赖关系
    shim:{
        "pagination":{
            //deps 声明该模块是依赖哪些模块的
            deps:["jquery"]// 因为依赖的模块可能有多个，以数组的方式表示
        },
        "bootstrap":{
            deps:["jquery"]
        }
    },
});
// 2 引入模块
// 使用requirejs提供的一个函数来实现
// require(模块的数组,实现功能的回调函数);
// 模块数组中的每个模块的名字是从paths声明的时候那里直接得到的
require([ "jquery","template","pagination","bootstrap"],function($,template,pagination,bootstrap){
    $(function(){
        var currentPage=1;
        var pageSize=10;

        var pageCount;
        getCommentsData();
        function getCommentsData(){
            $.ajax({
                url:"api/_getCommentsData.php",
                type:"post",
                data:{
                    currentPage:currentPage,
                    pageSize:pageSize
                },
                success:function(res){
                    console.log(res);
                    if(res.code==1){
                        pageCount=res.pageCount;
                        /*$.each(data,function(i,e){
                              var html='<tr>' +
                                  '<td class="text-center"><input type="checkbox"></td>' +
                                  '  <td>'+e.author+'</td>' +
                                  '  <td>'+e.content+'</td>' +
                                  '  <td>'+e.title+'</td>' +
                                  '  <td>'+e.created+'</td>' +
                                  '  <td>'+e.status+'</td>' +
                                  '  <td class="text-center">' +
                                  '    <a href="post-add.php" class=\"btn btn-warning btn-xs\">驳回</a>' +
                                  '    <a href="javascript:;" class=\"btn btn-danger btn-xs\">删除</a>' +
                                  '  </td>' +
                                  '</tr>';
                            $(html).appendTo('tbody');
                        });*/
                        var html = template("template",res.data);
                        $("tbody").html(html);

                        $('.pagination').twbsPagination({
                            totalPages: pageCount,
                            visiblePages: 7,
                            onPageClick: function (event, page) {
                                currentPage=page;
                                getCommentsData();
                            }
                        });
                    }
                }
            });
        };


    })
});