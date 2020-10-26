<?php

if (isset($_POST['login-submit'])) {

    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)) {
        header ("Location: ../index.php?error=emptyfields");
        exit ();
    } else {
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=? OR cpfUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header ("Location: ../index.php?error=emptyfields");
            exit ();
        } else {
            mysqli_stmt_bind_param($stmt, "sss", $mailuid, $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if ($pwdCheck == false) {

                    $loginFailed = "Você não logou!"; 
                    header ("Location: ../login.php?error=wrongpassword");
                    exit ();
                } else if ($pwdCheck == true) {

                    session_start();
                    $_SESSION['userId']      = $row['idUsers'];
                    $_SESSION['userUid']     = $row['uidUsers'];
                    $userId = $_SESSION['userId'];

                    $_SESSION['userFname']   = $row['fnameUsers'];
                    $_SESSION['userLname']   = $row['lnameUsers'];
                    $_SESSION['userEmail']   = $row['emailUsers'];
                    $_SESSION['userCelular'] = $row['celularUsers'];

                    $addressArr = unserialize($row['addressUsers'])[0];
                    $userTypeArr = unserialize($row['userType'])[0];

                    $_SESSION['userCep']     = $addressArr[0];
                    $_SESSION['userStreet']  = $addressArr[1];
                    $_SESSION['userNumber']  = $addressArr[2];
                    $_SESSION['userCompl']   = $addressArr[3];
                    $_SESSION['userNeighb']  = $addressArr[4];
                    $_SESSION['userCity']    = $addressArr[5];
                    $_SESSION['userState']   = $addressArr[6];

                    $_SESSION['userCredential'] = $userTypeArr[0];

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
                    
                    header ("Location: ../index.php?login=success");
                    exit ();
                    
                } else {
                    $errorPassword = 'password';
                    header ("Location: ../login.php?error=wrongpassword");
                    exit ();
                }
            } else {
                $errorUser = 'user';
                header ("Location: ../login.php?error=nouser");
                exit ();
            }
        }
    }


} else {
    header ("Location: ../login.php");
    exit ();
}