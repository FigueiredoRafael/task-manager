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
<div class="alerts-position">
  <?php 
    require "includes/update-msgs.inc.php";
  ?>
</div>



<!-- ACTIONS -->
<section id="actions" class="py-4 mb-4 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addTaskModal">
          <i class="fas fa-plus"></i> Adicionar Tarefa
        </a>
      </div>
      <div id="search" class="col-md-6 ml-auto">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Procurar tarefas...">
            <div class="input-group-append">
              <button class="btn btn-primary">Procurar</button>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- User Tasks -->
<?php 

include "tasks.php";


include "modals.php";
?>

<div class="container">
  <div class="row">
  <div id="user-cards" class="col-md-12 mt-2 mb-2">
        <div class="card">
          <div class="card-header">
            <h4>Usuários</h4>
          </div>
          <div class="user-scrollmenu">

          <div>
            <div class="col" class="user-icons" style="float:left; margin-top:20px; max-height:100px; margin-left:10px; width: 1000px;">
              <div style="width: 100%; display: table-cell;"> 
              <span style="float:left;">
                    <a href="index.php" class="btn">
                      <img src="<?php echo $_SESSION['profileImg']?>" class="rounded-circle user-image-circle active-circle" alt="Cinque Terre"><br><?php echo $_SESSION['userFname']?>
                    </a>
              </span>              
                <?php

              require "includes/dbh.inc.php";
              $sql = "SELECT * FROM users";
              $result = mysqli_query($conn, $sql); 
              while ($row = mysqli_fetch_assoc($result)){              
              if (($key = array_search($_SESSION['userId'], $row)) !== false) {
                unset($row[$key]);
              } else {  
              $userId = $row['idUsers'];
              $sqlimg = "SELECT img_dir FROM profileimg WHERE id='$userId'";
              $resultimg = mysqli_query($conn, $sqlimg);
              $rowimg = mysqli_fetch_assoc($resultimg);
              ?>
                      <span style="float:left;">
                            <a a class="btn" href="index.php?other-userId=<?php echo $userId;?>"><img src="<?php echo $rowimg['img_dir']; ?>" class="rounded-circle user-image-circle <?php if (isset($_GET['other-userId']) && $userId == $_GET['other-userId']) { echo "active-circle";} ?> " style="border-radius: 100px; height: 200px; width: 200px" alt="Cinque Terre" ><br><?php echo $row['fnameUsers']; ?>
                            </a>
                      </span>
              <?php                      
                  }
              }
              ?>
              
            </div>
          </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

      <?php 
            require "includes/dbh.inc.php";            
            
            $userId = $_SESSION['userId'];
            $totalUsers     = 0;
            $totalTasks     = 0;
            $totalTasksConc = 0;            
            
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);
            if ($result = $conn->query($sql)) {
              while ($row = $result->fetch_assoc()) {
                $totalUsers++;
              }
            }

            $sqlTasks = "SELECT * FROM tasks WHERE tasks_resp='$userId' AND tasks_stat !='Concluido'";
            $resultTasks = mysqli_query($conn, $sqlTasks);
            if ($resultTasks = $conn->query($sqlTasks)) {
              while ($row = $resultTasks->fetch_assoc()) {
                $totalTasks++;
              }
            }

            $sqlTasksConc = "SELECT * FROM tasks WHERE tasks_resp='$userId' AND tasks_stat ='Concluido'";
            $resultTasks = mysqli_query($conn, $sqlTasksConc);
            if ($resultTasks = $conn->query($sqlTasksConc)) {
              while ($row = $resultTasks->fetch_assoc()) {
                $totalTasksConc++;
              }
            }


      ?>
      
      <div class="container">
      <div class="row">
        <div id="tasks-card" class="col-md-12 text user-cards">
          <div class="card text-center bg-primary text-white float-right user-cards">
            <div class="card-body">
            <h4 class=" float-left text-center ml-2" >
                  <i class="fas fa-pencil-alt"></i> <?php echo $totalTasks ?> 
                </h4>
                <h4 class="float-left ml-2">Tarefas</h4>
                <a href="#tarefas" class="btn btn-outline-light btn-md float-right ml-4 sm-btn">Visualizar </a>
            </div>
          </div>

          <div class="card text-center bg-success text-white float-right user-cards">
            <div class="card-body">
            <h4 class=" float-left text-center ml-2 mt-1">
                <i class="fas fa-users"></i> <?php echo $totalTasksConc ?>
              </h4>
              <h4 class="float-left ml-2">Conclúidas</h4>
              <a href="posts.php" class="btn btn-outline-light btn-md float-right sm-btn">Visualizar </a>
            </div>
          </div>

          <?php
          if ($_SESSION['userType'] == "admin" ) {

          ?>  

          <div class="card text-center bg-warning text-white float-left user-cards">
            <div class="card-body">
            <h4 class=" float-left text-center ml-2 mt-1">
                <i class="fas fa-users"></i> <?php echo $totalUsers ?>
              </h4>
              <h4 class="float-left ml-2">Usuários</h4>
              <a href="users.php" class="btn btn-outline-light btn-md float-right sm-btn">Visualizar </a>
            </div>
          </div>

          <?php
          }
          ?>
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