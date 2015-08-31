<?php
/**
* 
*/
class Programa
{
	public static function getAll()
	{
		$db = MysqliDb::getInstance();
		$db->where ('estado', 1);
		$db->orderBy("id_programa","asc");
		$programs = $db->get("programas_especiales");

		return $programs;
	}
}