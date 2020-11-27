<?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        use PHPMailer\PHPMailer\SMTP;


        require_once 'PHPMailer/Exception.php';
        require_once 'PHPMailer/PHPMailer.php';
        require_once 'PHPMailer/SMTP.php';

    if (isset($_POST["reset-request-submit"])) {
        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);

        $url = "http://taskmanager.hectorsimandomain.com.br/create-new-password.php?selector=".$selector."&&validator=".bin2hex($token);

        $expires = date("U") + 1800;

        require 'dbh.inc.php';

        $userEmail = $_POST["email"];

        $sql = "DELETE FROM pwdreset WHERE pwdResetEmail='$userEmail'";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There was an error! 1";
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $userEmail);
            mysqli_stmt_execute($stmt);
        }

        $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There was an error! 2";
            exit();
        } else {
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
            mysqli_stmt_execute($stmt);
        }

        mysqli_stmt_close($stmt);


        $to = $userEmail;
        $subject = 'Reset your password for this website';
        $message = 'We\'ve received a password request. The link to reset your password is below, if you did not make this request, you can ignore this email';
        $message .= 'Here is your password reset link: '.$url.'';
        

        $headers = "From: LoginWebSite <hectormailserver@gmail.com>\r\n";
        $headers .= "Reply-To: hectormailserver@gmail.com\r\n";
        $headers .= "Content-type: text/html\r\n";

        mail($to, $subject, $body, $headers);

        $mail = new PHPMailer(true); //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch

        try{
            // SET MAILER TO USE SMTP
            $mail->IsSMTP();
            // $mail->SMTPDebug = 2;
            // $mail->Debugoutput = 'html';
            // DEFINE SMTP HOST
            $mail->Host = "smtp.gmail.com";
            // ENABLE SMTP AUTHENTICATION
            $mail->SMTPAuth = "true";
            // SET TYPE OF ENCRYPTION (SSL/TLS)
            $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';
            // SET PORT TO CONNECT SMTP
            $mail->Port = "587";
            // SET GMAIL USERNAME
            $mail->Username = "hectormailserver@gmail.com";
            // SET GMAIL PASSWORD
            $mail->Password = "!asd123456!";
            // SET EMAIL SUBJECT
            $mail->Subject = $subject;
            // EMAIL BODY
            $mail->Body = $message;
            // SET SENDER EMAIL
            $mail->SetFrom("hectormailserver@gmail.com");
            // ADD RECIPIENT
            $mail->AddAddress($userEmail);
            // SEND EMAIL
            $mail->Send();

        } catch (exception $e) {
            echo $e->getMessage();
        }
        // CLOSE SMTP CONNECTION
        $mail->smtpClose();

        
        header("location: ../login.php?msgElement=new-pwd-request");

    } else {
        header ("Location: ../login.php");
    }// 