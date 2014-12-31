<?php 
  session_start();
  include 'dbconnect.php';
  $query="Select * from crown1,users where crown1.email= users.email order by crown1.rank LIMIT 10;";
  $res=mysqli_query($con,$query);
  $data=array();
  while($row = mysqli_fetch_array($res))
  {
    $namer=explode(" ", $row['name']);
    $name=$namer[0];
    $rank=$row['rank'];
    $points=$row['points'];
    $row_data=array(
    'name' => $name, 
    'rank' => $rank,
    'points' => $points,
       );
    array_push($data, $row_data);
  }
  echo json_encode($data);                    //$rank=$row['name'];
 // echo $rank; 
?>

              