<?php
class PreguntasController
{
	
	public function indexAction()
	{
		$vars = array(
						'mainUrl' => CURRENT_URL.'preguntas',
					);
		return new View('preguntas', $vars);
	}
}
?>