<?php
	function generateTechofesid($seqid){
		$key=array('0','3','2','4','7','6','8','1','9','5');
		$prefix="techo";
		$i=1;
		
		$index0=1;
		$index1=0;
		$index2=0;
		$index3=0;
		
		while(1)
		{
		  if($i==$seqid)
			break;
		  if($index3<(count($key)-1))
			$index3++;
		  else
		  {
			$index3=0;
			if($index2<(count($key)-1))
			  $index2++;
			else
			{
			  $index2=0;
			  if($index1<(count($key)-1))
				$index1++;
			  else
			  {
				$index1=1;
				if($index0<(count($key)-1))
				  $index0++;
				else
				{
				
				}
			  }
			}
		  }
	  
		  
		  $i++;
		}
		return $prefix.$key[$index0].$key[$index1].$key[$index2].$key[$index3];
	}
session_start();
include 'dbconnect.php';
require "src/facebook.php";

$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$id=$_REQUEST['id'];
$token=$_REQUEST['token'];
$_SESSION['email']=$email;
$_SESSION['fb']="yes";

$name=filter_var($name, FILTER_SANITIZE_STRING);
$email=filter_var($email, FILTER_SANITIZE_EMAIL);

$query="SELECT * FROM users WHERE email='$email'";
$result=mysqli_query($con,$query);

$code="1";

if(mysqli_num_rows($result) == 1)
{//Crown Entry
$query="SELECT * FROM crown1 WHERE email='$email'";
$result=mysqli_query($con,$query);
$num=mysqli_num_rows($result);
if($num==0){
	$result = mysqli_query($con,"SELECT SUM(users) AS value_sum FROM levelusers"); 
        $row = mysqli_fetch_assoc($result); 
        $sum = $row['value_sum'];
        $rank =$sum+1;
	$query2="INSERT INTO `crown1`(email,level,points,rank) values('$email',1,0,".$rank.")";
	$res=mysqli_query($con,$query2) or die("Unexpected error. sorry.\n"+mysqli_error($con));
	$query='UPDATE levelusers SET users =  users + 1 WHERE level = 1';
	mysqli_query($con,$query) or die(mysqli_error($con));
}
}

if(mysqli_num_rows($result) <= 0)
{//new user registration
	$query="INSERT INTO users(name,email,id,token) VALUES('$name','$email','$id','$token')";
	mysqli_query($con,$query);
        $result = mysqli_query($con,"SELECT SUM(users) AS value_sum FROM levelusers"); 
        $row = mysqli_fetch_assoc($result); 
        $sum = $row['value_sum'];
        $rank =$sum+1;
	$query2="INSERT INTO `crown1`(email,level,points,rank) values('$email',1,0,".$rank.")";
	$res=mysqli_query($con,$query2) or die("Unexpected error. sorry.\n"+mysqli_error($con));
	$query='UPDATE levelusers SET users =  users + 1 WHERE level = 1';
	mysqli_query($con,$query) or die(mysqli_error($con));

	//fb post
      $message="Registered for Techofes!";
	  $link="http://www.techofes.org";
	  $image="http://www.techofes.org/techofes/fbpost.jpg";
	  $title="Techofes | 2014";
	  $description="Techofes is the Cultural Festival of College of Engineering, Guindy - Anna University. South India's biggest Cultural Festival";
      try {
		  $facebook = new Facebook(array(
		  'appId'  => '596246003782093',
		  'secret' => '645cb8c8b92c52339bd9b1222cbf20f9',
		  'cookie' => true
		));
		Facebook::$CURL_OPTS[CURLOPT_SSL_VERIFYPEER] = false;
		Facebook::$CURL_OPTS[CURLOPT_SSL_VERIFYHOST] = 2;
		  $user = $facebook->getUser();
					$publishStream = $facebook->api("/$user/feed", 'post', array(
					//'access_token' => $token,
					'message' => $message,
					'link'    => $link,
                    'picture' => $image,
                    'name'    => $title,
                    'description'=> $description
                    )
                );
            } 
            catch (FacebookApiException $e) {
            	$my_file = 'file.txt';
            	$data=$e->getType()." ".$e->getMessage();
				$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file); 
				fwrite($handle, $data);
			    echo $e->getType();
				echo $e->getMessage();
			}   
	  
			$query="SELECT seqid from `users` where `email`='$email'";
			$res=mysqli_query($con,$query)  or die(mysqli_error($con));
			$row=mysqli_fetch_array($res);
			$seqid=$row['seqid'];
			$techofesID=generateTechofesid($seqid);//generate techofes id based on seqid
			$query="UPDATE users set techofesid='".$techofesID."' where email='".$email."'";
			mysqli_query($con,$query) or die(mysqli_error($con));

	  //send email
			$from_name="Techofes 2014";
			$from_address="venkrish@techofes.org";
			$to=$email;
			 $subject="[Techofes] Thank you for Registering for Techofes";

			$headers = "MIME-Version: 1.0\r\n"
					  ."Content-Type: text/html; charset=utf-8\r\n"
					  ."Content-Transfer-Encoding: 8bit\r\n"
					  ."From: =?UTF-8?B?". base64_encode($from_name) ."?= <$from_address>\r\n"
					  ."X-Mailer: PHP/". phpversion();

		  	$msg="Hello $name, <br/><br/>You have registered successfully for Techofes 2014.<br/>
				  <b>Your Techofes ID is ".$techofesID."</b><br/><br/>
				  Check out the website <a href=\"http://www.techofes.org\">Techofes 2014</a> regularly for updates.";
			$msg.="<br/><br/>Note: Kindly click on NOT SPAM if you find this mail in your spam folder.
			<br/><br/>Hope to see you at Techofes 2014: 12th-15th February 2014.
			<br/><br/>
			Like us: <a href=\"https://www.facebook.com/techofes.org\">fb.com/techofes.org</a><br/>
			Follow us: <a href=\"https://twitter.com/Techofes14\">@techofes14</a>
			<br/><br/>
			Regards,<br/>
			SAAS CEG | Techofes 2014";
		 
			mail($to, $subject, $msg, $headers, "-f $from_address");

	  $code="0";
 }
 	 	    $query="select * from crown1 where email='".$_SESSION['email']."';";
                    $res=mysqli_query($con,$query);
                    $row=mysqli_fetch_array($res);
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
 echo $code;

?>