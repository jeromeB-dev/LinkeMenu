<main class="register">
	<div class=text-center>

		<?php echo form_open(base_url('/home/registration'), 'class="form-register"'); ?>

		<div class="text-center m-4">
			<img src="/assets/img/logo-register_1024-512.png" class="d-inline-block align-top" alt="Logo"
				loading="lazy">
			<h1 class="h4 m-3">Inscription</h1>
			<h2 class="h5 font-weight-normal">Merci d'avoir choisis notre solution !</h2>
			<p class="my-0 text-muted">Pour bénéficier d'une période d'essais de nos offres pendant 15 jours, vous devez
				créer un
				compte.</p>
			<p class="my-0 text-muted">Remplissez le formulaire ci-dessous, il vous suffit de renseigner votre mail et
				un mot de
				passe.</p>
		</div>

		<div class="form-label-group col-8 mx-auto">
			<input type="email" name="userName" class="form-control <?if (form_error('userName')) echo 'is-invalid';?>"
				placeholder="Votre adresse email" autofocus="" value="<?=set_value('userName'); ?>"
				data-toggle="tooltip" data-html="true"
				title="Vous recevrez un <u>lien d'activation</u> à l'adresse e-mail indiquée.">
			<label for="userName">Votre adresse email</label>
			<?php echo form_error('userName', '<div id="userName" class="invalid-feedback">', '</div>');?>
		</div>

		<div class="form-label-group col-8 mx-auto">
			<input type="password" name="inputPassword"
				class="form-control <?if (form_error('inputPassword')) echo 'is-invalid';?>"
				placeholder="Votre mot de passe" value="<?=set_value('inputPassword'); ?>" data-toggle="tooltip"
				data-html="true" title="Merci de saisir entre <b>6</b> et <b>12</b> caractères <b>alpha-numérique</b>">
			<label for="inputPassword">Votre mot de passe</label>
			<?php echo form_error('inputPassword', '<div id="inputPassword is-invalid" class="invalid-feedback">', '</div>');?>
		</div>

		<div class="form-label-group col-8 mx-auto">
			<input type="password" name="passwordConfirm"
				class="form-control <?if (form_error('passwordConfirm')) echo 'is-invalid';?>"
				placeholder="Confirmez votre mot de passe">
			<label for="passwordConfirm">Confirmez votre mot de passe</label>
			<?php echo form_error('passwordConfirm', '<div id="passwordConfirm" class="invalid-feedback">', '</div>');?>
		</div>

		<button class="btn btn-lg btn-info px-5" type="submit" data-toggle="tooltip" data-placement="right"
			data-html="true"
			title="<b>Attention</b> certains logiciels de messagerie ont des politiques anti-spam sévères. N'oubliez pas de vérifier votre dossier <b>spam</b> si vous ne recevez pas le mail de confirmation.">S'inscrire</button>
		</form>
	</div>
	<div class="m-0 p-0 mx-auto col-3 text-center bg-success rounded">
		<a class="text-white" href="<?=base_url('/home/login')?>">Si vous posséder déjà un compte, connectez-vous
			ici.</a>
	</div>
	<div class="container">
		<hr>
	</div>
</main>
