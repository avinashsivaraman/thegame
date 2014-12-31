<?php 
session_start();
//echo $_SESSION['level'];
$selstring=''; 
$selstring.='<select class="sel">';
          for ($x=$_SESSION['level'];$x>0;$x--)
               $selstring.='<option>Level&nbsp;'.$x.'</option>';
$selstring.='</select>';

$data=array();
$data=array(
'selS'=>$selstring,
'level'=>$_SESSION['level'],
);
echo json_encode($data);
?>