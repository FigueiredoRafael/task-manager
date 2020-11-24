<?php

if (isset($_SESSION['userId'])) {
  $userId = $_SESSION['userId'];
  require "dbh.inc.php";
  $sql = "SELECT * FROM users WHERE idUsers='$userId'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 0) {
    header("Location: login.php?session=close");
    exit();
  }

  } else {
      header("Location: login.php?session=close");
      exit();
}

?>