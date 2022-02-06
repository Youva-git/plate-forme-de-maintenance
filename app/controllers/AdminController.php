
<?php
class AdminController extends Controller{
	public function listeRspMtn(){
		$model = $this->getModel('User');
		$listeresponsable = $model->getAllUsers();
		$this->setParams($listeresponsable);
		$this->setParams(array(
                  'listeresponsable' => $listeresponsable));
		$this->render('admin/listeRspMtn'); 
	}
  public function ajoutRspMtn(){
        $this->setParams(array());
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data =[
          'username' => trim($_POST['username']),
          'nom' => trim($_POST['nom']),
          'prenom' => trim($_POST['prenom']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'confPassword' => trim($_POST['confPassword']),
        ];
        if(strlen($data['password']) < 8){
          $this->setParams(array(
                'errMdp' => '***ERRUR : Format mot de passe incorrect '));
        }else{

          if($data['password'] != $data['confPassword']){
            $this->setParams(array(
                'errMdpConf' => '***ERRUR : La confirmation est incorrecte'));
          }
        }
        if($this->isParmsNull()) {
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
          $model = $this->getModel('User');
          if((!$model->findByUsername($data['username'])) && (!$model->findByNom($data['nom'], $data['prenom']))){
            if($model->signup($data)){
              $this->setParams(array(
                  'succAjout' => 'L\'utilisateur a été ajouter avec succès'));
                  $this->render('admin/ajoutRspMtn');
            } else {
              $this->setParams(array(
                  'errAjout' => '***ERRUR: L\'ajout ne s\'est pas fait.'));
                  $this->render('admin/ajoutRspMtn');
                }
          }else{
            if(($model->findByNom($data['nom'], $data['prenom']))){
              $this->setParams(array(
                'errExist' => '***ERRUR : l\'utilisateur est déjà enregistrer sur la plate-forme.'));
                $this->render('admin/ajoutRspMtn');
            }
            $this->setParams(array(
                'errExist' => '***ERRUR : Login déjà pris.'));
            $this->render('admin/ajoutRspMtn');
            }
            
        } }else{
          $this->render('admin/ajoutRspMtn');
        }
  }
  
	public function suppRspMtn(){
		$model = $this->getModel('User');
		$user = $model->getAllUsers();
		$this->setParams($user);
		$this->setParams(array(
                  'listeresponsable' => $user));
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->setParams(array());
			$id 			= trim($_POST['id']);
			$modelressource = $this->getModel('Ressource');
			$modelanomalie  = $this->getModel('Listeanomalie');
			$ressource = $modelressource->findByAttr('ressource', 'idresponsable', $id);
			if($ressource){
				foreach ($ressource as $value) {
					if($modelanomalie->findByAttr('listeanomalie', 'ressource', $value->id)){
						echo "ok";
						$modelanomalie->suppRessourceAnomalies($value->id);
					  }
					  echo "ok";

					$modelressource->suppRessource($value->id);
				}
			}
			if($model->deleteByID('users', $id)){
				header('Location: ' . $_SERVER['HTTP_REFERER']);
				$this->setParams(array(
					'msgSucc' => "L'utilisateur a été retirer avec succés"));
			}else{
				$this->setParams(array(
                  'msgErr' => "Il y a un probleme lors de la suppression de l'utilisateur"));
			}
		}
		$this->render('admin/suppRspMtn'); 
	}

	public function admin(){
		$this->render('admin/admin'); 
	}

}
?>
