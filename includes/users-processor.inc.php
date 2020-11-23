<?php

// if (isset($_POST["delete-user-submit"])) {

require "dbh.inc.php";
$userId = $_POST['id'];

$sql = "SELECT * FROM users WHERE idUsers='$userId'";
$result = mysqli_query($conn, $sql);
$totalrows = mysqli_num_rows($result);

if ($totalrows > 0) {
    $sql = "DELETE FROM users WHERE idUsers='$userId'";
    if ($conn->query($sql) === TRUE) {
        echo "1";
        exit();
    }
    echo "0";
    exit();
} else {
    echo "0";
    exit();
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

// }

// TODO Create a promotion button in users.php