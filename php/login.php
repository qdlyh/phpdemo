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
<form method="post" class="form" style="height: 450px;">
<p class="form-test">用户登录</p>
<label><input type="text" name="name" placeholder="用户名"></label>
<br/><br/>
<label><input type="password" name="pw" placeholder="用户密码"></label>
<br/><br/>
  <div class="btn-blue">
      <button type="submit" name="submit" style="background: #5BB85D;">登录</button>
   </div>
   <div class="btn-blue">
      <a href="register.php">注册</a>
   </div>
</form>

<?php 
$link = mysqli_connect('localhost', 'root', '123', 'test');
if (!$link){
    echo"<script>alert('数据库连接失败！')</script>";
}else {
    if (isset($_POST['submit'])){
        $query = "select * from user where name = '{$_POST['name']}' and pw = '{$_POST['pw']}'";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 1&& $_POST['name'] !=='' &&$_POST['pw'] !==''){
            header("Location:message.html");
        }else {
            echo "<script>alert('登录失败！')</script>";
        }
    }
}
?>

</body>
</html>