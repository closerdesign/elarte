<?php
//
   if (!session_id())
   {
   include_once('form_inscritos_conferencia_session.php');
   @session_start() ;
       $tmp_useragent                           = $_SERVER['HTTP_USER_AGENT'];
       $_SESSION['scriptcase']['device_mobile'] = preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$tmp_useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($tmp_useragent,0,4));
       if ($_SESSION['scriptcase']['device_mobile'])
       {
           if (!isset($_SESSION['scriptcase']['display_mobile']))
           {
               $_SESSION['scriptcase']['display_mobile'] = true;
           }
           if ($_SESSION['scriptcase']['display_mobile'] && isset($_POST['_sc_force_mobile']) && 'out' == $_POST['_sc_force_mobile'])
           {
               $_SESSION['scriptcase']['display_mobile'] = false;
           }
           elseif (!$_SESSION['scriptcase']['display_mobile'] && isset($_POST['_sc_force_mobile']) && 'in' == $_POST['_sc_force_mobile'])
           {
               $_SESSION['scriptcase']['display_mobile'] = true;
           }
       }
       else
       {
           $_SESSION['scriptcase']['display_mobile'] = false;
       }
       if ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
       {
          include_once('form_inscritos_conferencia_mob.php');
          exit;
       }
   }
   $_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_perfil']          = "conn_mysql";
   $_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_path_doc']        = "";
//
class form_inscritos_conferencia_ini
{
   var $nm_cod_apl;
   var $nm_nome_apl;
   var $nm_seguranca;
   var $nm_grupo;
   var $nm_grupo_versao;
   var $nm_autor;
   var $nm_versao_sc;
   var $nm_tp_lic_sc;
   var $nm_dt_criacao;
   var $nm_hr_criacao;
   var $nm_autor_alt;
   var $nm_dt_ult_alt;
   var $nm_hr_ult_alt;
   var $nm_timestamp;
   var $cor_bg_table;
   var $border_grid;
   var $cor_bg_grid;
   var $cor_cab_grid;
   var $cor_borda;
   var $cor_txt_cab_grid;
   var $cab_fonte_tipo;
   var $cab_fonte_tamanho;
   var $rod_fonte_tipo;
   var $rod_fonte_tamanho;
   var $cor_rod_grid;
   var $cor_txt_rod_grid;
   var $cor_barra_nav;
   var $cor_titulo;
   var $cor_txt_titulo;
   var $titulo_fonte_tipo;
   var $titulo_fonte_tamanho;
   var $cor_grid_impar;
   var $cor_grid_par;
   var $cor_txt_grid;
   var $texto_fonte_tipo;
   var $texto_fonte_tamanho;
   var $cor_lin_grupo;
   var $cor_txt_grupo;
   var $grupo_fonte_tipo;
   var $grupo_fonte_tamanho;
   var $cor_lin_sub_tot;
   var $cor_txt_sub_tot;
   var $sub_tot_fonte_tipo;
   var $sub_tot_fonte_tamanho;
   var $cor_lin_tot;
   var $cor_txt_tot;
   var $tot_fonte_tipo;
   var $tot_fonte_tamanho;
   var $cor_link_cab;
   var $cor_link_dados;
   var $img_fun_pag;
   var $img_fun_cab;
   var $img_fun_rod;
   var $img_fun_tit;
   var $img_fun_gru;
   var $img_fun_tot;
   var $img_fun_sub;
   var $img_fun_imp;
   var $img_fun_par;
   var $root;
   var $server;
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
   var $str_schema_all;
   var $str_conf_reg;
   var $path_cep;
   var $path_secure;
   var $path_js;
   var $path_adodb;
   var $path_grafico;
   var $path_atual;
   var $Gd_missing;
   var $sc_site_ssl;
   var $link_form_inscritos_conferencia_inline;
   var $nm_cont_lin;
   var $nm_limite_lin;
   var $nm_limite_lin_prt;
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
   function init()
   {
       global
             $nm_url_saida, $nm_apl_dependente, $script_case_init;

      @ini_set('magic_quotes_runtime', 0);
      $this->sc_page = $script_case_init;
      $_SESSION['scriptcase']['sc_num_page'] = $script_case_init;
      $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
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
      $_SESSION['sc_session'][$this->sc_page]['form_inscritos_conferencia']['decimal_db'] = "."; 

      $this->nm_cod_apl      = "form_inscritos_conferencia"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "Phronesis"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_versao_sc    = "v8"; 
      $this->nm_tp_lic_sc    = "pe_mysql_bronze"; 
      $this->nm_dt_criacao   = "20150701"; 
      $this->nm_hr_criacao   = "161407"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20150701"; 
      $this->nm_hr_ult_alt   = "162426"; 
      list($NM_usec, $NM_sec) = explode(" ", microtime()); 
      $this->nm_timestamp    = (float) $NM_sec; 
      $this->nm_app_version  = "1.0.0"; 
// 
      $this->border_grid           = ""; 
      $this->cor_bg_grid           = ""; 
      $this->cor_bg_table          = ""; 
      $this->cor_borda             = ""; 
      $this->cor_cab_grid          = ""; 
      $this->cor_txt_pag           = ""; 
      $this->cor_link_pag          = ""; 
      $this->pag_fonte_tipo        = ""; 
      $this->pag_fonte_tamanho     = ""; 
      $this->cor_txt_cab_grid      = ""; 
      $this->cab_fonte_tipo        = ""; 
      $this->cab_fonte_tamanho     = ""; 
      $this->rod_fonte_tipo        = ""; 
      $this->rod_fonte_tamanho     = ""; 
      $this->cor_rod_grid          = ""; 
      $this->cor_txt_rod_grid      = ""; 
      $this->cor_barra_nav         = ""; 
      $this->cor_titulo            = ""; 
      $this->cor_txt_titulo        = ""; 
      $this->titulo_fonte_tipo     = ""; 
      $this->titulo_fonte_tamanho  = ""; 
      $this->cor_grid_impar        = ""; 
      $this->cor_grid_par          = ""; 
      $this->cor_txt_grid          = ""; 
      $this->texto_fonte_tipo      = ""; 
      $this->texto_fonte_tamanho   = ""; 
      $this->cor_lin_grupo         = ""; 
      $this->cor_txt_grupo         = ""; 
      $this->grupo_fonte_tipo      = ""; 
      $this->grupo_fonte_tamanho   = ""; 
      $this->cor_lin_sub_tot       = ""; 
      $this->cor_txt_sub_tot       = ""; 
      $this->sub_tot_fonte_tipo    = ""; 
      $this->sub_tot_fonte_tamanho = ""; 
      $this->cor_lin_tot           = ""; 
      $this->cor_txt_tot           = ""; 
      $this->tot_fonte_tipo        = ""; 
      $this->tot_fonte_tamanho     = ""; 
      $this->cor_link_cab          = ""; 
      $this->cor_link_dados        = ""; 
      $this->img_fun_pag           = ""; 
      $this->img_fun_cab           = ""; 
      $this->img_fun_rod           = ""; 
      $this->img_fun_tit           = ""; 
      $this->img_fun_gru           = ""; 
      $this->img_fun_tot           = ""; 
      $this->img_fun_sub           = ""; 
      $this->img_fun_imp           = ""; 
      $this->img_fun_par           = ""; 
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
      if(empty($_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
      //check img
      if(empty($_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_path_imagens']))
      {
              /*check img*/$_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
      }
      //check tmp
      if(empty($_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_path_imag_temp']))
      {
              /*check tmp*/$_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
      }
      //check doc
      if(empty($_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_path_doc']))
      {
              /*check doc*/$_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
      }
      //end check publication with the prod
// 
      $this->sc_site_ssl     = (isset($_SERVER['HTTP_REFERER']) && strtolower(substr($_SERVER['HTTP_REFERER'], 0, 5)) == 'https') ? true : false;
      $this->sc_protocolo    = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->sc_protocolo    = "";
      $this->path_prod       = $_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_path_prod'];
      $this->path_imagens    = $_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_path_imag_temp'];
      $this->path_doc        = $_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_path_doc'];
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
      $this->str_schema_all  = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc8_Saphir/Sc8_Saphir";
      $this->server          = (isset($_SERVER['SERVER_NAME'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
      if (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && !$this->sc_site_ssl )
      {
          $this->server         .= ":" . $_SERVER['SERVER_PORT'];
      }
      $this->server_pdf      = $this->server;
      $this->server          = "";
      $str_path_web          = $_SERVER['PHP_SELF'];
      $str_path_web          = str_replace("\\", '/', $str_path_web);
      $str_path_web          = str_replace('//', '/', $str_path_web);
      $this->root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $this->path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/form_inscritos_conferencia';
      $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
      $this->path_aplicacao .= '/';
      $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
      $this->path_help       = $this->path_link . "_lib/webhelp/";
      $this->path_lang       = "../_lib/lang/";
      $this->path_lang_js    = "../_lib/js/";
      $this->path_botoes     = $this->path_link . "_lib/img";
      $this->path_img_global = $this->path_link . "_lib/img";
      $this->path_img_modelo = $this->path_link . "_lib/img";
      $this->path_icones     = $this->path_link . "_lib/img";
      $this->path_imag_cab   = $this->path_link . "_lib/img";
      $this->path_btn        = $this->root . $this->path_link . "_lib/buttons/";
      $this->path_css        = $this->root . $this->path_link . "_lib/css/";
      $this->path_lib_php    = $this->root . $this->path_link . "_lib/lib/php/";
      $this->url_lib_js      = $this->path_link . "_lib/lib/js/";
      $this->url_lib         = $this->path_link . '/_lib/';
      $this->url_third       = $this->path_prod . '/third/';
      $this->path_cep        = $this->path_prod . "/cep";
      $this->path_cor        = $this->path_prod . "/cor";
      $this->path_js         = $this->path_prod . "/lib/js";
      $this->path_libs       = $this->root . $this->path_prod . "/lib/php";
      $this->path_third      = $this->root . $this->path_prod . "/third";
      $this->path_secure     = $this->root . $this->path_prod . "/secure";
      $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";

      global $inicial_form_inscritos_conferencia;
      if (isset($_SESSION['scriptcase']['user_logout']))
      {
          foreach ($_SESSION['scriptcase']['user_logout'] as $ind => $parms)
          {
              if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
              {
                  $nm_apl_dest = $parms['R'];
                  $dir = explode("/", $nm_apl_dest);
                  if (count($dir) == 1)
                  {
                      $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                      $nm_apl_dest = $this->path_link . SC_dir_app_name($nm_apl_dest) . "/";
                  }
                  unset($_SESSION['scriptcase']['user_logout'][$ind]);
                  if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_flag) && $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_flag)
                  {
                      $inicial_form_inscritos_conferencia->contr_->NM_ajax_info['redir']['action']  = $nm_apl_dest;
                      $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['redir']['target']  = $parms['T'];
                      $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['redir']['metodo']  = "post";
                      $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['redir']['script_case_init']  = $this->sc_page;
                      $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['redir']['script_case_session']  = session_id();
                      form_inscritos_conferencia_pack_ajax_response();
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
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1); 
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['scriptcase']['nm_sc_retorno']);
          unset($_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_conexao']);
      }
      include($this->path_lang . $this->str_lang . ".lang.php");
      include($this->path_lang . "config_region.php");
      include($this->path_lang . "lang_config_region.php");
      $_SESSION['scriptcase']['charset'] = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "UTF-8";
      ini_set('default_charset', $_SESSION['scriptcase']['charset']);
      $_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];

      asort($this->Nm_lang_conf_region);
      foreach ($this->Nm_lang_conf_region as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang_conf_region[$ind] = mb_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
      {
          $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
      }
      if (!function_exists("mb_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtmb'] . "</font></div>";exit;
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
      if (-1 != version_compare(phpversion(), '5.0.0'))
      {
         $this->path_grafico    = $this->root . $this->path_prod . "/third/jpgraph5/src";
      }
      else
      {
          $this->path_grafico    = $this->root . $this->path_prod . "/third/jpgraph4/src";
      }
      $_SESSION['sc_session'][$this->sc_page]['form_inscritos_conferencia']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      $_SESSION['scriptcase']['nm_root_cep']  = $this->root; 
      $_SESSION['scriptcase']['nm_path_cep']  = $this->path_cep; 
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
          if (!$_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['sc_outra_jan'] != 'form_inscritos_conferencia')) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $this->Nm_lang['lang_btns_back'] ?>" title="<?php echo $this->Nm_lang['lang_btns_back_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

<?php
              } 
              else 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $this->Nm_lang['lang_btns_exit'] ?>" title="<?php echo $this->Nm_lang['lang_btns_exit_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

<?php
              } 
          } 
          exit ;
      }

      $this->path_atual  = getcwd();
      $opsys = strtolower(php_uname());

      $this->link_form_inscritos_conferencia_inline = $this->sc_protocolo . $this->server . $this->path_link . "" . SC_dir_app_name('form_inscritos_conferencia') . "/form_inscritos_conferencia_inline.php";
      $this->nm_cont_lin       = 0;
      $this->nm_limite_lin     = 0;
      $this->nm_limite_lin_prt = 0;
// 
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
      if(function_exists('set_php_timezone'))  set_php_timezone('form_inscritos_conferencia'); 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->nm_data = new nm_data("es");
      global $inicial_form_inscritos_conferencia, $NM_run_iframe;
      if ((isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_flag) && $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_flag) || (isset($_SESSION['sc_session'][$this->sc_page]['form_inscritos_conferencia']['embutida_call']) && $_SESSION['sc_session'][$this->sc_page]['form_inscritos_conferencia']['embutida_call']) || $NM_run_iframe == 1)
      {
           $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      }
      perfil_lib($this->path_libs);
      if (!isset($_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil']))
      {
          if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($this->path_libs, $this->path_prod);
          $_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil'] = true;
      }
      if (function_exists("nm_check_pdf_server")) $this->server_pdf = nm_check_pdf_server($this->path_libs, $this->server_pdf);
      if (!isset($_SESSION['scriptcase']['sc_num_img']) || empty($_SESSION['scriptcase']['sc_num_img']))
      { 
          $_SESSION['scriptcase']['sc_num_img'] = 1; 
      } 
      $this->regionalDefault();
      $this->sc_tem_trans_banco = false;
      $this->nm_bases_mysql      = array("mysql", "mysqlt", "maxsql", "pdo_mysql");
      $this->nm_bases_sqlite     = array("sqlite", "sqlite3", "pdosqlite");
      $this->nm_bases_all        = array_merge($this->nm_bases_mysql, $this->nm_bases_sqlite);
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1D9FYDQBqHABYV5BqDMvmDkBOH5XCVoFGD9BiZ1FaHIveHQJsDENOVkXeHEXCHIJsD9XsZ9JeD1BeD5F7DMvmVcBUDWJeHMBiD9BsVIraD1rwV5X7HgBeHErsDWFqHIBiDcXGH9BiZ1rwHQJeHgrwV9BUH5XCVENUHQNmZ1FGHIBeD5BqHgNOVkJ3DuJeZuBOHQJKDQJsZ1vCV5FGHuNOV9FeDWXCVorqDcJUZ1BOZ1BeV5X7DENOHEJGH5FYDoBqD9XsDQB/Z1rwV5X7HuzGVIBOV5X7DoJsD9XGZSB/HArYHQJwDEBODkFeH5FYVoFGHQJKDQBOZ1rwD5JeHuNODkFCDWJeDoXGDcNwH9B/DSrYV5FUDErKZSXeH5FYDoJeD9JKDQFGD1veV5JwHuzGDkB/V5X7VoBqD9BsH9B/Z1NOV5BqDMzGHEJGDWr/VoB/D9XsH9X7D1BeD5BqHgvsV9FiV5F/VorqD9JmZ1rqHArKHQJwDEBODkFeH5FYVoFGHQJKDQJsHIrwHuB/DMBYV9BUDuX7VoraHQBiH9B/Z1vmZMFaHgNOZSJqH5F/HIFUHQJKH9BiHAveD5NUHgNKDkBOV5FYHMBiHQBiZkBiDSNOHuFGHgNOVkJqDuJeHMJsHQXODQBOZ1BYHQFaHgrwVcFeDWXKVoFGHQXOZ1FUZ1rYHQFUDMveHErCHEXCHIXGHQNmDQBOZ1BYHQXGDMvODkB/H5XKVEFGHQNwVIJwD1rwV5FGDEBeHEXeH5X/DoF7HQNmDuBqDSN7HQFaHgrwZSNiDur/HMB/HQBsZkFUZ1vOZMJeHgNKVkJ3V5B7ZuBqDcBiZ9JeZ1BYHuNUDMvOZSJqH5XCHIFUHQBiVIraZ1rYHQFGHgvsHArCDWr/HMJwHQNwDQBOD1BeD5rqHuvmVcBOH5B7VoBqHQBiZkBiDSvmD5JeHgNKZSJ3DWr/HMBOHQFYDQBOZ1BYHQrqDMrYVIB/HEX/VEraHQNwVIraZ1rYHuFUDMvCHErCV5XCHMJeHQJKZ9rqZ1BYHurqDMBYVcXKHEBmVEX7HQJmZkFUD1rwV5FGDEBeHEXeH5X/DoF7HQNmDuBqDSN7HQF7DMNODkBsDur/HINUHQNwZkFUZ1vOZMBqHgNOHErsDuJeHMFGHQXOZ9rqZ1BYHuBiDMvsV9BUH5XCVoBiDcNmZ1FUZ1rYHuJsHgBOHEJqDuXKDoXGHQXsZ9JeD1BeD5rqHuvmVcBOH5B7VoBqHQBiZkBiDSNOHQXGHgveVkJqH5FGZuBqHQJKDuBOZ1BYHQNUDMrYV9FeH5XCHIX7HQXOZ1FUZ1rYHQXGHgNOHArsDWFqHIB/HQFYZ9rqZ1zGVWJsDMBODkB/DuX7HMJsHQBqZkFUD1rwV5FGDEBeHEXeH5X/DoF7HQNmDuBqDSN7HQBODMvmZSJqDWJeHIraHQNwVIJwZ1rYHQFGHgvsVkJ3DWXCHIBOHQBiZ9rqZ1zGV5BODMvmVIB/HEFYHMXGHQXGVIraZ1rYHQFaHgNOHArCH5X/ZuJeHQJKZ9rqD1BeD5rqHuvmVcBOH5B7VoBqHQBiZkBiDSvmD5XGHgBeZSJ3V5XCHMBOHQJeDQBOZ1BYHQNUDMvOVIBsDur/HMrqHQBqZkFUZ1rYHuX7DMveHArsDurmDoXGHQXsDQBOZ1BYHuraHgvOVcB/HEFYHIJeHQXOVIJwD1rwV5FGDEBeHEXeH5X/DoF7HQNmDuBqDSN7V5FaHgvOVIBsDWFYHMXGHQBsZkFUZ1rYHuBODMvCHErCDWr/HIX7HQBiZ9JeZ1BYV5FaHgvOVcFeDWFYHIraHQXGZ1FUZ1rYHuFGHgveZSJqDWF/HIX7HQBiZ9JeD1BeD5rqHuvmVcBOH5B7VoBqHQBiZkBiDSNOHuX7HgrKHENiDuXKZuXGHQJeDQBOZ1BYHuFUDMBOVcFeDuB7VoX7HQNwZkFUZ1rYHuBqHgBYHArsDuFaHMJwHQXsDuBOZ1BYHuFUHgrwV9BUH5XCHIF7HQXOZ1FUD1rwV5FGDEBeHEXeH5X/DoF7HQNmDuBqDSvCV5BqDMrYDkBsHEX7HIBiHQJmVIJwZ1rYHuFaHgvsHErsH5F/HIrqHQXOZ9JeZ1BYHQXGDMvsV9FeDuX7HMB/DcNmZkFUZ1vOZMFaHgvsHArCDWB3ZuJeHQNwZ9rqD1BeD5rqHuvmVcBOH5B7VoBqHQBiZkBiDSNOHuBODMveHENiDurmZuB/DcXGDuBOZ1zGVWBqDMrYDkBsHEF/HIJsHQNmVIJwZ1rYHQJeHgvsVkJ3DWr/HIFGHQXODuBOZ1BYHQJsDMvmZSJqDur/HMrqHQBsVIraD1rwV5FGDEBeHEXeH5X/DoF7HQJwZ9JeDSvCD5FaHgNKVcFeHEFYDorqDcBwZ1F7Z1rYZMFaDEBOHEBUH5F/VoXGD9NwDQJsHIBeD5JwHgNKVcFeHEFYHMJsD9XOVIJwHArKD5NUDErKVkXeH5FGDoNUD9NwZSX7HIrKV5JwHuBYDkBOV5BmDoJeDcBwZ1rqDSrYD5FaDEvsHAFKDWF/DoF7DcJeDQX7Z1vCV5BiHuBYVcFCH5FqDoraDcBwZ1F7HArYV5JeDEvsHEFiDuJeVoB/D9NwZ9JeHAveV5JwHgrKZSrCDWXCVENUD9JmZ1F7HArYV5X7DMrYHEFiDWXCDoB/D9NwZ9JeHAveD5rqHuvmVcBOH5FqDoraD9BsZSFaD1rwV5JeDEBOVkXeDuXKVoBiDcJUZSX7HIBeD5BqHgvsZSJ3H5FqHMBqHQBqZSBqZ1NOHQXGHgBeHEJqHEXCHMX7HQXGDQFUHIrKHuJeDMBYVcB/DWJeHMJsHQFYZkBiHIBOZMBOHgBOHENiDWr/HMJsHQXGDQFUHAN7HuFUDMNOV9BUH5XCHIrqDcBwH9B/HIrwV5JeDMBYDkBsH5FYHIF7HQJeH9BiD1BeHQrqDMrYVcBUDWFYHIBiHQFYZkFGZ1rYHQFGHgNKHArCDuJeDoJsHQXGDuFaD1BeHurqHgrwVIBsDuX7VoBiHQFYZ1BOHABYHuX7HgNOVkJqDWFqHIFGDcJUZSX7HIBeD5BqHgvsZSJ3H5FqHMBqHQBqZSBOHANOHuFaHgNKZSJ3V5FqHMJsHQXGDQFUHABYHQBOHgrwV9BUDur/HMrqHQFYZkFGHANOHuXGHgvsVkJ3H5F/HIrqHQXGDuFaHINaV5BODMBOVcFeH5FqHIXGDcBwH9B/HIrwV5JeDMBYDkBsH5FYHIF7HQJeH9FUDSN7HQJeDMvsVcFeDuX7HMJwHQFYZkFGHABYHQJsDMveHENiHEFqHIFGHQXGDuFaHArYHuB/DMvsV9FeV5FYHMX7HQFYZ1BOD1rwHQX7HgNKZSJ3DWX7HMJwDcJUZSX7HIBeD5BqHgvsZSJ3H5FqVoFGDcBqH9BOZ1BeD5BqDMBYHEJGH5F/VoJeDcXOZ9rqZ1rwHuB/HuzGVcrsDWXCDoJeD9JmZ1B/D1rwD5NUDEvsHEFiHEFqDoB/D9XsH9FGD1BOV5JwDMBYVIBODWFYVENUHQBiZ1B/HABYV5JsDMzGHAFKV5FaZuBOHQJeDQBOZ1rwVWXGHuBYDkFCDuX7VoX7D9BsH9B/Z1BeZMB/HgvCZSJGH5FYDoF7D9NwH9X7DSBYV5JeHuBYVcFKH5FqVoB/D9XOH9B/D1zGD5FaDMrYZSXeDuFYVoXGDcJeZ9rqD1BeV5BqHgvsDkB/V5X7DoX7D9BsH9FaD1rwZMB/DMNKZSJ3HEXCZuB/DcJeDQX7Z1vCD5F7DMBOVIBOV5X7DoNUD9XOZSB/DSrYV5BODEvsHEXeDWFqZuJsD9NwZ9rqZ1BYHQXGHgvsVcBOH5FqHMJeD9BsH9B/Z1BeV5JsHgvCHEJqDWF/DoJeD9XsZ9rqZ1N7D5rqHuNODkBOH5FqVoB/D9BsZ1FGHArKV5FUDMrYZSXeV5FqHIJsHQBiZ9XGHANKV5XGDMrYV9BUDWB3VEF7HQNmVINUHIBeHQJwDEBODkFeH5FYVoFGHQJKDQBqD1BeVWBqHgrwVcBUHEFYDoF7DcJUH9B/DSrYHuXGHgveVkJ3DWB3DoXGHQJKDQJsZ1vCV5FGHuNOV9FeDWXCHINUD9BiZ1B/HABYV5FUDMrYHErCH5X/DoNUHQFYH9X7Z1rwD5JsHuzGVIBOHEFYDoF7D9BiZ1B/HArYZMJwHgBeHEFiV5B3DoF7D9XsDuFaHANKVWBODMrwZSNiDWB3VEB/";
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
          if (!$_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['sc_outra_jan']) || $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['sc_outra_jan'] != 'form_inscritos_conferencia')) 
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
   }
   function prep_conect()
   {
      $con_devel             =  (isset($_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_conexao']) && $_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_perfil']) && $_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['form_inscritos_conferencia']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['form_inscritos_conferencia']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      if (isset($_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_conexao']))
      {
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'Phronesis', 2); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = "";
          carrega_perfil($perfil_trab, $this->path_libs, "S");
          if (empty($_SESSION['scriptcase']['glo_senha_protect']))
          {
              $nm_crit_perfil = true;
          }
      }
      else
      {
          $perfil_trab = $con_devel;
      }
// 
      if (isset($_SESSION['scriptcase']['glo_decimal_db']) && !empty($_SESSION['scriptcase']['glo_decimal_db']))
      {
         $_SESSION['sc_session'][$this->sc_page]['form_inscritos_conferencia']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
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
      if (isset($_SESSION['scriptcase']['glo_db2_autocommit']))
      {
          $this->nm_con_db2['db2_autocommit'] = $_SESSION['scriptcase']['glo_db2_autocommit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_database_encoding']))
      {
          $this->nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_lib']))
      {
          $this->nm_con_db2['db2_i5_lib'] = $_SESSION['scriptcase']['glo_db2_i5_lib']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_naming']))
      {
          $this->nm_con_db2['db2_i5_naming'] = $_SESSION['scriptcase']['glo_db2_i5_naming']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_commit']))
      {
          $this->nm_con_db2['db2_i5_commit'] = $_SESSION['scriptcase']['glo_db2_i5_commit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_query_optimize']))
      {
          $this->nm_con_db2['db2_i5_query_optimize'] = $_SESSION['scriptcase']['glo_db2_i5_query_optimize']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_persistent']))
      {
          $this->nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_schema']))
      {
          $this->nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
      }
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = "inscritos_conferencia"; 
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
          if (!$_SESSION['sc_session'][$this->sc_page]['form_inscritos_conferencia']['iframe_menu'] && (!isset($_SESSION['sc_session'][$this->sc_page]['form_inscritos_conferencia']['sc_outra_jan']) || $_SESSION['sc_session'][$this->sc_page]['form_inscritos_conferencia']['sc_outra_jan'] != 'form_inscritos_conferencia')) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $this->Nm_lang['lang_btns_back'] ?>" title="<?php echo $this->Nm_lang['lang_btns_back_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

<?php
              } 
              else 
              { 
?>
                  <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $this->Nm_lang['lang_btns_exit'] ?>" title="<?php echo $this->Nm_lang['lang_btns_exit_hint'] ?>" style="<?php echo $sCondStyle; ?>vertical-align: middle;display: ''">

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
// 
  function conectDB()
  {
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['form_inscritos_conferencia']['glo_nm_conexao'], $this->root . $this->path_prod, 'Phronesis'); 
      } 
      else 
      { 
         if (!isset($this->nm_con_persistente))
         {
            $this->nm_con_persistente = 'N';
         }
         if (!isset($this->nm_con_db2))
         {
            $this->nm_con_db2 = '';
         }
         if (!isset($this->nm_database_encoding))
         {
            $this->nm_database_encoding = '';
         }
         $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $this->nm_database_encoding); 
      } 
  }
// 

   function regionalDefault($sConfReg = '')
   {
      if ('' == $sConfReg)
      {
         $sConfReg = $this->str_conf_reg;
      }

      $_SESSION['scriptcase']['reg_conf']['date_format']           = (isset($this->Nm_conf_reg[$sConfReg]['data_format']))              ?  $this->Nm_conf_reg[$sConfReg]['data_format']                  : "ddmmyyyy";
      $_SESSION['scriptcase']['reg_conf']['date_sep']              = (isset($this->Nm_conf_reg[$sConfReg]['data_sep']))                 ?  $this->Nm_conf_reg[$sConfReg]['data_sep']                     : "/";
      $_SESSION['scriptcase']['reg_conf']['date_week_ini']         = (isset($this->Nm_conf_reg[$sConfReg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$sConfReg]['prim_dia_sema']                : "SU";
      $_SESSION['scriptcase']['reg_conf']['time_format']           = (isset($this->Nm_conf_reg[$sConfReg]['hora_format']))              ?  $this->Nm_conf_reg[$sConfReg]['hora_format']                  : "hhiiss";
      $_SESSION['scriptcase']['reg_conf']['time_sep']              = (isset($this->Nm_conf_reg[$sConfReg]['hora_sep']))                 ?  $this->Nm_conf_reg[$sConfReg]['hora_sep']                     : ":";
      $_SESSION['scriptcase']['reg_conf']['time_pos_ampm']         = (isset($this->Nm_conf_reg[$sConfReg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$sConfReg]['hora_pos_ampm']                : "right_without_space";
      $_SESSION['scriptcase']['reg_conf']['time_simb_am']          = (isset($this->Nm_conf_reg[$sConfReg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$sConfReg]['hora_simbolo_am']              : "am";
      $_SESSION['scriptcase']['reg_conf']['time_simb_pm']          = (isset($this->Nm_conf_reg[$sConfReg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$sConfReg]['hora_simbolo_pm']              : "pm";
      $_SESSION['scriptcase']['reg_conf']['simb_neg']              = (isset($this->Nm_conf_reg[$sConfReg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$sConfReg]['num_sinal_neg']                : "-";
      $_SESSION['scriptcase']['reg_conf']['grup_num']              = (isset($this->Nm_conf_reg[$sConfReg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$sConfReg]['num_sep_agr']                  : ".";
      $_SESSION['scriptcase']['reg_conf']['dec_num']               = (isset($this->Nm_conf_reg[$sConfReg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$sConfReg]['num_sep_dec']                  : ",";
      $_SESSION['scriptcase']['reg_conf']['neg_num']               = (isset($this->Nm_conf_reg[$sConfReg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$sConfReg]['num_format_num_neg']           : 2;
      $_SESSION['scriptcase']['reg_conf']['monet_simb']            = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_simbolo']            : "$";
      $_SESSION['scriptcase']['reg_conf']['monet_f_pos']           = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_pos']     : 3;
      $_SESSION['scriptcase']['reg_conf']['monet_f_neg']           = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_format_num_neg']     : 13;
      $_SESSION['scriptcase']['reg_conf']['grup_val']              = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_sep_agr']            : ".";
      $_SESSION['scriptcase']['reg_conf']['dec_val']               = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_sep_dec']            : ",";
      $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$sConfReg]['num_group_digit']))          ?  $this->Nm_conf_reg[$sConfReg]['num_group_digit']              : "1";
      $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$sConfReg]['unid_mont_group_digit']))    ?  $this->Nm_conf_reg[$sConfReg]['unid_mont_group_digit']        : "1";
      $_SESSION['scriptcase']['reg_conf']['html_dir']              = (isset($this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl'] . "'" : "";
      $_SESSION['scriptcase']['reg_conf']['css_dir']               = (isset($this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$sConfReg]['ger_ltr_rtl'] : "LTR";
      if ('' == $_SESSION['scriptcase']['reg_conf']['num_group_digit'])
      {
          $_SESSION['scriptcase']['reg_conf']['num_group_digit'] = '1';
      }
      if ('' == $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'])
      {
          $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = '1';
      }
   }
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
}
//===============================================================================
class form_inscritos_conferencia_edit
{
    var $contr_form_inscritos_conferencia;
    function inicializa()
    {
        global $nm_opc_lookup, $nm_opc_php, $script_case_init;
        require_once("form_inscritos_conferencia_apl.php");
        $this->contr_form_inscritos_conferencia = new form_inscritos_conferencia_apl();
    }
}
if (!function_exists("NM_is_utf8"))
{
    include_once("form_inscritos_conferencia_nmutf8.php");
}
ob_start();
//
//----------------  
//
    $_SESSION['scriptcase']['form_inscritos_conferencia']['contr_erro'] = 'off';
    if (!function_exists("NM_is_utf8"))
    {
        include_once("form_inscritos_conferencia_nmutf8.php");
    }
    if (!function_exists("SC_dir_app_ini"))
    {
        include_once("../_lib/lib/php/nm_ctrl_app_name.php");
    }
    SC_dir_app_ini('Phronesis');
    $sc_conv_var = array();
    if (!empty($_FILES))
    {
        foreach ($_FILES as $nmgp_campo => $nmgp_valores)
        {
             if (isset($sc_conv_var[$nmgp_campo]))
             {
                 $nmgp_campo = $sc_conv_var[$nmgp_campo];
             }
             elseif (isset($sc_conv_var[strtolower($nmgp_campo)]))
             {
                 $nmgp_campo = $sc_conv_var[strtolower($nmgp_campo)];
             }
             $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
             $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
             $$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
             $$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
             $$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
        }
    }
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
             nm_limpa_str_form_inscritos_conferencia($nmgp_val);
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
             nm_limpa_str_form_inscritos_conferencia($nmgp_val);
             $$nmgp_var = $nmgp_val;
        }
    }
    if (isset($SC_where_pdf) && !empty($SC_where_pdf))
    {
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['where_filter'] = $SC_where_pdf;
    }

    if (isset($_POST['rs']) && !is_array($_POST['rs']) && 'ajax_' == substr($_POST['rs'], 0, 5) && isset($_POST['rsargs']) && !empty($_POST['rsargs']))
    {
        if ('ajax_form_inscritos_conferencia_validate_usuario_id' == $_POST['rs'])
        {
            $usuario_id = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_inscritos_conferencia_validate_estado_inscripcion' == $_POST['rs'])
        {
            $estado_inscripcion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_inscritos_conferencia_validate_metodo_pago' == $_POST['rs'])
        {
            $metodo_pago = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_inscritos_conferencia_validate_transaction_id' == $_POST['rs'])
        {
            $transaction_id = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_inscritos_conferencia_validate_valor_inscripcion' == $_POST['rs'])
        {
            $valor_inscripcion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
        }
        if ('ajax_form_inscritos_conferencia_submit_form' == $_POST['rs'])
        {
            $usuario_id = NM_utf8_urldecode($_POST['rsargs'][0]);
            $estado_inscripcion = NM_utf8_urldecode($_POST['rsargs'][1]);
            $metodo_pago = NM_utf8_urldecode($_POST['rsargs'][2]);
            $transaction_id = NM_utf8_urldecode($_POST['rsargs'][3]);
            $valor_inscripcion = NM_utf8_urldecode($_POST['rsargs'][4]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][5]);
            $nmgp_url_saida = NM_utf8_urldecode($_POST['rsargs'][6]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][7]);
            $nmgp_ancora = NM_utf8_urldecode($_POST['rsargs'][8]);
            $nmgp_num_form = NM_utf8_urldecode($_POST['rsargs'][9]);
            $nmgp_parms = NM_utf8_urldecode($_POST['rsargs'][10]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][11]);
        }
        if ('ajax_form_inscritos_conferencia_navigate_form' == $_POST['rs'])
        {
            $id_inscripcion = NM_utf8_urldecode($_POST['rsargs'][0]);
            $nm_form_submit = NM_utf8_urldecode($_POST['rsargs'][1]);
            $nmgp_opcao = NM_utf8_urldecode($_POST['rsargs'][2]);
            $nmgp_ordem = NM_utf8_urldecode($_POST['rsargs'][3]);
            $nmgp_fast_search = NM_utf8_urldecode($_POST['rsargs'][4]);
            $nmgp_cond_fast_search = NM_utf8_urldecode($_POST['rsargs'][5]);
            $nmgp_arg_fast_search = NM_utf8_urldecode($_POST['rsargs'][6]);
            $nmgp_arg_dyn_search = NM_utf8_urldecode($_POST['rsargs'][7]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][8]);
        }
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
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['lig_edit_lookup']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['lig_edit_lookup']     = false;
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['lig_edit_lookup_cb']  = '';
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['lig_edit_lookup_row'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_call']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_call'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_proc']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_proc'] = false;
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_liga_form_insert']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_liga_form_insert'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_liga_form_update']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_liga_form_update'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_liga_form_delete']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_liga_form_delete'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_liga_form_btn_nav']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_liga_form_btn_nav'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_liga_grid_edit']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_liga_grid_edit'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_liga_grid_edit_link']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_liga_grid_edit_link'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_liga_qtd_reg']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_liga_qtd_reg'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_liga_tp_pag']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_liga_tp_pag'] = '';
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && !isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['run_modal']))
    { 
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['run_modal'] = isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'];
    } 
    if (isset($script_case_init) && !is_array($script_case_init) && $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_proc'])
    {
        return;
    }
    if (isset($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_parms']))
    { 
        $tmp_nmgp_parms = '';
        if (isset($nmgp_parms) && '' != $nmgp_parms)
        {
            $tmp_nmgp_parms = $nmgp_parms . '?@?';
        }
        $nmgp_parms = $tmp_nmgp_parms . $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_parms'];
        unset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_parms']);
    } 
    if (isset($nmgp_parms) && !empty($nmgp_parms) && !is_array($nmgp_parms)) 
    { 
        if (isset($_SESSION['nm_aba_bg_color'])) 
        { 
            unset($_SESSION['nm_aba_bg_color']);
        }   
        $nmgp_parms = NM_decode_input($nmgp_parms);
        $nmgp_parms = str_replace("@aspass@", "'", $nmgp_parms);
        $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
        $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
        $todo = explode("?@?", $nmgp_parms);
        $ix = 0;
        while (!empty($todo[$ix]))
        {
           $cadapar = explode("?#?", $todo[$ix]);
           if (1 < sizeof($cadapar))
           {
               nm_limpa_str_form_inscritos_conferencia($cadapar[1]);
               if (isset($sc_conv_var[$cadapar[0]]))
               {
                   $cadapar[0] = $sc_conv_var[$cadapar[0]];
               }
               elseif (isset($sc_conv_var[strtolower($cadapar[0])]))
               {
                   $cadapar[0] = $sc_conv_var[strtolower($cadapar[0])];
               }
               $$cadapar[0] = $cadapar[1];
           }
           $ix++;
        }
    } 
    elseif (isset($script_case_init) && !empty($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['parms']))
    {
        if (!isset($nmgp_opcao) || ($nmgp_opcao != "incluir" && $nmgp_opcao != "novo" && $nmgp_opcao != "recarga" && $nmgp_opcao != "muda_form"))
        {
            $todo = explode("?@?", $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['parms']);
            $ix = 0;
            while (!empty($todo[$ix]))
            {
               $cadapar = explode("?#?", $todo[$ix]);
               $$cadapar[0] = $cadapar[1];
               $ix++;
            }
        }
    } 
    if (isset($script_case_init) && $script_case_init != preg_replace('/[^0-9.]/', '', $script_case_init))
    {
        unset($script_case_init);
    }
    if (!isset($script_case_init) || empty($script_case_init) || is_array($script_case_init))
    {
        $script_case_init = rand(2, 10000);
    }
    $salva_run = "N";
    $salva_iframe = false;
    if (isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['iframe_menu']))
    {
        $salva_iframe = $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['iframe_menu'];
        unset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['iframe_menu']);
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['run_iframe']))
    {
        $salva_run = $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['run_iframe'];
        unset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['run_iframe']);
    }
    if (isset($nm_run_menu) && $nm_run_menu == 1)
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
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "form_inscritos_conferencia";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'form_inscritos_conferencia' || $achou)
                {
                    unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                    if (!empty($_SESSION['sc_session'][$script_case_init][$nome_apl]))
                    {
                        $achou = true;
                    }
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
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['iframe_menu']  = true;
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['mostra_cab']   = "S";
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['run_iframe']   = "N";
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['retorno_edit'] = "";
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['run_iframe']  = $salva_run;
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['iframe_menu'] = $salva_iframe;
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['db_changed']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['db_changed'] = false;
    }
    if (isset($_GET['nmgp_outra_jan']) && 'true' == $_GET['nmgp_outra_jan'] && isset($_GET['nmgp_url_saida']) && 'modal' == $_GET['nmgp_url_saida'])
    {
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['db_changed'] = false;
    }

    if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'form_inscritos_conferencia')
    {
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['sc_outra_jan'] = true;
         unset($_SESSION['scriptcase']['sc_outra_jan']);
    }
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        if (isset($nmgp_url_saida) && $nmgp_url_saida == "modal")
        {
            $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['sc_modal'] = true;
            $nm_url_saida = "form_inscritos_conferencia_fim.php"; 
        }
        $nm_apl_dependente = 0;
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['sc_outra_jan'] = true;
    }

    if (!isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['initialize']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['initialize'] = true;
    }
    elseif (!isset($_SERVER['HTTP_REFERER']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['initialize'] = false;
    }
    elseif (false === strpos($_SERVER['HTTP_REFERER'], '/form_inscritos_conferencia/'))
    {
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['initialize'] = true;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['initialize'] = false;
    }

    if (isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['first_time']))
    {
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['first_time'] = false;
    }
    else
    {
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['first_time'] = true;
    }

    $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['menu_desenv'] = false;   
    if (!defined("SC_ERROR_HANDLER"))
    {
        define("SC_ERROR_HANDLER", 1);
    }
    include_once(dirname(__FILE__) . "/form_inscritos_conferencia_erro.php");
    $nm_browser = strpos($_SERVER['HTTP_USER_AGENT'], "Konqueror") ;
    if (is_int($nm_browser))   
    {
        $nm_browser = "Konqueror"; 
    } 
    else  
    {
        $nm_browser = strpos($_SERVER['HTTP_USER_AGENT'], "Opera") ;
        if (is_int($nm_browser))   
        {
            $nm_browser = "Opera"; 
        }
    } 
    $_SESSION['scriptcase']['change_regional_old'] = '';
    $_SESSION['scriptcase']['change_regional_new'] = '';
    if (!empty($nmgp_opcao) && ($nmgp_opcao == "change_lang_t" || $nmgp_opcao == "change_lang_b" || $nmgp_opcao == "change_lang_f" || $nmgp_opcao == "force_lang"))  
    {
        $Temp_lang = $nmgp_opcao == "force_lang" ? explode(";" , $nmgp_idioma) : explode(";" , $nmgp_idioma_novo);  
        if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))  
        { 
            $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
        } 
        if (isset($Temp_lang[1]) && !empty($Temp_lang[1])) 
        { 
            $_SESSION['scriptcase']['change_regional_old'] = (isset($_SESSION['scriptcase']['str_conf_reg']) && !empty($_SESSION['scriptcase']['str_conf_reg'])) ? $_SESSION['scriptcase']['str_conf_reg'] : "es_co";
            $_SESSION['scriptcase']['str_conf_reg']        = $Temp_lang[1];
            $_SESSION['scriptcase']['change_regional_new'] = $_SESSION['scriptcase']['str_conf_reg'];
        } 
        $nmgp_opcao = $nmgp_opcao == "force_lang" ? "inicio" : "igual";
    } 
    if (!empty($nmgp_opcao) && ($nmgp_opcao == "change_schema_t" || $nmgp_opcao == "change_schema_b" || $nmgp_opcao == "change_schema_f"))  
    {
        if ($nmgp_opcao == "change_schema_t")  
        {
            $nmgp_schema = $nmgp_schema_t . "/" . $nmgp_schema_t;  
        } 
        elseif ($nmgp_opcao == "change_schema_b")  
        {
            $nmgp_schema = $nmgp_schema_b . "/" . $nmgp_schema_b;  
        } 
        else 
        {
            $nmgp_schema = $nmgp_schema_f . "/" . $nmgp_schema_f;  
        } 
        $_SESSION['scriptcase']['str_schema_all'] = $nmgp_schema;
        $nmgp_opcao = "recarga";  
    } 
    if (!empty($nmgp_opcao) && $nmgp_opcao == "lookup")  
    {
        $nm_opc_lookup = $nmgp_opcao;
    }
    elseif (!empty($nmgp_opcao) && $nmgp_opcao == "formphp")  
    {
        $nm_opc_form_php = $nmgp_opcao;
    }
    else
    {
        if (!empty($nmgp_opcao))  
        {
            $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['opcao'] = $nmgp_opcao ; 
        }
        if (!empty($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['volta_redirect_apl']))
        {
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['volta_redirect_apl']; 
            $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['volta_redirect_tp']; 
            $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['volta_redirect_apl'] = "";
            $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['volta_redirect_tp'] = "";
            $nm_url_saida = "form_inscritos_conferencia_fim.php"; 
        }
        elseif (isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['sc_outra_jan'] == 'true')
        {
               $nm_url_saida = "form_inscritos_conferencia_fim.php"; 
        }
        elseif ($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['run_iframe'] != "R")
        {
           $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
           $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida); 
            $nm_saida_global = $nm_url_saida;
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['retorno_edit'] = $nmgp_url_saida ; 
            } 
            if (!empty($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['retorno_edit'])) 
            {
                $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['retorno_edit'] . "?script_case_init=" . $script_case_init . "&script_case_session=" . session_id();  
                $nm_apl_dependente = 1 ; 
                $nm_saida_global = $nm_url_saida;
            } 
            if ($nm_apl_dependente != 1) 
            { 
                $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['run_iframe'] = "N"; 
            } 
            if ($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['run_iframe'] != "R" && (!isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_call']) || !$_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['embutida_call']))
            { 
                $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida; 
                $nm_url_saida = "form_inscritos_conferencia_fim.php"; 
                $_SESSION['scriptcase']['sc_tp_saida'] = "P"; 
                if ($nm_apl_dependente == 1) 
                { 
                    $_SESSION['scriptcase']['sc_tp_saida'] = "D"; 
                } 
            } 
        }
        if (empty($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['volta_tp']) && $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['run_iframe'] != "R")
        {
            $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['volta_php'] = $nm_url_saida;
            $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['volta_apl'] = $nm_saida_global;
            $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['volta_ss']  = (isset($_SESSION['scriptcase']['sc_url_saida'][$script_case_init])) ? $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] : "";
            $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['volta_dep'] = $nm_apl_dependente;
            $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['volta_tp']  = (isset($_SESSION['scriptcase']['sc_tp_saida'])) ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
        }
        $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['volta_php'];
        $nm_saida_global = $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['volta_php'];
        $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['volta_dep'];
        if ($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['run_iframe'] != "R" && !empty($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['volta_ss'])) 
        { 
            $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['volta_ss'];
            $_SESSION['scriptcase']['sc_tp_saida']  = $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['volta_tp'];
        } 
        if ($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['run_iframe'] == "F" || $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['run_iframe'] == "R") 
        { 
            if (!empty($nmgp_url_saida) && empty($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['retorno_edit'])) 
            {
                $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['retorno_edit'] = $nmgp_url_saida . "?script_case_init=" . $script_case_init . "&script_case_session=" . session_id(); 
            } 
        } 
        if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['run_iframe'] != "F" && $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['run_iframe'] != "R") 
        { 
            $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['menu_desenv'] = true;   
        } 
    }
    if (isset($nmgp_redir)) 
    { 
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['redir'] = $nmgp_redir;   
    } 
    if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
    {
        $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['sc_outra_jan'] = true;
         if ($nmgp_url_saida == "modal")
         {
             $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['sc_modal'] = true;
             $nm_url_saida = "form_inscritos_conferencia_fim.php"; 
         }
    }
    if (isset($_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['form_inscritos_conferencia']['sc_outra_jan'])
    {
        $nm_apl_dependente = 0;
    }
    $GLOBALS["NM_ERRO_IBASE"] = 0;  
    $inicial_form_inscritos_conferencia = new form_inscritos_conferencia_edit();
    $inicial_form_inscritos_conferencia->inicializa();

    $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['select_html'] = array();
    $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['select_html']['usuario_id'] = "class=\"sc-js-input scFormObjectOdd\" style=\";\" id=\"id_sc_field_usuario_id\" name=\"usuario_id\" size=\"1\" alt=\"{type: 'select', enterTab: false}\"";
    $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['select_html']['estado_inscripcion'] = "class=\"sc-js-input scFormObjectOdd\" style=\";\" id=\"id_sc_field_estado_inscripcion\" name=\"estado_inscripcion\" size=\"1\" alt=\"{type: \'select\', enterTab: false}\"";
    $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['select_html']['metodo_pago'] = "class=\"sc-js-input scFormObjectOdd\" style=\";\" id=\"id_sc_field_metodo_pago\" name=\"metodo_pago\" size=\"1\" alt=\"{type: \'select\', enterTab: false}\"";

    if (!defined('SC_SAJAX_LOADED'))
    {
        include_once(dirname(__FILE__) . '/form_inscritos_conferencia_sajax.php');
        define('SC_SAJAX_LOADED', 'YES');
    }
    if (!class_exists('Services_JSON'))
    {
        include_once(dirname(__FILE__) . '/form_inscritos_conferencia_json.php');
    }
    $sajax_request_type = "POST";
    sajax_init();
    //$sajax_debug_mode = 1;
    sajax_export("ajax_form_inscritos_conferencia_validate_usuario_id");
    sajax_export("ajax_form_inscritos_conferencia_validate_estado_inscripcion");
    sajax_export("ajax_form_inscritos_conferencia_validate_metodo_pago");
    sajax_export("ajax_form_inscritos_conferencia_validate_transaction_id");
    sajax_export("ajax_form_inscritos_conferencia_validate_valor_inscripcion");
    sajax_export("ajax_form_inscritos_conferencia_submit_form");
    sajax_export("ajax_form_inscritos_conferencia_navigate_form");
    sajax_handle_client_request();

    $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->controle();
//
    function nm_limpa_str_form_inscritos_conferencia(&$str)
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

    function ajax_form_inscritos_conferencia_validate_usuario_id($usuario_id, $script_case_init)
    {
        global $inicial_form_inscritos_conferencia;
        //register_shutdown_function("form_inscritos_conferencia_pack_ajax_response");
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_flag          = true;
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_opcao         = 'validate_usuario_id';
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['param'] = array(
                  'usuario_id' => NM_utf8_urldecode($usuario_id),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->controle();
        exit;
    } // ajax_validate_usuario_id

    function ajax_form_inscritos_conferencia_validate_estado_inscripcion($estado_inscripcion, $script_case_init)
    {
        global $inicial_form_inscritos_conferencia;
        //register_shutdown_function("form_inscritos_conferencia_pack_ajax_response");
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_flag          = true;
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_opcao         = 'validate_estado_inscripcion';
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['param'] = array(
                  'estado_inscripcion' => NM_utf8_urldecode($estado_inscripcion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->controle();
        exit;
    } // ajax_validate_estado_inscripcion

    function ajax_form_inscritos_conferencia_validate_metodo_pago($metodo_pago, $script_case_init)
    {
        global $inicial_form_inscritos_conferencia;
        //register_shutdown_function("form_inscritos_conferencia_pack_ajax_response");
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_flag          = true;
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_opcao         = 'validate_metodo_pago';
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['param'] = array(
                  'metodo_pago' => NM_utf8_urldecode($metodo_pago),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->controle();
        exit;
    } // ajax_validate_metodo_pago

    function ajax_form_inscritos_conferencia_validate_transaction_id($transaction_id, $script_case_init)
    {
        global $inicial_form_inscritos_conferencia;
        //register_shutdown_function("form_inscritos_conferencia_pack_ajax_response");
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_flag          = true;
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_opcao         = 'validate_transaction_id';
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['param'] = array(
                  'transaction_id' => NM_utf8_urldecode($transaction_id),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->controle();
        exit;
    } // ajax_validate_transaction_id

    function ajax_form_inscritos_conferencia_validate_valor_inscripcion($valor_inscripcion, $script_case_init)
    {
        global $inicial_form_inscritos_conferencia;
        //register_shutdown_function("form_inscritos_conferencia_pack_ajax_response");
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_flag          = true;
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_opcao         = 'validate_valor_inscripcion';
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['param'] = array(
                  'valor_inscripcion' => NM_utf8_urldecode($valor_inscripcion),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->controle();
        exit;
    } // ajax_validate_valor_inscripcion

    function ajax_form_inscritos_conferencia_submit_form($usuario_id, $estado_inscripcion, $metodo_pago, $transaction_id, $valor_inscripcion, $nm_form_submit, $nmgp_url_saida, $nmgp_opcao, $nmgp_ancora, $nmgp_num_form, $nmgp_parms, $script_case_init)
    {
        global $inicial_form_inscritos_conferencia;
        //register_shutdown_function("form_inscritos_conferencia_pack_ajax_response");
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_flag          = true;
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_opcao         = 'submit_form';
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['param'] = array(
                  'usuario_id' => NM_utf8_urldecode($usuario_id),
                  'estado_inscripcion' => NM_utf8_urldecode($estado_inscripcion),
                  'metodo_pago' => NM_utf8_urldecode($metodo_pago),
                  'transaction_id' => NM_utf8_urldecode($transaction_id),
                  'valor_inscripcion' => NM_utf8_urldecode($valor_inscripcion),
                  'nm_form_submit' => NM_utf8_urldecode($nm_form_submit),
                  'nmgp_url_saida' => NM_utf8_urldecode($nmgp_url_saida),
                  'nmgp_opcao' => NM_utf8_urldecode($nmgp_opcao),
                  'nmgp_ancora' => NM_utf8_urldecode($nmgp_ancora),
                  'nmgp_num_form' => NM_utf8_urldecode($nmgp_num_form),
                  'nmgp_parms' => NM_utf8_urldecode($nmgp_parms),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->controle();
        exit;
    } // ajax_submit_form

    function ajax_form_inscritos_conferencia_navigate_form($id_inscripcion, $nm_form_submit, $nmgp_opcao, $nmgp_ordem, $nmgp_fast_search, $nmgp_cond_fast_search, $nmgp_arg_fast_search, $nmgp_arg_dyn_search, $script_case_init)
    {
        global $inicial_form_inscritos_conferencia;
        //register_shutdown_function("form_inscritos_conferencia_pack_ajax_response");
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_flag          = true;
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_opcao         = 'navigate_form';
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['param'] = array(
                  'id_inscripcion' => NM_utf8_urldecode($id_inscripcion),
                  'nm_form_submit' => NM_utf8_urldecode($nm_form_submit),
                  'nmgp_opcao' => NM_utf8_urldecode($nmgp_opcao),
                  'nmgp_ordem' => NM_utf8_urldecode($nmgp_ordem),
                  'nmgp_fast_search' => NM_utf8_urldecode($nmgp_fast_search),
                  'nmgp_cond_fast_search' => NM_utf8_urldecode($nmgp_cond_fast_search),
                  'nmgp_arg_fast_search' => NM_utf8_urldecode($nmgp_arg_fast_search),
                  'nmgp_arg_dyn_search' => NM_utf8_urldecode($nmgp_arg_dyn_search),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'buffer_output' => true,
                 );
        if ($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['param']['buffer_output'])
        {
            ob_start();
        }
        $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->controle();
        exit;
    } // ajax_navigate_form


   function form_inscritos_conferencia_pack_ajax_response()
   {
      global $inicial_form_inscritos_conferencia;
      $aResp = array();

      if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['empty_filter']))
      {
          $aResp['empty_filter'] = $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['empty_filter'];
      }
      if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['dyn_search']['NM_Dynamic_Search']))
      {
          $aResp['dyn_search']['NM_Dynamic_Search'] = $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['dyn_search']['NM_Dynamic_Search'];
      }
      if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str']))
      {
          $aResp['dyn_search']['id_dyn_search_cmd_str'] = $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['dyn_search']['id_dyn_search_cmd_str'];
      }
      if ($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['calendarReload'])
      {
         $aResp['result'] = 'CALENDARRELOAD';
      }
      elseif ('' != $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['autoComp'])
      {
         $aResp['result'] = 'AUTOCOMP';
      }
//mestre_detalhe
      elseif (!empty($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['newline']))
      {
         $aResp['result'] = 'NEWLINE';
         ob_end_clean();
      }
      elseif (!empty($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['tableRefresh']))
      {
         $aResp['result'] = 'TABLEREFRESH';
      }
//-----
      elseif (!empty($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['errList']))
      {
         $aResp['result'] = 'ERROR';
      }
      elseif (!empty($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['fldList']))
      {
         $aResp['result'] = 'SET';
      }
      else
      {
         $aResp['result'] = 'OK';
      }
      if ('AUTOCOMP' == $aResp['result'])
      {
         $aResp = $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['autoComp'];
      }
//mestre_detalhe
      elseif ('NEWLINE' == $aResp['result'])
      {
         $aResp = $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['newline'];
      }
      else
//-----
      {
         $aResp['ajaxRequest'] = $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_opcao;
         if ('CALENDARRELOAD' == $aResp['result'])
         {
            form_inscritos_conferencia_pack_calendar_reload($aResp);
         }
         elseif ('ERROR' == $aResp['result'])
         {
            form_inscritos_conferencia_pack_ajax_errors($aResp);
         }
         elseif ('SET' == $aResp['result'])
         {
            form_inscritos_conferencia_pack_ajax_set_fields($aResp);
         }
         elseif ('TABLEREFRESH' == $aResp['result'])
         {
            form_inscritos_conferencia_pack_ajax_set_fields($aResp);
            $aResp['tableRefresh'] = form_inscritos_conferencia_pack_protect_string($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['tableRefresh']);
         }
         if ('OK' == $aResp['result'] || 'SET' == $aResp['result'])
         {
            form_inscritos_conferencia_pack_ajax_ok($aResp);
         }
         if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['focus']) && '' != $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['focus'])
         {
            $aResp['setFocus'] = $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['focus'];
         }
         if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['closeLine']) && '' != $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['closeLine'])
         {
            $aResp['closeLine'] = $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['closeLine'];
         }
         else
         {
            $aResp['closeLine'] = 'N';
         }
         if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['clearUpload']) && '' != $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['clearUpload'])
         {
            $aResp['clearUpload'] = $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['clearUpload'];
         }
         else
         {
            $aResp['clearUpload'] = 'N';
         }
         if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['masterValue']) && '' != $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['masterValue'])
         {
            form_inscritos_conferencia_pack_master_value($aResp);
         }
         if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxAlert']) && '' != $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxAlert'])
         {
            form_inscritos_conferencia_pack_ajax_alert($aResp);
         }
         if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']) && '' != $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage'])
         {
            form_inscritos_conferencia_pack_ajax_message($aResp);
         }
         if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxJavascript']) && '' != $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxJavascript'])
         {
            form_inscritos_conferencia_pack_ajax_javascript($aResp);
         }
         if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['redir']) && !empty($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['redir']))
         {
            form_inscritos_conferencia_pack_ajax_redir($aResp);
         }
         if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['redirExit']) && !empty($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['redirExit']))
         {
            form_inscritos_conferencia_pack_ajax_redir_exit($aResp);
         }
         if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['blockDisplay']) && !empty($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['blockDisplay']))
         {
            form_inscritos_conferencia_pack_ajax_block_display($aResp);
         }
         if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['fieldDisplay']) && !empty($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['fieldDisplay']))
         {
            form_inscritos_conferencia_pack_ajax_field_display($aResp);
         }
         if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['buttonDisplay']) && !empty($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['buttonDisplay']))
         {
            $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['buttonDisplay'] = $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->nmgp_botoes;
            form_inscritos_conferencia_pack_ajax_button_display($aResp);
         }
         if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['fieldLabel']) && !empty($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['fieldLabel']))
         {
            form_inscritos_conferencia_pack_ajax_field_label($aResp);
         }
         if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['readOnly']) && !empty($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['readOnly']))
         {
            form_inscritos_conferencia_pack_ajax_readonly($aResp);
         }
         if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['navStatus']) && !empty($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['navStatus']))
         {
            form_inscritos_conferencia_pack_ajax_nav_status($aResp);
         }
         if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['navSummary']) && !empty($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['navSummary']))
         {
            form_inscritos_conferencia_pack_ajax_nav_Summary($aResp);
         }
         if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['navPage']))
         {
            form_inscritos_conferencia_pack_ajax_navPage($aResp);
         }
         if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['btnVars']) && !empty($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['btnVars']))
         {
            form_inscritos_conferencia_pack_ajax_btn_vars($aResp);
         }
         if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['quickSearchRes']) && $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['quickSearchRes'])
         {
            $aResp['quickSearchRes'] = 'Y';
         }
         else
         {
            $aResp['quickSearchRes'] = 'N';
         }
         $aResp['htmOutput'] = '';
    
         if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['param']['buffer_output']) && $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['param']['buffer_output'])
         {
            $aResp['htmOutput'] = ob_get_contents();
            if (false === $aResp['htmOutput'])
            {
               $aResp['htmOutput'] = '';
            }
            else
            {
               $aResp['htmOutput'] = form_inscritos_conferencia_pack_protect_string(NM_charset_to_utf8($aResp['htmOutput']));
               ob_end_clean();
            }
         }
      }
      if (is_array($aResp))
      {
          $oJson = new Services_JSON();
          echo "var res = " . trim(sajax_get_js_repr($oJson->encode($aResp))) . "; res;";
      }
      else
      {
          echo "var res = " . trim(sajax_get_js_repr($aResp)) . "; res;";
      }
      exit;
   } // form_inscritos_conferencia_pack_ajax_response

   function form_inscritos_conferencia_pack_calendar_reload(&$aResp)
   {
      global $inicial_form_inscritos_conferencia;
      $aResp['calendarReload'] = 'OK';
   } // form_inscritos_conferencia_pack_calendar_reload

   function form_inscritos_conferencia_pack_ajax_errors(&$aResp)
   {
      global $inicial_form_inscritos_conferencia;
      $aResp['errList'] = array();
      foreach ($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['errList'] as $sField => $aMsg)
      {
         if ('geral_form_inscritos_conferencia' == $sField)
         {
             $aMsg = form_inscritos_conferencia_pack_ajax_remove_erros($aMsg);
         }
         foreach ($aMsg as $sMsg)
         {
            $iNumLinha = (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['param']['nmgp_refresh_row']) && 'geral_form_inscritos_conferencia' != $sField)
                       ? $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['param']['nmgp_refresh_row'] : "";
            $aResp['errList'][] = array('fldName'  => $sField,
                                        'msgText'  => form_inscritos_conferencia_pack_protect_string(NM_charset_to_utf8($sMsg)),
                                        'numLinha' => $iNumLinha);
         }
      }
   } // form_inscritos_conferencia_pack_ajax_errors

   function form_inscritos_conferencia_pack_ajax_remove_erros($aErrors)
   {
       $aNewErrors = array();
       if (!empty($aErrors))
       {
           $sErrorMsgs = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), implode('<br />', $aErrors));
           $aErrorMsgs = explode('<BR>', $sErrorMsgs);
           foreach ($aErrorMsgs as $sErrorMsg)
           {
               $sErrorMsg = trim($sErrorMsg);
               if ('' != $sErrorMsg && !in_array($sErrorMsg, $aNewErrors))
               {
                   $aNewErrors[] = $sErrorMsg;
               }
           }
       }
       return $aNewErrors;
   } // form_inscritos_conferencia_pack_ajax_remove_erros

   function form_inscritos_conferencia_pack_ajax_ok(&$aResp)
   {
      global $inicial_form_inscritos_conferencia;
      $iNumLinha = (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      $aResp['msgDisplay'] = array('msgText'  => form_inscritos_conferencia_pack_protect_string($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['msgDisplay']),
                                   'numLinha' => $iNumLinha);
   } // form_inscritos_conferencia_pack_ajax_ok

   function form_inscritos_conferencia_pack_ajax_set_fields(&$aResp)
   {
      global $inicial_form_inscritos_conferencia;
      $iNumLinha = (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      if ('' != $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['rsSize'])
      {
         $aResp['rsSize'] = $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['rsSize'];
      }
      $aResp['fldList'] = array();
      foreach ($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['fldList'] as $sField => $aData)
      {
         $aField = array();
         if (isset($aData['colNum']))
         {
            $aField['colNum'] = $aData['colNum'];
         }
         if (isset($aData['row']))
         {
            $aField['row'] = $aData['row'];
         }
         if (isset($aData['imgFile']))
         {
            $aField['imgFile'] = form_inscritos_conferencia_pack_protect_string($aData['imgFile']);
         }
         if (isset($aData['imgOrig']))
         {
            $aField['imgOrig'] = form_inscritos_conferencia_pack_protect_string($aData['imgOrig']);
         }
         if (isset($aData['imgLink']))
         {
            $aField['imgLink'] = form_inscritos_conferencia_pack_protect_string($aData['imgLink']);
         }
         if (isset($aData['keepImg']))
         {
            $aField['keepImg'] = $aData['keepImg'];
         }
         if (isset($aData['docLink']))
         {
            $aField['docLink'] = form_inscritos_conferencia_pack_protect_string($aData['docLink']);
         }
         if (isset($aData['docIcon']))
         {
            $aField['docIcon'] = form_inscritos_conferencia_pack_protect_string($aData['docIcon']);
         }
         if (isset($aData['keyVal']))
         {
            $aField['keyVal'] = $aData['keyVal'];
         }
         if (isset($aData['optComp']))
         {
            $aField['optComp'] = $aData['optComp'];
         }
         if (isset($aData['optClass']))
         {
            $aField['optClass'] = $aData['optClass'];
         }
         if (isset($aData['optMulti']))
         {
            $aField['optMulti'] = $aData['optMulti'];
         }
         if (isset($aData['lookupCons']))
         {
            $aField['lookupCons'] = $aData['lookupCons'];
         }
         if (isset($aData['imgHtml']))
         {
            $aField['imgHtml'] = form_inscritos_conferencia_pack_protect_string($aData['imgHtml']);
         }
         if (isset($aData['mulHtml']))
         {
            $aField['mulHtml'] = form_inscritos_conferencia_pack_protect_string($aData['mulHtml']);
         }
         if (isset($aData['updInnerHtml']))
         {
            $aField['updInnerHtml'] = $aData['updInnerHtml'];
         }
         if (isset($aData['htmComp']))
         {
            $aField['htmComp'] = str_replace("'", '__AS__', str_replace('"', '__AD__', $aData['htmComp']));
         }
         $aField['fldName']  = $sField;
         $aField['fldType']  = $aData['type'];
         $aField['numLinha'] = $iNumLinha;
         $aField['valList']  = array();
         foreach ($aData['valList'] as $iIndex => $sValue)
         {
            $aValue = array();
            if (isset($aData['labList'][$iIndex]))
            {
               $aValue['label'] = form_inscritos_conferencia_pack_protect_string($aData['labList'][$iIndex]);
            }
            $aValue['value']     = ('_autocomp' != substr($sField, -9)) ? form_inscritos_conferencia_pack_protect_string($sValue) : $sValue;
            $aField['valList'][] = $aValue;
         }
         foreach ($aField['valList'] as $iIndex => $aFieldData)
         {
             if ("null" == $aFieldData['value'])
             {
                 $aField['valList'][$iIndex]['value'] = '';
             }
         }
         if (isset($aData['optList']) && false !== $aData['optList'])
         {
            if (is_array($aData['optList']))
            {
               $aField['optList'] = array();
               foreach ($aData['optList'] as $aOptList)
               {
                  foreach ($aOptList as $sValue => $sLabel)
                  {
                     $sOpt = ($sValue !== $sLabel) ? $sValue : $sLabel;
                     $aField['optList'][] = array('value' => form_inscritos_conferencia_pack_protect_string($sOpt),
                                                  'label' => form_inscritos_conferencia_pack_protect_string($sLabel));
                  }
               }
            }
            else
            {
               $aField['optList'] = $aData['optList'];
            }
         }
         $aResp['fldList'][] = $aField;
      }
   } // form_inscritos_conferencia_pack_ajax_set_fields

   function form_inscritos_conferencia_pack_ajax_redir(&$aResp)
   {
      global $inicial_form_inscritos_conferencia;
      $aInfo              = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session', 'h_modal', 'w_modal');
      $aResp['redirInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['redir'][$sTag]))
         {
            $aResp['redirInfo'][$sTag] = $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['redir'][$sTag];
         }
      }
   } // form_inscritos_conferencia_pack_ajax_redir

   function form_inscritos_conferencia_pack_ajax_redir_exit(&$aResp)
   {
      global $inicial_form_inscritos_conferencia;
      $aInfo                  = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session');
      $aResp['redirExitInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['redirExit'][$sTag]))
         {
            $aResp['redirExitInfo'][$sTag] = $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['redirExit'][$sTag];
         }
      }
   } // form_inscritos_conferencia_pack_ajax_redir_exit

   function form_inscritos_conferencia_pack_master_value(&$aResp)
   {
      global $inicial_form_inscritos_conferencia;
      foreach ($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['masterValue'] as $sIndex => $sValue)
      {
         $aResp['masterValue'][] = array('index' => $sIndex,
                                         'value' => $sValue);
      }
   } // form_inscritos_conferencia_pack_master_value

   function form_inscritos_conferencia_pack_ajax_alert(&$aResp)
   {
      global $inicial_form_inscritos_conferencia;
      $aResp['ajaxAlert'] = array('message' => $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxAlert']['message']);
   } // form_inscritos_conferencia_pack_ajax_alert

   function form_inscritos_conferencia_pack_ajax_message(&$aResp)
   {
      global $inicial_form_inscritos_conferencia;
      $aResp['ajaxMessage'] = array('message'      => form_inscritos_conferencia_pack_protect_string($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['message']),
                                    'title'        => form_inscritos_conferencia_pack_protect_string($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['title']),
                                    'modal'        => isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['modal'])        ? $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['modal']        : 'N',
                                    'timeout'      => isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['timeout'])      ? $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['timeout']      : '',
                                    'button'       => isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['button'])       ? $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['button']       : '',
                                    'button_label' => isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['button_label']) ? $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['button_label'] : 'Ok',
                                    'top'          => isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['top'])          ? $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['top']          : '',
                                    'left'         => isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['left'])         ? $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['left']         : '',
                                    'width'        => isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['width'])        ? $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['width']        : '',
                                    'height'       => isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['height'])       ? $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['height']       : '',
                                    'redir'        => isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['redir'])        ? $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['redir']        : '',
                                    'show_close'   => isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['show_close'])   ? $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['show_close']   : 'Y',
                                    'body_icon'    => isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['body_icon'])    ? $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['body_icon']    : 'Y',
                                    'redir_target' => isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['redir_target']) ? $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['redir_target'] : '',
                                    'redir_par'    => isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['redir_par'])    ? $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxMessage']['redir_par']    : '');
   } // form_inscritos_conferencia_pack_ajax_message

   function form_inscritos_conferencia_pack_ajax_javascript(&$aResp)
   {
      global $inicial_form_inscritos_conferencia;
      foreach ($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['ajaxJavascript'] as $aJsFunc)
      {
         $aResp['ajaxJavascript'][] = $aJsFunc;
      }
   } // form_inscritos_conferencia_pack_ajax_javascript

   function form_inscritos_conferencia_pack_ajax_block_display(&$aResp)
   {
      global $inicial_form_inscritos_conferencia;
      $aResp['blockDisplay'] = array();
      foreach ($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['blockDisplay'] as $sBlockName => $sBlockStatus)
      {
        $aResp['blockDisplay'][] = array($sBlockName, $sBlockStatus);
      }
   } // form_inscritos_conferencia_pack_ajax_block_display

   function form_inscritos_conferencia_pack_ajax_field_display(&$aResp)
   {
      global $inicial_form_inscritos_conferencia;
      $aResp['fieldDisplay'] = array();
      foreach ($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['fieldDisplay'] as $sFieldName => $sFieldStatus)
      {
        $aResp['fieldDisplay'][] = array($sFieldName, $sFieldStatus);
      }
   } // form_inscritos_conferencia_pack_ajax_field_display

   function form_inscritos_conferencia_pack_ajax_button_display(&$aResp)
   {
      global $inicial_form_inscritos_conferencia;
      $aResp['buttonDisplay'] = array();
      foreach ($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['buttonDisplay'] as $sButtonName => $sButtonStatus)
      {
        $aResp['buttonDisplay'][] = array($sButtonName, $sButtonStatus);
      }
   } // form_inscritos_conferencia_pack_ajax_button_display

   function form_inscritos_conferencia_pack_ajax_field_label(&$aResp)
   {
      global $inicial_form_inscritos_conferencia;
      $aResp['fieldLabel'] = array();
      foreach ($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['fieldLabel'] as $sFieldName => $sFieldLabel)
      {
        $aResp['fieldLabel'][] = array($sFieldName, form_inscritos_conferencia_pack_protect_string($sFieldLabel));
      }
   } // form_inscritos_conferencia_pack_ajax_field_label

   function form_inscritos_conferencia_pack_ajax_readonly(&$aResp)
   {
      global $inicial_form_inscritos_conferencia;
      $aResp['readOnly'] = array();
      foreach ($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['readOnly'] as $sFieldName => $sFieldStatus)
      {
        $aResp['readOnly'][] = array($sFieldName, $sFieldStatus);
      }
   } // form_inscritos_conferencia_pack_ajax_readonly

   function form_inscritos_conferencia_pack_ajax_nav_status(&$aResp)
   {
      global $inicial_form_inscritos_conferencia;
      $aResp['navStatus'] = array();
      if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['navStatus']['ret']) && '' != $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['navStatus']['ret'])
      {
         $aResp['navStatus']['ret'] = $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['navStatus']['ret'];
      }
      if (isset($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['navStatus']['ava']) && '' != $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['navStatus']['ava'])
      {
         $aResp['navStatus']['ava'] = $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['navStatus']['ava'];
      }
   } // form_inscritos_conferencia_pack_ajax_nav_status

   function form_inscritos_conferencia_pack_ajax_nav_Summary(&$aResp)
   {
      global $inicial_form_inscritos_conferencia;
      $aResp['navSummary'] = array();
      $aResp['navSummary']['reg_ini'] = $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['navSummary']['reg_ini'];
      $aResp['navSummary']['reg_qtd'] = $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['navSummary']['reg_qtd'];
      $aResp['navSummary']['reg_tot'] = $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['navSummary']['reg_tot'];
   } // form_inscritos_conferencia_pack_ajax_nav_Summary

   function form_inscritos_conferencia_pack_ajax_navPage(&$aResp)
   {
      global $inicial_form_inscritos_conferencia;
      $aResp['navPage'] = $inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['navPage'];
   } // form_inscritos_conferencia_pack_ajax_navPage


   function form_inscritos_conferencia_pack_ajax_btn_vars(&$aResp)
   {
      global $inicial_form_inscritos_conferencia;
      $aResp['btnVars'] = array();
      foreach ($inicial_form_inscritos_conferencia->contr_form_inscritos_conferencia->NM_ajax_info['btnVars'] as $sBtnName => $sBtnValue)
      {
        $aResp['btnVars'][] = array($sBtnName, form_inscritos_conferencia_pack_protect_string($sBtnValue));
      }
   } // form_inscritos_conferencia_pack_ajax_btn_vars

   function form_inscritos_conferencia_pack_protect_string($sString)
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
   } // form_inscritos_conferencia_pack_protect_string
?>
