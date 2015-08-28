<?php
/**
* 
*/
class Obras
{

	public $id;
	public $titulo;
	public $imagen;
	public $contenido;
	public $categoria;
	public $status;
	public $programas_especiales;

	public function __construct($id)
	{
		$db = MysqliDb::getInstance();
		$db->where ('id', $id);
		$obra = $db->getOne("articulos");
		$this->id                   = $obra['id'];
		$this->titulo               = $obra['titulo'];
		$this->imagen               = $obra['imagen'];
		$this->contenido            = $obra['contenido'];
		$this->categoria            = $obra['categoria'];
		$this->status               = $obra['status'];
		$this->programas_especiales = $obra['programas_especiales'];
	}

	public static function getListObras($pag = NULL)
	{
		$num_page = 10; 

		$pag = $pag - 1;

		if ( $pag < 0 ) {
			$pag = 0;
		}

		$db = MysqliDb::getInstance();
		$db->orderBy("id","asc");
		if ( !is_null( $pag ) ) {
			$articulos = $db->get("articulos", Array ($pag*$num_page, $num_page));
		}else{
			$articulos = $db->get("articulos", Array(10,10));
		}

		return $articulos;
	}

	public static function getNumPages($titulo = NULL)
	{
		$num_page = 10;

		$db = MysqliDb::getInstance();

		if ( !is_null( $titulo ) ) {
			$db->where ('titulo like "%'.$titulo.'%"');
		}

		$articulos = $db->get("articulos");


		$total_pages = ceil( count($articulos) / $num_page );

		return $total_pages;
	}

	public static function buscar($titulo, $pag = NULL)
	{
		$num_page = 10;

		$db = MysqliDb::getInstance();
		$db->where ('titulo like "%'.$titulo.'%"');
		$db->orderBy("id","asc");
		$articulos = $db->get( "articulos" );

		return $articulos;
	}

	public function save()
	{
		$db = MysqliDb::getInstance();
		$data = Array (
			'titulo'               => $this->titulo,
			'imagen'               => $this->imagen,
			'contenido'            => $this->contenido,
			'categoria'            => $this->categoria,
			'status'               => $this->status,
			'programas_especiales' => $this->programas_especiales
		);
		$db->where ('id', $this->id);
		if ($db->update ('articulos', $data))
		    return true;
		else
		    return false;
	}

}