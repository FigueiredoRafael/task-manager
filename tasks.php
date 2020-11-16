<!-- SEARCH -->

<section id="search" class="py-4 mb-4 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-6 ml-auto">
        <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Posts...">
          <div class="input-group-append">
          <button class="btn btn-primary">Search</button>
          </div>
        </div>
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
            <h4>Latest Posts</h4>
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
                $taskId    = $row['taskId'];
                $taskTitle = $row['tasks_title'];
                $taskResp  = $_SESSION['userFname'];
                $taskConcl = $row['tasks_concl'];
                $taskDescr = $row['tasks_descr'];
                $taskStat = $row['tasks_stat'];
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
                        <td><?php echo "<p class='text text-".$statColor."'>".$taskStat."</p>";?></td>
                        <td>                       
                           
                          <a href='task-edit.php?taskId=<?php echo $taskId; ?>&taskTitle=<?php echo $taskTitle; ?>&taskResp=<?php echo $taskResp; ?>&taskConcl=<?php echo $taskConcl; ?>&taskDescr=<?php echo $taskDescr; ?>' class='btn btn-secondary'>
                          <i class="fas fa-edit"></i> Editar 
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

          <!-- PAGINATION -->
          <nav class="ml-4">
            <ul class="pagination">
              <li class="page-item disabled">
                <a href="#" class="page-link">Previous</a>
              </li>
              <li class="page-item active">
                <a href="#" class="page-link">1</a>
              </li>
              <li class="page-item">
                <a href="#" class="page-link">2</a>
              </li>
              <li class="page-item">
                <a href="#" class="page-link">3</a>
              </li>
              <li class="page-item">
                <a href="#" class="page-link">Next</a>
              </li>
            </ul>
          </nav>

        </div>
      </div>
    </div>
  </div>
</section>
