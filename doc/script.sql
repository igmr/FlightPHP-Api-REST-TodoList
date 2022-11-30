
--	*	-----------------------------------------------------------------------
--	*	Database FlightToDo
--	*	-----------------------------------------------------------------------
DROP DATABASE IF EXISTS FlightToDo;
CREATE DATABASE IF NOT EXISTS FlightToDo;
USE FlightToDo;

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
	tittle		VARCHAR(120)			NOT	NULL									COMMENT	'Tittle task',
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

INSERT INTO Tasks(list_id, tittle, description, completed, created_at)
VALUES
	(1, 'predeterminado'
		, NULL, true, NOW()),
	(2, 'Creamos un directorio para la API REST con el Framework Flightphp'
		, NULL, false, NOW()),
	(2, 'Accedemos al directorio'
		, NULL, false, NOW()),
	(2, 'Instalamos el framework flightphp mediante composer'
		, NULL, false, NOW()),
	(2, 'Creamos el archivo .htaccess'
		, null, false, NOW()),
	(2, 'Creamos el archivo index.php'
		, null, false, NOW()),
	(2, 'Creamos una ruta de prueba'
		, null, false, NOW()),
	(2, 'Importamos script sql a MySql local desde una terminal'
		, null, false, NOW()),
	(2, 'Creamos el archivo de configuracion'
		, null, false, NOW()),
	(2, 'Configuramos la conexion hacia la base de datos MySql desde el archivo index.php'
		, null, false, NOW()),
	(2, 'Creamos estuctura de carpetas'
		, null, false, NOW()),
	(2, 'Creamos y configuramos el archivo baseService.php'
		, null, false, NOW()),
	(2, 'Construir modulo de lista'
		, null, false, NOW()),
	(2, 'Construir modulo de tareas'
		, null, false, NOW()),
	(2, 'Creamos base datos desde hosting'
		,null, false, NOW()),
	(2, 'Generamos script sql desde MySql local'
		,null, false, NOW()),
	(2, 'Importamos script sql hacia base de datos del hosting'
		,null, false, NOW()),
	(2, 'Subimos proyecto a Hosting'
		,null, false, NOW()),
	(2, 'Modificamos los datos de conexion locales por los del hosting'
		,null, false, NOW());
	
	


