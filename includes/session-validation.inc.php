<?php

if (isset($_SESSION['userId'])) {

  } else {
    ?>
      <script>window.location.href="login.php?session=closed";</script>
    <?php
}

?>