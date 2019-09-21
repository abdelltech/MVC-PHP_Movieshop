<div class="row">
<table  width="100%">
<caption>Are you sure ?</caption>
<thead>
<tr><th>Id</th><th>Title</th><th>Date</th><th>Productor</th><th>Type</th><th>Duration</th>
<?php if(isset($_SESSION['login'])): ?>
<th></th>
<?php endif;?>
</tr>
</thead>
<tbody>
<?php if(isset($data[0])): ?>
	<?php foreach ($data as $value): ?>
		<tr>
			<td><?= $value['idFilm']; ?></td><td><?= $value['titleFilm']; ?></td><td><?= $value['dateFilm']; ?></td><td><?= $value['productorFilm']; ?></td><td><?= $value['labelGenre']; ?></td><td><?= $value['durationFilm']; ?></td>
			<?php if(isset($_SESSION['login'])): ?>
				<td style="text-align:center">
					<a class="button" style="text-align:center !important;padding:10px 10px; border-radius:5px;" href="<?php echo BASE_URL?>index.php/Film/deleteFilm/<?= $value['idFilm']; ?>">OK</a>
				</td>
			<?php endif;?>
		</tr>
  
	<?php endforeach; ?>
    
<?php endif; ?>
    
<tbody>
</table><?php if(isset($_SESSION['login'])): ?>
  <a class="button info " style="margin-left: 400px;"  href="<?php echo BASE_URL?>index.php/Film/readFilms/"> Return</a>
<?php endif;?>
</div>

