<?php

require('./vendor/autoload.php');

//*	General
require('./Config.php');
require('./src/services/BaseService.php');
//*	Lists
require('./src/models/ListModel.php');
require('./src/services/ListService.php');
//*	Task
require('./src/models/TaskModel.php');
require('./src/services/TaskService.php');


//*	*****************************************************************************
//*	Configuración general														*
//*	*****************************************************************************
$host = Flight::get('host');
$db = Flight::get('db');
$user = Flight::get('user');
$pass = Flight::get('password');
//*	Crear conexión hacia base de datos
Flight::register('db', 'PDO', array('mysql:host='.$host.';dbname='.$db, $user, $pass));
//*	Instancia de servicios
$listService = new ListService();
$taskService = new TaskService();

//*	*****************************************************************************
//*	Configuración RUTAS															*
//*	*****************************************************************************
function doc()
{
	$docs = [
		'base_api'		=>	'https://ivangabino.com/apis/flightphp-api-rest/api',
		'clone'			=>	'git clone git@github.com:igmr/FlightPHP-Api-REST-TodoList.git',
		'requirements'	=>	['php5.3^', 'composer', 'mysql'],
		'composer'		=>	'composer update',
		'cmd'			=>	'php -S localhost:8081',
		'routes'	=>	[
			'lists'		=>	[
				[
					'method'		=>	'GET',
					'url'			=>	'https://ivangabino.com/apis/flightphp-api-rest/api/list',
					'description'	=>	'Listado de listas',
					'Content/Type'	=>	'Application/json',
					'params'		=>	[],
					'body'			=>	[],
					'data'			=>	[
						[
							'code'		=>	200,
							'data'		=>	[
								'id'	=>	'',
								'name'	=>	'',	
							]
						],
						[
							'code'	=>	500,
							'data'	=>	[
								'type'	=>	'exception',
								'error'	=>	[],
							],
						],
					],
				],
				[
					'method'		=>	'GET',
					'url'			=>	'https://ivangabino.com/apis/flightphp-api-rest/api/list/{id}',
					'description'	=>	'Obtener lista',
					'Content/Type'	=>	'Application/json',
					'params'		=>	[
						'id'	=>[
							'description'	=>	'Identificado de lista',
							'type'			=>	'integer',
							'required'		=>	true,
						],
					],
					'body'			=>	[],
					'data'			=>	[
						[
							'code'		=>	200,
							'data'		=>	[
								'id'			=>	'',
								'name'			=>	'',	
							]
						],
						[
							'code'		=>	500,
							'data'		=>	[
								'type'		=>	'exception',
								'error'		=>	[],
							],
						],
					],
				],
				[
					'method'		=>	'POST',
					'url'			=>	'https://ivangabino.com/apis/flightphp-api-rest/api/list',
					'description'	=>	'Crear lista',
					'Content/Type'	=>	'Application/json',
					'params'		=>	[],
					'body'			=>	[
						'name'	=>[
							'description'	=>	'Nombre de lista',
							'type'			=>	'string(65)',
							'required'		=>	true,
						],
					],
					'data'			=>	[
						[
							'code'		=>	201,
							'data'		=>	[
								'type'		=>	'success',
								'message'	=>	'',
							],
						],
						[
							'code'		=>	400,
							'data'		=>	[
								'type'		=>	'error',
								'error'		=>	[],
							],
						],
						[
							'code'		=>	500,
							'data'		=>	[
								'type'		=>	'exception',
								'error'		=>	[],
							],
						],
					],
				],
				[
					'method'		=>	'PUT',
					'url'			=>	'https://ivangabino.com/apis/flightphp-api-rest/api/list/{id}',
					'description'	=>	'Actualizar lista',
					'Content/Type'	=>	'Application/json',
					'params'		=>	[
						'id'	=>	[
							'description'	=>	'Identificador de lista',
							'type'			=>	'integer',
							'required'		=>	true,
						],
					],
					'body'			=>	[
						'name'	=>	[
							'description'	=>	'Nombre de lista',
							'type'			=>	'string(65)',
							'required'		=>	true,
						],
					],
					'data'			=>	[
						[
							'code'		=>	200,
							'data'		=>	[
								'type'		=>	'success',
								'message'	=>	'',
							],
						],
						[
							'code'		=>	400,
							'data'		=>	[
								'type'		=>	'error',
								'error'		=>	[],
							],
						],
						[
							'code'		=>	500,
							'data'		=>	[
								'type'		=>	'exception',
								'error'		=>	[],
							],
						],
					],
				],
				[
					'method'		=>	'DELETE',
					'url'			=>	'https://ivangabino.com/apis/flightphp-api-rest/api/list/{id}',
					'description'	=>	'Eliminar lista',
					'Content/Type'	=>	'Application/json',
					'params'		=>	[
						'id'	=>	[
							'description'	=>	'Identificador de lista',
							'type'			=>	'integer',
							'required'		=>	true,
						],
					],
					'body'			=>	[],
					'data'			=>	[
						[
							'code'		=>	200,
							'data'		=>	[
								'type'		=>	'success',
								'message'	=>	'',
							],
						],
						[
							'code'		=>	400,
							'data'		=>	[
								'type'		=>	'error',
								'error'		=>	[],
							],
						],
						[
							'code'		=>	500,
							'data'		=>	[
								'type'		=>	'exception',
								'error'		=>	[],
							],
						],
					],
				],
			],
			'tasks'		=>	[
				[
					'method'		=>	'GET',
					'url'			=>	'https://ivangabino.com/apis/flightphp-api-rest/api/task',
					'description'	=>	'lista de tareas',
					'Content/Type'	=>	'Application/json',
					'params'		=>	[],
					'body'			=>	[],
					'data'			=>	[
						[
							'code'		=>	200,
							'data'		=>	[
								"id"			=>	 '',
								"tittle"		=>	 '',
								"description"	=>	 '',
								"list"			=>	 '',
								"complete"		=>	 '',
							]
						],
						[
							'code'	=>	500,
							'data'	=>	[
								'type'	=>	'exception',
								'error'	=>	[],
							],
						],
					],
				],
				[
					'method'		=>	'GET',
					'url'			=>	'https://ivangabino.com/apis/flightphp-api-rest/api/task/{id}',
					'description'	=>	'lista de tareas',
					'Content/Type'	=>	'Application/json',
					'params'		=>	[
						'id'	=>[
							'description'	=>	'Identificado de tarea',
							'type'			=>	'integer',
							'required'		=>	true,
						],
					],
					'body'			=>	[],
					'data'			=>	[
						[
							'code'		=>	200,
							'data'		=>	[
								"id"			=>	 '',
								"tittle"		=>	 '',
								"description"	=>	 '',
								"list"			=>	 '',
								"complete"		=>	 '',
							]
						],
						[
							'code'	=>	500,
							'data'	=>	[
								'type'	=>	'exception',
								'error'	=>	[],
							],
						],
					],
				],
				[
					'method'		=>	'GET',
					'url'			=>	'https://ivangabino.com/apis/flightphp-api-rest/api/task/completed',
					'description'	=>	'lista de tareas completadas',
					'Content/Type'	=>	'Application/json',
					'params'		=>	[],
					'body'			=>	[],
					'data'			=>	[
						[
							'code'		=>	200,
							'data'		=>	[
								"id"			=>	 '',
								"tittle"		=>	 '',
								"description"	=>	 '',
								"list"			=>	 '',
								"complete"		=>	 '',
							]
						],
						[
							'code'	=>	500,
							'data'	=>	[
								'type'	=>	'exception',
								'error'	=>	[],
							],
						],
					],
				],
				[
					'method'		=>	'GET',
					'url'			=>	'https://ivangabino.com/apis/flightphp-api-rest/api/task/deleted',
					'description'	=>	'lista de tareas eliminadas',
					'Content/Type'	=>	'Application/json',
					'params'		=>	[],
					'body'			=>	[],
					'data'			=>	[
						[
							'code'		=>	200,
							'data'		=>	[
								"id"			=>	 '',
								"tittle"		=>	 '',
								"description"	=>	 '',
								"list"			=>	 '',
								"complete"		=>	 '',
							]
						],
						[
							'code'	=>	500,
							'data'	=>	[
								'type'	=>	'exception',
								'error'	=>	[],
							],
						],
					],
				],
				[
					'method'		=>	'POST',
					'url'			=>	'https://ivangabino.com/apis/flightphp-api-rest/api/task',
					'description'	=>	'Crear tarea',
					'Content/Type'	=>	'Application/json',
					'params'		=>	[],
					'body'			=>	[
						'tittle'	=>	[
							'description'	=>	'Titulo de tarea',
							'type'			=>	'string(120)',
							'required'		=>	true,
						],
						'description'	=>	[
							'description'	=>	'Descripción de tarea',
							'type'			=>	'string(512)',
							'required'		=>	false,
						],
						'list'	=>	[
							'description'	=>	'Identificador de lista',
							'type'			=>	'integer',
							'required'		=>	false,
						],
					],
					'data'			=>	[
						[
							'code'		=>	201,
							'data'		=>	[
								'type'		=>	'success',
								'message'	=>	'',
							],
						],
						[
							'code'		=>	400,
							'data'		=>	[
								'type'		=>	'error',
								'error'		=>	[],
							],
						],
						[
							'code'		=>	500,
							'data'		=>	[
								'type'		=>	'exception',
								'error'		=>	[],
							],
						],
					],
				],
				[
					'method'		=>	'POST',
					'url'			=>	'https://ivangabino.com/apis/flightphp-api-rest/api/task/completed/{id}',
					'description'	=>	'Completar tarea.',
					'Content/Type'	=>	'Application/json',
					'params'		=>	[
						'id'	=>	[
							'description'	=>	'Identificador de tarea',
							'type'			=>	'integer',
							'required'		=>	true,
						],

					],
					'body'			=>	[
					],
					'data'			=>	[
						[
							'code'		=>	201,
							'data'		=>	[
								'type'		=>	'success',
								'message'	=>	'',
							],
						],
						[
							'code'		=>	400,
							'data'		=>	[
								'type'		=>	'error',
								'error'		=>	[],
							],
						],
						[
							'code'		=>	500,
							'data'		=>	[
								'type'		=>	'exception',
								'error'		=>	[],
							],
						],
					],
				],
				[
					'method'		=>	'PUT',
					'url'			=>	'https://ivangabino.com/apis/flightphp-api-rest/api/task/{id}',
					'description'	=>	'Actualizar tarea',
					'Content/Type'	=>	'Application/json',
					'params'		=>	[
						'id'	=>	[
							'description'	=>	'Identificador de tarea',
							'type'			=>	'integer',
							'required'		=>	false,
						],
					],
					'body'			=>	[
						'tittle'	=>	[
							'description'	=>	'Titulo de tarea',
							'type'			=>	'string(120)',
							'required'		=>	false,
						],
						'description'	=>	[
							'description'	=>	'Descripción de tarea',
							'type'			=>	'string(512)',
							'required'		=>	false,
						],
						'list'	=>	[
							'description'	=>	'Identificador de lista',
							'type'			=>	'integer',
							'required'		=>	false,
						],
					],
					'data'			=>	[
						[
							'code'		=>	201,
							'data'		=>	[
								'type'		=>	'success',
								'message'	=>	'',
							],
						],
						[
							'code'		=>	400,
							'data'		=>	[
								'type'		=>	'error',
								'error'		=>	[],
							],
						],
						[
							'code'		=>	500,
							'data'		=>	[
								'type'		=>	'exception',
								'error'		=>	[],
							],
						],
					],
				],
				[
					'method'		=>	'DELETE',
					'url'			=>	'https://ivangabino.com/apis/flightphp-api-rest/api/task/{id}',
					'description'	=>	'Eliminación lógico de tarea',
					'Content/Type'	=>	'Application/json',
					'params'		=>	[
						'id'	=>	[
							'description'	=>	'Identificador de lista',
							'type'			=>	'integer',
							'required'		=>	true,
						],
					],
					'body'			=>	[],
					'data'			=>	[
						[
							'code'		=>	200,
							'data'		=>	[
								'type'		=>	'success',
								'message'	=>	'',
							],
						],
						[
							'code'		=>	400,
							'data'		=>	[
								'type'		=>	'error',
								'error'		=>	[],
							],
						],
						[
							'code'		=>	500,
							'data'		=>	[
								'type'		=>	'exception',
								'error'		=>	[],
							],
						],
					],
				],
				[
					'method'		=>	'DELETE',
					'url'			=>	'https://ivangabino.com/apis/flightphp-api-rest/api/task/destroy',
					'description'	=>	'Destruir tareas eliminadas.',
					'Content/Type'	=>	'Application/json',
					'params'		=>	[],
					'body'			=>	[],
					'data'			=>	[
						[
							'code'		=>	200,
							'data'		=>	[
								'type'		=>	'success',
								'message'	=>	'',
							],
						],
						[
							'code'		=>	400,
							'data'		=>	[
								'type'		=>	'error',
								'error'		=>	[],
							],
						],
						[
							'code'		=>	500,
							'data'		=>	[
								'type'		=>	'exception',
								'error'		=>	[],
							],
						],
					],
				],
			],
		],
	];
	Flight::json($docs, 200);
}
Flight::route('GET /', 'doc');
Flight::route('GET /api', 'doc');

//*	RUTAS http://localshot:8081/api/list
//*	*****************************************************************************
Flight::route('GET /api/list'				,array($listService, 'index'));
Flight::route('GET /api/list/@id:[0-9]+'	,array($listService, 'show'));
Flight::route('POST /api/list'				,array($listService, 'store'));
Flight::route('PUT /api/list/@id:[0-9]+'	,array($listService, 'edit'));
Flight::route('DELETE /api/list/@id:[0-9]+'	,array($listService, 'delete'));

//*	RUTAS http://localshot:8081/api/task
//*	*****************************************************************************
Flight::route('GET /api/task'						,array($taskService, 'index'));
Flight::route('GET /api/task/completed'				,array($taskService, 'completed'));
Flight::route('GET /api/task/deleted'				,array($taskService, 'deleted'));
Flight::route('GET /api/task/@id:[0-9]+'			,array($taskService, 'show'));
Flight::route('POST /api/task'						,array($taskService, 'store'));
Flight::route('POST /api/task/completed/@id:[0-9]+'	,array($taskService, 'complete'));
Flight::route('PUT /api/task/@id:[0-9]+'			,array($taskService, 'edit'));
Flight::route('DELETE /api/task/@id:[0-9]+'			,array($taskService, 'delete'));
Flight::route('DELETE /api/task/destroy'			,array($taskService, 'destroy'));
//*	RUTAS errores
//*	*****************************************************************************
Flight::map('notFound', function(){Flight::json(["No encontrado"],404);});
//Flight::map('error', function(Exception $ex){Flight::json(["Excepción no controlado"],500);});

Flight::start();