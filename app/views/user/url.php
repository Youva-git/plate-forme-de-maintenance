<?php  session_start();
if($_SESSION['user']){
?>
<?php
    require APP . '/views/template/header.php'; 
?>
<body>
    <?php require APP . '/views/template/navbar.php'; ?>
<div class="container">
<br><br>
<a id="nonid" href="<?php echo Router::url('gestionusers/listeRessources') ?>">
<button type="button"><i class="fa fa-arrow-left"></i></button></a>
   <div class="text-center mb-3">
    <style>@media print{#nonid{display:none;}}}</style>
    <a id="nonid" herf="" class="imprimer" onclick="window.print();">
    <button type="submit" type="button" class="btn btn-info btn-lg">
    Imprimer <i class="fas fa-print"></i></button></a>
</div>
<?php   
if(!empty($listeressources || !empty($ressource))){ 
if(!empty($listeressources)){ 
  ?>
    <h4 id="nonid" class="text-center mb-10">QRC et URLs des Ressource</h4>
  <table id="contenue" class=" text-left table  table-hover" >
    <thead id="nonid">
      <br>
    </thead>
    <tbody>
    <i class="fas fa-cut"></i>
    <script type="text/javascript">
              <?php require 'jquery.min.js';?>
              <?php require 'qrcode.js'?>
              var i = 0;
            </script>
     <?php
       $index = -1;
       foreach ($listeressources as $value) {
        $url = 'http://urouen.fr/service/id='.$value->id;
        $index +=1;
         ?>
         <?php if(($index % 2) == 0){ ?>
            <tr>
            </tr>
            <?php } ?>
            <style>
              #p{margin-bottom: -10px;margin-top: -12px;font-size: 42px;}  
              #Bloc1 {float:left ;   margin-left: auto;	margin-right: auto;}    
              #Bloc2 {float:left ;   border: 3px dashed #000; width:105mm; height:42mm; margin-left: auto;	margin-right: auto;}  
               </style>
            <td id="Bloc2">
            <input type="hidden" id="<?php echo "text".$index; ?>" value="<?php echo $url ?>"/>
            <div id="Bloc1"><div id="<?php echo "qrcode".$index; ?>"></div></div>
            <div>
            <p id="p">Flashez-moi</p>
            <p id="p1">pour signaler un problème avec ce matériel</p>
            <p id="p1"> <?php echo $url;?></p>
            </div>
            <div>
          </td>
            <script type="text/javascript">
            var qrcode = new QRCode(document.getElementById("qrcode"+i), {
              width : 125,
              height : 125
            });
            function makeCode () {		
              var elText = document.getElementById("text"+i);
              
              if (!elText.value) {
                alert("Input a text");
                elText.focus();
                return;
              }
              
              qrcode.makeCode(elText.value);
            }
            makeCode();

            $("#text").
              on("blur", function () {
                makeCode();
              }).
              on("keydown", function (e) {
                if (e.keyCode == 13) {
                  makeCode();
                }
              });
              i +=1;
            </script>
          
     <?php } ?>
      
    </tbody>
  </table>

 <?php  }?>
  <?php  if(!empty($ressource)){ 
  ?>
    <h4 id="nonid" class="text-center mb-10">QRC et URL de la Ressource <?php echo $ressource->description; ?></h4>
  <table id="contenue" class=" text-left table  table-hover">
    <thead id="nonid">
        <tr>              
        </tr>
    </thead>
    <tbody>
    <i class="fas fa-cut"></i>
    <script type="text/javascript">
              <?php require 'jquery.min.js';?>
              <?php require 'qrcode.js'?>
              var i = 1;
            </script>
     <?php
       $index = 0;
       $url = 'http://urouen.fr/service/id='.$ressource->id;
        $index +=1; 
         ?>
          <style>
              #p{margin-bottom: -10px;margin-top: -12px;font-size: 42px;}  
              #Bloc1 {float:left ;   margin-left: auto;	margin-right: auto;}    
              #Bloc2 {float:left ;   border: 3px dashed #000; width:105mm; height:42mm; margin-left: auto;	margin-right: auto;}  
               </style>
            <td id="Bloc2">
            <input type="hidden" id="<?php echo "text".$index; ?>" value="<?php echo $url ?>"/>
            <div id="Bloc1"><div id="<?php echo "qrcode".$index; ?>"></div></div>
            <div>
            <p id="p">Flashez-moi</p>
            <p id="p1">pour signaler un problème avec ce matériel</p>
            <p id="p1"> <?php echo $url;?></p>
            </div>
            <div>
          </td>
            <script type="text/javascript">
            var qrcode = new QRCode(document.getElementById("qrcode"+i), {
              width : 125,
              height : 125
            });
            function makeCode () {		
              var elText = document.getElementById("text"+i);
              
              if (!elText.value) {
                alert("Input a text");
                elText.focus();
                return;
              }
              
              qrcode.makeCode(elText.value);
            }
            makeCode();

            $("#text").
              on("blur", function () {
                makeCode();
              }).
              on("keydown", function (e) {
                if (e.keyCode == 13) {
                  makeCode();
                }
              });
              i +=1;
            </script>
      
    </tbody>
  </table>
  <?php } } else{ ?>
  <h6 class="text-center mb-10"> Aucune ressource enregistrer</h6>
  <?php }?>
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
