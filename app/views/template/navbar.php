<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <div class="container">
      <a class="navbar-brand" href="<?php echo Router::url('home/home'); ?>"><?php echo NAME_SITE; ?>
         <i style='font-size:24px' class="fas fa-home"></i>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
     <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
            <?php if(isset($_SESSION['user_id'])) :?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo Router::url('users/logoutUser'); ?>">Déconnexion</a>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo Router::url('page/login'); ?>">Connexion</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  

