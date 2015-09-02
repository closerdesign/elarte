<?php
/**
* 
*/
class ObrasController
{
	public function indexAction($mensaje = NULL)
	{
		if ( User::isLogged() ) {
			$articulos = Obras::getListObras(1);
			$pages = Obras::getNumPages();
			$categorias = Categoria::getAll();
			$program_esp = Programa::getAll();


			if ( is_null( $mensaje ) ) {
				$params = [
								'articulos' => $articulos,
								'categorias_art' => $categorias,
								'program_esp'=> $program_esp,
								'pages' => $pages,
								'current_page' => 1,
								'mainUrl' => 'obras',
								'mensaje' => $mensaje
							];
			}else{
				$params = [
								'articulos' => $articulos,
								'categorias_art' => $categorias,
								'program_esp'=> $program_esp,
								'pages' => $pages,
								'current_page' => 1,
								'mainUrl' => '/api/obras',
								'mensaje' => $mensaje
							];
			}

			return new View('obras', $params);
		}else{
			$params = [
							'titulo' => 'Sección de Ingreso',
							'error' => 'Datos correctos',
							'mainUrl' => '/api'
						];
			return new View('home', $params);
		}
	}

	public function pageAction()
	{
		$url_page = $_GET['url'];
		$url_page = explode('/', $url_page);
		$pag = $url_page[2];

		if ( User::isLogged() ) {
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
		if ( !empty( $_FILES['imagen'] ) ) {

			$handle = new upload($_FILES['imagen']);
			if ($handle->uploaded) {
				$handle->process( dirname( getcwd() ) .'/admin/_lib/file/imgarticulos/' );
				if ($handle->processed) {
					$obra->imagen = $handle->file_src_name;
				} else {
					echo 'error : ' . $handle->error;
				}
				
				$handle->file_new_name_body = $handle->file_src_name_body.'1200X627';
				$handle->image_resize       = true;
				$handle->image_x            = 1200;
				$handle->image_y            = 627;

				$handle->process( dirname( getcwd() ) .'/admin/_lib/file/imgarticulos/' );
				if ($handle->processed) {
					$handle->clean();

				} else {
					echo 'error : ' . $handle->error;
				}
			}
		}
		if ( !empty( $categoria ) ) {
			$categoria = implode(',', $categoria);
			$obra->categoria = $categoria;
		}
		$obra->contenido            = $contenido;
		$obra->status               = $status;
		$obra->programas_especiales = $programas_especiales;
		$obra->meta_description     = $meta_description;
		$obra->meta_keywords        = $meta_keywords;

		if ( $obra->save() ) {
			return $this->indexAction('Se ha guardado correctamente.');
		}
		echo "mal";
		return;
	}

	public function uploadAction()
	{
		if ( !empty( $_FILES['imagen'] ) ) {

			$handle = new upload($_FILES['imagen']);
			if ($handle->uploaded) {
				$handle->process( dirname( getcwd() ) .'/admin/_lib/file/imgarticulos/' );
				if ($handle->processed) {
					$handle->clean();
					echo "Archivo subido con exito";
				} else {
					echo 'error : ' . $handle->error;
				}
				
				$handle->file_new_name_body = $handle->file_src_name_body.'1200X627';
				$handle->image_resize       = true;
				$handle->image_x            = 1200;
				$handle->image_y            = 627;

				$handle->process( dirname( getcwd() ) .'/admin/_lib/file/imgarticulos/' );
				if ($handle->processed) {

				} else {
					echo 'error : ' . $handle->error;
				}
			}
		}
	}

	public function agregarAction()
	{
		extract($_POST);


		$obra = new Obras();

		if ( !empty( $_FILES['imagen'] ) ) {

			$handle = new upload($_FILES['imagen']);
			if ( $handle->uploaded ) {
				$handle->process( dirname( getcwd() ) .'/admin/_lib/file/imgarticulos/' );
				if ($handle->processed) {
					$obra->imagen = $handle->file_src_name;
				} else {
					echo 'error : ' . $handle->error;
				}
				
				$handle->file_new_name_body = $handle->file_src_name_body.'1200X627';
				$handle->image_resize       = true;
				$handle->image_x            = 1200;
				$handle->image_y            = 627;

				$handle->process( dirname( getcwd() ) .'/admin/_lib/file/imgarticulos/' );
				if ($handle->processed) {
					$handle->clean();

					$obra->titulo               = $titulo;
					$obra->contenido            = $contenido;
					$categoria                  = implode(',', $categoria);
					$obra->categoria            = $categoria;
					$obra->programas_especiales = $programas_especiales;
					$obra->status               = $status;
					$obra->meta_description     = $meta_description;
					$obra->meta_keywords        = $meta_keywords;
					
					if ( $obra->add() ) {
						return $this->indexAction('Se ha creado correctamente.');
					}else{
						return $this->indexAction('Ha ocurrido un error al crear.');
					}
				} else {
					return $this->indexAction('Ha ocurrido un error al crear.');
				}
			}
		}


	}

	public function agregarObrasAction()
	{
		if ( User::isLogged() ) {
			/*$articulos = Obras::getListObras(1);
			$pages = Obras::getNumPages();*/
			$categorias = Categoria::getAll();
			$program_esp = Programa::getAll();


			$params = [
							/*'articulos' => $articulos,*/
							'categorias_art' => $categorias,
							'program_esp'=> $program_esp,
							/*'pages' => $pages,*/
							/*'current_page' => 1,*/
							'mainUrl' => '/api/obras/agregarObras'
						];

			return new View('agregarObras', $params);
		}
	}
}