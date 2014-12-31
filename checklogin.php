<?php
session_start();
include('dbconnect.php');
$email=mysqli_real_escape_string($con,$_REQUEST['email']);
$pass=mysqli_real_escape_string($con,$_REQUEST['pass']);
$query="SELECT * from `users` WHERE `email`='$email' and `pass`='$pass'";
$res=mysqli_query($con,$query) or die("Error in query");
$res1=mysqli_num_rows($res);
$name="guest";
if($res1 == 0)
{	
	$query="SELECT * from `users` WHERE `email`='$email'";
	$res=mysqli_query($con,$query) or die("Error in query");
	$res2=mysqli_num_rows($res);
	if($res2>0){
		$code=3;
		echo json_encode(array('name'=>$name,'code'=>$code));
	}
	else{
		$code=2;
		echo json_encode(array('name'=>$name,'code'=>$code));
	}
}
else
{
	$code=1;
	$row = mysqli_fetch_assoc($res);
	$name=$row['name'];
	$_SESSION['email']=$email;
	$_SESSION['name']=$name;
	$query="select * from crown1 where email='".$_SESSION['email']."';";
                    $res3=mysqli_query($con,$query);
                    $numberrows=mysqli_num_rows($res3);
                    if($numberrows==0)
                    {
			$result = mysqli_query($con,"SELECT SUM(users) AS value_sum FROM levelusers"); 
                    	$row = mysqli_fetch_assoc($result); 
                    	$sum = $row['value_sum'];
                    	$rank =$sum+1;
                    	$query2="INSERT INTO `crown1`(email,level,points,rank) values('$email',1,0,".$rank.")";
			$res=mysqli_query($con,$query2) or die("Unexpected error. sorry.\n"+mysqli_error($con));
			$query='UPDATE levelusers SET users =  users + 1 WHERE level = 1';
			mysqli_query($con,$query) or die(mysqli_error($con));
                    }
                    $row=mysqli_fetch_array($res3);
                    $level=$row['level'];
                    $_SESSION['level']=$level;
                    $points=$row['points'];
                    $rank=$row['rank'];
                    $times="time".$level;
                    $timest=$row[$times];
                    $result7 = mysqli_query($con,"SELECT SUM(users) AS value_sum FROM levelusers"); 
                    $row7 = mysqli_fetch_assoc($result7); 
                    $sum7 = $row7['value_sum'];
                    $nousers =$sum7;
                    $_SESSION['nousers']=$nousers;
                    $result8=mysqli_query($con,"SELECT * from levelusers where level = ".$_SESSION['level'].";");
					$row8= mysqli_fetch_assoc($result8);
					$leUsers=$row8['users'];
					$_SESSION['leUsers']=$leUsers;
                    $query="select * from qna where level=".$level.";";
                    $res9=mysqli_query($con,$query);
                    $row9=mysqli_fetch_array($res9);
                    $title=$row9['title'];
                    $qn=$row9['qnlink'];
                    $_SESSION['title']=$title;
                    $_SESSION['qnlink']=$qn;
                    
                    $_SESSION['points']=$points;
                    $_SESSION['timest']=$timest;
                    $_SESSION['rank']=$rank;

	//echo $_SESSION['email'];
	echo json_encode(array('name'=>$_SESSION['name'],'code'=>$code,'nousers'=>$_SESSION['nousers'],'users'=>$_SESSION['leUsers'],'title'=>$_SESSION['title'],'qnlink'=>$_SESSION['qnlink'],'level'=>$_SESSION['level'],'points'=>$_SESSION['points'],'rank'=>$_SESSION['rank'],'timest'=>$_SESSION['timest']));

	}
?>