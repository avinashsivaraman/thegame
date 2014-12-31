<?php
session_start();
$flag=mysqli_real_escape_string($con,$_REQUEST['flag']);
/*if($flag==1)
{
	if(isset($_SESSION['email']))
	{
		echo 1;
	}
	else
		echo 2;
}
else
{*/
session_unset();
session_destroy();
if(isset($_SESSION['fb']))
echo 1;
else
echo 2;
//}
?>