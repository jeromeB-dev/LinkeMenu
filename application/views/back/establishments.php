<main class="container-fluid">
	<h1 class="h2">Tableau de bord / <span class="h4">Résumé établissement(s) : </span></h1>
	<div class="accordion" id="establishments">
		<?foreach($establishments as $establishment) {?>

		<div class="card">
			<div class="card-header py-1" id="heading_est_<?=$establishment->id?>" data-toggle="collapse"
				data-target="#est_<?=$establishment->id?>" aria-expanded="true"
				aria-controls="est_<?=$establishment->id?>">
				<h2 class="h3 d-inline-block mb-0">Etablissement :</h2>
				<h3 class="btn-link d-inline-block ml-1 text-decoration-none">
					<?=$establishment->name?>
				</h3>
			</div>

			<div id="est_<?=$establishment->id?>" class="collapse show"
				aria-labelledby="heading_est_<?=$establishment->id?>" data-parent="#establishments">
				<div class="card-body">
					<div class="row d-flex justify-content-around">
						<div class="card col-md-5 px-0">
							<div class="container pt-3">
								<img src="https://via.placeholder.com/600x300.png" class="card-img-top" alt="...">
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-2 h3 text-center ml-3"><i class="fas fa-map-marked-alt"></i></div>
									<div class="col h5 font-weight-normal text-muted p-0">
										<?=$establishment->address?><br>
										<?=$establishment->zip_code?><br>
										<?=$establishment->city?>
									</div>
								</div>
								<div class="row">
									<div class="col-2 h3 text-center ml-3"><i class="fas fa-phone"></i></div>
									<div class="col h5 font-weight-normal text-muted p-0"><?=$establishment->phone?>
									</div>
								</div>
								<div class="row">
									<div class="col-2 h3 text-center ml-3"><i class="fas fa-external-link-alt"></i>
									</div>
									<div class="col h5 font-weight-normal text-muted p-0">
										<a href="<?=$establishment->website?>"
											target="_blank"><?=$establishment->website?></a>
									</div>
								</div>
							</div>
							<div class="list-group list-group-flush">
								<div class="card-body">
									<div class="row">
										<div class="col-2 h3 text-center ml-3"><i class="fab fa-facebook-f"></i></div>
										<div class="col h5 font-weight-normal text-muted p-0">
											<a href="<?=$establishment->facebook?>"
												target="_blank"><?=$establishment->facebook?></a>
										</div>
									</div>
									<div class="row">
										<div class="col-2 h3 text-center ml-3"><i class="fab fa-twitter"></i></div>
										<div class="col h5 font-weight-normal text-muted p-0">
											<a href="<?=$establishment->twitter?>"
												target="_blank"><?=$establishment->twitter?></a>
										</div>
									</div>
									<div class="row">
										<div class="col-2 h3 text-center ml-3"><i class="fab fa-instagram"></i></div>
										<div class="col h5 font-weight-normal text-muted p-0">
											<a href="<?=$establishment->instagram?>"
												target="_blank"><?=$establishment->instagram?></a>
										</div>
									</div>
									<div class="text-center mt-3">
										<a href="<?=base_url("backoffice/establishment_edit/$establishment->id#address_$establishment->id")?>"
											class="btn btn-info">Modifier les informations de contact</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card col-md-5 px-0">
							<div class="card-header py-1">
								<h5 class="text-center my-2">Profil de l'établissement</h5>
							</div>
							<div class="card-body">
								<div class="row mb-3">
									<div class="col-2 h3 text-center ml-3"><i class="fas fa-store"></i></div>
									<div class="col h3 p-0">
										<?=$establishment->name?>
										<a class="d-block h6 font-italic text-success"
											href="<?=base_url("backoffice/establishment_edit/$establishment->id#name_$establishment->id")?>">Modifier
											le nom de
											l'établissement</a>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-2 h2 text-center ml-3"><i class="fas fa-mobile-alt"></i></div>
									<div class="col h5 p-0">
										Accès à votre carte
										<p class="h6 font-weight-normal">
											Votre carte est accessible à l'adresse suivante :<br>
											<a href="<?=base_url($establishment->url)?>"
												target="_blank"><?=base_url($establishment->url)?></a>
										</p>
										<a class="d-block h6 font-italic text-success"
											href="<?=base_url("backoffice/establishment_edit/$establishment->id#url_$establishment->id")?>">Modifier
											l'adresse d'accès à la carte</a>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-2 h2 text-center ml-3"><i class="fas fa-clipboard-list"></i></div>
									<div class="col h5 p-0">
										Catégories de produits
										<p class="h6 font-weight-normal">
											La carte de cet établissement contient <span
												class=" h5 text-info"><?=$categories?></span> catégorie(s)
										</p>
										<a class="d-block h6 font-italic text-success"
											href="<?=base_url('backoffice/add_category')?>">Ajouter une nouvelle
											catégorie</a>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-2 h2 text-center ml-3"><i class="fas fa-fish"></i></div>
									<div class="col h5 p-0">
										Produits
										<p class="h6 font-weight-normal">
											La carte de cet établissement contient <span
												class=" h5 text-info">0</span> produit(s)
										</p>
										<a class="d-block h6 font-italic text-success"
											href="<?=base_url('backoffice/add_product')?>">Ajouter un nouveau
											produit</a>
									</div>
								</div>
							</div>
							<div class="list-group list-group-flush">
								<div class="card-body">
									<div class="row alert alert-info">
										<div class="col-2 h3 text-center ml-3"><i class="fas fa-exclamation"></i>
										</div>
										<div class="col h5 p-0">
											Mode maintenance<span
												class="badge badge-warning mx-1 p-1">prochainement</span>
											<div class="custom-control custom-switch">
												<input type="checkbox" class="custom-control-input" id="sw_maintenance"
													<?=$establishment->maintenance?> disabled>
												<label class="custom-control-label" for="sw_maintenance">Off</label>
											</div>
											<input type="range" class="form-control-range" min="0" max="1"
												id="formControlRange" style="width:30px"
												value="<?=$establishment->maintenance?>" disabled>
											<p class="h6 font-weight-normal">
												En activant le mode maintenance, votre carte ne sera pas accessible par
												vos clients. Vous pouvez utiliser ce mode le temps de créer ou de mettre
												à jour votre carte.
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?}?>
	</div>
</main>
