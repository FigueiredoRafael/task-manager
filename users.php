<?php
  require "header.php"; 
  require "includes/session-validation.inc.php";
  include_once ('nav.php');
?>

<!-- HEADER -->
<header id="main-header" class="py-2 bg-warning text-white">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1><i class="fas fa-users"></i> Users</h1>
      </div>
    </div>
  </div>
</header>

<!-- SEARCH -->
<section id="search" class="py-4 mb-4 bg-light">
  <div class="container">
    <div class="row">
    <div class="col-md-3">
        <a href="#" class="btn btn-warning btn-block text-white" data-toggle="modal" data-target="#addUserModal">
          <i class="fas fa-plus"></i> Add User
        </a>
      </div>
      <div class="col-md-6 ml-auto">
        <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Users...">
          <div class="input-group-append">
          <button class="btn btn-warning">Search</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- USERS -->
<section id="users">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4>Lista de Funcionários</h4>
          </div>
          <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Credencial</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>John Doe</td>
              <td>jdoe@gmail.com</td>
              <td>Administrador </td>
              <td>
                <a href="details.php" class="btn btn-secondary">
                  <i class="fas fa-angle-double-right"></i> Details
                </a>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Harry White</td>
              <td>Harry@gmail.com</td>
              <td>Usuário </td>
              <td>
                <a href="details.php" class="btn btn-secondary">
                  <i class="fas fa-angle-double-right"></i> Details
                </a>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>Mary Johnson</td>
              <td>MaryJ.com</td>
              <td>Usuário </td>
              <td>
                <a href="details.php" class="btn btn-secondary">
                  <i class="fas fa-angle-double-right"></i> Details
                </a>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>Rafael Figueiredo</td>
              <td>Rafa@gmail.com</td>
              <td>Administrador </td>
              <td>
                <a href="details.php" class="btn btn-secondary">
                  <i class="fas fa-angle-double-right"></i> Details
                </a>
              </td>
            </tr>
          </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

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

<!-- FOOTER -->
<?php
  require 'footer.php';
?>