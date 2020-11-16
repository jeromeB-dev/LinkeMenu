<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
		<a class="navbar-brand" href="<?=base_url()?>">
			<img src="/assets/img/logo_128.png" class="d-inline-block align-top" alt="Logo" loading="lazy">
			LinkedMenu CMS</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
			aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
			<div class="navbar-nav nav-pills nav-fill">
				<?foreach ($nav_items as $name => $link) {
				$login_class = (strstr($link, 'login')) ? 'btn btn-outline-dark bg-secondary':'';
				echo "<a class='nav-link $login_class mx-2 my-auto' href='". base_url($link) . "'>$name</a>";
			}?>
			</div>
		</div>
	</nav>
</header>
