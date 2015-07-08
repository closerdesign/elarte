<?php
/**
 * @author winston gaviria  
 * Php que contiene las funciones para coneccion de base de datos
 * y resultados
 */
class ConecteMysql {
 var $f;
 var $t;
 var $e;
 
	
/**
 * Crea un hilo de conexion
 *
 * @param unknown_type $hostname hace referencia al host donde esta alojada el servidor de DB
 * @param unknown_type $username hace referencia al usuario de la DB
 * @param unknown_type $password hace referencia al password de la DB
 * @param unknown_type $database DB que se va a utilizar
 * @return ConecteMysql
 */
 function ConecteMysql()
 {
 	
$hostname = "localhost";
$database = "phronesi_live";
$username = "phronesi_elarte";
$password = "Z,'VT,?x3*LdjMvR";
   $this->f=mysql_pconnect($hostname,$username,$password)
         or die('ERROR al Conectarse al Servidor'.$database.'error'.mysql_error().'<br>');

   mysql_select_db($database,$this->f)
        or die('ERROR al Conectarse al Servidor'.$database.'error'.mysql_error().'<br>');

 }
 

 
 /**
  * Funcion que ejecuta un query 
  *
  * @param unknown_type $sentencia  hace referencia al query que se desea ejecutar
  * @param unknown_type $codigoPHP  variable que indica de donde proviene este query 
  */
 function ejecutar($sentencia,$codigoPHP)
 {
   $this->t=mysql_query($sentencia,$this->f)
                 or die ('Error al  ejecutar la consulta: <br>'.$sentencia.'<br> Codigo: '.$codigoPHP.'<br>'.mysql_error());
    return mysql_insert_id();              
 }
 
 /**
  * Funcion que ejecuta un query y me retorna el ultimo ID insertado
  * es mas utilizada para Insert para que nos retorne el ultimo ID Insertado
  *
  * @param unknown_type $sentencia
  * @param unknown_type $codigoPHP
  * @return unknown
  */
 function ejecutar_insert($sentencia,$codigoPHP){
 	$this->t=mysql_query($sentencia,$this->f)
                  or die ('Error al  ejecutar la consulta: <br>'.$sentencia.'<br> Codigo: '.$codigoPHP.'<br>'.mysql_error());
     return mysql_insert_id();
 }
 function filas()
 {
    return mysql_num_rows($this->t);
 }
function Cargar()
 {
   $this->e=mysql_fetch_array($this->t);
   return $this->e;
 }
 function dato($index)
 {
   return $this->e[$index];
 }
}
?>
