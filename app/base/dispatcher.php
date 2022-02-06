<?php
class Dispatcher{
	public $request;
	function __construct(){
		$req =  new Request();
		Router::parse($req->url, $req);
		$pathC = $this->isController($req);
		if(file_exists($pathC)){	
			$this->request = $req;
			$controller = $this->myController();
			if(!in_array($this->request->action, array_diff(get_class_methods($controller), get_class_methods('Controller')))|| (is_null($this->request->action))){
				$controller->render('error');

			}else{
			call_user_func_array(array($controller, $this->request->action), $this->request->parms);
			}
		}else{
			$controllerHome = new Controller();
			$controllerHome->render('home/home');
		}
	}

	function isController($req){
		$nameController = ucfirst($req->controller).'Controller';
		$pathController = APP.DS.'controllers'.DS.$nameController.'.php';
		return $pathController;
	}

	function myController(){
		$nameController = ucfirst($this->request->controller).'Controller';
		$pathController = APP.DS.'controllers'.DS.$nameController.'.php';
		require $pathController;
		$cntr = new $nameController();
		return $cntr;
	}
}
?>