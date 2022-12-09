<?php

require_once __DIR__.'/../../../Utils/Response.php';
require_once __DIR__.'/../List/ListModel.php';
require_once __DIR__.'/TaskModel.php';

class TaskController extends Response
{
	//*	***************************************************************************
	//*	General
	//*	***************************************************************************
	protected $taskModel;
	protected $listModel;
	public function __construct()
	{
		$this->taskModel = new TaskModel();
		$this->listModel = new ListModel();
	}
	//*	***************************************************************************
	//*	Methods HTTP
	//*	***************************************************************************
	//*	GET
	//*	***************************************************************************
	public function index()
	{
		try {
			//*	***************************************************************************
			//*	FIND ALL
			//*	***************************************************************************
			$data = $this->taskModel->findAll();
			return $this->getResponseData($data);	
		} catch (\Exception $e) {
			$except = ['general' => 'Excepción no controlada'];
			return $this->getResponseException($except);
		}
	}
	public function completed()
	{
		try {
			//*	***************************************************************************
			//*	FIND ALL COMPLETED
			//*	***************************************************************************
			$data = $this->taskModel->findAllCompleted();
			return $this->getResponseData($data);	
		} catch (\Exception $e) {
			$except = ['general' => 'Excepción no controlada'];
			return $this->getResponseException($except);
		}
	}
	public function deleted()
	{
		try {
			//*	***************************************************************************
			//*	FIND ALL DELETED
			//*	***************************************************************************
			$data = $this->taskModel->findAllDeleted();
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
			//*	VALIDATION
			//*	***************************************************************************
			if(is_numeric($id) == false
				|| strlen($id) == 0
				|| is_null($id))
			{
				throw new Exception('Datos inválidos');
			}
			//*	***************************************************************************
			//*	FIND TASK BY ID
			//*	***************************************************************************
			$data = $this->taskModel->findOneById($id);
			return $this->getResponseData($data);
		} catch (\Exception $e) {
			$except = ['general' => 'Excepción no controlada'];
			return $this->getResponseException($except);
		}
	}
	//*	POST
	//*	***************************************************************************
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
			$title = Flight::request()->data->title ?:'';
			$description = Flight::request()->data->description ?:'';
			$list = Flight::request()->data->list ?:1;
			$complete = false;
			$title = $this->setString($title);
			$description = $this->setString($description);
			$created = $this->taskModel->store($title, $description
				, $list,$complete);
			if(!$created)
			{
				return $this->getResponseError(['general'=>'Error no localizado.']);
			}
			return $this->getResponseSuccess('Tarea registrada.',201);
		} catch (\Exception $e) {
			$except = ['general' => 'Excepción no controlada'];
			return $this->getResponseException($except);
		}
	}
	public function complete(string $id)
	{
		try {
			//*	***************************************************************************
			//*	VALIDATION
			//*	***************************************************************************
			$errors = $this->verifyId($id);
			if(count($errors)>0)
			{
				return $this->getResponseError($errors);
			}
			//*	***************************************************************************
			//*	COMPLETED
			//*	***************************************************************************
			$completed = $this->taskModel->taskCompleted($id);
			if(!$completed)
			{
				return $this->getResponseError(['general'=>'Error no localizado.']);
			}
			return $this->getResponseSuccess('Tarea completada.');
		} catch (\Exception $e) {
			$except = ['general' => 'Excepción no controlada'];
			return $this->getResponseException($except);
		}
	}
	//*	PUT
	//*	***************************************************************************
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
			$title = Flight::request()->data->title ?: '';
			$description = Flight::request()->data->description ?: '';
			$list = Flight::request()->data->list ?:0;
			$title = $this->setString($title);
			$description = $this->setString($description);
			$updated = $this->taskModel->edit($id, $title, $description
				, $list);
			if(!$updated)
			{
				return $this->getResponseError(['general'=>'Error no localizado.']);
			}
			return $this->getResponseSuccess('Tarea actualizada.');
		} catch (\Exception $e) {
			$except = ['general' => 'Excepción no controlada'];
			return $this->getResponseException($except);
		}
	}
	//*	DELETE
	//*	***************************************************************************
	public function delete(string $id)
	{
		try {
			//*	***************************************************************************
			//*	VALIDATION
			//*	***************************************************************************
			$errors = $this->verifyId($id);
			if(count($errors)>0)
			{
				return $this->getResponseError($errors);
			}
			//*	***************************************************************************
			//*	DELETED
			//*	***************************************************************************
			$deleted = $this->taskModel->delete($id);
			if(!$deleted)
			{
				return $this->getResponseError(['general'=>'Error no localizado.']);
			}
			return $this->getResponseSuccess('Tarea eliminada.');
		} catch (\Exception $e) {
			$except = ['general' => 'Excepción no controlada'];
			return $this->getResponseException($except);
		}
	}
	public function destroy()
	{
		try {
			//*	***************************************************************************
			//*	DESTROY
			//*	***************************************************************************
			$destroy = $this->taskModel->destroy();
			if(!$destroy)
			{
				return $this->getResponseError(['general'=>'Error no localizado.']);
			}
			return $this->getResponseSuccess('Tareas eliminadas.');
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
		$errors = [];
		$req = Flight::request()->data;
		$title = $req->title ?: null;
		$description = $req->description ?: null;
		$list = $req->list ?: 0;
		if(count($req)== 0)
		{
			$errors['general'] = 'Datos no localizados.';
		}
		if(is_null($title))
		{
			$errors['title'] = 'Es requerido.';
		}
		if(strlen($title)> 120)
		{
			$errors['title'] = 'Longitud inválido.';
		}
		if(!is_null($description))
		{
			if(strlen($description)> 511)
			{
				$errors['description'] = 'Longitud inválido.';
			}
		}
		if($list > 0)
		{
			$data = $this->listModel->findOneById($list);
			if(count($data) == 0)
			{
				$errors['list'] = 'Es requerido.';
			}
		}
		return $errors;
	}
	private function verifyDataEdit(string $id)
	{
		$errors = [];
		$req = Flight::request()->data;
		$title = $req->title ?: null;
		$description = $req->description ?: null;
		$list = $req->list ?: 0;
		$id = $id?:0;
		if($id <= 1)
		{
			$errors['id'] = 'Datos inválidos.';
		}
		if(count($req)== 0)
		{
			$errors['general'] = 'Datos no localizados.';
		}
		if(!is_null($title))
		{
			if(strlen($title)> 120)
			{
				$errors['title'] = 'Longitud inválido.';
			}
		}
		if(!is_null($description))
		{
			if(strlen($description)> 511)
			{
				$errors['description'] = 'Longitud inválido.';
			}
		}
		if($list > 0)
		{
			$data = $this->listModel->findOneById($list);
			if(count($data) == 0)
			{
				$errors['list'] = 'No existe.';
			}
		}
		return $errors;
	}
	private function verifyId(string $id)
	{
		$errors = [];
		$id = $id?:0;
		if($id <= 1)
		{
			$errors['id'] = 'Datos inválidos.';
		}
		$data = $this->taskModel->findOneById($id);
		if(count($data) == 0)
		{
			$errors['id'] = 'No existe.';
		}
		return $errors;
	}
}