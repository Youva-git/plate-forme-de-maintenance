<?php  session_start();
if($_SESSION['user']){
require APP . '/views/template/header.php'; 
?>
<body>
    <?php require APP . '/views/template/navbar.php'; ?>
    <div class="container ">
    <div class="text-center ">
        <br><h2>Gestions des ressources</h2>
        <br><br><br>
        <a href="<?php echo Router::url('gestionusers/listeRessources');?>">
        <button type="button" class="col-5">Gestion des ressources</button></a>
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

