<?php
   session_cache_limiter("");
   session_start();

   include_once 'form_publicaciones_nmutf8.php';

   if (!empty($_GET))
   {
       foreach ($_GET as $nmgp_var => $nmgp_val)
       {
            $$nmgp_var = NM_utf8_decode(NM_utf8_urldecode($nmgp_val));
            $$nmgp_var = str_replace('**Plus**', '+', $$nmgp_var);
            $$nmgp_var = str_replace('**Jvel**', '#', $$nmgp_var);
            $$nmgp_var = str_replace('**Ecom**', '&', $$nmgp_var);
       }
   }
   if ($nm_cod_doc == "documento_db")
   {
       $NM_dir_atual = getcwd();
       if (empty($NM_dir_atual))
       {
          $str_path_sys    = (isset($_SERVER['PATH_TRANSLATED'])) ? $_SERVER['PATH_TRANSLATED'] : $_SERVER['SCRIPT_FILENAME'];
          $str_path_sys    = str_replace("\\", '/', $str_path_sys);
       }
       else
       {
           $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
           $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
       }
       $str_path_web  = $_SERVER['PHP_SELF'];
       $str_path_web  = str_replace("\\", '/', $str_path_web);
       $root          = substr($str_path_sys, 0, -1 * strlen($str_path_web));
       $trab_doc      = $root . $_SESSION['scriptcase']['form_publicaciones']['glo_nm_path_imag_temp'] . "/sc_" . $nm_nome_doc;
   }
   else
   {
       $path_raiz = $_SESSION['sc_session'][$script_case_init][$nm_cod_apl]['path_doc'];
       $sub_path  = $_SESSION['sc_session'][$script_case_init][$nm_cod_apl]['sub_dir'][$nm_cod_doc];
       $trab_doc = $path_raiz . $sub_path . "/" . $nm_nome_doc;
       $trab_doc = str_replace("\\", "/", $trab_doc);
   }
   if (is_file($trab_doc))  
   { 
       header("Pragma: public", true);
       header("Content-type: application/force-download");
       $aProtectBasic = array(
           "'" => '__SC_QUOTES__',
           ' ' => '__SC_SPACE__',
           '!' => '__SC_EXCLAMATION__',
           ',' => '__SC_COMMA__',
           '-' => '__SC_MINUS__',
           '+' => '__SC_PLUS__',
           '=' => '__SC_EQUAL__',
           '(' => '__SC_PARENTHESIS_LEFT__',
           ')' => '__SC_PARENTHESIS_RIGHT__',
           '[' => '__SC_BRACKET_LEFT__',
           ']' => '__SC_BRACKET_RIGHT__',
           '{' => '__SC_CURLYBRACE_LEFT__',
           '}' => '__SC_CURLYBRACE_RIGHT__',
           '&' => '__SC_AMPERSAND__',
           '%' => '__SC_PERCENT__',
           '$' => '__SC_DOLLAR__',
           '#' => '__SC_NUMBER__',
           '@' => '__SC_AT__',
           ';' => '__SC_SEMMICOLON__',
           '~' => '__SC_TILDE__',
           '^' => '__SC_CARET__',
       );
       $aProtectUtf8 = array(
           '´' => '__SC_ACUTE__',
           '`' => '__SC_GRAVE__',
           '¨' => '__SC_UMLAUT__',
           'á' => '__SC_aACUTE__',
           'à' => '__SC_aGRAVE__',
           'ã' => '__SC_aTILDE__',
           'â' => '__SC_aCARET__',
           'ä' => '__SC_aUMLAUT__',
           'Á' => '__SC_AACUTE__',
           'À' => '__SC_AGRAVE__',
           'Ã' => '__SC_ATILDE__',
           'Â' => '__SC_ACARET__',
           'Ä' => '__SC_AUMLAUT__',
           'é' => '__SC_eACUTE__',
           'è' => '__SC_eGRAVE__',
           'ê' => '__SC_eCARET__',
           'ë' => '__SC_eUMLAUT__',
           'É' => '__SC_EACUTE__',
           'È' => '__SC_EGRAVE__',
           'Ê' => '__SC_ECARET__',
           'Ë' => '__SC_EUMLAUT__',
           'í' => '__SC_iACUTE__',
           'ì' => '__SC_iGRAVE__',
           'î' => '__SC_iCARET__',
           'ï' => '__SC_iUMLAUT__',
           'Í' => '__SC_IACUTE__',
           'Ì' => '__SC_IGRAVE__',
           'Î' => '__SC_ICARET__',
           'Ï' => '__SC_IUMLAUT__',
           'ó' => '__SC_oACUTE__',
           'ò' => '__SC_oGRAVE__',
           'õ' => '__SC_oTILDE__',
           'ô' => '__SC_oCARET__',
           'ö' => '__SC_oUMLAUT__',
           'Ó' => '__SC_OACUTE__',
           'Ò' => '__SC_OGRAVE__',
           'Õ' => '__SC_OTILDE__',
           'Ô' => '__SC_OCARET__',
           'Ö' => '__SC_OUMLAUT__',
           'ú' => '__SC_uACUTE__',
           'ù' => '__SC_uGRAVE__',
           'û' => '__SC_uCARET__',
           'ü' => '__SC_uUMLAUT__',
           'Ú' => '__SC_UACUTE__',
           'Ù' => '__SC_UGRAVE__',
           'Û' => '__SC_UCARET__',
           'Ü' => '__SC_UUMLAUT__',
           'ý' => '__SC_yACUTE__',
           'ÿ' => '__SC_yUMLAUT__',
           'Ý' => '__SC_YACUTE__',
           'ç' => '__SC_cCEDILLA__',
           'Ç' => '__SC_CCEDILLA__',
           'ñ' => '__SC_nTILDE__',
           'Ñ' => '__SC_NTILDE__',
       );
       if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
       {
           $aTmpList = array();
           foreach ($aProtectUtf8 as $sChar => $sCode)
           {
               $aTmpList[ NM_conv_charset($sChar, $_SESSION['scriptcase']['charset'], 'UTF-8') ] = $sCode;
           }
           $aProtectUtf8 = $aTmpList;
       }
       $sProtectedFilename = str_replace(array_keys($aProtectBasic), array_values($aProtectBasic), $nm_nome_doc);
       $sProtectedFilename = str_replace(array_keys($aProtectUtf8),  array_values($aProtectUtf8),  $sProtectedFilename);
       $sProtectedFilename = urlencode($sProtectedFilename);
       $sProtectedFilename = str_replace(array_values($aProtectBasic), array_keys($aProtectBasic), $sProtectedFilename);
       $sProtectedFilename = str_replace(array_values($aProtectUtf8),  array_keys($aProtectUtf8),  $sProtectedFilename);
       if (isset($_SERVER['HTTP_USER_AGENT']) && false !== strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'chrome'))
       {
           header("Content-Disposition: attachment; filename=\"" . $sProtectedFilename . "\"");
       }
       elseif (isset($_SERVER['HTTP_USER_AGENT']) && false !== strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'applewebkit'))
       {
           header("Content-Disposition: attachment; filename=\"" . $nm_nome_doc . "\"");
       }
       elseif (function_exists('NM_utf8_urldecode') && $nm_nome_doc != NM_utf8_urldecode($nm_nome_doc))
       {
           header("Content-Disposition: attachment; filename=\"" . $nm_nome_doc . "\" filename*=UTF-8''" . $sProtectedFilename);
       }
       else
       {
           header("Content-Disposition: attachment; filename=\"" . $sProtectedFilename . "\"");
       }
       readfile($trab_doc);
   } 
   else 
   { 
       $STR_lang    = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "es";
       $NM_arq_lang = "../_lib/lang/" . $STR_lang . ".lang.php";
       if (is_file($NM_arq_lang) && $STR_lang != "es")
       {
           $Lixo = file($NM_arq_lang);
           foreach ($Lixo as $Cada_lin) 
           {
               $Tst = explode("=", $Cada_lin); 
               if (strpos($Tst[0], "lang_errm_fnfd") !== false)
               {
                   $Nm_lang['lang_errm_fnfd'] = substr(trim($Tst[1]), 1, -2);
               }
           }
       }
       else
       {
           $Nm_lang['lang_errm_fnfd'] = "";
       }
       echo $Nm_lang['lang_errm_fnfd'] . ": " . $nm_nome_doc;
   } 
   exit;
?>
