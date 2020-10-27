<form action="upload.php" method="post" enctype="multipart/form-data">
        <img id="profile-image" src="<?php echo $_SESSION['profileImg']; ?>" alt="" class="d-block img-fluid">        
        <input class="form-control d-none" type="text" name="userId" value="<?php echo $_SESSION['userId'];?>" >
          <div id="upload-photo-div" class="mb-2">
              <input type="file" id="real-file" accept="image/*" class="inputfile" name="avatarpic" hidden="hidden">
                <button src="#" class="btn" id="upload-photo" type="button" data-toggle="modal" data-target="#addImageModal">
                  <i class="fas fa-folder-plus"></i> 
                </button>
          </div>
        <button type="button" class="btn btn-danger btn-block image-preview__remove-Image">Remover imagem</button>

        <input type="submit" class="btn btn-primary btn-block btn-file" name="image">


							<label for="upload_image">
								<img src="upload/user.jpg" id="uploaded_image" class="img-responsive img-circle" />
								<div class="overlay">
								<i class="fas fa-folder-plus"></i>
								</div>
								<input accept="image/*" class="inputfile" name="avatarpic" type="file"  class="image" id="upload_image" style="display:none" />
							</label>

    		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			  	<div class="modal-dialog modal-lg" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title">Corte a foto antes de enviar</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">×</span>
			        		</button>
			      		</div>
			      		<div class="modal-body">
			        		<div class="img-container">
			            		<div class="row">
			                		<div class="col-md-8">
			                    		<img src="" id="sample_image" />
			                		</div>
			                		<div class="col-md-4">
			                    		<div class="preview"></div>
			                		</div>
			            		</div>
			        		</div>
			      		</div>
			      		<div class="modal-footer">
									<button type="button" id="crop" class="btn btn-primary">Enviar</button>
									<input class="form-control d-none" type="text" name="userId" value="<?php echo $_SESSION['userId'];?>" >
									<input type="submit" class="btn btn-primary btn-block btn-file" name="image">
			        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								</div>
								</form>
			  	</div>
			</div>			
		</div>