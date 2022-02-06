<?php require APP . '/views/template/header.php'; ?>
<body>
    <?php require APP . '/views/template/navbar.php'; ?>

<div class="container ">
<a href="<?php echo Router::url('home/home') ?>">
<button type="button"><i class="fa fa-user" aria-hidden="true"></i></button></a>
  <h2 class="text-center mb-10">Liste des ressources disponible</h2>
<?php  if(!empty($listeressourcespublique)){ 
  ?>
  <table id="table_users" class=" text-center table  table-hover">
    <thead>
        <tr>              
            <th> Description</th>
            <th> Localisation</th>
            <th> Responsable</th>
            <th> Signaler</th>
        </tr>
    </thead>
    <tbody>
           
     <?php
       foreach ($listeressourcespublique as $value) {?>   
      <tr > 
          <td>
            <?php echo $value->description;?>
          </td>
          <td>
            <?php echo $value->localisation;?>
          </td>
          <td>
            <?php echo $value->responsable;?>
          </td>
          <td>
            <form action="<?php echo Router::url('gestionusers/listeanomalie');?>" method="post">
            <input  name="idressource" type="hidden" value="<?php echo $value->id ?>"/>
                <input  name="ressource" type="hidden" value="<?php echo $value->description ?>"/>
                <input  name="localisation" type="hidden" value="<?php echo $value->localisation ?>"/>
                <button type="submit"><i class='fas fa-edit' style='font-size:16px'></i></button>
            </form>
          </td>
      </tr>
     <?php }?>
      
    </tbody>
  </table>
  
 <?php  }else{
    ?>
  <h4 class="text-center mb-10">Aucune ressource disponible</h4>
  <?php }?>

</div>
</body>
<footer>
    <?php require APP . '/views/template/footer.php';?>
</footer>
</html>
