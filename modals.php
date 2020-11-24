<!-- MODALS -->

<?php

require "includes/dbh.inc.php";



?>

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
            <input type="date" name="conclusion-date" class="form-control">
            </input>
          </div>
          <div class="form-group">
            <label for="task-description">Descrição</label>
            <textarea name="task-description" class="form-control"></textarea>
          </div>
          <input class="form-control d-none" type="text" name="userId" value="<?php echo $_SESSION['userId'];?>" >
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit" name="task-submit">Salvar Tarefa</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- ADD CATEGORIES MODAL-->
<div class="modal fade" id="addCategoryModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title">Adicionar Tarefa</h5>
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="title">Titulo</label>
            <input type="text" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" data-dismiss="modal">Salvar Categoria</button>
      </div>
    </div>
  </div>
</div>


<!-- UPDATE TASK MODAL-->
<div class="modal fade" id="updateTaskModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Editar Tarefa</h5>
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="includes/task-processor.inc.php" method="post">
          <div class="form-group">
            <label for="title">Título</label>
            <?php
              // if(isset($_POST['update-task-submit'])
            ?>
            <input type="text" name="task-title" class="form-control" value="<?php echo $taskTitle; ?>">
            <input type="hidden" name="task-id" class="form-control" value="<?php echo $taskId; ?>">
          </div>
          <div class="form-group">
            <label for="conclusion-date">Data de Conclusão</label>
            <input type="date" name="conclusion-date" class="form-control"  value="<?php echo $taskConcl; ?>">
            </input>
          </div>
          <div class="form-group">
            <label for="task-description">Descrição</label>
            <textarea name="task-description" class="form-control"><?php echo $taskDescr; ?></textarea>
          </div>
          <input class="form-control d-none" type="text" name="userId" value="<?php echo $_SESSION['userId'];?>" >
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit" name="task-update-submit">Atualizar Tarefa</button>
      </div>
      </form>
    </div>
  </div>
</div>

