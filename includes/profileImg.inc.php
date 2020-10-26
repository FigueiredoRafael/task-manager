<?php

// PROFILE PICTURE DISPLAY UPDATE

require "includes/dbh.inc.php";

if(! $conn ) {
  die('Could not connect: ' . mysqli_error($conn));
}            
$userId = $_SESSION['userId'];

$sql = "SELECT * FROM users WHERE idUsers='$userId'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)){
   $userId = $row['idUsers'];
   $sqlImg = "SELECT img_dir FROM profileimg WHERE id='$userId'";
   $resultImg = mysqli_query($conn, $sqlImg);
    if (mysqli_num_rows($resultImg) > 0) {
      while ($rowimg = mysqli_fetch_assoc($resultImg)) {
        $_SESSION['profileImg'] = $rowimg['img_dir'];   
      }
    } else {
      $_SESSION['profileImg'] = "img/avatar.png";
    }
  }
}

// PERSONAL INFORMATIONS DISPLAY UPDATE

$sql = "SELECT fnameUsers, lnameUsers, emailUsers, celularUsers, addressUsers FROM users WHERE idUsers='$userId'";
$retval = mysqli_query($conn, $sql);

if(!$retval) {
 die('Could not get data: ');
}

while($row = mysqli_fetch_assoc($retval)) {
 $_SESSION['userFname']   = $row['fnameUsers'];
 $_SESSION['userLname']   = $row['lnameUsers'];
 $_SESSION['userEmail']   = $row['emailUsers'];
 $_SESSION['userCelular'] = $row['celularUsers'];

 $addressArr = unserialize($row['addressUsers'])[0];
 $_SESSION['userCep']     = $addressArr[0];
 $_SESSION['userStreet']  = $addressArr[1];
 $_SESSION['userNumber']  = $addressArr[2];
 $_SESSION['userCompl']   = $addressArr[3];
 $_SESSION['userNeighb']  = $addressArr[4];
 $_SESSION['userCity']    = $addressArr[5];
 $_SESSION['userState']   = $addressArr[6];
 $fetchedData = true;
}

?>