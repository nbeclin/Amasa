<a href="/<?php echo BASE_URL ?>admin/fichiers/add" class="btn btn-success">Ajouter une fichier pour le site</a>
<h2>Gestion des fichiers</h2>
<?php if(isset($delete_success) && $delete_success): ?>
    <div class="alert alert-warning">
        Fichier supprimée !
    </div>
<?php endif; ?>
<?php if(isset($delete_success) && !$delete_success): ?>
    <div class="alert alert-warning">
        Fichier non supprimé, en lien avec page(s) :
        <ul>
        <?php foreach ($pages_selected as $page) : ?>
            <li>
                <a href="/<?php echo BASE_URL ?>admin/pages/modify_page/<?php echo $page->id ?>">
                    <?php echo $page->titre ?>
                </a>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center">fichier</th>
            <th class="text-center">lien</th>
            <th class="text-center"></th>
        </tr>
    </thead>
    <tbody>
		<?php foreach ($fichiers as $fichier) : ?>	
			<tr class="fichier-line" data-fichier-id="<?php echo $fichier->id ?>">
				<td class="text-center">
                    <?php if ($fichier->type == 'img') : ?>
					   <img src="/<?php echo BASE_URL ?>/<?php echo $fichier->lien ?>" alt="Amasa" height="30" />
                    <?php else : ?>
                       <img src="/<?php echo BASE_URL ?>/<?php echo $fichier->type ?>" alt="Amasa" height="30" />
                    <?php endif; ?>
				</td>
                <td class="text-center">
                    <?php echo '/'.$fichier->lien ?>
                </td>
                <td class="text-center actions">
                    <a href="/<?php echo BASE_URL ?>admin/fichiers/delete/<?php echo $fichier->id ?>" class="delete-fichier" data-fichier-id="<?php echo $fichier->id ?>">
                        <span class="glyphicon glyphicon-floppy-remove" style="color:#FE2E2E;"></span>
                    </a>
                </td>
			</tr>
		<?php endforeach; ?>
    </tbody>
</table>