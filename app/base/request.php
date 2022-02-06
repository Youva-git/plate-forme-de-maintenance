<?php
class Request{
	public $url;
	function __construct(){
		if(isset($_GET['url'])){
			$this->url= $_GET['url'];
		}
	}
}
?>
