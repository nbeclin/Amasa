<a href="/<?php echo BASE_URL ?>admin/users/add" class="btn btn-success">Ajouter un utilisateur</a>

<h2>Utilisateurs</h2>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center">Utilisateur</th>
            <th class="text-center">Email</th>
            <th class="text-center">Dernière Connexion</th>      
            <th class="text-center"></th>
            <th class="text-center"></th>   
        </tr>
    </thead>
    <tbody>
		<?php foreach ($users as $user) : ?>	
			<tr>
				<td class="text-center">
					<?php echo $user->login ?>
				</td>
				<td class="text-center">
					<?php echo $user->email ?>
				</td>
				<td class="text-center">
					<?php echo $user->datetime ?>
				</td>
				<td class="text-center">
					<a href="/<?php echo BASE_URL ?>admin/users/modify/<?php echo $user->id ?>"><span class="glyphicon glyphicon-pencil" style="color:#AEB404;"></span></a>
				</td>
				<td class="text-center actions">
                    <a href="/<?php echo BASE_URL ?>admin/users/delete/<?php echo $user->id ?>" class="delete-user" data-user-id="<?php echo $user->id ?>">
                        <span class="glyphicon glyphicon-floppy-remove" style="color:#FE2E2E;"></span>
                    </a>
                </td>
			</tr>
		<?php endforeach; ?>
    </tbody>
</table>