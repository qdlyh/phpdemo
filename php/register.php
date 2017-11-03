<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<link rel="stylesheet" href="css/login.css">
<body>
<div class="mask-img"></div>
<div class="mask"></div>
<form method="post" class="form">
<p class="form-test">创建账号</p>
<label><input class="name" type="text" name="name" placeholder="用户名"></label>
<br/>
<label><input class="password" type="password" name="pw" placeholder="注册密码"></label>
<br/>
<label><input class="passwords"
 type="password" name="repw" placeholder="再次输入密码"></label><br/>
    <div class="btn-blue">
      <button type="submit" name="submit" class="submit">注册</button>
   </div>
</form>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $('.submit').click(function(){
        if ($('.password').val() == '' || $('.passwords').val() == '' || $('.name').val() == '') {
          alert('基本信息不能为空')
          return false;
        }
        if($('.password').val() !== $('.passwords').val()){
                alert('两次输入密码不一致！')
                return false;
        }
  })
</script>
<?php 
$link = mysqli_connect('localhost', 'root', '123', 'test');
if (!$link) {
    die('数据库连接失败!: ' . mysql_error());
}else {
    if (isset($_POST['submit'])){
        if ($_POST['pw'] === $_POST['repw'] && $_POST['name'] !==''){
            $query = "insert into user (name,pw) values('{$_POST['name']}','{$_POST['pw']}')";
            $result=mysqli_query($link, $query);
            header("Location:login.php");
         }else {
             echo "<script>alert('输入有误！')</script>";
         }
    }
}
?>
</body>
</html>