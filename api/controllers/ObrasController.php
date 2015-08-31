<?php
/**
* 
*/
class ObrasController
{
	public function indexAction($mensaje = NULL)
	{
		if ( isset( $_SESSION['loggedId'] ) ) {
			$articulos = Obras::getListObras(1);
			$pages = Obras::getNumPages();
			$categorias = Categoria::getAll();
			$program_esp = Programa::getAll();

			$params = [
							'articulos' => $articulos,
							'categorias_art' => $categorias,
							'program_esp'=> $program_esp,
							'pages' => $pages,
							'current_page' => 1,
							'mainUrl' => 'obras', 
							'mensaje' => $mensaje
						];

			return new View('obras', $params);
		}else{
			$params = [
							'titulo' => 'Sección de Ingreso',
							'error' => 'Datos correctos',
							'mainUrl' => '/'
						];
			return new View('home', $params);
		}
	}

	public function pageAction()
	{
		$url_page = $_GET['url'];
		$url_page = explode('/', $url_page);
		$pag = $url_page[2];

		if ( isset( $_SESSION['loggedId'] ) ) {
			$articulos = Obras::getListObras($pag);
			$pages = Obras::getNumPages();
			$categorias = Categoria::getAll();
			$program_esp = Programa::getAll();
			return new View('obras', ['articulos' => $articulos, 'categorias_art' => $categorias, 'program_esp'=> $program_esp, 'pages' => $pages, 'current_page' => $pag]);
		}else{
			return new View('home', ['titulo' => 'Sección de Ingreso', 'error' => 'Datos correctos']);
		}
	}

	public function findAction()
	{
		extract($_POST);

		$url_page = $_GET['url'];
		$url_page = explode('/', $url_page);

		$categorias = Categoria::getAll();	
		$program_esp = Programa::getAll();
		
		if ( isset($url_page[2]) ) {
			$pag = $url_page[2];
		}else{
			$pag = 1;
		}

		if ( !empty( $titulo ) ) {
			$obras = Obras::buscar($titulo);
			$params = [
							'articulos'      => $obras,
							'categorias_art' => $categorias,
							'program_esp'    => $program_esp,
							'item'           => 'busqueda'
						];

			return new View('obras', $params);
		}else{
			return new View('obras', ['error' => 'Debe ingresar un titulo para hacer la búsqueda.', ]);
		}
	}

	public function guardarAction()
	{
		extract( $_POST );

		$obra = new Obras($id);

		$obra->titulo = $titulo;
		if ( !empty( $imagen ) ) {
			$obra->imagen = $imagen;
		}
		$categoria = implode(',', $categoria);
		$obra->contenido = $contenido;
		$obra->categoria = $categoria;
		$obra->status = $status;
		$obra->programas_especiales = $programas_especiales;

		if ( $obra->save() ) {
			return $this->indexAction('Se ha guardado correctamente.');
		}

		echo "mal";
		return;
	}
}