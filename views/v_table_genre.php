<div class="row">
	<table width="100%">
		<caption>Liste of genres</caption>
		<thead>
			<tr>
				<!--<th>Id</th>--><th>Genre</th>
			</tr>
		</thead>
		<tbody>
		<?php if(isset($data[0])): ?>
			<?php foreach ($data as $value): ?>
				<tr>
					<!--<td>
				<?php // echo($value['idGenre']); ?>
				</td>-->
				<td>
				<?= $value['labelGenre']; ?>
				</td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
		</tbody>
	</table>
</div>

