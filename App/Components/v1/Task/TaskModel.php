<?php

require_once __DIR__.'/../../../Utils/DataBase.php';

class TaskModel
{
	public function findAll()
	{
		$query = 'SELECT t.id, t.title, t.description, l.name AS list
				, IF(t.completed = 1, "Completado", "No Completado") as complete
				, t.completed as status
			FROM Tasks AS t
			INNER JOIN Lists AS l
				ON t.list_id = l.id
			WHERE 1=1
				AND t.id > 1
				AND t.deleted_at IS NULL
			ORDER BY t.id DESC;';
		$sql = Flight::db()->prepare($query);
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_OBJ);
	}

	public function findAllCompleted()
	{
		$query = 'SELECT t.id, t.title, t.description, l.name AS list
			FROM Tasks AS t
			INNER JOIN Lists AS l
				ON t.list_id = l.id
			WHERE 1=1
				AND t.id > 1
				AND t.completed = 1
				AND t.deleted_at IS NULL
			ORDER BY t.id DESC;;';
		$sql = Flight::db()->prepare($query);
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_OBJ);
	}

	public function findAllDeleted()
	{
		$query = 'SELECT t.id, t.title, t.description, l.name AS list
				, IF(t.completed = 1, "Completado", "No Completado") as complete
			FROM Tasks AS t
			INNER JOIN Lists AS l
				ON t.list_id = l.id
			WHERE 1=1
				AND t.id > 1
				AND t.deleted_at IS NOT NULL
			ORDER BY t.id DESC;';
		$sql = Flight::db()->prepare($query);
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_OBJ);
	}

	public function findOneById(string $id)
	{
		$query = 'SELECT t.id, t.title, t.description, l.name AS list
				, IF(t.completed = 1, "Completado", "No Completado") as complete
			FROM Tasks AS t
			INNER JOIN Lists AS l
				ON t.list_id = l.id
			WHERE 1=1
				AND t.id = ?
				AND t.id > 1
				AND t.deleted_at IS NULL';
		$sql = Flight::db()->prepare($query);
		$sql->bindParam(1, $id, PDO::PARAM_INT);
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_OBJ);
	}

	public function store(string $title, string $description = ''
		, string $list = '1', bool $complete = false)
	{
		$query = 'INSERT INTO Tasks(list_id, title, description
			, completed, created_at)
			VALUES
			(?,?,?,?,NOW());';
		$sql = Flight::db()->prepare($query);
		$sql->bindParam(1, $list, PDO::PARAM_INT);
		$sql->bindParam(2, $title, PDO::PARAM_STR);
		$sql->bindParam(3, $description, PDO::PARAM_STR);
		$sql->bindParam(4, $complete, PDO::PARAM_BOOL);
		return $sql->execute();
	}

	public function edit(string $id, string $title, string $description
		, int $list)
	{
		$status = true;
		if($id == 0)
		{
			return false;
		}
		if(!empty($title))
		{
			$query = 'UPDATE Tasks SET title = ? WHERE 1=1 AND id = ?;';

			$sql = Flight::db()->prepare($query);
			$sql->bindParam(1, $title, PDO::PARAM_STR);
			$sql->bindParam(2, $id, PDO::PARAM_INT);
			$status = $sql->execute();
		}
		if($status == false)
		{
			return false;
		}
		if(!empty($description))
		{
			$query = 'UPDATE Tasks SET description = ? WHERE 1=1 AND id = ?';
			$sql = Flight::db()->prepare($query);
			$sql->bindParam(1, $description, PDO::PARAM_STR);
			$sql->bindParam(2, $id, PDO::PARAM_INT);
			$status = $sql->execute();
		}
		if($status == false)
		{
			return false;
		}
		if($list > 0)
		{
			$query = 'UPDATE Tasks SET list_id = ? WHERE 1=1 AND id = ?';
			$sql = Flight::db()->prepare($query);
			$sql->bindParam(1, $list, PDO::PARAM_STR);
			$sql->bindParam(2, $id, PDO::PARAM_INT);
			$status = $sql->execute();
		}
		if($status == false)
		{
			return false;
		}
		return $status;
	}
	
	public function taskCompleted(string $id, bool $completed = true)
	{
		$query = '	UPDATE Tasks
					SET
						completed = ?,
						updated_at = now()
					WHERE 1=1
						AND id= ?';
		$sql = Flight::db()->prepare($query);
		$sql->bindParam(1, $completed, PDO::PARAM_BOOL);
		$sql->bindParam(2, $id, PDO::PARAM_INT);
		return $sql->execute();
	}

	public function delete(string $id)
	{
		$query = '	UPDATE Tasks
					SET
						deleted_at = now()
					WHERE 1=1
						AND id=?;';
		$sql = Flight::db()->prepare($query);
		$sql->bindParam(1, $id, PDO::PARAM_INT);
		Return $sql->execute();
	}
	
	public function destroy()
	{
		$query = '	DELETE FROM Tasks
					WHERE 1=1
						AND id > 1
						AND deleted_at IS NOT NULL;';
		$sql = Flight::db()->prepare($query);
		return $sql->execute();
	}
}