<form name="F2" method=post 
               action="form_publicaciones_mob.php" 
               target="_self"> 
<input type="hidden" name="id" value="<?php echo NM_encode_input($this->nmgp_dados_form['id']); ?>">
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="master_nav" value="off">
<input type="hidden" name="sc_ifr_height" value="">
<input type="hidden" name="nmgp_parms" value=""/>
<input type="hidden" name="nmgp_ordem" value=""/>
<input type="hidden" name="nmgp_clone" value=""/>
<input type="hidden" name="nmgp_fast_search" value=""/>
<input type="hidden" name="nmgp_cond_fast_search" value=""/>
<input type="hidden" name="nmgp_arg_fast_search" value=""/>
<input type="hidden" name="nmgp_arg_dyn_search" value=""/>
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
</form> 
<form name="F5" method="post" 
                  action="form_publicaciones_mob.php" 
                  target="_self"> 
  <input type="hidden" name="nmgp_opcao" value="<?php if ($this->nm_Start_new) {echo "ini";} elseif ($this->sc_insert_on) {echo "final";} else {echo "igual";}?>"/>
  <input type="hidden" name="nmgp_parms" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones_mob']['parms']); ?>"/>
  <input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"/> 
  <input type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
</form> 
<form name="F6" method="post" 
                  action="form_publicaciones_mob.php" 
                  target="_self"> 
  <input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"/> 
  <input type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
</form> 
<div id="id_div_process" style="display: none; margin: 10px; whitespace: nowrap" class="scFormProcessFixed"><span class="scFormProcess"><img border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" />&nbsp;<?php echo $this->Ini->Nm_lang['lang_othr_prcs']; ?>...</span></div>
<div id="id_div_process_block" style="display: none; margin: 10px; whitespace: nowrap"><span class="scFormProcess"><img border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" />&nbsp;<?php echo $this->Ini->Nm_lang['lang_othr_prcs']; ?>...</span></div>
<div id="id_fatal_error" class="scFormLabelOdd" style="display: none; position: absolute"></div>
<script type="text/javascript"> 
function sc_btn_Archivos()
{
    if (scEventControl_active("")) {
      setTimeout(function() { sc_btn_Archivos(); }, 500);
      return;
    }
    document.F1.nmgp_parms.value = "nmgp_opcao?#?formphp?@?nm_call_php?#?Archivos?@?";
    document.F1.action = "form_publicaciones_mob.php";
    document.F1.target = "_self";
    document.F1.submit();
}
 NM_tp_critica(1);

function scInlineFormSend()
{
  return false;
}

function nm_move(x, y, z) 
{ 
    if (Nm_Proc_Atualiz)
    {
        return;
    }
    if (("inicio" == x || "retorna" == x) && "S" != Nav_permite_ret)
    {
        return;
    }
    if (("avanca" == x || "final" == x) && "S" != Nav_permite_ava)
    {
        return;
    }
    document.F2.nmgp_opcao.value = x; 
    document.F2.nmgp_ordem.value = y; 
    document.F2.nmgp_clone.value = "";
    if ("apl_detalhe" == x)
    {
        document.F2.nmgp_opcao.value = 'igual'; 
        document.F2.master_nav.value = 'on'; 
        if (z)
        {
            document.F2.sc_ifr_height.value = z;
        }
        document.F2.submit();
        return;
    }
    if ("clone" == x)
    {
        x = "novo";
        document.F2.nmgp_clone.value = "S";
        document.F2.nmgp_opcao.value = x; 
    }
    if ("fast_search" == x)
    {
        document.F2.nmgp_ordem.value = ''; 
        document.F2.nmgp_fast_search.value = scAjaxGetFieldSelect("nmgp_fast_search_" + y); 
        document.F2.nmgp_cond_fast_search.value = scAjaxGetFieldText("nmgp_cond_fast_search_" + y); 
        document.F2.nmgp_arg_fast_search.value = scAjaxGetFieldText("nmgp_arg_fast_search_" + y); 
    }
    if ("novo" == x || "edit_novo" == x)
    {
<?php
       $NM_parm_ifr = ($NM_run_iframe == 1) ? "NM_run_iframe?#?1?@?" : "";
?>
        document.F2.nmgp_parms.value = "<?php echo $NM_parm_ifr ?>";
        document.F2.submit();
    }
    else
    {
        do_ajax_form_publicaciones_mob_navigate_form();
    }
} 
var sc_mupload_ok = true;
function nm_atualiza(x, y) 
{ 
    if (!sc_mupload_ok)
    {
        if (!confirm("<?php echo $this->Ini->Nm_lang['lang_errm_muok'] ?>"))
        {
            return;
        }
        sc_mupload_ok = true;
    }
    var Nm_submit_ok = true; 
    if (Nm_Proc_Atualiz)
    {
        return;
    }
    if (!scAjaxDetailProc())
    {
        return;
    }
<?php
    $NM_parm_ifr = ($NM_run_iframe == 1) ? "NM_run_iframe?#?1?@?" : "";
?>
    document.F1.nmgp_parms.value = "<?php echo $NM_parm_ifr ?>";
    document.F1.target = "_self";
    if (x == "muda_form") 
    { 
       document.F1.nmgp_num_form.value = y; 
    } 
    if (x == "excluir") 
    { 
       if (confirm ("<?php echo html_entity_decode($this->Ini->Nm_lang['lang_errm_remv'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"))  
       { 
           document.F1.nmgp_opcao.value = x; 
           document.F1.submit(); 
       } 
       else 
       { 
          return; 
       } 
    } 
    else 
    { 
       document.F1.nmgp_opcao.value = x; 
       if ("incluir" == x || "muda_form" == x || "recarga" == x)
       {
           Nm_Proc_Atualiz = true;
           document.F1.submit();
       }
       else
       {
           Nm_Proc_Atualiz = true;
           do_ajax_form_publicaciones_mob_submit_form();
       }
    } 
    if (Nm_submit_ok)
    { 
        Nm_Proc_Atualiz = true;
    } 
} 
function nm_mostra_img(imagem, altura, largura)
{
    tb_show('', imagem, '');
}
function nm_recarga_form(nm_ult_ancora, nm_ult_page) 
{ 
    document.F1.target = "_self";
    document.F1.nmgp_parms.value = "";
    document.F1.nmgp_ancora.value= nm_ult_page; 
    document.F1.nmgp_ancora.value= nm_ult_page; 
    document.F1.nmgp_opcao.value= "recarga"; 
    document.F1.action += "#" +  nm_ult_ancora;
    document.F1.submit(); 
} 
function nm_link_url(Sc_url)
{
    if (Sc_url.substr(0, 7) != 'http://' && Sc_url.substr(0, 8) != 'https://')
    {
        Sc_url = 'http://' + Sc_url;
    }
    return Sc_url;
}
function nm_display_youtube(Sc_url, Sc_mode, Sc_width, Sc_height)
{
    Sc_url = sc_trim(Sc_url);
    if ('' == Sc_url)
    {
        return;
    }
    else if ('http://www.youtube.com' == Sc_url.substr(0, 22))
    {
        Sc_url = Sc_url.substr(22);
    }
    else if ('www.youtube.com' == Sc_url.substr(0, 15))
    {
        Sc_url = Sc_url.substr(15);
    }
    if ('/v/' == Sc_url.substr(0, 3))
    {
        Sc_url = Sc_url.substr(3);
    }
    else if ('/watch?v=' == Sc_url.substr(0, 9))
    {
        Sc_url = Sc_url.substr(9);
    }
    if (null != Sc_mode && 'modal' == Sc_mode)
    {
        if (null == Sc_width || 0 >= Sc_width)
        {
            Sc_width = 480;
        }
        if (null == Sc_height || 0 >= Sc_height)
        {
            Sc_height = 385;
        }
        $('#id_youtube_window').html("<object width=\"" + Sc_width + "\" height=\"" + Sc_height + "\"><param name=\"movie\" value=\"http://www.youtube.com/v/" + Sc_url + "\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"allowscriptaccess\" value=\"always\"></param><embed src=\"http://www.youtube.com/v/" + Sc_url + "\" type=\"application/x-shockwave-flash\" allowscriptaccess=\"always\" allowfullscreen=\"true\" width=\""  + Sc_width +  "\" height=\""  + Sc_height +  "\"></embed></object>");
        tb_show('', '#TB_inline?height=' + (Sc_height + 10) + '&width=' + (Sc_width + 10) + '&inlineId=id_youtube_window', '');
        return;
    }
    window.open('http://www.youtube.com/watch?v=' + Sc_url);
}
function sc_trim(str, chars) {
        return sc_ltrim(sc_rtrim(str, chars), chars);
}
function sc_ltrim(str, chars) {
        chars = chars || "\\s";
        return str.replace(new RegExp("^[" + chars + "]+", "g"), "");
}
function sc_rtrim(str, chars) {
        chars = chars || "\\s";
        return str.replace(new RegExp("[" + chars + "]+$", "g"), "");
}
var hasJsFormOnload = false;
function sc_exib_ocult_pag(N_pagina)
{
    document.getElementById('form_publicaciones_mob_form0').style.width='1px';
    document.getElementById('form_publicaciones_mob_form0').style.height='0px';
    document.getElementById('form_publicaciones_mob_form0').style.display='none';
    document.getElementById('form_publicaciones_mob_form0').style.overflow='scroll';
    document.getElementById('form_publicaciones_mob_form1').style.width='1px';
    document.getElementById('form_publicaciones_mob_form1').style.height='0px';
    document.getElementById('form_publicaciones_mob_form1').style.display='none';
    document.getElementById('form_publicaciones_mob_form1').style.overflow='scroll';
    document.getElementById(N_pagina).style.width='';
    document.getElementById(N_pagina).style.height='';
    document.getElementById(N_pagina).style.display='';
    document.getElementById(N_pagina).style.overflow='visible';
    sc_tab_pag(pag_ativa, 'scTabInactive');
    pag_ativa = N_pagina;
    sc_tab_pag(pag_ativa, 'scTabActive');
}
function sc_tab_pag(N_pagina, C_class)
{
    if ('scTabActive' == C_class)
    {
        $("#id_" + N_pagina).removeClass("scTabInactive").addClass("scTabActive");
    }
    else
    {
        $("#id_" + N_pagina).removeClass("scTabActive").addClass("scTabInactive");
    }
}

function scCssFocus(oHtmlObj)
{
  if (navigator.userAgent && 0 < navigator.userAgent.indexOf("MSIE") && "select" == oHtmlObj.type.substr(0, 6))
    return;
  $(oHtmlObj).addClass('scFormObjectFocusOdd')
             .removeClass('scFormObjectOdd');
}

function scCssBlur(oHtmlObj)
{
  if (navigator.userAgent && 0 < navigator.userAgent.indexOf("MSIE") && "select" == oHtmlObj.type.substr(0, 6))
    return;
  $(oHtmlObj).addClass('scFormObjectOdd')
             .removeClass('scFormObjectFocusOdd');
}

</script> 
