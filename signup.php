<?php 
    require "login.php";
?>
    <main>
        <div class="form-group m-5 mb-10 ">
            <section class="">
                <h1 class="h2">Signup</h1>
                <form class="form" action="includes/signup.inc.php" method="post">
                
                    <input class="form-control m-3 col-4" type="text" name="uid" placeholder="Username">
                    <input class="form-control m-3 col-4" type="text" name="mail" placeholder="E-mail">
                    <input class="form-control m-3 col-4" type="password" name="pwd" placeholder="Password">
                    <input class="form-control m-3 col-4" type="password" name="pwd-repeat" placeholder="Repeat Password">
                    <div class="row justify-content-center">
                    <button class="btn btn-lg btn-primary" type="submit " name="signup-submit">Signup</button>
                    </div>                   
                    
                </form>
            </section>
        </div>

    </main>