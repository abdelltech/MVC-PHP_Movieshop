<div class="row">
<table width="100%">
<caption>Films list (Grouped by genre)</caption>
<thead>
<tr><th>Id</th><th>Title</th><th>Date</th><th>Productor</th><th>Genre</th><th>Duration</th>
<?php if(isset($_SESSION['login'])):
  ?> 
<th>Action</th>
<?php endif;?>
</tr>
</thead>
<tbody>
<?php if(isset($data[0])): ?>
	<?php foreach ($data as $value): ?>
		<tr><td>
		<?= $value['idFilm']; ?>
		</td><td>
		<?= $value['titleFilm']; ?>
		</td><td>
		<?= $value['dateFilm']; ?>
		</td><td>
		<?= $value['productorFilm']; ?>
		</td><td>
		<?= $value['labelGenre']; ?>
		</td><td>
        <?= $value['durationFilm']; ?>
		</td>
		<?php if(isset($_SESSION['login'])): ?>
		<td>
			<a class="button info" style="padding:10px 10px; border-radius:5px;" href="<?php echo BASE_URL?>index.php/Film/updateFilm/<?= $value['idFilm']; ?>">update</a>
			<a class="button" style="padding:10px 10px; border-radius:5px;" href="<?php echo BASE_URL?>index.php/Film/cofirmDeleteFilm/<?= $value['idFilm']; ?>">delete</a>
		</td>
		<?php endif;?>
		</tr>
  
	<?php endforeach; ?>
    
<?php endif; ?>
    
<tbody>
</table><?php if(isset($_SESSION['login'])): ?>
  <a class="button  " style="margin-left: 400px;"  href="<?php echo BASE_URL?>index.php/Film/createFilm/"> Add film </a>
<?php endif;?>
</div>

