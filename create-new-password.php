<!DOCTYPE html>
<htm lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/2eaa097dec.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Bootstrap Theme</title>
</head>
<body>

    <!-- HEADER -->
    <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
        <div class="row">
        <div class="col-md-6">
            <h1><i class="fas fa-user"></i> Controlador de Tarefas </h1>
        </div>
        </div>
    </div>
    </header>

    <!-- ACTIONS -->
    <section id="actions" class="py-4 mb-4 bg-light">
    <div class="container">
        <div class="row">
        </div>
    </div>
    </section>


    <div class="container">
      <div class="row">
        <div class="col-md-5 mx-auto">
          <div class="card">
            <div class="card-header">
              <h4>Esqueceu a Senha?</h4>
            </div>
            <div class="card-body">
            <?php
                $selector = $_GET["selector"];
                $validator = $_GET["validator"];

                if (empty($selector) || empty($validator)) {
                    echo "Could not validate your request!";
                } else {
                    if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
            ?>
            <form class="form-signin" action="includes/reset-password.inc.php" method="post">
              <div class="form-group">
                <input type="hidden" name="selector" value="<?php echo $selector;?>">
                <input type="hidden" name="validator" value="<?php echo $validator;?>">
                <label for="pwd">Nova Senha</label>
                <input class="form-control" type="password" name="pwd" onkeyup="createPwdVal(this.value);" placeholder="Digite a nova senha..."><p id="pwd-msg"></p>
                <label for="pwd-repeat">Repita a Senha</label>
                <input class="form-control" type="password" name="pwd-repeat" class="pwd-repeat" onkeyup="createPwdRptVal(this.value);" placeholder="Confirme a sua nova senha..."><p id="pwd-repeat-msg"></p>
              </div>
              <button type="submit" class="btn btn-primary btn-block" id="reset-pwd-btn" name="reset-password-submit">Reset Password</button>
            </form>
            <?php
                }
            }
            ?>
          </div>
          </div>
        </div>
      </div>
    </div>
    <!-- FOOTER -->
    <footer id="main-footer" class="bg-dark text-white mt-5 p-5">
    <div class="container">
        <div class="row">
        <div class="col">
            <p class="lead text-center">
            copyright &copy; <span id="year"></span> Blogen
            </p>
        </div>
        </div>
    </div>
    </footer>
    <script
    src="http://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery.js"></script>

    <script>

        let pwdWeak = true;
        let pwdNotSame  = true;
        
        function pwdErrors() {
            if(pwdWeak || pwdNotSame) {
                document.getElementById('reset-pwd-btn').disabled = true;
            } else {
                document.getElementById('reset-pwd-btn').disabled = false;
            }
        }

        document.getElementById('reset-pwd-btn').disabled = true;
        var newPwdGlobal;
        function createPwdRptVal (pwdRepeat){
            let pwdRepeatMsg = document.getElementById("pwd-repeat-msg");
            let pwdRepeatCheck = document.getElementById("pwd-repeat-msg");
            if (newPwdGlobal === pwdRepeat){
                pwdStrength = "<strong>A senha confere.</strong>";
                color       = "#28a745";
                pwdRepeatMsg.innerHTML = pwdStrength;
                pwdRepeatCheck.style.color = color;
                pwdNotSame = false;
                pwdErrors();
            } else {
                pwdStrength = "<strong>A senha não confere.</strong>";
                color       = "#dc3545";
                pwdRepeatMsg.innerHTML = pwdStrength;
                pwdRepeatCheck.style.color = color;
                pwdNotSame = true;
                pwdErrors();
            }
        }
        
        function createPwdVal(password) {

            console.log(password);

            let passwordMessage = document.getElementById("pwd-msg");
            let passwordStrength = document.getElementById("pwd-msg");
                    
            // WHEN THE PASSWORD LEGNTH IS ZERO, SHOW NOTHING
            if(password.length = 0) {
                passwordMessage = "";
            }

            // ARRAY WITH THE POSSIBLE CHARACTERS
            let possibleCharArr = new Array();
            possibleCharArr.push("[$@$!%*#?&]"); // SPECIAL CHARACTERS
            possibleCharArr.push("[A-Z]"); // UPPERCASE
            possibleCharArr.push("[0-9]"); // NUMBERS
            possibleCharArr.push("[a-z]"); // LOWERCASE

            // CHECK THE CHARACTERS
            let checker = 0;
            for (let i = 0; i < possibleCharArr.length; i++) {
                if (new RegExp(possibleCharArr[i]).test(password)) {
                    checker++;
                }
            }
            // CHECK PASSWORD SIZE
            if (checker > 2 && password.lenght > 6){
                checker++;                
            }

            // MESSAGE CONDITIONS
            let color = "";
            let pwdStrength = "";
            if (checker === 0 || password.length < 6) {
                pwdStrength = "<span style='font-style: italic;'>A senha precisa conter pelo menos 6 caracteres (letras e números).</span>";
            } else if (checker === 1 && checker < 2 && password.length >= 6) {
                pwdStrength = "<strong>Senha fraca.</strong>";
                color       = "#dc3545";
            } else if (checker === 2 && checker < 3 && password.length > 6) {
                pwdStrength = "<strong>Senha razoável.</strong>";
                color       = "#ffc107";
                pwdWeak = false;
                pwdErrors();
            } else if (checker === 3 && checker < 4 && password.length > 6) {
                pwdStrength = "<strong>Senha forte.</strong>";
                color       = "#007bff";
                pwdWeak = false;
                pwdErrors();
            } else if (checker === 4 && password.length > 6) {
                pwdStrength = "<strong>Senha muito forte</strong>";
                color       = "#28a745";
                pwdWeak = false;
                pwdErrors();
            }
            passwordMessage.innerHTML = pwdStrength;
            passwordStrength.style.color = color;
            newPwdGlobal = password;
            pwdErrors();
            

        }

    </script>
</body>
</html>
