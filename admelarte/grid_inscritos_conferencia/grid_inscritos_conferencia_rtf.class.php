<?php

class grid_inscritos_conferencia_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $texto_tag;
   var $arquivo;
   var $tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function grid_inscritos_conferencia_rtf()
   {
      $this->nm_data   = new nm_data("es");
      $this->texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->arquivo    = "sc_rtf";
      $this->arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->arquivo   .= "_grid_inscritos_conferencia";
      $this->arquivo   .= ".rtf";
      $this->tit_doc    = "grid_inscritos_conferencia.rtf";
   }

   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global
             $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_inscritos_conferencia']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_inscritos_conferencia']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_inscritos_conferencia']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inscritos_conferencia']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inscritos_conferencia']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inscritos_conferencia']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inscritos_conferencia']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inscritos_conferencia']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inscritos_conferencia']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inscritos_conferencia']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inscritos_conferencia']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inscritos_conferencia']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->estado_inscripcion = $Busca_temp['estado_inscripcion']; 
          $tmp_pos = strpos($this->estado_inscripcion, "##@@");
          if ($tmp_pos !== false)
          {
              $this->estado_inscripcion = substr($this->estado_inscripcion, 0, $tmp_pos);
          }
          $this->metodo_pago = $Busca_temp['metodo_pago']; 
          $tmp_pos = strpos($this->metodo_pago, "##@@");
          if ($tmp_pos !== false)
          {
              $this->metodo_pago = substr($this->metodo_pago, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inscritos_conferencia']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inscritos_conferencia']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inscritos_conferencia']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inscritos_conferencia']['rtf_name']))
      {
          $this->arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inscritos_conferencia']['rtf_name'];
          $this->tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inscritos_conferencia']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inscritos_conferencia']['rtf_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT usuario_id, estado_inscripcion, metodo_pago, transaction_id, valor_inscripcion, creado, id_inscripcion from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT usuario_id, estado_inscripcion, metodo_pago, transaction_id, valor_inscripcion, creado, id_inscripcion from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inscritos_conferencia']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inscritos_conferencia']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }

      $this->texto_tag .= "<table>\r\n";
      $this->texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inscritos_conferencia']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['usuario_id'])) ? $this->New_label['usuario_id'] : "Usuario Id"; 
          if ($Cada_col == "usuario_id" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['estado_inscripcion'])) ? $this->New_label['estado_inscripcion'] : "Estado Inscripcion"; 
          if ($Cada_col == "estado_inscripcion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['metodo_pago'])) ? $this->New_label['metodo_pago'] : "Metodo Pago"; 
          if ($Cada_col == "metodo_pago" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['transaction_id'])) ? $this->New_label['transaction_id'] : "Transaction Id"; 
          if ($Cada_col == "transaction_id" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valor_inscripcion'])) ? $this->New_label['valor_inscripcion'] : "Valor Inscripcion"; 
          if ($Cada_col == "valor_inscripcion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['creado'])) ? $this->New_label['creado'] : "Creado"; 
          if ($Cada_col == "creado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['id_inscripcion'])) ? $this->New_label['id_inscripcion'] : "Id Inscripcion"; 
          if ($Cada_col == "id_inscripcion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->texto_tag .= "</tr>\r\n";
      while (!$rs->EOF)
      {
         $this->texto_tag .= "<tr>\r\n";
         $this->usuario_id = $rs->fields[0] ;  
         $this->usuario_id = (string)$this->usuario_id;
         $this->estado_inscripcion = $rs->fields[1] ;  
         $this->estado_inscripcion = (string)$this->estado_inscripcion;
         $this->metodo_pago = $rs->fields[2] ;  
         $this->metodo_pago = (string)$this->metodo_pago;
         $this->transaction_id = $rs->fields[3] ;  
         $this->valor_inscripcion = $rs->fields[4] ;  
         $this->creado = $rs->fields[5] ;  
         $this->id_inscripcion = $rs->fields[6] ;  
         $this->id_inscripcion = (string)$this->id_inscripcion;
         //----- lookup - usuario_id
         $this->look_usuario_id = $this->usuario_id; 
         $this->Lookup->lookup_usuario_id($this->look_usuario_id, $this->usuario_id) ; 
         $this->look_usuario_id = ($this->look_usuario_id == "&nbsp;") ? "" : $this->look_usuario_id; 
         //----- lookup - estado_inscripcion
         $this->look_estado_inscripcion = $this->estado_inscripcion; 
         $this->Lookup->lookup_estado_inscripcion($this->look_estado_inscripcion); 
         $this->look_estado_inscripcion = ($this->look_estado_inscripcion == "&nbsp;") ? "" : $this->look_estado_inscripcion; 
         //----- lookup - metodo_pago
         $this->look_metodo_pago = $this->metodo_pago; 
         $this->Lookup->lookup_metodo_pago($this->look_metodo_pago); 
         $this->look_metodo_pago = ($this->look_metodo_pago == "&nbsp;") ? "" : $this->look_metodo_pago; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inscritos_conferencia']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->texto_tag .= "</table>\r\n";

      $rs->Close();
   }
   //----- usuario_id
   function NM_export_usuario_id()
   {
         nmgp_Form_Num_Val($this->look_usuario_id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_usuario_id))
         {
             $this->look_usuario_id = mb_convert_encoding($this->look_usuario_id, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_usuario_id = str_replace('<', '&lt;', $this->look_usuario_id);
         $this->look_usuario_id = str_replace('>', '&gt;', $this->look_usuario_id);
         $this->texto_tag .= "<td>" . $this->look_usuario_id . "</td>\r\n";
   }
   //----- estado_inscripcion
   function NM_export_estado_inscripcion()
   {
         if (!NM_is_utf8($this->look_estado_inscripcion))
         {
             $this->look_estado_inscripcion = mb_convert_encoding($this->look_estado_inscripcion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_estado_inscripcion = str_replace('<', '&lt;', $this->look_estado_inscripcion);
         $this->look_estado_inscripcion = str_replace('>', '&gt;', $this->look_estado_inscripcion);
         $this->texto_tag .= "<td>" . $this->look_estado_inscripcion . "</td>\r\n";
   }
   //----- metodo_pago
   function NM_export_metodo_pago()
   {
         if (!NM_is_utf8($this->look_metodo_pago))
         {
             $this->look_metodo_pago = mb_convert_encoding($this->look_metodo_pago, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_metodo_pago = str_replace('<', '&lt;', $this->look_metodo_pago);
         $this->look_metodo_pago = str_replace('>', '&gt;', $this->look_metodo_pago);
         $this->texto_tag .= "<td>" . $this->look_metodo_pago . "</td>\r\n";
   }
   //----- transaction_id
   function NM_export_transaction_id()
   {
         $this->transaction_id = html_entity_decode($this->transaction_id, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->transaction_id = strip_tags($this->transaction_id);
         if (!NM_is_utf8($this->transaction_id))
         {
             $this->transaction_id = mb_convert_encoding($this->transaction_id, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->transaction_id = str_replace('<', '&lt;', $this->transaction_id);
         $this->transaction_id = str_replace('>', '&gt;', $this->transaction_id);
         $this->texto_tag .= "<td>" . $this->transaction_id . "</td>\r\n";
   }
   //----- valor_inscripcion
   function NM_export_valor_inscripcion()
   {
         $this->valor_inscripcion = html_entity_decode($this->valor_inscripcion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->valor_inscripcion = strip_tags($this->valor_inscripcion);
         if (!NM_is_utf8($this->valor_inscripcion))
         {
             $this->valor_inscripcion = mb_convert_encoding($this->valor_inscripcion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->valor_inscripcion = str_replace('<', '&lt;', $this->valor_inscripcion);
         $this->valor_inscripcion = str_replace('>', '&gt;', $this->valor_inscripcion);
         $this->texto_tag .= "<td>" . $this->valor_inscripcion . "</td>\r\n";
   }
   //----- creado
   function NM_export_creado()
   {
         if (substr($this->creado, 10, 1) == "-") 
         { 
             $this->creado = substr($this->creado, 0, 10) . " " . substr($this->creado, 11);
         } 
         if (substr($this->creado, 13, 1) == ".") 
         { 
            $this->creado = substr($this->creado, 0, 13) . ":" . substr($this->creado, 14, 2) . ":" . substr($this->creado, 17);
         } 
         $this->nm_data->SetaData($this->creado, "YYYY-MM-DD HH:II:SS");
         $this->creado = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         if (!NM_is_utf8($this->creado))
         {
             $this->creado = mb_convert_encoding($this->creado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->creado = str_replace('<', '&lt;', $this->creado);
         $this->creado = str_replace('>', '&gt;', $this->creado);
         $this->texto_tag .= "<td>" . $this->creado . "</td>\r\n";
   }
   //----- id_inscripcion
   function NM_export_id_inscripcion()
   {
         nmgp_Form_Num_Val($this->id_inscripcion, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->id_inscripcion))
         {
             $this->id_inscripcion = mb_convert_encoding($this->id_inscripcion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->id_inscripcion = str_replace('<', '&lt;', $this->id_inscripcion);
         $this->id_inscripcion = str_replace('>', '&gt;', $this->id_inscripcion);
         $this->texto_tag .= "<td>" . $this->id_inscripcion . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $rtf_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
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
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inscritos_conferencia']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inscritos_conferencia']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo;
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - inscritos_conferencia :: RTF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
  <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
  <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
  <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
  <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
  <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">RTF</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_inscritos_conferencia_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="nm_tit_doc" value="<?php echo NM_encode_input($this->tit_doc); ?>"> 
<input type="hidden" name="nm_name_doc" value="<?php echo NM_encode_input($this->Ini->path_imag_temp . "/" . $this->arquivo) ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
</FORM> 
</BODY>
</HTML>
<?php
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