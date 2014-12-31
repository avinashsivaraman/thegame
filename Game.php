<?php
	session_start();
	include 'dbconnect.php';
	$data=array();
	
	if(isset($_SESSION['email']))
	{
	
    $data = array(
    'title' => $_SESSION['title'], 
    'rank' => $_SESSION['rank'],
    'points' => $_SESSION['points'],
    'level' => $_SESSION['level'],
    'qnlink' => $_SESSION['qnlink'],
    'nousers' => $_SESSION['nousers'],
    'users' => $_SESSION['leUsers'],
    'timest' => $_SESSION['timest']
       );
	}
	else{
		$data = array(
    'title' => 'Please Refresh The Page!!!!', 
    'rank' => '',
    'points' => '',
    'level' => '',
    'qnlink' => '_include/img/bg.jpg',
    'nousers' => '',
    'users' => '',
    'timest' => ''
       );
	}
  echo json_encode($data);                    //$rank=$row['name'];
 // echo $rank; 
?>