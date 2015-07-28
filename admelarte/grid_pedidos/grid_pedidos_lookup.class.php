<?php
class grid_pedidos_lookup
{
//  
   function lookup_usuario(&$conteudo , $usuario) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $usuario; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($usuario) === "" || trim($usuario) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select email from usuarios where id = $usuario order by email" ; 
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
   function lookup_status(&$status) 
   {
      $conteudo = "" ; 
      if ($status == "0")
      { 
          $conteudo = "INICIADO";
      } 
      if ($status == "1")
      { 
          $conteudo = "PENDIENTE";
      } 
      if ($status == "2")
      { 
          $conteudo = "APROBADO";
      } 
      if ($status == "3")
      { 
          $conteudo = "DECLINADO / CANCELADO";
      } 
      if (!empty($conteudo)) 
      { 
          $status = $conteudo; 
      } 
   }  
//  
   function lookup_formapago(&$formapago) 
   {
      $conteudo = "" ; 
      if ($formapago == "1")
      { 
          $conteudo = "TARJETA DE CREDITO";
      } 
      if ($formapago == "2")
      { 
          $conteudo = "PAYPAL";
      } 
      if ($formapago == "3")
      { 
          $conteudo = "TRANSFERENCIA PSE";
      } 
      if ($formapago == "4")
      { 
          $conteudo = "PUNTOS VIA BALOTO";
      } 
      if ($formapago == "5")
      { 
          $conteudo = "OXXO - 7 ELEVEN";
      } 
      if ($formapago == "6")
      { 
          $conteudo = "BANCO DE CREDITO - BCP";
      } 
      if (!empty($conteudo)) 
      { 
          $formapago = $conteudo; 
      } 
   }  
}
?>
