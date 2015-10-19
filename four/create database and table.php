<?php
$conn = mysql_connect("localhost","root","");
if(!$conn)
{
	die('不能连接数据库：'.mysql_error());
}
else
{
	echo '连接本地数据库成功！';
}
if(mysql_query("CREATE DATABASE my_db",$conn))
{
	echo 'Database my_db created.';
}
else
{
	echo 'Error creating database:'.mysql_error();
}
mysql_select_db("my_db",$conn);
$sql="CREATE TABLE Admins
(
username varchar(15),
password varchar(15)
)";
mysql_query($sql,$conn);
mysql_query("insert into admins(username,password) values('admin','password')");

mysql_close($conn);

?>
