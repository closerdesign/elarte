<?php


function agregarInscritosConferencia($usuario_id, $estado_inscripcion, $metodo_pago, $transaction_id, $valor_inscripcion, $fecha_creado, $hora_creado)
{
		
		
		
		require_once "../Application/Model/FuncionesSQL.php";
    	$q = new ConecteMysql();
	
		$query = "INSERT INTO `elarte_phronesisapp`.`inscritos_conferencia` (`id_inscripcion`, `usuario_id`, `estado_inscripcion`, `metodo_pago`, `transaction_id`, `valor_inscripcion`, `creado`) VALUES (NULL, '$usuario_id', '$estado_inscripcion', '$metodo_pago', '$transaction_id', '$valor_inscripcion', '$fecha_creado $hora_creado')";
		
		if($q->ejecutar($query, ""))
			echo "ARREGLADO";
		else
			echo "ERROR DE ACTUALIZACIÓN";
			
		
		$query = "select id_inscripcion FROM inscritos_conferencia WHERE transaction_id = '$transaction_id' ORDER BY id_inscripcion DESC";
		$q->ejecutar($query, "");
		
		if($q->Cargar())
			$id_inscripcion = $q->dato('id_inscripcion');
			
			
		$query = "INSERT INTO `elarte_phronesisapp`.`admin_inscripciones_manuales` (`id_inscripcion`) VALUES ('$id_inscripcion')";
		$q->ejecutar($query, "");
		
}




?>