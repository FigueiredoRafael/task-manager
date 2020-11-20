<?php

if (isset($_POST["real-delete-user-btn"])) {

require "dbh.inc.php";
$userId = $_POST['userId'];

$sql = "DELETE FROM users WHERE idUsers='$userId'";
if ($conn->query($sql) === TRUE) {
header("Location: ../users.php?user-removed=success");
} else {
header("Location: ../users.php?user-removed=error");
}
$userRemovedSuccessAlert;
exit();
mysqli_stmt_close($stmt);
mysqli_close($conn);

}

// TODO Create a promotion button in users.php