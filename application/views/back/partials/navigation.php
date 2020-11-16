<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="<?=base_url('backoffice')?>">
			<img src="/assets/img/logo-admin_512.png" class="d-inline-block align-top" alt="Logo" loading="lazy">
			LinkedMenu Admin</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAdmin"
			aria-controls="navbarNavAdmin" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarNavAdmin">
			<ul class="navbar-nav ml-auto">

				<li class="nav-item mx-2 dropdown btn-group d-table">
					<a class="btn btn-info px-2" href="<?=base_url('backoffice/establishments')?>" role="button">
						Etablissements
					</a><button class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false"></button>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="<?=base_url('backoffice/establishment_edit')?>">Modifier</a>
						<a class="dropdown-item"
							href="<?=base_url('backoffice/establishment_custom')?>">Personnaliser</a>
						<div class="dropdown-divider mx-2"></div>
						<a class="dropdown-item disabled" href="<?=base_url('backoffice')?>">Ajouter<span
								class="badge badge-warning mx-1 p-1">prochainement</span></a>
					</div>
				</li>

				<li class="nav-item mx-2 dropdown btn-group d-table">
					<a class="btn btn-info px-2" href="<?=base_url('backoffice/categories')?>" role="button">
						Catégories de produits
					</a><button class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false"></button>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="<?=base_url('backoffice/add_category')?>">Ajouter une
							catégorie</a>
						<a class="dropdown-item" href="<?=base_url('backoffice/categories')?>">Voir les catégories</a>
						<div class="dropdown-divider mx-2"></div>
						<a class="dropdown-item disabled" href="<?=base_url('backoffice')?>">Catégories sans
							produit<span class="badge badge-warning mx-1 p-1">prochainement</span></a>
					</div>
				</li>

				<li class="nav-item mx-2 dropdown btn-group d-table">
					<a class="btn btn-info px-2" href="<?=base_url('backoffice/products')?>" role="button">
						Produits
					</a><button class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false"></button>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="<?=base_url('backoffice/add_product')?>">Ajouter un produit</a>
						<a class="dropdown-item" href="<?=base_url('backoffice/products')?>">Voir les produits</a>
						<div class="dropdown-divider mx-2"></div>
						<h6 class="dropdown-header">Titre</h6>
						<a class="dropdown-item disabled" href="<?=base_url('backoffice')?>">Autre<span
								class="badge badge-warning mx-1 p-1">prochainement</span></a>
					</div>
				</li>

				<li class="nav-item mx-2">
					<a class="btn bg-danger text-white logout" href="<?=base_url('backoffice/logout')?>" role="button"
						data-toggle="tooltip" data-placement="left" data-html="true" data-original-title="<span>Vous êtes connecté en tant que : <br>
						<?=$current_user['username']?> <br>(<?=$current_user['user_id']?>)</span>">
						Déconnexion
					</a>
				</li>


				<?//foreach ($nav_items as $name => $link) {
				// $login_class = (strstr($link, 'logout')) ? 'btn bg-danger text-white font-weight-bolder':'';
				// echo "<a class='nav-item $login_class mx-2 my-auto' href='". base_url($link) . "'>$name</a>";
			//}?>

			</ul>
		</div>
	</nav>
</header>
