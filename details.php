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
        <h1>Post One</h1>
      </div>
    </div>
  </div>
</header>

<!-- ACTIONS -->
<section id="actions" class="py-4 mb-4 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <a href="index.php" class="btn btn-light btn-block">
          <i class="fas fa-arrow-left"></i> Back To Dashboard
        </a>
      </div>
      <div class="col-md-3">
        <a href="index.php" class="btn btn-success btn-block">
          <i class="fas fa-check"></i> Save Changes
        </a>
      </div>
      <div class="col-md-3">
        <a href="index.php" class="btn btn-danger btn-block text-white">
          <i class="fas fa-trash"></i> Delete
        </a>
      </div>
    </div>
  </div>
</section>

<!-- DETAILS -->
<section id="details">
  <div class="container">
    <div class="row">
      <div class="card">
        <div class="card-header">
          <h4>Edit Post</h4>
        </div>
        <div class="card-body">
          <form>
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" value="Post One">
            </div>
            <div class="form-group">
              <label for="category"></label>
              <select class="form-control">
                <option value="" selected>Web Development</option>
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
              <textarea name="editor1" class="form-control">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis dolore quidem aperiam maxime neque perferendis ullam eius ab, rem cupiditate nulla doloribus itaque quibusdam, ad soluta officiis reprehenderit nisi debitis eveniet tempore ducimus molestias. Consequatur iusto, deserunt iure perferendis sed necessitatibus minima maiores. Aliquid doloremque et nemo quia commodi repellat?</textarea>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer id="main-footer" class="bg-dark text-white mt-5 p-5">
  <div class="container">
    <div class="row">
      <div class="col">
        <p class="lead text-center">
          copyright &copy; <span id="year"></span> Blogen
        </p>
      </div>
    </div>
  </div>
</footer>

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