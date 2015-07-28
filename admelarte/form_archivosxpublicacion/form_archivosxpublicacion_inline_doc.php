<?php
   session_cache_limiter("");
   session_start();

   include_once 'form_archivosxpublicacion_inline_nmutf8.php';
   include_once 'form_archivosxpublicacion_inline_doc_name.php';

   if (!empty($_GET))
   {
       foreach ($_GET as $nmgp_var => $nmgp_val)
       {
            $$nmgp_var = NM_utf8_decode(NM_utf8_urldecode($nmgp_val));
            $$nmgp_var = str_replace('**Plus**', '+', $$nmgp_var);
            $$nmgp_var = str_replace('**Jvel**', '#', $$nmgp_var);
            $$nmgp_var = str_replace('**Ecom**', '&', $$nmgp_var);
            $$nmgp_var = str_replace('**Perc**', '%', $$nmgp_var);
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
       $trab_doc      = $root . $_SESSION['scriptcase']['form_archivosxpublicacion_inline']['glo_nm_path_imag_temp'] . "/sc_" . $nm_nome_doc;
   }
   else
   {
       $path_raiz = $_SESSION['sc_session'][$script_case_init][$nm_cod_apl]['path_doc'];
       $sub_path  = isset($_SESSION['sc_session'][$script_case_init][$nm_cod_apl]['sub_dir'][$nm_cod_doc]) ? $_SESSION['sc_session'][$script_case_init][$nm_cod_apl]['sub_dir'][$nm_cod_doc] : '';
       $trab_doc = $path_raiz . $sub_path . "/" . $nm_nome_doc;
       $trab_doc = str_replace("\\", "/", $trab_doc);
   }
   if (is_file($trab_doc))
   {
       header("Pragma: public", true);
       header("Content-type: application/force-download");
       $sProtectedFilename = sc_filename_protect_chars($nm_nome_doc);
       $sProtectedFilename = urlencode($sProtectedFilename);
       $sProtectedFilename = sc_filename_unprotect_chars($sProtectedFilename);
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
