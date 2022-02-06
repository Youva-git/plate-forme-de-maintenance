<?php  session_start();
if($_SESSION['admin']){
    require APP . '/views/template/header.php'; 
?>
<body>
    <?php require APP . '/views/template/navbar.php'; ?>

  <div class="container"> 
    <br><br><a href="<?php echo Router::url('admin/admin') ?>">
    <button type="button"><i class="fa fa-user" aria-hidden="true"></i></button></a>
    <div class="row">
      <div class="col-md-9 mx-auto">
        <h3>Ajouter un responsable de maintenance</h3>
        <form action="<?php echo Router::url('admin/ajoutRspMtn');?>" method="post">
          <div class="form-group">
            <label for="username">Login * </label>
            <input type="text" name="username" class="form-control form-control-lg" required>
          </div>
          <div class="form-group">
            <label for="nom">Nom * </label>
            <input type="text" name="nom" class="form-control form-control-lg" required>
          </div>
          <div class="form-group">
            <label for="prenom">Prenom * </label>
            <input type="text" name="prenom" class="form-control form-control-lg" required>
          </div>
          <div class="form-group">
            <label for="email">Email * </label>
            <input type="email" name="email" class="form-control form-control-lg" required >
          </div>
          <div class="form-group">
            <label for="password">Mot de passe * </label>
            <input type="password" name="password" class="form-control form-control-lg" required>
          </div>
          <div class="form-group">
            <label for="confPassword">Confirmer le mot de passe * </label>
            <input type="password" name="confPassword" class="form-control form-control-lg" required>
          </div>
          <div class="row">
            <div class="col">
              <input type="submit" value="Ajouter" class="btn btn-success btn-block">
            </div>
          </div>
        </form>   
      <div>  
    </div>
        <div class="text-center"><br>
          <span class="" style="color: red ; font-size: 1.2em;">
          <?php if(!empty($errMdp)) echo $errMdp;?></span>
          <span class="" style="color: red ; font-size: 1.2em;">
          <?php if(!empty($errMdpConf)) echo $errMdpConf; ?></span>
          <span class="" style="color: green ; font-size: 1.2em;">
          <?php if(!empty($succAjout)) echo $succAjout; ?></span>
          <span class="" style="color: red ; font-size: 1.2em;">
          <?php if(!empty($errAjout)) echo $errAjout; ?></span>
          <span class="" style="color: red ; font-size: 1.2em;">
          <?php if(!empty($errExist)) echo $errExist; ?></span>
        </div>
  </div>
</body>
<footer>
    <?php require APP . '/views/template/footer.php';?>
</footer>
</html>
<?php
}else{
    $this->render('error');
}
?>
