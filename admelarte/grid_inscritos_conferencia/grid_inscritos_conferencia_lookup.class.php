<?php
class grid_inscritos_conferencia_lookup
{
//  
   function lookup_usuario_id(&$conteudo , $usuario_id) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $usuario_id; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($usuario_id) === "" || trim($usuario_id) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select email from usuarios where id = $usuario_id order by email" ; 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $conteudo = trim($rx->fields[0]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_estado_inscripcion(&$estado_inscripcion) 
   {
      $conteudo = "" ; 
      if ($estado_inscripcion == "0")
      { 
          $conteudo = "Rechazado / Cancelado";
      } 
      if ($estado_inscripcion == "1")
      { 
          $conteudo = "Pago Exitoso";
      } 
      if ($estado_inscripcion == "2")
      { 
          $conteudo = "Pendiente";
      } 
      if (!empty($conteudo)) 
      { 
          $estado_inscripcion = $conteudo; 
      } 
   }  
//  
   function lookup_metodo_pago(&$metodo_pago) 
   {
      $conteudo = "" ; 
      if ($metodo_pago == "1")
      { 
          $conteudo = "Tarjeta de Crédito";
      } 
      if ($metodo_pago == "2")
      { 
          $conteudo = "Paypal";
      } 
      if ($metodo_pago == "3")
      { 
          $conteudo = "Transferencia PSE";
      } 
      if ($metodo_pago == "4")
      { 
          $conteudo = "Baloto";
      } 
      if ($metodo_pago == "5")
      { 
          $conteudo = "Oxxo";
      } 
      if ($metodo_pago == "6")
      { 
          $conteudo = "BCP";
      } 
      if (!empty($conteudo)) 
      { 
          $metodo_pago = $conteudo; 
      } 
   }  
}
?>
