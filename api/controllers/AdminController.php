<?php
/**
* 
*/
class AdminController
{
	public function indexAction()
	{
		extract($_GET);
		if ( !empty( $user ) && $user == 'AdminScript' && !empty( $pass ) && $pass == 'Qazplm123!' ) {
			$db = MysqliDb::getInstance();

			$db->join("publicaciones pu", "pupe.publicacion = pu.id", "INNER");
			$db->where ('pupe.valor', 0);
			$db->where ('pupe.creado', '2015-07-01 00:00:00','>=');
			$results = $db->get ('publicacionesxpedido pupe', null, 'pupe.id, pupe.pedido, pupe.publicacion, pu.precio, pupe.creado' );

			$resultArray = '';

			foreach ($results as $key => $value) {
				$data = [
					'valor' => $value['precio']
				];
				$db->where ('id', $value['id']);
				if ($db->update ('publicacionesxpedido', $data)){
				    $resultArray .= $db->count . ' records were updated. id = '.$value['id'].' pedido = '.$value['pedido'].' publicacion = '.$value['publicacion'].' precio = '.$value['precio'].' creado = '.$value['creado'].'<br>';
				}
				else{
				    $resultArray .= 'update failed: ' . $db->getLastError() . '<br>';
				}
			}

			if ( !empty( $resultArray ) )
				return new View('adminIndex', [ 'result' => $resultArray ]);
				
			return new View('adminIndex', [ 'result' => 'No se han modificado precios.' ]);
		}
	}
}