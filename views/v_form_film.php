<form method="post" action="
<?php
if(isset($data['idFilm'])){
	echo BASE_URL."index.php/Film/validFormUpdateFilm";
}else{
	echo BASE_URL."index.php/Film/validFormCreateFilm";
} 
?>
">
<div class="row">
	
	<fieldset>
	<legend><?php
if(isset($data['idFilm'])){
	echo "Edit Film";
}else{
	echo "Add Film";
} 
?></legend>
	<label><input name="idFilm"  type="hidden"  value="<?php if(isset($data['idFilm'])) echo $data['idFilm']; ?>"   /></label>
	<label>Title
	<input autofocus name="titleFilm"  type="text"  size="18" 
	value="<?php if(isset($data['titleFilm'])) echo $data['titleFilm']; ?>"/>
	<?php if(isset($errors['title']))  	echo '<small class="error">'.$errors['title'].'</small>'; ?>
    </label>
    
    <label>Date 
	<input name="dateFilm"  type="text"  size="18" placeholder="YYYY-MM-DD"
	value="<?php if(isset($data['dateFilm'])) echo $data['dateFilm']; ?>"/>
	<?php if(isset($errors['date']))  	echo '<small class="error">'.$errors['date'].'</small>'; ?>
    </label>
        
    <label>Productor 
	<input name="productorFilm"  type="text"  size="18" 
	value="<?php if(isset($data['productorFilm'])) echo $data['productorFilm']; ?>"/>
	<?php if(isset($errors['productor']))  	echo '<small class="error">'.$errors['productor'].'</small>'; ?>
    </label>

	<label>Type
	<select name="idGenre">
	<?php foreach($typefilm  as $key=>$value) : ?>
		<option value="<?php echo $key; ?>" 
			<?php if(isset($data['idGenre'])  and $data['idGenre']==$key): ?> selected="selected" <?php endif; ?> >
		<?php echo $value; ?>
	    </option>
	<?php endforeach; ?>
	</select>
	<?php if(isset($errors['idGenre'])) 	echo '<small class="error">'.$errors['idGenre'].'</small>'; ?>
	</label>


	<label>Duration
	<input name="durationFilm"  type="text"  size="18" 
	value="<?php if(isset($data['durationFilm'])) echo $data['durationFilm']; ?>"/>
	<?php if(isset($errors['duration'])) 	echo '<small class="error">'.$errors['duration'].'</small>'; ?>
    </label>


	<input  class="button" type="submit" name="btn_Film" value="OK" />
		

	</fieldset>	
</div>
</form>