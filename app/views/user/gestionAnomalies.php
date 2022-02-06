<?php  session_start();
if($_SESSION['user']){
require APP . '/views/template/header.php'; 
?>
<body>
    <?php require APP . '/views/template/navbar.php'; ?>

<div class="container">
<div class="col-md-12 mx-auto">

<br><br>
<a href="<?php echo Router::url('gestionusers/listeRessources');?>">
<button type="button"><i class="fa fa-arrow-left"></i></button></a>

<div class="text-center mb-3">
<!-- boutton de nouvelle anomalie --->
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal-add-ressource"><b>Ajouter une anomalie</b></button>
         </div>
</div>
<div class="text-center mb-3">
         <span class="" style="color: green; font-size: 1.2em">
            <?php 
                if(!empty($msgSucc)) echo $msgSucc.'</br>';
                if(!empty($msgErr)) echo $msgErr.'</br>';
            ?>
          </span>
</div>
<h2 class="text-center mb-10">Liste des anomalies</h2>


<!-- la table des anomalie -->
<?php if(!empty($listeanomalies)){ ?>
<table id="table_users" class=" text-center col-md-12 mx-auto">
    <thead>
        <tr>             
            <th class="col-md-8">Anomalies</th>
            <th class="col-md-3"></th>
            <th class="col-md-3">Supprimer</th>
        </tr>
    </thead>
    <tbody>
           
     <?php  
       foreach ($listeanomalies as $value) {?>   
      <tr class="text-rigth">
        <?php if(!$value->etat) { ?>
        <td style="background: red" class="text-left"><br>
            <?php echo $value->anomalie;?> <br> 
        <br></td>
        <td style="background: red" >
        <form action="<?php echo Router::url('gestionusers/modifAnomalies');?>" method="post">
                <input  name="id" type="hidden" value="<?php echo $value->id ?>"/>
                <input  name="etat" type="hidden" value="<?php echo 1; ?>"/>
                <button ><i class='fas fa-copy' style='font-size:16px'></i>fermer</button>
            </form>
            <?php } else {?>
        </td>
        <td style="background: green" class="text-left"><br>           
            <?php echo $value->anomalie;?>  <br>       
            <br></td>
        <td style="background: green">
            <?php }?>          
        </td>
          <td>
            <form action="<?php echo Router::url('gestionusers/suppAnomalie');?>" method="post">
                <input  name="id" type="hidden" value="<?php echo $value->id ?>"/>
                <button type="submit" onclick="return confirm('Confirmer la suppression de l\'anomalie ??');"><i class='fas fa-trash-alt' style='font-size:16px'></i></button>
            </form>
          </td>
      </tr>
      <?php }
    }else{
       ?>
    </tbody>
  </table>

  <h6 class="text-center mb-12"> <?php echo 'Aucune anomalie saisie'.'</n>'; }?></h6>


<!-- Ajouter une anomalie -->
    <div class="modal fade" id="myModal-add-ressource" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="<?php echo Router::url('gestionusers/ajoutAnomalie');?>" method="post" id="formulaire">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="ajoutDescAno">Description de l'anomalie :</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="ajoutDescAno" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="nouvelle-facture" for="AjoutEtatAno">Etat de l'annomalie * :</label>
                            </div>

                            <div class="col-sm-6">
                            <SELECT name="AjoutEtatAno" size="1" required>
                                <option value="1">En Marche</option>
                                <option value="0">ERREUR</option>
                                </SELECT>
                            </div>
                        </div>
                        <input  name="idresponsabl" type="hidden" value="<?php echo $ressource->id  ?>"/>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <?php require APP . '/views/template/footer.php';?>
</footer>
</html>
<?php }else{ ?>
    <html>
<head>
    <?php require APP . '/views/template/header.php'; ?>
</head>
<body>
    <?php require APP . '/views/template/navbar.php'; ?>

<div class="container">
<div class="col-md-12 mx-auto">

<br><br>
<a href="<?php echo Router::url('gestionusers/listeRessourcesPublique');?>">
<button type="button"><i class="fa fa-arrow-left"></i></button></a><div class="text-center mb-3">
<!-- boutton de nouvelle anomalie --->
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal-add-ressource"><b>Ajouter une anomalie</b></button>
         </div>
</div>
<div class="text-center mb-3">
         <span class="" style="color: green; font-size: 1.2em">
            <?php 
                if(!empty($msgSucc)) echo $msgSucc.'</br>';
                if(!empty($msgErr)) echo $msgErr.'</br>';
            ?>
          </span>
</div>
<h2 class="text-center mb-10">Liste des anomalies</h2>


<!-- la table des anomalie -->
<?php if(!empty($listeanomalies)){ ?>
<table id="table_users" class=" text-center col-md-12 mx-auto">
    <thead>
        <tr>             
            <th class="col-md-8">Anomalies</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
           
     <?php  
       foreach ($listeanomalies as $value) {?>   
      <tr class="text-rigth"> 
        <?php if(!$value->etat) { ?>
        <td style="background: red" class="text-left "><br>
            <?php echo $value->anomalie;?>  <br>
            <br></td>
        <td style="background: red" class="col-sm-2">
        </td>
        <?php } else {?>
        <td style="background: green" class="text-left col-sm-8">             
         <?php echo $value->anomalie;?>         
        </td>
        <td style="background: green">
        <form action="<?php echo Router::url('gestionusers/modifAnomalies');?>" method="post">
        <input  name="id" type="hidden" value="<?php echo $value->id ?>"/>
                <input  name="etat" type="hidden" value="<?php echo 0; ?>"/><br>
                <button ><i class='fas fa-copy' style='font-size:16px'></i>Signaler</button>
            </form> 
            <?php }?>          
        </td>
      </tr>
      <?php }
    }else{
       ?>
    </tbody>
  </table>

  <h6 class="text-center mb-12"> <?php echo 'Aucune anomalie saisie'.'</n>'; }?></h6>
 
<!-- Ajouter une anomalie -->
    <div class="modal fade" id="myModal-add-ressource" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="<?php echo Router::url('gestionusers/ajoutAnomalie');?>" method="post" id="formulaire">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="ajoutDescAno">Description de l'anomalie :</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="ajoutDescAno" required>
                                <input type="hidden" name="AjoutEtatAno" value="<?php echo 0; ?>" required>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <?php require APP . '/views/template/footer.php';?>
</footer>
</html>
<?php } ?>
