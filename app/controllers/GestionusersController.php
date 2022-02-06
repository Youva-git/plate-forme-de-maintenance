<?php session_start();

class gestionusersController extends Controller
{
  public function ajoutRessources(){
    $this->setParams(array());
    $_SESSION['user_id'] 		    = trim($_POST['user_id']);
    $_SESSION['user_username'] 	= trim($_POST['user_username']);
    $data =[
      'description'   => trim($_POST['ajoutDescRessource']),
      'localisation'  => trim($_POST['ajoutLocalisation']),
      'responsable'   => $_SESSION['user_username'],
      'idresponsable' => $_SESSION['user_id']
     ];
    $model = $this->getModel('Ressource');
    if($model->ajoutRessource($data)){
 			$this->setParams(array(
	      'msgSuccR' => 'La ressource a été ajouter avec succès',
      ));			 
    $listeressources =  $model->listeRessources($_SESSION['user_id']);
    $this->setParams(array('listeressources'			=> $listeressources));                 
    $this->render('user/gestionRessources');
    } else {
      $this->setParams(array(
        'msgErrR' => '***ERREUR : ressource non ajouter'
      ));
    }
    $this->render('user/gestionRessources'); 
	}

  public function suppRessources(){
    $this->setParams(array());
    $id 		     = trim($_POST['id']);
    $responsable = trim($_POST['idresponsable']);
		$modelRessource = $this->getModel('Ressource');
    $modelListeanomalie = $this->getModel('Listeanomalie');
    if($modelListeanomalie->findByAttr('listeanomalie', 'ressource', $id)){
      $modelListeanomalie->suppRessourceAnomalies($id);
    }
    if($modelRessource->suppRessource($id)){
    $ressource =  $modelRessource->listeRessources($responsable);
		$this->setParams(array(
			'msgSuccR'      => "La ressource a été retirer",
      'listeressources' => $ressource
    ));
		}else{
			$this->setParams(array(
         'msgErrR' => "***ERREUR : Suppression de la ressource impossible",
      ));
		}
    $this->render('user/gestionRessources'); 
	}

	public function listeRessources(){   
    $this->setParams(array());
    $model    = $this->getModel('Ressource');
 		$listeressources =  $model->listeRessources($_SESSION['user_id']);
    $this->setParams(array('listeressources'			=> $listeressources));
    $this->render('user/gestionRessources'); 
	}
  
  public function listeRessourcesPublique(){
	  $this->setParams(array());
    $model = $this->getModel('Ressource');
 		$listeressourcespublique =  $model->listeRessourcesPublics();
    $this->setParams(array(
       'listeressourcespublique'			=> $listeressourcespublique
    ));
    $this->render('user/listeRessourcesPublique'); 
	}

	public function ajoutAnomalie(){
    $idressource = $_SESSION['idressource'];
    $this->setParams(array());
    $data =[
      'anomalie'		=> trim($_POST['ajoutDescAno']),
      'etat'		    => trim($_POST['AjoutEtatAno']),
      'ressource' 	=> $idressource
    ];
    $modelanomalie   = $this->getModel('Listeanomalie');
    $modelRessource  = $this->getModel('Ressource');
    $ressource       = $modelRessource->findById('ressource', $idressoure);
    if($modelanomalie->ajoutAnomalie($data)){
      $listeanomalies = $modelanomalie->listeAnomalies($idressource);
          $this->setParams(array(
            'msgSucc' => 'Anomalie ajouter avec succès',
            'listeanomalies'	=> $listeanomalies,
          ));
    } else {
      $this->setParams(array(
        'msgErr' => '***ERREUR : Anomalie non ajouter',
        ));
    }
    $this->render('user/gestionAnomalies');
	}

  public function suppAnomalie(){
    $this->setParams(array());
    $id 						           = trim($_POST['id']);
		$modelListeanomalie  = $this->getModel('Listeanomalie');
		if($modelListeanomalie->suppAnomalies($id)){
    $listeanomalies =  $modelListeanomalie->listeAnomalies($_SESSION['idressource'] );
		$this->setParams(array(
			'msgSucc' => "L'annnomalie a été retirer",
      'listeanomalies' => $listeanomalies
    ));
		}else{
			$this->setParams(array(
         'msgErr' => "***ERREUR : Suppression de l'annomalie impossible"
      ));
		}
    $this->render('user/gestionAnomalies');
  }	
  
  public function modifAnomalies(){
    $this->setParams(array());
    $id 						             = trim($_POST['id']);
    $etat 						           = trim($_POST['etat']);
		$modelListeanomalie  = $this->getModel('Listeanomalie');
      if($modelListeanomalie->modifAnomalie($id, $etat)){
      $listeanomalies =  $modelListeanomalie->listeAnomalies($_SESSION['idressource'] );
      $this->setParams(array(
        'msgSucc' => "L'annnomalie à été mise à jour.",
        'listeanomalies' => $listeanomalies
      ));
		}else{
			$this->setParams(array(
         'msgErr' => "***ERREUR : mise à jour de l'annomalie impossible"
      ));
		}
    $this->render('user/gestionAnomalies');
  }
  
	public function listeanomalie(){
      $this->setParams(array());
      $id            = trim($_POST['idressource']);
      $ressources    = trim($_POST['ressource']);
      $localisations = trim($_POST['localisation']);
      $_SESSION['idressource'] = $id;
      $model = $this->getModel('Listeanomalie');
 			$listeanomalies = $model->listeAnomalies($id);
      $this->setParams(array(
        'QRcode'	      => $ressources.'/'. $localisations,
        'listeanomalies'	=> $listeanomalies
      ));
      $this->render('user/gestionAnomalies'); 
	}

  public function generate(){
    $this->render('user/generate');
  }

  public function QRcode(){
    $this->render('user/QRCODE/index');
  }

  public function urlRessource(){
    $this->setParams(array());
    $model    = $this->getModel('Ressource');
 		$listeressources =  $model->listeRessources($_SESSION['user_id']);
    $this->setParams(array('listeressources'			=> $listeressources));
    $this->render('user/url');
  }

  public function urlR(){
    $this->setParams(array());
    $ressource 						               = trim($_POST['ressource']);
    $localisation 						           = trim($_POST['localisation']);
		$modelRessource  = $this->getModel('Ressource');
    $res = $modelRessource->getAllTable('ressource');
    foreach ($res as $value) {
      if($ressource == $value->description && $localisation == $value->localisation){
        $this->setParams(array(
          'ressource'	=> $value
        ));
      }
    }
    $this->render('user/url');
  }

}
