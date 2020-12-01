<!-- MODALS -->

<!-- ADD TASK MODAL-->
<div class="modal fade" id="addTaskModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Adicionar Tarefa</h5>
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="includes/task-processor.inc.php" method="post">
          <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="task-title" class="form-control">
          </div>
          <div class="form-group">
            <label for="Data de Conclusão">Data de Conclusão</label>
            <input type="date" name="conclusion-date" class="form-control" value="<?php echo date('Y-m-d', time());?>">
            </input>
          </div>
          <div class="form-group">
            <label for="task-description">Descrição</label>
            <textarea name="task-description" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="task-responsible">Responsável:</label>
            <select class="form-control" type="text" name="userId">
              <option value="">------Selecione o Responsável------</option>
            <?php
            require "includes/dbh.inc.php";
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);
            if ($result = $conn->query($sql)) {
              while ($row = $result->fetch_assoc()) {
                $id        = $row['idUsers'];
                $fname     = $row['fnameUsers'];
                $lname     = $row['lnameUsers'];

            ?>
              <option value="<?php echo $id;?>">
              <?php echo $fname ." ". $lname; ?>
            </option>
            <?php
            
              }
            }  
            ?>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit" name="task-submit">Salvar Tarefa</button>
      </div>
      </form>
    </div>
  </div>
</div>

