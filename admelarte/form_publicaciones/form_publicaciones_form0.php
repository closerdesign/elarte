<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - publicaciones"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - publicaciones"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
<?php
header("X-XSS-Protection: 0");
?>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}

?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
 </SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <style type="text/css">
  #quicksearchph_t {
   position: relative;
  }
  #quicksearchph_t img {
   position: absolute;
   top: 0;
   right: 0;
  }
 </style>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
?>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_tiny_mce; ?>/tiny_mce.js"></SCRIPT>
 <SCRIPT type="text/javascript">
 tinyMCE.init({
  mode: "textareas",
  theme: "advanced",
<?php
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['descripcion']) && $this->nmgp_cmp_readonly['descripcion'] == 'on')
{
    unset($this->nmgp_cmp_readonly['descripcion']);
?>
   readonly: "true",
<?php
}
$sLangTest = substr($this->Ini->str_lang, 0, 2);
switch ($sLangTest)
{
    case 'ar':
    case 'de':
    case 'en':
    case 'es':
    case 'fr':
    case 'it':
    case 'ja':
    case 'nl':
    case 'pt':
    case 'ru':
    case 'sv':
    case 'zh':
        echo "  language: \"" . $sLangTest . "\",\r\n";
        break;
    default:
        echo "  language: \"en\",\r\n";
        break;
}
?>
  plugins: "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
  theme_advanced_buttons1: "bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,bullist,numlist,undo,redo,fontselect,fontsizeselect,forecolor",
  theme_advanced_buttons2: "tablecontrols,link,unlink,emotions,image",
  theme_advanced_buttons3: "",
  theme_advanced_path : false,
  theme_advanced_toolbar_align: "center",
  theme_advanced_toolbar_location: "top",
  editor_selector: "mceEditor_descripcion"
 });
 </SCRIPT>

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_publicaciones_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_binicio_off = "<?php echo $this->arr_buttons['binicio_off']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bavanca_off = "<?php echo $this->arr_buttons['bavanca_off']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bretorna_off = "<?php echo $this->arr_buttons['bretorna_off']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_bfinal_off  = "<?php echo $this->arr_buttons['bfinal_off']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).show();
       $("#sc_b_ini_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_ini_" + str_pos).show();
       $("#gbl_sc_b_ini_off_" + str_pos).hide();
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).show();
       $("#sc_b_ret_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_ret_" + str_pos).show();
       $("#gbl_sc_b_ret_off_" + str_pos).hide();
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).hide();
       $("#sc_b_ini_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_ini_" + str_pos).hide();
       $("#gbl_sc_b_ini_off_" + str_pos).show();
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).hide();
       $("#sc_b_ret_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_ret_" + str_pos).hide();
       $("#gbl_sc_b_ret_off_" + str_pos).show();
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).show();
       $("#sc_b_fim_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_fim_" + str_pos).show();
       $("#gbl_sc_b_fim_off_" + str_pos).hide();
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).show();
       $("#sc_b_avc_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_avc_" + str_pos).show();
       $("#gbl_sc_b_avc_off_" + str_pos).hide();
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).hide();
       $("#sc_b_fim_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_fim_" + str_pos).hide();
       $("#gbl_sc_b_fim_off_" + str_pos).show();
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).hide();
       $("#sc_b_avc_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_avc_" + str_pos).hide();
       $("#gbl_sc_b_avc_off_" + str_pos).show();
<?php
    }
?>
 }
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}
<?php

include_once('form_publicaciones_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).load(function() {
     scQuickSearchInit(false, '');
     $('#SC_fast_search_t').listen();
     scQuickSearchKeyUp('t', null);
     scQSInit = false;
   });
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchInit(bPosOnly, sPos) {
     if (!bPosOnly) {
       if ('' == sPos || 't' == sPos) scQuickSearchSize('SC_fast_search_t', 'SC_fast_search_close_t', 'SC_fast_search_submit_t', 'quicksearchph_t');
     }
   }
   function scQuickSearchSize(sIdInput, sIdClose, sIdSubmit, sPlaceHolder) {
     var oInput = $('#' + sIdInput),
         oClose = $('#' + sIdClose),
         oSubmit = $('#' + sIdSubmit),
         oPlace = $('#' + sPlaceHolder),
         iInputP = parseInt(oInput.css('padding-right')) || 0,
         iInputB = parseInt(oInput.css('border-right-width')) || 0,
         iInputW = oInput.outerWidth(),
         iPlaceW = oPlace.outerWidth(),
         oInputO = oInput.offset(),
         oPlaceO = oPlace.offset(),
         iNewRight;
     iNewRight = (iPlaceW - iInputW) - (oInputO.left - oPlaceO.left) + iInputB + 1;
     oInput.css({
       'height': Math.max(oInput.height(), 16) + 'px',
       'padding-right': iInputP + 16 + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px'
     });
     oClose.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
     oSubmit.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
   }
   function scQuickSearchKeyUp(sPos, e) {
     if ('' != scQSInitVal && $('#SC_fast_search_' + sPos).val() == scQSInitVal && scQSInit) {
       $('#SC_fast_search_close_' + sPos).show();
       $('#SC_fast_search_submit_' + sPos).hide();
     }
     else {
       $('#SC_fast_search_close_' + sPos).hide();
       $('#SC_fast_search_submit_' + sPos).show();
     }
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
     }
   }
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['recarga'];
}
?>
<body class="scFormPage" style="<?php echo $str_iframe_body; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_publicaciones_js0.php");
?>
<script type="text/javascript" src="<?php echo str_replace("{str_idioma}", $this->Ini->str_lang, "../_lib/js/tab_erro_{str_idioma}.js"); ?>"> 
</script> 
<script type="text/javascript"> 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
 </script>
<form name="F1" method="post" enctype="multipart/form-data" 
               action="./" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['insert_validation']; ?>">
<?php
}
?>
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo NM_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="script_case_session" value="<?php  echo NM_encode_input(session_id()); ?>"> 
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>"> 
<input type="hidden" name="upload_file_flag" value="">
<input type="hidden" name="upload_file_check" value="">
<input type="hidden" name="upload_file_name" value="">
<input type="hidden" name="upload_file_temp" value="">
<input type="hidden" name="upload_file_libs" value="">
<input type="hidden" name="upload_file_height" value="">
<input type="hidden" name="upload_file_width" value="">
<input type="hidden" name="upload_file_aspect" value="">
<input type="hidden" name="upload_file_type" value="">
<input type="hidden" name="portada_salva" value="<?php  echo NM_encode_input($this->portada) ?>">
<input type="hidden" name="banner_salva" value="<?php  echo NM_encode_input($this->banner) ?>">
<input type="hidden" name="bannermovil_salva" value="<?php  echo NM_encode_input($this->bannermovil) ?>">
<input type="hidden" name="bannerdesktop_salva" value="<?php  echo NM_encode_input($this->bannerdesktop) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_publicaciones'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_publicaciones'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<script type="text/javascript">
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
var scMsgDefButton = "Ok";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0 >
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['mostra_cab'] != "N"))
  {
?>
<tr><td>
<style>
#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 
#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}
</style>

<div style="width: 100%">
 <div class="scFormHeader" style="height:11px; display: block; border-width:0px; "></div>
 <div style="height:37px; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block">
 	<table style="width:100%; border-collapse:collapse; padding:0;">
    	<tr>
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - publicaciones"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - publicaciones"; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span><?php echo date($this->dateDefaultFormat()); ?></span></td>
        </tr>
    </table>		 
 </div>
</div>
</td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['fast_search'][2] : "";
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <input type="hidden" name="nmgp_fast_search_t" value="SC_all_Cmp">
          <input type="hidden" name="nmgp_cond_fast_search_t" value="qp">
          <script type="text/javascript">var scQSInitVal = "<?php echo $OPC_dat ?>";</script>
          <span id="quicksearchph_t">
           <input type="text" id="SC_fast_search_t" class="scFormToolbarInput" style="vertical-align: middle" name="nmgp_arg_fast_search_t" value="<?php echo NM_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{watermark:'<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>', watermarkClass: 'scFormToolbarInputWm', maxLength: 255}">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_close_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = ''; nm_move('fast_search', 't');">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_submit_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
          </span>
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "nm_move ('novo');", "nm_move ('novo');", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "nm_atualiza ('incluir');", "nm_atualiza ('incluir');", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "" . $this->NM_cancel_insert_new . " document.F5.submit();", "" . $this->NM_cancel_insert_new . " document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "nm_atualiza ('alterar');", "nm_atualiza ('alterar');", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "nm_atualiza ('excluir');", "nm_atualiza ('excluir');", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['Archivos'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "archivos", "sc_btn_Archivos()", "sc_btn_Archivos()", "sc_Archivos_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && ($opcao_botoes != "novo")) {
        $sCondStyle = ($this->nmgp_botoes['Archivos'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "archivos", "sc_btn_Archivos()", "sc_btn_Archivos()", "sc_Archivos_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] != "R") && (!$this->Embutida_call)) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] == "R") && (!$this->Embutida_call)) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['empty_filter'] = true;
       }
       echo "</td></tr><tr><td align=center>";
       echo "<font face=\"" . $this->Ini->pag_fonte_tipo . "\" color=\"" . $this->Ini->cor_txt_grid . "\" size=\"2\"><b>" . $this->Ini->Nm_lang['lang_errm_empt'] . "</b></font>";
       echo "</td></tr>";
  }
  else
  {
?>
<script type="text/javascript">
var pag_ativa = "form_publicaciones_form0";
</script>
<ul class="scTabLine">
<?php
    if (empty($nmgp_num_form) || $nmgp_num_form == "form_publicaciones_form0")
    {
        $css_celula = "scTabActive";
    }
    else
    {
        $css_celula = "scTabInactive";
    }
?>
   <li id="id_form_publicaciones_form0" class="<?php echo $css_celula; ?>">
    <a href="javascript: sc_exib_ocult_pag ('form_publicaciones_form0')">
     Básicos
    </a>
   </li>
<?php
    if ($nmgp_num_form == "form_publicaciones_form1")
    {
        $css_celula = "scTabActive";
    }
    else
    {
        $css_celula = "scTabInactive";
    }
?>
   <li id="id_form_publicaciones_form1" class="<?php echo $css_celula; ?>">
    <a href="javascript: sc_exib_ocult_pag ('form_publicaciones_form1')">
     Publicidad
    </a>
   </li>
</ul>
<div style='clear:both'></div>
</td></tr> 
<tr><td style="padding: 0px">
<div id="form_publicaciones_form0" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><input type="hidden" name="portada_ul_name" id="id_sc_field_portada_ul_name" value="<?php echo NM_encode_input($this->portada_ul_name);?>">
<input type="hidden" name="portada_ul_type" id="id_sc_field_portada_ul_type" value="<?php echo NM_encode_input($this->portada_ul_type);?>">
<input type="hidden" name="banner_ul_name" id="id_sc_field_banner_ul_name" value="<?php echo NM_encode_input($this->banner_ul_name);?>">
<input type="hidden" name="banner_ul_type" id="id_sc_field_banner_ul_type" value="<?php echo NM_encode_input($this->banner_ul_type);?>">
<input type="hidden" name="bannermovil_ul_name" id="id_sc_field_bannermovil_ul_name" value="<?php echo NM_encode_input($this->bannermovil_ul_name);?>">
<input type="hidden" name="bannermovil_ul_type" id="id_sc_field_bannermovil_ul_type" value="<?php echo NM_encode_input($this->bannermovil_ul_type);?>">
<input type="hidden" name="bannerdesktop_ul_name" id="id_sc_field_bannerdesktop_ul_name" value="<?php echo NM_encode_input($this->bannerdesktop_ul_name);?>">
<input type="hidden" name="bannerdesktop_ul_type" id="id_sc_field_bannerdesktop_ul_type" value="<?php echo NM_encode_input($this->bannerdesktop_ul_type);?>">
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['codps']))
           {
               $this->nmgp_cmp_readonly['codps'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['codps']))
    {
        $this->nm_new_label['codps'] = "Cod Ps";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $codps = $this->codps;
   $sStyleHidden_codps = '';
   if (isset($this->nmgp_cmp_hidden['codps']) && $this->nmgp_cmp_hidden['codps'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['codps']);
       $sStyleHidden_codps = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_codps = 'display: none;';
   $sStyleReadInp_codps = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["codps"]) &&  $this->nmgp_cmp_readonly["codps"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['codps']);
       $sStyleReadLab_codps = '';
       $sStyleReadInp_codps = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['codps']) && $this->nmgp_cmp_hidden['codps'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="codps" value="<?php echo NM_encode_input($codps) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_codps" style="<?php echo $sStyleHidden_codps; ?>;"><span id="id_label_codps"><?php echo $this->nm_new_label['codps']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_codps" style="<?php echo $sStyleHidden_codps; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["codps"]) &&  $this->nmgp_cmp_readonly["codps"] == "on")) { 

 ?>
<input type="hidden" name="codps" value="<?php echo NM_encode_input($codps) . "\"><span id=\"id_ajax_label_codps\">" . $codps . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_codps" class="sc-ui-readonly-codps" style=";<?php echo $sStyleReadLab_codps; ?>"><?php echo NM_encode_input($this->codps); ?></span><span id="id_read_off_codps" style="white-space: nowrap;<?php echo $sStyleReadInp_codps; ?>">
 <input class="sc-js-input scFormObjectOdd" style="text-align:left;" id="id_sc_field_codps" type=text name="codps" value="<?php echo NM_encode_input($codps) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['codps']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['codps']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_codps_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_codps_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['titulo']))
    {
        $this->nm_new_label['titulo'] = "Titulo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $titulo = $this->titulo;
   $sStyleHidden_titulo = '';
   if (isset($this->nmgp_cmp_hidden['titulo']) && $this->nmgp_cmp_hidden['titulo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['titulo']);
       $sStyleHidden_titulo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_titulo = 'display: none;';
   $sStyleReadInp_titulo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['titulo']) && $this->nmgp_cmp_readonly['titulo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['titulo']);
       $sStyleReadLab_titulo = '';
       $sStyleReadInp_titulo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['titulo']) && $this->nmgp_cmp_hidden['titulo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="titulo" value="<?php echo NM_encode_input($titulo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_titulo" style="<?php echo $sStyleHidden_titulo; ?>;"><span id="id_label_titulo"><?php echo $this->nm_new_label['titulo']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_titulo" style="<?php echo $sStyleHidden_titulo; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["titulo"]) &&  $this->nmgp_cmp_readonly["titulo"] == "on") { 

 ?>
<input type="hidden" name="titulo" value="<?php echo NM_encode_input($titulo) . "\">" . $titulo . ""; ?>
<?php } else { ?>
<span id="id_read_on_titulo" class="sc-ui-readonly-titulo" style=";<?php echo $sStyleReadLab_titulo; ?>"><?php echo NM_encode_input($this->titulo); ?></span><span id="id_read_off_titulo" style="white-space: nowrap;<?php echo $sStyleReadInp_titulo; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_titulo" type=text name="titulo" value="<?php echo NM_encode_input($titulo) ?>"
 size=50 maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_titulo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_titulo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['portada']))
    {
        $this->nm_new_label['portada'] = "Portada";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $portada = $this->portada;
   $sStyleHidden_portada = '';
   if (isset($this->nmgp_cmp_hidden['portada']) && $this->nmgp_cmp_hidden['portada'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['portada']);
       $sStyleHidden_portada = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_portada = 'display: none;';
   $sStyleReadInp_portada = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['portada']) && $this->nmgp_cmp_readonly['portada'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['portada']);
       $sStyleReadLab_portada = '';
       $sStyleReadInp_portada = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['portada']) && $this->nmgp_cmp_hidden['portada'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="portada" value="<?php echo NM_encode_input($portada) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_portada" style="<?php echo $sStyleHidden_portada; ?>;"><span id="id_label_portada"><?php echo $this->nm_new_label['portada']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_portada" style="<?php echo $sStyleHidden_portada; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
 <script>var var_ajax_img_portada = '<?php echo $out1_portada; ?>';</script><?php if (!empty($out_portada)){ echo "<a id=\"id_ajax_link_portada\" href=\"javascript:nm_mostra_img(var_ajax_img_portada, '" . $this->nmgp_return_img['portada'][0] . "', '" . $this->nmgp_return_img['portada'][1] . "')\">$portada</a>"; if (!empty($portada)){ echo "<br>";} } else { echo "<img id=\"id_ajax_img_portada\" border=\"0\" style=\"display: none\"> &nbsp;<span id=\"txt_ajax_img_portada\"></span><br />"; } ?>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["portada"]) &&  $this->nmgp_cmp_readonly["portada"] == "on") { 

 ?>
<img id=\"portada_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="portada" value="<?php echo NM_encode_input($portada) . "\">" . $portada . ""; ?>
<?php } else { ?>
<span id="id_read_off_portada" style="white-space: nowrap;<?php echo $sStyleReadInp_portada; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" type="file" name="portada[]" id="id_sc_field_portada" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>" alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><span id="chk_ajax_img_portada"<?php if ($this->nmgp_opcao == "novo" || empty($portada)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="portada_limpa" value="<?php echo $portada_limpa . '" '; if ($portada_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="portada_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_sc_dragdrop_portada" class="scFormDataDragNDrop"><?php echo $this->Ini->Nm_lang['lang_errm_mu_dragimg'] ?></div>
<div id="id_img_loader_portada" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_portada" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_portada_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_portada_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['descripcion']))
    {
        $this->nm_new_label['descripcion'] = "Descripcion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $descripcion = $this->descripcion;
   $sStyleHidden_descripcion = '';
   if (isset($this->nmgp_cmp_hidden['descripcion']) && $this->nmgp_cmp_hidden['descripcion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['descripcion']);
       $sStyleHidden_descripcion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_descripcion = 'display: none;';
   $sStyleReadInp_descripcion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['descripcion']) && $this->nmgp_cmp_readonly['descripcion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['descripcion']);
       $sStyleReadLab_descripcion = '';
       $sStyleReadInp_descripcion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['descripcion']) && $this->nmgp_cmp_hidden['descripcion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="descripcion" value="<?php echo NM_encode_input($descripcion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_descripcion" style="<?php echo $sStyleHidden_descripcion; ?>;"><span id="id_label_descripcion"><?php echo $this->nm_new_label['descripcion']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_descripcion" style="<?php echo $sStyleHidden_descripcion; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px"><span id="id_read_on_descripcion" style="<?php echo $sStyleReadLab_descripcion; ?>"><?php echo $this->descripcion; ?></span><span id="id_read_off_descripcion" style="<?php echo $sStyleReadInp_descripcion; ?>"><textarea id="descripcion" name="descripcion" cols="50" rows="10" class="mceEditor_descripcion" style="width: 100%; height:200px;"><?php echo $this->descripcion; ?></textarea>
</span></td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_descripcion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_descripcion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['precio']))
    {
        $this->nm_new_label['precio'] = "Precio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $precio = $this->precio;
   $sStyleHidden_precio = '';
   if (isset($this->nmgp_cmp_hidden['precio']) && $this->nmgp_cmp_hidden['precio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['precio']);
       $sStyleHidden_precio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_precio = 'display: none;';
   $sStyleReadInp_precio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['precio']) && $this->nmgp_cmp_readonly['precio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['precio']);
       $sStyleReadLab_precio = '';
       $sStyleReadInp_precio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['precio']) && $this->nmgp_cmp_hidden['precio'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="precio" value="<?php echo NM_encode_input($precio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_precio" style="<?php echo $sStyleHidden_precio; ?>;"><span id="id_label_precio"><?php echo $this->nm_new_label['precio']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_precio" style="<?php echo $sStyleHidden_precio; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["precio"]) &&  $this->nmgp_cmp_readonly["precio"] == "on") { 

 ?>
<input type="hidden" name="precio" value="<?php echo NM_encode_input($precio) . "\">" . $precio . ""; ?>
<?php } else { ?>
<span id="id_read_on_precio" class="sc-ui-readonly-precio" style=";<?php echo $sStyleReadLab_precio; ?>"><?php echo NM_encode_input($this->precio); ?></span><span id="id_read_off_precio" style="white-space: nowrap;<?php echo $sStyleReadInp_precio; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_precio" type=text name="precio" value="<?php echo NM_encode_input($precio) ?>"
 size=50 maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("0123456789.") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_precio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_precio_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['isbn']))
    {
        $this->nm_new_label['isbn'] = "Isbn";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $isbn = $this->isbn;
   $sStyleHidden_isbn = '';
   if (isset($this->nmgp_cmp_hidden['isbn']) && $this->nmgp_cmp_hidden['isbn'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['isbn']);
       $sStyleHidden_isbn = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_isbn = 'display: none;';
   $sStyleReadInp_isbn = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['isbn']) && $this->nmgp_cmp_readonly['isbn'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['isbn']);
       $sStyleReadLab_isbn = '';
       $sStyleReadInp_isbn = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['isbn']) && $this->nmgp_cmp_hidden['isbn'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="isbn" value="<?php echo NM_encode_input($isbn) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_isbn" style="<?php echo $sStyleHidden_isbn; ?>;"><span id="id_label_isbn"><?php echo $this->nm_new_label['isbn']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_isbn" style="<?php echo $sStyleHidden_isbn; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["isbn"]) &&  $this->nmgp_cmp_readonly["isbn"] == "on") { 

 ?>
<input type="hidden" name="isbn" value="<?php echo NM_encode_input($isbn) . "\">" . $isbn . ""; ?>
<?php } else { ?>
<span id="id_read_on_isbn" class="sc-ui-readonly-isbn" style=";<?php echo $sStyleReadLab_isbn; ?>"><?php echo NM_encode_input($this->isbn); ?></span><span id="id_read_off_isbn" style="white-space: nowrap;<?php echo $sStyleReadInp_isbn; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_isbn" type=text name="isbn" value="<?php echo NM_encode_input($isbn) ?>"
 size=50 maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_isbn_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_isbn_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['edicion']))
    {
        $this->nm_new_label['edicion'] = "Edicion";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $edicion = $this->edicion;
   $sStyleHidden_edicion = '';
   if (isset($this->nmgp_cmp_hidden['edicion']) && $this->nmgp_cmp_hidden['edicion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['edicion']);
       $sStyleHidden_edicion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_edicion = 'display: none;';
   $sStyleReadInp_edicion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['edicion']) && $this->nmgp_cmp_readonly['edicion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['edicion']);
       $sStyleReadLab_edicion = '';
       $sStyleReadInp_edicion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['edicion']) && $this->nmgp_cmp_hidden['edicion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="edicion" value="<?php echo NM_encode_input($edicion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_edicion" style="<?php echo $sStyleHidden_edicion; ?>;"><span id="id_label_edicion"><?php echo $this->nm_new_label['edicion']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_edicion" style="<?php echo $sStyleHidden_edicion; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["edicion"]) &&  $this->nmgp_cmp_readonly["edicion"] == "on") { 

 ?>
<input type="hidden" name="edicion" value="<?php echo NM_encode_input($edicion) . "\">" . $edicion . ""; ?>
<?php } else { ?>
<span id="id_read_on_edicion" class="sc-ui-readonly-edicion" style=";<?php echo $sStyleReadLab_edicion; ?>"><?php echo NM_encode_input($this->edicion); ?></span><span id="id_read_off_edicion" style="white-space: nowrap;<?php echo $sStyleReadInp_edicion; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_edicion" type=text name="edicion" value="<?php echo NM_encode_input($edicion) ?>"
 size=50 maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_edicion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_edicion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['paginas']))
    {
        $this->nm_new_label['paginas'] = "Paginas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $paginas = $this->paginas;
   $sStyleHidden_paginas = '';
   if (isset($this->nmgp_cmp_hidden['paginas']) && $this->nmgp_cmp_hidden['paginas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['paginas']);
       $sStyleHidden_paginas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_paginas = 'display: none;';
   $sStyleReadInp_paginas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['paginas']) && $this->nmgp_cmp_readonly['paginas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['paginas']);
       $sStyleReadLab_paginas = '';
       $sStyleReadInp_paginas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['paginas']) && $this->nmgp_cmp_hidden['paginas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="paginas" value="<?php echo NM_encode_input($paginas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_paginas" style="<?php echo $sStyleHidden_paginas; ?>;"><span id="id_label_paginas"><?php echo $this->nm_new_label['paginas']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_paginas" style="<?php echo $sStyleHidden_paginas; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["paginas"]) &&  $this->nmgp_cmp_readonly["paginas"] == "on") { 

 ?>
<input type="hidden" name="paginas" value="<?php echo NM_encode_input($paginas) . "\">" . $paginas . ""; ?>
<?php } else { ?>
<span id="id_read_on_paginas" class="sc-ui-readonly-paginas" style=";<?php echo $sStyleReadLab_paginas; ?>"><?php echo NM_encode_input($this->paginas); ?></span><span id="id_read_off_paginas" style="white-space: nowrap;<?php echo $sStyleReadInp_paginas; ?>">
 <input class="sc-js-input scFormObjectOdd" style="text-align:left;" id="id_sc_field_paginas" type=text name="paginas" value="<?php echo NM_encode_input($paginas) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['paginas']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['paginas']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_paginas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_paginas_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['video']))
    {
        $this->nm_new_label['video'] = "Video";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $video = $this->video;
   $sStyleHidden_video = '';
   if (isset($this->nmgp_cmp_hidden['video']) && $this->nmgp_cmp_hidden['video'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['video']);
       $sStyleHidden_video = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_video = 'display: none;';
   $sStyleReadInp_video = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['video']) && $this->nmgp_cmp_readonly['video'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['video']);
       $sStyleReadLab_video = '';
       $sStyleReadInp_video = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['video']) && $this->nmgp_cmp_hidden['video'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="video" value="<?php echo NM_encode_input($video) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_video" style="<?php echo $sStyleHidden_video; ?>;"><span id="id_label_video"><?php echo $this->nm_new_label['video']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_video" style="<?php echo $sStyleHidden_video; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["video"]) &&  $this->nmgp_cmp_readonly["video"] == "on") { 

 ?>
<input type="hidden" name="video" value="<?php echo NM_encode_input($video) . "\">" . $video . ""; ?>
<?php } else { ?>
<span id="id_read_on_video" class="sc-ui-readonly-video" style=";<?php echo $sStyleReadLab_video; ?>"><?php echo NM_encode_input($this->video); ?></span><span id="id_read_off_video" style="white-space: nowrap;<?php echo $sStyleReadInp_video; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_video" type=text name="video" value="<?php echo NM_encode_input($video) ?>"
 size=50 maxlength=255 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">&nbsp;<?php echo nmButtonOutput($this->arr_buttons, "byoutube", "nm_display_youtube(document.F1.video.value, 'modal', 480, 385)", "nm_display_youtube(document.F1.video.value, 'modal', 480, 385)", "video_youtub", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>

</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_video_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_video_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['demo']))
    {
        $this->nm_new_label['demo'] = "Demo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $demo = $this->demo;
   $sStyleHidden_demo = '';
   if (isset($this->nmgp_cmp_hidden['demo']) && $this->nmgp_cmp_hidden['demo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['demo']);
       $sStyleHidden_demo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_demo = 'display: none;';
   $sStyleReadInp_demo = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['demo']) && $this->nmgp_cmp_readonly['demo'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['demo']);
       $sStyleReadLab_demo = '';
       $sStyleReadInp_demo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['demo']) && $this->nmgp_cmp_hidden['demo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="demo" value="<?php echo NM_encode_input($demo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_demo" style="<?php echo $sStyleHidden_demo; ?>;"><span id="id_label_demo"><?php echo $this->nm_new_label['demo']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_demo" style="<?php echo $sStyleHidden_demo; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["demo"]) &&  $this->nmgp_cmp_readonly["demo"] == "on") { 

 ?>
<input type="hidden" name="demo" value="<?php echo NM_encode_input($demo) . "\">" . $demo . ""; ?>
<?php } else { ?>
<span id="id_read_on_demo" class="sc-ui-readonly-demo" style=";<?php echo $sStyleReadLab_demo; ?>"><?php echo NM_encode_input($this->demo); ?></span><span id="id_read_off_demo" style="white-space: nowrap;<?php echo $sStyleReadInp_demo; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_demo" type=text name="demo" value="<?php echo NM_encode_input($demo) ?>"
 size=50 maxlength=255 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}">&nbsp;<?php echo nmButtonOutput($this->arr_buttons, "byoutube", "nm_display_youtube(document.F1.demo.value, 'modal', 480, 385)", "nm_display_youtube(document.F1.demo.value, 'modal', 480, 385)", "demo_youtub", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>

</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_demo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_demo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['formato']))
   {
       $this->nm_new_label['formato'] = "Formato";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $formato = $this->formato;
   $sStyleHidden_formato = '';
   if (isset($this->nmgp_cmp_hidden['formato']) && $this->nmgp_cmp_hidden['formato'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['formato']);
       $sStyleHidden_formato = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_formato = 'display: none;';
   $sStyleReadInp_formato = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['formato']) && $this->nmgp_cmp_readonly['formato'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['formato']);
       $sStyleReadLab_formato = '';
       $sStyleReadInp_formato = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['formato']) && $this->nmgp_cmp_hidden['formato'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="formato" value="<?php echo NM_encode_input($this->formato) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_formato" style="<?php echo $sStyleHidden_formato; ?>;"><span id="id_label_formato"><?php echo $this->nm_new_label['formato']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_formato" style="<?php echo $sStyleHidden_formato; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["formato"]) &&  $this->nmgp_cmp_readonly["formato"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_formato']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_formato'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_formato']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_formato'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_formato']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_formato'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_formato']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_formato'] = array(); 
    }

   $old_value_codps = $this->codps;
   $old_value_paginas = $this->paginas;
   $old_value_orden = $this->orden;
   $this->nm_tira_formatacao();


   $unformatted_value_codps = $this->codps;
   $unformatted_value_paginas = $this->paginas;
   $unformatted_value_orden = $this->orden;

   $nm_comando = "SELECT idFormato, nombre 
FROM formatos 
ORDER BY nombre";

   $this->codps = $old_value_codps;
   $this->paginas = $old_value_paginas;
   $this->orden = $old_value_orden;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_formato'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $formato_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->formato_1))
          {
              foreach ($this->formato_1 as $tmp_formato)
              {
                  if (trim($tmp_formato) === trim($cadaselect[1])) { $formato_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->formato) === trim($cadaselect[1])) { $formato_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="formato" value="<?php echo NM_encode_input($formato) . "\">" . $formato_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_formato']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_formato'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_formato']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_formato'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_formato']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_formato'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_formato']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_formato'] = array(); 
    }

   $old_value_codps = $this->codps;
   $old_value_paginas = $this->paginas;
   $old_value_orden = $this->orden;
   $this->nm_tira_formatacao();


   $unformatted_value_codps = $this->codps;
   $unformatted_value_paginas = $this->paginas;
   $unformatted_value_orden = $this->orden;

   $nm_comando = "SELECT idFormato, nombre 
FROM formatos 
ORDER BY nombre";

   $this->codps = $old_value_codps;
   $this->paginas = $old_value_paginas;
   $this->orden = $old_value_orden;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_formato'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0 ; 
   $todo = explode("?@?", $nmgp_def_dados) ; 
   $x = 0; 
   $formato_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->formato_1))
          {
              foreach ($this->formato_1 as $tmp_formato)
              {
                  if (trim($tmp_formato) === trim($cadaselect[1])) { $formato_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->formato) === trim($cadaselect[1])) { $formato_look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_formato\" style=\";" .  $sStyleReadLab_formato . "\">" . NM_encode_input($formato_look) . "</span><span id=\"id_read_off_formato\" style=\"" . $sStyleReadInp_formato . "\">";
   echo " <span id=\"idAjaxSelect_formato\"><select class=\"sc-js-input scFormObjectOdd\" style=\";\" id=\"id_sc_field_formato\" name=\"formato\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_formato'][] = ''; 
   echo "  <option value=\"\">Seleccione...</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->formato) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->formato)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_formato_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_formato_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idioma']))
   {
       $this->nm_new_label['idioma'] = "Idioma";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idioma = $this->idioma;
   $sStyleHidden_idioma = '';
   if (isset($this->nmgp_cmp_hidden['idioma']) && $this->nmgp_cmp_hidden['idioma'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idioma']);
       $sStyleHidden_idioma = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idioma = 'display: none;';
   $sStyleReadInp_idioma = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idioma']) && $this->nmgp_cmp_readonly['idioma'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idioma']);
       $sStyleReadLab_idioma = '';
       $sStyleReadInp_idioma = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idioma']) && $this->nmgp_cmp_hidden['idioma'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idioma" value="<?php echo NM_encode_input($this->idioma) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_idioma" style="<?php echo $sStyleHidden_idioma; ?>;"><span id="id_label_idioma"><?php echo $this->nm_new_label['idioma']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_idioma" style="<?php echo $sStyleHidden_idioma; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idioma"]) &&  $this->nmgp_cmp_readonly["idioma"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_idioma']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_idioma'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_idioma']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_idioma'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_idioma']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_idioma'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_idioma']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_idioma'] = array(); 
    }

   $old_value_codps = $this->codps;
   $old_value_paginas = $this->paginas;
   $old_value_orden = $this->orden;
   $this->nm_tira_formatacao();


   $unformatted_value_codps = $this->codps;
   $unformatted_value_paginas = $this->paginas;
   $unformatted_value_orden = $this->orden;

   $nm_comando = "SELECT idIdioma, nombre 
FROM idiomas 
ORDER BY nombre";

   $this->codps = $old_value_codps;
   $this->paginas = $old_value_paginas;
   $this->orden = $old_value_orden;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_idioma'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $idioma_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idioma_1))
          {
              foreach ($this->idioma_1 as $tmp_idioma)
              {
                  if (trim($tmp_idioma) === trim($cadaselect[1])) { $idioma_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idioma) === trim($cadaselect[1])) { $idioma_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idioma" value="<?php echo NM_encode_input($idioma) . "\">" . $idioma_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_idioma']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_idioma'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_idioma']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_idioma'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_idioma']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_idioma'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_idioma']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_idioma'] = array(); 
    }

   $old_value_codps = $this->codps;
   $old_value_paginas = $this->paginas;
   $old_value_orden = $this->orden;
   $this->nm_tira_formatacao();


   $unformatted_value_codps = $this->codps;
   $unformatted_value_paginas = $this->paginas;
   $unformatted_value_orden = $this->orden;

   $nm_comando = "SELECT idIdioma, nombre 
FROM idiomas 
ORDER BY nombre";

   $this->codps = $old_value_codps;
   $this->paginas = $old_value_paginas;
   $this->orden = $old_value_orden;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_idioma'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0 ; 
   $todo = explode("?@?", $nmgp_def_dados) ; 
   $x = 0; 
   $idioma_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idioma_1))
          {
              foreach ($this->idioma_1 as $tmp_idioma)
              {
                  if (trim($tmp_idioma) === trim($cadaselect[1])) { $idioma_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idioma) === trim($cadaselect[1])) { $idioma_look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_idioma\" style=\";" .  $sStyleReadLab_idioma . "\">" . NM_encode_input($idioma_look) . "</span><span id=\"id_read_off_idioma\" style=\"" . $sStyleReadInp_idioma . "\">";
   echo " <span id=\"idAjaxSelect_idioma\"><select class=\"sc-js-input scFormObjectOdd\" style=\";\" id=\"id_sc_field_idioma\" name=\"idioma\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_idioma'][] = ''; 
   echo "  <option value=\"\">Seleccione...</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idioma) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idioma)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idioma_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idioma_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['autor']))
   {
       $this->nm_new_label['autor'] = "Autor";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $autor = $this->autor;
   $sStyleHidden_autor = '';
   if (isset($this->nmgp_cmp_hidden['autor']) && $this->nmgp_cmp_hidden['autor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['autor']);
       $sStyleHidden_autor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_autor = 'display: none;';
   $sStyleReadInp_autor = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['autor']) && $this->nmgp_cmp_readonly['autor'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['autor']);
       $sStyleReadLab_autor = '';
       $sStyleReadInp_autor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['autor']) && $this->nmgp_cmp_hidden['autor'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="autor" value="<?php echo NM_encode_input($this->autor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_autor" style="<?php echo $sStyleHidden_autor; ?>;"><span id="id_label_autor"><?php echo $this->nm_new_label['autor']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_autor" style="<?php echo $sStyleHidden_autor; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["autor"]) &&  $this->nmgp_cmp_readonly["autor"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_autor']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_autor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_autor']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_autor'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_autor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_autor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_autor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_autor'] = array(); 
    }

   $old_value_codps = $this->codps;
   $old_value_paginas = $this->paginas;
   $old_value_orden = $this->orden;
   $this->nm_tira_formatacao();


   $unformatted_value_codps = $this->codps;
   $unformatted_value_paginas = $this->paginas;
   $unformatted_value_orden = $this->orden;

   $nm_comando = "SELECT idAutor, nombre 
FROM autores 
ORDER BY nombre";

   $this->codps = $old_value_codps;
   $this->paginas = $old_value_paginas;
   $this->orden = $old_value_orden;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_autor'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $autor_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->autor_1))
          {
              foreach ($this->autor_1 as $tmp_autor)
              {
                  if (trim($tmp_autor) === trim($cadaselect[1])) { $autor_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->autor) === trim($cadaselect[1])) { $autor_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="autor" value="<?php echo NM_encode_input($autor) . "\">" . $autor_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_autor']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_autor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_autor']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_autor'] = array(); 
}
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_autor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_autor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_autor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_autor'] = array(); 
    }

   $old_value_codps = $this->codps;
   $old_value_paginas = $this->paginas;
   $old_value_orden = $this->orden;
   $this->nm_tira_formatacao();


   $unformatted_value_codps = $this->codps;
   $unformatted_value_paginas = $this->paginas;
   $unformatted_value_orden = $this->orden;

   $nm_comando = "SELECT idAutor, nombre 
FROM autores 
ORDER BY nombre";

   $this->codps = $old_value_codps;
   $this->paginas = $old_value_paginas;
   $this->orden = $old_value_orden;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_autor'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0 ; 
   $todo = explode("?@?", $nmgp_def_dados) ; 
   $x = 0; 
   $autor_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->autor_1))
          {
              foreach ($this->autor_1 as $tmp_autor)
              {
                  if (trim($tmp_autor) === trim($cadaselect[1])) { $autor_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->autor) === trim($cadaselect[1])) { $autor_look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_autor\" style=\";" .  $sStyleReadLab_autor . "\">" . NM_encode_input($autor_look) . "</span><span id=\"id_read_off_autor\" style=\"" . $sStyleReadInp_autor . "\">";
   echo " <span id=\"idAjaxSelect_autor\"><select class=\"sc-js-input scFormObjectOdd\" style=\";\" id=\"id_sc_field_autor\" name=\"autor\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->autor) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->autor)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_autor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_autor_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['orden']))
    {
        $this->nm_new_label['orden'] = "Orden";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $orden = $this->orden;
   $sStyleHidden_orden = '';
   if (isset($this->nmgp_cmp_hidden['orden']) && $this->nmgp_cmp_hidden['orden'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['orden']);
       $sStyleHidden_orden = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_orden = 'display: none;';
   $sStyleReadInp_orden = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['orden']) && $this->nmgp_cmp_readonly['orden'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['orden']);
       $sStyleReadLab_orden = '';
       $sStyleReadInp_orden = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['orden']) && $this->nmgp_cmp_hidden['orden'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="orden" value="<?php echo NM_encode_input($orden) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_orden" style="<?php echo $sStyleHidden_orden; ?>;"><span id="id_label_orden"><?php echo $this->nm_new_label['orden']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_orden" style="<?php echo $sStyleHidden_orden; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["orden"]) &&  $this->nmgp_cmp_readonly["orden"] == "on") { 

 ?>
<input type="hidden" name="orden" value="<?php echo NM_encode_input($orden) . "\">" . $orden . ""; ?>
<?php } else { ?>
<span id="id_read_on_orden" class="sc-ui-readonly-orden" style=";<?php echo $sStyleReadLab_orden; ?>"><?php echo NM_encode_input($this->orden); ?></span><span id="id_read_off_orden" style="white-space: nowrap;<?php echo $sStyleReadInp_orden; ?>">
 <input class="sc-js-input scFormObjectOdd" style="text-align:left;" id="id_sc_field_orden" type=text name="orden" value="<?php echo NM_encode_input($orden) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['orden']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['orden']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_orden_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_orden_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['obsequio']))
   {
       $this->nm_new_label['obsequio'] = "Obsequio nuevo registro";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $obsequio = $this->obsequio;
   $sStyleHidden_obsequio = '';
   if (isset($this->nmgp_cmp_hidden['obsequio']) && $this->nmgp_cmp_hidden['obsequio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['obsequio']);
       $sStyleHidden_obsequio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_obsequio = 'display: none;';
   $sStyleReadInp_obsequio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['obsequio']) && $this->nmgp_cmp_readonly['obsequio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['obsequio']);
       $sStyleReadLab_obsequio = '';
       $sStyleReadInp_obsequio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['obsequio']) && $this->nmgp_cmp_hidden['obsequio'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="obsequio" value="<?php echo NM_encode_input($this->obsequio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_obsequio" style="<?php echo $sStyleHidden_obsequio; ?>;"><span id="id_label_obsequio"><?php echo $this->nm_new_label['obsequio']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_obsequio" style="<?php echo $sStyleHidden_obsequio; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["obsequio"]) &&  $this->nmgp_cmp_readonly["obsequio"] == "on") { 

$obsequio_look = "";
 if ($this->obsequio == "1") { $obsequio_look .= "Si" ;} 
 if ($this->obsequio == "0") { $obsequio_look .= "No" ;} 
?>
<input type="hidden" name="obsequio" value="<?php echo NM_encode_input($obsequio) . "\">" . $obsequio_look . ""; ?>
<?php } else { ?>
<?php

$obsequio_look = "";
 if ($this->obsequio == "1") { $obsequio_look .= "Si" ;} 
 if ($this->obsequio == "0") { $obsequio_look .= "No" ;} 
?>
<span id="id_read_on_obsequio" style=";<?php echo $sStyleReadLab_obsequio; ?>"><?php echo NM_encode_input($obsequio_look); ?></span><span id="id_read_off_obsequio" style="<?php echo $sStyleReadInp_obsequio; ?>">
 <span id="idAjaxSelect_obsequio"><select class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_obsequio" name="obsequio" size="1" alt="{type: 'select', enterTab: false}">
 <option value="1" <?php  if ($this->obsequio == "1") { echo " selected" ;} ?>>Si</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_obsequio'][] = '1'; ?>
 <option value="0" <?php  if ($this->obsequio == "0") { echo " selected" ;} ?>>No</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_obsequio'][] = '0'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_obsequio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_obsequio_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['status']))
   {
       $this->nm_new_label['status'] = "Status";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $status = $this->status;
   $sStyleHidden_status = '';
   if (isset($this->nmgp_cmp_hidden['status']) && $this->nmgp_cmp_hidden['status'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['status']);
       $sStyleHidden_status = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_status = 'display: none;';
   $sStyleReadInp_status = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['status']) && $this->nmgp_cmp_readonly['status'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['status']);
       $sStyleReadLab_status = '';
       $sStyleReadInp_status = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['status']) && $this->nmgp_cmp_hidden['status'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="status" value="<?php echo NM_encode_input($this->status) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_status" style="<?php echo $sStyleHidden_status; ?>;"><span id="id_label_status"><?php echo $this->nm_new_label['status']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_status" style="<?php echo $sStyleHidden_status; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["status"]) &&  $this->nmgp_cmp_readonly["status"] == "on") { 

$status_look = "";
 if ($this->status == "1") { $status_look .= "Activa" ;} 
?>
<input type="hidden" name="status" value="<?php echo NM_encode_input($status) . "\">" . $status_look . ""; ?>
<?php } else { ?>
<?php

$status_look = "";
 if ($this->status == "1") { $status_look .= "Activa" ;} 
?>
<span id="id_read_on_status" style=";<?php echo $sStyleReadLab_status; ?>"><?php echo NM_encode_input($status_look); ?></span><span id="id_read_off_status" style="<?php echo $sStyleReadInp_status; ?>">
 <span id="idAjaxSelect_status"><select class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_status" name="status" size="1" alt="{type: 'select', enterTab: false}">
 <option value="1" <?php  if ($this->status == "1") { echo " selected" ;} ?>>Activa</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['Lookup_status'][] = '1'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_status_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_status_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


<?php } ?>
   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
