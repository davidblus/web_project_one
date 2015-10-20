

<?php

//服务端无验证代码
///*
	if(isset($_POST["submit"]))
	{
		$name=$_FILES['file']['name'];
		$name=md5(date('Y-m-d h:m:s')).strrchr($name,".");
		$size=$_FILES['file']['size'];
		$tmp=$_FILES['file']['tmp_name'];
		move_uploaded_file($tmp,$name);
		echo "文件上传成功！path:".$name;
	}
//*/
	
//服务端黑名单过滤方法，攻击方法：1、找到其他扩展名，比如：cer；2、对文件扩展名进行大小写转换；3、在windows系统下，如果文件名以"."或者空格作为结尾，系统会自动去除，所以可以上传比如后缀名为"asp."或者"asp "的文件。
/*
$Blacklist=array('asp','php','jsp','php5','asa','aspx');
if(isset($_POST["submit"]))
{
	$name=$_FILES['file']['name'];
	$extension=substr(strrchr($name,"."),1);
	$boo=false;
	foreach($Blacklist as $key => $value)
	{
		if($value==$extension)
		{
			$boo=true;
			break;
		}
	}
	if(!$boo)
	{
		$size=$_FILES['file']['size'];
		$tmp=$_FILES['file']['tmp_name'];
		move_uploaded_file($tmp,$name);
		echo "文件上传成功！<br/> path:".$name;
	}
	else
	{
		echo "文件不合法！";
	}
}
*/

//白名单过滤方法，攻击方法为各类解析漏洞。
/*
$WhiteList=array('rar','jpg','png','bmp','gif','jpg','doc');
if(isset($_POST["submit"]))
{
	$name=$_FILES['file']['name'];
	$extension=substr(strrchr($name,"."),1);
	$boo=false;
	foreach($WhiteList as $key => $value)
	{
		if($value==$extension)
		{
			$boo=true;
		}
	}
	if($boo)
	{
		$size=$_FILES['file']['size'];
		$tmp=$_FILES['file']['tmp_name'];
		move_uploaded_file($tmp,$name);
		echo "文件上传成功！<br /> path:".$name;
	}
	else
		echo "文件不合法！！";
}
*/

//MIME验证方法，攻击方法为在本地使用Burp Suite拦截查看MIME类型，把application/php修改为image/jpeg
/*
if($_FILES['file']['type']=="image/jpeg")
{
	$imageTempName=$_FILES['file']['tmp_name'];
	$imageName=$_FILES['file']['name'];
	$last=substr($imageName,strrpos($imageName,"."));
	if(!is_dir("uploadFile"))
	{
		mkdir("uploadFile");
	}
	$imageName=md5($imageName).$last;
	move_uploaded_file($imageTempName,"./uploadFile/".$imageName);
	echo ("文件上传成功！！ path= /uploadFile/$imageName");
}
else
{
	echo ("文件类型错误，请重新上传...");
	exit();
}
//*/

//目录验证，引发漏洞的代码是 if(!is_dir($Extension)){ mkdir($Extension); } ，因为客户端可以控制$Extension的值，如果$Extension=*.asp，那么在IIS6.0容器中就会引发漏洞。
/*
if($_FILES['file']['type']=="image/jpeg")
{
	$imageTempName=$_FILES['file']['tmp_name'];
	$imageName=$_FILES['file']['name'];
	$last=substr($imageName,strrpos($imageName,"."));
	if($last!=".jpg")
	{
		exit("图片类型错误！");
	}
	$Extension=$_POST['Extension'];
	if(!is_dir($Extension))
	{
		mkdir($Extension);
	}
	$imageName=md5($imageName).$last;
	move_uploaded_file($imageTempName,"./$Extension/".$imageName);
	echo ("文件上传成功！！ path= /$Extension/$imageName");
}
else
{
	echo ("文件类型错误，请重新上传...");
	exit();
}
*/
?>

