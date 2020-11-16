<main id="establishments_edit" class="container-fluid">
	<h1 class="h2">Tableau de bord / <span class="h4">Modification établissement(s) : </span></h1>
	<?foreach($establishments as $establishment) {?>
	<div class="accordion mb-2" id="establishments_<?=$establishment->id?>">
		<div class="card">
			<div class="card-header py-1" id="heading_est_<?=$establishment->id?>" role="group" data-toggle="collapse"
				data-target="#est_<?=$establishment->id?>" aria-expanded="true"
				aria-controls="est_<?=$establishment->id?>">
				<h2 class="h3 d-inline-block mb-0">Etablissement :</h2>
				<h3 class="btn-link d-inline-block ml-1 text-decoration-none">
					<?=$establishment->name?>
				</h3>
			</div>

			<div id="est_<?=$establishment->id?>" class="collapse show"
				aria-labelledby="heading_est_<?=$establishment->id?>"
				data-parent="#establishments_<?=$establishment->id?>">
				<div class="card-body">
					<?php echo form_open(base_url("/backoffice/establishment_edit"), "class='form-edit' id='post_est_$establishment->id'"); ?>
					<input type="hidden" name="establishment_id"
						value="<?=set_value('establishment_id', $establishment->id); ?>" readonly>
					<!-- 1st part : name + link START-->
					<div class="form-row">
						<!-- col A : name -->
						<div class="col-md-6 pr-5">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="fas fa-store"></i>
									</span>
								</div>
								<div class="form-label-group col m-0 px-0">
									<input type="text" name="name" id="name_<?=$establishment->id?>"
										class="form-control <?if (form_error('name')) echo 'is-invalid';?>"
										placeholder="Nom de votre établissement"
										value="<?=set_value('name', $establishment->name); ?>">
									<label class="text-muted" for="name_<?=$establishment->id?>">Nom de votre
										établissement</label>
									<?php echo form_error('name', '<div class="invalid-feedback">', '</div>');?>
								</div>
							</div>
						</div>
						<!-- col B : link -->
						<div class="col-md-6 custom-tt pr-5">
							<div class="custom-tt-text">
								<p class="h6">Un lien à votre image</p>
								<p class="p-0 m-0">
									Personnalisez l'adresse où vos clients pourrons trouver votre carte.
								</p>
								<p class="p-0 m-0">Par exemple : <a href="<?=base_url('monresto')?>"
										target="_blank"><?=base_url('monresto')?></a></p>
							</div>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text h2">
										<i class="fas fa-mobile-alt"></i>
										<span><?=str_replace('http://', '', base_url())?></span>
									</span>
								</div>
								<div class="form-label-group col m-0 px-0">
									<input type="text" name="url" id="url_<?=$establishment->id?>"
										class="form-control <?if (form_error('url')) echo 'is-invalid';?>"
										placeholder="Adresse personnalisée pour votre carte"
										value="<?=set_value('url', $establishment->url); ?>">
									<label class="text-muted" for="url_<?=$establishment->id?>">Adresse personnalisée
										pour votre
										carte</label>
									<?php echo form_error('url', '<div class="invalid-feedback">', '</div>');?>
								</div>
							</div>
							<small class="form-text text-muted">
								De 1 à 64 caratères alpha-numériques. Les tirets - et _ sont
								acceptés.
							</small>
						</div>
						<!-- 1st part name + link END-->
					</div>
					<hr>
					<!-- 2nd part address START-->
					<div class="form-row">
						<!-- row 1 : street -->
						<div class="col-md-6 pr-5">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="fas fa-road"></i>
									</span>
								</div>
								<div class="form-label-group col m-0 px-0">
									<input type="text" name="address" id="address_<?=$establishment->id?>"
										class="form-control <?if (form_error('address')) echo 'is-invalid';?>"
										placeholder="Numéro et libellé de la voie"
										value="<?=set_value('address', $establishment->address); ?>">
									<label class="text-muted" for="address_<?=$establishment->id?>">Numéro et libellé de
										la voie</label>
									<?php echo form_error('address', '<div class="invalid-feedback">', '</div>');?>
								</div>
							</div>
						</div>
					</div>
					<!-- row 2 : zipcode -->
					<div class="form-row">
						<div class="col-md-4 pr-5">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text h2">
										<i class="fas fa-map-marked-alt"></i>
									</span>
								</div>
								<div class="form-label-group col m-0 px-0">
									<input type="text" name="zip_code" id="zip_code_<?=$establishment->id?>"
										class="form-control <?if (form_error('zip_code')) echo 'is-invalid';?>"
										placeholder="Code postal"
										value="<?=set_value('zip_code', $establishment->zip_code); ?>">
									<label class="text-muted" for="zip_code_<?=$establishment->id?>">Code postal</label>
									<?php echo form_error('zip_code', '<div class="invalid-feedback">', '</div>');?>
								</div>
							</div>
						</div>
					</div>
					<!-- row 3 : city -->
					<div class="form-row">
						<div class="col-md-4 pr-5">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text h2">
										<i class="fas fa-city"></i>
									</span>
								</div>
								<div class="form-label-group col m-0 px-0">
									<input type="text" name="city" id="city_<?=$establishment->id?>"
										class="form-control <?if (form_error('city')) echo 'is-invalid';?>"
										placeholder="Ville" value="<?=set_value('city', $establishment->city); ?>">
									<label class="text-muted" for="city_<?=$establishment->id?>">Ville</label>
									<?php echo form_error('city', '<div class="invalid-feedback">', '</div>');?>
								</div>
							</div>
						</div>
						<!-- 2nd part address END-->
					</div>
					<hr>
					<!-- 3rd part phone + website START-->
					<div class="form-row">
						<!-- col A : phone -->
						<div class="col-md-6 pr-5">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="fas fa-phone"></i>
									</span>
								</div>
								<div class="form-label-group col m-0 px-0">
									<input type="tel" name="phone" id="phone_<?=$establishment->id?>"
										class="form-control <?if (form_error('phone')) echo 'is-invalid';?>"
										placeholder="Numéro de téléphone"
										value="<?=set_value('phone', $establishment->phone); ?>">
									<label class="text-muted" for="phone_<?=$establishment->id?>">Numéro de
										téléphone</label>
									<?php echo form_error('phone', '<div class="invalid-feedback">', '</div>');?>
								</div>
							</div>
							<small class="form-text text-muted">
								Ex : 0102030405 <b>ou</b> 01.02.03.04.05 <b>ou</b> 01-02-03-04-05 <b>ou</b> 01 02 03 04
								05 <b>ou</b> +33 1 02 03 04 05 <b>etc...</b>
							</small>
						</div>
						<!-- col B : website -->
						<div class="col-md-6 pr-5">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text h2">
										<i class="fas fa-external-link-alt"></i>
									</span>
								</div>
								<div class="form-label-group col m-0 px-0">
									<input type="url" name="website" id="website_<?=$establishment->id?>"
										class="form-control <?if (form_error('website')) echo 'is-invalid';?>"
										placeholder="Site web de votre établissement"
										value="<?=set_value('website', $establishment->website); ?>">
									<label class="text-muted" for="website_<?=$establishment->id?>">Site web de votre
										établissement</label>
									<?php echo form_error('website', '<div class="invalid-feedback">', '</div>');?>
								</div>
							</div>
						</div>
						<!-- 3rd part phone + website END-->
					</div>
					<div class="form-row mt-4">
						<div class="col-9 d-flex justify-content-between mx-auto">
							<!-- name="post_est_<?//=$establishment->id?>" -->
							<button type="submit" class="btn btn-group btn-success">Enregister les
								modifications</button>
							<button type="button" class="btn btn-group btn-danger" data-toggle="tooltip"
								data-placement="top" data-html="true"
								title="<b>Attention</b> cette action est irréversible.<br>Vous <b>ne pourrez pas </b> récupérer cet établissement après suppression"
								disabled>
								<div class="badge badge-warning mx-1 p-1" style="align-self:center">prochainement</div>
								Supprimer l'établissement
							</button>
						</div>
					</div>
					<?php echo form_close()?>
				</div>
			</div>
		</div>
	</div>
	<?}?>
</main>
