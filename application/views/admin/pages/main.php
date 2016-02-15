<a href="/<?php echo BASE_URL ?>pages/add" class="btn btn-success">Ajouter une page</a>
<h2>Gestion des pages</h2>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center">Pages</th>
            <th class="text-center">Edit</th>
        </tr>
    </thead>
    <tbody>
		<?php foreach ($pages as $page) : ?>	
				<tr>
					<td class="text-left">
						<?php echo $page->titre ?>
					</td>
					<td class="text-center">
						<a href="/<?php echo BASE_URL ?>admin/pages/modify_page/<?php echo $page->id ?>"><span class="glyphicon glyphicon-pencil"></span></a>
					</td>
				</tr>
				<?php if(!empty($page->sous_pages)) : ?>
					<?php foreach ($page->sous_pages as $sous_page) : ?>
						<tr>
							<td class="text-left" style="padding-left:10%">
								<?php echo $sous_page->titre ?>
							</td>
							<td class="text-center">
								<a href="/<?php echo BASE_URL ?>admin/pages/modify_sous_page/<?php echo $sous_page->id ?>"><span class="glyphicon glyphicon-pencil"></span></a>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
		<?php endforeach; ?>
    </tbody>
</table>