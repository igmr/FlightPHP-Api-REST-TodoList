<?php

require_once __DIR__.'/../../../Utils/DataBase.php';

class ListModel
{
	public function findAll()
	{
		$query = 'SELECT id, name
			FROM Lists
			WHERE 1=1
				AND deleted_at IS NULL
			ORDER BY id ASC';
		$sql = Flight::db()->prepare($query);
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_OBJ);
	}
	public function findOneById(string $id)
	{
		$query = 'SELECT id, name
			FROM Lists
			WHERE 1=1
				AND id= ?
				AND deleted_at IS NULL;';
		$sql = Flight::db()->prepare($query);
		$sql->bindParam(1, $id, PDO::PARAM_INT);
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_OBJ);
	}
	public function store(string $name)
	{
		$query = 'INSERT INTO Lists(name, created_at) VALUES (?, NOW());';
		$sql = Flight::db()->prepare($query);
		$sql->bindParam(1, $name, PDO::PARAM_STR);
		Return $sql->execute();
	}
	public function edit(string $id, string $name)
	{
		$query = '	UPDATE Lists
					SET
						name = ?,
						updated_at = now()
					WHERE id=?;';
		$sql = Flight::db()->prepare($query);
		$sql->bindParam(1, $name, PDO::PARAM_STR);
		$sql->bindParam(2, $id, PDO::PARAM_INT);
		Return $sql->execute();
	}
	public function delete(string $id)
	{
		$query = '	UPDATE Lists
					SET
						deleted_at = now()
					WHERE id=?;';
		$sql = Flight::db()->prepare($query);
		$sql->bindParam(1, $id, PDO::PARAM_INT);
		Return $sql->execute();
	}
	public function findListByName(string $name)
	{
		$query = 'SELECT *
			FROM Lists
			WHERE 1=1
				AND name= ?;';
		$sql = Flight::db()->prepare($query);
		$sql->bindParam(1, $name, PDO::PARAM_STR);
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_OBJ);
	}
}