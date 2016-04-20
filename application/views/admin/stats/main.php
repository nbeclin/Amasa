<h2>Statistiques</h2>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center">Date</th>
            <th class="text-center">Nombre de visiteur</th>
            <th class="text-center">Nombre de page</th>
            <th class="text-center">Moyenne par visiteur</th>            
        </tr>
    </thead>
    <tbody>
		<?php foreach ($stats as $stat) : ?>	
			<tr>
				<td class="text-center">
					<?php echo $stat['date'] ?>
				</td>
				<td class="text-center">
					<?php echo $stat['nb_visitor'] ?>
				</td>
				<td class="text-center">
					<?php echo $stat['nb_page'] ?>
				</td>
				<td class="text-center">
					<?php echo $stat['average_page'] ?>
				</td>
			</tr>
		<?php endforeach; ?>
    </tbody>
</table>