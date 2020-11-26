<?php

if (isset($_SESSION['userId'])) {

  } else {
      header("location: login.php?session=close");
      exit();
}

?>