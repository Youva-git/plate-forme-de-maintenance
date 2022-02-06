<?php  session_start();
class UsersController extends Controller{
  function loginUser(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $this->setParams(array());
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data =[
        'username' => trim($_POST['username']),
        'password' => trim($_POST['password']),      
      ];
      $model = $this->getModel('User');
      if($model->findByUsername($data['username'])){ 
        $user =  $model->connect($data['username'], $data['password']); 
        if(!empty($user)){
          $this->createUserSession($user);
          if($model->isAdmin($data['username'], $data['password'])){
            $_SESSION['admin'] = TRUE;
            $this->render('admin/admin');
          }else{
            $_SESSION['user'] = TRUE;
            $this->render('user/acceuil');
          }
        }else{
          $this->setParams(array(
          'msgErr' => "Identifiants incorrects"));
          $this->render('home/login');
        }
      }else{
        $this->setParams(array(
            'msgErr' => "Identifiants incorrects"));
        $this->render('home/login');
      }  
    }else 
      $this->render('home/home');
 }

	function logoutUser(){
    $this->logoutSession();
	  $this->render('home/home');
	}

  public function userHome(){
    $this->render('user/acceuil');
  }
  
  public function homelisteanomalie(){
		$this->render('user/listeanomalies'); 
	}
  
	public function homeressource(){
		$this->render('user/listeRessources'); 
	}
}
