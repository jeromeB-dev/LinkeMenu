<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap part -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
		integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
	<!-- Bootstrap part end -->
</head>

<body>
	<main class="container">
		<div class="navbar navbar-expand-lg navbar-dark bg-secondary">
			<h1 class="navbar-brand">Bienvenue chez <a class="navbar-brand" href="<?=base_url()?>">LinkedMenu</a>
			</h1>
		</div>
		<section class="jumbotron jumbotron-fluid mb-0 py-4">
			<div class="container">
				<h2 class="display-4">Merci pour votre inscription</h2>
				<p class="lead">Pour finaliser votre inscription, vous devez valider votre adresse mail.</p>
				<p>Pour se faire, il vous suffit de cliquer sur le lien suivant :
					<a href='<?=$activation_link?>' target='_blank'>Activer mon compte.</a>
				</p>
				<p>Si vous ne voyez pas le lien ci-dessus vous pouvez copier-coller celui-ci après dans votre barre
					d'adresse : </p>
				<p><?=$activation_link?></p>
				<div class="pt-4">
					<em>Toute l'équipe de LinkedMenu vous remercie.</em>
				</div>
			</div>
		</section>
	</main>
</body>

</html>
