<?php

$array = array(
	getConB('news')=>array(
		getConD('news')=>"view",
		getConB('news/create')=>"create",
		getConA('news/all')=>"all",
		getConB('news')=>"index"
	)
);




//Строгий запрос
/**
* $str = news/create
* request = news
*/
function getConB($str){
	return "~\b".$str."$~";
}

//С числовыми значениями
/**
* $str = news
* request = news/1213212123165465454
*/
function getConD($str){
	return "~".$str."/\d+$~";
}

//отвечает на все зваросы начинающим $str/request
/**
* $str = news
* request = news/jhkdfkdjsf/fdsljkfksd/fsdjsd/klskjfhds
*/
function getConA($str){
	return "~^".$str."/~";
}


return $array;