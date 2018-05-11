<html>
<head>
    <title>处理中</title>
</head>
<body>
<link rel="stylesheet" href="dist/css/bootstrap.min.css">
<center>
    <?php
    //执行留言信息添加操作
    //1.获取要添加的留言信息，并补上其他辅助信息（ip地址、添加时间）
    $name = $_POST["name"];
    $tel = $_POST["tel"];
    $dizhi=$_POST["dizhi"];
    $email = $_POST["email"];
    $text = $_POST["text"];
    $ip = $_SERVER["REMOTE_ADDR"];
    $addtime = time();
    //2.拼装留言信息
    if (strlen($tel)=="11"&&strlen($dizhi)>0&&strlen($name)>0){
        $ly = "{$name}##{$tel}##$dizhi##{$email}##{$text}##{$ip}##{$addtime}@@@";
        //echo $ly;
        //3. 将留言添加到liuyan.txt文件中
        $info = file_get_contents("liuyan.txt");
        file_put_contents("liuyan.txt", $info . $ly);
        echo "<script>alert('留言成功！')</script>";
    }else if (!(strlen($name))){
        echo "<script>alert('请填写姓名！')</script>";
    }else if (!(strlen($tel)=="11"))
    {
        echo "<script>alert('您的联系方式填写有误！')</script>";
    }else if(!(strlen($dizhi))){
        echo "<script>alert('请填写开店城市！')</script>";
    }
        echo "<script>window.history.go(-1);</script>";
//
    ?>
</center>

</body>
</html>