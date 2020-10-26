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

<?php 
  $url = "HTTP://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  $loginFailed    = '<div class="col-3 alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Usuário ou senha</strong> está incorreto.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
   if (strpos($url, "error=emptyfields") == true || strpos($url, "error=wrongpassword") == true || strpos($url, "error=nouser") == true) {
     echo $loginFailed;
   } 
?>

<!-- ACTIONS -->
<section id="actions" class="py-4 mb-4 bg-light">
  <div class="container">
    <div class="row">
    </div>
  </div>
</section>

<!-- LOGIN -->
<section id="login" class="login">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card">
          <div class="card-header">
            <h4>Login</h4>
          </div>
          <div class="card-body">
            <form action="includes/login.inc.php" method="post">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="username-login" class="form-control" name="mailuid" required>
                <!-- <span class="text-danger"  style="display: <?php echo $errorUsername ? '': 'none' ?>;" >Email incorreto</span> -->
              </div>
              <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" id="pwd-login" class="form-control" name="pwd">
                <!-- <span class="text-danger" style= <script> </script> "display: <?php echo $errorPassword ? '': 'none' ?>;" >Senha incorreta</span> -->
              </div>
              <input type="submit" name="login-submit" id="login-btn" class="btn btn-primary btn-block" required>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto" style="text-align: center;">
      <a class="mt-2 mr-2 underlineHover" href="#reset-password" id="showResetPwd">Esqueceu a senha?</a>
        <a class="mt-2 underlineHover" href="#signup" id="showSingUp">Cadastrar</a>
      </div>
    </div>
  </div>
</section>

<!-- SIGNUP -->
<section id="singUp" class="d-none singUp">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-header">
              <h4>Cadastrar Trabalhador</h4>
            </div>
            <div class="card-body">
              <form class="form" id="signup-form" action="includes/signup.inc.php" method="post">
                <div class="form-group">
                <div class="form-group">
                  <label for="name">Nome</label>
                  <input class="form-control" type="text" name="fname" placeholder="João" id="first-name" required>
                </div>
                <div class="form-group">
                  <label for="lastName">Sobrenome</label>
                  <input class="form-control" type="text" name="lname" placeholder="Alexandre Roberto" id="last-name" required>
                </div>
                  <label for="email">Usuário</label>
                  <input class="form-control" type="text" name="uid" placeholder="Remover esse campo" id="uid" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input class="form-control" type="text" name="mail" id="mail" placeholder="E-mail" required>
                </div>
                <div class="form-group">
                  <label for="password">CPF</label>
                  <input class="form-control" type="text" id="cpf" name="cpf" placeholder="Insira o seu CPF" required>
                </div>
                <div class="form-group">
                  <label for="gender">Genero:</label><br>
                  <input type="radio" id="male" name="gender" value="masculino">
                  <label class="mr-2"for="masculino">Masculino</label>
                  <input type="radio" id="female" name="gender" value="feminino">
                  <label class="mr-2" for="feminino">Feminino</label>
                </div>
                <div class="form-group">
                  <label for="nome">Celular</label>
                  <input
                    type="text"
                    class="intem-formulario form-control"
                    name="celular"
                    id="celular"
                    placeholder="Exemplo: (99) 99999-9999"
                    required
                  />
                  <br style="clear: both" />
                </div>
                <div class="form-group">
                  <label for="nome">CEP</label>
                  <input
                    type="text"
                    name="address[0]"
                    id="cep"
                    class="cep item-formulario form-control"
                    placeholder="Insira o seu cep"
                    required
                  />
                  <br style="clear: both" />
                </div>
                <div class="form-group endereco">
                  <label for="nome">Endereço</label>
                  <input
                    type="text"
                    name="address[1]"
                    class="rua item-formulario form-control"
                    id="rua"
                    class="rua"
                    placeholder="Insira o seu endereco"
                  />
                  <br style="clear: both" />
                </div>
                <div class="form-group  endereco">
                  <label for="nome">Número</label>
                  <input type="text" name="address[2]" id="numero" placeholder="Número" class="form-control"/>
                  <br style="clear: both" />
                </div>
                <div class="form-group  endereco">
                  <label for="nome">Complemento</label>
                  <input
                    type="text"
                    name="address[3]"
                    id="complemento"
                    class="complemento form-control"
                    placeholder="Complemento"
                  />
                  <br style="clear: both" />
                </div>
                <div class="form-group  endereco">
                  <label for="nome">Bairro</label>
                  <input
                    type="text"
                    name="address[4]"
                    id="bairro"
                    class="bairro item-formulario form-control"
                    placeholder="Bairro"
                  />
                  <br style="clear: both" />
                </div>
                <div class="form-group  endereco">
                  <label for="nome">Cidade</label>
                  <input
                    type="text"
                    name="address[5]"
                    id="cidade"
                    class="cidade item-formulario form-control"
                    placeholder="Cidade"
                  />
                  <br style="clear: both" />
                </div>
                <div class="form-group endereco">
                  <label for="nome">Estado</label>
                  <input
                    type="text"
                    name="address[6]"
                    id="estado"
                    class="estado item-formulario form-control"
                    placeholder="Estado"
                  />
                  <br style="clear: both" />
                </div>
                <input type="hidden" name="userType" value="user">
                <div class="form-group">
                  <label for="email">Senha</label>
                  <input class="form-control" type="password" name="pwd" id="pwd" onkeyup="passwordValidation(this.value);" placeholder="Password" />
                  <p class="pwd-msg"></p>
                </div>
                <div class="form-group">
                  <label for="password">Repita sua Senha</label>
                  <input class="form-control" type="password" name="pwd-repeat" id="pwd-repeat" onkeyup="passwordRepeatValidation(this.value);" placeholder="Repita a mesma senha" required><p class="pwd-repeat-msg"></p>
                </div>
                
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="signup-submit" id="signup-btn">Cadastrar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto" style="text-align: center;">
        <a class="mt-2 underlineHover" href="#signup" id="hideSingUp">Acessar com uma conta já existente</a>
      </div>
    </div>
  </div>
</section>

<!-- RECOVER PASSWORD -->
<section id="resetPwd" class="d-none resetPwd">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-header">
              <h4>Esqueceu a Senha?</h4>
            </div>
            <div class="card-body">
            <form class="form-signin" action="includes/reset-request.inc.php" method="post">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" required>
              </div>
              <input type="submit" name="reset-request-submit" class="btn btn-primary btn-block" required>
            </form>
            <?php
                if (isset($GET["reset"])) {
                    if ($_GET["reset"] == "success") {
                        echo '<div class="mt-2 col-sm alert alert-info ">Check your e-mail!</div>';
                    }
                }
            ?>
          </div>
          </div>
        </div>
      </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto" style="text-align: center;">
        <a class="mt-2 underlineHover" href="#login" id="hideResetPwd">Voltar</a>
      </div>
    </div>
  </div>
</section>
    
  <script>

    let getUrl = window.location.href;
    let searchStr = getUrl.search("error");
    let invalidEmail = getUrl.search("invaliduid&mail");
    let invalidUsername = getUrl.search("invalidmail&uid");
    let userTaken = getUrl.search("usertaken");
    let wrongPwd = getUrl.search("passwordcheck");
    console.log(searchStr);
    if (searchStr < 0 && invalidEmail < 0) {
      console.log("deu bom");     
    } else if (invalidEmail > 0) {
      console.log("email invalido");      
    } else if (invalidUsername > 0) {
      console.log("usuário invalido");      
    } else if (userTaken > 0) {
      console.log("Já cadastrado");      
    } else if (wrongPwd > 0) {
      console.log("senha não confere");      
    } 

  </script>

<?php
  require "footer.php";
?>
