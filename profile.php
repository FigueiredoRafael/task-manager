<?php
  require "header.php"; 
  require "includes/session-validation.inc.php";
  require "includes/update-profile.inc.php";
  require "includes/dbh.inc.php";
  include_once "nav.php";


  include "includes/profileImg.inc.php";

?>

<!-- HEADER -->
<header id="main-header" class="py-2 bg-primary text-white">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1><i class="fas fa-cog"></i> Editar Perfil</h1>
      </div>
    </div>
  </div>
</header>

<?php 
  include "includes/update-msgs.inc.php";
?>

<!-- ACTIONS -->
<section id="actions" class="py-4 mb-4 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <a href="index.php" class="btn btn-light btn-block">
          <i class="fas fa-arrow-left"></i> Voltar para o Dashboard
        </a>
      </div>
      <div class="col-md-3">
        
        <a href="" class="btn btn-success btn-block" data-toggle="modal" data-target="#changePasswordModal">
          <i class="fas fa-lock"></i> Mudar Senha
        </a>
      </div>
    </div>
  </div>
</section>

<!-- PROFILE -->
<section id="profile">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">
            <h4>Editar Perfil</h4>
          </div>
            <div class="card-body">
            <div class="card-body">
              <form class="form" id="signup-form" action="includes/update-profile.inc.php" method="post">
                <div class="form-group">
                  <label for="name">Nome</label>
                  <input class="form-control" type="text" name="fname" placeholder="João" id="name" required value="<?php echo $_SESSION['userFname'];?>">
                </div>
                <div class="form-group">
                  <label for="lastName">Sobrenome</label>
                  <input class="form-control" type="text" name="lname" placeholder="Alexandre Roberto" id="lastName" required value="<?php echo $_SESSION['userLname']?>" >
                </div>

                <input class="form-control d-none" type="text" name="userId" value="<?php echo $_SESSION['userId'];?>" >

                <div class="form-group">
                  <label for="email">Email</label>
                  <input class="form-control" type="text" name="mail" id="mail" placeholder="E-mail" disabled required value="<?php echo $_SESSION['userEmail']?>">
                </div>
                <div class="form-group">
                  <label for="nome">Celular</label>
                  <input
                    type="text"
                    class="intem-formulario form-control"
                    name="celular"
                    id="celular"
                    placeholder="Exemplo: (31) 98331-6822"
                    value="<?php echo $_SESSION['userCelular']?>"
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
                    value="<?php echo $_SESSION['userCep']?>"
                    required
                  />
                  <br style="clear: both" />
                </div>
                <div class="form-group ">
                  <label for="nome">Endereço</label>
                  <input
                    type="text"
                    name="address[1]"
                    class="rua item-formulario form-control"
                    id="rua"
                    class="rua"
                    value="<?php echo $_SESSION['userStreet']?>"
                    placeholder="Insira o seu "

                  />
                  <br style="clear: both" />
                </div>
                <div class="form-group  ">
                  <label for="nome">Número</label>
                  <input type="text" name="address[2]" id="numero" placeholder="Número" class="form-control" value="<?php echo $_SESSION['userNumber']?>"/>
                  <br style="clear: both" />
                </div>
                <div class="form-group  ">
                  <label for="nome">Complemento</label>
                  <input
                    type="text"
                    name="address[3]"
                    id="complemento"
                    class="complemento form-control"
                    placeholder="Complemento"
                    value="<?php echo $_SESSION['userCompl']?>"
                  />
                  <br style="clear: both" />
                </div>
                <div class="form-group  ">
                  <label for="nome">Bairro</label>
                  <input
                    type="text"
                    name="address[4]"
                    id="bairro"
                    class="bairro item-formulario form-control"
                    placeholder="Bairro"
                    value="<?php echo $_SESSION['userNeighb']?>"
                  />
                  <br style="clear: both" />
                </div>
                <div class="form-group  ">
                  <label for="nome">Cidade</label>
                  <input
                    type="text"
                    name="address[5]"
                    id="cidade"
                    class="cidade item-formulario form-control"
                    placeholder="Cidade"
                    value="<?php echo $_SESSION['userCity']?>"
                  />
                  <br style="clear: both" />
                </div>
                <div class="form-group  ">
                  <label for="nome">Estado</label>
                  <input
                    type="text"
                    name="address[6]"
                    id="estado"
                    class="estado item-formulario form-control"
                    placeholder="Estado"
                    value="<?php echo $_SESSION['userState']?>"
                  />
                  <br style="clear: both" />
                </div>
                
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="update-submit" id="signup-btn">Salvar Alterações</button>
              </form>
            </div>
            </div>
        </div>
      </div>
      <div class="col-md-3">
      <form action="includes/update-profile.inc.php" method="post" enctype="multipart/form-data">
        <img id="profile-image" src="<?php echo $_SESSION['profileImg']; ?>" alt="" class="d-block img-fluid">        
        <input class="form-control d-none" type="text" name="userId" value="<?php echo $_SESSION['userId'];?>" >
          <div id="upload-photo-div" class="mb-2">
              <input type="file" id="real-file" accept="image/*" class="inputfile" name="avatarpic" hidden="hidden">
                <button src="#" class="btn" id="upload-photo" type="button" data-toggle="modal" data-target="#addImageModal">
                  <i class="fas fa-folder-plus"></i> 
                </button>
          </div>
        <button type="button" class="btn btn-danger btn-block image-preview__remove-Image">Remover imagem</button>
      </div>
    </div>
  </div>
</section>

<!-- MODALS -->

<!-- ADD IMAGE MODAL-->
<div class="modal fade" id="addImageModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Adicionar Imagem</h5>
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span id="custom-upload-text" class="mb-5 ml-2 text-muted">Nenhuma foto selecionada</span>
        <div class="image-preview" id="imagePreview">
          <img src="" alt="Image Preview" class="image-preview__image">
          <span class="image-preview__default-text">Image Preview</span>
        </div>
      </div>
      <div class="modal-footer">
          <input type="submit" class="btn btn-primary btn-block btn-file" name="avatarpic-submit">
        </form>
      </div>
    </div>
  </div>
</div>

<!-- CHANGE PASSWORD MODAL-->
<div class="modal fade" id="changePasswordModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title">Mudar Senha</h5>
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="includes/update-profile.inc.php" method="post">
          <input class="form-control d-none" type="text" name="userId" value="<?php echo $_SESSION['userId'];?>" >
          <div class="form-group">
            <label for="title">Senha Atual</label>
            <input type="password" name="currentPwd" class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Nova Senha</label>
            <input type="password" name="newPwd" class="form-control" onkeyup="passwordValidation(this.value);">
            <p class="pwd-msg"></p>
          </div>
          <div class="form-group">
            <label for="password">Repita a nova Senha</label>
            <input type="password" name="newPwd-repeat" class="form-control" onkeyup="passwordRepeatValidation(this.value);">
            <p class="pwd-repeat-msg"></p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success text-white" type="submit" name="newpwd-submit">Salvar Alteração</button>
          </div>
        </form>
    </div>
    </div>
  </div>
</div>



<?php
  require 'footer.php';
?>