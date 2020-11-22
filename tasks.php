<!-- POSTS -->
<section id="posts">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4>Minhas Tarefas</h4>
          </div>
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

                if ($taskStat != "Concluido"){

                
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
                
                include "modals.php";
                 ?>
                      <tr>
                      
                        <td><?php echo $taskId; ?></td>
                        <td><?php echo $taskTitle; ?></td>
                        <td><?php echo $taskResp; ?></td>
                        <td><?php echo $taskConcl; ?></td>
                        <td><?php if ($taskStat == "Concluido") { $taskStat = "Concluído"; } 
                         echo "<p class='text text-".$statColor."'>".$taskStat."</p>";?></td>
                        <td>                       
                          <?php 
                          
                            if ($taskStat == "Concluído") {

                              ?> 
                               <i class="far fa-check-square text-success h3"></i>
                              
                              <?php 
                            } else {
                          ?>
                              <a href='task-edit.php?taskId=<?php echo $taskId; ?>&taskTitle=<?php echo $taskTitle; ?>&taskResp=<?php echo $taskResp; ?>&taskConcl=<?php echo $taskConcl; ?>&taskDescr=<?php echo $taskDescr; ?>&statColor=<?php echo $statColor ?>&taskStat=<?php echo $taskStat ?>' class='btn-sm btn-secondary'>
                              <i class="fas fa-edit"></i> Editar
                          <?php 
                            }
                          ?>
                          <a class='btn-sm btn-secondary ml-3' data-toggle='collapse' href='#task-details-<?php echo $taskId; ?>' role='button' >
                            <i class='fas fa-angle-double-right'></i>Mais..
                          </a>
                          <a class='btn-sm btn-danger ml-3 delete-task' data-submit="task_delete_submit" data-id="<?php echo $taskId; ?>" href="#" role='button' >
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

          <br>
          <br>
          <?php

            if (isset($_GET['other-userId'])) {
              $userId = $_GET['other-userId'];
            

          ?>

          <!-- TAREFAS VINCULADAS -->
          <div class="card-header">
            <h4>Tarefas de <?php 
            $sql = "SELECT fnameUsers FROM users WHERE idUsers='$userId'";
            $return = mysqli_query($conn, $sql);
            if (mysqli_num_rows($return) > 0) {
              $row = mysqli_fetch_assoc($return);
              $userFname = $row['fnameUsers'];
              echo $userFname;
            }
            
            ?></h4>
          </div>
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
               
            $sql = "SELECT * FROM tasks WHERE tasks_resp='$userId'";
            $result = mysqli_query($conn, $sql);
            if ($result = $conn->query($sql)) {
              while ($row = $result->fetch_assoc()) {
                $taskId    = $row['taskId'];
                $taskStat = $row['tasks_stat'];
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
                $taskResp  = $userFname;
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
                
                include "modals.php";
                 ?>
                      <tr>
                      
                        <td><?php echo $taskId; ?></td>
                        <td><?php echo $taskTitle; ?></td>
                        <td><?php echo $taskResp; ?></td>
                        <td><?php echo $taskConcl; ?></td>
                        <td><?php if ($taskStat == "Concluido") { $taskStat = "Concluído"; } 
                         echo "<p class='text text-".$statColor."'>".$taskStat."</p>";?></td>
                        <td>                       
                          <?php 
                          
                            if ($taskStat == "Concluído") {

                              ?> 
                               <i class="far fa-check-square text-success h3"></i>
                              
                              <?php 
                            }
                          ?>
                          <a class='btn btn-secondary ml-3' data-toggle='collapse' href='#task-details-<?php echo $taskId; ?>' role='button' >
                            <i class='fas fa-angle-double-right'></i>Mais..
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
              $result->free();
            }
            
            ?>
            
          </tbody>
          </table>

          <?php
          }
          ?>

        </div>
      </div>
    </div>
  </div>
</section>
