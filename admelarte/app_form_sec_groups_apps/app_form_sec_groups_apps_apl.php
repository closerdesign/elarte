<?php
//
class app_form_sec_groups_apps_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'         => '',
                                'param'          => array(),
                                'autoComp'       => '',
                                'rsSize'         => '',
                                'msgDisplay'     => '',
                                'errList'        => array(),
                                'fldList'        => array(),
                                'focus'          => '',
                                'navStatus'      => array(),
                                'navSummary'     => array(),
                                'navPage'        => array(),
                                'redir'          => array(),
                                'blockDisplay'   => array(),
                                'fieldDisplay'   => array(),
                                'fieldLabel'     => array(),
                                'readOnly'       => array(),
                                'btnVars'        => array(),
                                'ajaxAlert'      => '',
                                'ajaxMessage'    => '',
                                'ajaxJavascript' => array(),
                                'buttonDisplay'  => array(),
                                'calendarReload' => false,
                                'quickSearchRes' => false,
                                'displayMsg'     => false,
                                'displayMsgTxt'  => '',
                                'dyn_search'     => array(),
                                'empty_filter'   => '',
                               );
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $group_id_;
   var $app_name_;
   var $priv_access_;
   var $priv_access__1;
   var $priv_insert_;
   var $priv_insert__1;
   var $priv_delete_;
   var $priv_delete__1;
   var $priv_update_;
   var $priv_update__1;
   var $priv_export_;
   var $priv_export__1;
   var $priv_print_;
   var $priv_print__1;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $sc_teve_incl = false;
   var $sc_teve_excl = false;
   var $sc_teve_alt  = false;
   var $sc_after_all_insert = false;
   var $sc_after_all_update = false;
   var $sc_max_reg = 15; 
   var $sc_max_reg_incl = 10; 
   var $form_vert_app_form_sec_groups_apps = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['app_name_']))
          {
              $this->app_name_ = $this->NM_ajax_info['param']['app_name_'];
          }
          if (isset($this->NM_ajax_info['param']['group_id_']))
          {
              $this->group_id_ = $this->NM_ajax_info['param']['group_id_'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_fast_search']))
          {
              $this->nmgp_arg_fast_search = $this->NM_ajax_info['param']['nmgp_arg_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_cond_fast_search']))
          {
              $this->nmgp_cond_fast_search = $this->NM_ajax_info['param']['nmgp_cond_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_fast_search']))
          {
              $this->nmgp_fast_search = $this->NM_ajax_info['param']['nmgp_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_row']))
          {
              $this->nmgp_refresh_row = $this->NM_ajax_info['param']['nmgp_refresh_row'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['priv_access_']))
          {
              $this->priv_access_ = $this->NM_ajax_info['param']['priv_access_'];
          }
          if (isset($this->NM_ajax_info['param']['priv_delete_']))
          {
              $this->priv_delete_ = $this->NM_ajax_info['param']['priv_delete_'];
          }
          if (isset($this->NM_ajax_info['param']['priv_export_']))
          {
              $this->priv_export_ = $this->NM_ajax_info['param']['priv_export_'];
          }
          if (isset($this->NM_ajax_info['param']['priv_insert_']))
          {
              $this->priv_insert_ = $this->NM_ajax_info['param']['priv_insert_'];
          }
          if (isset($this->NM_ajax_info['param']['priv_print_']))
          {
              $this->priv_print_ = $this->NM_ajax_info['param']['priv_print_'];
          }
          if (isset($this->NM_ajax_info['param']['priv_update_']))
          {
              $this->priv_update_ = $this->NM_ajax_info['param']['priv_update_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_clone']))
          {
              $this->sc_clone = $this->NM_ajax_info['param']['sc_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_clone']))
          {
              $this->sc_seq_clone = $this->NM_ajax_info['param']['sc_seq_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_vert']))
          {
              $this->sc_seq_vert = $this->NM_ajax_info['param']['sc_seq_vert'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      $this->sc_conv_var['group_id'] = "group_id_";
      $this->sc_conv_var['app_name'] = "app_name_";
      $this->sc_conv_var['priv_access'] = "priv_access_";
      $this->sc_conv_var['priv_insert'] = "priv_insert_";
      $this->sc_conv_var['priv_delete'] = "priv_delete_";
      $this->sc_conv_var['priv_update'] = "priv_update_";
      $this->sc_conv_var['priv_export'] = "priv_export_";
      $this->sc_conv_var['priv_print'] = "priv_print_";
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($this->group) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['group'] = $this->group;
      }
      if (isset($this->group_desc) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['group_desc'] = $this->group_desc;
      }
      if (isset($this->arr_apps) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['arr_apps'] = $this->arr_apps;
      }
      if (isset($_POST["group"])) 
      {
          $_SESSION['group'] = $this->group;
      }
      if (isset($_POST["group_desc"])) 
      {
          $_SESSION['group_desc'] = $this->group_desc;
      }
      if (isset($_POST["arr_apps"])) 
      {
          $_SESSION['arr_apps'] = $this->arr_apps;
      }
      if (isset($_GET["group"])) 
      {
          $_SESSION['group'] = $this->group;
      }
      if (isset($_GET["group_desc"])) 
      {
          $_SESSION['group_desc'] = $this->group_desc;
      }
      if (isset($_GET["arr_apps"])) 
      {
          $_SESSION['arr_apps'] = $this->arr_apps;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['app_form_sec_groups_apps']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['app_form_sec_groups_apps']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['app_form_sec_groups_apps']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $this->NM_where_filter = "";
          $tem_where_parms       = false;
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todo = explode("?@?", $nmgp_parms);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_app_form_sec_groups_apps($cadapar[1]);
                 $this->$cadapar[0] = $cadapar[1];
                 if ($cadapar[0] == "group_id_")
                 {
                     $this->NM_where_filter .= (empty($this->NM_where_filter)) ? "(" : " and ";
                     $this->NM_where_filter .= "group_id = " . $this->group_id_;
                     $this->has_where_params = true;
                     $tem_where_parms        = true;
                 }
                 elseif ($cadapar[0] == "NM_where_filter")
                 {
                     $this->has_where_params = false;
                     $tem_where_parms        = false;
                 }
                 if ($cadapar[0] == "app_name_")
                 {
                     $this->NM_where_filter .= (empty($this->NM_where_filter)) ? "(" : " and ";
                     $this->NM_where_filter .= "app_name = '" . $this->app_name_ . "'";
                     $this->has_where_params = true;
                     $tem_where_parms        = true;
                 }
                 elseif ($cadapar[0] == "NM_where_filter")
                 {
                     $this->has_where_params = false;
                     $tem_where_parms        = false;
                 }
             }
             $ix++;
          }
          if ($tem_where_parms)
          {
              $this->NM_where_filter .= ")";
          }
          else
          {
              unset($this->NM_where_filter);
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['app_form_sec_groups_apps']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['app_form_sec_groups_apps']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['app_form_sec_groups_apps']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['app_form_sec_groups_apps']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->group)) 
          {
              $_SESSION['group'] = $this->group;
          }
          if (isset($this->group_desc)) 
          {
              $_SESSION['group_desc'] = $this->group_desc;
          }
          if (isset($this->arr_apps)) 
          {
              $_SESSION['arr_apps'] = $this->arr_apps;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['app_form_sec_groups_apps']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todo = explode("?@?", $_SESSION['sc_session'][$script_case_init]['app_form_sec_groups_apps']['parms']);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 $this->$cadapar[0] = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['app_form_sec_groups_apps']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['app_form_sec_groups_apps']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['app_form_sec_groups_apps']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['app_form_sec_groups_apps']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['app_form_sec_groups_apps']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['app_form_sec_groups_apps']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['app_form_sec_groups_apps']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new app_form_sec_groups_apps_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['initialize'])
          {
              $_SESSION['scriptcase']['app_form_sec_groups_apps']['contr_erro'] = 'on';
if (!isset($this->sc_temp_group_desc)) {$this->sc_temp_group_desc = (isset($_SESSION['group_desc'])) ? $_SESSION['group_desc'] : "";}
if (!isset($this->sc_temp_group)) {$this->sc_temp_group = (isset($_SESSION['group'])) ? $_SESSION['group'] : "";}
 $str_sql = "SELECT description FROM sec_groups WHERE group_id = ".$this->sc_temp_group;
 
      $nm_select = $str_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;
$this->sc_temp_group_desc = $this->rs [0][0];
if (isset($this->sc_temp_group)) { $_SESSION['group'] = $this->sc_temp_group;}
if (isset($this->sc_temp_group_desc)) { $_SESSION['group_desc'] = $this->sc_temp_group_desc;}
$_SESSION['scriptcase']['app_form_sec_groups_apps']['contr_erro'] = 'off';
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $this->Change_Menu = false;
      if (isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['app_form_sec_groups_apps']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['app_form_sec_groups_apps'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['app_form_sec_groups_apps']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['app_form_sec_groups_apps']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('app_form_sec_groups_apps') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['app_form_sec_groups_apps']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_list_apps_x_groups'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "app_form_sec_groups_apps")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $this->Db = $this->Ini->Db; 
      $this->nm_new_label['app_name_'] = '' . $this->Ini->Nm_lang['lang_sec_app_name'] . '';
      $this->nm_new_label['priv_access_'] = '' . $this->Ini->Nm_lang['lang_sec_priv_access'] . '';
      $this->nm_new_label['priv_insert_'] = '' . $this->Ini->Nm_lang['lang_sec_priv_insert'] . '';
      $this->nm_new_label['priv_delete_'] = '' . $this->Ini->Nm_lang['lang_sec_priv_delete'] . '';
      $this->nm_new_label['priv_update_'] = '' . $this->Ini->Nm_lang['lang_sec_priv_update'] . '';
      $this->nm_new_label['priv_export_'] = '' . $this->Ini->Nm_lang['lang_sec_priv_export'] . '';
      $this->nm_new_label['priv_print_'] = '' . $this->Ini->Nm_lang['lang_sec_priv_print'] . '';

      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok_mult)   ? ""     : $str_img_status_ok_mult;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err_mult)  ? ""     : $str_img_status_err_mult;
      $this->Ini->Css_status      = "scFormInputErrorMult";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);



      $_SESSION['scriptcase']['error_icon']['app_form_sec_groups_apps']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['app_form_sec_groups_apps'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_call'] : $this->Embutida_call;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new']  = "off";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['insert'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "off";
      if ('total' == $this->form_paginacao)
      {
          $this->nmgp_botoes['first']   = "off";
          $this->nmgp_botoes['back']    = "off";
          $this->nmgp_botoes['forward'] = "off";
          $this->nmgp_botoes['last']    = "off";
          $this->nmgp_botoes['navpage'] = "off";
          $this->nmgp_botoes['goto']    = "off";
          $this->nmgp_botoes['qtline']  = "off";
      }
      else
      {
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "on";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['app_form_sec_groups_apps']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field . "_"] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field . "_"] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['exit'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("app_form_sec_groups_apps", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 

      if (is_file($this->Ini->path_aplicacao . 'app_form_sec_groups_apps_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'app_form_sec_groups_apps_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'app_form_sec_groups_apps/app_form_sec_groups_apps_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "app_form_sec_groups_apps_erro.class.php"); 
      }
      $this->Erro      = new app_form_sec_groups_apps_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_max_reg']) && strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_max_reg']) == "all")
      {
          $this->form_paginacao = "total";
      }
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['opcao']))
         { 
             if ($this->group_id_ != "" || $this->app_name_ != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if (!isset($this->NM_ajax_flag) || ('validate_' != substr($this->NM_ajax_opcao, 0, 9) && 'add_new_line' != $this->NM_ajax_opcao))
      {
      $_SESSION['scriptcase']['app_form_sec_groups_apps']['contr_erro'] = 'on';
if (!isset($this->sc_temp_arr_apps)) {$this->sc_temp_arr_apps = (isset($_SESSION['arr_apps'])) ? $_SESSION['arr_apps'] : "";}
 $check_sql = "SELECT app_name, app_type"
	   . " FROM sec_apps";

 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;
$this->sc_temp_arr_apps = array();

if ($this->rs !== FALSE)     
{
    while(!$this->rs->EOF)
    {
	$this->sc_temp_arr_apps[ $this->rs->fields[0] ] = $this->rs->fields[1];
	$this->rs->MoveNext();
    }
    $this->rs->Close();
}
if (isset($this->sc_temp_arr_apps)) { $_SESSION['arr_apps'] = $this->sc_temp_arr_apps;}
$_SESSION['scriptcase']['app_form_sec_groups_apps']['contr_erro'] = 'off'; 
      }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- group_id_
      $this->field_config['group_id_']               = array();
      $this->field_config['group_id_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['group_id_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['group_id_']['symbol_dec'] = '';
      $this->field_config['group_id_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['group_id_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($this->nmgp_opcao == "change_qtd_line")
      {
          if (strtolower($this->nmgp_max_line) == "all")
          {
              $this->nmgp_opcao = "inicio";
              $this->form_paginacao = "total";
          }
          else
          {
              $this->nmgp_opcao = "igual";
              $this->form_paginacao = "parcial";
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_max_reg'] = $this->nmgp_max_line;
      }
      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['opc_edit'] = true;  
      $sc_contr_vert = $GLOBALS["sc_contr_vert"];
      $sc_seq_vert   = 1; 
      $sc_opc_salva  = $this->nmgp_opcao; 
      $sc_todas_Crit = "";
      $sc_check_excl = array(); 
      $sc_check_incl = array(); 
      if (is_array($GLOBALS["sc_check_vert"])) 
      { 
          if ($this->nmgp_opcao == "incluir" || ($this->nmgp_opcao == "recarga" && $this->nmgp_opc_ant == "novo"))
          {
              $sc_check_incl = $GLOBALS["sc_check_vert"]; 
          }
          elseif ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir" || $this->nmgp_opcao == "recarga")
          {
              $sc_check_excl = $GLOBALS["sc_check_vert"]; 
          }
      } 
      elseif ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $sc_check_incl = array($_POST['upload_file_row']);
      }
      if (empty($this->nmgp_opcao)) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "novo";
         $this->nm_select_banco();
         $this->nm_gera_html();
         $this->NM_ajax_info['newline'] = app_form_sec_groups_apps_pack_protect_string(NM_charset_to_utf8($this->New_Line));
         $this->NM_close_db();
         app_form_sec_groups_apps_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'backup_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "igual";
         $this->nm_tira_formatacao();
         $this->nm_select_banco();
         $this->ajax_return_values();
         $this->NM_close_db();
         app_form_sec_groups_apps_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'submit_form' == $this->NM_ajax_opcao)
      {
         if (isset($this->app_name_)) { $this->nm_limpa_alfa($this->app_name_); }
         if (isset($this->priv_access_)) { $this->nm_limpa_alfa($this->priv_access_); }
         if (isset($this->priv_insert_)) { $this->nm_limpa_alfa($this->priv_insert_); }
         if (isset($this->priv_delete_)) { $this->nm_limpa_alfa($this->priv_delete_); }
         if (isset($this->priv_update_)) { $this->nm_limpa_alfa($this->priv_update_); }
         if (isset($this->priv_export_)) { $this->nm_limpa_alfa($this->priv_export_); }
         if (isset($this->priv_print_)) { $this->nm_limpa_alfa($this->priv_print_); }
         if (isset($this->Sc_num_lin_alt) && $this->Sc_num_lin_alt > 0) 
         {
             $sc_seq_vert = $this->Sc_num_lin_alt;
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_form'][$sc_seq_vert];
             $this->group_id_ = $this->nmgp_dados_form['group_id_']; 
         }
         $this->controle_form_vert();
         if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
         {
             $this->NM_rollback_db();
              if ($this->NM_ajax_flag)
              {
                  if (!isset($this->NM_ajax_info['errList']['geral_app_form_sec_groups_apps']) || !is_array($this->NM_ajax_info['errList']['geral_app_form_sec_groups_apps']))
                  {
                      $this->NM_ajax_info['errList']['geral_app_form_sec_groups_apps'] = array();
                  }
                  if ($Campos_Crit != "")
                  {
                      $this->NM_ajax_info['errList']['geral_app_form_sec_groups_apps'][] = $Campos_Crit;
                  }
                  if (!empty($Campos_Falta))
                  {
                      $this->NM_ajax_info['errList']['geral_app_form_sec_groups_apps'][] = $this->Formata_Campos_Falta($Campos_Falta);
                  }
                  if ($this->Campos_Mens_erro != "")
                  {
                      $this->NM_ajax_info['errList']['geral_app_form_sec_groups_apps'][] = $this->Campos_Mens_erro;
                  }
              }
         }
         else
         {
             $this->NM_commit_db();
         }
         if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
         }
         $this->NM_close_db();
         app_form_sec_groups_apps_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
          if ('validate_priv_access_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'priv_access_');
          }
          if ('validate_priv_insert_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'priv_insert_');
          }
          if ('validate_priv_delete_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'priv_delete_');
          }
          if ('validate_priv_update_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'priv_update_');
          }
          if ('validate_priv_export_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'priv_export_');
          }
          if ('validate_priv_print_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'priv_print_');
          }
          app_form_sec_groups_apps_pack_ajax_response();
          exit;
      }
      while ($sc_contr_vert > $sc_seq_vert) 
      { 
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
         $this->app_name_ = $GLOBALS["app_name_" . $sc_seq_vert]; 
         $this->priv_access_ = $GLOBALS["priv_access_" . $sc_seq_vert]; 
         $this->priv_insert_ = $GLOBALS["priv_insert_" . $sc_seq_vert]; 
         $this->priv_delete_ = $GLOBALS["priv_delete_" . $sc_seq_vert]; 
         $this->priv_update_ = $GLOBALS["priv_update_" . $sc_seq_vert]; 
         $this->priv_export_ = $GLOBALS["priv_export_" . $sc_seq_vert]; 
         $this->priv_print_ = $GLOBALS["priv_print_" . $sc_seq_vert]; 
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_form'][$sc_seq_vert];
             $this->group_id_ = $this->nmgp_dados_form['group_id_']; 
         }
         if (isset($this->app_name_)) { $this->nm_limpa_alfa($this->app_name_); }
         if (isset($this->priv_access_)) { $this->nm_limpa_alfa($this->priv_access_); }
         if (isset($this->priv_insert_)) { $this->nm_limpa_alfa($this->priv_insert_); }
         if (isset($this->priv_delete_)) { $this->nm_limpa_alfa($this->priv_delete_); }
         if (isset($this->priv_update_)) { $this->nm_limpa_alfa($this->priv_update_); }
         if (isset($this->priv_export_)) { $this->nm_limpa_alfa($this->priv_export_); }
         if (isset($this->priv_print_)) { $this->nm_limpa_alfa($this->priv_print_); }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_form'])) 
         {
            $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_form'][$sc_seq_vert];
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'])) 
         {
            $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert];
         }
         if ($this->nmgp_opcao != "recarga" && (!in_array($sc_seq_vert, $sc_check_excl) && !in_array($sc_seq_vert, $sc_check_incl) ))
         { }
         else
         {
             if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['priv_export_']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_disabled'][$sc_seq_vert]['priv_export_']))
             { 
                 $this->priv_export_ = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['priv_export_'];
             } 
             if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['priv_print_']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_disabled'][$sc_seq_vert]['priv_print_']))
             { 
                 $this->priv_print_ = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['priv_print_'];
             } 
             if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['priv_insert_']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_disabled'][$sc_seq_vert]['priv_insert_']))
             { 
                 $this->priv_insert_ = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['priv_insert_'];
             } 
             if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['priv_delete_']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_disabled'][$sc_seq_vert]['priv_delete_']))
             { 
                 $this->priv_delete_ = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['priv_delete_'];
             } 
             if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['priv_update_']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_disabled'][$sc_seq_vert]['priv_update_']))
             { 
                 $this->priv_update_ = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['priv_update_'];
             } 
             $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_disabled'] = array();
             $this->controle_form_vert(); 
             $this->nmgp_opcao = $sc_opc_salva; 
             if ($this->nmgp_opcao != "recarga"  && $this->nmgp_opcao != "muda_form" && ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != ""))
             {
                 $sc_todas_Crit .= (!empty($sc_todas_Crit)) ? "<br>" : ""; 
                 $sc_todas_Crit .= "<B>" . $this->Ini->Nm_lang['lang_errm_line'] . $sc_seq_vert . "</B>: "; 
                 $sc_todas_Crit .= $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
                 $this->Campos_Mens_erro = ""; 
             }
             if ($this->nmgp_opcao != "recarga") 
             {
                $this->nm_guardar_campos();
                $this->nm_formatar_campos();
             }
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['app_name_'] =  $this->app_name_; 
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['priv_access_'] =  $this->priv_access_; 
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['priv_insert_'] =  $this->priv_insert_; 
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['priv_delete_'] =  $this->priv_delete_; 
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['priv_update_'] =  $this->priv_update_; 
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['priv_export_'] =  $this->priv_export_; 
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['priv_print_'] =  $this->priv_print_; 
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['group_id_'] =  $this->group_id_; 
         }
         $sc_seq_vert++; 
      } 
      if (!empty($sc_todas_Crit)) 
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sc_todas_Crit); 
          if ($this->nmgp_opcao == "incluir")
          { 
              $this->nmgp_opcao = "novo"; 
          }
      } 
      elseif ($this->nmgp_opcao == "incluir")
      { 
          $this->nmgp_opcao = "novo"; 
      }
      if ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $this->nmgp_opcao = 'igual';
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form") 
      { 
          if ($this->sc_teve_incl) 
          { 
              $this->sc_after_all_insert = true;
          }
          if ($this->sc_teve_alt || $this->sc_teve_excl) 
          { 
              $this->sc_after_all_update = true;
          }
          if (empty($sc_todas_Crit)) 
          { 
              $this->NM_commit_db(); 
              $this->nm_select_banco();
              $sc_check_excl = array(); 
          } 
          else
          { 
              $this->NM_rollback_db(); 
          } 
      } 
      if ($this->nmgp_opcao == "recarga") 
      { 
          $this->NM_gera_nav_page(); 
      } 
      if ($this->NM_ajax_flag && ('navigate_form' == $this->NM_ajax_opcao || !empty($this->nmgp_refresh_fields)))
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          $this->NM_close_db();
          app_form_sec_groups_apps_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
      {
          $this->nm_gera_html();
          $this->NM_ajax_info['tableRefresh'] = NM_charset_to_utf8($this->Table_refresh . $this->New_Line) . '</table>';
          $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
          $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_app_form_sec_groups_apps);
          $this->NM_ajax_info['fldList']['group_id_']['keyVal'] = htmlentities($this->nmgp_dados_form['group_id_'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
          $this->NM_ajax_info['fldList']['app_name_']['keyVal'] = htmlentities($this->nmgp_dados_form['app_name_'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
          $this->NM_close_db();
          app_form_sec_groups_apps_pack_ajax_response();
          exit;
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      $this->nm_todas_criticas = $sc_todas_Crit;
      $this->nm_gera_html();
      $this->NM_close_db(); 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "&script_case_session=" . session_id() . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
   function controle_form_vert()
   {
     global $nm_opc_lookup,$Campos_Crit, $Campos_Falta, $Campos_Erros, 
            $glo_senha_protect, $nm_apl_dependente, $nm_form_submit;

//
//-----> 
//
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->priv_access_))
          {
              $x = 0; 
              $this->priv_access__1 = $this->priv_access_;
              $this->priv_access_ = ""; 
              if ($this->priv_access__1 != "") 
              { 
                  foreach ($this->priv_access__1 as $dados_priv_access__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->priv_access_ .= ";";
                      } 
                      $this->priv_access_ .= $dados_priv_access__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->priv_insert_))
          {
              $x = 0; 
              $this->priv_insert__1 = $this->priv_insert_;
              $this->priv_insert_ = ""; 
              if ($this->priv_insert__1 != "") 
              { 
                  foreach ($this->priv_insert__1 as $dados_priv_insert__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->priv_insert_ .= ";";
                      } 
                      $this->priv_insert_ .= $dados_priv_insert__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->priv_delete_))
          {
              $x = 0; 
              $this->priv_delete__1 = $this->priv_delete_;
              $this->priv_delete_ = ""; 
              if ($this->priv_delete__1 != "") 
              { 
                  foreach ($this->priv_delete__1 as $dados_priv_delete__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->priv_delete_ .= ";";
                      } 
                      $this->priv_delete_ .= $dados_priv_delete__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->priv_update_))
          {
              $x = 0; 
              $this->priv_update__1 = $this->priv_update_;
              $this->priv_update_ = ""; 
              if ($this->priv_update__1 != "") 
              { 
                  foreach ($this->priv_update__1 as $dados_priv_update__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->priv_update_ .= ";";
                      } 
                      $this->priv_update_ .= $dados_priv_update__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->priv_export_))
          {
              $x = 0; 
              $this->priv_export__1 = $this->priv_export_;
              $this->priv_export_ = ""; 
              if ($this->priv_export__1 != "") 
              { 
                  foreach ($this->priv_export__1 as $dados_priv_export__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->priv_export_ .= ";";
                      } 
                      $this->priv_export_ .= $dados_priv_export__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->priv_print_))
          {
              $x = 0; 
              $this->priv_print__1 = $this->priv_print_;
              $this->priv_print_ = ""; 
              if ($this->priv_print__1 != "") 
              { 
                  foreach ($this->priv_print__1 as $dados_priv_print__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->priv_print_ .= ";";
                      } 
                      $this->priv_print_ .= $dados_priv_print__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (isset($this->priv_export_))
          { 
              $SV_priv_export_ = $this->priv_export_;
          } 
          if (isset($this->priv_print_))
          { 
              $SV_priv_print_ = $this->priv_print_;
          } 
          if (isset($this->priv_insert_))
          { 
              $SV_priv_insert_ = $this->priv_insert_;
          } 
          if (isset($this->priv_delete_))
          { 
              $SV_priv_delete_ = $this->priv_delete_;
          } 
          if (isset($this->priv_update_))
          { 
              $SV_priv_update_ = $this->priv_update_;
          } 
          $this->nm_tira_formatacao();
          if (isset($SV_priv_export_) && $this->nmgp_opcao != "recarga")
          { 
              $this->priv_export_ = $SV_priv_export_;
          } 
          if (isset($SV_priv_print_) && $this->nmgp_opcao != "recarga")
          { 
              $this->priv_print_ = $SV_priv_print_;
          } 
          if (isset($SV_priv_insert_) && $this->nmgp_opcao != "recarga")
          { 
              $this->priv_insert_ = $SV_priv_insert_;
          } 
          if (isset($SV_priv_delete_) && $this->nmgp_opcao != "recarga")
          { 
              $this->priv_delete_ = $SV_priv_delete_;
          } 
          if (isset($SV_priv_update_) && $this->nmgp_opcao != "recarga")
          { 
              $this->priv_update_ = $SV_priv_update_;
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              app_form_sec_groups_apps_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          return; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['app_form_sec_groups_apps']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && $this->nmgp_opcao != "menu_link")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
   }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'app_name_':
               return "" . $this->Ini->Nm_lang['lang_sec_app_name'] . "";
               break;
           case 'priv_access_':
               return "" . $this->Ini->Nm_lang['lang_sec_priv_access'] . "";
               break;
           case 'priv_insert_':
               return "" . $this->Ini->Nm_lang['lang_sec_priv_insert'] . "";
               break;
           case 'priv_delete_':
               return "" . $this->Ini->Nm_lang['lang_sec_priv_delete'] . "";
               break;
           case 'priv_update_':
               return "" . $this->Ini->Nm_lang['lang_sec_priv_update'] . "";
               break;
           case 'priv_export_':
               return "" . $this->Ini->Nm_lang['lang_sec_priv_export'] . "";
               break;
           case 'priv_print_':
               return "" . $this->Ini->Nm_lang['lang_sec_priv_print'] . "";
               break;
           case 'group_id_':
               return "Group Id ";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade, $sc_seq_vert;
//---------------------------------------------------------
     $this->sc_force_zero = array();
      if ('' == $filtro || 'priv_access_' == $filtro)
        $this->ValidateField_priv_access_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'priv_insert_' == $filtro)
        $this->ValidateField_priv_insert_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'priv_delete_' == $filtro)
        $this->ValidateField_priv_delete_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'priv_update_' == $filtro)
        $this->ValidateField_priv_update_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'priv_export_' == $filtro)
        $this->ValidateField_priv_export_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'priv_print_' == $filtro)
        $this->ValidateField_priv_print_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_priv_access_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->priv_access_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->priv_access_ = "";
      } 
      else 
      { 
          if (is_array($this->priv_access_))
          {
              $x = 0; 
              $this->priv_access__1 = array(); 
              foreach ($this->priv_access_ as $ind => $dados_priv_access__1 ) 
              {
                  if ($dados_priv_access__1 !== "") 
                  {
                      $this->priv_access__1[] = $dados_priv_access__1;
                  } 
              } 
              $this->priv_access_ = ""; 
              foreach ($this->priv_access__1 as $dados_priv_access__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->priv_access_ .= ";";
                   } 
                   $this->priv_access_ .= $dados_priv_access__1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_priv_access_

    function ValidateField_priv_insert_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->priv_insert_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->priv_insert_))
          {
              $x = 0; 
              $this->priv_insert__1 = array(); 
              foreach ($this->priv_insert_ as $ind => $dados_priv_insert__1 ) 
              {
                  if ($dados_priv_insert__1 !== "") 
                  {
                      $this->priv_insert__1[] = $dados_priv_insert__1;
                  } 
              } 
              $this->priv_insert_ = ""; 
              foreach ($this->priv_insert__1 as $dados_priv_insert__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->priv_insert_ .= ";";
                   } 
                   $this->priv_insert_ .= $dados_priv_insert__1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_priv_insert_

    function ValidateField_priv_delete_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->priv_delete_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->priv_delete_ = "";
      } 
      else 
      { 
          if (is_array($this->priv_delete_))
          {
              $x = 0; 
              $this->priv_delete__1 = array(); 
              foreach ($this->priv_delete_ as $ind => $dados_priv_delete__1 ) 
              {
                  if ($dados_priv_delete__1 !== "") 
                  {
                      $this->priv_delete__1[] = $dados_priv_delete__1;
                  } 
              } 
              $this->priv_delete_ = ""; 
              foreach ($this->priv_delete__1 as $dados_priv_delete__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->priv_delete_ .= ";";
                   } 
                   $this->priv_delete_ .= $dados_priv_delete__1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_priv_delete_

    function ValidateField_priv_update_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->priv_update_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->priv_update_ = "";
      } 
      else 
      { 
          if (is_array($this->priv_update_))
          {
              $x = 0; 
              $this->priv_update__1 = array(); 
              foreach ($this->priv_update_ as $ind => $dados_priv_update__1 ) 
              {
                  if ($dados_priv_update__1 !== "") 
                  {
                      $this->priv_update__1[] = $dados_priv_update__1;
                  } 
              } 
              $this->priv_update_ = ""; 
              foreach ($this->priv_update__1 as $dados_priv_update__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->priv_update_ .= ";";
                   } 
                   $this->priv_update_ .= $dados_priv_update__1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_priv_update_

    function ValidateField_priv_export_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->priv_export_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->priv_export_))
          {
              $x = 0; 
              $this->priv_export__1 = array(); 
              foreach ($this->priv_export_ as $ind => $dados_priv_export__1 ) 
              {
                  if ($dados_priv_export__1 !== "") 
                  {
                      $this->priv_export__1[] = $dados_priv_export__1;
                  } 
              } 
              $this->priv_export_ = ""; 
              foreach ($this->priv_export__1 as $dados_priv_export__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->priv_export_ .= ";";
                   } 
                   $this->priv_export_ .= $dados_priv_export__1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_priv_export_

    function ValidateField_priv_print_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->priv_print_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->priv_print_ = "";
      } 
      else 
      { 
          if (is_array($this->priv_print_))
          {
              $x = 0; 
              $this->priv_print__1 = array(); 
              foreach ($this->priv_print_ as $ind => $dados_priv_print__1 ) 
              {
                  if ($dados_priv_print__1 !== "") 
                  {
                      $this->priv_print__1[] = $dados_priv_print__1;
                  } 
              } 
              $this->priv_print_ = ""; 
              foreach ($this->priv_print__1 as $dados_priv_print__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->priv_print_ .= ";";
                   } 
                   $this->priv_print_ .= $dados_priv_print__1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_priv_print_

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['app_name_'] = $this->app_name_;
    $this->nmgp_dados_form['priv_access_'] = $this->priv_access_;
    $this->nmgp_dados_form['priv_insert_'] = $this->priv_insert_;
    $this->nmgp_dados_form['priv_delete_'] = $this->priv_delete_;
    $this->nmgp_dados_form['priv_update_'] = $this->priv_update_;
    $this->nmgp_dados_form['priv_export_'] = $this->priv_export_;
    $this->nmgp_dados_form['priv_print_'] = $this->priv_print_;
    $this->nmgp_dados_form['group_id_'] = $this->group_id_;
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_form'][$sc_seq_vert] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_numero($this->group_id_, $this->field_config['group_id_']['symbol_grp']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~ei', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "group_id_")
      {
          nm_limpa_numero($this->group_id_, $this->field_config['group_id_']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

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
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
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
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

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
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
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
       nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
       return $dt_out;
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_all_vert();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['group_id_']['keyVal'] = app_form_sec_groups_apps_pack_protect_string($this->nmgp_dados_form['group_id_']);
              $this->NM_ajax_info['fldList']['app_name_']['keyVal'] = app_form_sec_groups_apps_pack_protect_string($this->nmgp_dados_form['app_name_']);
          }
   } // ajax_return_values
   function ajax_return_values_all_vert()
   {
          if (isset($this->nmgp_refresh_fields) && isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_app_form_sec_groups_apps[$this->nmgp_refresh_row] = $this->NM_ajax_info['param'];
              if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
              {
                  if (isset($this->NM_ajax_changed['app_name_']) && $this->NM_ajax_changed['app_name_'])
                  {
                      $this->form_vert_app_form_sec_groups_apps[$this->nmgp_refresh_row]['app_name_'] = $this->app_name_;
                  }
                  if (isset($this->NM_ajax_changed['priv_access_']) && $this->NM_ajax_changed['priv_access_'])
                  {
                      $this->form_vert_app_form_sec_groups_apps[$this->nmgp_refresh_row]['priv_access_'] = $this->priv_access_;
                  }
                  if (isset($this->NM_ajax_changed['priv_insert_']) && $this->NM_ajax_changed['priv_insert_'])
                  {
                      $this->form_vert_app_form_sec_groups_apps[$this->nmgp_refresh_row]['priv_insert_'] = $this->priv_insert_;
                  }
                  if (isset($this->NM_ajax_changed['priv_delete_']) && $this->NM_ajax_changed['priv_delete_'])
                  {
                      $this->form_vert_app_form_sec_groups_apps[$this->nmgp_refresh_row]['priv_delete_'] = $this->priv_delete_;
                  }
                  if (isset($this->NM_ajax_changed['priv_update_']) && $this->NM_ajax_changed['priv_update_'])
                  {
                      $this->form_vert_app_form_sec_groups_apps[$this->nmgp_refresh_row]['priv_update_'] = $this->priv_update_;
                  }
                  if (isset($this->NM_ajax_changed['priv_export_']) && $this->NM_ajax_changed['priv_export_'])
                  {
                      $this->form_vert_app_form_sec_groups_apps[$this->nmgp_refresh_row]['priv_export_'] = $this->priv_export_;
                  }
                  if (isset($this->NM_ajax_changed['priv_print_']) && $this->NM_ajax_changed['priv_print_'])
                  {
                      $this->form_vert_app_form_sec_groups_apps[$this->nmgp_refresh_row]['priv_print_'] = $this->priv_print_;
                  }
              }
          }
          if (isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_app_form_sec_groups_apps[$this->nmgp_refresh_row]['app_name_'] = $this->app_name_;
              $this->form_vert_app_form_sec_groups_apps[$this->nmgp_refresh_row]['priv_access_'] = $this->priv_access_;
              $this->form_vert_app_form_sec_groups_apps[$this->nmgp_refresh_row]['priv_insert_'] = $this->priv_insert_;
              $this->form_vert_app_form_sec_groups_apps[$this->nmgp_refresh_row]['priv_delete_'] = $this->priv_delete_;
              $this->form_vert_app_form_sec_groups_apps[$this->nmgp_refresh_row]['priv_update_'] = $this->priv_update_;
              $this->form_vert_app_form_sec_groups_apps[$this->nmgp_refresh_row]['priv_export_'] = $this->priv_export_;
              $this->form_vert_app_form_sec_groups_apps[$this->nmgp_refresh_row]['priv_print_'] = $this->priv_print_;
          }
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_app_form_sec_groups_apps);
          foreach($this->form_vert_app_form_sec_groups_apps as $sc_seq_vert => $aRecData)
          {
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("app_name_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['app_name_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  if (empty($aRecData['app_name_']))
                  {
                      $aRecData['app_name_'] = "";
                  }
                  $this->NM_ajax_info['fldList']['app_name_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("priv_access_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['priv_access_']);
                  $aLookup = array();
$aLookup[] = array(app_form_sec_groups_apps_pack_protect_string('Y') => app_form_sec_groups_apps_pack_protect_string("" . $this->Ini->Nm_lang['lang_opt_yes'] . ""));
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['Lookup_priv_access_'][] = 'Y';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['priv_access_']) && !empty($this->NM_ajax_info['select_html']['priv_access_']))
          {
              eval("\$sOptComp = \"" . $this->NM_ajax_info['select_html']['priv_access_'] . "\";");
          }
                  $this->NM_ajax_info['fldList']['priv_access_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'valList' => explode(';', $aRecData['priv_access_']),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-priv_access_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['priv_access_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['priv_access_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['priv_access_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("priv_insert_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['priv_insert_']);
                  $aLookup = array();
$aLookup[] = array(app_form_sec_groups_apps_pack_protect_string('Y') => app_form_sec_groups_apps_pack_protect_string("" . $this->Ini->Nm_lang['lang_opt_yes'] . ""));
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['Lookup_priv_insert_'][] = 'Y';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['priv_insert_']) && !empty($this->NM_ajax_info['select_html']['priv_insert_']))
          {
              eval("\$sOptComp = \"" . $this->NM_ajax_info['select_html']['priv_insert_'] . "\";");
          }
                  $this->NM_ajax_info['fldList']['priv_insert_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'valList' => explode(';', $aRecData['priv_insert_']),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-priv_insert_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['priv_insert_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['priv_insert_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['priv_insert_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("priv_delete_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['priv_delete_']);
                  $aLookup = array();
$aLookup[] = array(app_form_sec_groups_apps_pack_protect_string('Y') => app_form_sec_groups_apps_pack_protect_string("" . $this->Ini->Nm_lang['lang_opt_yes'] . ""));
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['Lookup_priv_delete_'][] = 'Y';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['priv_delete_']) && !empty($this->NM_ajax_info['select_html']['priv_delete_']))
          {
              eval("\$sOptComp = \"" . $this->NM_ajax_info['select_html']['priv_delete_'] . "\";");
          }
                  $this->NM_ajax_info['fldList']['priv_delete_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'valList' => explode(';', $aRecData['priv_delete_']),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-priv_delete_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['priv_delete_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['priv_delete_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['priv_delete_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("priv_update_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['priv_update_']);
                  $aLookup = array();
$aLookup[] = array(app_form_sec_groups_apps_pack_protect_string('Y') => app_form_sec_groups_apps_pack_protect_string("" . $this->Ini->Nm_lang['lang_opt_yes'] . ""));
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['Lookup_priv_update_'][] = 'Y';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['priv_update_']) && !empty($this->NM_ajax_info['select_html']['priv_update_']))
          {
              eval("\$sOptComp = \"" . $this->NM_ajax_info['select_html']['priv_update_'] . "\";");
          }
                  $this->NM_ajax_info['fldList']['priv_update_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'valList' => explode(';', $aRecData['priv_update_']),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-priv_update_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['priv_update_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['priv_update_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['priv_update_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("priv_export_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['priv_export_']);
                  $aLookup = array();
$aLookup[] = array(app_form_sec_groups_apps_pack_protect_string('Y') => app_form_sec_groups_apps_pack_protect_string("" . $this->Ini->Nm_lang['lang_opt_yes'] . ""));
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['Lookup_priv_export_'][] = 'Y';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['priv_export_']) && !empty($this->NM_ajax_info['select_html']['priv_export_']))
          {
              eval("\$sOptComp = \"" . $this->NM_ajax_info['select_html']['priv_export_'] . "\";");
          }
                  $this->NM_ajax_info['fldList']['priv_export_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'valList' => explode(';', $aRecData['priv_export_']),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-priv_export_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['priv_export_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['priv_export_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['priv_export_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("priv_print_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['priv_print_']);
                  $aLookup = array();
$aLookup[] = array(app_form_sec_groups_apps_pack_protect_string('Y') => app_form_sec_groups_apps_pack_protect_string("" . $this->Ini->Nm_lang['lang_opt_yes'] . ""));
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['Lookup_priv_print_'][] = 'Y';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['priv_print_']) && !empty($this->NM_ajax_info['select_html']['priv_print_']))
          {
              eval("\$sOptComp = \"" . $this->NM_ajax_info['select_html']['priv_print_'] . "\";");
          }
                  $this->NM_ajax_info['fldList']['priv_print_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'valList' => explode(';', $aRecData['priv_print_']),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-priv_print_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['priv_print_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['priv_print_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['priv_print_' . $sc_seq_vert]['labList'] = $aLabel;
              }
          }
   }

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload_record($sc_seq_vert=0)
  {
          if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
          $_SESSION['scriptcase']['app_form_sec_groups_apps']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_app_name_ = $this->app_name_;
}
if (!isset($this->sc_temp_arr_apps)) {$this->sc_temp_arr_apps = (isset($_SESSION['arr_apps'])) ? $_SESSION['arr_apps'] : "";}
 if( isset( $this->sc_temp_arr_apps[ $this->app_name_  ] ) )
{
	switch(trim($this->sc_temp_arr_apps[ $this->app_name_  ]))
	{
		case 'form':
		break;
		case 'calendar':
			$this->sc_ajax_javascript('nm_field_disabled', array("priv_export_=disabled;priv_print_=disabled", "", $sc_seq_vert));
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_disabled'][$sc_seq_vert]['priv_export_'] = true;
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_disabled'][$sc_seq_vert]['priv_print_'] = true;
;
		break;
		case 'cons':
			$this->sc_ajax_javascript('nm_field_disabled', array("priv_insert_=disabled;priv_delete_=disabled;priv_update_=disabled", "", $sc_seq_vert));
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_disabled'][$sc_seq_vert]['priv_insert_'] = true;
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_disabled'][$sc_seq_vert]['priv_delete_'] = true;
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_disabled'][$sc_seq_vert]['priv_update_'] = true;
;
		break;
		default:
			$this->sc_ajax_javascript('nm_field_disabled', array("priv_insert_=disabled;priv_delete_=disabled;priv_update_=disabled;priv_export_=disabled;priv_print_=disabled", "", $sc_seq_vert));
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_disabled'][$sc_seq_vert]['priv_insert_'] = true;
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_disabled'][$sc_seq_vert]['priv_delete_'] = true;
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_disabled'][$sc_seq_vert]['priv_update_'] = true;
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_disabled'][$sc_seq_vert]['priv_export_'] = true;
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_disabled'][$sc_seq_vert]['priv_print_'] = true;
;
		break;
	}
}
if (isset($this->sc_temp_arr_apps)) { $_SESSION['arr_apps'] = $this->sc_temp_arr_apps;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_app_name_ != $this->app_name_ || (isset($bFlagRead_app_name_) && $bFlagRead_app_name_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['app_name_' . $this->nmgp_refresh_row]['type']    = 'label';
        $this->NM_ajax_info['fldList']['app_name_' . $this->nmgp_refresh_row]['valList'] = array($this->app_name_);
        $this->NM_ajax_changed['app_name_'] = true;
    }
}
$_SESSION['scriptcase']['app_form_sec_groups_apps']['contr_erro'] = 'off'; 
          }
  }
  function nm_proc_onload($bFormat = true)
  {
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//----------- 


   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros

   function nm_acessa_banco() 
   { 
      global $sc_seq_vert,  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      $SC_tem_cmp_update = true; 
      if ($this->nmgp_opcao == "alterar")
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert];
          if ($this->nmgp_dados_select['app_name_'] == $this->app_name_ &&
              $this->nmgp_dados_select['priv_access_'] == $this->priv_access_ &&
              $this->nmgp_dados_select['priv_insert_'] == $this->priv_insert_ &&
              $this->nmgp_dados_select['priv_delete_'] == $this->priv_delete_ &&
              $this->nmgp_dados_select['priv_update_'] == $this->priv_update_ &&
              $this->nmgp_dados_select['priv_export_'] == $this->priv_export_ &&
              $this->nmgp_dados_select['priv_print_'] == $this->priv_print_)
          {
              $SC_ex_update = false; 
              $SC_ex_upd_or = false; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['app_name_'] = $this->app_name_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['priv_access_'] = $this->priv_access_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['priv_insert_'] = $this->priv_insert_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['priv_delete_'] = $this->priv_delete_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['priv_update_'] = $this->priv_update_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['priv_export_'] = $this->priv_export_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['priv_print_'] = $this->priv_print_;
          }
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Db->BeginTrans(); 
          $this->Ini->sc_tem_trans_banco = true; 
      } 
      $NM_val_form['app_name_'] = $this->app_name_;
      $NM_val_form['priv_access_'] = $this->priv_access_;
      $NM_val_form['priv_insert_'] = $this->priv_insert_;
      $NM_val_form['priv_delete_'] = $this->priv_delete_;
      $NM_val_form['priv_update_'] = $this->priv_update_;
      $NM_val_form['priv_export_'] = $this->priv_export_;
      $NM_val_form['priv_print_'] = $this->priv_print_;
      $NM_val_form['group_id_'] = $this->group_id_;
      if ($this->group_id_ == "")  
      { 
          $this->group_id_ = 0;
      } 
      $nm_bases_lob_geral = array();
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->app_name__before_qstr = $this->app_name_;
          $this->app_name_ = substr($this->Db->qstr($this->app_name_), 1, -1); 
          $this->priv_access__before_qstr = $this->priv_access_;
          $this->priv_access_ = substr($this->Db->qstr($this->priv_access_), 1, -1); 
          $this->priv_insert__before_qstr = $this->priv_insert_;
          $this->priv_insert_ = substr($this->Db->qstr($this->priv_insert_), 1, -1); 
          $this->priv_delete__before_qstr = $this->priv_delete_;
          $this->priv_delete_ = substr($this->Db->qstr($this->priv_delete_), 1, -1); 
          $this->priv_update__before_qstr = $this->priv_update_;
          $this->priv_update_ = substr($this->Db->qstr($this->priv_update_), 1, -1); 
          $this->priv_export__before_qstr = $this->priv_export_;
          $this->priv_export_ = substr($this->Db->qstr($this->priv_export_), 1, -1); 
          $this->priv_print__before_qstr = $this->priv_print_;
          $this->priv_print_ = substr($this->Db->qstr($this->priv_print_), 1, -1); 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where group_id = $this->group_id_ and app_name = '$this->app_name_' ";
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where group_id = $this->group_id_ and app_name = '$this->app_name_' "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 app_form_sec_groups_apps_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_nfnd']; 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $comando_oracle = "";  
              $comando = "UPDATE " . $this->Ini->nm_tabela . " SET priv_access = '$this->priv_access_', priv_insert = '$this->priv_insert_', priv_delete = '$this->priv_delete_', priv_update = '$this->priv_update_', priv_export = '$this->priv_export_', priv_print = '$this->priv_print_'";  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              $comando .= " WHERE group_id = $this->group_id_ and app_name = '$this->app_name_' ";  
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              if ($SC_ex_update || $SC_tem_cmp_update)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg(), true); 
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $this->Db->ErrorMsg();  
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  app_form_sec_groups_apps_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
          $this->app_name_ = $this->app_name__before_qstr;
          $this->priv_access_ = $this->priv_access__before_qstr;
          $this->priv_insert_ = $this->priv_insert__before_qstr;
          $this->priv_delete_ = $this->priv_delete__before_qstr;
          $this->priv_update_ = $this->priv_update__before_qstr;
          $this->priv_export_ = $this->priv_export__before_qstr;
          $this->priv_print_ = $this->priv_print__before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['db_changed'] = true;

              $this->sc_teve_alt = true; 
              if     (isset($NM_val_form) && isset($NM_val_form['app_name_'])) { $this->app_name_ = $NM_val_form['app_name_']; }
              elseif (isset($this->app_name_)) { $this->nm_limpa_alfa($this->app_name_); }
              if     (isset($NM_val_form) && isset($NM_val_form['priv_access_'])) { $this->priv_access_ = $NM_val_form['priv_access_']; }
              elseif (isset($this->priv_access_)) { $this->nm_limpa_alfa($this->priv_access_); }
              if     (isset($NM_val_form) && isset($NM_val_form['priv_insert_'])) { $this->priv_insert_ = $NM_val_form['priv_insert_']; }
              elseif (isset($this->priv_insert_)) { $this->nm_limpa_alfa($this->priv_insert_); }
              if     (isset($NM_val_form) && isset($NM_val_form['priv_delete_'])) { $this->priv_delete_ = $NM_val_form['priv_delete_']; }
              elseif (isset($this->priv_delete_)) { $this->nm_limpa_alfa($this->priv_delete_); }
              if     (isset($NM_val_form) && isset($NM_val_form['priv_update_'])) { $this->priv_update_ = $NM_val_form['priv_update_']; }
              elseif (isset($this->priv_update_)) { $this->nm_limpa_alfa($this->priv_update_); }
              if     (isset($NM_val_form) && isset($NM_val_form['priv_export_'])) { $this->priv_export_ = $NM_val_form['priv_export_']; }
              elseif (isset($this->priv_export_)) { $this->nm_limpa_alfa($this->priv_export_); }
              if     (isset($NM_val_form) && isset($NM_val_form['priv_print_'])) { $this->priv_print_ = $NM_val_form['priv_print_']; }
              elseif (isset($this->priv_print_)) { $this->nm_limpa_alfa($this->priv_print_); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array('app_name_', 'priv_access_', 'priv_insert_', 'priv_delete_', 'priv_update_', 'priv_export_', 'priv_print_');
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
              {

                  $this->NM_ajax_info['readOnly']['app_name_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['priv_access_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['priv_insert_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['priv_delete_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['priv_update_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['priv_export_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['priv_print_' . $this->nmgp_refresh_row] = 'on';


                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          $bInsertOk = true;
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where group_id = $this->group_id_ and app_name = '$this->app_name_' "; 
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where group_id = $this->group_id_ and app_name = '$this->app_name_' "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 0) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_pkey']; 
              $this->nmgp_opcao = "nada"; 
              $GLOBALS["erro_incl"] = 1; 
              $bInsertOk = false;
              $this->sc_evento = 'insert';
          } 
          $rs1->Close(); 
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if ($bInsertOk)
          { 
              $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "group_id, app_name, priv_access, priv_insert, priv_delete, priv_update, priv_export, priv_print) VALUES (" . $NM_seq_auto . "$this->group_id_, '$this->app_name_', '$this->priv_access_', '$this->priv_insert_', '$this->priv_delete_', '$this->priv_update_', '$this->priv_export_', '$this->priv_print_')"; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg(), true); 
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                      { 
                          $this->sc_erro_insert = $this->Db->ErrorMsg();  
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              app_form_sec_groups_apps_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['db_changed'] = true;

              $this->sc_evento = "insert"; 
              $this->sc_teve_incl = true; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['app_name_'] = $this->app_name_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['priv_access_'] = $this->priv_access_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['priv_insert_'] = $this->priv_insert_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['priv_delete_'] = $this->priv_delete_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['priv_update_'] = $this->priv_update_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['priv_export_'] = $this->priv_export_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert]['priv_print_'] = $this->priv_print_;
              if (!empty($this->sc_force_zero))
              {
                  foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
                  {
                      eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
                  }
              }
              $this->sc_force_zero = array();
              if (!empty($NM_val_null))
              {
                  foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
                  {
                      eval('$this->' . $sc_val_null_field . ' = "";');
                  }
              }
              if (isset($this->app_name_)) { $this->nm_limpa_alfa($this->app_name_); }
              if (isset($this->priv_access_)) { $this->nm_limpa_alfa($this->priv_access_); }
              if (isset($this->priv_insert_)) { $this->nm_limpa_alfa($this->priv_insert_); }
              if (isset($this->priv_delete_)) { $this->nm_limpa_alfa($this->priv_delete_); }
              if (isset($this->priv_update_)) { $this->nm_limpa_alfa($this->priv_update_); }
              if (isset($this->priv_export_)) { $this->nm_limpa_alfa($this->priv_export_); }
              if (isset($this->priv_print_)) { $this->nm_limpa_alfa($this->priv_print_); }
              if (isset($this->Embutida_form) && $this->Embutida_form)
              {
                  $this->nm_guardar_campos();
                  $this->nm_formatar_campos();

                  $this->NM_ajax_info['fldList']['app_name_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['app_name_' . $this->nmgp_refresh_row]['valList'] = array($this->app_name_);
                  $this->NM_ajax_info['fldList']['app_name_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_app_name_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['app_name_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['app_name_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['app_name_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['app_name_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(app_form_sec_groups_apps_pack_protect_string('Y') => app_form_sec_groups_apps_pack_protect_string("" . $this->Ini->Nm_lang['lang_opt_yes'] . ""));
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['Lookup_priv_access_'][] = 'Y';
          $sLabelTemp = '';
          $aTemp_priv_access_ = explode(';', $this->priv_access_);
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_priv_access_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_priv_access_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['priv_access_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['priv_access_' . $this->nmgp_refresh_row]['valList'] = array($this->priv_access_);
                  $this->NM_ajax_info['fldList']['priv_access_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_priv_access_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['priv_access_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['priv_access_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['priv_access_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['priv_access_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(app_form_sec_groups_apps_pack_protect_string('Y') => app_form_sec_groups_apps_pack_protect_string("" . $this->Ini->Nm_lang['lang_opt_yes'] . ""));
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['Lookup_priv_insert_'][] = 'Y';
          $sLabelTemp = '';
          $aTemp_priv_insert_ = explode(';', $this->priv_insert_);
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_priv_insert_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_priv_insert_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['priv_insert_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['priv_insert_' . $this->nmgp_refresh_row]['valList'] = array($this->priv_insert_);
                  $this->NM_ajax_info['fldList']['priv_insert_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_priv_insert_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['priv_insert_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['priv_insert_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['priv_insert_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['priv_insert_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(app_form_sec_groups_apps_pack_protect_string('Y') => app_form_sec_groups_apps_pack_protect_string("" . $this->Ini->Nm_lang['lang_opt_yes'] . ""));
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['Lookup_priv_delete_'][] = 'Y';
          $sLabelTemp = '';
          $aTemp_priv_delete_ = explode(';', $this->priv_delete_);
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_priv_delete_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_priv_delete_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['priv_delete_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['priv_delete_' . $this->nmgp_refresh_row]['valList'] = array($this->priv_delete_);
                  $this->NM_ajax_info['fldList']['priv_delete_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_priv_delete_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['priv_delete_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['priv_delete_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['priv_delete_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['priv_delete_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(app_form_sec_groups_apps_pack_protect_string('Y') => app_form_sec_groups_apps_pack_protect_string("" . $this->Ini->Nm_lang['lang_opt_yes'] . ""));
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['Lookup_priv_update_'][] = 'Y';
          $sLabelTemp = '';
          $aTemp_priv_update_ = explode(';', $this->priv_update_);
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_priv_update_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_priv_update_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['priv_update_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['priv_update_' . $this->nmgp_refresh_row]['valList'] = array($this->priv_update_);
                  $this->NM_ajax_info['fldList']['priv_update_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_priv_update_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['priv_update_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['priv_update_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['priv_update_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['priv_update_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(app_form_sec_groups_apps_pack_protect_string('Y') => app_form_sec_groups_apps_pack_protect_string("" . $this->Ini->Nm_lang['lang_opt_yes'] . ""));
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['Lookup_priv_export_'][] = 'Y';
          $sLabelTemp = '';
          $aTemp_priv_export_ = explode(';', $this->priv_export_);
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_priv_export_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_priv_export_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['priv_export_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['priv_export_' . $this->nmgp_refresh_row]['valList'] = array($this->priv_export_);
                  $this->NM_ajax_info['fldList']['priv_export_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_priv_export_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['priv_export_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['priv_export_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['priv_export_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['priv_export_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(app_form_sec_groups_apps_pack_protect_string('Y') => app_form_sec_groups_apps_pack_protect_string("" . $this->Ini->Nm_lang['lang_opt_yes'] . ""));
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['Lookup_priv_print_'][] = 'Y';
          $sLabelTemp = '';
          $aTemp_priv_print_ = explode(';', $this->priv_print_);
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_priv_print_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_priv_print_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['priv_print_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['priv_print_' . $this->nmgp_refresh_row]['valList'] = array($this->priv_print_);
                  $this->NM_ajax_info['fldList']['priv_print_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_priv_print_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['priv_print_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['priv_print_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['priv_print_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['priv_print_' . $this->nmgp_refresh_row] = "on";
                      }
                  }


                  $this->nm_tira_formatacao();

                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->group_id_ = substr($this->Db->qstr($this->group_id_), 1, -1); 
          $this->app_name_ = substr($this->Db->qstr($this->app_name_), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where group_id = $this->group_id_ and app_name = '$this->app_name_'"; 
          $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where group_id = $this->group_id_ and app_name = '$this->app_name_' "); 
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_dele_nfnd']; 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where group_id = $this->group_id_ and app_name = '$this->app_name_' "; 
              $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where group_id = $this->group_id_ and app_name = '$this->app_name_' "); 
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          app_form_sec_groups_apps_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['db_changed'] = true;

              $this->sc_teve_excl = true; 
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['parms'] = "group_id_?#?$this->group_id_?@?app_name_?#?$this->app_name_?@?"; 
      }
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->group_id_ = substr($this->Db->qstr($this->group_id_), 1, -1); 
          $this->app_name_ = substr($this->Db->qstr($this->app_name_), 1, -1); 
      } 
   }
//---------- 
   function nm_select_banco() 
   { 
      global $nm_form_submit, $sc_seq_vert, $sc_check_incl, $teste_validade, $sc_where;
 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['rows']))
      {
          $this->sc_max_reg = $_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['rows'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['rows_ins']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['rows_ins']))
      {
          $this->sc_max_reg_incl = $_SESSION['scriptcase']['sc_apl_conf']['app_form_sec_groups_apps']['rows_ins'];
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_qtd_reg']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_qtd_reg'])
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_qtd_reg'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_max_reg']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_max_reg'] > 0 || strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_max_reg']) == "all"))
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_max_reg'];
      } 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
      $this->form_vert_app_form_sec_groups_apps = array();
      if ($this->nmgp_opcao != "novo") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['parms'] = ""; 
      } 
      if ($this->sc_teve_excl)
      {
          $this->nmgp_opcao = "avanca";
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] -= $this->sc_max_reg;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] = 0;
      }
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_filter'] . ")";
          }
      }
      $sc_where = "";
      if ('' != $sc_where_filter)
      {
          $sc_where = (isset($sc_where) && '' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (((isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao) || (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)) && !$this->has_where_params && 'novo' != $this->nmgp_opcao)
      {
          $aNewWhereCond = array();
          if (null != $this->app_name_)
          {
              $aNewWhereCond[] = "app_name = '" . $this->app_name_ . "'";
          }
          if (null != $this->group_id_)
          {
              $aNewWhereCond[] = "group_id = " . $this->group_id_;
          }
          if (!empty($aNewWhereCond))
          {
              if ('' == $sc_where)
              {
                  $sc_where = " where (";
              }
              else
              {
                  $sc_where .= " and (";
              }
              $sc_where .= implode(" and ", $aNewWhereCond) . ")";
          }
      }
      if ('total' != $this->form_paginacao)
      {
          if ($this->app_is_initializing || $this->sc_teve_excl || $this->sc_teve_incl || (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['total']))
          {
              $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where;
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
              $rt = $this->Db->Execute($nmgp_select);
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit;
              }
              $qt_geral_reg_app_form_sec_groups_apps = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['total'] = $qt_geral_reg_app_form_sec_groups_apps;
              $rt->Close();
          }
      if ((isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['total']) || $this->sc_teve_excl || $this->sc_teve_incl)
      { 
          if (!$this->sc_teve_excl && !$this->sc_teve_incl) 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] = 0; 
          } 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->group_id_) && !empty($this->app_name_))
          {
              $Reg_OK      = false;
              $Count_start = -1;
              $sc_order_by = "";
              $Sel_Chave = "group_id, app_name"; 
              $nmgp_select = "SELECT " . $Sel_Chave . " from " . $this->Ini->nm_tabela . $sc_where; 
              $sc_order_by = "group_id, app_name";
              $sc_order_by = str_replace("order by ", "", $sc_order_by);
              $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
              if (!empty($sc_order_by))
              {
                  $nmgp_select .= " order by $sc_order_by "; 
              }
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              while (!$rt->EOF && !$Reg_OK)
              { 
                  if ($rt->fields[0] == $this->group_id_ && $rt->fields[1] == $this->app_name_)
                  { 
                      $Reg_OK = true;
                  }  
                  $Count_start++;
                  $rt->MoveNext();
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] = $Count_start;
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_app_form_sec_groups_apps = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['total'];
      } 
      if ($this->nmgp_opcao == "inicio" || $this->nmgp_opcao == "ordem") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_app_form_sec_groups_apps) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] += $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] > $qt_geral_reg_app_form_sec_groups_apps)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] = $qt_geral_reg_app_form_sec_groups_apps - $this->sc_max_reg; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] = 0; 
              }
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] -= $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] = ($qt_geral_reg_app_form_sec_groups_apps + 1) - $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] = 0; 
          }
      } 
      }
      $Cmps_ord_def = array();
      $Cmps_ord_def[] = "app_name";
      $Cmps_ord_def[] = "priv_access";
      $Cmps_ord_def[] = "priv_insert";
      $Cmps_ord_def[] = "priv_delete";
      $Cmps_ord_def[] = "priv_update";
      $Cmps_ord_def[] = "priv_export";
      $Cmps_ord_def[] = "priv_print";
      $sc_order_by  = "";
      $sc_order_by = "group_id, app_name";
      $sc_order_by = str_replace("order by ", "", $sc_order_by);
      $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
      if (!empty($sc_order_by))
      {
          $sc_order_by = " order by $sc_order_by "; 
      }
      if ($this->nmgp_opcao == "ordem" && in_array($this->nmgp_ordem, $Cmps_ord_def)) 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_cmp'] != $this->nmgp_ordem)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_cmp'] = $this->nmgp_ordem; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_ord'] = ' asc'; 
          }
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_ord'] == ' asc')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_ord'] = ' desc'; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_ord'] = ' asc'; 
          }
      } 
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_cmp'])) 
      { 
          $sc_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_cmp'] . $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_ord']; 
      } 
      $nmgp_select = "SELECT group_id, app_name, priv_access, priv_insert, priv_delete, priv_update, priv_export, priv_print from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      if ($this->nmgp_opcao != "novo") 
      { 
      if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
          $rs = $this->Db->Execute($nmgp_select) ;
      }
      elseif ('total' == $this->form_paginacao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
      }
      else
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] == "R")
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          else 
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start']) ; 
              } 
              else  
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
                  $rs = $this->Db->Execute($nmgp_select) ; 
                  if (!$rs === false && !$rs->EOF) 
                  { 
                      $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start']) ;  
                  } 
              } 
          } 
      }
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF && $this->nmgp_botoes['new'] != "on" && !$this->proc_fast_search)
          {
              $this->nmgp_form_empty = true;
          }
          if ($rs->EOF)
          {
              $sc_seq_vert = 0; 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_filter']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['empty_filter'] = true;
              }
          }
          else
          {
              $sc_seq_vert = 1; 
          }
          if ('total' == $this->form_paginacao)
          {
              $bPagTest = true;
              $this->sc_max_reg = 0;
          }
          else
          {
              $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
          }
          while (!$rs->EOF && $bPagTest)
          { 
              if ('total' == $this->form_paginacao)
              {
                  $this->sc_max_reg++;
              }
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $guard_seq_vert = $sc_seq_vert;
                  $sc_seq_vert    = $this->nmgp_refresh_row;
              }
              if ('total' != $this->form_paginacao)
              {
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] == "R")
              { 
                  $this->sc_max_reg++;
              } 
              }
              $this->group_id_ = $rs->fields[0] ; 
              $this->nmgp_dados_select['group_id_'] = $this->group_id_;
              $this->app_name_ = $rs->fields[1] ; 
              $this->nmgp_dados_select['app_name_'] = $this->app_name_;
              $this->priv_access_ = $rs->fields[2] ; 
              $this->nmgp_dados_select['priv_access_'] = $this->priv_access_;
              $this->priv_insert_ = $rs->fields[3] ; 
              $this->nmgp_dados_select['priv_insert_'] = $this->priv_insert_;
              $this->priv_delete_ = $rs->fields[4] ; 
              $this->nmgp_dados_select['priv_delete_'] = $this->priv_delete_;
              $this->priv_update_ = $rs->fields[5] ; 
              $this->nmgp_dados_select['priv_update_'] = $this->priv_update_;
              $this->priv_export_ = $rs->fields[6] ; 
              $this->nmgp_dados_select['priv_export_'] = $this->priv_export_;
              $this->priv_print_ = $rs->fields[7] ; 
              $this->nmgp_dados_select['priv_print_'] = $this->priv_print_;
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->group_id_ = (string)$this->group_id_; 
              if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['parms'])) 
              { 
                  $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['parms'] = "group_id_?#?$this->group_id_?@?app_name_?#?$this->app_name_?@?";
              } 
              $this->nm_proc_onload_record($sc_seq_vert);
//
//-- 
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dados_select'][$sc_seq_vert] = $this->nmgp_dados_select;
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['app_name_'] =  $this->app_name_; 
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['priv_access_'] =  $this->priv_access_; 
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['priv_insert_'] =  $this->priv_insert_; 
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['priv_delete_'] =  $this->priv_delete_; 
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['priv_update_'] =  $this->priv_update_; 
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['priv_export_'] =  $this->priv_export_; 
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['priv_print_'] =  $this->priv_print_; 
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['group_id_'] =  $this->group_id_; 
              $sc_seq_vert++; 
              $rs->MoveNext() ; 
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $sc_seq_vert = $guard_seq_vert;
              }
              if ('total' != $this->form_paginacao)
              {
                  $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
              }
          } 
          ksort ($this->form_vert_app_form_sec_groups_apps); 
          $rs->Close(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_qtd'] = $sc_seq_vert + $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] - 1;
          if ('total' == $this->form_paginacao)
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $this->sc_max_reg; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $this->sc_max_reg; 
          }
          else
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['total'] + 1; 
          }
          if ($this->form_paginacao == "total")
          {
              $this->SC_nav_page = "";
          }
          else
          {
              $this->NM_gera_nav_page(); 
          }
          $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] < (($qt_geral_reg_app_form_sec_groups_apps + 1) - $this->sc_max_reg);
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['opcao'] = '';
          }
      } 
      if ($this->nmgp_opcao == "novo") 
      { 
          $sc_seq_vert = 1; 
          $sc_check_incl = array(); 
          if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao) 
          { 
              $sc_seq_vert = $this->sc_seq_vert; 
              $this->sc_evento = "novo"; 
              $this->sc_max_reg_incl = $this->sc_seq_vert; 
          } 
          elseif ($this->Embutida_form) 
          { 
              $this->sc_max_reg_incl = 0; 
          } 
          while ($sc_seq_vert <= $this->sc_max_reg_incl) 
          { 
              $this->app_name_ = "";  
              $this->priv_access_ = "";  
              $this->priv_insert_ = "";  
              $this->priv_delete_ = "";  
              $this->priv_update_ = "";  
              $this->priv_export_ = "";  
              $this->priv_print_ = "";  
              $this->nm_proc_onload_record($sc_seq_vert);
              if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['foreign_key']))
              {
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['foreign_key'] as $sFKName => $sFKValue)
                  {
                      if (isset($this->sc_conv_var[$sFKName]))
                      {
                          $sFKName = $this->sc_conv_var[$sFKName];
                      }
                      eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
                  }
              }
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['app_name_'] =  $this->app_name_; 
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['priv_access_'] =  $this->priv_access_; 
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['priv_insert_'] =  $this->priv_insert_; 
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['priv_delete_'] =  $this->priv_delete_; 
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['priv_update_'] =  $this->priv_update_; 
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['priv_export_'] =  $this->priv_export_; 
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['priv_print_'] =  $this->priv_print_; 
             $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['group_id_'] =  $this->group_id_; 
              $sc_seq_vert++; 
          } 
      }  
  }
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = $this->sc_max_reg;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] + $this->sc_max_reg;
       $rec_fim    = ($rec_fim > $rec_tot) ? $rec_tot : $rec_fim;
       if ($rec_tot == 0)
       {
           return;
       }
       $Qtd_Pages  = ceil($rec_tot / $Reg_Page);
       $Page_Atu   = ceil($rec_fim / $Reg_Page);
       $Link_ini   = 1;
       if ($Page_Atu > $Max_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       elseif ($Page_Atu > $Mid_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       if (($Qtd_Pages - $Link_ini) < $Max_link)
       {
           $Link_ini = ($Qtd_Pages - $Max_link) + 1;
       }
       if ($Link_ini < 1)
       {
           $Link_ini = 1;
       }
       for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
       {
           $rec = (($Link_ini - 1) * $Reg_Page) + 1;
           if ($Link_ini == $Page_Atu)
           {
               $Arr_result[$Ind_result] = '<span class="scFormToolbarNavOpen" style="vertical-align: middle;">' . $Link_ini . '</span>';
           }
           else
           {
               $Arr_result[$Ind_result] = '<a class="scFormToolbarNav" style="vertical-align: middle;" href="javascript: nm_navpage(' . $rec . ')">' . $Link_ini . '</a>';
           }
           $Link_ini++;
           $Ind_result++;
           if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
           {
               $Arr_result[$Ind_result] = '<img src="' . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . '" align="absmiddle" style="vertical-align: middle;">';
               $Ind_result++;
           }
       }
       if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
       {
           krsort($Arr_result);
       }
       foreach ($Arr_result as $Ind_result => $Lin_result)
       {
           $this->SC_nav_page .= $Lin_result;
       }
   }
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              app_form_sec_groups_apps_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
   if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
   {
        $this->Form_Corpo(true);
   }
   elseif ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
   {
        $this->Form_Table(true);
        $this->Form_Corpo(false, true);
   }
   else
   {
        $this->Form_Init();
        $this->Form_Table();
        $this->Form_Corpo();
        $this->Form_Fim();
   }
 }

 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

 function new_date_format($type, $field)
 {
     $new_date_format = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format .= $time_sep;
         }
         else
         {
             $new_date_format .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format;
     if ('DH' == $type)
     {
         $new_date_format                                      = explode(';', $new_date_format);
         $this->field_config[$field]['date_format_js']        = $new_date_format[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              app_form_sec_groups_apps_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "group_id", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "app_name", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_priv_access_($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "priv_access", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_priv_insert_($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "priv_insert", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_priv_delete_($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "priv_delete", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_priv_update_($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "priv_update", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_priv_export_($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "priv_export", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_priv_print_($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "priv_print", $arg_search, $data_lookup);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      $sc_where = " where " . $comando;
      $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_app_form_sec_groups_apps = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['total'] = $qt_geral_reg_app_form_sec_groups_apps;
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          app_form_sec_groups_apps_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "group_id";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['decimal_db'] == ".")
         {
             $nm_aspas = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_aspas . $Cmp . $nm_aspas;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         switch (strtoupper($condicao))
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." like '%" . $campo . "%'";
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." not like '%" . $campo . "%'";
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas;
            break;
            case "GT":     // 
               $comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas;
            break;
            case "GE":     // 
               $comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas;
            break;
            case "LT":     // 
               $comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas;
            break;
            case "LE":     // 
               $comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas;
            break;
         }
   }
   function SC_lookup_priv_access_($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['Y'] = "" . $this->Ini->Nm_lang['lang_opt_yes'] . "";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_priv_insert_($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['Y'] = "" . $this->Ini->Nm_lang['lang_opt_yes'] . "";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_priv_delete_($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['Y'] = "" . $this->Ini->Nm_lang['lang_opt_yes'] . "";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_priv_update_($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['Y'] = "" . $this->Ini->Nm_lang['lang_opt_yes'] . "";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_priv_export_($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['Y'] = "" . $this->Ini->Nm_lang['lang_opt_yes'] . "";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_priv_print_($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['Y'] = "" . $this->Ini->Nm_lang['lang_opt_yes'] . "";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_outra_jan'])
   {
       $nmgp_saida_form = "app_form_sec_groups_apps_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['opc_ant']);
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = '_self';
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       app_form_sec_groups_apps_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo NM_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo NM_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
     <INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
    function sc_ajax_javascript($sJsFunc, $aParam = array())
    {
        if ($this->NM_ajax_flag)
        {
            $this->NM_ajax_info['ajaxJavascript'][] = array($sJsFunc, $aParam);
        }
        else
        {
            foreach ($aParam as $i => $v)
            {
                $aParam[$i] = '"' . str_replace('"', '\"', $v) . '"';
            }
            $this->NM_non_ajax_info['ajaxJavascript'][] = array($sJsFunc, $aParam);
        }
    } // sc_ajax_javascript
}
?>