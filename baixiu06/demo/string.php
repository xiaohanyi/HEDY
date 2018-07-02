<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<ul id="aa">

</ul>
<script>
    var  arr=[
            {"name":"张1", "age":24,"gender":"男" },
            { "name":"张2", "age":25,"gender":"女"},
            { "name":"张3", "age":26,"gender":"男"}
        ];
    var  str='';
    for(var i=0;i<arr.length;i++){
        str+="<li>\n" +
            "                    <a href=\"#\">${arr[i].name}</a>\n" +
            "              </li>";
    };
    console.log(str);
    document.getElementById('aa').innerHTML = str;
</script>
</body>
</html>