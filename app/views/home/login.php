<!DOCTYPE hmtl>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
<?php 
require APP . '/views/template/header.php'; ?>
</head>
<body>
<?php 
require APP . '/views/template/navbar.php'; ?>

<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body mt-5">
      <p ><strong>Service d'authentification</strong></p>
      <form action="<?php echo Router::url('users/loginUser');?>" method="post">
          <span style="color: red"><?php if(!empty($msgErr)) echo $msgErr; ?></span>
          <div class="form-group">
          <i class="fa fa-user" aria-hidden="true"></i>
            <input class="col-md-8" type="text" name="username" class="form-control form-control-lg" placeholder="Login"  required  >
          </div>
          <div class="form-group">
          <i class="fa fa-lock" aria-hidden="true"></i>
            <input class="col-md-8" type="password" name="password" class="form-control form-control-lg" placeholder="Mot de passe" required >
          </div>
            <div class="col" >
              <input type="submit" value="Connexion" class="btn btn-success col-md-9">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php 
APP . '/views/template/footer.php';?>
</body>
</html>