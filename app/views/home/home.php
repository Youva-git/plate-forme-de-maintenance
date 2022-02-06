<?php 
if(isset($_GET['url'])){  
    $url = explode('=', $_GET['url']);
    if($url != '' && $url[0] != 'page/home' && $url[0] != 'users/logoutUser' && $url[0] != 'home/home'){
        if($url[0] == "service/id"){
            $this->setParams(array());
            $modelRessource  = $this->getModel('Ressource');
            $res = $modelRessource->findByAttr('ressource', 'id', $url[1]);  
            $this->setParams(array(
                'listeressourcespublique' => $res,
            )); 
            $this->render('user/listeRessourcesPublique'); 
        }  
        else{
            $this->render('error');
        } 
    }else{?>

        <html>
        <head>
            <?php require APP . '/views/template/header.php'; 
            ?>
        </head>
        <body>
            <?php require APP . '/views/template/navbar.php'; ?>
            <div class="container ">
            <div class="text-center ">
                <br><h2>Plate-forme de maintenance</h2>
                <br><br><br>
                <a href="<?php echo Router::url('gestionusers/listeRessourcesPublique');?>">
                <button type="button" class="col-5">Signaler une Anomalie</button></a>
            </div>
            </div>
        
        </body>
        <footer>
            <?php require APP . '/views/template/footer.php';?>
        </footer>
        </html>
        <?php
        }
}else{?>

<html>
<head>
    <?php require APP . '/views/template/header.php'; 
    ?>
</head>
<body>
    <?php require APP . '/views/template/navbar.php'; ?>
    <div class="container ">
    <div class="text-center ">
        <br><h2>Plate-forme de maintenance</h2>
        <br><br><br>
        <a href="<?php echo Router::url('gestionusers/listeRessourcesPublique');?>">
        <button type="button" class="col-5">Signaler une Anomalie</button></a>
    </div>
    </div>

</body>
<footer>
    <?php require APP . '/views/template/footer.php';?>
</footer>
</html>
<?php
}
?>