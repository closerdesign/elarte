<?php
/**
* 
*/
class Categoria
{
	public static function getAll()
	{
		$db = MysqliDb::getInstance();
		$db->where ('status', 1);
		$db->orderBy("id","asc");
		$categorias = $db->get("categorias");

		return $categorias;
	}
}