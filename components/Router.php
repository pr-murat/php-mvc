<?php
class Router{

	private function getControllerAction($url){
		$routes = include_once(ROOT.'\config\routes.php');

		$controllerrequest = array_shift(explode("/",$url));
		//echo "$controllerrequest<br>";//Имя контроллера

		//Посик все контроллеры
		foreach($routes as $controller => $actions){
			//echo "$controller<br>";
			if (preg_match($controller,$controllerrequest)) {//Проверим наличие контроллера
				//Перебирать все Actions
				foreach ($actions as $key => $action) {//Здесь $key шаблон (из массива routes), а $action (из массива routes)
					
					//echo "$key--->>><br>";//Имя экшна
					if(preg_match($key,$url)) {//проверим наличие action
						
						//Проверка запрос по ID (Если цифра, то запоминаем)
						/*$id = null;*/
						$arrayactions = explode("/",$url);
						/*foreach($arrayactions as $value){
							if(is_numeric($value)){
								$id = $value;
								//echo $id;
							}
						}*/
						
						array_shift($arrayactions);
						array_shift($arrayactions);

						return array(ucfirst($controllerrequest)."Controller","action".ucfirst($action), $arrayactions);
					}
				}
			}
		}
		return false;
	}
	
	public function run(){
		//[0] - Controller, [1] Action, [2] id
		$array = $this->getControllerAction(trim($_SERVER['REQUEST_URI'],"/"));
		$controllerName = $array[0];
		$actionName = $array[1];
		$id = $array[2];
		
		if($array){
			require_once(ROOT."\controllers/".$controllerName.".php");
			
			$controller = new $controllerName;
			$controller->$actionName($id);
		}else{
			echo "ERROR : Not Found (404)";
		}
		
	}
}

$router = new Router();
$router->run();



