<?php
	session_start();
	
	include 'dbconnect.php';
	//echo($_SESSION['level']);
	$ans=mysqli_real_escape_string($con,$_REQUEST['answer']);
	$ans = strtolower(preg_replace('/\s+/', '', $ans));
	$query="SELECT * FROM qna WHERE level=".$_SESSION['level'].";";
	$res=mysqli_query($con,$query) or die("Unexpected error occurred.Please contact the admin.");
	$row=mysqli_fetch_assoc($res);
	$answer=$row['answer'];
	if($ans==$answer)
	{$lev=$_SESSION['level'];
		$nlev=$lev+1;
		$ts="time".$lev;
		$nts="time".$nlev;
		//$query="UPDATE levelusers set users = users+1 where email='".$_SESSION['email']."';";
		//mysql_query($query) or die(mysql_error());
		
		$query="UPDATE crown1 set level = level+1, points = points+100 where email='".$_SESSION['email']."'";
		
		//
	//	$query="START TRANSACTION; UPDATE crown1 set level = level+1, points = points+100 where email='".$_SESSION['email']."';UPDATE levelusers SET users = users + 1 where level = ".$lev.";COMMIT;";
		mysqli_query($con,$query);// or die(mysqli_error($con));
		$_SESSION['level']=$nlev;//
		$query="UPDATE levelusers set users = users-1 where level= $lev";
		//$query='UPDATE levelusers SET users = CASE level WHEN '.$lev.' THEN users - 1 WHEN '.$nlev.' THEN users + 1 END';
		mysqli_query($con,$query);// or die(mysqli_error($con));
		$query="UPDATE levelusers set users = users+1 where level= $nlev";
		mysqli_query($con,$query);// or die(mysqli_error($con));
		$result1=mysqli_query($con,"SELECT * from levelusers where level = ".$nlev.";");
		$row1= mysqli_fetch_assoc($result1);
		$leUsers=$row1['users'];
		$_SESSION['leUsers']=$leUsers;//
		$query="UPDATE crown1 SET rank = rank + 1 where level =".$lev." and ".$ts." < '".$_SESSION['timest']."';";
		mysqli_query($con,$query);// or die(mysqli_error($con));
		$result = mysqli_query($con,"SELECT SUM(users) AS value_sum FROM levelusers where level>=".$nlev); 
                    $row = mysqli_fetch_assoc($result); 
                    $sum = $row['value_sum'];
                    //
        $query="UPDATE crown1 SET rank = ".$sum.",".$nts."= NOW() where email='".$_SESSION['email']."';";  
        mysqli_query($con,$query);// or die(mysqli_error($con));
        $res2=mysqli_query($con,"SELECT * from crown1 WHERE email='".$_SESSION['email']."';");
        $row2=mysqli_fetch_assoc($res2);
        $times=$row2[$nts];
        $points2=$row2['points'];
        $rank2=$row2['rank'];
        $_SESSION['rank']=$rank2;
        $_SESSION['points']=$points2;
        $_SESSION['timest']=$times;//
		$result = mysqli_query($con,"SELECT SUM(users) AS value_sum FROM levelusers"); 
                    $row = mysqli_fetch_assoc($result); 
                    $sum = $row['value_sum'];
                    $nousers =$sum;
        $_SESSION['nousers']=$nousers;//
        $resque=mysqli_query($con,"SELECT * FROM qna WHERE level=".$_SESSION['level'].";");
        $rowque=mysqli_fetch_assoc($resque);
                    $title=$rowque['title'];
                    $qn=$rowque['qnlink'];
                    $_SESSION['title']=$title;//
                    $_SESSION['qnlink']=$qn;//
        
		echo json_encode(array("codex"=>"10"));
	}
	else
		echo json_encode(array("codex"=>"20"));
?>