<?php

class grid_usuarios_1_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function grid_usuarios_1_total($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("es");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_usuarios_1']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_usuarios_1']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios_1']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->creado = $Busca_temp['creado']; 
          $tmp_pos = strpos($this->creado, "##@@");
          if ($tmp_pos !== false)
          {
              $this->creado = substr($this->creado, 0, $tmp_pos);
          }
          $creado_2 = $Busca_temp['creado_input_2']; 
          $this->creado_2 = $Busca_temp['creado_input_2']; 
      } 
   }

   //---- 
   function quebra_geral()
   {
      global $nada, $nm_lang ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios_1']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios_1']['tot_geral'] = array() ;  
      $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios_1']['where_pesq']; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios_1']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios_1']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios_1']['contr_total_geral'] = "OK";
   } 

   //-----  creado
   function quebra_creado_Creado($creado, $arg_sum_creado) 
   {
      global $tot_creado , $Sc_groupby_creado;  
      $tot_creado = array() ;  
      $tot_creado[0] = $creado ; 
   }

   //----- 
   function resumo_Creado($destino_resumo, &$array_total_creado)
   {
      global $nada, $nm_lang;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios_1']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios_1']['campos_busca']))
   { 
      $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios_1']['campos_busca'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
       $this->creado = $Busca_temp['creado']; 
       $tmp_pos = strpos($this->creado, "##@@");
       if ($tmp_pos !== false)
       {
           $this->creado = substr($this->creado, 0, $tmp_pos);
       }
       $this->creado_2 = $Busca_temp['creado_input_2']; 
   } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios_1']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios_1']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios_1']['where_pesq_filtro'];
   $nmgp_order_by = " order by creado asc"; 
     $comando  = "select count(*), creado from " . $this->Ini->nm_tabela . " " . $this->sc_where_atual . " group by creado  " . $nmgp_order_by;
      if ($destino_resumo != "gra") 
      {
          $comando = str_replace("avg(", "sum(", $comando); 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $array_db_total = $this->get_array($rt);
      $rt->Close();
      foreach ($array_db_total as $registro)
      {
         $registro[1] = substr($registro[1], 0, 10);
         $creado      = $registro[1];
         $creado_orig = $registro[1];
         $conteudo = $registro[1];
        if (substr($conteudo, 10, 1) == "-") 
        { 
            $conteudo = substr($conteudo, 0, 10) . " " . substr($conteudo, 11);
        } 
        if (substr($conteudo, 13, 1) == ".") 
        { 
           $conteudo = substr($conteudo, 0, 13) . ":" . substr($conteudo, 14, 2) . ":" . substr($conteudo, 17);
        } 
        $this->nm_data->SetaData($conteudo, "YYYY-MM-DD");
        $conteudo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa"));
         $creado = $conteudo;
         if (null === $creado)
         {
             $creado = '';
         }
         if (null === $creado_orig)
         {
             $creado_orig = '';
         }
         $val_grafico_creado = $creado;
         $creado_orig = NM_encode_input($creado_orig);
         if (isset($creado_orig))
         {
            //-----  creado
            if (!isset($array_total_creado[$creado_orig]))
            {
               $array_total_creado[$creado_orig][0] = $registro[0];
               $array_total_creado[$creado_orig][1] = NM_encode_input($val_grafico_creado);
               $array_total_creado[$creado_orig][2] = $creado_orig;
            }
            else
            {
               $array_total_creado[$creado_orig][0] += $registro[0];
            }
         } // isset
      }
   }
   //-----
   function get_array($rs)
   {
       if ('ado_mssql' != $this->Ini->nm_tpbanco)
       {
           return $rs->GetArray();
       }

       $array_db_total = array();
       while (!$rs->EOF)
       {
           $arr_row = array();
           foreach ($rs->fields as $k => $v)
           {
               $arr_row[$k] = $v . '';
           }
           $array_db_total[] = $arr_row;
           $rs->MoveNext();
       }
       return $array_db_total;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }

   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
}

?>
