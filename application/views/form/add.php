<?php if ($errors) { ?>
	<div class="alert alert-danger">
		<a class="close" href="">×</a>
		<?php foreach ($errors as $message): echo $message ?><br/>
		<?php endforeach ?>
	</div>
<?php } ?>
  <form method="post" action="" enctype="multipart/form-data">
  
  	  <div class="mb-3 row">
		<label for="inputType" class="col-sm-4 col-form-label text-right">Rodzaj urlopu</label>
		<div class="col-sm-8">
		  <select name="type" class="form-control" id="inputType">
		  <option value="1">urlop zwykły</option>
		  <option value="2">urlop na żądanie</option>
		  <option value="3">urlop bezpłatny</option>
		  </select>
		</div>
	  </div>
		
	  <div class="mb-3 row">
		<label for="inputStart" class="col-sm-4 col-form-label text-right">Data rozpoczęcia urlopu</label>
		<div class="col-sm-8">
		  <input type="date" name="start_vacation" class="form-control" id="inputStart">
		</div>
	  </div>
		
	  <div class="mb-3 row">
		<label for="inputEnd" class="col-sm-4 col-form-label text-right">Data zakończenia urlopu</label>
		<div class="col-sm-8">
		  <input type="date" name="end_vacation" class="form-control" id="inputEnd">
		</div>
	  </div>
	  
	  <div class="mb-3 row">
		<label for="file" class="col-sm-4 col-form-label text-right">Załącz plik (format JPG lub PDF)</label>
		<div class="col-sm-8">
		  <input type="file" name="file" class="form-control" id="file">
		</div>
	  </div>
	  
	  <div class="mb-3 row">
		<label for="inputPassword2" class="col-sm-4 col-form-label text-right">Komentarz</label>
		<div class="col-sm-8">
		  <textarea name="comment" class="form-control" id="inputComment"></textarea>
		</div>
	  </div>
	  
	  <div class="mb-3 row">
		<div class="col-sm-9 offset-md-3">
		  <button type="submit" class="btn btn-primary" name="submit">Wyślij wniosek</button>
		</div>
	  </div>
	
  </form>