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
	<label for="inputPassword1" class="col-sm-3 col-form-label text-right">Hasło</label>
	<div class="col-sm-9">
	  <input type="password" name="password" class="form-control" id="inputPassword1">
	</div>
  </div>
  
  <div class="mb-3 row">
	<div class="col-sm-9 offset-md-3">
	  <button type="submit" class="btn btn-primary" name="login_user">ZALOGUJ SIĘ</button>
	  <p class="mt-3">Nie masz konta? <a href="<?php echo URL::base();?>account/register">Zarejestruj się</a></p>
	</div>
  </div>

</form>