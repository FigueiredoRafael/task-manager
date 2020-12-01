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
        <h1><?php echo "Editor de Tarefas"; ?></h1>
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
        <a href="index.php?index-page=true" class="btn btn-light btn-block">
          <i class="fas fa-arrow-left"></i> De volta para tarefas
        </a>
      </div>
      <div class="col-md-3">
      <form action="includes/task-processor.inc.php" method="post">
        <button type="submit" name="task_update_submit" class="btn btn-success btn-block">
          <i class="fas fa-check"></i> Salvar Mudanças
        </button>
      </div>  
      </div>
    </div>
  </div>
</section>

<!-- DETAILS -->
<section id="details">
  <div class="container">
    <div class="row ">
      <div class="col-md-12 pl-5 pr-5">
      <div class="card">
        <div class="card-header">
          <h4>Atualizar Tarefa</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
              <label for="title" class="text text-dark">Título</label>
              <input type="text" name="task-title" class="form-control" value="<?php echo $_GET['taskTitle']?>">
              <input type="hidden" name="task-id" class="form-control" value="<?php echo $_GET['taskId']; ?>">
            </div>
            <div class="form-group">
              <label for="task-responsible">Responsável:</label>
              <select class="form-control" type="text" name="userId">
                <option value="<?php echo $_SESSION['userId'];?>"><?php echo $_SESSION['userFname']. " ". $_SESSION['userLname']; ?></option>
                <?php
                require "includes/dbh.inc.php";
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);
                if ($result = $conn->query($sql)) {
                  while ($row = $result->fetch_assoc()) {
                    $userId    = $row['idUsers'];
                    $userFname = $row['fnameUsers'];
                    $userLname = $row['lnameUsers'];

                ?>
                  <option value="<?php echo $userId;?>">
                  <?php echo $userFname ." ". $userLname; ?>
                </option>
                <?php
                  }
                }    
                ?>
              </select>
            </div>
              <label for="conclusion-date" class="text text-dark">Data de Conclusão: </label>
              <?php 
              $date = $_GET['taskConcl'];
              $newDate = str_replace('/', '-', $date);
              ?>
              <br>
              <input type="date" class="form-control col-4" name="conclusion-date" value="<?php echo date('Y-m-d', strtotime($newDate)); ?>">
              <br>
              <label for="task-status" class="text text-dark">Status:</label>
              <span class="text text-<?php echo $_GET['statColor'] ?>">
              <?php $taskStat = $_GET['taskStat']; echo $taskStat; ?>
              </span>
              <br>
              <br>
            <div class="form-group">
              <label for="task-description" class="text text-dark">Descrição</label>
              <textarea name="task-description" class="form-control"><?php echo $_GET['taskDescr'] ?></textarea>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>

<!-- MODALS -->

<!-- ADD POST MODAL-->
<div class="modal fade" id="addPostModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Add Post</h5>
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="category"></label>
            <select class="form-control">
              <option value="">Web Development</option>
              <option value="">Tech Gadgets</option>
              <option value="">Business</option>
              <option value="">Health & Wellness</option>
            </select>
          </div>
          <div class="form-group">
            <label for="image">Upload Image</label>
            <div class="custom-file">
              <input type="text" class="custom-file-input" id="image">
              <label for="image" class="custom-file-label">Chose File</label>
            </div>
            <small class="form-text text-muted">Max size 3mb</small>
          </div>
          <div class="form-group">
            <label for="body">Body</label>
            <textarea name="editor1" class="form-control"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- ADD CATEGORY MODAL-->
<div class="modal fade" id="addCategoryModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title">Add Category</h5>
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- ADD USER MODAL-->
<div class="modal fade" id="addUserModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title">Add User</h5>
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="title">Name</label>
            <input type="text" class="form-control">
          </div>
        </form>
        <form>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control">
          </div>
        </form>
        <form>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control">
          </div>
        </form>
        <form>
          <div class="form-group">
            <label for="password">Confirm Password</label>
            <input type="password" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-warning text-white" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>


<?php
  require 'footer.php';
?>  