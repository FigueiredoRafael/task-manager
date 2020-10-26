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

        $url = "http://localhost/devplay/Desafio%20Final/taskManager/create-new-password.php?selector=".$selector."&&validator=".bin2hex($token);

        $expires = date("U") + 1800;

        require 'dbh.inc.php';

        $userEmail = $_POST["email"];

        $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There was an error!";
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $userEmail);
            mysqli_stmt_execute($stmt);
        }

        $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There was an error!";
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

        
        $mail = new PHPMailer(true);
        try{
            // SET MAILER TO USE SMTP
            $mail->isSMTP();
            // DEFINE SMTP HOST
            $mail->Host = "smtp.gmail.com";
            // ENABLE SMTP AUTHENTICATION
            $mail->SMTPAuth = "true";
            // SET TYPE OF ENCRYPTION (SSL/TLS)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
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
            $mail->setFrom("hectormailserver@gmail.com");
            // ADD RECIPIENT
            $mail->addAddress($userEmail);
            // SEND EMAIL
            $mail->Send();
        } catch (exception $e) {
            echo "error";
        }
        // CLOSE SMTP CONNECTION
        $mail->smtpClose();

        
        header("location: ../login.php?reset=success");

    } else {
        header ("Location: ../login.php");
    }// 