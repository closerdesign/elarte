<?php
   include_once('grid_usuarios_session.php');
   @session_start() ;
   $_SESSION['scriptcase']['grid_usuarios']['glo_nm_perfil']          = "conn_mysql";
   $_SESSION['scriptcase']['grid_usuarios']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['grid_usuarios']['glo_nm_path_conf']       = "";
   $_SESSION['scriptcase']['grid_usuarios']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['grid_usuarios']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['grid_usuarios']['glo_nm_path_doc']        = "";
//
class grid_usuarios_ini
{
   var $nm_cod_apl;
   var $nm_nome_apl;
   var $nm_seguranca;
   var $nm_grupo;
   var $nm_autor;
   var $nm_versao_sc;
   var $nm_tp_lic_sc;
   var $nm_dt_criacao;
   var $nm_hr_criacao;
   var $nm_autor_alt;
   var $nm_dt_ult_alt;
   var $nm_hr_ult_alt;
   var $nm_timestamp;
   var $nm_app_version;
   var $cor_link_dados;
   var $root;
   var $server;
   var $java_protocol;
   var $server_pdf;
   var $Arr_result;
   var $sc_protocolo;
   var $path_prod;
   var $path_link;
   var $path_aplicacao;
   var $path_embutida;
   var $path_botoes;
   var $path_img_global;
   var $path_img_modelo;
   var $path_icones;
   var $path_imagens;
   var $path_imag_cab;
   var $path_imag_temp;
   var $path_libs;
   var $path_doc;
   var $str_lang;
   var $str_conf_reg;
   var $str_schema_all;
   var $Str_btn_grid;
   var $str_schema_filter;
   var $Str_btn_filter;
   var $path_cep;
   var $path_secure;
   var $path_js;
   var $path_help;
   var $path_adodb;
   var $path_grafico;
   var $path_atual;
   var $Gd_missing;
   var $sc_site_ssl;
   var $nm_cont_lin;
   var $nm_limite_lin;
   var $nm_limite_lin_prt;
   var $nm_limite_lin_res;
   var $nm_limite_lin_res_prt;
   var $nm_falta_var;
   var $nm_falta_var_db;
   var $nm_tpbanco;
   var $nm_servidor;
   var $nm_usuario;
   var $nm_senha;
   var $nm_database_encoding;
   var $nm_con_db2 = array();
   var $nm_con_persistente;
   var $nm_con_use_schema;
   var $nm_tabela;
   var $nm_col_dinamica   = array();
   var $nm_order_dinamico = array();
   var $nm_hidden_blocos  = array();
   var $sc_tem_trans_banco;
   var $nm_bases_all;
   var $nm_bases_mysql;
   var $nm_bases_sqlite;
   var $sc_page;
//
   function init($Tp_init = "")
   {
       global
             $nm_url_saida, $nm_apl_dependente, $script_case_init, $nmgp_opcao;

      $_SESSION['scriptcase']['proc_mobile'] = false;
      $tmp_useragent = $_SERVER['HTTP_USER_AGENT'];
      if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$tmp_useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($tmp_useragent,0,4)))
      {
          $_SESSION['scriptcase']['proc_mobile'] = true;
      }
      @ini_set('magic_quotes_runtime', 0);
      $this->sc_page = $script_case_init;
      $_SESSION['scriptcase']['sc_num_page'] = $script_case_init;
      $_SESSION['scriptcase']['sc_cnt_sql']  = 0;
      $this->sc_charset['UTF-8'] = 'utf-8';
      $this->sc_charset['ISO-8859-1'] = 'iso-8859-1';
      $this->sc_charset['SJIS'] = 'shift-jis';
      $this->sc_charset['ISO-8859-14'] = 'iso-8859-14';
      $this->sc_charset['ISO-8859-7'] = 'iso-8859-7';
      $this->sc_charset['ISO-8859-10'] = 'iso-8859-10';
      $this->sc_charset['ISO-8859-3'] = 'iso-8859-3';
      $this->sc_charset['ISO-8859-15'] = 'iso-8859-15';
      $this->sc_charset['WINDOWS-1252'] = 'windows-1252';
      $this->sc_charset['ISO-8859-13'] = 'iso-8859-13';
      $this->sc_charset['ISO-8859-4'] = 'iso-8859-4';
      $this->sc_charset['ISO-8859-2'] = 'iso-8859-2';
      $this->sc_charset['ISO-8859-5'] = 'iso-8859-5';
      $this->sc_charset['KOI8-R'] = 'koi8-r';
      $this->sc_charset['WINDOWS-1251'] = 'windows-1251';
      $this->sc_charset['BIG-5'] = 'big5';
      $this->sc_charset['EUC-CN'] = 'EUC-CN';
      $this->sc_charset['EUC-JP'] = 'euc-jp';
      $this->sc_charset['ISO-2022-JP'] = 'iso-2022-jp';
      $this->sc_charset['EUC-KR'] = 'euc-kr';
      $this->sc_charset['ISO-2022-KR'] = 'iso-2022-kr';
      $this->sc_charset['ISO-8859-9'] = 'iso-8859-9';
      $this->sc_charset['ISO-8859-6'] = 'iso-8859-6';
      $this->sc_charset['ISO-8859-8'] = 'iso-8859-8';
      $this->sc_charset['ISO-8859-8-I'] = 'iso-8859-8-i';
      $_SESSION['scriptcase']['trial_version'] = 'N';
      $_SESSION['sc_session'][$this->sc_page]['grid_usuarios']['decimal_db'] = "."; 

      $this->nm_cod_apl      = "grid_usuarios"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "Phronesis"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_versao_sc    = "v8"; 
      $this->nm_tp_lic_sc    = "pe_mysql_bronze"; 
      $this->nm_dt_criacao   = "20150409"; 
      $this->nm_hr_criacao   = "074650"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20150725"; 
      $this->nm_hr_ult_alt   = "101910"; 
      $temp_bug_list         = explode(" ", microtime()); 
      list($NM_usec, $NM_sec) = $temp_bug_list; 
      $this->nm_timestamp    = (float) $NM_sec; 
      $this->nm_app_version  = "1.0.0";
// 
// 
      $NM_dir_atual = getcwd();
      if (empty($NM_dir_atual))
      {
          $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
          $str_path_sys          = str_replace("\\", '/', $str_path_sys);
      }
      else
      {
          $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
          $str_path_sys          = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
      }
      //check publication with the prod
      $str_path_apl_url = $_SERVER['PHP_SELF'];
      $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
      $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
      $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
      //check prod
      if(empty($_SESSION['scriptcase']['grid_usuarios']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['grid_usuarios']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
      //check img
      if(empty($_SESSION['scriptcase']['grid_usuarios']['glo_nm_path_imagens']))
      {
              /*check img*/$_SESSION['scriptcase']['grid_usuarios']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
      }
      //check tmp
      if(empty($_SESSION['scriptcase']['grid_usuarios']['glo_nm_path_imag_temp']))
      {
              /*check tmp*/$_SESSION['scriptcase']['grid_usuarios']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
      }
      //check doc
      if(empty($_SESSION['scriptcase']['grid_usuarios']['glo_nm_path_doc']))
      {
              /*check doc*/$_SESSION['scriptcase']['grid_usuarios']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
      }
      //end check publication with the prod
      $this->sc_site_ssl     = (isset($_SERVER['HTTP_REFERER']) && strtolower(substr($_SERVER['HTTP_REFERER'], 0, 5)) == 'https') ? true : false;
      $this->sc_protocolo    = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->sc_protocolo    = "";
      $this->path_prod       = $_SESSION['scriptcase']['grid_usuarios']['glo_nm_path_prod'];
      $this->path_conf       = $_SESSION['scriptcase']['grid_usuarios']['glo_nm_path_conf'];
      $this->path_imagens    = $_SESSION['scriptcase']['grid_usuarios']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['grid_usuarios']['glo_nm_path_imag_temp'];
      $this->path_doc        = $_SESSION['scriptcase']['grid_usuarios']['glo_nm_path_doc'];
      if (!isset($_SESSION['scriptcase']['str_lang']) || empty($_SESSION['scriptcase']['str_lang']))
      {
          $_SESSION['scriptcase']['str_lang'] = "es";
      }
      if (!isset($_SESSION['scriptcase']['str_conf_reg']) || empty($_SESSION['scriptcase']['str_conf_reg']))
      {
          $_SESSION['scriptcase']['str_conf_reg'] = "es_co";
      }
      $this->str_lang        = $_SESSION['scriptcase']['str_lang'];
      $this->str_conf_reg    = $_SESSION['scriptcase']['str_conf_reg'];
      $this->str_schema_all    = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc8_Saphir/Sc8_Saphir";
      $this->str_schema_filter = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc8_Saphir/Sc8_Saphir";
      $_SESSION['scriptcase']['erro']['str_schema'] = $this->str_schema_all . "_error.css";
      $_SESSION['scriptcase']['erro']['str_lang']   = $this->str_lang;
      $this->server          = (!isset($_SERVER['HTTP_HOST'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
      if (!isset($_SERVER['HTTP_HOST']) && isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && !$this->sc_site_ssl )
      {
          $this->server         .= ":" . $_SERVER['SERVER_PORT'];
      }
      $this->java_protocol   = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->server_pdf      = $this->server;
      $this->server          = "";
      $str_path_web          = $_SERVER['PHP_SELF'];
      $str_path_web          = str_replace("\\", '/', $str_path_web);
      $str_path_web          = str_replace('//', '/', $str_path_web);
      $this->root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $this->path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/grid_usuarios';
      $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
      $this->path_aplicacao .= '/';
      $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
      $this->path_botoes     = $this->path_link . "_lib/img";
      $this->path_img_global = $this->path_link . "_lib/img";
      $this->path_img_modelo = $this->path_link . "_lib/img";
      $this->path_icones     = $this->path_link . "_lib/img";
      $this->path_imag_cab   = $this->path_link . "_lib/img";
      $this->path_help       = $this->path_link . "_lib/webhelp/";
      $this->path_font       = $this->root . $this->path_link . "_lib/font/";
      $this->path_btn        = $this->root . $this->path_link . "_lib/buttons/";
      $this->path_css        = $this->root . $this->path_link . "_lib/css/";
      $this->path_lib_php    = $this->root . $this->path_link . "_lib/lib/php";
      $this->path_lib_js     = $this->root . $this->path_link . "_lib/lib/js";
      $this->path_lang       = "../_lib/lang/";
      $this->path_lang_js    = "../_lib/js/";
      $this->path_chart_theme = $this->root . $this->path_link . "_lib/chart/";
      $this->path_cep        = $this->path_prod . "/cep";
      $this->path_cor        = $this->path_prod . "/cor";
      $this->path_js         = $this->path_prod . "/lib/js";
      $this->path_libs       = $this->root . $this->path_prod . "/lib/php";
      $this->path_third      = $this->root . $this->path_prod . "/third";
      $this->path_secure     = $this->root . $this->path_prod . "/secure";
      $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";
      $_SESSION['scriptcase']['dir_temp'] = $this->root . $this->path_imag_temp;
      if (!isset($_SESSION['scriptcase']['fusioncharts_new']))
      {
          $_SESSION['scriptcase']['fusioncharts_new'] = @is_dir($this->path_third . '/fusioncharts_xt_ol');
      }
      if (!isset($_SESSION['scriptcase']['phantomjs_charts']))
      {
          $_SESSION['scriptcase']['phantomjs_charts'] = @is_dir($this->path_third . '/phantomjs');
      }
      if (isset($_SESSION['scriptcase']['phantomjs_charts']))
      {
          $aTmpOS = $this->getRunningOS();
          $_SESSION['scriptcase']['phantomjs_charts'] = @is_dir($this->path_third . '/phantomjs/' . $aTmpOS['os']);
      }
      if (!class_exists('Services_JSON'))
      {
          include_once("grid_usuarios_json.php");
      }
      $this->SC_Link_View = (isset($_SESSION['sc_session'][$this->sc_page]['grid_usuarios']['SC_Link_View'])) ? $_SESSION['sc_session'][$this->sc_page]['grid_usuarios']['SC_Link_View'] : false;
      if (isset($_GET['SC_Link_View']) && !empty($_GET['SC_Link_View']) && is_numeric($_GET['SC_Link_View']))
      {
          if ($_SESSION['sc_session'][$this->sc_page]['grid_usuarios']['embutida'])
          {
              $this->SC_Link_View = true;
              $_SESSION['sc_session'][$this->sc_page]['grid_usuarios']['SC_Link_View'] = true;
          }
      }
      if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "ajax_add_dyn_search")
      {
          $_SESSION['sc_session'][$this->sc_page]['grid_usuarios']['dyn_search_add']['cmp'] = $_POST['parm'];
          $_SESSION['sc_session'][$this->sc_page]['grid_usuarios']['dyn_search_add']['seq'] = $_POST['seq'];
          $_SESSION['sc_session'][$this->sc_page]['grid_usuarios']['opcao'] = $_POST['origem'];
          $nmgp_opcao = $_POST['origem'];
      }
      if (isset($_SESSION['scriptcase']['user_logout']))
      {
          foreach ($_SESSION['scriptcase']['user_logout'] as $ind => $parms)
          {
              if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
              {
                  unset($_SESSION['scriptcase']['user_logout'][$ind]);
                  $nm_apl_dest = $parms['R'];
                  $dir = explode("/", $nm_apl_dest);
                  if (count($dir) == 1)
                  {
                      $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                      $nm_apl_dest = $this->path_link . SC_dir_app_name($nm_apl_dest) . "/";
                  }
                  if (isset($_POST['nmgp_opcao']) && ($_POST['nmgp_opcao'] == "ajax_event" || $_POST['nmgp_opcao'] == "ajax_navigate"))
                  {
                      $this->Arr_result = array();
                      $this->Arr_result['redirInfo']['action']              = $nm_apl_dest;
                      $this->Arr_result['redirInfo']['target']              = $parms['T'];
                      $this->Arr_result['redirInfo']['metodo']              = "post";
                      $this->Arr_result['redirInfo']['script_case_init']    = $this->sc_page;
                      $this->Arr_result['redirInfo']['script_case_session'] = session_id();
                      $oJson = new Services_JSON();
                      echo $oJson->encode($this->Arr_result);
                      exit;
                  }
?>
                  <html>
                  <body>
                  <form name="FRedirect" method="POST" action="<?php echo $nm_apl_dest; ?>" target="<?php echo $parms['T']; ?>">
                  </form>
                  <script>
                   document.FRedirect.submit();
                  </script>
                  </body>
                  </html>
<?php
                  exit;
              }
          }
      }
      if ($Tp_init == "Path_sub")
      {
          return;
      }
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1);
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['scriptcase']['nm_sc_retorno']);
          unset($_SESSION['scriptcase']['grid_usuarios']['glo_nm_conexao']);
      }
      include($this->path_lang . $this->str_lang . ".lang.php");
      include($this->path_lang . "config_region.php");
      include($this->path_lang . "lang_config_region.php");
      asort($this->Nm_lang_conf_region);
      $_SESSION['scriptcase']['charset']  = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "UTF-8";
      ini_set('default_charset', $_SESSION['scriptcase']['charset']);
      $_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
      if (!function_exists("mb_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtmb'] . "</font></div>";exit;
      } 
      foreach ($this->Nm_lang_conf_region as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang_conf_region[$ind] = mb_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      foreach ($this->Nm_conf_reg[$this->str_conf_reg] as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_conf_reg[$this->str_conf_reg][$ind] = mb_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      foreach ($this->Nm_lang as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
         {
             $ind = mb_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
             $this->Nm_lang[$ind] = $dados;
         }
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang[$ind] = mb_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
      {
          $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
      }
      $PHP_ver = str_replace(".", "", phpversion()); 
      if (substr($PHP_ver, 0, 3) < 434)
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_phpv'] . "</font></div>";exit;
      } 
      if (file_exists($this->path_libs . "/ver.dat"))
      {
          $SC_ver = file($this->path_libs . "/ver.dat"); 
          $SC_ver = str_replace(".", "", $SC_ver[0]); 
          if (substr($SC_ver, 0, 5) < 40015)
          {
              echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_incp'] . "</font></div>";exit;
          } 
      } 
      $_SESSION['sc_session'][$this->sc_page]['grid_usuarios']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      if (empty($this->path_imag_cab))
      {
          $this->path_imag_cab = $this->path_img_global;
      }
      if (!is_dir($this->root . $this->path_prod))
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #65a3b8; border-style: solid; border-width: 0px; padding: 5px 8px;  }";
          echo ".scButton_onmouseover { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #317b94; border-style: solid; border-width: 0px; padding: 5px 8px;  }";
          echo ".scButton_onmousedown { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #0a5770; border-style: solid; border-width: 0px; padding: 5px 8px;  }";
          echo ".scButton_disabled { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #d1d1d1; font-weight: normal; background-color: #808080; border-style: solid; border-width: 0px; padding: 5px 8px;  }";
          echo ".scLink_default { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:hover { text-decoration: none; font-size: 12px; color: #0000AA;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_cmlb_nfnd'] . "</font>";
          echo "  " . $this->root . $this->path_prod;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['grid_usuarios']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['grid_usuarios']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = mb_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = mb_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = mb_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = mb_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
      }

      $this->path_atual  = getcwd();
      $opsys = strtolower(php_uname());

      $this->nm_cont_lin           = 0;
      $this->nm_limite_lin         = 0;
      $this->nm_limite_lin_prt     = 0;
      $this->nm_limite_lin_res     = 0;
      $this->nm_limite_lin_res_prt = 0;
// 
      include_once($this->path_aplicacao . "grid_usuarios_erro.class.php"); 
      $this->Erro = new grid_usuarios_erro();
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
// 
 if(function_exists('set_php_timezone')) set_php_timezone('grid_usuarios'); 
// 
      $this->sc_Include($this->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("es");
      include("../_lib/css/" . $this->str_schema_all . "_grid.php");
      $this->Tree_img_col    = trim($str_tree_col);
      $this->Tree_img_exp    = trim($str_tree_exp);
      $_SESSION['scriptcase']['nmamd'] = array();
      perfil_lib($this->path_libs);
      if (!isset($_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil']))
      {
          if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($this->path_libs, $this->path_prod);
          $_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil'] = true;
      }
      if (function_exists("nm_check_pdf_server")) $this->server_pdf = nm_check_pdf_server($this->path_libs, $this->server_pdf);
      if (!isset($_SESSION['scriptcase']['sc_num_img']))
      { 
          $_SESSION['scriptcase']['sc_num_img'] = 1;
      } 
      $this->arr_buttons_usr = array();

      $this->arr_buttons_usr['Publicaciones']['hint']             = "";
      $this->arr_buttons_usr['Publicaciones']['type']             = "button";
      $this->arr_buttons_usr['Publicaciones']['value']            = "Publicaciones";
      $this->arr_buttons_usr['Publicaciones']['display']          = "only_text";
      $this->arr_buttons_usr['Publicaciones']['display_position'] = "text_right";
      $this->arr_buttons_usr['Publicaciones']['style']            = "default";
      $this->arr_buttons_usr['Publicaciones']['image']            = "";

      $this->arr_buttons_usr['Sesiones']['hint']             = "";
      $this->arr_buttons_usr['Sesiones']['type']             = "button";
      $this->arr_buttons_usr['Sesiones']['value']            = "Sesiones";
      $this->arr_buttons_usr['Sesiones']['display']          = "only_text";
      $this->arr_buttons_usr['Sesiones']['display_position'] = "text_right";
      $this->arr_buttons_usr['Sesiones']['style']            = "default";
      $this->arr_buttons_usr['Sesiones']['image']            = "";

      $this->arr_buttons_usr['Conferencia']['hint']             = "";
      $this->arr_buttons_usr['Conferencia']['type']             = "button";
      $this->arr_buttons_usr['Conferencia']['value']            = "Conferencia";
      $this->arr_buttons_usr['Conferencia']['display']          = "only_text";
      $this->arr_buttons_usr['Conferencia']['display_position'] = "text_right";
      $this->arr_buttons_usr['Conferencia']['style']            = "default";
      $this->arr_buttons_usr['Conferencia']['image']            = "";
      $this->regionalDefault();
      $this->Str_btn_grid    = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
      $this->Str_btn_css     = trim($str_button) . "/" . trim($str_button) . ".css";
      include($this->path_btn . $this->Str_btn_grid);
      $_SESSION['scriptcase']['erro']['str_schema_dir'] = $this->str_schema_all . "_error" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->sc_tem_trans_banco = false;
      $this->nm_bases_mysql      = array("mysql", "mysqlt", "maxsql", "pdo_mysql");
      $this->nm_bases_sqlite     = array("sqlite", "sqlite3", "pdosqlite");
      $this->nm_bases_all        = array_merge($this->nm_bases_mysql, $this->nm_bases_sqlite);
      $this->nm_font_ttf = array("ar", "ja", "pl", "ru", "sk", "thai", "zh_cn", "zh_hk", "cz", "el", "ko", "mk");
      $this->nm_ttf_arab = array("ar");
      $this->nm_ttf_jap  = array("ja");
      $this->nm_ttf_rus  = array("pl", "ru", "sk", "cz", "el", "mk");
      $this->nm_ttf_thai = array("thai");
      $this->nm_ttf_chi  = array("zh_cn", "zh_hk", "ko");
      $_SESSION['sc_session'][$this->sc_page]['grid_usuarios']['seq_dir'] = 0; 
      $_SESSION['sc_session'][$this->sc_page]['grid_usuarios']['sub_dir'] = array(); 
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1D9JKDQFaHIBeV5FGDMzGVcBUDuX7VoBqD9XGZ1F7DSNOHQF7DMveVkJGDWX7ZuJeHQFYDQJsZ1N7D5FaHuBYVcFeDWXCDoJsDcBwH9B/Z1rYHQJwHgveHArCV5B7ZuJsHQFYH9FUHANOHuBODMBOVcBUH5B3DoXGHQXGZ1X7D1rKHQJsHgveZSJ3DurmVoFGHQXsDQB/HIrKHQJsHgvOV9FeDuB7DoXGHQBiZkBiD1rwHQFaHgBYHArsDuXKDoF7D9XsDQJsDSBYV5FGHgNKDkBsV5X/VEBiHQXGZ1X7HAvmZMXGHgBOZSJ3H5FGVoFGHQJeDuBqHAN7HQXGDMrYDkB/HEBmDoXGHQBsZ1BiD1NaZMB/HgNOHArCV5B3VoFGHQJKH9BiZ1BYHurqDMBOV9FeDurGVoBqD9BsZ1F7DSrYD5rqDMrYZSJ3V5B7ZuJsHQBiZ9F7HIrwHurqDMBYVcXKDWB3DoXGHQXGVINUHANOHQJeHgNKHArsDWB3VoFGDcXGDQB/D1veHQBODMBYVIBsH5B7DoXGHQJmZSBqHIrwD5JwHgBYHErCDWFGDoF7D9XsDQJsDSBYV5FGHgNKDkBsV5X/VEBiHQXGH9BqHIBeHQF7HgrKDkXKH5FGVoFGHQXOH9FUHANKVWBODMBOZSJqDuFGDoXGHQBsVINUDSvOZMB/DMveVkJqDurmVoFGHQFYDuFaHABYHuXGDMvODkBsDWBmVoBqD9BsZ1F7DSrYD5rqDMrYZSJ3V5B7ZuJsDcBiDQBqHANOHuJwDMrYDkBsDWXKDoXGDcFYZ1BiHArYHQFUHgvsVkJ3DurmVoFGDcBiDQB/HAvOVWJwHgrwVcB/H5B7DoXGHQNwZ1X7D1rwHQBOHgBOHErsHEB7DoF7D9XsDQJsDSBYV5FGHgNKDkBsV5X/VEBiHQBiZSBqD1NaD5XGHgrKDkB/DuXKVoFGHQJKH9BiZ1N7HuBiHgrwZSNiH5B7DoXGHQNmZSBqHAN7HQJeHgBeZSJqDWrGVoFGDcXGDQFUHArYHuF7DMvsVcFeH5B7VoBqD9BsZ1F7DSrYD5rqDMrYZSJ3V5B7ZuJsHQBiH9BiD1BeHQBODMBYVcBUDurGDoXGDcFYZ1BiHAN7HQF7DMvCDkXKHEB7VoFGHQFYZSFUDSzGVWBODMvODkBsH5B3DoXGHQBsZ1BODSrYHQJeHgNOVkJ3HEXKDoF7D9XsDQJsDSBYV5FGHgNKDkBsV5X/VEBiDcNmZSBODSNOHQBiHgBeZSJ3H5FGVoFGHQNmDQFUD1veHurqDMvmZSNiDWrmDoXGDcNmZSBOHIveHQBiHgrKZSJqDWBmVoFGHQFYZ9XGD1BeHQFaDMvmZSNiDWrmVoBqD9BsZ1F7DSrYD5rqDMrYZSJ3V5B7ZuJsHQFYZSBiHIrKHuXGDMvsV9BUDurGDoXGHQBsH9BOHArKHuBqHgveDkXKH5FGVoFGHQNmDQBqDSzGVWXGDMBOV9FeH5XKDoXGHQBsH9BOD1zGZMB/HgvsHArCDurmDoF7D9XsDQJsDSBYV5FGHgNKDkBsV5X/VEBiHQNmVIJsHIBeHuFaHgNOHErCH5X/VoFGHQNwZSBiHIBOVWJsDMzGVcBUDWBmDoXGHQBiZkBiDSrYHQNUHgBOZSJqHEB7VoFGHQXODuFaZ1BYHuBiDMvsVcFeHEFGVoBqD9BsZ1F7DSrYD5rqDMrYZSJ3V5B7ZuJsHQNmDQFUHIrKHuBODMrYVcB/H5XKDoXGHQBqZkBiHIBeHuB/DMvCHErsH5X/VoFGDcBiDuFaZ1N7HurqDMvmZSJqH5XKDoXGHQXOZSBqD1NaZMXGDMvCVkJ3DWB3DoF7D9XsDQJsDSBYV5FGHgNKZSJ3HEBmDoBiHQNGVIraHArKHQrqDMzGDkFeDWF/VoFGD9NmDQX7HIBeVWJsHuvmVcFCDWXCDoJeDcJUZkFUHArKHQrqHgBOHEBUH5X/DoNUDcJeDQFGHANOD5JwHgNKVcrsH5FqDoX7D9BsH9FaHIBeV5FUHgvCHEFKDWF/ZuXGD9XsZSFGD1vOV5BiHgvsDkBODWFaDoJsDcBwZ1rqHArYD5JeDMzGHAFKDWF/VoB/D9JKDQFGD1veD5BOHgrKVcFCDWrmVoFaD9BsH9B/HAvmD5raDEvsHEFiDuJeVoB/D9XsDuBOHAveD5JeHuNODkFCDWrmVoFaD9BsZ1F7DSrYD5rqDMzGHEXeV5XCDoXGD9JKDQX7Z1N7D5XGDMrwZSrCH5FqDoJeD9JmZ1B/D1NaD5rqHgrKHArsHEXCHMJeDcBiDQFaHArYV5FaDMBOZSrCV5FYHMX7DcFYZSBqZ1rYHuFGHgBOHEFKV5B7ZuBqHQXOZSBiD1veHQrqDMBOVcFiV5FYHMrqHQBsH9BqD1zGZMB/HgvsHEFKH5FYVoX7D9JKDQX7D1BOV5FGDMzGV9BUHEF/HMXGHQXGVINUD1vsZMFaHgNOHEFKV5FqHMBqHQJKZ9XGHABYHuX7HgvOZSrCV5FYHMXGHQJmZSBOHANOHQNUDMveDkFeV5FqHMJwHQFYZSFUHANOHuJwDMvmZSJ3H5FqDoJeD9JmZ1B/D1NaD5rqHgrKHArsHEXCHIBOHQNwZ9F7HIrwHQXGDMBOVcFiV5FYHMraHQBiZSBOD1zGZMXGDMvCDkFeV5FqHINUHQNmH9BiZ1N7HuNUDMzGVcFiV5FYHMB/HQNmZSBOHArKHQX7HgNODkBsH5FYVoX7D9JKDQX7D1BOV5FGDMzGV9BUHEF/VoBiHQBiZ1BiHIveHQNUHgBOHAFKV5FqHIJwHQJKDQFUHIrKHuBqDMvmZSJ3V5FYHMFUHQJmZkBiDSrYHuBODMveHEFKV5FqHMFGHQJKZ9F7HIrwHuB/DMBOV9FiH5FqDoJeD9JmZ1B/D1NaD5rqDErKZSXeH5FYDoFUD9NwDQJsHArYVWJsHuvmVcXKV5FGVoraHQJmZ1FaHArKD5BqDEBOHEFiHEFqDoF7DcJeDQFGD1veD5BqHuNODkBOV5F/VoFGHQFYH9BqZ1NOV5FaDEvsHErCV5FqDoraD9JKZSX7D1vOV5JwHuBYZSNiDurGVoraD9BiH9FaHIBeZMBODErKVkXeV5FaDoB/D9NmDQBOZ1rwV5BqHgvsDkFCDWJeDoFGD9XOZ1rqD1rKD5rqDMBYHEJGH5FYVoB/HQXGZ9rqD1BeD5rqHuvmVcBOH5B7VoBqD9XOH9B/D1rwD5BiDEBeHEFiV5FaDoXGD9NmDQB/Z1rwHQJsHuBYVcBODWFaDoJsHQFYZ1BOHAN7D5FaDMzGHEBUDWr/VoXGDcBwZSFGHABYD5JwHuBOVIFCH5B7DoXGHQBiZ1B/HABYD5rqHgBeVkXeV5FaDoB/D9JKZ9rqZ1BYHQFaHuzGVIBOV5FGDoJsD9BsZ1F7Z1BeD5rqDMBYHEXeDuFYHIJsD9XsZ9JeD1BeD5F7DMvmVcBUH5FqHMBqDcNmZ1BiHAvCZMB/HgrKHErsDWFGDoXGD9NwDQX7Z1BYVWJsDMvmVcFCH5XCHINUHQJmZ1F7Z1vmD5rqDEBOHArCDWBmDoB/DcBwZSFGHANOD5BqHgrKVcXKV5X7VEraD9XOH9FaHArYD5NUDErKVkXeHEFqDoB/D9NwZ9rqZ1N7V5JeHuvmVcrsDWXCHMBiD9BsVIraD1rwV5X7HgBeHErCDWF/VoBiDcJUZSX7Z1BYHuFaHgvsVIBOH5B7VoF7D9BsZ1FGZ1rYD5NUHgNODkB/DWF/VoX7D9NmH9FUHIrKV5FaDMzGVcFKV5FYHMJwDcNmZSBqHArKV5FUDMrYZSXeV5FqHIJsD9NwDQJsHABYV5raHuNOVcFCHEFYVoFGD9XOZ1B/HIrwD5BiDMBYVkJGDWr/DoB/D9XsH9FGDSN7D5JwDMvmVcFKV5BmVoBqD9BsZkFGHAvsD5XGHgveHErsDWFGZuB/HQBiDQBqHINaV5BODMrYDkBsDWXCDoJsDcBwH9B/Z1rYHQJwDErKDkXKHEFqHMFGDcXGZ9F7DSBYD5XGHuzGVcXKHEFYDoX7HQXOH9BOHArKHQJwDEBODkFeH5FYVoFGHQJKDQFaDSN7VWJwHgvsVcBOV5BmVoFaHQJmVIJwHArKHuFGDEBOZSXeH5F/DoJeD9JKDQX7HIrwVWJwHgrKVcFCHEF/HMBiD9BsVIraD1rwV5X7HgBeHErsDurmVoBiHQBiDQNUZ1rKVWFU";
      ob_start();
      $this->prep_conect();
      $this->conectDB();
      if (!in_array(strtolower($this->nm_tpbanco), $this->nm_bases_all))
      {
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nspt'] . "</font>";
          echo "  " . $perfil_trab;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['grid_usuarios']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['grid_usuarios']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
                  echo "<a href='" . $_SESSION['scriptcase']['nm_sc_retorno'] . "' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase8_saphir_bvoltar.gif' title='" . $this->Nm_lang['lang_btns_rtrn_scrp_hint'] . "' align=absmiddle></a> \n" ; 
              } 
              else 
              { 
                  echo "<a href='$nm_url_saida' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase8_saphir_bsair.gif' title='" . $this->Nm_lang['lang_btns_exit_appl_hint'] . "' align=absmiddle></a> \n" ; 
              } 
          } 
          exit ;
      } 
      $this->Ajax_result_set = ob_get_contents();
      ob_end_clean();
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = "usuarios"; 
      }
   }

   function getRunningOS()
   {
       $aOSInfo = array();

       if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
       {
           $aOSInfo['os'] = 'win';
       }
       elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
       {
           $aOSInfo['os'] = 'linux-i386';
           if(strpos(strtolower(php_uname()), 'x86_64') !== FALSE) 
            {
               $aOSInfo['os'] = 'linux-amd64';
            }
       }
       elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
       {
           $aOSInfo['os'] = 'macos';
       }

       return $aOSInfo;
   }

   function prep_conect()
   {
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['grid_usuarios']['glo_nm_conexao']) && $_SESSION['scriptcase']['grid_usuarios']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['grid_usuarios']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['grid_usuarios']['glo_nm_perfil']) && $_SESSION['scriptcase']['grid_usuarios']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['grid_usuarios']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['grid_usuarios']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['grid_usuarios']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      $con_devel             = (isset($_SESSION['scriptcase']['grid_usuarios']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['grid_usuarios']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['grid_usuarios']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['grid_usuarios']['glo_nm_conexao']))
      {
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'Phronesis', 2); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['grid_usuarios']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['grid_usuarios']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['grid_usuarios']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = "";
          carrega_perfil($perfil_trab, $this->path_libs, "S", $this->path_conf);
          if (empty($_SESSION['scriptcase']['glo_senha_protect']))
          {
              $nm_crit_perfil = true;
          }
      }
      else
      {
          $perfil_trab = $con_devel;
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['grid_usuarios']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['grid_usuarios']['embutida_init']) 
      {
      }
// 
      if (isset($_SESSION['scriptcase']['glo_decimal_db']) && !empty($_SESSION['scriptcase']['glo_decimal_db']))
      {
         $_SESSION['sc_session'][$this->sc_page]['grid_usuarios']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_tpbanco; ";
          }
      }
      else
      {
          $this->nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_servidor']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_servidor; ";
          }
      }
      else
      {
          $this->nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_banco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_banco; ";
          }
      }
      else
      {
          $this->nm_banco = $_SESSION['scriptcase']['glo_banco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_usuario']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_usuario; ";
          }
      }
      else
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_senha']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_senha; ";
          }
      }
      else
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_senha']; 
      }
      if (isset($_SESSION['scriptcase']['glo_database_encoding']))
      {
          $this->nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_persistent']))
      {
          $this->nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_schema']))
      {
          $this->nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
      }
// 
      if (!empty($this->nm_falta_var) || !empty($this->nm_falta_var_db) || $nm_crit_perfil)
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #65a3b8; border-style: solid; border-width: 0px; padding: 5px 8px;  }";
          echo ".scButton_onmouseover { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #317b94; border-style: solid; border-width: 0px; padding: 5px 8px;  }";
          echo ".scButton_onmousedown { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #0a5770; border-style: solid; border-width: 0px; padding: 5px 8px;  }";
          echo ".scButton_disabled { font-family: Tahoma, Arial, sans-serif; font-size: 13px; color: #d1d1d1; font-weight: normal; background-color: #808080; border-style: solid; border-width: 0px; padding: 5px 8px;  }";
          echo ".scLink_default { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:hover { text-decoration: none; font-size: 12px; color: #0000AA;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          if (empty($this->nm_falta_var_db))
          {
              if (!empty($this->nm_falta_var))
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
                  echo "  " . $this->nm_falta_var;
                  echo "   </b></td>";
                  echo " </tr>";
              }
              if ($nm_crit_perfil)
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nfnd'] . "</font>";
                  echo "  " . $perfil_trab;
                  echo "   </b></td>";
                  echo " </tr>";
              }
          }
          else
          {
              echo "<tr>";
              echo "   <td bgcolor=\"\">";
              echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_data'] . "</font></b>";
              echo "   </td>";
              echo " </tr>";
          }
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['grid_usuarios']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['grid_usuarios']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = mb_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = mb_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = mb_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = mb_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
      }
   }
   function conectDB()
   {
      global $glo_senha_protect;
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['grid_usuarios']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['grid_usuarios']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['grid_usuarios']['glo_nm_conexao'], $this->root . $this->path_prod, 'Phronesis'); 
      } 
      else 
      { 
          $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $this->nm_database_encoding); 
      } 
   }
   function regionalDefault()
   {
       $_SESSION['scriptcase']['reg_conf']['date_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_format'] : "ddmmyyyy";
       $_SESSION['scriptcase']['reg_conf']['date_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_sep'] : "/";
       $_SESSION['scriptcase']['reg_conf']['date_week_ini'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema'] : "SU";
       $_SESSION['scriptcase']['reg_conf']['time_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_format'] : "hhiiss";
       $_SESSION['scriptcase']['reg_conf']['time_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_sep'] : ":";
       $_SESSION['scriptcase']['reg_conf']['time_pos_ampm'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm'] : "right_without_space";
       $_SESSION['scriptcase']['reg_conf']['time_simb_am']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am'] : "am";
       $_SESSION['scriptcase']['reg_conf']['time_simb_pm']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm'] : "pm";
       $_SESSION['scriptcase']['reg_conf']['simb_neg']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg'] : "-";
       $_SESSION['scriptcase']['reg_conf']['grup_num']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['neg_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg'] : 2;
       $_SESSION['scriptcase']['reg_conf']['monet_simb']    = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo'] : "$";
       $_SESSION['scriptcase']['reg_conf']['monet_f_pos']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'] : 3;
       $_SESSION['scriptcase']['reg_conf']['monet_f_neg']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'] : 13;
       $_SESSION['scriptcase']['reg_conf']['grup_val']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_val']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['html_dir']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] . "'" : "";
       $_SESSION['scriptcase']['reg_conf']['css_dir']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "LTR";
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }
// 
   function sc_Include($path, $tp, $name)
   {
       if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
       {
           include_once($path);
       }
   } // sc_Include
   function sc_Sql_Protect($var, $tp, $conex="")
   {
       if (empty($conex) || $conex == "conn_mysql")
       {
           $TP_banco = $_SESSION['scriptcase']['glo_tpbanco'];
       }
       else
       {
           eval ("\$TP_banco = \$this->nm_con_" . $conex . "['tpbanco'];");
       }
       if ($tp == "date")
       {
           return "'" . $var . "'";
       }
       else
       {
           return $var;
       }
   } // sc_Sql_Protect
   function dyn_convert_date($val)
   {
       $val_ok = array();
       foreach ($val as $Part_date)
       {
           if (substr($Part_date, 0, 1) == "Y")
           {
               $val_ok['ano'] = substr($Part_date, 2);
           }
           if (substr($Part_date, 0, 1) == "M")
           {
               $val_ok['mes'] = substr($Part_date, 2);
           }
           if (substr($Part_date, 0, 1) == "D")
           {
               $val_ok['dia'] = substr($Part_date, 2);
           }
           if (substr($Part_date, 0, 1) == "H")
           {
               $val_ok['hor'] = substr($Part_date, 2);
           }
           if (substr($Part_date, 0, 1) == "I")
           {
               $val_ok['min'] = substr($Part_date, 2);
           }
           if (substr($Part_date, 0, 1) == "S")
           {
               $val_ok['seg'] = substr($Part_date, 2);
           }
       }
       return $val_ok;
   }
}
//===============================================================================
//
class grid_usuarios_sub_css
{
   function grid_usuarios_sub_css()
   {
      global $script_case_init;
      $str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc8_Saphir/Sc8_Saphir";
      if ($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['SC_herda_css'] == "N")
      {
          $_SESSION['sc_session'][$script_case_init]['SC_sub_css']['grid_usuarios']    = $str_schema_all . "_grid.css";
          $_SESSION['sc_session'][$script_case_init]['SC_sub_css_bw']['grid_usuarios'] = $str_schema_all . "_grid_bw.css";
      }
   }
}
//
class grid_usuarios_apl
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Lookup;
   var $nm_location;
   var $NM_ajax_flag  = false;
   var $NM_ajax_opcao = '';
   var $grid;
   var $Res;
   var $Graf;
   var $pesq;
   var $pdf;
   var $xls;
   var $xml;
   var $csv;
   var $rtf;
//
//----- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini = $this->Ini;
      $this->$modulo->Db = $this->Db;
      $this->$modulo->Erro = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
      $this->$modulo->arr_buttons = $this->arr_buttons;
   }
//
//----- 
   function controle($linhas = 0)
   {
      global $nm_saida, $nm_url_saida, $script_case_init, $nmgp_parms_pdf, $nmgp_graf_pdf, $nm_apl_dependente, $nmgp_navegator_print, $nmgp_tipo_print, $nmgp_cor_print, $nmgp_cor_word, $NMSC_conf_apl, $NM_contr_var_session, $NM_run_iframe,
             $glo_senha_protect, $nmgp_opcao, $nm_call_php, $rec, $nmgp_quant_linhas, $nmgp_fast_search, $nmgp_cond_fast_search, $nmgp_arg_fast_search, $nmgp_ordem;

      if ($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida'])
      { 
          if (!empty($GLOBALS['nmgp_parms'])) 
          { 
              $GLOBALS['nmgp_parms'] = str_replace("@aspass@", "'", $GLOBALS['nmgp_parms']);
              $todo = explode("?@?", $GLOBALS["nmgp_parms"]);
              foreach ($todo as $param)
              {
                   $cadapar = explode("?#?", $param);
                   if (1 < sizeof($cadapar))
                   {
                       if (isset($GLOBALS['sc_conv_var'][$cadapar[0]]))
                       {
                           $cadapar[0] = $GLOBALS['sc_conv_var'][$cadapar[0]];
                       }
                       elseif (isset($GLOBALS['sc_conv_var'][strtolower($cadapar[0])]))
                       {
                           $cadapar[0] = $GLOBALS['sc_conv_var'][strtolower($cadapar[0])];
                       }
                       nm_limpa_str_grid_usuarios($cadapar[1]);
                       nm_protect_num_grid_usuarios($cadapar[0], $cadapar[1]);
                       $$cadapar[0] = $cadapar[1];
                       if ($cadapar[0] == "var_usuario") 
                       {
                           $_SESSION["var_usuario"] = $cadapar[1];
                       }
                   }
              }
          } 
          if (isset($var_usuario)) 
          {
              $_SESSION['var_usuario'] = $var_usuario;
              nm_limpa_str_grid_usuarios($_SESSION["var_usuario"]);
          }
      } 
      $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      if (!$this->Ini) 
      { 
          $this->Ini = new grid_usuarios_ini(); 
          $this->Ini->init();
      } 
      $this->Change_Menu = false;
      if (isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['grid_usuarios']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['grid_usuarios'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['grid_usuarios']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['grid_usuarios']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('grid_usuarios') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['grid_usuarios']['label'] = "" . $this->Ini->Nm_lang['lang_othr_grid_titl'] . " - usuarios";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "grid_usuarios")
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
      $this->Db = $this->Ini->Db; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['nm_tpbanco'] = $this->Ini->nm_tpbanco;
      $this->nm_data = new nm_data("es");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida'])
      { 
          include_once($this->Ini->path_embutida . "grid_usuarios/grid_usuarios_erro.class.php"); 
      } 
      else 
      { 
          include_once($this->Ini->path_aplicacao . "grid_usuarios_erro.class.php"); 
      } 
      $this->Erro      = new grid_usuarios_erro();
      $this->Erro->Ini = $this->Ini;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida'])
      { 
          require_once($this->Ini->path_embutida . "grid_usuarios/grid_usuarios_lookup.class.php"); 
      } 
      else 
      { 
          require_once($this->Ini->path_aplicacao . "grid_usuarios_lookup.class.php"); 
      } 
      $this->Lookup       = new grid_usuarios_lookup();
      $this->Lookup->Db   = $this->Db;
      $this->Lookup->Ini  = $this->Ini;
      $this->Lookup->Erro = $this->Erro;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida'])
      {
          $_SESSION['scriptcase']['saida_var'] = false;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['ajax_nav'] = false;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['scroll_navigate'] = false;
          if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "ajax_navigate")
          {
              ob_start();
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['ajax_nav'] = true;
              $_SESSION['scriptcase']['saida_var']  = true;
              $_SESSION['scriptcase']['saida_html'] = "";
              $this->Ini->Arr_result = array();
              $nmgp_opcao = $_POST['opc'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] = $nmgp_opcao;
              if (isset($_POST['parm']) && $_POST['parm'] == "save_grid")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['save_grid'] = true;
              }
              if ($nmgp_opcao == "edit" && isset($_POST['parm']) && $_POST['parm'] == "fim")
              {
                  $rec = $_POST['parm'];
              }
              if ($nmgp_opcao == "rec" || $nmgp_opcao == "muda_rec_linhas")
              {
                  $rec = $_POST['parm'];
              }
              if ($nmgp_opcao == "muda_qt_linhas")
              {
                  $nmgp_quant_linhas  = strtolower($_POST['parm']);
              }
              if ($nmgp_opcao == "fast_search")
              {
                  $temp = explode("_SCQS_", $_POST['parm']);
                  $nmgp_fast_search      = (isset($temp[0])) ? $temp[0] : "";
                  $nmgp_cond_fast_search = (isset($temp[1])) ? $temp[1] : "";
                  $nmgp_arg_fast_search  = (isset($temp[2])) ? $temp[2] : "";
              }
              if ($nmgp_opcao == "ordem")
              {
                  $nmgp_ordem = $_POST['parm'];
              }
          }
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['SC_All_Groupby'] = array('sc_free_group_by' => 'all');
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['SC_Groupby_hide'])) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['SC_Groupby_hide'] = array();
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['SC_Ind_Groupby'])) 
      { 
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['SC_All_Groupby'] as $Ind => $Tp)
          {
              if (!in_array($Ind, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['SC_Groupby_hide'])) 
              { 
                  break;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['SC_Ind_Groupby'] = $Ind;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['SC_Gb_Free_cmp'])) 
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['SC_Gb_Free_cmp'] = array();
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['SC_Gb_Free_sql'] = array();
      }
      $this->Ini->Apl_resumo  = "grid_usuarios_resumo_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['SC_Ind_Groupby'] . ".class.php"; 
      $this->Ini->Apl_grafico = "grid_usuarios_grafico_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['SC_Ind_Groupby'] . ".class.php"; 
      $_SESSION['sc_session']['path_third'] = $this->Ini->path_prod . "/third";
      $_SESSION['sc_session']['path_img']   = $this->Ini->path_img_global;
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['pdf_det'] = false;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida']      = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida_grid']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida_grid'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida_init']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida_init'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida_label']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida_label'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['cab_embutida']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['cab_embutida'] = "";
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida_pdf']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida_pdf'] = "";
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida_treeview']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida_treeview'] = false;
      } 
      include("../_lib/css/" . $this->Ini->str_schema_all . "_grid.php");
      $this->Ini->Tree_img_col    = trim($str_tree_col);
      $this->Ini->Tree_img_exp    = trim($str_tree_exp);
      $this->Ini->Str_btn_grid    = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
      $this->Ini->Str_btn_css     = trim($str_button) . "/" . trim($str_button) . ".css";
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      $this->arr_buttons['group_group_1']= array(
          'value'            => "" . $this->Ini->Nm_lang['lang_btns_expt'] . "",
          'hint'             => "" . $this->Ini->Nm_lang['lang_btns_expt'] . "",
          'type'             => "button",
          'display'          => "text_img",
          'display_position' => "text_right",
          'image'            => "scriptcase__NM__gear.png",
          'style'            => "default",
      );

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida'])
      { 
      $this->Ini->Color_bg_ajax            = (!isset($str_ajax_bg)       || "" == trim($str_ajax_bg))         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax            = (!isset($str_ajax_border_c) || "" == trim($str_ajax_border_c))   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax            = (!isset($str_ajax_border_s) || "" == trim($str_ajax_border_s))   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax            = (!isset($str_ajax_border_w) || "" == trim($str_ajax_border_w))   ? ""     : $str_ajax_border_w;
      $this->Ini->Img_sep_grid             = "/" . trim($str_toolbar_separator);
      $this->Ini->Label_sort_pos           = trim($str_label_sort_pos);
      $this->Ini->Label_sort               = trim($str_label_sort);
      $this->Ini->Label_sort_asc           = trim($str_label_sort_asc);
      $this->Ini->Label_sort_desc          = trim($str_label_sort_desc);
      $this->Ini->Sum_ico_line             = trim($sum_ico_line);
      $this->Ini->Sum_ico_column           = trim($sum_ico_column);
      $this->Ini->Str_toolbarnav_separator = '/' . trim($str_toolbarnav_separator);
      $this->Ini->Img_qs_search            = '' != trim($img_qs_search)        ? trim($img_qs_search)        : 'scriptcase__NM__qs_lupa.png';
      $this->Ini->Img_qs_clean             = '' != trim($img_qs_clean)         ? trim($img_qs_clean)         : 'scriptcase__NM__qs_close.png';
      $this->Ini->Str_qs_image_padding     = '' != trim($str_qs_image_padding) ? trim($str_qs_image_padding) : '0';
      $this->Ini->App_div_tree_img_col     = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp     = trim($app_div_str_tree_exp);
      $this->Ini->refinedsearch_hide           = trim($refinedsearch_hide);
      $this->Ini->refinedsearch_show          = trim($refinedsearch_show);
      $this->Ini->refinedsearch_close          = trim($refinedsearch_close);
      $this->Ini->refinedsearch_values_separator          = trim($refinedsearch_values_separator);
      $this->Ini->refinedsearch_campo_close_icon          = trim($refinedsearch_campo_close_icon);
          $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_config_btn.php", "F", "nmButtonOutput") ; 
          $_SESSION['scriptcase']['css_popup']                 = $this->Ini->str_schema_all . "_grid.css";
          $_SESSION['scriptcase']['css_popup_dir']             = $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
          $_SESSION['scriptcase']['css_btn_popup']             = $this->Ini->Str_btn_css;
          $_SESSION['scriptcase']['css_popup_tab']             = $this->Ini->str_schema_all . "_tab.css";
          $_SESSION['scriptcase']['css_popup_tab_dir']         = $this->Ini->str_schema_all . "_tab" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
          $_SESSION['scriptcase']['css_popup_div']             = $this->Ini->str_schema_all . "_appdiv.css";
          $_SESSION['scriptcase']['css_popup_div_dir']         = $this->Ini->str_schema_all . "_appdiv" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
          $_SESSION['scriptcase']['bg_btn_popup']['bok']       = nmButtonOutput($this->arr_buttons, "bok", "processa()", "processa()", "bok", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "");
          $_SESSION['scriptcase']['bg_btn_popup']['bsair']     = nmButtonOutput($this->arr_buttons, "bsair", "window.close()", "window.close()", "bsair", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "");
          $_SESSION['scriptcase']['bg_btn_popup']['btbremove'] = nmButtonOutput($this->arr_buttons, "bsair", "self.parent.tb_remove()", "self.parent.tb_remove()", "bsair", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "");
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['field_order']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['field_order'][] = "nombre";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['field_order'][] = "apellido";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['field_order'][] = "email";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['field_order'][] = "pais";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['field_order'][] = "creado";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['field_order'][] = "id";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['field_order'][] = "fbid";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['field_order'][] = "nombrecompleto";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['field_order_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['field_order'];
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['usr_cmp_sel']))
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['usr_cmp_sel'] = array();
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['usr_cmp_sel']['id'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['usr_cmp_sel']['fbid'] = "off";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['usr_cmp_sel']['nombrecompleto'] = "off";
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_usuarios']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_usuarios']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['grid_usuarios']['exit'];
      }

      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      nm_gc($this->Ini->path_libs);
      if (!$_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_page_process'] = $this->Ini->sc_page;
      } 
      $_SESSION['scriptcase']['sc_idioma_pivot']['es'] = array(
          'smry_ppup_titl'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_titl'],
          'smry_ppup_fild'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_fild'],
          'smry_ppup_posi'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_posi'],
          'smry_ppup_sort'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_sort'],
          'smry_ppup_posi_labl' => $this->Ini->Nm_lang['lang_othr_smry_ppup_posi_labl'],
          'smry_ppup_posi_data' => $this->Ini->Nm_lang['lang_othr_smry_ppup_posi_data'],
          'smry_ppup_sort_labl' => $this->Ini->Nm_lang['lang_othr_smry_ppup_sort_labl'],
          'smry_ppup_sort_vlue' => $this->Ini->Nm_lang['lang_othr_smry_ppup_sort_vlue'],
          'smry_ppup_chek_tabu' => $this->Ini->Nm_lang['lang_othr_smry_ppup_chek_tabu'],
      );
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
      if (!$_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_tp_pdf'] = "wkhtmltopdf";
          $_SESSION['scriptcase']['sc_idioma_pdf'] = array();
          $_SESSION['scriptcase']['sc_idioma_pdf']['es'] = array('titulo' => $this->Ini->Nm_lang['lang_pdff_titl'], 'tp_imp' => $this->Ini->Nm_lang['lang_pdff_type'], 'color' => $this->Ini->Nm_lang['lang_pdff_colr'], 'econm' => $this->Ini->Nm_lang['lang_pdff_bndw'], 'tp_pap' => $this->Ini->Nm_lang['lang_pdff_pper'], 'carta' => $this->Ini->Nm_lang['lang_pdff_letr'], 'oficio' => $this->Ini->Nm_lang['lang_pdff_legl'], 'customiz' => $this->Ini->Nm_lang['lang_pdff_cstm'], 'alt_papel' => $this->Ini->Nm_lang['lang_pdff_pper_hgth'], 'larg_papel' => $this->Ini->Nm_lang['lang_pdff_pper_wdth'], 'orient' => $this->Ini->Nm_lang['lang_pdff_pper_orie'], 'retrato' => $this->Ini->Nm_lang['lang_pdff_prtr'], 'paisag' => $this->Ini->Nm_lang['lang_pdff_lnds'], 'book' => $this->Ini->Nm_lang['lang_pdff_bkmk'], 'grafico' => $this->Ini->Nm_lang['lang_pdff_chrt'], 'largura' => $this->Ini->Nm_lang['lang_pdff_wdth'], 'fonte' => $this->Ini->Nm_lang['lang_pdff_font'], 'sim' => $this->Ini->Nm_lang['lang_pdff_chrt_yess'], 'nao' => $this->Ini->Nm_lang['lang_pdff_chrt_nooo'], 'cancela' => $this->Ini->Nm_lang['lang_pdff_cncl']);
      } 
      $_SESSION['scriptcase']['sc_idioma_graf_flash'] = array();
      $_SESSION['scriptcase']['sc_idioma_graf_flash']['es'] = array(
          'titulo' => $this->Ini->Nm_lang['lang_chrt_titl'],
          'tipo_g' => $this->Ini->Nm_lang['lang_chrt_type'],
          'tp_barra' => $this->Ini->Nm_lang['lang_flsh_chrt_bars'],
          'tp_pizza' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie'],
          'tp_linha' => $this->Ini->Nm_lang['lang_flsh_chrt_line'],
          'tp_area' => $this->Ini->Nm_lang['lang_flsh_chrt_area'],
          'tp_marcador' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks'],
          'tp_gauge' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug'],
          'tp_radar' => $this->Ini->Nm_lang['lang_flsh_chrt_radr'],
          'tp_polar' => $this->Ini->Nm_lang['lang_flsh_chrt_polr'],
          'tp_funil' => $this->Ini->Nm_lang['lang_flsh_chrt_funl'],
          'tp_pyramid' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm'],
          'largura' => $this->Ini->Nm_lang['lang_chrt_wdth'],
          'altura' => $this->Ini->Nm_lang['lang_chrt_hgth'],
          'modo_gera' => $this->Ini->Nm_lang['lang_chrt_gtmd'],
          'sintetico' => $this->Ini->Nm_lang['lang_chrt_smzd'],
          'analitico' => $this->Ini->Nm_lang['lang_chrt_anlt'],
          'order' => $this->Ini->Nm_lang['lang_chrt_ordr'],
          'order_none' => $this->Ini->Nm_lang['lang_chrt_ordr_none'],
          'order_asc' => $this->Ini->Nm_lang['lang_chrt_ordr_asc'],
          'order_desc' => $this->Ini->Nm_lang['lang_chrt_ordr_desc'],
          'barra_orien' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_layo'],
          'barra_orien_horiz' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_horz'],
          'barra_orien_verti' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_vrtc'],
          'barra_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_shpe'],
          'barra_forma_barra' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_bars'],
          'barra_forma_cilin' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_cyld'],
          'barra_forma_cone' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_cone'],
          'barra_forma_piram' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_pyrm'],
          'barra_dimen' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_dmns'],
          'barra_dimen_2d' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_2ddm'],
          'barra_dimen_3d' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ddm'],
          'barra_sobre' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ovr'],
          'barra_sobre_nao' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ont'],
          'barra_sobre_sim' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3oys'],
          'barra_empil' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stck'],
          'barra_empil_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stan'],
          'barra_empil_ativa' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stay'],
          'barra_empil_perce' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stap'],
          'barra_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_invr'],
          'barra_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_invn'],
          'barra_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_invi'],
          'barra_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_srgr'],
          'barra_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_srst'],
          'barra_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_srbs'],
          'barra_funil' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_funl'],
          'barra_funil_nao' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ont'],
          'barra_funil_sim' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3oys'],
          'pizza_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_shpe'],
          'pizza_forma_pizza' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fpie'],
          'pizza_forma_donut' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dnts'],
          'pizza_dimen' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dmns'],
          'pizza_dimen_2d' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_2ddm'],
          'pizza_dimen_3d' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_3ddm'],
          'pizza_orden' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_srtn'],
          'pizza_orden_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_nsrt'],
          'pizza_orden_ascen' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_asrt'],
          'pizza_orden_desce' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dsrt'],
          'pizza_explo' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_expl'],
          'pizza_explo_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dxpl'],
          'pizza_explo_ativa' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_axpl'],
          'pizza_explo_click' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_cxpl'],
          'pizza_valor' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fval'],
          'pizza_valor_valor' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fvlv'],
          'pizza_valor_perce' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fvlp'],
          'linha_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_line_shpe'],
          'linha_forma_linha' => $this->Ini->Nm_lang['lang_flsh_chrt_line_line'],
          'linha_forma_splin' => $this->Ini->Nm_lang['lang_flsh_chrt_line_spln'],
          'linha_forma_degra' => $this->Ini->Nm_lang['lang_flsh_chrt_line_step'],
          'linha_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_line_invr'],
          'linha_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_line_invn'],
          'linha_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_line_invi'],
          'linha_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_line_srgr'],
          'linha_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_line_srst'],
          'linha_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_line_srbs'],
          'area_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_area_shpe'],
          'area_forma_area' => $this->Ini->Nm_lang['lang_flsh_chrt_area_area'],
          'area_forma_splin' => $this->Ini->Nm_lang['lang_flsh_chrt_area_spln'],
          'area_empil' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stak'],
          'area_empil_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stan'],
          'area_empil_ativa' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stay'],
          'area_empil_perce' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stap'],
          'area_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_area_invr'],
          'area_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_area_invn'],
          'area_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_area_invi'],
          'area_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_area_srgr'],
          'area_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_area_srst'],
          'area_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_area_srbs'],
          'marca_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_invr'],
          'marca_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_invn'],
          'marca_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_invi'],
          'marca_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_srgr'],
          'marca_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_srst'],
          'marca_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_srbs'],
          'gauge_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug_shpe'],
          'gauge_forma_circular' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug_circ'],
          'gauge_forma_semi' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug_semi'],
          'pyram_slice' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm_slic'],
          'pyram_slice_s' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm_opcs'],
          'pyram_slice_n' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm_opcn'],
      );
      if (!$_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_idioma_prt'] = array();
          $_SESSION['scriptcase']['sc_idioma_prt']['es'] = array('titulo' => $this->Ini->Nm_lang['lang_btns_prtn_titl_hint'], 'modoimp' => $this->Ini->Nm_lang['lang_btns_mode_prnt_hint'], 'curr' => $this->Ini->Nm_lang['lang_othr_curr_page'], 'total' => $this->Ini->Nm_lang['lang_othr_full'], 'cor' => $this->Ini->Nm_lang['lang_othr_prtc'], 'pb' => $this->Ini->Nm_lang['lang_othr_bndw'], 'color' => $this->Ini->Nm_lang['lang_othr_colr'], 'cancela' => $this->Ini->Nm_lang['lang_btns_cncl_prnt_hint']);
      } 
      if (!$_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_idioma_word'] = array();
          $_SESSION['scriptcase']['sc_idioma_word']['es'] = array('titulo' => $this->Ini->Nm_lang['lang_btns_prtn_titl_hint'], 'cor' => $this->Ini->Nm_lang['lang_othr_prtc'], 'pb' => $this->Ini->Nm_lang['lang_othr_bndw'], 'color' => $this->Ini->Nm_lang['lang_othr_colr'], 'cancela' => $this->Ini->Nm_lang['lang_btns_cncl_prnt_hint']);
      } 
      $this->Ini->Gd_missing  = true;
      if (function_exists("getProdVersion"))
      {
          $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
      }
      if (function_exists("gd_info"))
      {
          $this->Ini->Gd_missing = false;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_orig']))  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] = "inicio" ;  
      }   
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_usuarios']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_usuarios']['start'] == 'filter')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] == "inicio" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] == "grid")  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] = "busca";
          }   
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida_form']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida_form'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] == "busca")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] = "inicio";
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_orig']) || !empty($nmgp_parms) || !empty($GLOBALS["nmgp_parms"]))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opc_liga'] = array();  
          if (isset($NMSC_conf_apl) && !empty($NMSC_conf_apl))
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opc_liga'] = $NMSC_conf_apl;  
          }   
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opc_liga']['inicial']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opc_liga']['inicial'];
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] == "busca")
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] = "grid" ;  
      }   
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao_print']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao_print']))  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao_print'] = "inicio" ;  
      }   
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['print_all'] = false;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] == "res_print")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao']     = "resumo";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['print_all'] = true;
      } 
      if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'], 0, 7) == "grafico")  
      { 
          $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] == "pdf")
      { 
          $this->Ini->path_img_modelo = $this->Ini->path_img_modelo;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] == "fast_search")  
      { 
          $this->SC_fast_search($GLOBALS["nmgp_fast_search"], $GLOBALS["nmgp_cond_fast_search"], $GLOBALS["nmgp_arg_fast_search"]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_ant'] == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq'])
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] = 'igual';
          } 
          else 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['contr_array_resumo'] = "NAO";
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['contr_total_geral']  = "NAO";
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['tot_geral']);
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] = 'pesq';
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['orig_pesq'] = 'grid';
          } 
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] == "dyn_search" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] == "dyn_search_clear")
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] == "dyn_search_clear")
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['dyn_search_clear'] = true;
          } 
          $this->SC_proc_dyn_search($_POST['parm']);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_ant'] == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq'])
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] = 'igual';
          } 
          else 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['contr_array_resumo'] = "NAO";
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['contr_total_geral']  = "NAO";
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['tot_geral']);
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['orig_pesq'] = 'grid';
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] = 'pesq';
          } 
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] == 'pesq' && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['orig_pesq']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['orig_pesq']))  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['orig_pesq'] == "res")  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] = 'resumo';
          } 
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['orig_pesq'] == "grid") 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] = 'inicio';
          } 
      } 
//
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['prim_cons'] = false;  
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_orig']) || !empty($nmgp_parms) || !empty($GLOBALS["nmgp_parms"]))  
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['prim_cons'] = true;  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_orig'] = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq']       = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_orig'];  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_ant']   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_orig'];  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['cond_pesq'] = ""; 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_filtro'] = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_fast'] = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['contr_total_geral'] = "NAO";
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['sc_total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['tot_geral']);
      } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_filtro'];
      if ($nmgp_opcao == "formphp")
      { 
          if ($nm_call_php == "Publicaciones")
          { 
              $this->Publicaciones();
          } 
          if ($nm_call_php == "Sesiones")
          { 
              $this->Sesiones();
          } 
          if ($nm_call_php == "Conferencia")
          { 
              $this->Conferencia();
          } 
          $this->Db->Close(); 
          exit;
      } 
      $nm_flag_pdf   = true;
      $nm_vendo_pdf  = ("pdf" == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao']);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['graf_pdf'] = "S";
      if (isset($nmgp_graf_pdf) && !empty($nmgp_graf_pdf))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['graf_pdf'] = $nmgp_graf_pdf;
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida'])
      {
         $this->Ini->sc_Include($this->Ini->path_libs . "/nm_trata_saida.php", "C", "nm_trata_saida") ; 
         $nm_saida = new nm_trata_saida();
         if ($nm_flag_pdf && $nm_vendo_pdf)
         {
            $nm_arquivo_htm_temp = $this->Ini->root . $this->Ini->path_imag_temp . "/sc_grid_usuarios_html_" . session_id() . "_2.html";
            if (isset($_GET['pdf_base']) && isset($_GET['pdf_url']))
            {
                $nm_arquivo_pdf_base = "/" . str_replace("_NMPLUS_", "+", $_GET['pdf_base']);
                $nm_arquivo_pdf_url  = $_GET['pdf_url'] . $nm_arquivo_pdf_base;
            }
            else
            {
                $nm_arquivo_pdf_base = "/sc_pdf_" . date("YmdHis") . "_" . rand(0, 1000) . "_grid_usuarios.pdf";
                $nm_arquivo_pdf_url  = $this->Ini->path_imag_temp . $nm_arquivo_pdf_base;
            }
            $nm_arquivo_pdf_serv = $this->Ini->root . $nm_arquivo_pdf_url;
            $nm_arquivo_de_saida = $this->Ini->root . $this->Ini->path_imag_temp . "/sc_grid_usuarios_html_" . session_id() . ".html";
            $nm_url_de_saida = $this->Ini->java_protocol . $this->Ini->server_pdf . $this->Ini->path_imag_temp . "/sc_grid_usuarios_html_" . session_id() . ".html";
            if (in_array(trim($this->Ini->str_lang), $this->Ini->nm_font_ttf) && strtolower($_SESSION['scriptcase']['charset']) != "utf-8")
            { 
                $nm_saida->seta_arquivo($nm_arquivo_de_saida, $_SESSION['scriptcase']['charset']);
                $_SESSION['scriptcase']['charset_html'] = "utf-8";
            }
            else
            { 
                $nm_saida->seta_arquivo($nm_arquivo_de_saida);
            }
         }
      }
//----------------------------------->
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] == "doc_word_res")
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['print_navigator'] = "Microsoft Internet Explorer";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['print_all'] = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['doc_word']  = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao']     = "resumo";
          $_SESSION['scriptcase']['saida_word'] = true;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['word_name']))
          {
              $nm_arquivo_doc_word = "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['word_name'];
          }
          else
          {
              $nm_arquivo_doc_word = "/sc_grid_usuarios_res_" . session_id() . ".doc";
          }
          $nm_saida->seta_arquivo($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_doc_word);
          $this->ret_word = "resumo";
          $this->Ini->nm_limite_lin_res_prt = 0;
          $GLOBALS['nmgp_cor_print']        = $nmgp_cor_word;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] == "xls")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_usuarios/grid_usuarios_xls.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_usuarios_xls.class.php"); 
          } 
          $this->xls  = new grid_usuarios_xls();
          $this->prep_modulos("xls");
          $this->xls->monta_xls();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] == "xml")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_usuarios/grid_usuarios_xml.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_usuarios_xml.class.php"); 
          } 
          $this->xml  = new grid_usuarios_xml();
          $this->prep_modulos("xml");
          $this->xml->monta_xml();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] == "csv")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_usuarios/grid_usuarios_csv.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_usuarios_csv.class.php"); 
          } 
          $this->csv  = new grid_usuarios_csv();
          $this->prep_modulos("csv");
          $this->csv->monta_csv();
      }
      else   
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] == "rtf")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_usuarios/grid_usuarios_rtf.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_usuarios_rtf.class.php"); 
          } 
          $this->rtf  = new grid_usuarios_rtf();
          $this->prep_modulos("rtf");
          $this->rtf->monta_rtf();
      }
      else
      if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'], 0, 7) == "grafico")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida'])
          { 
              require_once($this->Ini->path_embutida . " . grid_usuarios . /" . $this->Ini->Apl_grafico); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
          } 
          $this->Graf  = new grid_usuarios_grafico();
          $this->prep_modulos("Graf");
          if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'], 7, 1) == "_")  
          { 
              $this->Graf->grafico_col(substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'], 8));
          }
          else
          { 
              $this->Graf->monta_grafico();
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] = "grid";
      }
      else 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] == "busca")  
      { 
          if (!$_SESSION['scriptcase']['proc_mobile']) 
          { 
              require_once($this->Ini->path_aplicacao . "grid_usuarios_pesq.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_usuarios_mobile_pesq.class.php"); 
          } 
          $this->pesq  = new grid_usuarios_pesq();
          $this->prep_modulos("pesq");
          $this->pesq->NM_ajax_flag    = $this->NM_ajax_flag;
          $this->pesq->NM_ajax_opcao   = $this->NM_ajax_opcao;
          $this->pesq->monta_busca();
      }
      else 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] == "resumo")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_usuarios/" . $this->Ini->Apl_resumo); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          } 
          $this->Res = new grid_usuarios_resumo("out");
          $this->prep_modulos("Res");
          $this->Res->monta_resumo();
      }
      else 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] == "print" && $nmgp_tipo_print == "RC")
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['print_navigator'] = $nmgp_navegator_print;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['print_all'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao']     = "pdf";
              $GLOBALS['nmgp_tipo_pdf'] = strtolower($nmgp_cor_print);
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao'] == "doc_word")
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['print_navigator'] = "Microsoft Internet Explorer";
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['print_all'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['doc_word']  = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['opcao']     = "pdf";
              $_SESSION['scriptcase']['saida_word'] = true;
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['word_name']))
              {
                  $nm_arquivo_doc_word =  "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['word_name'];
              }
              else
              {
                  $nm_arquivo_doc_word = "/sc_grid_usuarios_" . session_id() . ".doc";
              }
              $nm_saida->seta_arquivo($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_doc_word);
              $this->ret_word = "volta_grid";
              $this->Ini->nm_limite_lin_prt = 0;
              $GLOBALS['nmgp_tipo_pdf'] = $nmgp_cor_word;
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_usuarios/grid_usuarios_grid.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_usuarios_grid.class.php"); 
          } 
          $this->grid  = new grid_usuarios_grid();
          $this->prep_modulos("grid");
          $this->grid->monta_grid($linhas);
      }   
//--- 
      if (!$_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida'])
      {
           $this->Db->Close(); 
      }
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['embutida'])
      {
         $nm_saida->finaliza();
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['ajax_nav'])
         {
             $this->Ini->Arr_result['setVar'][] = array('var' => 'scQtReg', 'value' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['qt_reg_grid']);
             $Temp = ob_get_clean();
             if ($Temp !== false && trim($Temp) != "")
             {
                 $this->Ini->Arr_result['htmOutput'] = $Temp;
             }
             $_SESSION['scriptcase']['saida_var'] = false;
             $oJson = new Services_JSON();
             echo $oJson->encode($this->Ini->Arr_result);
             exit;
         }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['doc_word'])
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['word_file'] = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_doc_word;
             $this->html_doc_word($nm_arquivo_doc_word);
         }
         if ($nm_flag_pdf && $nm_vendo_pdf)
         {
            if (isset($nmgp_parms_pdf) && !empty($nmgp_parms_pdf))
            {
                $str_pd4ml    = $nmgp_parms_pdf;
            }
            else
            {
                $str_pd4ml    = " --page-size Letter --orientation Portrait";
            }
            if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['pdf_det'])
            {
                if (-1 < $this->grid->progress_grid && $this->grid->progress_fp)
                {
                    $lang_protect = $this->Ini->Nm_lang['lang_pdff_gnrt'];
                    if (!NM_is_utf8($lang_protect))
                    {
                        $lang_protect = mb_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
                    }
                    fwrite($this->grid->progress_fp, ($this->grid->progress_tot) . "_#NM#_" . $lang_protect . "...\n");
                    fclose($this->grid->progress_fp);
                }
            }
            if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['pdf_name']))
            {
                $nm_arquivo_pdf_serv = $this->Ini->root .  $this->Ini->path_imag_temp . "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['pdf_name'];
                $nm_arquivo_pdf_url  = $this->Ini->path_imag_temp . "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['pdf_name'];
                $nm_arquivo_pdf_base = "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['pdf_name'];
                unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['pdf_name']);
            }
            $arq_pdf_out  = (FALSE !== strpos($nm_arquivo_pdf_serv, ' ')) ? " \"" . $nm_arquivo_pdf_serv . "\"" :  $nm_arquivo_pdf_serv;
            $arq_pdf_in   = (FALSE !== strpos($nm_url_de_saida, ' '))     ? " \"" . $nm_url_de_saida . "\""     :  $nm_url_de_saida;
            if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
            {
                chdir($this->Ini->path_third . "/wkhtmltopdf/win");
                $Win_autentication = "";
                if (isset($_SESSION['sc_pdf_usr']) && !empty($_SESSION['sc_pdf_usr']))
                {
                    $_SESSION['sc_iis_usr'] = $_SESSION['sc_pdf_usr'];
                }
                if (isset($_SESSION['sc_iis_usr']) && !empty($_SESSION['sc_iis_usr']))
                {
                    $Win_autentication .= " --username " . $_SESSION['sc_iis_usr'];
                }
                if (isset($_SESSION['sc_pdf_pw']) && !empty($_SESSION['sc_pdf_pw']))
                {
                    $_SESSION['sc_iis_pw'] = $_SESSION['sc_pdf_pw'];
                }
                if (isset($_SESSION['sc_iis_pw']) && !empty($_SESSION['sc_iis_pw']))
                {
                    $Win_autentication .= " --password " . $_SESSION['sc_iis_pw'];
                }
                $str_execcmd2 = 'wkhtmltopdf ' . $str_pd4ml . $Win_autentication . ' --header-right "[page]"';
            }
            elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
            {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    chdir($this->Ini->path_third . "/wkhtmltopdf/linux-i386");
                    $str_execcmd2 = './wkhtmltopdf-i386 ' . $str_pd4ml . ' --header-right "[page]"';
                }
                else
                {
                    chdir($this->Ini->path_third . "/wkhtmltopdf/linux-amd64");
                    $str_execcmd2 = './wkhtmltopdf-amd64 ' . $str_pd4ml . ' --header-right "[page]"';
                }
            }
            elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
            {
                chdir($this->Ini->path_third . "/wkhtmltopdf/osx/Contents/MacOS");
                $str_execcmd2 = './wkhtmltopdf ' . $str_pd4ml . ' --header-right "[page]"';
            }

            if (!isset($_SESSION['scriptcase']['phantomjs_charts']) || !$_SESSION['scriptcase']['phantomjs_charts'])
            {
                $str_execcmd2 .= ' --javascript-delay ' . 2000;
            }

            $str_execcmd2 .= ' ' . $arq_pdf_in . ' ' . $arq_pdf_out;

            $arr_execcmd = array();
            $str_execcmd = $str_execcmd2;
            exec($str_execcmd2);
            // ----- PDF log
            $fp = @fopen($this->Ini->root . $this->Ini->path_imag_temp . str_replace(".pdf", "", $nm_arquivo_pdf_base) . '.log', 'w');
            if ($fp)
            {
                @fwrite($fp, $str_execcmd . "\r\n\r\n");
                @fwrite($fp, implode("\r\n", $arr_execcmd));
                @fclose($fp);
            }
            if (in_array(trim($this->Ini->str_lang), $this->Ini->nm_font_ttf) && strtolower($_SESSION['scriptcase']['charset']) != "utf-8")
            { 
               $_SESSION['scriptcase']['charset_html'] = (isset($this->Ini->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->Ini->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
            }
            if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['pdf_det'])
            {
                if (-1 < $this->grid->progress_grid && $this->grid->progress_fp)
                {
                    $this->grid->progress_fp = fopen($_GET['pbfile'], 'a');
                    if ($this->grid->progress_fp)
                    {
                         $lang_protect = $this->Ini->Nm_lang['lang_pdff_fnsh'];
                         if (!NM_is_utf8($lang_protect))
                         {
                             $lang_protect = mb_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
                          }
                        fwrite($this->grid->progress_fp, ($this->grid->progress_now + 1 + $this->grid->progress_pdf) . "_#NM#_" . $lang_protect . "...\n");
                        fwrite($this->grid->progress_fp, "off\n");
                        fclose($this->grid->progress_fp);
                    }
                }
            }
unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['pdf_file']);
if (is_file($nm_arquivo_pdf_serv))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['pdf_file'] = $nm_arquivo_pdf_serv;
}
$NM_volta  = "volta_grid";
$NM_target = "_parent";
if (!is_file($nm_arquivo_pdf_serv))
{
?>
  <br><b><?php echo $this->Ini->Nm_lang['lang_pdff_errg']; ?></b></td></tr></table>
<?php
}
else
{
?>
<?php echo $this->Ini->Nm_lang['lang_pdff_file_loct']; ?>
<BR>
<A href="<?php echo $nm_arquivo_pdf_url; ?>" target="_blank" class="scGridPageLink"><B><?php echo $nm_arquivo_pdf_url; ?></B></A>.
<BR>
<?php echo $this->Ini->Nm_lang['lang_pdff_clck_mesg']; ?>
</td></tr></table>
<?php
}
   echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "sc_b_sai", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "");
?>
<FORM name="F0" method=post action="./" target="<?php echo $NM_target; ?>"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($NM_volta); ?>"> 
</FORM>
</td></tr></table>
</BODY>
</HTML>
<?php
         }
      }
   } 
   function Publicaciones() 
   {
      global 
      $nm_apl_dependente;
      $this->SC_redir_btn = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_filtro'];
      $nm_f_saida = "./";
?>
     <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
      <html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
      <head>
       <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></script>
        <script type="text/javascript">var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';</script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
        <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
      </head>
      <body class="scGridPage">
      <table class="scGridTabela" align="center"><tr><td>
<?php
ob_start();
$NM_cont_reg  = 0;
$NM_index_reg = (isset($_POST['nm_run_opt_sel'])) ? explode(";", $_POST['nm_run_opt_sel']) : array();
if (!empty($_SESSION['scriptcase']['sc_sql_btn_run']))
{
    if (isset($_SESSION['scriptcase']['sc_sql_btn_run'][1]))
    {
       $this->rs_grid = $this->Db->SelectLimit($_SESSION['scriptcase']['sc_sql_btn_run'][0], $_SESSION['scriptcase']['sc_sql_btn_run'][1], $_SESSION['scriptcase']['sc_sql_btn_run'][2]) ; 
    }
    else
    {
       $this->rs_grid = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_btn_run'][0]) ; 
    }
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   while (!$this->rs_grid->EOF)  
   { 
       $NM_cont_reg++;
       $this->nombre = $this->rs_grid->fields[0] ;  
       $this->apellido = $this->rs_grid->fields[1] ;  
       $this->email = $this->rs_grid->fields[2] ;  
       $this->pais = $this->rs_grid->fields[3] ;  
       $this->creado = $this->rs_grid->fields[4] ;  
       $this->id = $this->rs_grid->fields[5] ;  
       $this->id = (string)$this->id;
       $this->fbid = $this->rs_grid->fields[6] ;  
       $this->nombrecompleto = $this->rs_grid->fields[7] ;  
       if (in_array($NM_cont_reg, $NM_index_reg)) 
       { 
      $_SESSION['scriptcase']['grid_usuarios']['contr_erro'] = 'on';
if (!isset($_SESSION['var_usuario'])) {$_SESSION['var_usuario'] = "";}
if (!isset($this->sc_temp_var_usuario)) {$this->sc_temp_var_usuario = (isset($_SESSION['var_usuario'])) ? $_SESSION['var_usuario'] : "";}
 $this->sc_temp_var_usuario=$this->id ;
 if (isset($this->sc_temp_var_usuario)) {$_SESSION['var_usuario'] = $this->sc_temp_var_usuario;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_publicacionesxusuario') . "/", $this->nm_location, "","_self", 440, 630);
 };
if (isset($this->sc_temp_var_usuario)) {$_SESSION['var_usuario'] = $this->sc_temp_var_usuario;}
$_SESSION['scriptcase']['grid_usuarios']['contr_erro'] = 'off'; 
       } 
       $this->rs_grid->MoveNext();
   }  
    $_SESSION['scriptcase']['grid_usuarios']['contr_erro'] = 'on';
 
$_SESSION['scriptcase']['grid_usuarios']['contr_erro'] = 'off'; 
   $this->rs_grid->Close();
}  
    $this->NM_buffer = ob_get_contents();
    if (!empty($this->NM_buffer))
    {
        ob_end_flush();
    }
?>
      </td></tr><tr><td align="center">
      <form name="F4" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value="volta_grid"/>
      <input type=hidden name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page);?>"/>
      <input type=hidden name="script_case_session" value="<?php echo NM_encode_input(session_id());?>" />
<?php
    if (!empty($this->NM_buffer))
    {
        echo "<input type=submit name=\"nmgp_bok\" value=\"" . $this->Ini->Nm_lang['lang_btns_cfrm'] . "\"/>";
        echo "</form>";
    }
    else
    {
        echo "</form>";
        echo "<script type=\"text/javascript\">";
        echo "document.F4.submit();";
        echo "</script>";
    }
?>
      </td></tr></table>
      </body>
      </html>
<?php
      $this->SC_redir_btn = false;
   }
   function Sesiones() 
   {
      global 
      $nm_apl_dependente;
      $this->SC_redir_btn = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_filtro'];
      $nm_f_saida = "./";
?>
     <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
      <html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
      <head>
       <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></script>
        <script type="text/javascript">var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';</script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
        <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
      </head>
      <body class="scGridPage">
      <table class="scGridTabela" align="center"><tr><td>
<?php
ob_start();
$NM_cont_reg  = 0;
$NM_index_reg = (isset($_POST['nm_run_opt_sel'])) ? explode(";", $_POST['nm_run_opt_sel']) : array();
if (!empty($_SESSION['scriptcase']['sc_sql_btn_run']))
{
    if (isset($_SESSION['scriptcase']['sc_sql_btn_run'][1]))
    {
       $this->rs_grid = $this->Db->SelectLimit($_SESSION['scriptcase']['sc_sql_btn_run'][0], $_SESSION['scriptcase']['sc_sql_btn_run'][1], $_SESSION['scriptcase']['sc_sql_btn_run'][2]) ; 
    }
    else
    {
       $this->rs_grid = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_btn_run'][0]) ; 
    }
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   while (!$this->rs_grid->EOF)  
   { 
       $NM_cont_reg++;
       $this->nombre = $this->rs_grid->fields[0] ;  
       $this->apellido = $this->rs_grid->fields[1] ;  
       $this->email = $this->rs_grid->fields[2] ;  
       $this->pais = $this->rs_grid->fields[3] ;  
       $this->creado = $this->rs_grid->fields[4] ;  
       $this->id = $this->rs_grid->fields[5] ;  
       $this->id = (string)$this->id;
       $this->fbid = $this->rs_grid->fields[6] ;  
       $this->nombrecompleto = $this->rs_grid->fields[7] ;  
       if (in_array($NM_cont_reg, $NM_index_reg)) 
       { 
      $_SESSION['scriptcase']['grid_usuarios']['contr_erro'] = 'on';
if (!isset($_SESSION['var_usuario'])) {$_SESSION['var_usuario'] = "";}
if (!isset($this->sc_temp_var_usuario)) {$this->sc_temp_var_usuario = (isset($_SESSION['var_usuario'])) ? $_SESSION['var_usuario'] : "";}
 $this->sc_temp_var_usuario = $this->id ;
 if (isset($this->sc_temp_var_usuario)) {$_SESSION['var_usuario'] = $this->sc_temp_var_usuario;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_log_sesiones') . "/", $this->nm_location, "","_self", 440, 630);
 };
if (isset($this->sc_temp_var_usuario)) {$_SESSION['var_usuario'] = $this->sc_temp_var_usuario;}
$_SESSION['scriptcase']['grid_usuarios']['contr_erro'] = 'off'; 
       } 
       $this->rs_grid->MoveNext();
   }  
    $_SESSION['scriptcase']['grid_usuarios']['contr_erro'] = 'on';
 
$_SESSION['scriptcase']['grid_usuarios']['contr_erro'] = 'off'; 
   $this->rs_grid->Close();
}  
    $this->NM_buffer = ob_get_contents();
    if (!empty($this->NM_buffer))
    {
        ob_end_flush();
    }
?>
      </td></tr><tr><td align="center">
      <form name="F4" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value="volta_grid"/>
      <input type=hidden name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page);?>"/>
      <input type=hidden name="script_case_session" value="<?php echo NM_encode_input(session_id());?>" />
<?php
    if (!empty($this->NM_buffer))
    {
        echo "<input type=submit name=\"nmgp_bok\" value=\"" . $this->Ini->Nm_lang['lang_btns_cfrm'] . "\"/>";
        echo "</form>";
    }
    else
    {
        echo "</form>";
        echo "<script type=\"text/javascript\">";
        echo "document.F4.submit();";
        echo "</script>";
    }
?>
      </td></tr></table>
      </body>
      </html>
<?php
      $this->SC_redir_btn = false;
   }
   function Conferencia() 
   {
      global 
      $nm_apl_dependente;
      $this->SC_redir_btn = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_filtro'];
      $nm_f_saida = "./";
?>
     <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
      <html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
      <head>
       <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></script>
        <script type="text/javascript">var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';</script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
        <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
      </head>
      <body class="scGridPage">
      <table class="scGridTabela" align="center"><tr><td>
<?php
ob_start();
$NM_cont_reg  = 0;
$NM_index_reg = (isset($_POST['nm_run_opt_sel'])) ? explode(";", $_POST['nm_run_opt_sel']) : array();
if (!empty($_SESSION['scriptcase']['sc_sql_btn_run']))
{
    if (isset($_SESSION['scriptcase']['sc_sql_btn_run'][1]))
    {
       $this->rs_grid = $this->Db->SelectLimit($_SESSION['scriptcase']['sc_sql_btn_run'][0], $_SESSION['scriptcase']['sc_sql_btn_run'][1], $_SESSION['scriptcase']['sc_sql_btn_run'][2]) ; 
    }
    else
    {
       $this->rs_grid = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_btn_run'][0]) ; 
    }
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   while (!$this->rs_grid->EOF)  
   { 
       $NM_cont_reg++;
       $this->nombre = $this->rs_grid->fields[0] ;  
       $this->apellido = $this->rs_grid->fields[1] ;  
       $this->email = $this->rs_grid->fields[2] ;  
       $this->pais = $this->rs_grid->fields[3] ;  
       $this->creado = $this->rs_grid->fields[4] ;  
       $this->id = $this->rs_grid->fields[5] ;  
       $this->id = (string)$this->id;
       $this->fbid = $this->rs_grid->fields[6] ;  
       $this->nombrecompleto = $this->rs_grid->fields[7] ;  
       if (in_array($NM_cont_reg, $NM_index_reg)) 
       { 
      $_SESSION['scriptcase']['grid_usuarios']['contr_erro'] = 'on';
if (!isset($_SESSION['var_usuario'])) {$_SESSION['var_usuario'] = "";}
if (!isset($this->sc_temp_var_usuario)) {$this->sc_temp_var_usuario = (isset($_SESSION['var_usuario'])) ? $_SESSION['var_usuario'] : "";}
 $this->sc_temp_var_usuario = $this->id ;
 if (isset($this->sc_temp_var_usuario)) {$_SESSION['var_usuario'] = $this->sc_temp_var_usuario;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_inscritos_conferencia_edit') . "/", $this->nm_location, "","_self", 440, 630);
 };
if (isset($this->sc_temp_var_usuario)) {$_SESSION['var_usuario'] = $this->sc_temp_var_usuario;}
$_SESSION['scriptcase']['grid_usuarios']['contr_erro'] = 'off'; 
       } 
       $this->rs_grid->MoveNext();
   }  
    $_SESSION['scriptcase']['grid_usuarios']['contr_erro'] = 'on';
 
$_SESSION['scriptcase']['grid_usuarios']['contr_erro'] = 'off'; 
   $this->rs_grid->Close();
}  
    $this->NM_buffer = ob_get_contents();
    if (!empty($this->NM_buffer))
    {
        ob_end_flush();
    }
?>
      </td></tr><tr><td align="center">
      <form name="F4" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value="volta_grid"/>
      <input type=hidden name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page);?>"/>
      <input type=hidden name="script_case_session" value="<?php echo NM_encode_input(session_id());?>" />
<?php
    if (!empty($this->NM_buffer))
    {
        echo "<input type=submit name=\"nmgp_bok\" value=\"" . $this->Ini->Nm_lang['lang_btns_cfrm'] . "\"/>";
        echo "</form>";
    }
    else
    {
        echo "</form>";
        echo "<script type=\"text/javascript\">";
        echo "document.F4.submit();";
        echo "</script>";
    }
?>
      </td></tr></table>
      </body>
      </html>
<?php
      $this->SC_redir_btn = false;
   }
   function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $alt_modal=0, $larg_modal=0, $opc="")
   {
      if (is_array($nm_apl_parms))
      {
          $tmp_parms = "";
          foreach ($nm_apl_parms as $par => $val)
          {
              $par = trim($par);
              $val = trim($val);
              $tmp_parms .= str_replace(".", "_", $par) . "?#?";
              if (substr($val, 0, 1) == "$")
              {
                  $tmp_parms .= $$val;
              }
              elseif (substr($val, 0, 1) == "{")
              {
                  $val        = substr($val, 1, -1);
                  $tmp_parms .= $this->$val;
              }
              elseif (substr($val, 0, 1) == "[")
              {
                  $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios'][substr($val, 1, -1)];
              }
              else
              {
                  $tmp_parms .= $val;
              }
              $tmp_parms .= "?@?";
          }
          $nm_apl_parms = $tmp_parms;
      }
      $target = (empty($nm_target)) ? "_self" : $nm_target;
      if (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../")
      {
          echo "<SCRIPT language=\"javascript\">";
          if (strtolower($target) == "_blank")
          {
              echo "window.open ('" . $nm_apl_dest . "');";
              echo "</SCRIPT>";
              return;
          }
          else
          {
              echo "window.location='" . $nm_apl_dest . "';";
              echo "</SCRIPT>";
              exit;
          }
      }
      $dir = explode("/", $nm_apl_dest);
      if (count($dir) == 1)
      {
          $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
          $nm_apl_dest = $this->Ini->path_link . $nm_apl_dest . "/" . $nm_apl_dest . ".php";
      }
      if ($nm_target == "modal")
      {
          if (!empty($nm_apl_parms))
          {
              $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
              $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
              $nm_apl_parms = "nmgp_parms=" . $nm_apl_parms . "&";
          }
          $par_modal = "?script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&";
          $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
          return;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['iframe_print']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['iframe_print'] )
      {
          $target = "_parent";
      }
      if (!isset($this->SC_redir_btn) || !$this->SC_redir_btn)
      {
   ?>
     <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
      <HTML>
      <HEAD>
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
      </HEAD>
      <BODY>
   <?php
      }
   ?>
   <form name="Fredir" method="post" 
                     target="_self"> 
     <input type="hidden" name="nmgp_parms" value="<?php echo NM_encode_input($nm_apl_parms) ?>"/>
<?php
   if ($target == "_blank")
   {
?>
       <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
     <input type="hidden" name="nmgp_url_saida" value="<?php echo NM_encode_input($nm_apl_retorno) ?>">
     <input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page) ?>"/> 
     <input type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id());?>"/>
<?php
   }
?>
   </form> 
      <SCRIPT type="text/javascript">
          document.Fredir.target = "<?php echo $target ?>"; 
          document.Fredir.action = "<?php echo $nm_apl_dest ?>";
          document.Fredir.submit();
      </SCRIPT>
   <?php
      if (!isset($this->SC_redir_btn) || !$this->SC_redir_btn)
      {
   ?>
      </BODY>
      </HTML>
   <?php
      }
      if ($target != "_blank")
      {
          exit;
      }
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
  function close_emb()
  {
      if ($this->Db)
      {
          $this->Db->Close(); 
      }
  }
   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          $tmp_cmd = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_fast'] = "";
          if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_orig'])) 
          {
              $tmp_cmd = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_orig']; 
          }
          if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_filtro'])) 
          {
              if (!empty($tmp_cmd)) 
              {
                  $tmp_cmd .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_filtro'] . ")"; 
              }
              else
              {
                  $tmp_cmd = " where (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_filtro'] . ")"; 
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq'] = $tmp_cmd;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['fast_search']);
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
          $this->SC_monta_condicao($comando, "id", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "fbId", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "nombreCompleto", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "nombre", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "apellido", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "email", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "password", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ciudad", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "pais", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "genero", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "fecha_nacimiento", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "status", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "optin", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "perfil", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "creado", $arg_search, $data_search);
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_fast'] = $comando;
      $tmp_cmd = "";
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_orig'])) 
      {
          $tmp_cmd = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_orig']; 
      }
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_filtro'])) 
      {
          if (!empty($tmp_cmd)) 
          {
              $tmp_cmd .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_filtro'] . ")"; 
          }
          else
          {
              $tmp_cmd = " where (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_filtro'] . ")"; 
          }
      }
      if (!empty($tmp_cmd)) 
      {
          $comando = $tmp_cmd . " and (" . $comando . ")"; 
      }
      else
      {
          $comando = " where (" . $comando . ")"; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['fast_search'][2] = $sv_data;
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "id";$nm_numeric[] = "status";$nm_numeric[] = "optin";$nm_numeric[] = "perfil";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['decimal_db'] == ".")
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
      $Nm_datas['fecha_nacimiento'] = "date";
      if (isset($Nm_datas[$campo_join]))
      {
          for ($x = 0; $x < strlen($campo); $x++)
          {
              $tst = substr($campo, $x, 1);
              if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
              {
                  return;
              }
          }
      }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
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
   function SC_proc_dyn_search($Parms)
   {
       $ix     = 0;
       $fields = array();
       $busca  = array();
       $Cmps_check_return = array('pais');
       if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($Parms))
       {
           $Parms = NM_conv_charset($Parms, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $tmp    = explode("_FDYN_", $Parms);
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['dyn_search'] = array();
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['dyn_refresh'] = array();
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['tmp_busca'] = array();
       foreach ($tmp as $cada_f)
       {
           $dats = explode("_DYN_", $cada_f);
           $fields[$ix]['field']  = $dats[0];
           $fields[$ix]['cond']   = $dats[1];
           $sep_bw                 = explode("_VLS2_", $dats[2]);
           $fields[$ix]['vls'][0] = explode("_VLS_",  $sep_bw[0]);
           $fields[$ix]['vls'][1] = isset($sep_bw[1]) ? explode("_VLS_",  $sep_bw[1]) : "";
           $val_sv = array();
           $Val_ck = array();
           foreach ($fields[$ix]['vls'] as $i => $dados)
           {
               if (is_array($dados))
               {
                   foreach ($dados as $ind => $str)
                   {
                       $str = NM_charset_decode($str);
                       $tmp_pos = strpos($str, "##@@");
                       if ($tmp_pos === false)
                       {
                          $val_sv[$i][] = $str;
                          $Val_ck[] = $str;
                       }
                       else
                       {
                         $val_sv[$i][] = substr($str, 0, $tmp_pos);
                         $Val_ck[] = substr($str, 0, $tmp_pos);
                       }
                   }
               }
               else
               {
                   $dados = NM_charset_decode($dados);
                   $tmp_pos = strpos($dados, "##@@");
                   if ($tmp_pos === false)
                   {
                      $val_sv[$i] = $dados;
                      $Val_ck[] = $dados;
                   }
                   else
                   {
                      $val_sv[$i] = substr($dados, 0, $tmp_pos);
                      $Val_ck[] = substr($dados, 0, $tmp_pos);
                   }
               }
           }
           if (in_array($fields[$ix]['field'], $Cmps_check_return))
           {
               foreach ($Val_ck as $Cada_val)
               {
                   if (trim($Cada_val) != '' && !in_array($Cada_val, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['psq_check_ret'][$fields[$ix]['field']]))
                   {
                       $Temp = ob_get_clean();
                       $this->Ini->Arr_result['htmOutput'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['labels'][$fields[$ix]['field']] . " : " . NM_charset_to_utf8($this->Ini->Nm_lang['lang_errm_ajax_data']);
                       $oJson = new Services_JSON();
                       echo $oJson->encode($this->Ini->Arr_result);
                       $this->close_emb();
                       exit;
                   }
               }
           }
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['dyn_search'][] = array('cmp' => $dats[0], 'opc' => $dats[1], 'val' => $val_sv);
           if (!isset($busca[$dats[0]]))
           {
               $busca[$dats[0]] = $dats[1];
               if ($dats[0] == "pais")
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['tmp_busca'][$dats[0]] = $fields[$ix]['vls'][0];
                   if (isset($fields[$ix]['vls'][1]))
                   {
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['tmp_busca'][$dats[0] . '_input_2'] = $fields[$ix]['vls'][1];
                   }
               }
               else
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['tmp_busca'][$dats[0]] = (isset($fields[$ix]['vls'][0])) ? $fields[$ix]['vls'][0][0] : "";
                   if (isset($fields[$ix]['vls'][1]))
                   {
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['tmp_busca'][$dats[0] . '_input_2'] = $fields[$ix]['vls'][1][0];
                   }
               }
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['tmp_busca'][$dats[0] . '_cond'] = $dats[1];
           }
           $ix++;
       }
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['tmp_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['tmp_busca'], "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['tmp_busca'] as $ind => $dados)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['campos_busca'][$ind] = $dados;
      }
       $this->Dyn_Serarch_and_or = "and";
       $this->Cmd_Dyn_Search    = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['cond_dyn_search'] = "";
       foreach ($fields as $ind => $dados)
       {
           $this->Date_part          = false;
           $this->Operador_date_part = "";
           $this->Lang_date_part     = "";
           $dados['cond'] = strtoupper($dados['cond']);
           if (empty($dados['vls']) && ($dados['cond'] == "NU" || $dados['cond'] == "NN" || $dados['cond'] == "EP" || $dados['cond'] == "NE"))
           {
               $dados['vls'][0][0] = "";
           }
           if ($dados['field'] == "pais" && !empty($dados['vls']))
           {
               $Label_cmp     = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['dyn_search_label']['pais'];
               $this->SC_proc_dyn_search_lookup($dados['cond'], $dados['vls'][0], 'pais', 'A', 'VARCHAR', $Label_cmp);
           }
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['dyn_search_out_cmd']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['dyn_search_out_cmd']))
       {
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['dyn_search_out_cmd'] as $cada_out)
           {
               if (!empty($this->Cmd_Dyn_Search))
               {
                   $this->Cmd_Dyn_Search .= " " . $this->Dyn_Serarch_and_or . " ";
               }
               $this->Cmd_Dyn_Search .= $cada_out;
           }
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['dyn_search_out_cond']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['dyn_search_out_cond']))
       {
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['dyn_search_out_cond'] as $cada_out)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['cond_dyn_search'] .= $cada_out . "##*@@";
           }
       }
       if (empty($this->Cmd_Dyn_Search)) 
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_filtro'] = "";
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_orig'];
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['cond_pesq']         = "";
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['cond_dyn_search']   = "";
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['campos_busca']      = array();
           if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_fast'])) 
           {
               if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq'])) 
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq'] .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_fast'] . ")";
               }
               else 
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq'] = " where (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_fast'] . ")";
               }
           }
           return;
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_filtro'] = "( " . $this->Cmd_Dyn_Search . " )";
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_orig'])) 
       {
           $this->Cmd_Dyn_Search = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_orig'] . " and (" . $this->Cmd_Dyn_Search . ")"; 
       }
       else
       {
           $this->Cmd_Dyn_Search = " where " . $this->Cmd_Dyn_Search; 
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq'] = $this->Cmd_Dyn_Search;
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['cond_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['cond_dyn_search'] . $this->Dyn_Serarch_and_or;
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_fast'])) 
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq'] .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['where_pesq_fast'] . ")";
       }
       if (NM_is_utf8($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['cond_pesq']) && $_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['cond_pesq'] = mb_convert_encoding($_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['cond_pesq'], $_SESSION['scriptcase']['charset'], "UTF-8");
       }
   }
   function SC_proc_dyn_search_lookup($cond, $vls, $sql, $tp, $tsql, $lab)
   {
       $nm_aspas = ($tp == 'A') ? "'" : "";
       $nm_cond = "";
       $nm_cmd  = "";
       foreach ($vls as $i => $dados)
       {
           $dados = NM_charset_decode($dados);
           if (!empty($nm_cond))
           {
               $nm_cmd .= ",";
               $nm_cond .= " " . $this->Ini->Nm_lang['lang_srch_orr_cond'] . " ";
           }
           $tmp_pos = strpos($dados, "##@@");
           if ($tmp_pos === false)
           {
              $res_lookup = $dados;
           }
           else
           {
               $res_lookup = substr($dados, $tmp_pos + 4);
               $dados = substr($dados, 0, $tmp_pos);
           }
           if (trim($dados) != "")
           {
               $nm_cmd .= $nm_aspas . $dados . $nm_aspas;
               $nm_cond .= $res_lookup;
           }
       }
       if (!empty($nm_cmd))
       {
           if (!empty($this->Cmd_Dyn_Search))
           {
               $this->Cmd_Dyn_Search .= " " . $this->Dyn_Serarch_and_or . " ";
           }
           if ($cond == "DF")
           {
               $this->Cmd_Dyn_Search .= "(" . $sql . " not in (" . $nm_cmd . "))";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['cond_dyn_search'] .= $lab . " " . $this->Ini->Nm_lang['lang_srch_not_like'] . " " . $nm_cond . "##*@@";
           }
           else
           {
               $this->Cmd_Dyn_Search .= "(" . $sql . " in (" . $nm_cmd . "))";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['cond_dyn_search'] .= $lab . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond . "##*@@";
           }
       }
   }
   function SC_proc_dyn_search_all($cond, $vls, $sql, $tp, $tsql, $lab)
   {
       $nm_aspas = "'";
       if ($tp == "N" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['decimal_db'] == ".")
       {
           $nm_aspas = "";
       }
       $ini_lower = "";
       $end_lower = "";
       $nm_cond = "";
       $nm_cmd  = "";
       $dados   = $vls[0];
           if ($dados == "" && $cond != "NU" && $cond != "NN" && $cond != "EP" && $cond != "NE")
           {
               return;
           }
           if ($tp == 'N' && ($cond == "EP" || $cond == "NE"))
           {
               return;
           }
           $dados  = substr($this->Db->qstr($dados), 1, -1);
           if ($cond != "NU" && $cond != "NN" && $cond != "EP" && $cond != "NE")
           {
               if ($tsql == "TIMESTAMP")
               {
                   $tsql = "DATETIME";
               }
           }
           switch ($cond)
           {
              case "EQ":     // 
                 $nm_cmd  = $nm_ini_lower . $sql . $nm_fim_lower . " = " . $nm_aspas . $dados . $nm_aspas;
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->Val_format_1 . "##*@@";
              break;
              case "II":     // 
                 $nm_cmd  = $nm_ini_lower . $sql . $nm_fim_lower . " like '" . $dados . "%'";
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_strt'] . " " . $this->Val_format_1 . "##*@@";
              break;
              case "QP";     // 
              case "NP";     // 
                 $concat = " " . $this->Dyn_Serarch_and_or . " ";
                 if ($cond == "QP")
                 {
                     $op_all    = " like ";
                     $lang_like = $this->Ini->Nm_lang['lang_srch_like'];
                 }
                 else
                 {
                     $op_all    = " not like ";
                     $lang_like = $this->Ini->Nm_lang['lang_srch_not_like'];
                 }
                 $tmp_cond = "";
                 if (substr($tsql, 0, 4) == "DATE" && $this->Date_part)
                 {
                     if ($this->NM_data_qp['ano'] != "____")
                     {
                         $tmp_cond .= (empty($tmp_cond)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                         $tmp_cond .= $this->Ini->Nm_lang['lang_srch_year'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['ano'];
                         $nm_cmd   .= (empty($nm_cmd)) ? "" : $concat;
                         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                         {
                             $nm_cmd .= "strftime('%Y', " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                         }
                         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                         {
                             $nm_cmd .= "extract(year from " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                         }
                         else
                         {
                             $nm_cmd .= "year(" . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                         }
                     }
                     if ($this->NM_data_qp['mes'] != "__")
                     {
                         $tmp_cond .= (empty($tmp_cond)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                         $tmp_cond .= $this->Ini->Nm_lang['lang_srch_mnth'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['mes'];
                         $nm_cmd   .= (empty($nm_cmd)) ? "" : $concat;
                         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                         {
                             $nm_cmd .= "strftime('%m', " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                         }
                         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                         {
                             $nm_cmd .= "extract(month from " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                         }
                         else
                         {
                             $nm_cmd .= "month(" . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                         }
                     }
                     if ($this->NM_data_qp['dia'] != "__")
                     {
                         $tmp_cond .= (empty($nm_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                         $tmp_cond .= $this->Ini->Nm_lang['lang_srch_days'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['dia'];
                         $nm_cmd  .= (empty($nm_cmd)) ? "" : $concat;
                         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                         {
                             $nm_cmd .= "strftime('%d', " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                         }
                         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                         {
                             $nm_cmd .= "extract(day from " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                         }
                         else
                         {
                             $nm_cmd .= "day(" . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                         }
                     }
                 }
                 if (strpos($tsql, "TIME") !== false && $this->Date_part)
                 {
                     if ($this->NM_data_qp['hor'] != "__")
                     {
                         $tmp_cond .= (empty($tmp_cond)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                         $tmp_cond .= $this->Ini->Nm_lang['lang_srch_time'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['hor'];
                         $nm_cmd   .= (empty($nm_cmd)) ? "" : $concat;
                         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                         {
                             $nm_cmd .= "strftime('%H', " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                         }
                         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                         {
                             $nm_cmd .= "extract(hour from " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                         }
                         else
                         {
                             $nm_cmd .= "hour(" . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                         }
                     }
                     if ($this->NM_data_qp['min'] != "__")
                     {
                         $tmp_cond .= (empty($tmp_cond)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                         $tmp_cond .= $this->Ini->Nm_lang['lang_srch_mint'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['min'];
                         $nm_cmd   .= (empty($nm_cmd)) ? "" : $concat;
                         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                         {
                             $nm_cmd .= "strftime('%M', " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                         }
                         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                         {
                             $nm_cmd .= "extract(minute from " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                         }
                         else
                         {
                             $nm_cmd .= "minute(" . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                         }
                     }
                     if ($this->NM_data_qp['seg'] != "__")
                     {
                         $tmp_cond .= (empty($tmp_cond)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                         $tmp_cond .= $this->Ini->Nm_lang['lang_srch_scnd'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['seg'];
                         $nm_cmd   .= (empty($nm_cmd)) ? "" : $concat;
                         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                         {
                             $nm_cmd .= "strftime('%S', " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                         }
                         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                         {
                             $nm_cmd .= "extract(second from " . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                         }
                         else
                         {
                             $nm_cmd .= "second(" . $sql . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                         }
                     }
                 }
                 if (!$this->Date_part)
                 {
                     $nm_cmd  .= $nm_ini_lower . $sql . $nm_fim_lower . $op_all . "'%" . $dados . "%'";
                     $nm_cond  = $lab . " " . $lang_like . " " . $this->Val_format_1 . "##*@@";
                 }
                 else
                 {
                     if (!empty($tmp_cond))
                     {
                         $nm_cond = $lab . ": " . $tmp_cond . "##*@@";
                     }
                 }
              break;
              case "DF":     // 
                 if ($tp == "DT" || $tp == "DH" || $tp == "HH")
                 {
                     $nm_cmd  = $nm_ini_lower . $sql . $nm_fim_lower . " not like '%" . $dados . "%'";
                 }
                 else
                 {
                     $nm_cmd  = $nm_ini_lower . $sql . $nm_fim_lower . " <> " . $nm_aspas . $dados . $nm_aspas;
                 }
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->Val_format_1 . "##*@@";
              break;
              case "GT":     // 
                 $nm_cmd  = $sql . " > " . $nm_aspas . $dados . $nm_aspas;
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_grtr'] . " " . $this->Val_format_1 . "##*@@";
              break;
              case "GE":     // 
                 $nm_cmd  = $sql . " >= " . $nm_aspas . $dados . $nm_aspas;
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_grtr_equl'] . " " . $this->Val_format_1 . "##*@@";
              break;
              case "LT":     // 
                 $nm_cmd  = $sql . " < " . $nm_aspas . $dados . $nm_aspas;
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_less'] . " " . $this->Val_format_1 . "##*@@";
              break;
              case "LE":     // 
                 $nm_cmd  = $sql . " <= " . $nm_aspas . $dados . $nm_aspas;
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_less_equl'] . " " . $this->Val_format_1 . "##*@@";
              break;
              case "BW":     // 
                 $this->Val_BW_2  = substr($this->Db->qstr($this->Val_BW_2), 1, -1);
                 $nm_cmd = $sql . " between " . $nm_aspas . $dados . $nm_aspas . " and " . $nm_aspas . $this->Val_BW_2 . $nm_aspas;
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_betw'] . " " . $this->Val_format_1 . " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " " . $this->Val_format_2 . "##*@@";
              break;
              case "IN":     // 
                 $nm_sc_valores = explode(",", $dados);
                 $cond_str = "";
                 $nm_condX  = "";
                 $ini_mult  = "";
                 $end_mult  = "";
                 if (!empty($nm_sc_valores))
                 {
                     foreach ($nm_sc_valores as $nm_sc_valor)
                     {
                        if ($tp == "N" && substr_count($nm_sc_valor, ".") > 1)
                        {
                           $nm_sc_valor = str_replace(".", "", $nm_sc_valor);
                        }
                        if ("" != $cond_str)
                        {
                           $ini_mult  = "(";
                           $end_mult  = ")";
                           $cond_str .= ",";
                           $nm_condX  .= " " . $this->Ini->Nm_lang['lang_srch_orr_cond'] . " ";
                        }
                        $cond_str .= $nm_aspas . $nm_sc_valor . $nm_aspas;
                        $nm_condX .= $nm_aspas . $nm_sc_valor . $nm_aspas;
                     }
                     $nm_cmd  = $nm_ini_lower . $sql . $nm_fim_lower . " IN (" . $cond_str . ")";
                     $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $ini_mult . $nm_condX . $end_mult . "##*@@";
                 }
            break;
              case "NU":     // 
                 $nm_cmd  = $sql . " IS NULL ";
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_null'] ."##*@@";
              break;
              case "NN":     // 
                 $nm_cmd = $sql . " IS NOT NULL ";
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_nnul'] . "##*@@";
              break;
              case "EP":     // 
                 $nm_cmd  = $sql . " = '' ";
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_empty'] ."##*@@";
              break;
              case "NE":     // 
                 $nm_cmd = $sql . " <> '' ";
                 $nm_cond = $lab . " " . $this->Ini->Nm_lang['lang_srch_nempty'] . "##*@@";
              break;
           }
           if (!empty($nm_cmd))
           {
               if (!empty($this->Cmd_Dyn_Search))
               {
                   $this->Cmd_Dyn_Search .= " " . $this->Dyn_Serarch_and_or . " ";
               }
               $this->Cmd_Dyn_Search .= "(" . $nm_cmd . ")";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_usuarios']['cond_dyn_search'] .= $nm_cond;
           }
   }

   function nm_prep_date(&$val, $tp, $tsql, &$cond, $format_nd)
   {
       $fill_dt = false;
       if ($tsql == "TIMESTAMP")
       {
           $tsql = "DATETIME";
       }
       $cond = strtoupper($cond);
       if ($cond == "NU" || $cond == "NN" || $cond == "EP" || $cond == "NE")
       {
           $val    = array();
           $val[0] = "";
           return;
       }
       if ($cond != "II" && $cond != "QP" && $cond != "NP")
       {
           $fill_dt = true;
       }
       if ($fill_dt)
       {
           $val[0]['dia'] = (!empty($val[0]['dia']) && strlen($val[0]['dia']) == 1) ? "0" . $val[0]['dia'] : $val[0]['dia'];
           $val[0]['mes'] = (!empty($val[0]['mes']) && strlen($val[0]['mes']) == 1) ? "0" . $val[0]['mes'] : $val[0]['mes'];
           if ($tp == "DH")
           {
               $val[0]['hor'] = (!empty($val[0]['hor']) && strlen($val[0]['hor']) == 1) ? "0" . $val[0]['hor'] : $val[0]['hor'];
               $val[0]['min'] = (!empty($val[0]['min']) && strlen($val[0]['min']) == 1) ? "0" . $val[0]['min'] : $val[0]['min'];
               $val[0]['seg'] = (!empty($val[0]['seg']) && strlen($val[0]['seg']) == 1) ? "0" . $val[0]['seg'] : $val[0]['seg'];
           }
           if ($cond == "BW")
           {
               $val[1]['dia'] = (!empty($val[1]['dia']) && strlen($val[1]['dia']) == 1) ? "0" . $val[1]['dia'] : $val[1]['dia'];
               $val[1]['mes'] = (!empty($val[1]['mes']) && strlen($val[1]['mes']) == 1) ? "0" . $val[1]['mes'] : $val[1]['mes'];
               if ($tp == "DH")
               {
                   $val[1]['hor'] = (!empty($val[1]['hor']) && strlen($val[1]['hor']) == 1) ? "0" . $val[1]['hor'] : $val[1]['hor'];
                   $val[1]['min'] = (!empty($val[1]['min']) && strlen($val[1]['min']) == 1) ? "0" . $val[1]['min'] : $val[1]['min'];
                   $val[1]['seg'] = (!empty($val[1]['seg']) && strlen($val[1]['seg']) == 1) ? "0" . $val[1]['seg'] : $val[1]['seg'];
               }
           }
       }
       if ($cond == "BW")
       {
           $this->NM_data_1 = array();
           $this->NM_data_1['ano'] = (isset($val[0]['ano']) && !empty($val[0]['ano'])) ? $val[0]['ano'] : "____";
           $this->NM_data_1['mes'] = (isset($val[0]['mes']) && !empty($val[0]['mes'])) ? $val[0]['mes'] : "__";
           $this->NM_data_1['dia'] = (isset($val[0]['dia']) && !empty($val[0]['dia'])) ? $val[0]['dia'] : "__";
           $this->NM_data_1['hor'] = (isset($val[0]['hor']) && !empty($val[0]['hor'])) ? $val[0]['hor'] : "__";
           $this->NM_data_1['min'] = (isset($val[0]['min']) && !empty($val[0]['min'])) ? $val[0]['min'] : "__";
           $this->NM_data_1['seg'] = (isset($val[0]['seg']) && !empty($val[0]['seg'])) ? $val[0]['seg'] : "__";
           $this->data_menor($this->NM_data_1);
           $this->NM_data_2 = array();
           $this->NM_data_2['ano'] = (isset($val[1]['ano']) && !empty($val[1]['ano'])) ? $val[1]['ano'] : "____";
           $this->NM_data_2['mes'] = (isset($val[1]['mes']) && !empty($val[1]['mes'])) ? $val[1]['mes'] : "__";
           $this->NM_data_2['dia'] = (isset($val[1]['dia']) && !empty($val[1]['dia'])) ? $val[1]['dia'] : "__";
           $this->NM_data_2['hor'] = (isset($val[1]['hor']) && !empty($val[1]['hor'])) ? $val[1]['hor'] : "__";
           $this->NM_data_2['min'] = (isset($val[1]['min']) && !empty($val[1]['min'])) ? $val[1]['min'] : "__";
           $this->NM_data_2['seg'] = (isset($val[1]['seg']) && !empty($val[1]['seg'])) ? $val[1]['seg'] : "__";
           $this->data_maior($this->NM_data_2);
           $val = array();
           if ($tp == "ND")
           {
               $out_dt1 = $format_nd;
               $out_dt1 = str_replace("yyyy", $this->NM_data_1['ano'], $out_dt1);
               $out_dt1 = str_replace("mm",   $this->NM_data_1['mes'], $out_dt1);
               $out_dt1 = str_replace("dd",   $this->NM_data_1['dia'], $out_dt1);
               $out_dt1 = str_replace("hh",   "", $out_dt1);
               $out_dt1 = str_replace("ii",   "", $out_dt1);
               $out_dt1 = str_replace("ss",   "", $out_dt1);
               $out_dt2 = $format_nd;
               $out_dt2 = str_replace("yyyy", $this->NM_data_2['ano'], $out_dt2);
               $out_dt2 = str_replace("mm",   $this->NM_data_2['mes'], $out_dt2);
               $out_dt2 = str_replace("dd",   $this->NM_data_2['dia'], $out_dt2);
               $out_dt2 = str_replace("hh",   "", $out_dt2);
               $out_dt2 = str_replace("ii",   "", $out_dt2);
               $out_dt2 = str_replace("ss",   "", $out_dt2);
               $val[0] = $out_dt1;
               $val[1] = $out_dt2;
               return;
           }
           if ($tsql == "TIME")
           {
               $val[0] = $this->NM_data_1['hor'] . ":" . $this->NM_data_1['min'] . ":" . $this->NM_data_1['seg'];
               $val[1] = $this->NM_data_2['hor'] . ":" . $this->NM_data_2['min'] . ":" . $this->NM_data_2['seg'];
           }
           elseif (substr($tsql, 0, 4) == "DATE")
           {
               $val[0] = $this->NM_data_1['ano'] . "-" . $this->NM_data_1['mes'] . "-" . $this->NM_data_1['dia'];
               $val[1] = $this->NM_data_2['ano'] . "-" . $this->NM_data_2['mes'] . "-" . $this->NM_data_2['dia'];
               if (strpos($tsql, "TIME") !== false)
               {
                   $val[0] .= " " . $this->NM_data_1['hor'] . ":" . $this->NM_data_1['min'] . ":" . $this->NM_data_1['seg'];
                   $val[1] .= " " . $this->NM_data_2['hor'] . ":" . $this->NM_data_2['min'] . ":" . $this->NM_data_2['seg'];
               }
           }
           return;
       }
       $this->NM_data_qp = array();
       $this->NM_data_qp['ano'] = (isset($val[0]['ano']) && $val[0]['ano'] != "") ? $val[0]['ano'] : "____";
       $this->NM_data_qp['mes'] = (isset($val[0]['mes']) && $val[0]['mes'] != "") ? $val[0]['mes'] : "__";
       $this->NM_data_qp['dia'] = (isset($val[0]['dia']) && $val[0]['dia'] != "") ? $val[0]['dia'] : "__";
       $this->NM_data_qp['hor'] = (isset($val[0]['hor']) && $val[0]['hor'] != "") ? $val[0]['hor'] : "__";
       $this->NM_data_qp['min'] = (isset($val[0]['min']) && $val[0]['min'] != "") ? $val[0]['min'] : "__";
       $this->NM_data_qp['seg'] = (isset($val[0]['seg']) && $val[0]['seg'] != "") ? $val[0]['seg'] : "__";
       if ($tp != "ND" && ($cond == "LE" || $cond == "LT" || $cond == "GE" || $cond == "GT"))
       {
           $count_fill = 0;
           foreach ($this->NM_data_qp as $x => $tx)
           {
               if (substr($tx, 0, 2) != "__")
               {
                   $count_fill++;
               }
           }
           if ($count_fill > 1)
           {
               if ($cond == "LE" || $cond == "GT")
               {
                   $this->data_maior($this->NM_data_qp);
               }
               else
               {
                   $this->data_menor($this->NM_data_qp);
               }
               if ($tsql == "TIME")
               {
                   $val[0] = $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
               }
               elseif (substr($tsql, 0, 4) == "DATE")
               {
                   $val[0] = $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
                   if (strpos($tsql, "TIME") !== false)
                   {
                       $val[0] .= " " . $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
                   }
               }
               return;
           }
       }
       foreach ($this->NM_data_qp as $x => $tx)
       {
           if (substr($tx, 0, 2) == "__" && ($x == "dia" || $x == "mes" || $x == "ano"))
           {
               if (substr($tsql, 0, 4) == "DATE")
               {
                   $this->Date_part = true;
                   break;
               }
           }
           if (substr($tx, 0, 2) == "__" && ($x == "hor" || $x == "min" || $x == "seg"))
           {
               if (strpos($tsql, "TIME") !== false && ($tp == "DH" || ($tp == "DT" && $cond != "LE" && $cond != "LT" && $cond != "GE" && $cond != "GT")))
               {
                   $this->Date_part = true;
                   break;
               }
           }
       }
       if ($this->Date_part)
       {
           $this->Ini_date_part = "";
           $this->End_date_part = "";
           $this->Ini_date_char = "";
           $this->End_date_char = "";
           if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
           {
               $this->Ini_date_part = "'";
               $this->End_date_part = "'";
           }
           if ($tp != "ND")
           {
               if ($cond == "EQ")
               {
                   $this->Operador_date_part = " = ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_equl'];
               }
               elseif ($cond == "II")
               {
                   $this->Operador_date_part = " like ";
                   $this->Ini_date_part = "'";
                   $this->End_date_part = "%'";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_strt'];
               }
               elseif ($cond == "DF")
               {
                   $this->Operador_date_part = " <> ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_diff'];
               }
               elseif ($cond == "GT")
               {
                   $this->Operador_date_part = " > ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['pesq_cond_maior'];
               }
               elseif ($cond == "GE")
               {
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_grtr_equl'];
                   $this->Operador_date_part = " >= ";
               }
               elseif ($cond == "LT")
               {
                   $this->Operador_date_part = " < ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_less'];
               }
               elseif ($cond == "LE")
               {
                   $this->Operador_date_part = " <= ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_less_equl'];
               }
               elseif ($cond == "NP")
               {
                   $this->Operador_date_part = " not like ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_diff'];
                   $this->Ini_date_part = "'%";
                   $this->End_date_part = "%'";
               }
               else
               {
                   $this->Operador_date_part = " like ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_equl'];
                   $this->Ini_date_part = "'%";
                   $this->End_date_part = "%'";
               }
           }
           if ($cond == "DF")
           {
               $cond = "NP";
           }
           if ($cond != "NP")
           {
               $cond = "QP";
           }
       }
       $val = array();
       if ($tp != "ND" && ($cond == "QP" || $cond == "NP"))
       {
           $val[0] = "";
           if (substr($tsql, 0, 4) == "DATE")
           {
               $val[0] .= $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
               if (strpos($tsql, "TIME") !== false)
               {
                   $val[0] .= " ";
               }
           }
           if (strpos($tsql, "TIME") !== false)
           {
               $val[0] .= $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
           }
           return;
       }
       if ($cond == "II" || $cond == "DF" || $cond == "EQ" || $cond == "LT" || $cond == "GE")
       {
           $this->data_menor($this->NM_data_qp);
       }
       else
       {
           $this->data_maior($this->NM_data_qp);
       }
       if ($tsql == "TIME")
       {
           $val[0] = $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
           return;
       }
       $format_sql = "";
       if (substr($tsql, 0, 4) == "DATE")
       {
           $format_sql .= $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
           if (strpos($tsql, "TIME") !== false)
           {
               $format_sql .= " ";
           }
       }
       if (strpos($tsql, "TIME") !== false)
       {
           $format_sql .=  $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
       }
       if ($tp != "ND")
       {
           $val[0] = $format_sql;
           return;
       }
       if ($tp == "ND")
       {
           $format_nd = str_replace("yyyy", $this->NM_data_qp['ano'], $format_nd);
           $format_nd = str_replace("mm",   $this->NM_data_qp['mes'], $format_nd);
           $format_nd = str_replace("dd",   $this->NM_data_qp['dia'], $format_nd);
           $format_nd = str_replace("hh",   $this->NM_data_qp['hor'], $format_nd);
           $format_nd = str_replace("ii",   $this->NM_data_qp['min'], $format_nd);
           $format_nd = str_replace("ss",   $this->NM_data_qp['seg'], $format_nd);
           $val[0] = $format_nd;
           return;
       }
   }
   function data_menor(&$data_arr)
   {
       $data_arr["ano"] = ("____" == $data_arr["ano"]) ? "0001" : $data_arr["ano"];
       $data_arr["mes"] = ("__" == $data_arr["mes"])   ? "01" : $data_arr["mes"];
       $data_arr["dia"] = ("__" == $data_arr["dia"])   ? "01" : $data_arr["dia"];
       $data_arr["hor"] = ("__" == $data_arr["hor"])   ? "00" : $data_arr["hor"];
       $data_arr["min"] = ("__" == $data_arr["min"])   ? "00" : $data_arr["min"];
       $data_arr["seg"] = ("__" == $data_arr["seg"])   ? "00" : $data_arr["seg"];
   }

   function data_maior(&$data_arr)
   {
       $data_arr["ano"] = ("____" == $data_arr["ano"]) ? "9999" : $data_arr["ano"];
       $data_arr["mes"] = ("__" == $data_arr["mes"])   ? "12" : $data_arr["mes"];
       $data_arr["hor"] = ("__" == $data_arr["hor"])   ? "23" : $data_arr["hor"];
       $data_arr["min"] = ("__" == $data_arr["min"])   ? "59" : $data_arr["min"];
       $data_arr["seg"] = ("__" == $data_arr["seg"])   ? "59" : $data_arr["seg"];
       if ("__" == $data_arr["dia"])
       {
           $data_arr["dia"] = "31";
           if ($data_arr["mes"] == "04" || $data_arr["mes"] == "06" || $data_arr["mes"] == "09" || $data_arr["mes"] == "11")
           {
               $data_arr["dia"] = 30;
           }
           elseif ($data_arr["mes"] == "02")
           { 
                if  ($data_arr["ano"] % 4 == 0)
                {
                     $data_arr["dia"] = 29;
                }
                else 
                {
                     $data_arr["dia"] = 28;
                }
           }
       }
   }
  function html_doc_word($nm_arquivo_doc_word)
  {
      global $nm_url_saida;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - usuarios :: Doc</TITLE>
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
   <td class="scExportTitle" style="height: 25px">WORD</td>
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
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . $nm_arquivo_doc_word ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_usuarios_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="nm_tit_doc" value="grid_usuarios.doc"> 
<input type="hidden" name="nm_name_doc" value="<?php echo NM_encode_input($this->Ini->path_imag_temp . $nm_arquivo_doc_word) ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($this->ret_word) ?>"> 
</FORM> 
</BODY>
</HTML>
<?php
  }
} 
// 
//======= =========================
   if (!function_exists("NM_is_utf8"))
   {
       include_once("grid_usuarios_nmutf8.php");
   }
   if (!function_exists("SC_dir_app_ini"))
   {
       include_once("../_lib/lib/php/nm_ctrl_app_name.php");
   }
   SC_dir_app_ini('Phronesis');
   $_SESSION['scriptcase']['grid_usuarios']['contr_erro'] = 'off';
   $sc_conv_var = array();
   if (!empty($_POST))
   {
       foreach ($_POST as $nmgp_var => $nmgp_val)
       {
            if (isset($sc_conv_var[$nmgp_var]))
            {
                $nmgp_var = $sc_conv_var[$nmgp_var];
            }
            elseif (isset($sc_conv_var[strtolower($nmgp_var)]))
            {
                $nmgp_var = $sc_conv_var[strtolower($nmgp_var)];
            }
            nm_limpa_str_grid_usuarios($nmgp_val);
            nm_protect_num_grid_usuarios($nmgp_var, $nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (!empty($_GET))
   {
       foreach ($_GET as $nmgp_var => $nmgp_val)
       {
            if (isset($sc_conv_var[$nmgp_var]))
            {
                $nmgp_var = $sc_conv_var[$nmgp_var];
            }
            elseif (isset($sc_conv_var[strtolower($nmgp_var)]))
            {
                $nmgp_var = $sc_conv_var[strtolower($nmgp_var)];
            }
            nm_limpa_str_grid_usuarios($nmgp_val);
            nm_protect_num_grid_usuarios($nmgp_var, $nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (isset($var_usuario)) 
   {
       $_SESSION['var_usuario'] = $var_usuario;
   }
   if (!empty($glo_perfil))  
   { 
      $_SESSION['scriptcase']['glo_perfil'] = $glo_perfil;
   }   
   if (isset($glo_servidor)) 
   {
       $_SESSION['scriptcase']['glo_servidor'] = $glo_servidor;
   }
   if (isset($glo_banco)) 
   {
       $_SESSION['scriptcase']['glo_banco'] = $glo_banco;
   }
   if (isset($glo_tpbanco)) 
   {
       $_SESSION['scriptcase']['glo_tpbanco'] = $glo_tpbanco;
   }
   if (isset($glo_usuario)) 
   {
       $_SESSION['scriptcase']['glo_usuario'] = $glo_usuario;
   }
   if (isset($glo_senha)) 
   {
       $_SESSION['scriptcase']['glo_senha'] = $glo_senha;
   }
   if (isset($glo_senha_protect)) 
   {
       $_SESSION['scriptcase']['glo_senha_protect'] = $glo_senha_protect;
   }
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida_form']) && $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida_form'] && !isset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['master_pai']))
   {
       $SC_init_ant = $script_case_init;
       $script_case_init = rand(2, 10000);
       if (isset($_SESSION['sc_session'][$SC_init_ant]['grid_usuarios']['embutida_pai']))
       {
           $_SESSION['sc_session'][$SC_init_ant][$_SESSION['sc_session'][$SC_init_ant]['grid_usuarios']['embutida_pai']]['embutida_filho'][] = $script_case_init;
       }
       $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['master_pai'] = $SC_init_ant;
   }
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['master_pai']))
   {
       $SC_init_ant = $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['master_pai'];
       if (!isset($_SESSION['sc_session'][$SC_init_ant]['grid_usuarios']['embutida_form_parms']))
       {
           $_SESSION['sc_session'][$SC_init_ant]['grid_usuarios']['embutida_form_parms'] = "";
       }
       $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida_form_parms'] = $_SESSION['sc_session'][$SC_init_ant]['grid_usuarios']['embutida_form_parms'];
       $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida_form'] = true;
       $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['reg_start'] = "";
       $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['opcao'] = "inicio";
       unset($_SESSION['sc_session'][$SC_init_ant]['grid_usuarios']['embutida_form']);
       unset($_SESSION['sc_session'][$SC_init_ant]['grid_usuarios']['embutida_form_parms']);
   }
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida_form_parms'])) 
   {
       if (!empty($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida_form_parms'])) 
       {
           $nmgp_parms = $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida_form_parms'];
           $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida_form_parms'] = "";
       }
   }
   elseif (isset($script_case_init))
   {
       unset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida_form']);
       unset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida_form_parms']);
   }
   if (!isset($nmgp_opcao) || !isset($script_case_init) || ((!isset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida']) || !$_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida']) && $nmgp_opcao != "formphp"))
   { 
       if (!empty($nmgp_parms)) 
       { 
           $nmgp_parms = NM_decode_input($nmgp_parms);
           $nmgp_parms = str_replace("@aspass@", "'", $nmgp_parms);
           $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
           $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
           $todo = explode("?@?", $nmgp_parms);
           foreach ($todo as $param)
           {
                $cadapar = explode("?#?", $param);
                if (1 < sizeof($cadapar))
                {
                    if (isset($sc_conv_var[$cadapar[0]]))
                    {
                        $cadapar[0] = $sc_conv_var[$cadapar[0]];
                    }
                    elseif (isset($sc_conv_var[strtolower($cadapar[0])]))
                    {
                        $cadapar[0] = $sc_conv_var[strtolower($cadapar[0])];
                    }
                    nm_limpa_str_grid_usuarios($cadapar[1]);
                    nm_protect_num_grid_usuarios($cadapar[0], $cadapar[1]);
                    $$cadapar[0] = $cadapar[1];
                    if ($cadapar[0] == "var_usuario") 
                    {
                        $_SESSION["var_usuario"] = $cadapar[1];
                    }
                }
           }
           if (isset($var_usuario)) 
           {
               $_SESSION['var_usuario'] = $var_usuario;
               nm_limpa_str_grid_usuarios($_SESSION["var_usuario"]);
           }
           $NMSC_conf_apl = array();
           if (isset($NMSC_inicial))
           {
               $NMSC_conf_apl['inicial'] = $NMSC_inicial;
           }
           if (isset($NMSC_rows))
           {
               $NMSC_conf_apl['rows'] = $NMSC_rows;
           }
           if (isset($NMSC_cols))
           {
               $NMSC_conf_apl['cols'] = $NMSC_cols;
           }
           if (isset($NMSC_paginacao))
           {
               $NMSC_conf_apl['paginacao'] = $NMSC_paginacao;
           }
           if (isset($NMSC_cab))
           {
               $NMSC_conf_apl['cab'] = $NMSC_cab;
           }
           if (isset($NMSC_nav))
           {
               $NMSC_conf_apl['nav'] = $NMSC_nav;
           }
           if (isset($NM_run_iframe) && $NM_run_iframe == 1) 
           { 
               unset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']);
               $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['b_sair'] = false;
           }   
       } 
   } 
   $ini_embutida = "";
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida']) && $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida'])
   {
       $nmgp_outra_jan = "";
   }
   if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
   {
       $script_case_init = "";
   }
   if (isset($GLOBALS["script_case_init"]) && !empty($GLOBALS["script_case_init"]))
   {
       $ini_embutida = $GLOBALS["script_case_init"];
        if (!isset($_SESSION['sc_session'][$ini_embutida]['grid_usuarios']['embutida']))
        { 
           $_SESSION['sc_session'][$ini_embutida]['grid_usuarios']['embutida'] = false;
        }
        if (!$_SESSION['sc_session'][$ini_embutida]['grid_usuarios']['embutida'])
        { 
           $script_case_init = $ini_embutida;
        }
   }
   if (isset($_SESSION['scriptcase']['grid_usuarios']['protect_modal']) && !empty($_SESSION['scriptcase']['grid_usuarios']['protect_modal']))
   {
       $script_case_init = $_SESSION['scriptcase']['grid_usuarios']['protect_modal'];
   }
   if (!isset($script_case_init) || empty($script_case_init))
   {
       $script_case_init = rand(2, 10000);
   }
   $salva_emb    = false;
   $salva_iframe = false;
   $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['doc_word'] = false;
   $_SESSION['scriptcase']['saida_word'] = false;
   if (isset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['iframe_menu'];
       unset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['iframe_menu']);
   }
   if (isset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida']))
   {
       $salva_emb = $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida'];
       unset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida']);
   }
   if (isset($nm_run_menu) && $nm_run_menu == 1 && !$salva_emb)
   {
        if (isset($_SESSION['scriptcase']['sc_aba_iframe']) && isset($_SESSION['scriptcase']['sc_apl_menu_atual']))
        {
            foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
            {
                if ($aba == $_SESSION['scriptcase']['sc_apl_menu_atual'])
                {
                    unset($_SESSION['scriptcase']['sc_aba_iframe'][$aba]);
                    break;
                }
            }
        }
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "grid_usuarios";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'grid_usuarios' || $achou)
                {
                    unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                }
            }
            if (!$achou && isset($nm_apl_menu))
            {
                foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
                {
                    if ($nome_apl == $nm_apl_menu || $achou)
                    {
                        $achou = true;
                        if ($nome_apl != $nm_apl_menu)
                        {
                            unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                        }
                    }
                }
            }
        }
        $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['iframe_menu'] = $salva_iframe;
   }
   $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida'] = $salva_emb;

   if (!isset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['initialize']))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '/grid_usuarios/'))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['initialize'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['initialize'] = false;
   }
   if ($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['initialize'])
   {
       unset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['tot_geral']);
       $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['contr_total_geral'] = "NAO";
   }

   $_POST['script_case_init'] = $script_case_init;
   if (isset($nmgp_opcao) && $nmgp_opcao == "busca" && isset($nmgp_orig_pesq))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['orig_pesq'] = $nmgp_orig_pesq;
   }
   if (!isset($nmgp_opcao) || empty($nmgp_opcao) || $nmgp_opcao == "grid" && (!isset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['b_sair'])))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['b_sair'] = true;
   }
   if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'grid_usuarios')
   {
       $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['sc_outra_jan'] = true;
        unset($_SESSION['scriptcase']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/grid_usuarios_erro.php");
   }
   $salva_tp_saida  = (isset($_SESSION['scriptcase']['sc_tp_saida']))  ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
   $salva_url_saida  = (isset($_SESSION['scriptcase']['sc_url_saida'][$script_case_init])) ? $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] : "";
   if (!$_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida'] && $nmgp_opcao != "formphp")
   { 
       $nm_bases_mysql    = array("mysql", "mysqlt", "maxsql", "pdo_mysql");
       $nm_bases_sqlite   = array("sqlite", "sqlite3", "pdosqlite");
       if ($nmgp_opcao == "link_res")  
       { 
           $nmgp_opcao = "inicio";  
           $Temp_parms = "";  
           $todo = explode("?@?", $nmgp_parms_where);
           foreach ($todo as $param)
           {
                $delimit = "'";
                $cadapar = explode("?#?", $param);
                if ($cadapar[0] == "fbid")  
                { 
                    $cadapar[0] = str_replace("fbid", "fbId", $cadapar[0]);
                } 
                if ($cadapar[0] == "nombrecompleto")  
                { 
                    $cadapar[0] = str_replace("nombrecompleto", "nombreCompleto", $cadapar[0]);
                } 
                if ($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['SC_Ind_Groupby'] == "sc_free_group_by")
                { 
                    $Temp_parms .= (empty($Temp_parms)) ? "" : " and ";
                    if ($cadapar[0] == "creado")
                    {
                        $Temp_parms .= $cadapar[0] . " like " . str_replace("@aspass@", $delimit, $cadapar[1]) ;
                        $Temp_parms  = substr($Temp_parms, 0, -1) . "%" . $delimit;
                    }
                    else
                    {
                        $Temp_parms .= $cadapar[0] . " = " . str_replace("@aspass@", $delimit, $cadapar[1]) ;
                    }
                } 
           }
           $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['where_resumo'] = $Temp_parms;
       } 
       if ($nmgp_opcao == "change_lang" || $nmgp_opcao == "change_lang_res" || $nmgp_opcao == "change_lang_fil" || $nmgp_opcao == "force_lang")  
       { 
           if ($nmgp_opcao == "change_lang_fil")  
           { 
               $nmgp_opcao  = "busca";  
           } 
           elseif ($nmgp_opcao == "change_lang_res")  
           { 
               $nmgp_opcao  = "resumo";  
           } 
           else 
           { 
               $nmgp_opcao  = "igual";  
           } 
           unset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['tot_geral']);
           $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['contr_total_geral'] = "NAO";
           $Temp_lang = explode(";" , $nmgp_idioma);  
           if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))  
           { 
               $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
           } 
           if (isset($Temp_lang[1]) && !empty($Temp_lang[1])) 
           { 
               $_SESSION['scriptcase']['str_conf_reg'] = $Temp_lang[1];
           } 
       } 
       if ($nmgp_opcao == "change_schema" || $nmgp_opcao == "change_schema_fil" || $nmgp_opcao == "change_schema_res")  
       { 
           if ($nmgp_opcao == "change_schema_fil")  
           { 
               $nmgp_opcao  = "busca";  
           } 
           elseif ($nmgp_opcao == "change_schema_res")  
           { 
               $nmgp_opcao  = "resumo";  
           } 
           else 
           { 
               $nmgp_opcao  = "igual";  
           } 
           $nmgp_schema = $nmgp_schema . "/" . $nmgp_schema;  
           $_SESSION['scriptcase']['str_schema_all'] = $nmgp_schema;
           $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['num_css'] = rand(0, 1000);
       } 
       if ($nmgp_opcao == "volta_grid")  
       { 
           $nmgp_opcao = "igual";  
       }   
       if (!empty($nmgp_opcao))  
       { 
           $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['opcao'] = $nmgp_opcao ;  
       }   
       if (isset($_POST["var_usuario"])) 
       {
           $_SESSION["var_usuario"] = $_POST["var_usuario"];
           nm_limpa_str_grid_usuarios($_SESSION["var_usuario"]);
       }
       if (isset($_GET["var_usuario"])) 
       {
           $_SESSION["var_usuario"] = $_GET["var_usuario"];
           nm_limpa_str_grid_usuarios($_SESSION["var_usuario"]);
       }
       if (!isset($_SESSION["var_usuario"])) 
       {
           $_SESSION["var_usuario"] = "";
       }
       if (isset($nmgp_lig_edit_lapis)) 
       {
          $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['mostra_edit'] = $nmgp_lig_edit_lapis;
           unset($GLOBALS["nmgp_lig_edit_lapis"]) ;  
           if (isset($_SESSION['nmgp_lig_edit_lapis'])) 
           {
               unset($_SESSION['nmgp_lig_edit_lapis']);
           }
       }
       if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
       {
           $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['sc_outra_jan'] = true;
       }
       $nm_saida = "";
       if (isset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['volta_redirect_apl']) && !empty($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['volta_redirect_apl']))
       {
           $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['volta_redirect_apl']; 
           $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['volta_redirect_tp']; 
           $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['volta_redirect_apl'] = "";
           $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['volta_redirect_tp'] = "";
           $nm_url_saida = "grid_usuarios_fim.php"; 
       
       }
       elseif (substr($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['opcao'] != "pdf" ) 
       {
           if (isset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['sc_outra_jan'])
           {
               if ($nmgp_url_saida == "modal")
               {
                   $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['sc_modal'] = true;
               }
               $nm_url_saida = "grid_usuarios_fim.php"; 
           }
           else
           {
               $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
               $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida);
               if (!empty($nmgp_url_saida)) 
               { 
                   $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['retorno_cons'] = $nmgp_url_saida ; 
               } 
               if (!empty($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['retorno_cons'])) 
               { 
                   $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['retorno_cons']  . "?script_case_init=" . NM_encode_input($script_case_init);  
                   $nm_apl_dependente = 1 ; 
               } 
               if (!empty($nm_url_saida)) 
               { 
                   $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida ; 
               } 
               $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida; 
               $nm_url_saida = "grid_usuarios_fim.php"; 
               $_SESSION['scriptcase']['sc_tp_saida'] = "P"; 
               if ($nm_apl_dependente == 1) 
               { 
                   $_SESSION['scriptcase']['sc_tp_saida'] = "D"; 
               } 
           } 
       }
// 
       if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && substr($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['opcao'] != "pdf" ) 
       { 
            $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['menu_desenv'] = true;   
       } 
       if (isset($_GET["nmgp_parms_ret"])) 
       {
           $todo = explode(",", $nmgp_parms_ret);
           if (isset($sc_conv_var[$todo[2]]))
           {
               $todo[2] = $sc_conv_var[$todo[2]];
           }
           elseif (isset($sc_conv_var[strtolower($todo[2])]))
           {
               $todo[2] = $sc_conv_var[strtolower($todo[2])];
           }
           $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['form_psq_ret']  = $todo[0];
           $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['campo_psq_ret'] = $todo[1];
           $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['dado_psq_ret']  = $todo[2];
           $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['js_apos_busca'] = $nm_evt_ret_busca;
           $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['opc_psq'] = true ;   
       } 
       elseif (!isset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['opc_psq']))
       {
           $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['opc_psq'] = false ;   
       } 
       if ($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida_form'])
       {
           $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['mostra_edit'] = "N";   
           $_SESSION['scriptcase']['sc_tp_saida']  = $salva_tp_saida;
           $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $salva_url_saida;
       } 
       $GLOBALS["NM_ERRO_IBASE"] = 0;  
       if (isset($_SESSION['sc_session'][$script_case_init]['grid_usuarios']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['sc_outra_jan'])
       {
           $nm_apl_dependente = 0;
       }
       $contr_grid_usuarios = new grid_usuarios_apl();

      if ('ajax_autocomp' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['opcao'] = "busca";
          $contr_grid_usuarios->NM_ajax_flag = true;
          $contr_grid_usuarios->NM_ajax_opcao = $NM_ajax_opcao;
      }
      if ('ajax_filter_save' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['opcao'] = "busca";
          $contr_grid_usuarios->NM_ajax_flag = true;
          $contr_grid_usuarios->NM_ajax_opcao = "ajax_filter_save";
      }
      if ('ajax_filter_delete' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['opcao'] = "busca";
          $contr_grid_usuarios->NM_ajax_flag = true;
          $contr_grid_usuarios->NM_ajax_opcao = "ajax_filter_delete";
      }
      if ('ajax_filter_select' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$script_case_init]['grid_usuarios']['opcao'] = "busca";
          $contr_grid_usuarios->NM_ajax_flag = true;
          $contr_grid_usuarios->NM_ajax_opcao = "ajax_filter_select";
      }
       $contr_grid_usuarios->controle();
   } 
   if (!$_SESSION['sc_session'][$script_case_init]['grid_usuarios']['embutida'] && $nmgp_opcao == "formphp")
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 0;  
       $contr_grid_usuarios = new grid_usuarios_apl();
       $contr_grid_usuarios->controle();
   } 
//
   function nm_limpa_str_grid_usuarios(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               foreach ($str as $x => $cada_str)
               {
                   $str[$x] = str_replace("@aspasd@", '"', $str[$x]);
                   $str[$x] = stripslashes($str[$x]);
               }
           }
           else
           {
               $str = str_replace("@aspasd@", '"', $str);
               $str = stripslashes($str);
           }
       }
   }
   function nm_protect_num_grid_usuarios($name, &$val)
   {
       if (empty($val))
       {
          return;
       }
       $Nm_numeric = array();
       $Nm_numeric[] = "id";
       $Nm_numeric[] = "status";
       $Nm_numeric[] = "optin";
       $Nm_numeric[] = "perfil";
       if (in_array($name, $Nm_numeric))
       {
           if (is_array($val))
           {
               foreach ($val as $cada_val)
               {
                  $tmp_pos = strpos($cada_val, "##@@");
                  if ($tmp_pos !== false)
                   {
                      $cada_val = substr($cada_val, 0, $tmp_pos);
                  }
                  for ($x = 0; $x < strlen($cada_val); $x++)
                  {
                      if (($cada_val[$x] < 0 || $cada_val[$x] > 9) && $cada_val[$x] != "."  && $cada_val[$x] != "," && $cada_val[$x] != "-")
                      {
                          $val = array();
                          return;
                      }
                   }
               }
               return;
           }
           $cada_val = $val;
           $tmp_pos = strpos($cada_val, "##@@");
           if ($tmp_pos !== false)
            {
               $cada_val = substr($cada_val, 0, $tmp_pos);
           }
           for ($x = 0; $x < strlen($cada_val); $x++)
           {
               if (($cada_val[$x] < 0 || $cada_val[$x] > 9) && $cada_val[$x] != "."  && $cada_val[$x] != "," && $cada_val[$x] != "-")
               {
                   $val = 0;
                   return;
               }
           }
       }
   }
   function grid_usuarios_pack_protect_string($sString)
   {
      $sString = (string) $sString;
      if (!empty($sString))
      {
         if (function_exists('NM_is_utf8') && NM_is_utf8($sString))
         {
             return $sString;
         }
         else
         {
             return htmlentities($sString, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         }
      }
      elseif ('0' === $sString || 0 === $sString)
      {
         return '0';
      }
      else
      {
         return '';
      }
   }
?>