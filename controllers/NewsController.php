<?php

class NewsController{
	
	public function actionIndex(){
		echo "Controller : NewsController<br>";
		echo "Action : actionIndex<br>";
	}
	
	public function actionView($id){
		echo "Controller : NewsController<br>";
		echo "Action : actionView ($id)<br>";
	}
	public function actionCreate(){
		echo "Controller : NewsController<br>";
		echo "Action : actionCreate<br>";
	}
	public function actionAll($array){
		echo "Controller : NewsController<br>";
		echo "Action : actionAll<br>";
		
		echo "<pre>";
		print_r($array);
		echo "</pre>";
	}
	
}