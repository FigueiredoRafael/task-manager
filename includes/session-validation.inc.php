<?php

if (isset($_SESSION['userId'])) {

  } else {
      header("Location: login.php?session=close");
      exit();
}

?>