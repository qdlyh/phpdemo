<?php
header("Content-type: text/html; charset=utf-8"); 
$conn = mysqli_connect('localhost', 'root', '123');
if(! $conn )
{
    die('连接失败: ' . mysqli_error($conn));
}
// 设置编码，防止中文乱码
mysqli_query($conn , "set names utf8");

$ids = $_REQUEST["ids"];
// echo $ids;
// $sql = 'DELETE FROM runoob_tbl
//         WHERE id=17';
$sql = "DELETE FROM `runoob_tbl` WHERE `id` = $ids";
mysqli_select_db( $conn, 'RUNOOB' );
$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
    die('无法删除数据: ' . mysqli_error($conn));
}
echo $ids;
//echo '数据删除成功！';
mysqli_close($conn);
?>