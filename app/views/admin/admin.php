<?php  session_start();
if($_SESSION['admin']){
    require APP . '/views/template/header.php'; 
?>
<body>
    <?php require APP . '/views/template/navbar.php'; ?>
    <div class="container ">
    <div class="text-center ">
        <br><h2>Gestion des comptes des responsables de maintenance</h2>
        <br><br><br>
        <a href="<?php echo Router::url('admin/listeRspMtn') ?>">
        <button type="button" class="col-7">Liste des responsables de maintenance</button></a>
        <br><br>
        <a href="<?php echo Router::url('admin/ajoutRspMtn');?>">
        <button type="button" class="col-7">Ajouter des responsables de maintenance</button></a>
        <br><br>
        <a href="<?php echo Router::url('admin/suppRspMtn') ?>">
        <button type="button" class="col-7">Supprimer des responsables de maintenance</button></a>
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
