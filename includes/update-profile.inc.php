<?php



if (isset($_POST['update-submit'])) {

    require 'dbh.inc.php';
    $idUser         = $_POST['userId'];
    $fname          = $_POST['fname'];
    $lname          = $_POST['lname'];
    $celular        = $_POST['celular'];

    $addressArr     = array($_POST['address']);
    $addressStr     = serialize($addressArr);

// Check connection
    if ($conn->connect_error) {
       header ("Location: ../profile.php?update-profile=conn-error");
       exit();
    } else if (empty($fname) || empty($lname)) {
        header ("Location: ../profile.php?update-profile=empty-name-fields");
        exit();
    } else if (empty($celular)) {
        header ("Location: ../profile.php?update-profile=empty-cel-field");
        exit();
    } else if (empty($_POST['address'])) {
        header ("Location: ../profile.php?update-profile=empty-address-fields");
        exit();
    } else {
        $sql = "UPDATE users SET fnameUsers='$fname', lnameUsers='$lname', celularUsers='$celular', addressUsers='$addressStr' WHERE idUsers='$idUser'";
    
        if ($conn->query($sql) === TRUE) {
            header("Location: ../profile.php?update-profile=success");
            exit();
        } else {
            header("Location: ../profile.php?update=error");
            exit();
        }
    }    
    header("Location: ../profile.php");
    exit();
    $conn->close();
}

if (isset($_POST['newpwd-submit'])) {

    require 'dbh.inc.php';
    $userId         = $_POST['userId'];
    $currentPwd     = $_POST['currentPwd'];
    $password       = $_POST['newPwd'];
    $passwordRepeat = $_POST['newPwd-repeat'];

    $sql = "SELECT * FROM users WHERE idUsers=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../profile.php?error=connection-");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            $pwdCheck = password_verify($currentPwd, $row['pwdUsers']);
            if ($pwdCheck == false) {
                header ("Location: ../profile.php?error=wrongpwd");
                exit ();
            } else if ($pwdCheck == true) {
                if ($password !== $passwordRepeat) {
                    header ("Location: ../profile.php?error=pwd-not-same");
                    exit();
                } else if (empty($password) || strlen($password) < 6) {
                    header ("Location: ../profile.php?error=weakpwd");
                    exit();
                } else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "UPDATE users SET pwdUsers='$hashedPwd' WHERE idUsers='$userId'";
                    if ($conn->query($sql) === TRUE) {
                        header("Location: ../profile.php?pwd-update=success");
                        exit();
                    } else {
                        header("Location: ../profile.php?pwd-update=error");
                        exit();
                    }
                }
            }
        }
        header("Location: ../profile.php?nothing-happened-with-".$userId);
        exit();
        $conn->close();
    }
}



if (isset($_POST['avatarpic-submit'])) {

    $file = $_FILES['avatarpic'];

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
       if ($fileError === 0) {
           if ($fileSize < 1000000) {
                $userId = $_POST['userId'];
                $fileNameNew = $userId.".".$fileActualExt;
                $fileDestination = '../img/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                $fileDestination = 'img/'.$fileNameNew;
                
                require "dbh.inc.php";
                $sql = "SELECT * FROM users WHERE idUsers='$userId'"; 
                $result = mysqli_query($conn, $sql);
               
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $uid = $row['idUsers'];
                        $sql = "SELECT * FROM profileimg WHERE id='$userId'"; 
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) == 0) {
                            $sql = "INSERT INTO profileimg (id, name, img_dir) VALUES ('$uid', '$fileNameNew', '$fileDestination')";
                            mysqli_query($conn, $sql);

                            header("Location: ../profile.php?profileimg-insert=success");
                            exit();
                        } else {
                            $sql = "UPDATE profileimg SET name='$fileNameNew', img_dir='$fileDestination' WHERE id='$userId'";
                            if ($conn->query($sql) === TRUE) {
                                header("Location: ../profile.php?profileimg-update=success");
                                exit();
                            } else {
                                header("Location: ../profile.php?profileimg-update=error");
                                exit();
                            }
                        }
                    }
                }
           } else {
                header ("Location: ../profile.php?profileimg=big-file");
                echo "your file is too big";
                exit();
           }
       } else {
           header ("Location: ../profile.php?profileimg=there-was-an-error");
           echo "There was an error";
           exit();
       }
    } else {
        header ("Location: ../profile.php?profileimg=invalid-format");
        echo "not allowed image picture file.";
        exit();
    }
}

if (isset($_POST["selfdelete-user-submit"])) {

    require "dbh.inc.php";
    $userId = $_POST['userId'];
    
    $sql = "DELETE FROM users WHERE idUsers='$userId'";
    if ($conn->query($sql) === TRUE) {
    header("Location: ../login.php?user-removed=success");
    } else {
    header("Location: ../users.php?user-removed=error");
    }
    $userRemovedSuccessAlert;
    exit();
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    }


?>