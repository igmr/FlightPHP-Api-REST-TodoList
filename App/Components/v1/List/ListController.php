<?php

require_once __DIR__.'/../../../Utils/Response.php';
require_once __DIR__.'/ListModel.php';

class ListController extends Response
{
	//*	***************************************************************************
	//*	General
	//*	***************************************************************************
	protected $listModel;
	public function __construct()
	{
		$this->listModel = new ListModel();
	}
	//*	***************************************************************************
	//*	Methods HTTP
	//*	***************************************************************************
	public function index()
	{
		try {
			//*	***************************************************************************
			//*	FIND ALL
			//*	***************************************************************************
			$data = $this->listModel->findAll();
			return $this->getResponseData($data);
		} catch (\Exception $e) {
			$except = ['general' => 'Excepción no controlada'];
			return $this->getResponseException($except);
		}
	}
	public function show(string $id)
	{
		try {
			//*	***************************************************************************
			//*	FIND LIST BY ID
			//*	***************************************************************************
			$data = $this->listModel->findOneById($id);
			return $this->getResponseData($data);
		} catch (\Exception $e) {
			$except = ['general' => 'Excepción no controlada'];
			return $this->getResponseException($except);
		}
	}
	public function store()
	{
		try {
			//*	***************************************************************************
			//*	VALIDATION
			//*	***************************************************************************
			$errors = $this->verifyDataStore();
			if(count($errors)>0)
			{
				return $this->getResponseError($errors);
			}
			//*	***************************************************************************
			//*	CREATE
			//*	***************************************************************************
			$name = Flight::request()->data->name ?:null;
			if(!is_null($name))
			{
				$name = $this->setString($name);
			}
			$created = $this->listModel->store($name);
			if(!$created)
			{
				return $this->getResponseError(['general'=>'Error no localizado.']);
			}
			return $this->getResponseSuccess('Lista registrada.',201);
		} catch (\Exception $e) {
			$except = ['general' => 'Excepción no controlada'];
			return $this->getResponseException($except);
		}
	}
	public function edit(string $id)
	{
		try {
			//*	***************************************************************************
			//*	VALIDATION
			//*	***************************************************************************
			$errors = $this->verifyDataEdit($id);
			if(count($errors)>0)
			{
				return $this->getResponseError($errors);
			}
			//*	***************************************************************************
			//*	UPDATED
			//*	***************************************************************************
			$name = Flight::request()->data->name ?:null;
			if(!is_null($name))
			{
				$name = $this->setString($name);
			}
			$updated = $this->listModel->edit($id, $name);
			if(!$updated)
			{
				return $this->getResponseError(['general'=>'Error no localizado.']);
			}
			return $this->getResponseSuccess('Lista actualizada.');
		} catch (\Exception $e) {
			$except = ['general' => 'Excepción no controlada'];
			return $this->getResponseException($except);
		}
	}
	public function delete(string $id)
	{
		try {
			//*	***************************************************************************
			//*	VALIDATION
			//*	***************************************************************************
			$errors = $this->verifyDataDelete($id);
			if(count($errors)>0)
			{
				return $this->getResponseError($errors);
			}
			//*	***************************************************************************
			//*	DELETED
			//*	***************************************************************************
			$deleted = $this->listModel->delete($id);
			if(!$deleted)
			{
				return $this->getResponseError(['general'=>'Error no localizado.']);
			}
			return $this->getResponseSuccess('Lista eliminada.');
		} catch (\Exception $e) {
			$except = ['general' => 'Excepción no controlada'];
			return $this->getResponseException($except);
		}
	}
	//*	***************************************************************************
	//*	Methods Validation request
	//*	***************************************************************************
	private function verifyDataStore()
	{
		$req = Flight::request()->data;
		if(count($req)== 0)
		{
			return ['general'	=>	'Datos no localizados.'];
		}
		$name = $req->name?:null;
		if(is_null($name))
		{
			return ['name'	=>	'Es requerido.'];
		}
		if(strlen($name)> 65)
		{
			return ['name'	=>	'Longitud inválido.'];
		}
		$data = $this->listModel->findListByName($name);
		if(count($data) > 0)
		{
			return ['name'	=>	'Ya existe.'];
		}
		return [];
	}
	public function verifyDataEdit($id)
	{
		$req = Flight::request()->data;
		if(count($req)== 0)
		{
			return ['general'	=>	'Datos no localizados'];
		}
		$message_error_id = '';
		$message_error_name = '';
		$name = $req->name?:null;
		$id = $id?:0;

		if(count($this->listModel->findOneById($id)) == 0)
		{
			$message_error_id = 'No existe.';
		}
		if($id <= 1)
		{
			$message_error_id = 'Datos inválidos.';
		}
		if(count($this->listModel->findListByName($name)))
		{
			$message_error_name ='Ya existe.';
		}
		if(is_null($name))
		{
			$message_error_name ='Es requerido.';
		}
		if(strlen($name)> 65)
		{
			$message_error_name ='Longitud inválido.';
		}
		$errors = [];
		if(strlen($message_error_id)> 0)
		{
			$errors['id']= $message_error_id;
		}
		if(strlen($message_error_name)> 0)
		{
			$errors['name']= $message_error_name;
		}
		return $errors;
	}
	public function verifyDataDelete($id)
	{
		if((int) $id <=1)
		{
			return ['id'=>'Valor inválido'];
		}
		if(count($this->listModel->findOneById($id)) == 0)
		{
			return ['id'=>'No existe'];
		}
		return [];
	}
}