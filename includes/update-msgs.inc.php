<?php 

// PROFILE UPDATE MESSAGES

  if (isset($_GET['msgElement'])) {

  $arrayElem = $_GET['msgElement'];

  class Msgs {
    function __construct($par1, $par2){
      $this->color = $par1;
      $this->text = $par2;
    }
    /* Member variables */
    var $alertColor;
    var $text;
    
    /* Member functions */
    function setColor($val){
       $this->color = $val;
    }
    
    function getColor(){
       echo $this->color;
    }
    
    function setText($val){
       $this->text = $val;
    }
    
    function getText(){
       echo $this->text;
    }
 }
 $messages = array(
    "wrongPwd" => new Msgs ("alert-danger", 'A Senha está <strong>errada</strong>.<br><a class="mt-2 mr-2 underlineHover" href="#reset-password" id="showResetPwd">Esqueceu a senha?</a>'),

    "pwdNotSame" => new Msgs ("alert-danger", "A Senha <strong>não confere</strong>."),
    
    "pwdUpdateSuccess" => new Msgs ("alert-success", "A Senha <strong>foi alterada</strong> com sucesso!"),

    "imgInvalidFormat" => new Msgs ("alert-danger", "O formato da imagem é <strong>inválido</strong>. formatos permitidos são: JPG, JPEG, e PNG"),

    "fileTooBig" => new Msgs ("alert-danger", "Arquivo é muito <strong>grande</strong>. Tamanho permitido somente até <strong>1 Mb</strong>."),

    "uploadImgError" => new Msgs ("alert-danger", "Houve um <strong>erro no Upload</strong>."),
    
    "insertImgSuccess" => new Msgs ("alert-success", "<strong>Upload de imagem</strong> feito com sucesso!"),

    "uploadImgSuccess" => new Msgs ("alert-success", "<strong>Upload de imagem</strong> feito com sucesso!"),

    "emptyNameField" => new Msgs ("alert-danger", "<strong>Campos de Nome</strong> estão vazios!"),

    "emptyCelField" => new Msgs ("alert-danger", "<strong>Campo de Contato</strong> está vazio!"),

    "emptyAddressFields" => new Msgs ("alert-danger", "<strong>Campo de Endereço</strong> está vazio!"),

    "profileUpdateSuccess" => new Msgs ("alert-success", "<strong>Atualização de Perfil</strong> feita com sucesso!"),
    
    "loginFail" => new Msgs ("alert-danger", "<strong>Usuário ou senha</strong> está incorreto."),
  
    "loginSuccess" => new Msgs ("alert-success", "<strong>Login</strong> feito com sucesso!"),
    
    "emptyfields" => new Msgs ("alert-danger", "campos estão vazios!"),
    
    "invalidEmailnUid" => new Msgs ("alert-danger", "e-mail e usuário inválidos!"),
    
    "invalidEmail" => new Msgs ("alert-danger", "e-mail inválido!"),
    
    "invalidUid" => new Msgs ("alert-danger", "Username inválido!"),
    
    "weakPwd" => new Msgs ("alert-danger", "Senha está fraca"),
    
    "userTaken" => new Msgs ("alert-danger", "Este usuário já existe no sistema."),
    
    "signupSuccess" => new Msgs ("alert-success", "Cadastro realizado com sucesso!")
);



       
    ?>
      <div class=" alerts-position  alert <?php
       echo $messages[$arrayElem]->getColor();
       ?> alert-dismissible fade show" role="alert" style="display: inline-block; height: auto;">
        <?php echo $messages[$arrayElem]->getText();?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <?php
  }
?>