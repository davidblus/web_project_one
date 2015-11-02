<?php
	if(isset($_GET['page']))
	{
		include $_GET['page'];
	}
	else
	{
		echo '请输入page参数的值<br />';
	}
?>
