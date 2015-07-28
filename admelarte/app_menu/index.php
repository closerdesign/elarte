<?php
include_once('app_menu_session.php');
session_start();
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
$_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'] = "";
$_SESSION['scriptcase']['app_menu']['glo_nm_perfil']    = "conn_mysql";
$_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] = "";

class app_menu_class
{
  var $Db;

 function sc_Include($path, $tp, $name)
 {
     if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
     {
         include_once($path);
     }
 } // sc_Include

 function app_menu_menu()
 {
    global $app_menu_menuData;
    if (isset($_POST["nmgp_idioma"]))  
    { 
        $Temp_lang = explode(";" , $_POST["nmgp_idioma"]);  
        if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))  
         { 
             $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
        } 
        if (isset($Temp_lang[1]) && !empty($Temp_lang[1])) 
        { 
             $_SESSION['scriptcase']['str_conf_reg'] = $Temp_lang[1];
        } 
    } 
  
    if (isset($_POST["nmgp_schema"]))  
    { 
        $_SESSION['scriptcase']['str_schema_all'] = $_POST["nmgp_schema"] . "/" . $_POST["nmgp_schema"];
    } 
   
$nm_versao_sc  = "" ; 
$_SESSION['scriptcase']['app_menu']['contr_erro'] = 'off';
if (isset($_POST) && !empty($_POST))
{
    foreach ($_POST as $nmgp_var => $nmgp_val)
    {
        $$nmgp_var = $nmgp_val;
    }
}
if (isset($_GET) && !empty($_GET))
{
    foreach ($_GET as $nmgp_var => $nmgp_val)
    {
        $$nmgp_var = $nmgp_val;
    }
}
$nm_url_saida = "";
if (isset($nmgp_url_saida))
{
    $nm_url_saida = $nmgp_url_saida;
    if (isset($script_case_init))
    {
        $nm_url_saida .= "?script_case_init=" . $script_case_init;
    }
}
if (isset($_POST["nmgp_idioma"]) || isset($_POST["nmgp_schema"]))  
{ 
    $nm_url_saida = $_SESSION['scriptcase']['sc_saida_app_menu'];
}
elseif (!empty($nm_url_saida))
{
    $_SESSION['scriptcase']['sc_url_saida'][$script_case_init]  = $nm_url_saida;
    $_SESSION['scriptcase']['sc_saida_app_menu'] = $nm_url_saida;
}
else
{
    $_SESSION['scriptcase']['sc_saida_app_menu'] = (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : "javascript:window.close()";
}
$Campos_Mens_erro = "";
$sc_site_ssl   = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? true : false;
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
if(empty($_SESSION['scriptcase']['app_menu']['glo_nm_path_prod']))
{
        /*check prod*/$_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
}
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
$str_path_web   = $_SERVER['PHP_SELF'];
$str_path_web   = str_replace("\\", '/', $str_path_web);
$str_path_web   = str_replace('//', '/', $str_path_web);
$str_root       = substr($str_path_sys, 0, -1 * strlen($str_path_web));
$path_link      = substr($str_path_web, 0, strrpos($str_path_web, '/'));
$path_link      = substr($path_link, 0, strrpos($path_link, '/')) . '/';
$path_btn       = $str_root . $path_link . "_lib/buttons/";
$path_imag_cab  = $path_link . "_lib/img";
$this->path_botoes    = '../_lib/img';
$this->path_imag_apl  = $str_root . $path_link . "_lib/img";
$path_help      = $path_link . "_lib/webhelp/";
$path_libs      = $str_root . $_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'] . "/lib/php";
$path_third     = $str_root . $_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'] . "/third";
$url_third      = $_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'] . "/third";
$path_adodb     = $str_root . $_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'] . "/third/adodb";
$path_apls      = $str_root . substr($path_link, 0, strrpos($path_link, '/'));
$path_img_old   = $str_root . $path_link . "app_menu/img";
$this->path_css = $str_root . $path_link . "_lib/css/";
$path_lib_php   = $str_root . $path_link . "_lib/lib/php";
$menu_mobile_hide          = 'N';
$menu_mobile_inicial_state = 'escondido';
$menu_mobile_hide_onclick  = 'S';
$menutree_mobile_float     = 'S';
$menu_mobile_hide_icon     = 'N';
$mobile_menu_mobile_hide          = 'S';
$mobile_menu_mobile_inicial_state = 'aberto';
$mobile_menu_mobile_hide_onclick  = 'S';
$mobile_menutree_mobile_float     = 'N';
$mobile_menu_mobile_hide_icon     = 'N';
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
                $nm_apl_dest = $path_link . SC_dir_app_name($nm_apl_dest) . "/";
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
if (!defined("SC_ERROR_HANDLER"))
{
    define("SC_ERROR_HANDLER", 1);
    include_once(dirname(__FILE__) . "/app_menu_erro.php");
}
include_once(dirname(__FILE__) . "/app_menu_erro.class.php"); 
$this->Erro = new app_menu_erro();
$str_path = substr($_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'], 0, strrpos($_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'], '/') + 1);
if (!is_file($str_root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
{
    unset($_SESSION['scriptcase']['nm_sc_retorno']);
    unset($_SESSION['scriptcase']['app_menu']['glo_nm_conexao']);
}
/* Path definitions */
$app_menu_menuData          = array();
$app_menu_menuData['path']  = array();
$app_menu_menuData['url']   = array();
$NM_dir_atual = getcwd();
if (empty($NM_dir_atual))
{
    $app_menu_menuData['path']['sys'] = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
    $app_menu_menuData['path']['sys'] = str_replace("\\", '/', $str_path_sys);
    $app_menu_menuData['path']['sys'] = str_replace('//', '/', $str_path_sys);
}
else
{
    $sc_nm_arquivo                                   = explode("/", $_SERVER['PHP_SELF']);
    $app_menu_menuData['path']['sys'] = str_replace("\\", "/", str_replace("\\\\", "\\", getcwd())) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
}
$app_menu_menuData['url']['web']   = $_SERVER['PHP_SELF'];
$app_menu_menuData['url']['web']   = str_replace("\\", '/', $app_menu_menuData['url']['web']);
$app_menu_menuData['path']['root'] = substr($app_menu_menuData['path']['sys'],  0, -1 * strlen($app_menu_menuData['url']['web']));
$app_menu_menuData['path']['app']  = substr($app_menu_menuData['path']['sys'],  0, strrpos($app_menu_menuData['path']['sys'],  '/'));
$app_menu_menuData['path']['link'] = substr($app_menu_menuData['path']['app'],  0, strrpos($app_menu_menuData['path']['app'],  '/'));
$app_menu_menuData['path']['link'] = substr($app_menu_menuData['path']['link'], 0, strrpos($app_menu_menuData['path']['link'], '/')) . '/';
$app_menu_menuData['path']['app'] .= '/';
$app_menu_menuData['url']['app']   = substr($app_menu_menuData['url']['web'],  0, strrpos($app_menu_menuData['url']['web'],  '/'));
$app_menu_menuData['url']['link']  = substr($app_menu_menuData['url']['app'],  0, strrpos($app_menu_menuData['url']['app'],  '/'));
if ($_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] == "S")
{
    $app_menu_menuData['url']['link']  = substr($app_menu_menuData['url']['link'], 0, strrpos($app_menu_menuData['url']['link'], '/'));
}
$app_menu_menuData['url']['link']  .= '/';
$app_menu_menuData['url']['app']   .= '/';

/* Menu items */
$nm_img_fun_menu = ""; 
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
if (!function_exists("NM_is_utf8"))
 {
   include_once("app_menu_nmutf8.php");
}
if (!function_exists("SC_dir_app_ini"))
{
    include_once("../_lib/lib/php/nm_ctrl_app_name.php");
}
SC_dir_app_ini('Phronesis');
$this->str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc8_Saphir/Sc8_Saphir";
if ($_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] == "S")
{
    $path_apls     = substr($path_apls, 0, strrpos($path_apls, '/'));
}
$path_apls     .= "/";
include("../_lib/lang/". $this->str_lang .".lang.php");
include("../_lib/css/" . $this->str_schema_all . "_menuT.php");
if(isset($pagina_schemamenu) && !empty($pagina_schemamenu) && is_file("../_lib/menuicons/". $pagina_schemamenu .".php"))
{
    include("../_lib/menuicons/". $pagina_schemamenu .".php");
}
include("../_lib/lang/config_region.php");
include("../_lib/lang/lang_config_region.php");
$this->sc_Include($path_lib_php . "/nm_functions.php", "", "") ; 
$this->sc_Include($path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
$this->nm_data = new nm_data("es");
if(isset($this->Ini->Nm_lang))
{
    $Nm_lang = $this->Ini->Nm_lang;
}
else
{
    $Nm_lang = $this->Nm_lang;
}
$Str_btn_menu = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
$Str_btn_css  = trim($str_button) . "/" . trim($str_button) . ".css";
include($path_btn . $Str_btn_menu);
if (!function_exists("nmButtonOutput"))
{
   include_once("../_lib/lib/php/nm_gp_config_btn.php");
}
asort($this->Nm_lang_conf_region);
$this->tab_grupo[0] = "Phronesis/";
if ($_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] != "S")
{
    $this->tab_grupo[0] = "";
}

    $_SESSION['scriptcase']['menu_atual'] = "app_menu";
    $_SESSION['scriptcase']['menu_apls']['app_menu'] = array();
    if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
    {
        foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
        {
            if (isset($_SESSION['scriptcase']['app_menu']['glo_nm_conexao']) && $_SESSION['scriptcase']['app_menu']['glo_nm_conexao'] == $NM_con_orig)
            {
/*NM*/          $_SESSION['scriptcase']['app_menu']['glo_nm_conexao'] = $NM_con_dest;
            }
            if (isset($_SESSION['scriptcase']['app_menu']['glo_nm_perfil']) && $_SESSION['scriptcase']['app_menu']['glo_nm_perfil'] == $NM_con_orig)
            {
/*NM*/          $_SESSION['scriptcase']['app_menu']['glo_nm_perfil'] = $NM_con_dest;
            }
            if (isset($_SESSION['scriptcase']['app_menu']['glo_con_' . $NM_con_orig]))
            {
                $_SESSION['scriptcase']['app_menu']['glo_con_' . $NM_con_orig] = $NM_con_dest;
            }
        }
    }
$_SESSION['scriptcase']['charset'] = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "UTF-8";
ini_set('default_charset', $_SESSION['scriptcase']['charset']);
$_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
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
$this->regionalDefault();
$this->str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc8_Saphir/Sc8_Saphir";
$_SESSION['scriptcase']['erro']['str_schema'] = $this->str_schema_all . "_error.css";
$_SESSION['scriptcase']['erro']['str_schema_dir'] = $this->str_schema_all . "_error" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
$_SESSION['scriptcase']['erro']['str_lang']   = $this->str_lang;
if (is_dir($path_img_old))
{
    $Res_dir_img = @opendir($path_img_old);
    if ($Res_dir_img)
    {
        while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
        {
           $Str_arquivo = "/" . $Str_arquivo;
           if (@is_file($path_img_old . $Str_arquivo) && '.' != $Str_arquivo && '..' != $path_img_old . $Str_arquivo)
           {
               @unlink($path_img_old . $Str_arquivo);
           }
        }
    }
    @closedir($Res_dir_img);
    rmdir($path_img_old);
}
//
if (!empty($_GET))
{
    foreach ($_GET as $nmgp_var => $nmgp_val)
    {
         $$nmgp_var           = $nmgp_val;
    }
}
if (!empty($_POST))
{
    foreach ($_POST as $nmgp_var => $nmgp_val)
    {
         $$nmgp_var           = $nmgp_val;
    }
}
if (isset($script_case_init))
{
    $_SESSION['sc_session'][1]['app_menu']['init'] = $script_case_init;
}
elseif (!isset($_SESSION['sc_session'][1]['app_menu']['init']))
{
    $_SESSION['sc_session'][1]['app_menu']['init'] = "";
}
$script_case_init = $_SESSION['sc_session'][1]['app_menu']['init'];
if (isset($nmgp_parms) && !empty($nmgp_parms)) 
{ 
    $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
    $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
    $todo = explode("?@?", $nmgp_parms);
    $ix = 0;
    while (!empty($todo[$ix]))
    {
       $cadapar = explode("?#?", $todo[$ix]);
       $$cadapar[0] = $cadapar[1];
       $_SESSION[$cadapar[0]] = $cadapar[1];
       $ix++;
     }
} 
$this->str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc8_Saphir/Sc8_Saphir";
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['app_menu'] = "on";
} 
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_menu']) || $_SESSION['scriptcase']['sc_apl_seg']['app_menu'] != "on")
{ 
    $NM_Mens_Erro = $this->Nm_lang['lang_errm_unth_user'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">

    <HTML>
     <HEAD>
      <TITLE></TITLE>
     <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
      <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>      <META http-equiv="Pragma" content="no-cache"/>
      <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menuT.css" /> 
      <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menuT<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
      <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_grid.css" /> 
      <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
     </HEAD>
     <body>
       <table align="center" class="scGridBorder"><tr><td style="padding: 0">
       <table style="width: 100%" class="scGridTabela"><tr class="scGridFieldOdd"><td class="scGridFieldOddFont" style="padding: 15px 30px; text-align: center">
        <?php echo $NM_Mens_Erro; ?>
        <br />
        <form name="Fseg" method="post" target="_self">
         <input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($script_case_init) ?>"/> 
         <input type=hidden name="script_case_session" value="<?php echo NM_encode_input(session_id()) ?>"> 
         <input type="button" name="sc_sai_seg" value="OK" onclick="nm_saida()"> 
        </form> 
       </td></tr></table>
       </td></tr></table>
<?php
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']))
              {
?>
<br /><br /><br />
<table align="center" class="scGridBorder" style="width: 450px"><tr><td style="padding: 0">
 <table style="width: 100%" class="scGridTabela">
  <tr class="scGridFieldOdd">
   <td class="scGridFieldOddFont" style="padding: 15px 30px">
    <?php echo $this->Nm_lang['lang_errm_unth_hwto']; ?>
   </td>
  </tr>
 </table>
</td></tr></table>
<?php
              }
?>
     </body>
     <?php
     if ((isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true') || (isset($_SESSION['scriptcase']['sc_outra_jan']) && ($_SESSION['scriptcase']['sc_outra_jan'] == 'menutree' || $_SESSION['scriptcase']['sc_outra_jan'] == 'menu')))
     {
       $saida_final = 'window.close();';
     }
     else
     {
       $saida_final = 'history.back();';
     }
     ?>
    <script type="text/javascript">
      function nm_saida()
      {
<?php 
             echo $saida_final;
?> 
      }
     </script> 
<?php
    exit;
} 
$this->sc_Include($path_libs . "/nm_ini_lib.php", "F", "nm_dir_normaliza") ; 
if ((isset($nmgp_outra_jan) && $nmgp_outra_jan == "true") || (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'app_menu'))
{
    $_SESSION['sc_session'][1]['app_menu']['sc_outra_jan'] = true;
     unset($_SESSION['scriptcase']['sc_outra_jan']);
    $_SESSION['scriptcase']['sc_saida_app_menu'] = "javascript:window.close()";
}

/* Menu configuration variables */
$app_menu_menuData['iframe'] = TRUE;

$app_menu_menuData['height'] = '100%';
if (!isset($_SESSION['scriptcase']['sc_apl_seg']))
{
    $_SESSION['scriptcase']['sc_apl_seg'] = array();
}
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("dashboard") . "/dashboard_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['dashboard'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['dashboard'] = "on";
} 
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("dashboard") . "/dashboard_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("dashboard") . "/dashboard_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['dashboard'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['dashboard'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_publicaciones") . "/form_publicaciones_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_publicaciones") . "/form_publicaciones_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_publicaciones']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_publicaciones'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_publicaciones'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_idiomas") . "/form_idiomas_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_idiomas") . "/form_idiomas_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_idiomas']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_idiomas'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_idiomas'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_formatos") . "/form_formatos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_formatos") . "/form_formatos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_formatos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_formatos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_formatos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_autores") . "/form_autores_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_autores") . "/form_autores_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_autores']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_autores'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_autores'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_paquetes") . "/form_paquetes_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_paquetes") . "/form_paquetes_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_paquetes']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_paquetes'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_paquetes'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_articulos") . "/form_articulos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_articulos") . "/form_articulos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_articulos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_articulos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_articulos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_categorias") . "/form_categorias_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_categorias") . "/form_categorias_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_categorias']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_categorias'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_categorias'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_programas_especiales") . "/form_programas_especiales_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_programas_especiales") . "/form_programas_especiales_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_programas_especiales']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_programas_especiales'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_programas_especiales'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_reflexiones") . "/form_reflexiones_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_reflexiones") . "/form_reflexiones_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_reflexiones']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_reflexiones'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_reflexiones'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_pedidos") . "/grid_pedidos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_pedidos") . "/grid_pedidos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_usuarios") . "/grid_usuarios_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_usuarios") . "/grid_usuarios_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_usuarios']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_usuarios'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_usuarios'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_comentarios") . "/grid_comentarios_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_comentarios") . "/grid_comentarios_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_comentarios']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_comentarios'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_comentarios'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_compartir") . "/grid_compartir_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_compartir") . "/grid_compartir_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_compartir']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_compartir'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_compartir'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_contacto") . "/grid_contacto_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_contacto") . "/grid_contacto_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_contacto']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_contacto'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_contacto'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_conferencia") . "/grid_conferencia_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_conferencia") . "/grid_conferencia_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_conferencia']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_conferencia'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_conferencia'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_inscritos_conferencia") . "/grid_inscritos_conferencia_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_inscritos_conferencia") . "/grid_inscritos_conferencia_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_inscritos_conferencia']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_inscritos_conferencia'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_inscritos_conferencia'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_usuarios_1") . "/grid_usuarios_1_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_usuarios_1") . "/grid_usuarios_1_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_usuarios_1']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_usuarios_1'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_usuarios_1'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_pedidos_1") . "/grid_pedidos_1_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_pedidos_1") . "/grid_pedidos_1_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos_1']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos_1'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos_1'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_log_sesiones_1") . "/grid_log_sesiones_1_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_log_sesiones_1") . "/grid_log_sesiones_1_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_log_sesiones_1']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_log_sesiones_1'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_log_sesiones_1'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_articulos_formato") . "/form_articulos_formato_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_articulos_formato") . "/form_articulos_formato_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_articulos_formato']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_articulos_formato'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_articulos_formato'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_pedidos") . "/form_pedidos_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_pedidos") . "/form_pedidos_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_pedidos']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['form_pedidos'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['form_pedidos'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_grid_sec_users") . "/app_grid_sec_users_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_grid_sec_users") . "/app_grid_sec_users_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_users']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_users'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_users'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_grid_sec_apps") . "/app_grid_sec_apps_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_grid_sec_apps") . "/app_grid_sec_apps_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_apps']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_apps'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_apps'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_grid_sec_groups") . "/app_grid_sec_groups_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_grid_sec_groups") . "/app_grid_sec_groups_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_groups']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_groups'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_groups'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_search_sec_groups") . "/app_search_sec_groups_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_search_sec_groups") . "/app_search_sec_groups_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_search_sec_groups']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_search_sec_groups'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_search_sec_groups'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_sync_apps") . "/app_sync_apps_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_sync_apps") . "/app_sync_apps_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_sync_apps']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_sync_apps'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_sync_apps'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_change_pswd") . "/app_change_pswd_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_change_pswd") . "/app_change_pswd_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_change_pswd']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_change_pswd'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_change_pswd'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_Login") . "/app_Login_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_Login") . "/app_Login_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_Login']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_Login'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_Login'] = "on";
    } 
}
/* JS files */
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?> style="height: 100%">
<head>
 <title>app_menu</title>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <?php
 if ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
 {
  ?>
   <meta name='viewport' content='width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;' />
  <?php
 }
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $url_third; ?>/jquery_plugin/vakata-jstree-e22db21/themes/default/style.min.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menuT.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menuT<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $Str_btn_css ?>" /> 
<script  type="text/javascript" src="<?php echo $url_third; ?>/jquery/js/jquery.js"></script>
<script  type="text/javascript" src="<?php echo $url_third; ?>/jquery/js/jquery-ui.js"></script>
<script  type="text/javascript" src="<?php echo $url_third; ?>/jquery_plugin/vakata-jstree-e22db21/jstree.min.js"></script>
<script  type="text/javascript" src="<?php echo $url_third; ?>/jquery_plugin/layout/jquery.layout.js"></script>
<style>
  li.jstree-open   > a .jstree-icon { background:url(../_lib/img/tree_folder_open.png)  ; background-position: center center; background-size: auto auto; background-repeat: no-repeat;}
  li.jstree-closed > a .jstree-icon { background:url(../_lib/img/tree_folder_closed.png); background-position: center center; background-size: auto auto; background-repeat: no-repeat;}
  li.jstree-leaf   > a .jstree-icon { background:url(../_lib/img/tree_leaf.png); background-position: center center; background-size: auto auto; background-repeat: no-repeat;}
</style>
</head>
<body style="height: 100%" scroll="no" class='scMenuTPage'>
<?php
$str_bmenu = nmButtonOutput($this->arr_buttons, "bmenu", "showMenu();", "showMenu();", "bmenu", "", "" . $this->Nm_lang['lang_btns_menu'] . "", "position:absolute; top:4px; left:2px;z-index:9999;", "absmiddle", "", "0px", $this->path_botoes, "", "" . $this->Nm_lang['lang_btns_menu_hint'] . "", "", "", "", "only_text", "text_right", "", "", "", "");
if($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
    $menu_mobile_hide          = $mobile_menu_mobile_hide;
    $menu_mobile_inicial_state = $mobile_menu_mobile_inicial_state;
    $menu_mobile_hide_onclick  = $mobile_menu_mobile_hide_onclick;
    $menutree_mobile_float     = $mobile_menutree_mobile_float;
    $menu_mobile_hide_icon     = $mobile_menu_mobile_hide_icon;
}
$str_menu_display = 'false';
$str_menu_display_float = false;
if($menu_mobile_hide == 'S')
{
    if($menu_mobile_inicial_state =='escondido')
    {
            $str_menu_display='true';
            $str_btn_display="show";
    }
    else
    {
            $str_menu_display='false';
            $str_btn_display="hide";
    }
    if($menu_mobile_hide_icon != 'S')
    {
        $str_btn_display="show";
    }
?>
<script>
    $( document ).ready(function() {
        $('#bmenu').<?php echo $str_btn_display; ?>();
        <?php
        if($menu_mobile_hide_icon != 'S')
        {
            ?>
            $('#css3menut').css('margin-top', $('#bmenu').outerHeight());

            <?php
        }
        ?>
        $('#bmenu').css('left', '0px');
        $('#bmenu').css('top', $('.scMenuTHeader').height());
    });
    function showMenu()
    {
      <?php
      if($menu_mobile_hide_icon == 'S')
      {
      ?>
                $('#bmenu').hide();
      <?php
      }
      ?>
            myLayout.toggle('west');
    }
    function HideMenu()
    {
      <?php
      if($menu_mobile_hide_icon == 'S')
      {
      ?>
                $('#bmenu').show();
      <?php
      }
      ?>
            myLayout.toggle('west');
    }
</script>
<?php
echo $str_bmenu;
}
?>
<?php 
        $NM_scr_iframe = (isset($_POST['hid_scr_iframe'])) ? $_POST['hid_scr_iframe'] : "";   
?> 

        <script  type="text/javascript">

                var myLayout; // a var is required because this page utilizes: myLayout.allowOverflow() method

                $(document).ready(function () {
                                        myLayout = $('body').layout({
                                         west__size                 : 200
                                        ,west__showOverflowOnHover : false
                                        ,east__showOverflowOnHover : false
                    ,north__slidable           : false
                    ,north__resizable          : false
                    ,north__closable           : false
                    ,north__spacing_open       : 0
                    ,north__spacing_closed     : 0
                    ,south__slidable           : false
                    ,south__resizable          : false
                    ,south__closable           : false
                    ,south__spacing_open       : 0
                    ,south__spacing_closed     : 0
                    ,west__resizable           : false
                    ,west__spacing_open        : 0
                    ,west__spacing_closed      : 0
                    ,east__resizable           : false
                    ,east__spacing_open        : 0
                    ,east__spacing_closed      : 0
                                        ,west__initClosed          : <?php echo $str_menu_display; ?>
                                        ,east__initClosed          : <?php echo $str_menu_display; ?>

                    
                                        });
                                        $('#css3menut').jstree().on("select_node.jstree",function(e, data) {
                                          str_link   = '';
                                          str_target = '';
                                          if(data.instance.is_leaf(data.node))
                                          {
                                                str_link   = data.node.a_attr.href;
                                                str_target = data.node.a_attr.target;
                                          }
                                          else
                                          {
                                                data.instance.toggle_node(data.node);
                                                str_link   = $('#' + data.node.id + ' a span a').attr('href');
                                                str_target = $('#' + data.node.id + ' a span a').attr('target');
                                          }

                                          //test link type
                                          if(str_link != '' && str_target != '')
                                          {
                                                  if(str_link.substring(0, 11) == 'javascript:')
                                                  {
                                                        eval(str_link.substring(11));
                                                  }
                                                  else if(str_link != '#')
                                                  {
                                                        if(str_target == '_parent')
                                                        {
                                                                str_target = '_self';
                                                        }
                                                        window.open(str_link, str_target);
                                                  }
                                                  <?php
                                                  if($menu_mobile_hide == 'S' && $menu_mobile_hide_onclick=='S')
                                                  {
                                                  ?>
                                                                HideMenu();
                                                  <?php
                                                  }
                                                  ?>
                                          }
                                        });
                                        $('#css3menut').jstree().close_all();
                 });
    </script>
<script type="text/javascript">
var numl = 0;
var toBeHidden = 0;
function NM_show_menu()
{
   return true;
}
function NM_hide_menu()
{
   return true;
}
</script>

<style type="text/css">

        .ui-layout-pane { /* all 'panes' */
                        border: 0px solid #BBB;
                        padding: 0px;
                        overflow: auto;
        }
        .ui-layout-resizer { /* all 'resizer-bars' */
                        background: #DDD;
        }

        .ui-layout-toggler { /* all 'toggler-buttons' */
                        background: #AAA;
        }
        </style>
<?php

 $nm_var_lab[0] = "Dashboard";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[0]))
{
    $nm_var_lab[0] = mb_convert_encoding($nm_var_lab[0], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[1] = "Obras";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[1]))
{
    $nm_var_lab[1] = mb_convert_encoding($nm_var_lab[1], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[2] = "Publicaciones";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[2]))
{
    $nm_var_lab[2] = mb_convert_encoding($nm_var_lab[2], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[3] = "Idiomas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[3]))
{
    $nm_var_lab[3] = mb_convert_encoding($nm_var_lab[3], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[4] = "Formatos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[4]))
{
    $nm_var_lab[4] = mb_convert_encoding($nm_var_lab[4], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[5] = "Autores";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[5]))
{
    $nm_var_lab[5] = mb_convert_encoding($nm_var_lab[5], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[6] = "Paquetes";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[6]))
{
    $nm_var_lab[6] = mb_convert_encoding($nm_var_lab[6], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[7] = "Blog";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[7]))
{
    $nm_var_lab[7] = mb_convert_encoding($nm_var_lab[7], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[8] = "Articulos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[8]))
{
    $nm_var_lab[8] = mb_convert_encoding($nm_var_lab[8], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[9] = "Categorias";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[9]))
{
    $nm_var_lab[9] = mb_convert_encoding($nm_var_lab[9], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[10] = "Programas Especiales";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[10]))
{
    $nm_var_lab[10] = mb_convert_encoding($nm_var_lab[10], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[11] = "Reflexiones";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[11]))
{
    $nm_var_lab[11] = mb_convert_encoding($nm_var_lab[11], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[12] = "Informes";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[12]))
{
    $nm_var_lab[12] = mb_convert_encoding($nm_var_lab[12], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[13] = "Pedidos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[13]))
{
    $nm_var_lab[13] = mb_convert_encoding($nm_var_lab[13], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[14] = "Usuarios";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[14]))
{
    $nm_var_lab[14] = mb_convert_encoding($nm_var_lab[14], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[15] = "Comentarios";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[15]))
{
    $nm_var_lab[15] = mb_convert_encoding($nm_var_lab[15], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[16] = "Compartir";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[16]))
{
    $nm_var_lab[16] = mb_convert_encoding($nm_var_lab[16], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[17] = "Contacto";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[17]))
{
    $nm_var_lab[17] = mb_convert_encoding($nm_var_lab[17], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[18] = "Conferencia";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[18]))
{
    $nm_var_lab[18] = mb_convert_encoding($nm_var_lab[18], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[19] = "Inscripciones";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[19]))
{
    $nm_var_lab[19] = mb_convert_encoding($nm_var_lab[19], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[20] = "Indicadores";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[20]))
{
    $nm_var_lab[20] = mb_convert_encoding($nm_var_lab[20], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[21] = "Registro de Usuarios";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[21]))
{
    $nm_var_lab[21] = mb_convert_encoding($nm_var_lab[21], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[22] = "Resumen de Pedidos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[22]))
{
    $nm_var_lab[22] = mb_convert_encoding($nm_var_lab[22], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[23] = "Logs";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[23]))
{
    $nm_var_lab[23] = mb_convert_encoding($nm_var_lab[23], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[24] = "Sesiones";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[24]))
{
    $nm_var_lab[24] = mb_convert_encoding($nm_var_lab[24], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[25] = "Procesos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[25]))
{
    $nm_var_lab[25] = mb_convert_encoding($nm_var_lab[25], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[26] = "Formato artículos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[26]))
{
    $nm_var_lab[26] = mb_convert_encoding($nm_var_lab[26], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[27] = "Edición Pedidos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[27]))
{
    $nm_var_lab[27] = mb_convert_encoding($nm_var_lab[27], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[0] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[0]))
{
    $nm_var_hint[0] = mb_convert_encoding($nm_var_hint[0], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[1] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[1]))
{
    $nm_var_hint[1] = mb_convert_encoding($nm_var_hint[1], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[2] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[2]))
{
    $nm_var_hint[2] = mb_convert_encoding($nm_var_hint[2], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[3] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[3]))
{
    $nm_var_hint[3] = mb_convert_encoding($nm_var_hint[3], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[4] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[4]))
{
    $nm_var_hint[4] = mb_convert_encoding($nm_var_hint[4], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[5] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[5]))
{
    $nm_var_hint[5] = mb_convert_encoding($nm_var_hint[5], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[6] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[6]))
{
    $nm_var_hint[6] = mb_convert_encoding($nm_var_hint[6], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[7] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[7]))
{
    $nm_var_hint[7] = mb_convert_encoding($nm_var_hint[7], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[8] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[8]))
{
    $nm_var_hint[8] = mb_convert_encoding($nm_var_hint[8], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[9] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[9]))
{
    $nm_var_hint[9] = mb_convert_encoding($nm_var_hint[9], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[10] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[10]))
{
    $nm_var_hint[10] = mb_convert_encoding($nm_var_hint[10], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[11] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[11]))
{
    $nm_var_hint[11] = mb_convert_encoding($nm_var_hint[11], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[12] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[12]))
{
    $nm_var_hint[12] = mb_convert_encoding($nm_var_hint[12], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[13] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[13]))
{
    $nm_var_hint[13] = mb_convert_encoding($nm_var_hint[13], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[14] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[14]))
{
    $nm_var_hint[14] = mb_convert_encoding($nm_var_hint[14], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[15] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[15]))
{
    $nm_var_hint[15] = mb_convert_encoding($nm_var_hint[15], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[16] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[16]))
{
    $nm_var_hint[16] = mb_convert_encoding($nm_var_hint[16], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[17] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[17]))
{
    $nm_var_hint[17] = mb_convert_encoding($nm_var_hint[17], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[18] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[18]))
{
    $nm_var_hint[18] = mb_convert_encoding($nm_var_hint[18], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[19] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[19]))
{
    $nm_var_hint[19] = mb_convert_encoding($nm_var_hint[19], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[20] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[20]))
{
    $nm_var_hint[20] = mb_convert_encoding($nm_var_hint[20], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[21] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[21]))
{
    $nm_var_hint[21] = mb_convert_encoding($nm_var_hint[21], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[22] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[22]))
{
    $nm_var_hint[22] = mb_convert_encoding($nm_var_hint[22], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[23] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[23]))
{
    $nm_var_hint[23] = mb_convert_encoding($nm_var_hint[23], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[24] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[24]))
{
    $nm_var_hint[24] = mb_convert_encoding($nm_var_hint[24], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[25] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[25]))
{
    $nm_var_hint[25] = mb_convert_encoding($nm_var_hint[25], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[26] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[26]))
{
    $nm_var_hint[26] = mb_convert_encoding($nm_var_hint[26], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[27] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[27]))
{
    $nm_var_hint[27] = mb_convert_encoding($nm_var_hint[27], $_SESSION['scriptcase']['charset'], "UTF-8");
}

$saida_apl = $_SESSION['scriptcase']['sc_saida_app_menu'];
$app_menu_menuData['data'] = array();
if (isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['dashboard']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['container']['active']))
    {
        $icon_aba = $arr_menuicons['container']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['container']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['container']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[0] . "",
        'level'    => "0",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_28&sc_apl_menu=dashboard&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[0] . "",
        'id'       => "item_28",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_28",
        'disabled' => "N",
    );
}
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if(empty($icon_aba) && !empty($icon_aba_inactive))
{
    $icon_aba = $icon_aba_inactive;
}
if(empty($icon_aba_inactive) && !empty($icon_aba))
{
    $icon_aba_inactive = $icon_aba;
}
$app_menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[1] . "",
    'level'    => "0",
    'link'     => "#",
    'hint'     => "" . $nm_var_hint[1] . "",
    'id'       => "item_9",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
    'sc_id'    => "item_9",
    'disabled' => "N",
);
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_publicaciones']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_publicaciones']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[2] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_10&sc_apl_menu=form_publicaciones&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[2] . "",
        'id'       => "item_10",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_10",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_idiomas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_idiomas']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[3] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_11&sc_apl_menu=form_idiomas&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[3] . "",
        'id'       => "item_11",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_11",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_formatos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_formatos']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[4] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_12&sc_apl_menu=form_formatos&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[4] . "",
        'id'       => "item_12",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_12",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_autores']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_autores']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[5] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_13&sc_apl_menu=form_autores&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[5] . "",
        'id'       => "item_13",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_13",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_paquetes']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_paquetes']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[6] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_27&sc_apl_menu=form_paquetes&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[6] . "",
        'id'       => "item_27",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_27",
        'disabled' => "N",
    );
}
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if(empty($icon_aba) && !empty($icon_aba_inactive))
{
    $icon_aba = $icon_aba_inactive;
}
if(empty($icon_aba_inactive) && !empty($icon_aba))
{
    $icon_aba_inactive = $icon_aba;
}
$app_menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[7] . "",
    'level'    => "0",
    'link'     => "#",
    'hint'     => "" . $nm_var_hint[7] . "",
    'id'       => "item_14",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
    'sc_id'    => "item_14",
    'disabled' => "N",
);
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_articulos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_articulos']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[8] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_15&sc_apl_menu=form_articulos&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[8] . "",
        'id'       => "item_15",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_15",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_categorias']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_categorias']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[9] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_16&sc_apl_menu=form_categorias&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[9] . "",
        'id'       => "item_16",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_16",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_programas_especiales']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_programas_especiales']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[10] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_32&sc_apl_menu=form_programas_especiales&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[10] . "",
        'id'       => "item_32",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_32",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_reflexiones']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_reflexiones']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[11] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_19&sc_apl_menu=form_reflexiones&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[11] . "",
        'id'       => "item_19",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_19",
        'disabled' => "N",
    );
}
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if(empty($icon_aba) && !empty($icon_aba_inactive))
{
    $icon_aba = $icon_aba_inactive;
}
if(empty($icon_aba_inactive) && !empty($icon_aba))
{
    $icon_aba_inactive = $icon_aba;
}
$app_menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[12] . "",
    'level'    => "0",
    'link'     => "#",
    'hint'     => "" . $nm_var_hint[12] . "",
    'id'       => "item_17",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
    'sc_id'    => "item_17",
    'disabled' => "N",
);
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[13] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_20&sc_apl_menu=grid_pedidos&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[13] . "",
        'id'       => "item_20",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_20",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_usuarios']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_usuarios']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[14] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_18&sc_apl_menu=grid_usuarios&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[14] . "",
        'id'       => "item_18",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_18",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_comentarios']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_comentarios']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[15] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_21&sc_apl_menu=grid_comentarios&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[15] . "",
        'id'       => "item_21",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_21",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_compartir']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_compartir']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[16] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_22&sc_apl_menu=grid_compartir&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[16] . "",
        'id'       => "item_22",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_22",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_contacto']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_contacto']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[17] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_23&sc_apl_menu=grid_contacto&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[17] . "",
        'id'       => "item_23",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_23",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_conferencia']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_conferencia']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[18] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_29&sc_apl_menu=grid_conferencia&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[18] . "",
        'id'       => "item_29",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_29",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_inscritos_conferencia']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_inscritos_conferencia']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[19] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_33&sc_apl_menu=grid_inscritos_conferencia&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[19] . "",
        'id'       => "item_33",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_33",
        'disabled' => "N",
    );
}
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if(empty($icon_aba) && !empty($icon_aba_inactive))
{
    $icon_aba = $icon_aba_inactive;
}
if(empty($icon_aba_inactive) && !empty($icon_aba))
{
    $icon_aba_inactive = $icon_aba;
}
$app_menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[20] . "",
    'level'    => "0",
    'link'     => "#",
    'hint'     => "" . $nm_var_hint[20] . "",
    'id'       => "item_24",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
    'sc_id'    => "item_24",
    'disabled' => "N",
);
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_usuarios_1']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_usuarios_1']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[21] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_25&sc_apl_menu=grid_usuarios_1&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[21] . "",
        'id'       => "item_25",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_25",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos_1']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_pedidos_1']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[22] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_26&sc_apl_menu=grid_pedidos_1&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[22] . "",
        'id'       => "item_26",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_26",
        'disabled' => "N",
    );
}
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if(empty($icon_aba) && !empty($icon_aba_inactive))
{
    $icon_aba = $icon_aba_inactive;
}
if(empty($icon_aba_inactive) && !empty($icon_aba))
{
    $icon_aba_inactive = $icon_aba;
}
$app_menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[23] . "",
    'level'    => "0",
    'link'     => "#",
    'hint'     => "" . $nm_var_hint[23] . "",
    'id'       => "item_34",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
    'sc_id'    => "item_34",
    'disabled' => "N",
);
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_log_sesiones_1']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_log_sesiones_1']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[24] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_35&sc_apl_menu=grid_log_sesiones_1&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[24] . "",
        'id'       => "item_35",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_35",
        'disabled' => "N",
    );
}
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if(empty($icon_aba) && !empty($icon_aba_inactive))
{
    $icon_aba = $icon_aba_inactive;
}
if(empty($icon_aba_inactive) && !empty($icon_aba))
{
    $icon_aba_inactive = $icon_aba;
}
$app_menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[25] . "",
    'level'    => "0",
    'link'     => "#",
    'hint'     => "" . $nm_var_hint[25] . "",
    'id'       => "item_30",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
    'sc_id'    => "item_30",
    'disabled' => "N",
);
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_articulos_formato']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_articulos_formato']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[26] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_31&sc_apl_menu=form_articulos_formato&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[26] . "",
        'id'       => "item_31",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_31",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_pedidos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_pedidos']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[27] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_37&sc_apl_menu=form_pedidos&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[27] . "",
        'id'       => "item_37",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_37",
        'disabled' => "N",
    );
}
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if(empty($icon_aba) && !empty($icon_aba_inactive))
{
    $icon_aba = $icon_aba_inactive;
}
if(empty($icon_aba_inactive) && !empty($icon_aba))
{
    $icon_aba_inactive = $icon_aba;
}
$app_menu_menuData['data'][] = array(
    'label'    => "" . $this->Nm_lang['lang_menu_security'] . "",
    'level'    => "0",
    'link'     => "#",
    'hint'     => "" . $this->Nm_lang['lang_menu_security'] . "",
    'id'       => "item_1",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
    'sc_id'    => "item_1",
    'disabled' => "N",
);
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_users']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_users']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_users'] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_2&sc_apl_menu=app_grid_sec_users&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $this->Nm_lang['lang_list_users'] . "",
        'id'       => "item_2",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_2",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_apps']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_apps']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_apps'] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_3&sc_apl_menu=app_grid_sec_apps&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $this->Nm_lang['lang_list_apps'] . "",
        'id'       => "item_3",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_3",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_groups']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_groups']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_groups'] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_4&sc_apl_menu=app_grid_sec_groups&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $this->Nm_lang['lang_list_groups'] . "",
        'id'       => "item_4",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_4",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_search_sec_groups']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_search_sec_groups']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['filter']['active']))
    {
        $icon_aba = $arr_menuicons['filter']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['filter']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['filter']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_apps_x_groups'] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_5&sc_apl_menu=app_search_sec_groups&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $this->Nm_lang['lang_list_apps_x_groups'] . "",
        'id'       => "item_5",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_5",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_sync_apps']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_sync_apps']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_sync_apps'] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_6&sc_apl_menu=app_sync_apps&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $this->Nm_lang['lang_list_sync_apps'] . "",
        'id'       => "item_6",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_6",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_change_pswd']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_change_pswd']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_change_pswd'] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_7&sc_apl_menu=app_change_pswd&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $this->Nm_lang['lang_change_pswd'] . "",
        'id'       => "item_7",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_7",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_Login']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_Login']) == "on")
{
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    if(empty($icon_aba) && !empty($icon_aba_inactive))
    {
        $icon_aba = $icon_aba_inactive;
    }
    if(empty($icon_aba_inactive) && !empty($icon_aba))
    {
        $icon_aba_inactive = $icon_aba;
    }
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_exit'] . "",
        'level'    => "0",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_8&sc_apl_menu=app_Login&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $this->Nm_lang['lang_exit'] . "",
        'id'       => "item_8",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " target=\"" . $this->app_menu_target('_parent') . "\"",
        'sc_id'    => "item_8",
        'disabled' => "N",
    );
}

if (isset($_SESSION['scriptcase']['sc_def_menu']['app_menu']))
{
    $arr_menu_usu = $this->nm_arr_menu_recursiv($_SESSION['scriptcase']['sc_def_menu']['app_menu']);
    $this->nm_gera_menus($str_menu_usu, $arr_menu_usu, 1, 'app_menu');
    $app_menu_menuData['data'] = $str_menu_usu;
}
if (is_file("app_menu_help.txt"))
{
    $Arq_WebHelp = file("app_menu_help.txt"); 
    if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
    {
        $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
        $Tmp = explode(";", $Arq_WebHelp[0]); 
        foreach ($Tmp as $Cada_help)
        {
            $Tmp1 = explode(":", $Cada_help); 
            if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "menu" && is_file($str_root . $path_help . $Tmp1[1]))
            {
                $str_icon = "";
                $icon_aba = "";
                $icon_aba_inactive = "";
                if(empty($icon_aba) && isset($arr_menuicons['']['active']))
                {
                    $icon_aba = $arr_menuicons['']['active'];
                }
                if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
                {
                    $icon_aba_inactive = $arr_menuicons['']['inactive'];
                }
                if(empty($icon_aba) && !empty($icon_aba_inactive))
                {
                    $icon_aba = $icon_aba_inactive;
                }
                if(empty($icon_aba_inactive) && !empty($icon_aba))
                {
                    $icon_aba_inactive = $icon_aba;
                }
                $app_menu_menuData['data'][] = array(
                    'label'    => "" . $this->Nm_lang['lang_btns_help_hint'] . "",
                    'level'    => "0",
                    'link'     => "" . $path_help . $Tmp1[1] . "",
                    'hint'     => "" . $this->Nm_lang['lang_btns_help_hint'] . "",
                    'id'       => "item_Help",
                    'icon'     => $str_icon,
                    'icon_aba' => $icon_aba,
                    'icon_aba_inactive' => $icon_aba_inactive,
                    'target'   => "" . $this->app_menu_target('_blank') . "",
                    'sc_id'    => "item_Help",
                    'disabled' => "N",
                );
            }
        }
    }
}

if (isset($_SESSION['scriptcase']['sc_menu_del']['app_menu']) && !empty($_SESSION['scriptcase']['sc_menu_del']['app_menu']))
{
    $nivel = 0;
    $exclui_menu = false;
    foreach ($app_menu_menuData['data'] as $i_menu => $cada_menu)
    {
       if (in_array($cada_menu['id'], $_SESSION['scriptcase']['sc_menu_del']['app_menu']))
       {
          $nivel = $cada_menu['level'];
          $exclui_menu = true;
          unset($app_menu_menuData['data'][$i_menu]);
       }
       elseif ( empty($cada_menu) || ($exclui_menu && $nivel < $cada_menu['level']))
       {
          unset($app_menu_menuData['data'][$i_menu]);
       }
       else
       {
          $exclui_menu = false;
       }
    }
    $Temp_menu = array();
    foreach ($app_menu_menuData['data'] as $i_menu => $cada_menu)
    {
        $Temp_menu[] = $cada_menu;
    }
    $app_menu_menuData['data'] = $Temp_menu;
}

if (isset($_SESSION['scriptcase']['sc_menu_disable']['app_menu']) && !empty($_SESSION['scriptcase']['sc_menu_disable']['app_menu']))
{
    $disable_menu = false;
    foreach ($app_menu_menuData['data'] as $i_menu => $cada_menu)
    {
       if (in_array($cada_menu['id'], $_SESSION['scriptcase']['sc_menu_disable']['app_menu']))
       {
          $nivel = $cada_menu['level'];
          $disable_menu = true;
          $app_menu_menuData['data'][$i_menu]['disabled'] = 'Y';
       }
       elseif (!empty($cada_menu) && $disable_menu && $nivel < $cada_menu['level'])
       { 
          $app_menu_menuData['data'][$i_menu]['disabled'] = 'Y';
       }
       elseif (!empty($cada_menu))
       {
          $disable_menu = false;
       }
    }
}

$flag = 1;
while ($flag == 1)
{
    $flag = 0;
    foreach ($app_menu_menuData['data'] as $chave => $cada_menu)
    {
        if (!empty($cada_menu))
        {
            if (isset($app_menu_menuData['data'][$chave + 1]) && !empty($app_menu_menuData['data'][$chave + 1]))
            {
                if ($app_menu_menuData['data'][$chave]['link'] == "#")
                {
                    if ($app_menu_menuData['data'][$chave]['level'] >= $app_menu_menuData['data'][$chave + 1]['level'] )
                    {
                        unset($app_menu_menuData['data'][$chave]);
                        $flag = 1;
                    }
                }
            }
            elseif ($app_menu_menuData['data'][$chave]['link'] == "#")
            {
                unset($app_menu_menuData['data'][$chave]);
            }
        }
    }
    $Temp_menu = array();
    foreach ($app_menu_menuData['data'] as $i_menu => $cada_menu)
    {
        $Temp_menu[] = $cada_menu;
    }
    $app_menu_menuData['data'] = $Temp_menu;
}

$Str_date = strtolower($_SESSION['scriptcase']['reg_conf']['date_format']);
$Lim   = strlen($Str_date);
$Ult   = "";
$Arr_D = array();
for ($I = 0; $I < $Lim; $I++)
{
    $Char = substr($Str_date, $I, 1);
    if ($Char != $Ult)
    {
        $Arr_D[] = $Char;
    }
    $Ult = $Char;
}
$Prim = true;
$Str  = "";
foreach ($Arr_D as $Cada_d)
{
    $Str .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
    $Str .= $Cada_d;
    $Prim = false;
}
$Str = str_replace("a", "Y", $Str);
$Str = str_replace("y", "Y", $Str);
$nm_data_fixa = date($Str); 
?>
<?php
    $link_default = "";
    if (isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard']) && $_SESSION['scriptcase']['sc_apl_seg']['dashboard'] == "on") 
    { 
    $_SESSION['scriptcase']['app_menu']['apl_inicial'] = "";
    $link_default = " onclick=\"openMenuItem('iframe_app_menu');\" item-href=\"app_menu_form_php.php?sc_item_menu=app_menu&sc_apl_menu=dashboard&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "\"  item-target=\"app_menu_iframe\"";
    } 
    else
    { 
        $_SESSION['scriptcase']['app_menu']['apl_inicial'] = ($NM_scr_iframe != "") ? $NM_scr_iframe : "app_menu_pag_ini.php";
    } 
    $_SESSION['scriptcase']['app_menu']['path_link'] = $path_link;
?>
<div class="ui-layout-west">
<table cellspacing=0 cellpadding=0 class="scMenuTTable" style="height: 100%; width: 100%">
    <tr class="scMenuTTable">
        <td class="scMenuTItem scMenuTTableM" valign="top">
                <table cellpadding=0 cellspacing=0>
                    <tr>
                            <td>
                      <?php
                      echo $this->app_menu_escreveMenu($app_menu_menuData['data']);
                      ?>
                            </td>
                    </tr>
                </table>
        </td>
      </tr>
    </table>
</div>
<div class="ui-layout-center">
  <table cellspacing=0 cellpadding=0 style="height: 100%; width: 100%" cellpadding=0 cellspacing=0>
    <tr>
      
        <td style="border: 0px; height: 100%; width: 100%; padding: 0px">
        <iframe name="app_menu_iframe" id="iframe_app_menu" frameborder="0" class="scMenuIframe" src="<?php echo $_SESSION['scriptcase']['app_menu']['apl_inicial']?>"<?php echo $link_default ?>></iframe>
      </tr>
    </table>
</div>
<script type="text/javascript">
 function nm_out_menu(link)
 {
    if (link == 'javascript:window.close()')
    {
        window.close();
    }
    else
    {
        window.location = (link);
    }
 }
Iframe_atual = "app_menu_iframe";
Tab_links = new Array();
<?php
echo "Tab_links['app_menu']   = \"\";\r\n";
 foreach ($app_menu_menuData['data'] as $ind => $dados_menu)
 {
     if ($dados_menu['link'] != "#")
     {
         echo "Tab_links['" . $dados_menu['id'] . "']   = \"\";\r\n";
     }
}
?>
function openMenuItem(str_id)
{
    str_link   = $('#' + str_id).attr('item-href');
    str_target = $('#' + str_id).attr('item-target');
    str_id = str_id.replace('iframe_app_menu', 'app_menu');
    //test link type
    if (str_link != '' && str_link != '#')
    {
        if (str_link.substring(0, 11) == 'javascript:')
        {
            eval(str_link.substring(11));
        }
        else if (str_link != '#' && str_target != '_parent')
        {
            window.open(str_link, str_target);
        }
        else if (str_link != '#' && str_target == '_parent')
        {
            document.location = str_link;
        }
        <?php
        if ($menu_mobile_hide == 'S' && $menu_mobile_hide_onclick == 'S')
        {
        ?>
            HideMenu();
        <?php
        }
        ?>
    }
}
function writeFastMenu(arr_link)
{
    var link_ok = "";
    for (i = 0; i < arr_link.length; i++) 
    {
        if (link_ok != "")
        {
            link_ok += "<img src='<?php echo $path_imag_cab . "/" . $this->breadcrumbline_separator; ?>'>";
        }
        link_ok += arr_link[i].replace(/#NMIframe#/g, Iframe_atual);
    }
    document.getElementById('links_apls_itens').innerHTML = link_ok;
    document.getElementById('links_apls').style.display = '';
}
function clearFastMenu()
{
    document.getElementById('links_apls_itens').innerHTML = '';
    document.getElementById('links_apls').style.display = 'none';
}
<?php
if (isset($link_default) && !empty($link_default))
{
    echo "   document.getElementById('iframe_app_menu').click();\r\n";
}
?>
</script>
</body>
</html>
<?php
}
/* Target control */
function app_menu_escreveMenu($arr_menu)
{
    $aMenuItemList = array();
    foreach ($arr_menu as $ind => $resto)
    {
        $aMenuItemList[] = $resto;
    }
?>
<div id="css3menut">
    <ul>
        <?php
            for ($i = 0; $i < sizeof($aMenuItemList); $i++) {
            ?>
            
            <?php
                if ('' != $aMenuItemList[$i]['icon'] && file_exists($this->path_imag_apl . "/" . $aMenuItemList[$i]['icon'])) {
                    $iconHtml = 'data-jstree=\'{ "icon" : "../_lib/img/'. $aMenuItemList[$i]['icon'] .'" }\'';
                }
                else {
                    $iconHtml = '';
                }
                $sDisabledClass = '';
                if ('Y' == $aMenuItemList[$i]['disabled']) {
                    $aMenuItemList[$i]['link']   = '#';
                    $aMenuItemList[$i]['target'] = '';
                    $sDisabledClass               = 0 == $aMenuItemList[$i]['level'] ? ' scMenuTItemDisabled' : ' scMenuTSubItemDisabled';
                }
                if ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] < $aMenuItemList[$i + 1]['level']) {
                  if ($aMenuItemList[$i]['link'] == '#')
                  {
                  ?>
                     <li <?php echo $iconHtml; ?>><span class="scMenuTItems<?php echo $sDisabledClass; ?>"><?php echo $aMenuItemList[$i]['label']; ?></span><ul>
                  <?php
                  }
                  else
                  {
                  ?>
                     <li <?php echo $iconHtml; ?>><span class="scMenuTItems scMenuTItem"><a href="<?php echo $aMenuItemList[$i]['link']; ?>" id="<?php echo $aMenuItemList[$i]['id']; ?>" title="<?php echo $aMenuItemList[$i]['hint']; ?>"<?php echo $aMenuItemList[$i]['target']; ?> class="scMenuTItem"><?php echo $aMenuItemList[$i]['label']; ?></a></span><ul>
                  <?php
                  }
                }
                else
                {
                  if ($aMenuItemList[$i]['link'] == '#')
                  {
                    ?>
                    <li <?php echo $iconHtml; ?> class="scMenuTItems<?php echo $sDisabledClass; ?>"><a href='#' target=''><?php echo $aMenuItemList[$i]['label']; ?></a>
                    <?php
                  }
                  else
                  {
                    ?>
                    <li <?php echo $iconHtml; ?> class="scMenuTItems scMenuTItem"><a href="<?php echo $aMenuItemList[$i]['link']; ?>" id="<?php echo $aMenuItemList[$i]['id']; ?>" title="<?php echo $aMenuItemList[$i]['hint']; ?>"<?php echo $aMenuItemList[$i]['target']; ?> class="scMenuTItem"><?php echo $aMenuItemList[$i]['label']; ?></a>
                    <?php
                  }
                }
                if ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] == $aMenuItemList[$i + 1]['level']) {
                ?>
                    </li>
                <?php
                }
                elseif ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > $aMenuItemList[$i + 1]['level']) {
                ?>
                    </li><?php echo str_repeat('</ul></li>', $aMenuItemList[$i]['level'] - $aMenuItemList[$i + 1]['level']); ?>
                <?php
                }
                elseif (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > 0) {
                ?>
                    </li><?php echo str_repeat('</ul></li>', $aMenuItemList[$i]['level']); ?>
                <?php
                }
                elseif (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] == 0) {
                ?>
                    </li>
                <?php
                }
            }
        ?>
    </ul>
</div>
<?php
}
/* Target control */
   function app_menu_target($str_target)
   {
       global $app_menu_menuData;
       if ('_blank' == $str_target)
       {
           return '_blank';
       }
       elseif ('_parent' == $str_target)
       {
           return '_parent';
       }
       elseif ($app_menu_menuData['iframe'])
       {
           return 'app_menu_iframe';
       }
       else
       {
           return $str_target;
       }
   }

   function nm_prot_aspas($str_item)
   {
       return str_replace('"', '\"', $str_item);
   }

   function nm_gera_menus(&$str_line_ret, $arr_menu_usu, $int_level, $nome_aplicacao)
   {
       global $app_menu_menuData; 
       $str_marg = str_repeat('&nbsp;', 2);
       $str_marg = '';
       foreach ($arr_menu_usu as $arr_item)
       {
           $str_line   = array();
           $str_line['label']    = $this->nm_prot_aspas($arr_item['label']);
           $str_line['level']    = $int_level - 1;
           $str_line['link']     = "";
           $nome_apl = $arr_item['link'];
           $pos = strrpos($nome_apl, "/");
           if ($pos !== false)
           {
               $nome_apl = substr($nome_apl, $pos + 1);
           }
           if ('' != $arr_item['link'])
           {
               if ($arr_item['target'] == '_parent')
               {
                    $str_line['link'] = "javascript:parent.nm_out_menu('app_menu_form_php.php?sc_item_menu=" . $arr_item['id'] . "&sc_apl_menu=" . $nome_apl . "&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "')";  
               }
               else
               {
                    $str_line['link'] = "app_menu_form_php.php?sc_item_menu=" . $arr_item['id'] . "&sc_apl_menu=" . $nome_apl . "&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""; 
               }
           }
           elseif ($arr_item['target'] == '_parent')
           {
               $str_line['link'] = "javascript:parent.nm_out_menu('" . $_SESSION['scriptcase']['sc_saida_app_menu'] . "')"; 
           }
           $str_line['hint']     = ('' != $arr_item['hint']) ? $this->nm_prot_aspas($arr_item['hint']) : '';
           $str_line['id']       = $arr_item['id'];
           $str_line['icon']     = ('' != $arr_item['icon_on']) ? $arr_item['icon_on'] : '';
           $str_line['icon_aba'] = (isset($arr_item['icon_aba']) && !empty($arr_item['icon_aba'])) ? $arr_item['icon_aba'] : '';
           $str_line['icon_aba_inactive'] = (isset($arr_item['icon_aba_inactive']) && !empty($arr_item['icon_aba_inactive'])) ? $arr_item['icon_aba_inactive'] : '';
           if ('' == $arr_item['link'] && $arr_item['target'] == '_parent')
           {
               $str_line['target'] = '_parent';
           }
           else
           {
                $str_line['target'] = ('' != $arr_item['target'] && '' != $arr_item['link']) ?  $this->app_menu_target( $arr_item['target']) : "_self"; 
           }
           $str_line['target']   = ' target="' . $str_line['target']  . '" ';
           $str_line['sc_id']    = $arr_item['id'];
           $str_line['disabled'] = "N";
           $str_line_ret[] = $str_line;
           if (!empty($arr_item['menu_itens']))
           {
               $this->nm_gera_menus($str_line_ret, $arr_item['menu_itens'], $int_level + 1, $nome_aplicacao);
           }
       }
   }

   function nm_arr_menu_recursiv($arr, $id_pai = '')
   {
         $arr_return = array();
         foreach ($arr as $id_menu => $arr_menu)
         {
             if ($id_pai == $arr_menu['pai']) 
             {
                 $arr_return[] = array('label'      => $arr_menu['label'],
                                        'link'       => $arr_menu['link'],
                                        'target'     => $arr_menu['target'],
                                        'icon_on'    => $arr_menu['icon'],
                                        'icon_aba'   => $arr_menu['icon_aba'],
                                        'icon_aba_inactive'   => $arr_menu['icon_aba_inactive'],
                                        'hint'       => $arr_menu['hint'],
                                        'id'         => $id_menu,
                                        'menu_itens' => $this->nm_arr_menu_recursiv($arr, $id_menu));
             }
         }
         return $arr_return;
   }
   function Gera_sc_init($apl_menu)
   {
        $_SESSION['scriptcase']['app_menu']['sc_init'][$apl_menu] = 1;
        return  1;
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
       $_SESSION['scriptcase']['reg_conf']['html_dir_only'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "";
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }

}
if ((isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "force_lang") || (isset($_GET['nmgp_opcao']) && $_GET['nmgp_opcao'] == "force_lang"))
{
    if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "force_lang")
    {
        $nmgp_opcao  = $_POST['nmgp_opcao'];
        $nmgp_idioma = $_POST['nmgp_idioma'];
    }
    else
    {
        $nmgp_opcao  = $_GET['nmgp_opcao'];
        $nmgp_idioma = $_GET['nmgp_idioma'];
    }
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
$contr_app_menu = new app_menu_class;
$contr_app_menu->app_menu_menu();

?>
