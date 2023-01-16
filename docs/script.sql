
--	*	-----------------------------------------------------------------------
--	*	Database FlightToDo
--	*	-----------------------------------------------------------------------
DROP DATABASE IF EXISTS ApiFlightToDo;
CREATE DATABASE IF NOT EXISTS ApiFlightToDo;
USE ApiFlightToDo;

--	*	-----------------------------------------------------------------------
--	*	Table Lists
--	*	-----------------------------------------------------------------------
DROP TABLE IF EXISTS Lists;
CREATE TABLE IF NOT EXISTS Lists (
	id			INT			UNSIGNED	NOT	NULL					AUTO_INCREMENT	COMMENT	'Primary key',
	name		VARCHAR(65)				NOT	NULL									COMMENT	'Name list',
	created_at	DATETIME				NOT	NULL	DEFAULT NOW()					COMMENT	'Audit',
	updated_at	DATETIME					NULL	DEFAULT NULL					COMMENT	'Audit',
	deleted_at	DATETIME					NULL	DEFAULT NULL					COMMENT	'Audit',
	CONSTRAINT pk_list		PRIMARY KEY (id),
	CONSTRAINT uk_id_list	UNIQUE(id ASC) VISIBLE,
	CONSTRAINT uk_name_list	UNIQUE(name ASC) VISIBLE
)ENGINE = InnoDB
COMMENT = 'Lists';

INSERT INTO Lists(name, created_at)
VALUES
	('Todos', NOW()),
	('Proyecto FlightPHP - todo', NOW()),
	('Lista 02', NOW()),
	('Lista 03', NOW()),
	('Lista 04', NOW()),
	('Lista 05', NOW()),
	('Lista 06', NOW()),
	('Lista 07', NOW()),
	('Lista 08', NOW()),
	('Lista 09', NOW()),
	('Lista 10', NOW());

--	*	-----------------------------------------------------------------------
--	*	Table Tasks
--	*	-----------------------------------------------------------------------
DROP TABLE IF EXISTS Tasks;
CREATE TABLE IF NOT EXISTS Tasks (
	id			INT			UNSIGNED	NOT	NULL					AUTO_INCREMENT	COMMENT	'Primary key',
	list_id		INT			UNSIGNED		NULL	DEFAULT	1						COMMENT	'Foreign key',
	title		VARCHAR(120)			NOT	NULL									COMMENT	'title task',
	description	VARCHAR(512)				NULL	DEFAULT	NULL					COMMENT	'description task',
	completed	TINYINT					NOT	NULL	DEFAULT	0						COMMENT	'It is completed?',
	created_at	DATETIME				NOT	NULL	DEFAULT	NOW()					COMMENT	'Audit',
	updated_at	DATETIME					NULL	DEFAULT	NULL					COMMENT	'Audit',
	deleted_at	DATETIME					NULL	DEFAULT	NULL					COMMENT	'Audit',
	CONSTRAINT pk_tasks				PRIMARY KEY (id),
	CONSTRAINT uk_id_tasks			UNIQUE(id ASC) VISIBLE,
	CONSTRAINT fk_tasks_lists		FOREIGN KEY (list_id)
		REFERENCES Lists (id) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = InnoDB
COMMENT = 'List task';

INSERT INTO Tasks(list_id, title, description, completed, created_at)
VALUES
	(1, 'predeterminado'
		, NULL, true, NOW()),
	(2, '1.	FlightPHP'
		, NULL, true, NOW()),
	(2, '1.1.	Crear directorio para proyecto de FlightPHP'
		, NULL, true, NOW()),
	(2, '1.2.	Acceder al directorio del proyecto'
		, NULL, true, NOW()),
	(2, '1.3.	Instalar FlightPHP desde composer'
		, NULL, true, NOW()),
	(2, '1.4.	Crear archivo /.htaccess'
		, NULL, true, NOW()),
	(2, '1.5.	Crear archivo /index.php'
		, NULL, true, NOW()),
	(2, '1.6.	Crear ruta de prueba'
		, NULL, true, NOW()),
	(2, '2.	Crear archivo de archivo /AutoLoad.php y colocar ruta vendor'
		, NULL, true, NOW()),
	(2, '3.	DotEnv'
		, NULL, true, NOW()),
	(2, '3.1.	Instalar dotenv desde composer'
		, NULL, true, NOW()),
	(2, '3.2.	Crear archivo /env de ejemplo'
		, NULL, true, NOW()),
	(2, '3.3.	Crear archivo /.env y colocar credenciales correctas'
		, NULL, true, NOW()),
	(2, '3.4.	Agregar Dotenv en archivo /Autoload.php'
		, NULL, true, NOW()),
	(2, '3.5.	Prueba de lectura de variables de entorno'
		, NULL, true, NOW()),
	(2, '4.	Crear archivo de configuración en /App/Config/Config.php'
		, NULL, true, NOW()),
	(2, '5.	CORS'
		, NULL, true, NOW()),
	(2, '5.1.	Crear archivo /App/Config/Cors.php'
		, NULL, true, NOW()),
	(2, '5.2.	Llamar archivo desde el archivo /index.php'
		, NULL, true, NOW()),
	(2, '6.	Base de datos'
		, NULL, true, NOW()),
	(2, '6.1.	Ejecutar script.sql'
		, NULL, true, NOW()),
	(2, '6.2.	Crear archivo /App/Utils/DataBase.php'
		, NULL, true, NOW()),
	(2, '7.	Crear archivo /App/Utils/Response.php'
		, NULL, true, NOW()),
	(2, '8.	Crear archivo /App/Utils/Text.php'
		, NULL, true, NOW()),
	(2, '9.	Componente List'
		, NULL, true, NOW()),
	(2, '9.1.	GET: index'
		, NULL, true, NOW()),
	(2, '9.1.1.	Crear archivo y agregar funcionalidad en /App/Components/v1/List/ListModel.php'
		, NULL, true, NOW()),
	(2, '9.1.2.	Crear archivo y agregar funcionalidad en /App/Components/v1/List/ListController.php'
		, NULL, true, NOW()),
	(2, '9.1.3.	Crear archivo y agregar funcionalidad en /App/Components/v1/List/ListRoute.php'
		, NULL, true, NOW()),
	(2, '9.1.4.	Crear Archivo /App/Config/Routes.php y agregar ruta list'
		, NULL, true, NOW()),
	(2, '9.1.5.	Probar ruta'
		, NULL, true, NOW()),
	(2, '9.2.	GET: show'
		, NULL, true, NOW()),
	(2, '9.2.1.	Agregar funcionalidad en /App/Components/v1/List/ListModel.php'
		, NULL, true, NOW()),
	(2, '9.2.2.	Agregar funcionalidad en /App/Components/v1/List/ListController.php'
		, NULL, true, NOW()),
	(2, '9.2.3.	Agregar funcionalidad en /App/Components/v1/List/ListRoute.php'
		, NULL, true, NOW()),
	(2, '9.2.4.	Probar ruta'
		, NULL, true, NOW()),
	(2, '9.3.	POST: Store'
		, NULL, true, NOW()),
	(2, '9.3.1.	Agregar funcionalidad en /App/Components/v1/List/ListModel.php'
		, NULL, true, NOW()),
	(2, '9.3.2.	Agregar funcionalidad en /App/Components/v1/List/ListController.php'
		, NULL, true, NOW()),
	(2, '9.3.3.	Agregar funcionalidad en /App/Components/v1/List/ListRoute.php'
		, NULL, true, NOW()),
	(2, '9.3.4.	Probar ruta'
		, NULL, true, NOW()),
	(2, '9.4.	PUT: update'
		, NULL, true, NOW()),
	(2, '9.4.1.	Agregar funcionalidad en /App/Components/v1/List/ListModel.php'
		, NULL, true, NOW()),
	(2, '9.4.2.	Agregar funcionalidad en /App/Components/v1/List/ListController.php'
		, NULL, true, NOW()),
	(2, '9.4.3.	Agregar funcionalidad en /App/Components/v1/List/ListRoute.php'
		, NULL, true, NOW()),
	(2, '9.4.4.	Probar ruta'
		, NULL, true, NOW()),
	(2, '9.5.	DELETE: destroy'
		, NULL, true, NOW()),
	(2, '9.5.1.	Agregar funcionalidad en /App/Components/v1/List/ListModel.php'
		, NULL, true, NOW()),
	(2, '9.5.2.	Agregar funcionalidad en /App/Components/v1/List/ListController.php'
		, NULL, true, NOW()),
	(2, '9.5.3.	Agregar funcionalidad en /App/Components/v1/List/ListRoute.php'
		, NULL, true, NOW()),
	(2, '9.5.4.	Probar ruta'
		, NULL, true, NOW()),
	(2, '10.	Componente Task'
		, NULL, true, NOW()),
	(2, '10.1.	GET: index'
		, NULL, true, NOW()),
	(2, '10.1.1.	Crear archivo y agregar funcionalidad en /App/Components/v1/Task/TaskModel.php'
		, NULL, true, NOW()),
	(2, '10.1.2.	Crear archivo y agregar funcionalidad en /App/Components/v1/Task/TaskController.php'
		, NULL, true, NOW()),
	(2, '10.1.3.	Crear archivo y agregar funcionalidad en /App/Components/v1/Task/TaskRoute.php'
		, NULL, true, NOW()),
	(2, '10.1.4.	Crear Archivo /App/Config/Routes.php y agregar ruta task'
		, NULL, true, NOW()),
	(2, '10.1.5.	Probar ruta'
		, NULL, true, NOW()),
	(2, '10.2.	GET: show'
		, NULL, true, NOW()),
	(2, '10.2.1.	Agregar funcionalidad en /App/Components/v1/Task/TaskModel.php'
		, NULL, true, NOW()),
	(2, '10.2.2.	Agregar funcionalidad en /App/Components/v1/Task/TaskController.php'
		, NULL, true, NOW()),
	(2, '10.2.3.	Agregar funcionalidad en /App/Components/v1/Task/TaskRoute.php'
		, NULL, true, NOW()),
	(2, '10.2.4.	Probar ruta'
		, NULL, true, NOW()),
	(2, '10.3.	POST: Store'
		, NULL, true, NOW()),
	(2, '10.3.1.	Agregar funcionalidad en /App/Components/v1/Task/TaskModel.php'
		, NULL, true, NOW()),
	(2, '10.3.2.	Agregar funcionalidad en /App/Components/v1/Task/TaskController.php'
		, NULL, true, NOW()),
	(2, '10.3.3.	Agregar funcionalidad en /App/Components/v1/Task/TaskRoute.php'
		, NULL, true, NOW()),
	(2, '10.3.4.	Probar ruta'
		, NULL, true, NOW()),
	(2, '10.4.	PUT: update'
		, NULL, true, NOW()),
	(2, '10.4.1.	Agregar funcionalidad en /App/Components/v1/Task/TaskModel.php'
		, NULL, true, NOW()),
	(2, '10.4.2.	Agregar funcionalidad en /App/Components/v1/Task/TaskController.php'
		, NULL, true, NOW()),
	(2, '10.4.3.	Agregar funcionalidad en /App/Components/v1/Task/TaskRoute.php'
		, NULL, true, NOW()),
	(2, '10.4.4.	Probar ruta'
		, NULL, true, NOW()),
	(2, '10.5.	DELETE: destroy'
		, NULL, true, NOW()),
	(2, '10.5.1.	Agregar funcionalidad en /App/Components/v1/Task/TaskModel.php'
		, NULL, true, NOW()),
	(2, '10.5.2.	Agregar funcionalidad en /App/Components/v1/Taks/TaskController.php'
		, NULL, true, NOW()),
	(2, '10.5.3.	Agregar funcionalidad en /App/Components/v1/Task/TaskRoute.php'
		, NULL, true, NOW()),
	(2, '10.5.4.	Probar ruta'
		, NULL, true, NOW()),
	(2, '11.	Componente Home'
		, NULL, true, NOW()),
	(2, '11.1.	GET: index'
		, NULL, true, NOW()),
	(2, '11.1.1.	Crear archivo y agregar funcionalidad en /App/Components/v1/Home/HomeModel.php'
		, NULL, true, NOW()),
	(2, '11.1.2.	Crear archivo y agregar funcionalidad en /App/Components/v1/Home/HomeController.php'
		, NULL, true, NOW()),
	(2, '11.1.3.	Crear archivo y agregar funcionalidad en /App/Components/v1/Home/HomeRoute.php'
		, NULL, true, NOW()),
	(2, '11.1.4.	Crear Archivo /App/Config/Routes.php y agregar ruta home'
		, NULL, true, NOW()),
	(2, '11.1.5.	Probar ruta'
		, NULL, true, NOW()),
	(2, '12.	Subir Api FlightPHP a hosting compartido'
		, NULL, true, NOW()),
	(2, '12.1.	Crear base de datos'
		, NULL, true, NOW()),
	(2, '12.2.	Configurar variables de entorno'
		, NULL, true, NOW()),
	(2, '12.3.	Subir proyecto a hosting'
		, NULL, true, NOW()),
	(2, '12.4.	Probar rutas'
		, NULL, true, NOW());
