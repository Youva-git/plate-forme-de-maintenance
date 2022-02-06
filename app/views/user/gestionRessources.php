<?php  session_start();
if($_SESSION['user']){
require APP . '/views/template/header.php'; 
?>
<body>
    <?php require APP . '/views/template/navbar.php'; ?>
<div class="container">
<br><br>
<a href="<?php echo Router::url('users/userHome') ?>">
<button type="button"><i class="fa fa-user" aria-hidden="true"></i></button></a>
   <div class="text-center mb-3">
     <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal-ajout-ressource">
     <b>Ajouter une ressource</b></button>
    </div>
    <div class="text-center mb-3">
     <form action="<?php echo Router::url('gestionusers/urlRessource');?>" method="post">        
        <button type="submit" type="button" class="btn btn-info btn-lg">
        Imprimer les QRC et les URLs des Ressource <i class="fas fa-print"></i></button>
    </form>
</div>
    <div class="text-center mb-3">
         <span class="" style="color: green; font-size: 1.2em">
            <?php 
                if(!empty($msgSuccR)) echo $msgSuccR.'</br>';
                if(!empty($msgErrR)) echo $msgErrR.'</br>';
            ?>
          </span>
</div>
</div>
<div class="container">
  <h2 class="text-center mb-8"> <?php  echo 'Liste des ressources '.'</n>'; ?></h2>
<?php  if(!empty($listeressources)){ 
  ?>
  <table id="table_users" class=" text-center table  table-hover">
    <thead>
        <tr>              
            <th>Description</th>
            <th>Localisation</th>
        </tr>
    </thead>
    <tbody>
           
     <?php
       foreach ($listeressources as $value) {?>   
      <tr > 
          <td class="text-left col-md-5">
            <?php echo $value->description;?>
          </td>
          <td class="text-left col-md-5">
            <?php echo $value->localisation;?>
          </td>
          <td >
            <form action="<?php echo Router::url('gestionusers/listeanomalie');?>" method="post">
                <input  name="idressource" type="hidden" value="<?php echo $value->id ?>"/>
                <input  name="ressource" type="hidden" value="<?php echo $value->description ?>"/>
                <input  name="localisation" type="hidden" value="<?php echo $value->localisation ?>"/>
                <button type="submit"><i class='fas fa-edit' style='font-size:16px'></i></button>
            </form>
          </td>
          <td>
          <form action="<?php echo Router::url('gestionusers/suppRessources');?>" method="post">
                <input  name="id" type="hidden" value="<?php echo $value->id ?>"/>
                <input  name="idresponsable" type="hidden" value="<?php echo $value->idresponsable ?>"/>
                <button type="submit" onclick="return confirm('Confirmer la suppression de la ressource?');"><i class='fas fa-trash-alt' style='font-size:16px'></i></button>
            </form>
          </td>
          <td>
          <form action="<?php echo Router::url('gestionusers/urlR');?>" method="post"> 
                <input  name="ressource" type="hidden" value="<?php echo $value->description ?>"/>
                <input  name="localisation" type="hidden" value="<?php echo $value->localisation ?>"/>
                <button type="submit" ><i class="fas fa-print"></i></button>
            </form>
          </td>
      </tr>
     <?php }?>
      
    </tbody>
  </table>
  </div>
 <?php  }else{
    ?>
  <h6 class="text-center mb-10"> Aucune ressource enregistrer</h6>
  <?php }?>

<!-- Ajouter une RESSOURCE -->
  <div class="modal fade" id="myModal-ajout-ressource" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                  <form action="<?php echo Router::url('gestionusers/ajoutRessources');?>" method="post" id="formulaire">
                    <div class="col-sm-12">
                        <label class="" for="ajoutDescRessource">Description de la ressource *</label>
                        <input type="text" name="ajoutDescRessource" class="col-12" required>
                    </div>
                    <div class="col-sm-12">
                        <label class="" for="ajoutLocalisation">Localisation de la ressource * </label>
                        <input type="text" name="ajoutLocalisation" class="col-12" required>
                    </div>
                    <input  name="user_id" type="hidden" value="<?php echo $_SESSION['user_id']  ?>"/>
                    <input  name="user_username" type="hidden" value="<?php echo $_SESSION['user_username'] ?>"/>
                    <div class="modal-footer">
                    <button type="button" class="col-sm-3" data-dismiss="modal">Annuler</button>
                      <button type="submit" class="col-sm-5">Ajouter la ressource</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
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
