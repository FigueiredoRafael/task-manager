<?php
  require "includes/session-validation.inc.php";
  include "includes/profileImg.inc.php";
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0">
  <div class="container">
    <a href="index.php" class="navbar-brand">Gerenciador de Tarefas</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav">
        <li class="nav-item px-2 active">
          <a href="index.php" class="nav-link" data-toggle="tooltip" title="Ver tarefas em andamento">Tabela de Tarefas</a>
        </li>
        <li class="nav-item px-2">
          <a href="posts.php" class="nav-link" data-toggle="tooltip" title="Ver tarefas concluídas">Concluídos</a>
        </li>
        <?php
          if($_SESSION['userType'] == "admin") {
        ?>
        <li class="nav-item px-2">
          <a href="users.php" class="nav-link" data-toggle="tooltip" title="Ver tabela de usuários">Usuários</a>
        </li>
        <?php
          }
        ?>
      </ul>


      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown mr-3">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <i class="fas fa-user"></i> Olá <?php echo $_SESSION['userFname'];?> 
          </a>
          <div class="dropdown-menu">
            <a href="profile.php" class="dropdown-item"><i class="fas fa-user-circle" data-toggle="tooltip" title="Ver perfil"></i> Perfil
            </a>
            <a href="settings.php" class="dropdown-item"><i class="fas fa-cog" data-toggle="tooltip" title="Configurações da conta"></i> Configurações
            </a>
          </div>
        </li>
        <li class="nav-item">
          <form action="includes/logout.inc.php" method="post">
                <button class="btn btn-dark" type="submit" name="logout-submit" data-toggle="tooltip" title="Fazer logout sua conta"><i class="fas fa-user-times"> Logout</i></button>
            </form>
        </li>
      </ul>
    </div>
  </div>
</nav>