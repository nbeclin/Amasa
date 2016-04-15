<h2>Statistique</h2>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center">Date</th>
            <th class="text-center">IP</th>
            <th class="text-center">Nombre de page</th>
        </tr>
    </thead>
    <tbody>
		<?php foreach ($stats as $stat) : ?>	
			<tr>
				<td class="text-left">
					<?php echo $stat->date ?>
				</td>
				<td class="text-center">
					<?php echo $stat->ip ?>
				</td>
				<td class="text-center">
					<?php echo $stat->nb_page ?>
				</td>
			</tr>
		<?php endforeach; ?>
    </tbody>
</table>