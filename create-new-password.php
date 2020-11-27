<?php 

require "header.php";

?>

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
                <div class="form-group">
                    <label for="pwd">Nova Senha</label>
                    <input class="form-control" type="password" name="pwd" id="pwd" onkeyup="passwordValidation(this.value);" placeholder="Digite a nova senha...">
                    <p class="pwd-msg"></p>
                </div>
                <div class="form-group">
                    <label for="pwd-repeat">Repita a Senha</label>
                    <input class="form-control" type="password" name="pwd-repeat" id="pwd-repeat" onkeyup="passwordRepeatValidation(this.value);" placeholder="Confirme a sua nova senha...">
                    <p class="pwd-repeat-msg"></p>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-block" id="signup-btn" name="reset-password-submit">Reset Password</button>
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
<?php
    require "footer.php";
?>