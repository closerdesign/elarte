<?php
/**
* 
*/
class InscritosController
{
	public function indexAction()
	{
		return new View('inscritosHome', ['titulo' => 'Mal llamado al api']);
	}

	public function getInscritosAction()
	{
		if ( isset($_GET['id_user']) && $_GET['id_user'] == 1 && isset($_GET['id']) ) {
			$db = MysqliDb::getInstance();

			$db->join("inscritos_conferencia inco", "inco.usuario_id = usu.id", "INNER");
			$db->where("inco.estado_inscripcion", 1);
			$db->where ("inco.migrado", NULL, '<=>');
			$db->groupBy ("usu.id");
			$db->orderBy("id","asc");
			$cols = Array (
							"usu.id", 
							"usu.nombreCompleto", 
							"usu.nombre",
							"usu.apellido",
							"usu.email",
							"inco.id_inscripcion",
							"inco.migrado",
							"IF(usu.fbId = '', NULL, usu.fbId) fbId",
							"IF(usu.password = '', NULL, usu.password) password",
							"NULL",
							"NULL"
						);
			$users = $db->get('usuarios usu', 100, $cols);

			$subject = 'Accesos para su conferencia: El Arte de Amar sin Apegos.';

			foreach ($users as $key => &$user) {
				$user['password'] = generatePassword(6, 'on', 'off', 'on', 'off');
				$data = Array (
				    'migrado' => 1,
				    'contrasenna' => $user['password']
				);
				$db->where ('id_inscripcion', $user['id_inscripcion']);
				if ($db->update ('inscritos_conferencia', $data)){
					if ( sendEmail($subject, $user['password'], trim($user['email']), $user['nombre'], trim($user['email']), 'info@phronesisvirtual.com') ) {
					}else{
					}
				}
			}

			return json_encode($users);
		}
	}
}