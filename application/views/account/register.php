<?php if ($errors) { ?>
	<div class="alert alert-danger">
		<a class="close" href="">×</a>
		<?php foreach ($errors as $message): echo $message ?><br/>
		<?php endforeach ?>
	</div>
<?php } ?>
  <form method="post" action="">
		
	  <div class="mb-3 row">
		<label for="inputLogin" class="col-sm-3 col-form-label text-right">Login</label>
		<div class="col-sm-9">
		  <input type="text" name="username" class="form-control" id="inputLogin">
		</div>
	  </div>
		
	  <div class="mb-3 row">
		<label for="inputFirstname" class="col-sm-3 col-form-label text-right">Imię</label>
		<div class="col-sm-9">
		  <input type="text" name="firstname" class="form-control" id="inputFirstname">
		</div>
	  </div>

	  <div class="mb-3 row">
		<label for="inputName" class="col-sm-3 col-form-label text-right">Nazwisko</label>
		<div class="col-sm-9">
		  <input type="text" name="name" class="form-control" id="inputName">
		</div>
	  </div>  
	  
	  <div class="mb-3 row">
		<label for="inputSex" class="col-sm-3 col-form-label text-right">Płeć</label>
		<div class="col-sm-9">
		  <select name="sex" class="form-control" id="inputSex">
		  <option value="M">Mężczyzna</option>
		  <option value="F">Kobieta</option>
		  </select>
		</div>
	  </div>
	  
	  <div class="mb-3 row">
		<label for="inputPassword1" class="col-sm-3 col-form-label text-right">Hasło</label>
		<div class="col-sm-9">
		  <input type="password" name="password_1" class="form-control" id="inputPassword1">
		</div>
	  </div>
	  
	  <div class="mb-3 row">
		<label for="inputPassword2" class="col-sm-3 col-form-label text-right">Powtórz hasło</label>
		<div class="col-sm-9">
		  <input type="password" name="password_2" class="form-control" id="inputPassword2">
		</div>
	  </div>
	  
	  <div class="mb-3 row">
		<div class="col-sm-9 offset-md-3">
		  <button type="submit" class="btn btn-primary" name="submit">Zarejestruj</button>
		  <p class="my-2">Masz już konto? <a href="<?php echo URL::base();?>account/login">Zaloguj się</a></p>
		</div>
	  </div>
	
  </form>