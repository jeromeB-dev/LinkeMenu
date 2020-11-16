<main id="add_category" class="container-fluid">
	<h1 class="h2">Tableau de bord / <span class="h4">Catégories</span></h1>
	<div class="card">
		<table class="table table-hover table-striped mb-0">
			<thead>
				<tr class="card-header">
					<th scope="col">Ordre d'affichage</th>
					<th scope="col">Image</th>
					<th scope="col">Nom</th>
					<th scope="col">Description</th>
					<th scope="col">Editer</th>
				</tr>
			</thead>
			<tbody>
				<?foreach($categories as $category) {?>
				<tr>
					<th><?=$category->rank?></th>
					<td scope="row"><img src="<?=$category->image?>" alt="Cat_logo"></td>
					<td><?=$category->name?></td>
					<td><?=$category->description?></td>
					<td><a href="<?=base_url("/backoffice/add_category/$category->id")?>" role="button" type="submit"
							class="btn btn-group btn-success">Modifier</a>
						<button type="submit" class="btn btn-group btn-warning">Supprimer</button>
					</td>
				</tr>
				<?}?>
			</tbody>
		</table>
	</div>
</main>
