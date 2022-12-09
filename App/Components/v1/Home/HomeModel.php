<?php

class HomeModel {
	public function getDocData ()
	{
		return [
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
									"title"		=>	 '',
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
									"title"		=>	 '',
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
									"title"		=>	 '',
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
									"title"		=>	 '',
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
							'title'	=>	[
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
							'title'	=>	[
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
	}
}