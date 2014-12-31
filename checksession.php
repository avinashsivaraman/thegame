<?php
session_start();
if(isset($_SESSION['email']))
{
/*
if(array_key_exists("email",$_SESSION))
	echo  json_encode(array('codex'=>"1"));
else*/
	echo json_encode(array('namex'=>$_SESSION['name'],'codex'=>"20"));
}
else{
	echo json_encode(array("codex"=>"10"));
}
?>