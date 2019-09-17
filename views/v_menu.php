<nav class="top-bar" data-topbar role="navigation">
  <section class="top-bar-section"> 
    <ul class="left">
      <li class="divider"></li> 
      <li class="active"><a href="#">Welcome to our shop :) &nbsp;&nbsp;&nbsp;&nbsp;Available films => </a></li> 
      <li class="divider"></li> 
      <li class="has-dropdown"><a href="#">Films</a>
        <ul class="dropdown">
          <?php if(isset($_SESSION['login'])): ?>
            <li><a href="<?php echo BASE_URL?>index.php/Film/createFilm"> Add film </a></li>
          <?php endif; ?>

          <li><a href="<?php echo BASE_URL?>/index.php/Film/readFilms">Display films</a></li>

          <?php if(isset($_SESSION['login'])): ?>
            <li><a href="<?php echo BASE_URL?>/index.php/Film/readTypes">Display genres</a></li>
          <?php endif; ?>
        </ul>
      </li>
    </ul>
    <ul class="right"> 
      <?php if(isset($_SESSION['login'])): ?>
        <li><a>Welcome <b> <?= $_SESSION['login'];  ?></b> !</a></li>
        <li><a href="">|</a></li>
        <li><a href="<?php echo BASE_URL?>index.php/Session/deconnexionSession">Sign out</a></li>
      <?php endif; ?>
      <?php if(!isset($_SESSION['login'])): ?>
        <li><a href="<?php echo BASE_URL?>index.php/Session/connexionSession">Sign in</a></li> 
      <?php endif; ?>
    </ul>
  </section>
</nav>