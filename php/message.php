<?php
header("Content-type: text/html; charset=utf-8"); 
$conn = mysqli_connect('localhost', 'root', '123');
if(! $conn )
{
  die('连接错误');
}

// echo '连接成功<br />';


mysqli_query($conn , "set names utf8");

//存数据
$name = $_REQUEST["name"];
$age = $_REQUEST["age"];
$message = $_REQUEST["message"];

// if($name =='' && $age =='' && $message ==''){
//      //echo "没";
//      exit();
// }
//echo "有";
$sqls = "INSERT INTO runoob_tbl ".
        "(name,age, message) ".
        "VALUES ".
        "('$name','$age','$message')";

mysqli_select_db( $conn, 'RUNOOB');

$retval = mysqli_query( $conn, $sqls );
if(! $retval )
{
    die('无法读取数据: ' . mysqli_error($conn));
}
 
//输出json数据
$sql = "SELECT * FROM runoob_tbl";  
//$sql = "SELECT * FROM `runoob_tbl` WHERE `name` != ''";
$result = mysqli_query($conn,$sql);  

$jarr = array();
while ($rows=mysqli_fetch_array($result,MYSQL_ASSOC))
{
    $list = count($rows);
    for($i=0;$i<$list;$i++){
    	unset($rows[$i]);
    }
    array_push($jarr,$rows);
}
$str=json_encode($jarr);
print_r($str);


// 把post进来的转成json数组
    //echo $_REQUEST["name"];
   // echo $_REQUEST["age"];
   // echo $_REQUEST["message"];
   // $arrayName = array(['name' =>$_REQUEST["name"],'age' =>$_REQUEST["age"], 'message' =>$_REQUEST["message"]]);
   // $arrayName = json_encode($arrayName);
   // print_r($arrayName);
?>