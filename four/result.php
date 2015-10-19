<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php

function findAdmin($username,$password)
{
	$conn = mysql_connect("localhost","root","");
	if(!$conn)
	{
		die('不能连接数据库：'.mysql_error());
	}
	else
	{
		echo '连接本地数据库成功！<br />';
	}
	mysql_select_db("my_db",$conn);	
	
//	echo '正在测试username:'.$username.' , password:'.$password.'<br />';
	$sql="select count(*) as total from admins where username='".$username."' and password='".$password."'";
	$result=mysql_query($sql);
	list($count) = mysql_fetch_row($result);
	mysql_close($conn);
	if($count>0)
		return true;
	else
		return false;
}
echo '中文测试：<br />';
echo 'username:'.$_POST["username"].'<br />';
echo 'password:'.$_POST["password"].'<br />';

if(findAdmin($_POST["username"],$_POST["password"]))
{
	echo '管理员登录成功！！！<br />';
}
else
{
	echo '管理员登录失败！！！<br />';
}

?>
