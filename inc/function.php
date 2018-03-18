<?php 

function get_username_by_uid($uid){

  $sql = "SELECT name FROM user WHERE uid =".$uid;
  $result = mysql_query( $sql, $conn ); 
  $row = mysql_fetch_assoc($result);
  return $row['name'];
}



?>