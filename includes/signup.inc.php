<?php

if(isset($_GET['uid']) || isset($_GET['mail']) || isset($_GET['cpf']) || isset($_GET['pwd'])) {
    require 'dbh.inc.php';
    $username = !empty($_GET['uid']) ? $_GET['uid'] : NULL;
    $email = !empty($_GET['mail']) ? $_GET['mail'] : NULL;
    $cpf = !empty($_GET['cpf']) ? $_GET['cpf'] : NULL;
    $gender = !empty($_GET['gender']) ? $_GET['gender'] : NULL;
    $password = !empty($_GET['pwd']) ? $_GET['pwd'] : NULL;

    if (!empty($username)) {
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header ("Location: ../login.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0) {
                echo "0";
                exit();
            } else {
                echo "1";
                exit();
            }
        }
    }
    if (!empty($email)) {

        $sql = "SELECT emailUsers FROM users WHERE emailUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header ("Location: ../login.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0) {
                echo "0";
                exit();
            } else {
                echo "1";
                exit();
            }
        }
    }
    if (!empty($cpf)) {
        $sql = "SELECT cpfUsers FROM users WHERE cpfUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header ("Location: ../login.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $cpf);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0) {
                echo "0";
                exit();
            } else {
                echo "1";
                exit();
            }
        }
    }
    if (!empty($password)) {

        $error = false;

        if (strlen($password) < 6) {
            echo "0";
            $error = true;
            exit();
        } else {
            echo "1";
            $error = false;
            exit();
        }
        if (!preg_match("#[0-9]+#", $password)) {
            echo "0";
            $error = true;
            exit();
        } else {
            echo "1";
            $error = false;
            exit();
        }
        if (!preg_match("#[a-zA-Z]+#", $password)) {
            echo "0";
            $error = true;
            exit();
        } else {
            echo "1";
            $error = false;
            exit();
        }
        if (!preg_match("#[$@$!%*#?&]+#", $password)) {
            $error = true;
            exit();
        } else {
            echo "1";
            $error = false;
            exit();
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}


if (isset($_POST['signup-submit'])) {

    require 'dbh.inc.php';
    $fromUsersPage  = $_POST['from-users-page'];
    $username       = $_POST['uid'];
    $fname          = $_POST['fname'];
    $lname          = $_POST['lname'];
    $email          = $_POST['mail'];
    $cpf            = $_POST['cpf'];
    $gender         = $_POST['gender'];
    $password       = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];
    $celular        = $_POST['celular'];

    $userType       = $_POST['userType'];

    $addressArr     = array($_POST['address']);
    $addressStr     = serialize($addressArr);


    if (empty($username)       || 
        empty($fname)          || 
        empty($lname)          || 
        empty($email)          || 
        empty($cpf)            || 
        empty($gender)         || 
        empty($celular)        ||
        empty($addressStr)
        ) {
            if (isset($_POST['from-users-page'])) {
                
                header ("location: ../users.php?error=emptyfields&uid=".$username."&email=".$email."&credencial=".$userType."&address=".$addressArr."&msgElement=emptyfields");
                exit();
            }    
        header ("location: ../login.php?error=emptyfields&uid=".$username."&email=".$email."&credencial=".$userType."&address=".$addressArr."&msgElement=emptyfields");
        exit ();
        

    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {

        if (isset($_POST['from-users-page'])) {
            header ("Location: ../users.php?error=emptyfields&invalidmailuid&msgElement=invalidEmailnUid");
            exit();
        }
        else{
        header ("Location: ../login.php?error=emptyfields&invalidmailuid&msgElement=invalidEmailnUid");
        exit ();}

    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (isset($_POST['from-users-page'])) {
            header ("Location: ../users.php?error=invalidmail&uid=".$username."&msgElement=invalidEmail");
            exit();
        }
        else{
        header ("Location: ../login.php?error=invalidmail&uid=".$username."&msgElement=invalidEmail");
        exit ();}

    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        if (isset($_POST['from-users-page'])) {
            header ("Location: ../users.php?error=invaliduid&mail=".$email."&msgElement=invalidUid");
            exit();
        }
        else{
        header ("Location: ../login.php?error=invaliduid&mail=".$email."&msgElement=invalidUid");
        exit ();}
        
    } else if ($password !== $passwordRepeat) {
        if (isset($_POST['from-users-page'])) {
            header ("Location: ../users.php?error=emptyfields&passwordcheck&mail=".$username."&mail=".$email."&msgElement=pwdNotSame");
            exit();
        }
        else{
        header ("Location: ../login.php?error=emptyfields&passwordcheck&mail=".$username."&mail=".$email."&msgElement=pwdNotSame");
        exit();}

    } else if (empty($password) || strlen($password) < 6 || preg_match("/^[a-z]*$/", $password) || preg_match("/^[0-9]*$/", $password)) {
            if ($error = true) {
                if (isset($_POST['from-users-page'])) {
                    header ("Location: ../users.php?error=weakpassword&msgElement=weakPwd");
                    exit();
                }
                else{
                header ("Location: ../login.php?error=weakpassword&msgElement=weakPwd");
                exit();}
            }
        
    } else {
        if (preg_match("/\D/", $cpf)) {
            $cpf = str_replace(".", "", $cpf);
            $cpf = str_replace("-", "", $cpf);
        }
        $sql = "SELECT uidUsers OR emailUsers OR cpfUsers FROM users WHERE uidUsers=? OR emailUsers=? OR cpfUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            if (isset($_POST['from-users-page'])) {
                header ("Location: ../users.php?error=sqlerror");
                exit();
            }
            else{
            header ("Location: ../login.php?error=sqlerror");
            exit();}
        } else {
            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $cpf);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                if (isset($_POST['from-users-page'])) {
                    header ("Location: ../users.php?error=usertaken&msgElement=userTaken");
                    exit();
                }
                else{
                header ("Location: ../login.php?error=usertaken&msgElement=userTaken");
                exit();}
            } else {
                $sql = "INSERT INTO users (uidUsers, fnameUsers, lnameUsers, emailUsers, cpfUsers, genderUsers, pwdUsers, userType, addressUsers, celularUsers) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {

                    if (isset($_POST['from-users-page'])) {
                        header ("Location: ../users.php?error=sqlerror");
                        exit();
                    }
                    else{
                    header ("Location: ../login.php?error=sqlerror");
                    exit();}
                    
                } else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssssssssss", $username, $fname, $lname, $email, $cpf, $gender, $hashedPwd, $userType, $addressStr, $celular);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);

                   // ADD STANDARD AVATAR PICTURE
                   $sql = "SELECT idUsers FROM users WHERE uidUsers='$username'";
                   $result = mysqli_query($conn, $sql);
                   $row = mysqli_fetch_assoc($result);
                   $userId = $row['idUsers'];

                   $fileSource = "../img/avatar.png";
                   $fileNameNew = $userId.".png";
                   $fileDestination = "../img/".$fileNameNew;

                   copy($fileSource, $fileDestination);

                   $fileDestination = "img/".$fileNameNew;
                   
                    $sql = "SELECT * FROM profileimg WHERE id='$userId'"; 
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) == 0) {
                                $sql = "INSERT INTO profileimg (id, name, img_dir) VALUES ('$userId', '$fileNameNew', '$fileDestination')";
                                mysqli_query($conn, $sql);
                    }

                    if (isset($_POST['from-users-page'])) {
                        header ("Location: ../users.php?signup=success&msgElement=signupSuccess");
                        $signUpSuccessAlert;
                        exit();
                    }
                    else{
                    header ("Location: ../login.php?signup=success&msgElement=signupSuccess");
                    $signUpSuccessAlert;
                    exit();
                    }
                }
            }
        }
    }

    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    } else {
        header ("Location: ../login.php");
        exit();
}
