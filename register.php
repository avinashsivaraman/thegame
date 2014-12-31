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
	function validPhone($phone)
	{
	$valid=true;
	$len=strlen($phone);
	if($len<8 || $len>13) 
	  $valid=false;
	preg_match_all('/[0-9]/', $phone, $matches);
	$count = count($matches[0]);
	if($count<$len)
	{
	  if($count==$len-1)
	  {
	    if($phone{0}!='+')
	    $valid=false;

	  }
	  else
	    $valid=false;
	}
	return $valid;
	}

	function validEmail($email)
	{
	$isValid = true;
	$atIndex = strrpos($email, "@");
	if (is_bool($atIndex) && !$atIndex)
	{
	  $isValid = false;
	}
	else
	{
	    $domain = substr($email, $atIndex+1);
	    $local = substr($email, 0, $atIndex);
	    $localLen = strlen($local);
	    $domainLen = strlen($domain);
	    if ($localLen < 1 || $localLen > 64)
	    {
	      // local part length exceeded
	      $isValid = false;
	    }
	    else if ($domainLen < 1 || $domainLen > 255)
	    {
	      // domain part length exceeded
	      $isValid = false;
	    }
	    else if ($local[0] == '.' || $local[$localLen-1] == '.')
	    {
	      // local part starts or ends with '.'
	      $isValid = false;
	    }
	    else if (preg_match('/\\.\\./', $local))
	    {
	       // local part has two consecutive dots
	      $isValid = false;
	    }
	    else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
	    {
	       // character not valid in domain part
	       $isValid = false;
	    }
	    else if (preg_match('/\\.\\./', $domain))
	    {
	       // domain part has two consecutive dots
	       $isValid = false;
	    }
	    else if(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',
	           str_replace("\\\\","",$local)))
	    {
	       // character not valid in local part unless 
	       // local part is quoted
	       if (!preg_match('/^"(\\\\"|[^"])+"$/',
	         str_replace("\\\\","",$local)))
	       {
	        $isValid = false;
	       }
	    }
	    if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
	    {
	       // domain not found in DNS
	       $isValid = false;
	    }
	}
	return $isValid;
	}
session_start();
include 'dbconnect.php';
	$pass=mysqli_real_escape_string($con,$_REQUEST['pass']);
	$email=mysqli_real_escape_string($con,$_REQUEST['email']);
	$name=mysqli_real_escape_string($con,$_REQUEST['name']);
	/*$college=mysql_real_escape_string($_REQUEST['college']);
	$course=mysql_real_escape_string($_REQUEST['course']);
	$dept=mysql_real_escape_string($_REQUEST['dept']);
	$year=mysql_real_escape_string($_REQUEST['year']);*/
	$phone=mysqli_real_escape_string($con,$_REQUEST['phone']);
	$query="SELECT email from users where email='".$email."'";
	$name=filter_var($name, FILTER_SANITIZE_STRING);
	$pass=filter_var($pass, FILTER_SANITIZE_STRING);
	/*$college=filter_var($college, FILTER_SANITIZE_STRING);
	$course=filter_var($course, FILTER_SANITIZE_STRING);
	$dept=filter_var($dept, FILTER_SANITIZE_STRING);*/
	$email=filter_var($email, FILTER_SANITIZE_EMAIL);
	$res=mysqli_query($con,$query);
	if(!validEmail($email))
	{
		$code=2;
	}
	else if(!validPhone($phone))
	{
		$code=3;
	}
	else if(mysqli_num_rows($res)>0)
	{
		$code=0;
	}
	else
	{
		$result = mysqli_query($con,"SELECT SUM(users) AS value_sum FROM levelusers"); 
                    $row = mysqli_fetch_assoc($result); 
                    $sum = $row['value_sum'];
                    $rank =$sum+1;
		$query="INSERT INTO `users`(pass,email,name,phone) values('$pass','$email','$name','$phone')";
		$res=mysqli_query($con,$query) or die("Unexpected error. Please contact the admin.\n"+mysqli_error($con));
		$query2="INSERT INTO `crown1`(email,level,points,rank) values('$email',1,0,".$rank.")";
		$res=mysqli_query($con,$query2) or die("Unexpected error. sorry.\n"+mysqli_error($con));
		$query='UPDATE levelusers SET users =  users + 1 WHERE level = 1';
		mysqli_query($con,$query) or die(mysqli_error($con));
		$code=1;
		

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
				  <h3><b>Your Techofes ID is ".$techofesID."</b></h3><br/><br/>

				  <h3>You must bring this ID for Onsite registration and participation</h3>
				  
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

	}

	echo $code;
?>