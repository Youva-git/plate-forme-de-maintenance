<?php
class PageController extends Controller
{	
	function home(){
		$this->render('home/home');
	}

	function login(){	
		$this->render('home/login');
	}

	function signup(){
		$this->render('home/signup');
	}
}
?>
