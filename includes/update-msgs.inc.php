<?php 

// PROFILE UPDATE MESSAGES

  $url = "HTTP://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  $wrongPwd             = ' <div class=" alerts-position col-3 alert alert-danger alert-dismissible fade show" role="alert">
                              A Senha está <strong>incorreta</strong>.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>';
  $weakPwd              = ' <div class="alerts-position col-2 alert alert-danger alert-dismissible fade show" role="alert">
                              A Senha está <strong>fraca</strong>.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>';
  $pwdNotSame           = ' <div class=" alerts-position col-2 alert alert-danger alert-dismissible fade show" role="alert">
                              A Senha <strong>não confere</strong>.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>';
  $pwdSuccess           = ' <div class="alerts col-3 alert alert-success alert-dismissible fade show" role="alert">
                              <strong>Troca de senha</strong> feita com sucesso!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>';
   
  $imgInvalidFormat     = ' <div class="alerts-position col-3 alert alert-danger alert-dismissible fade show" role="alert">
                              Formato de imagem <strong>inválido</strong>.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>';
  $fileTooBig           = ' <div class="alerts-position col-6 alert alert-danger alert-dismissible fade show" role="alert">
                              Arquivo é muito <strong>grande</strong>. Tamanho permitido somente até <strong>1 Mb</strong>.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>';
  $uploadImgError       = ' <div class="alerts-position col-3 alert alert-danger alert-dismissible fade show" role="alert">
                              Houve um <strong>erro no Upload</strong>.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>';
  $uploadImgSuccess     = ' <div class="alerts-position col-3 alert alert-success alert-dismissible fade show" role="alert">
                              <strong>Upload de imagem</strong> feito com sucesso!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>';
  $emptyNameFields      = ' <div class="alerts-position col-3 alert alert-danger alert-dismissible fade show" role="alert">
                              <strong>Campos de Nome</strong> estão vazios!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>';
  $emptyCelField       = ' <div class="alerts-position col-3 alert alert-danger alert-dismissible fade show" role="alert">
                              <strong>Campo de Contato</strong> está vazio!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>';
  $emptyAddressFields    = ' <div class="alerts-position col-3 alert alert-danger alert-dismissible fade show" role="alert">
                              <strong>Campo de Endereço</strong> está vazio!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>';
  $profileUpdateSuccess = '<div class="alerts-position col-3 alert alert-success alert-dismissible fade show" role="alert">
                              <strong>Atualização de Perfil</strong> feita com sucesso!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                           </div>';
   if (strpos($url, "error=wrongpwd") == true) {
     echo $wrongPwd;
   } else if (strpos($url, "error=weakpwd") == true) {
     echo $weakPwd;
   } else if (strpos($url, "error=pwd-not-same") == true) {
     echo $pwdNotSame;
   } else if (strpos($url, "pwd-update=success") == true) {
     echo $pwdSuccess;
   } else if (strpos($url, "profileimg=invalid-format") == true) {
    echo $imgInvalidFormat;
  } else if (strpos($url, "profileimg=big-file") == true) {
    echo $fileTooBig;
  } else if (strpos($url, "profileimg-update=error") == true) {
    echo $uploadImgError;
  } else if (strpos($url, "profileimg-insert=success") == true || strpos($url, "profileimg-update=success") == true ) {
    echo $uploadImgSuccess;
  } else if (strpos($url, "update-profile=empty-name-fields") == true) {
    echo $emptyNameFields;
  } else if (strpos($url, "update-profile=empty-cel-field") == true) {
    echo $emptyCelField;
  } else if (strpos($url, "update-profile=empty-address-fields") == true) {
    echo $emptyAddressFields;
  } else if (strpos($url, "update-profile=success") == true) {
    echo $profileUpdateSuccess;
  }
?>