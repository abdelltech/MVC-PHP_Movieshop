<form method="post" action="<?php echo BASE_URL; ?>index.php/film/validFormModifierfilm">
<div class="row">
	
	<fieldset>
	<legend>Update film</legend>
	<input name="id"  type="hidden" value="<?php if(isset($donnees['id'])) echo $donnees['id']; ?>"/>

	<label>Title
	<input name="titre"  type="text"  size="18" 
	value="<?php if(isset($donnees['titre'])) echo $donnees['titre']; ?>"/>
	<?php if(isset($erreurs['titre'])) 	echo '<small class="error">'.$erreurs['titre'].'</small>'; ?>
    </label>

    <label>Date 
	<input name="dateSortie"  type="text"  size="18" 
	value="<?php if(isset($donnees['dateSortie'])) echo $donnees['dateSortie']; ?>"/>
	<?php if(isset($erreurs['dateSortie'])) 	echo '<small class="error">'.$erreurs['dateSortie'].'</small>'; ?>
    </label>


    <label>productor
	<input name="nomProducteur"  type="text"  size="18" 
	value="<?php if(isset($donnees['nomProducteur'])) echo $donnees['nomProducteur']; ?>"/>
	<?php if(isset($erreurs['nomProducteur'])) 	echo '<small class="error">'.$erreurs['nomProducteur'].'</small>'; ?>
    </label>


        	<label>Date sortie
	<select name="id_genre">
	<?php foreach($typefilm  as $key=>$value) : ?>
		<option value="<?php echo $key; ?>" 
			<?php if(isset($donnees['id_genre'])  and $donnees['id_genre']==$key): ?> selected="selected" <?php endif; ?> >
		<?php echo $value; ?>
	    </option>
	<?php endforeach; ?>
	</select>
        
        
	<?php if(isset($erreurs['id_genre'])) 	echo '<small class="error">'.$erreurs['id_genre'].'</small>'; ?>
	</label>
        
        <label>Duration
	<input name="duree"  type="text"  size="18" 
	value="<?php if(isset($donnees['duree'])) echo $donnees['duree']; ?>"/>
	<?php if(isset($erreurs['duree'])) 	echo '<small class="error">'.$erreurs['duree'].'</small>'; ?>
    </label>

	<input type="submit" name="btn_updateFilm" value="Update" />
		
	</fieldset>	
</div>
</form>