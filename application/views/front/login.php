<main class="login">
	<div class=text-center>

		<?php echo form_open(base_url('/home/login'), 'class="form-signin"'); ?>

		<div class="text-center m-4">
			<img src="/assets/img/logo-admin_512.png" class="d-inline-block align-top" alt="Logo" loading="lazy">
			<h1 class="h3 m-3 font-weight-normal">Accés Backoffice</h1>
			<p>Connectez-vous pour accéder à votre portail d'administration.</p>
		</div>

		<div class="form-label-group">
			<input type="email" name="userName" class="form-control" placeholder="Adresse email" autofocus=""
				value="<?=set_value('userName'); ?>">
			<label for="userName">Adresse email</label>
			<?php echo form_error('userName'); ?>
		</div>

		<div class="form-label-group">
			<input type="password" name="inputPassword" class="form-control" placeholder="Mot de passe">
			<label for="inputPassword">Mot de passe</label>
			<?php echo form_error('inputPassword'); ?>
		</div>

		<button class="btn btn-lg btn-secondary px-5" type="submit">Se connecter</button>
		</form>
	</div>
	<div class="m-0 p-0 mx-auto col-3 text-center bg-success rounded">
		<a class="text-white" href="<?=base_url('/home/registration')?>">Vous ne posséder pas de compte ? créez-en un
			ici.</a>
	</div>
	<div class="container">
		<hr>
	</div>
</main>
