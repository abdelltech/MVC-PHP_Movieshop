<?php if(isset($_SESSION['login'])): ?>
	<div id="login_boite">
	</div>

	<?php else: ?>
	<div id="login_boite">
	<form method="post" action="<?php echo BASE_URL; ?>index.php/Session/connexionSession"><fieldset>
	Login
	<input autofocus name="text_login"  type="text"  size="18" />
	Password
	<input name="password" type="password" size="18" />
	<input type="submit" name="btn_cnx" class="button" style="padding:10px 10px; border-radius:5px;" value="connexion" />
	</fieldset>
	<p id="error"><?php if(isset($_SESSION['error'])) echo $_SESSION['error'];?></p>
	</form>
	</div>
<?php endif; ?>


