<?php

require_once __DIR__.'/../../../Utils/Response.php';
require_once __DIR__.'/HomeModel.php';

class HomeController extends Response
{
	//*	***************************************************************************
	//*	General
	//*	***************************************************************************
	protected $homeModel;
	public function __construct()
	{
		$this->homeModel = new HomeModel();
	}
	public function index()
	{
		$data = $this->homeModel->getDocData();
		return $this->getResponseData($data);
	}
}