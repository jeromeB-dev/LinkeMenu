<main id="add_category" class="container-fluid">
	<h1 class="h2">Tableau de bord / <span class="h4">Ajouter une catégorie</span></h1>
	<?foreach($categories as $category) {?>
	<div class="0accordion mb-2" id="category_<?=$category->id?>">
		<div class="card">
			<div class="card-header py-1">
				<h2 class="h3 d-inline-block mb-0">Catégorie :</h2>
				<h3 class="btn-link d-inline-block ml-1 text-decoration-none">
					<?=$category->name?>
				</h3>
			</div>

			<div id="cat_<?=$category->id?>">
				<div class="card-body">
					<?php echo form_open(base_url("/backoffice/add_category"), "class='form-edit' id='post_cat_$category->id'"); ?>
					<input type="hidden" name="categrory_id" value="<?=set_value('categrory_id', $category->id); ?>"
						readonly>
					<!-- 1st part : name + description START-->
					<div class="form-row">
						<!-- col A : name -->
						<div class="col-md-6 pr-5">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="fas fa-clipboard-list"></i>
									</span>
								</div>
								<div class="form-label-group col m-0 px-0">
									<input type="text" name="name" id="name_<?=$category->id?>"
										class="form-control <?if (form_error('name')) echo 'is-invalid';?>"
										placeholder="Nom de la catégorie de produits"
										value="<?=set_value('name', $category->name); ?>">
									<label class="text-muted" for="name_<?=$category->id?>">Nom de la catégorie de
										produits</label>
									<?php echo form_error('name', '<div class="invalid-feedback">', '</div>');?>
								</div>
							</div>
							<small class="form-text text-muted">
								Ex : Nos entrées / Nos plats / Desserts ...
							</small>
						</div>
						<!-- col B : description -->
						<div class="col-md-6 pr-5">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text h2">
										<i class="fas fa-align-left"></i>
									</span>
								</div>
								<div class="form-label-group col m-0 px-0">
									<input type="text" name="description" id="description_<?=$category->id?>"
										class="form-control <?if (form_error('description')) echo 'is-invalid';?>"
										placeholder="Description"
										value="<?=set_value('description', $category->description); ?>">
									<label class="text-muted" for="description_<?=$category->id?>">Description</label>
									<?php echo form_error('description', '<div class="invalid-feedback">', '</div>');?>
								</div>
							</div>
							<small class="form-text text-muted">
								Ex : Nos plats sont accompagnés de frites, de légumes de saison ou de salade...
							</small>
						</div>
						<!-- 1st part name + description END-->
					</div>
					<hr>
					<!-- 2nd part custom image START-->
					<div class="form-row">
						<!-- row 1 : image -->
						<div class="col alert alert-info">

							<div class="col-md-6 pr-5">
								<span class="badge badge-warning mx-1 p-1">prochainement</span>
								<h5 class="card-title">Personnaliser la catégorie avec un image</h5>
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="fas fa-image"></i>
										</span>
									</div>
									<div class="form-label-group col m-0 px-0">
										<input type="text" name="image" id="image_<?=$category->id?>"
											class="form-control <?if (form_error('image')) echo 'is-invalid';?>"
											placeholder="URL d'une image"
											value="<?=set_value('image', $category->image); ?>" disabled>
										<label class="text-muted" for="image_<?=$category->id?>">URL d'une image</label>
										<?php echo form_error('image', '<div class="invalid-feedback">', '</div>');?>
									</div>
								</div>
							</div>

						</div>
					</div>
					<div class="form-row mt-4">
						<div class="col d-flex justify-content-between mx-auto">
							<button type="submit" class="btn btn-group btn-success">Enregister cette catégorie</button>
						</div>
					</div>
					<?php echo form_close()?>
				</div>
			</div>
		</div>
	</div>
	<?}?>
</main>
