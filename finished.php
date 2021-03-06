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
        <h1><i class="fas fa-pencil-alt"></i>Tarefas Concluídas</h1>
      </div>
    </div>
  </div>
</header>
<div class="alerts-position">
  <?php 
    require "includes/update-msgs.inc.php";
  ?>
</div>

<!-- SEARCH -->
<section id="search" class="py-4 mb-4 bg-light">
  <div class="container">
    <div class="row">
    <div class="col-md-3">
        <a href="index.php?index-page=true" class="btn btn-light btn-block" data-toggle="tooltip" title="Voltar para tabela de tarefas">
          <i class="fas fa-arrow-left"></i> De volta para tarefas
        </a>
      </div>
      <div class="col-md-3" >
        <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addTaskModal" data-toggle="tooltip" href="#" title="Adicione a sua Tarefa." >
          <i class="fas fa-plus"></i> Adicionar Tarefa
        </a>
      </div>
    </div>
  </div>
</section>

<!-- POSTS -->
<section id="posts">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4>Tarefas Concluídas</h4>
          </div>
          <div class="scrollmenu">

          <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Tarefa</th>
              <th>Responsável</th>
              <th>Data de Conclusão</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            require "includes/dbh.inc.php";
            
            
            $userId = $_SESSION['userId'];

            
            
            $sql = "SELECT * FROM tasks WHERE tasks_resp='$userId'";
            $result = mysqli_query($conn, $sql);
            if ($result = $conn->query($sql)) {
              while ($row = $result->fetch_assoc()) {
                $taskStat = $row['tasks_stat'];

                if ($taskStat == "Concluido"){

                
                $taskId    = $row['taskId'];
                
                $time = time();
                $currentDay = date("Y-m-d", $time);
                $date = $row['tasks_concl'];
                
                 if( $taskStat != "Concluido") {                  
                  if ($date < $currentDay) {
                    $sqlStat = "SELECT tasks_concl FROM tasks WHERE taskId='$taskId'";
                    $resultStat = mysqli_query($conn, $sqlStat);
                      if (mysqli_num_rows($resultStat) > 0) {
                              $taskStat = "Atrasado";
                              $sqlStat = "UPDATE tasks SET tasks_stat='$taskStat' WHERE taskId='$taskId'";
                      }
                  } else if ($taskStat == "Em Progresso" && ($date == $currentDay || $date > $currentDay)) {
                    $taskStat = "Em Progresso";
                  } else if ($date == $currentDay || $date > $currentDay || $taskStat != "Em Progresso") {
                    $sqlStat = "SELECT tasks_concl FROM tasks WHERE taskId='$taskId'";
                    $resultStat = mysqli_query($conn, $sqlStat);
                      if (mysqli_num_rows($resultStat) > 0) {
                              $taskStat = "Aberto";
                              $sqlStat = "UPDATE tasks SET tasks_stat='$taskStat' WHERE taskId='$taskId'";
                      }
                  }
                } else if ($taskStat == "Concluido") {
                  $taskStat = "Concluido";
                }
                
                $taskTitle = $row['tasks_title'];
                $taskResp  = $_SESSION['userFname'];
                $date      = $row['tasks_concl'];
                $taskConcl = date("d/m/Y", strtotime($date));
                $taskDescr = $row['tasks_descr'];
                if ($taskStat == "Aberto") {
                  $statColor = "warning";
                } else if ($taskStat == "Em Progresso") {
                  $statColor = "primary";
                } else if ($taskStat == "Atrasado") {
                  $statColor = "danger";
                } else if ($taskStat == "Concluido") {
                  $statColor = "success";
                }
              
                 ?>
                      <tr>
                      
                        <td><?php echo $taskId; ?></td>
                        <td><?php echo $taskTitle; ?></td>
                        <td><?php echo $taskResp; ?></td>
                        <td><?php echo $taskConcl; ?></td>
                        <td><?php if ($taskStat == "Concluido") { $taskStat = "Concluído"; } 
                         echo "<p class='text text-".$statColor."'>".$taskStat."</p>";?></td>
                        <td>                         
                            <i class="far fa-check-square text-success h3" data-toggle="tooltip" title="Tarefa concluída"></i>
                          <a class='btn-sm btn-secondary ml-3' data-toggle='collapse' href='#task-details-<?php echo $taskId; ?>' role='button' data-toggle="tooltip" title="Ver descrição da tarefa">
                            <i class='fas fa-angle-double-right'></i>Mais..
                          </a>
                          <a class='btn-sm btn-danger ml-3 delete-task' data-submit="task_delete_submit" data-id="<?php echo $taskId; ?>" href="#" role='button' data-toggle="tooltip" title="Deletar Tarefa">
                            <i class="far fa-trash-alt"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="5">
                          <div class='collapse' id='task-details-<?php echo $taskId; ?>'>
                              <div class='card card-body text-align-left'> <p class="h6 text-left"> Descrição:</p><p class="text-left"><?php echo $taskDescr; ?></p></div>
                          </div>
                        </td>
                      </tr>
                      
            <?php
                }
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

<?php
  include 'modals.php';
  require 'footer.php';
?>