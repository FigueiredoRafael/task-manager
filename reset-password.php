<?php
    require "header.php";
?>

    <main>
        <div class="container">
            <section class="row mt-5 justify-content-center">
                <h1 class="h1">Reset your password</h1>
                <div class="container">
                <p class="row mt-5 justify-content-center">An e-mail will be send to you with instructions on how to reset your password</p>
                <form class="form-signin" action="includes/reset-request.inc.php" method="post">
                    <input type="text" class="form-control col-auto" name="email" placeholder="Enter your e-mail address...">
                    <button class="btn btn-warning ml-4" type="submit" name="reset-request-submit">receive new password by e-mail</button>
                </form>
                <?php
                    if (isset($GET["reset"])) {
                        if ($_GET["reset"] == "success") {
                            echo '<div class="mt-2 col-sm alert alert-info ">Check your e-mail!</div>';
                        }
                    }
                ?> 
                </div>
                
            </section>
        </div>
    </main>