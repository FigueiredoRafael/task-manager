<?php
  require "includes/session-validation.inc.php";
  include "includes/profileImg.inc.php";
?>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
  <div class="container">
    <a href="index.php" class="navbar-brand">Blogen</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav">
        <li class="nav-item px-2 active">
          <a href="index.php" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item px-2">
          <a href="posts.php" class="nav-link ">Tarefas</a>
        </li>
        <li class="nav-item px-2">
          <a href="users.php" class="nav-link ">Users</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown mr-3">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <i class="fas fa-user"></i> Olá <?php echo $_SESSION['userFname'];?> 
          </a>
          <div class="dropdown-menu">
            <a href="profile.php" class="dropdown-item"><i class="fas fa-user-circle"></i> Perfil
            </a>
            <a href="settings.php" class="dropdown-item"><i class="fas fa-cog"></i> Configurações
            </a>
          </div>
        </li>
        <li class="nav-item">
          <form action="includes/logout.inc.php" method="post">
                <button class="btn btn-dark" type="submit" name="logout-submit"><i class="fas fa-user-times"> Logout</i></button>
            </form>
        </li>
      </ul>
    </div>
  </div>
</nav>