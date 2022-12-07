<?php

class BaseService{
	//*	***************************************************************************
	//*	RESPONSE API REST
	//*	***************************************************************************
	public function getResponseData(array $data, int $code = 200)
	{
		return Flight::json($data,$code);
	}
	public function getResponseSuccess(string $message ='', int $code = 200)
	{
		$payload = [
			'type'		=>	'success',
			'message'	=>	$message,
		];
		return Flight::json($payload,$code);
	}
	public function getResponseError(array $errors = [],int  $code = 400)
	{
		$payload = [
			'type'		=>	'error',
			'error'		=>	$errors,
		];
		return Flight::json($payload,$code);
	}
	public function getResponseException(array $except =[],int $code = 500)
	{
		$payload = [
			'type'		=>	'exception',
			'error'		=>	$except,
		];
		return Flight::json($payload,$code);
	}
	public function setString(string $text)
	{
		//*	Remplazar caracteres
		$search = array('á','é','í','ó','ú'
			,'<','>','|','"',"'",'#','$','%','&','/'
			,'(',')','=','´','*','+','¨','~','-','_'
			,':',';');
		$replace = array('a','e','i','o','u'
			,'','','','','','','','','',''
			,'','','','','','','','','',''
			,'','');
		$text = str_replace($search, $replace, $text);
		//*	Quitar espacio al inicio t al final
		$text = ltrim($text);
		$text = rtrim($text);
		//*	Escape de caracteres
		return addslashes($text);
	}
}