<?php
class Controller{
	public $request;
	public $model;
	private $parms 		= array();
    protected $renderd  = false;

	function __consrtruct($request){
		$this->request = $request;
	}

	public function render($myView){
		if($this->renderd){ 
			return false;
		}
		extract($this->parms);
		$myView = APP.DS.'views'.DS.$myView.'.php';
		require_once $myView;
		$this->renderd = true;
	}

	public function setParams($arg, $value = null){
		if(is_array($arg)){
			$this->parms += $arg;
		}else{
			$this->parms[$arg] = $value;
		}
	}

	function getModel($nameMode){
		$pathModel = APP.DS.'models'.DS.$nameMode.'.php';
		require_once($pathModel);
		$this->model = new $nameMode();
		return $this->model;
	}

	public function createUserSession($user){
	      $_SESSION['user_id'] = $user->id;
	      $_SESSION['user_email'] = $user->email;
	      $_SESSION['user_username'] = $user->username;
    }

    public function logoutSession(){
	     if(isset($_SESSION['user_id'])) unset($_SESSION['user_id']);
	     if(isset($_SESSION['user_email'])) unset($_SESSION['user_email']);
	     if(isset($_SESSION['user_name'])) unset($_SESSION['user_name']);
	     $this->session = array();
		 session_destroy();
	      
    }

    public function isConnect(){
	    if(isset($_SESSION['user_id'])){
	    	return true;
	    } else {	
	        return false;
	    }
    }

    function isParmsNull(){
    	return ($this->parms == array());
    }
}
?>