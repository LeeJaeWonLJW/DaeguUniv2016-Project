<?php
  $conn = mysql_connect("db.vhd.kr","factor0310","factor0716");
  $Year = $_GET["year"];
  $Name = $_GET["name"];
  if($conn){
    $sql = "SELECT * FROM mwsDB.Health_AppUser WHERE Year_Num = '".$Year."' AND Name = '".$Name."';";
    $res = mysql_query($sql,$conn);
    $row_count = mysql_num_rows($res);
    $res_array = array();
    if($row_count>=1){
      while($row = mysql_fetch_assoc($res)){
        $arrayMiddle = array(
          "name" => urlencode( $row['Name']),
          "year" => (int)$row['Year_Num']
        );
        array_push($res_array,$arrayMiddle);
      }
    }
    print_r( urldecode( json_encode($res_array)));

  }
  mysql_close($conn);
 ?>
