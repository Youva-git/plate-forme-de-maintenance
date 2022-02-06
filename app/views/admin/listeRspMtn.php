<?php  session_start();
if($_SESSION['admin']){
    require APP . '/views/template/header.php'; 
?>
<body>
  <?php require APP . '/views/template/navbar.php'; ?>
  <div class="container ">

    <br><br><a href="<?php echo Router::url('admin/admin') ?>">
    <button type="button"><i class="fa fa-user" aria-hidden="true"></i></button></a>

    <h2 class="text-center mb-10"> <?php  echo "Liste des responsables de maintenance ";?></h2>

    <table class=" text-center table  table-hover">
      <thead>
        <tr>              
          <th> Login</th>
          <th> Nom</th>
          <th> Prenom</th>
          <th> Email</th>
        </tr>
      </thead>
      <tbody> 
        <?php  if(!empty($listeresponsable)){   
          foreach ($listeresponsable as $value) {?>   
        <tr > 
          <td>
            <?php echo $value->username;?>
          </td>
          <td>
            <?php echo $value->nom;?>
          </td>
          <td>
            <?php echo $value->prenom;?>
          </td>
          <td>
            <?php echo $value->email;?>
          </td>
        </tr>
        <?php }}else{ ?>
      </tbody>
    </table>
    <h4 class="text-center mb-10"> <?php echo "Aucun utlisateur ajouter."; }?></h4>
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