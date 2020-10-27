<?php
  require "header.php"; 
  require "includes/session-validation.inc.php";
  include_once ('nav.php');
?>

<!-- HEADER -->
<header id="main-header" class="py-2 bg-primary text-white">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1><i class="fas fa-cog"></i> Dashboard</h1>
      </div>
    </div>
  </div>
</header>

<?php 
  $url = "HTTP://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  $loginSuccess    = '<div class="col-3 alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Login</strong> feito com sucesso!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
   if (strpos($url, "login=success") == true) {
     echo $loginSuccess;
   } 
?>


<!-- ACTIONS -->
<section id="actions" class="py-4 mb-4 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addPostModal">
          <i class="fas fa-plus"></i> Adicionar Tarefa
        </a>
      </div>
      <div class="col-md-3">
        <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#addCategoryModal">
          <i class="fas fa-plus"></i> Adicionar Categoria
        </a>
      </div>
    </div>
  </div>
</section>

<!-- User Tasks -->
<?php 

include "weekTasks.php";


include "modals.php";
?>

<div class="container">
  <div class="row">
  <div id="user-cards" class="col-md-12 mt-2 mb-2">
        <div class="card">
          <div class="card-header">
            <h4>Usuários</h4>
          </div>
          <div class="row">
          <div class="card-body col-md-1 mr-2">
              <span><button class="btn"><img src="<?php echo $_SESSION['profileImg']?>" class="rounded-circle user-image-circle active-circle" alt="Cinque Terre"><br><?php echo $_SESSION['userFname']?></button></span>
          </div>
          <?php

              require "includes/dbh.inc.php";
              $sql = "SELECT * FROM users";
              $result = mysqli_query($conn, $sql);
              // $row = mysqli_fetch_assoc($result);
                
              while ($row = mysqli_fetch_assoc($result)){
              
              if (($key = array_search($_SESSION['userId'], $row)) !== false) {
                unset($row[$key]);
              } else {  
              $userId = $row['idUsers'];
              $sqlimg = "SELECT img_dir FROM profileimg WHERE id='$userId'";
              $resultimg = mysqli_query($conn, $sqlimg);
              $rowimg = mysqli_fetch_assoc($resultimg);

              echo '<div class="card-body col-md-1 mr-2">
                      <span><button class="btn"><img src="'.$rowimg['img_dir'].'" class="rounded-circle user-image-circle " alt="Cinque Terre" ><br>'.$row['fnameUsers'].'</button></span>
                    </div>';
                    }
              }
            
          ?>
            
            
            <!-- <div class="card-body col-md-1 mr-2">
              <span><button class="btn"><img src="img/users-imgs/marcelo.png" class="rounded-circle user-image-circle" alt="Cinque Terre"><br>Marcelo</button></span>
            </div>
            <div class="card-body col-md-1 mr-2">
              <span><button class="btn"><img src="img/users-imgs/bruno.png" class="rounded-circle user-image-circle" alt="Cinque Terre"><br>Bruno</button></span>
            </div>
            <div class="card-body col-md-1 mr-2">
              <span><button class="btn"><img src="img/users-imgs/jhon.png" class="rounded-circle user-image-circle" alt="Cinque Terre"><br>Jhonatan</button></span>
            </div>
            <div class="card-body col-md-1 mr-2">
              <span><button class="btn"><img src="img/users-imgs/anderson.png" class="rounded-circle user-image-circle" alt="Cinque Terre"><br>Anderson</button></span>
            </div> -->
          </div>
        </div>
      </div>

      <div id="tasks-card" class="col-md-12 text user-cards">
        <div class="card text-center bg-primary text-white float-right user-cards">
          <div class="card-body">
          <h4 class=" float-left text-center ml-2">
                <i class="fas fa-pencil-alt"></i> 6 
              </h4>
              <h4 class="float-left ml-2">Tarefas</h4>
              <a href="posts.php" class="btn btn-outline-light btn-md float-right ml-4 sm-btn">View </a>
          </div>
        </div>

        <div class="card text-center bg-success text-white float-right user-cards">
          <div class="card-body">
          <h4 class=" float-left text-center ml-2">
              <i class="fas fa-folder mt-1"></i> 4
            </h4>
            <h4 class="float-left ml-2">Categorias</h4>
            <a href="categories.php" class="btn btn-outline-light btn-md float-right sm-btn">View </a>
          </div>
        </div>

        <div class="card text-center bg-warning text-white float-right user-cards">
          <div class="card-body">
          <h4 class=" float-left text-center ml-2 mt-1">
              <i class="fas fa-users"></i> 4
            </h4>
            <h4 class="float-left ml-2">Usuários</h4>
            <a href="users.php" class="btn btn-outline-light btn-md float-right sm-btn">View </a>
          </div>
        </div>

      </div>
</div>
  </div>


<!-- FOOTER -->
<footer>
<?php
  require 'footer.php';
?>
</footer>