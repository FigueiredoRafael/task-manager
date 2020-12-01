<?php

if (isset($_POST["id"])) {

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
    } else { 
        echo "0";
        exit();
    }
} else {
    echo "0";
    exit();
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
}

if (isset($_POST["selfid"])) {

require "dbh.inc.php";
$userId = $_POST['selfid'];

$sql = "SELECT * FROM users WHERE idUsers='$userId'";
$result = mysqli_query($conn, $sql);
$totalrows = mysqli_num_rows($result);

if ($totalrows > 0) {
    $sql = "DELETE FROM users WHERE idUsers='$userId'";
    if ($conn->query($sql) === TRUE) {
        echo "1";
        exit();
    } else { 
        echo "0";
        exit();
    }
} else {
    echo "0";
    exit();
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
}



if (isset($_POST['promote'])) {
    require "dbh.inc.php";
    $userId = $_POST['promote'];

    $sql = "SELECT * FROM users WHERE idUsers='$userId'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $sql = "UPDATE users SET userType='admin' WHERE idUsers='$userId'";
        if ($conn->query($sql) === TRUE) {
            echo "1";
            exit();
        } else {
            echo "0";
            exit();
        }
    } else {
        echo "2";
        exit();
    }
}
// }

// TODO Create a promotion button in users.php