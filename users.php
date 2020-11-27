<?php
  require "header.php"; 
  require "includes/session-validation.inc.php";
  include_once ('nav.php');

  if ($_SESSION['userType'] == "admin") {


?>

<!-- HEADER -->
<header id="main-header" class="py-2 bg-warning text-white">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1><i class="fas fa-users"></i> Users</h1>
      </div>
    </div>
  </div>
</header>

<!-- SEARCH -->
<section id="search" class="py-4 mb-4 bg-light">
  <div class="container">
    <div class="row">
    <div class="col-md-3">
        <a href="index.php" class="btn btn-light btn-block">
          <i class="fas fa-arrow-left"></i> De volta para tarefas
        </a>
      </div>
    <div class="col-md-3">
        <a href="#" class="btn btn-warning btn-block text-white" data-toggle="modal" data-target="#addUserModal">
          <i class="fas fa-plus"></i> Adicionar Usuários
        </a>
      </div>
      <!-- <div class="col-md-6 ml-auto">
        <div class="input-group">
        <input type="text" class="form-control" placeholder="Procurar Usuário...">
          <div class="input-group-append">
          <button class="btn btn-warning">Procurar...</button>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</section>

<!-- USERS -->
<section id="users">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4>Lista de Usuários</h4>
          </div>
          <div class="scrollmenu">
          <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
            <th>#</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Credencial</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            require "includes/dbh.inc.php";            
            
            $userId = $_SESSION['userId'];
            
            
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);
            if ($result = $conn->query($sql)) {
              while ($row = $result->fetch_assoc()) {
                $userId    = $row['idUsers'];
                $userUid = $row['uidUsers'];
                $userEmail = $row['emailUsers'];
                $userType = $row['userType'];
                $userFName = $row['fnameUsers'];       
                $userLName = $row['lnameUsers'];       
                $userGender = $row['genderUsers'];       
                $userCellPhone = $row['celularUsers'];
                
                $addressArr = unserialize($row['addressUsers'])[0];
                
                $userStreet = $addressArr[1];
                $userStNumber = $addressArr[2];                       
                $userStComp = $addressArr[3];                       
                $userStCep = $addressArr[0];                       
                
                include "modals.php";
                ?>
                      <tr>
                      
                        <td><?php echo $userId; ?></td>
                        <td><?php echo $userUid; ?></td>
                        <td><?php echo $userEmail; ?></td>
                        <td><?php echo $userType; ?></td>

                        

                        <td>
                          <?php 
                            if ($userType == "user") {
                          ?>
                          <a class='btn-sm btn-dark ml-3 user-to-admin' href='#' data-promote="<?php echo $userId; ?>" role='button' >
                            <i class='fas fa-user-tie'></i>
                          </a>
                          <?php
                            }                          
                          ?>
                          <a class='btn btn-secondary ml-3' data-toggle='collapse' href='#user-details-<?php echo $userId; ?>' role='button' >
                            <i class='fas fa-angle-double-right'></i>Mais..
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="5">
                          <div class='collapse' id='user-details-<?php echo $userId; ?>'>
                              <div class='card card-body text-align-left'> 
                              <span class="text-left pb-1"><strong>Nome:</strong> <?php echo $userFName." ".$userLName; ?></span>
                              <span class="text-left pb-1"><strong>Gênero:</strong> <?php echo $userGender; ?></span>
                              <span class="text-left pb-1"><strong>Celular: </strong><span class="celular"><?php echo $userCellPhone; ?></span></span>      
                              <span class="text-left pb-2"><strong>Endereço:</strong> <?php echo $userStreet.", ".$userStNumber.", ".$userStComp." - ";?><span class="cep"><?php echo $userStCep;?></span></span>
                              <?php 
                                if ($userType == "user") {
                              ?>
                              <button type="button" name="id" class="btn-md btn-block btn-danger text-align-right userDeleteBtn " data-id="<?php echo $userId ?>" style="height:35px; border-radius: 3px;" >Remover usuário</button>
                              <?php
                                }                          
                              ?>
                            </div>
                          </div>
                        </td>
                      </tr>
                      
            <?php
              }
              $result->free();
            }            
            ?>            
          </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ADD USER MODAL-->
<div class="modal fade" id="addUserModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title">Adicionar Usuário</h5>
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <section id="singUp" class="singUp">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mx-auto">
          <div class="card">

            <form class="form" id="signup-form" action="includes/signup.inc.php" method="post">
              <div class="card-body">
                <div class="form-group">
                <div class="form-group">
                  <input type="hidden" name="from-users-page">
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
                  <input class="form-control cpf" type="text" id="cpf" name="cpf" placeholder="Insira o seu CPF" required>
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
                    class="celular intem-formulario form-control"
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
                <div class="form-group endereco">
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
                <div class="form-group endereco">
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
                <div class="form-group">
                  <label for="nome">Credencial</label>
                  <select name="userType" class="custom-select mb-2">
                    <option value="user">Usuário</option>
                    <option value="admin">Administrador</option>
                  </select> 
                </div>
                <div class="form-group">
                  <label for="email">Senha</label>
                  <input class="form-control" type="password" name="pwd" id="pwd" onkeyup="passwordValidation(this.value);" placeholder="Password" />
                  <p class="pwd-msg"></p>
                </div>
                <div class="form-group">
                  <label for="password">Repita sua Senha</label>
                  <input class="form-control" type="password" name="pwd-repeat" id="pwd-repeat" onkeyup="passwordRepeatValidation(this.value);" placeholder="Repita a mesma senha" required>
                  <p class="pwd-repeat-msg"></p>
                </div>
              </div>
              <div class="row card-footer">
                <button class="btn btn-lg btn-primary col-md-7 mr-2" type="submit" name="signup-submit" id="signup-btn">Cadastrar</button>
                </form>
                <button class="btn btn-danger text-white col-md-4" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
          </div>
        </div>
      </div>
  </div>
</section>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- FOOTER -->
<?php
  } else {
    header("Location: index.php?unauthorized-credential");
    exit();
  }

  require 'footer.php';
?>