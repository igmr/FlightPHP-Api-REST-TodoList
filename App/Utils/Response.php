<?php

class Response{
	//*	***********************************************************************
	//*	RESPONSE API REST
	//*	***********************************************************************
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
}