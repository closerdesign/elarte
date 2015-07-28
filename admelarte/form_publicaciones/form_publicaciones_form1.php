<div id="form_publicaciones_form1" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['codps']))
           {
               $this->nmgp_cmp_readonly['codps'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['banner']))
    {
        $this->nm_new_label['banner'] = "Banner";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $banner = $this->banner;
   $sStyleHidden_banner = '';
   if (isset($this->nmgp_cmp_hidden['banner']) && $this->nmgp_cmp_hidden['banner'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['banner']);
       $sStyleHidden_banner = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_banner = 'display: none;';
   $sStyleReadInp_banner = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['banner']) && $this->nmgp_cmp_readonly['banner'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['banner']);
       $sStyleReadLab_banner = '';
       $sStyleReadInp_banner = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['banner']) && $this->nmgp_cmp_hidden['banner'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="banner" value="<?php echo NM_encode_input($banner) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_banner" style="<?php echo $sStyleHidden_banner; ?>;"><span id="id_label_banner"><?php echo $this->nm_new_label['banner']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_banner" style="<?php echo $sStyleHidden_banner; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
 <script>var var_ajax_img_banner = '<?php echo $out1_banner; ?>';</script><?php if (!empty($out_banner)){ echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_banner, '" . $this->nmgp_return_img['banner'][0] . "', '" . $this->nmgp_return_img['banner'][1] . "')\"><img id=\"id_ajax_img_banner\" border=\"0\" src=\"$out_banner\"></a> &nbsp;" . "<span id=\"txt_ajax_img_banner\">" . $banner . "</span>"; if (!empty($banner)){ echo "<br>";} } else { echo "<img id=\"id_ajax_img_banner\" border=\"0\" style=\"display: none\"> &nbsp;<span id=\"txt_ajax_img_banner\"></span><br />"; } ?>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["banner"]) &&  $this->nmgp_cmp_readonly["banner"] == "on") { 

 ?>
<img id=\"banner_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="banner" value="<?php echo NM_encode_input($banner) . "\">" . $banner . ""; ?>
<?php } else { ?>
<span id="id_read_off_banner" style="white-space: nowrap;<?php echo $sStyleReadInp_banner; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" type="file" name="banner[]" id="id_sc_field_banner" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>" alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><span id="chk_ajax_img_banner"<?php if ($this->nmgp_opcao == "novo" || empty($banner)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="banner_limpa" value="<?php echo $banner_limpa . '" '; if ($banner_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="banner_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_sc_dragdrop_banner" class="scFormDataDragNDrop"><?php echo $this->Ini->Nm_lang['lang_errm_mu_dragimg'] ?></div>
<div id="id_img_loader_banner" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_banner" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
&nbsp;Tamaño de la imagen 800 x 330 px.
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_banner_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_banner_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['bannermovil']))
    {
        $this->nm_new_label['bannermovil'] = "Banner Movil";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bannermovil = $this->bannermovil;
   $sStyleHidden_bannermovil = '';
   if (isset($this->nmgp_cmp_hidden['bannermovil']) && $this->nmgp_cmp_hidden['bannermovil'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bannermovil']);
       $sStyleHidden_bannermovil = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bannermovil = 'display: none;';
   $sStyleReadInp_bannermovil = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bannermovil']) && $this->nmgp_cmp_readonly['bannermovil'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bannermovil']);
       $sStyleReadLab_bannermovil = '';
       $sStyleReadInp_bannermovil = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bannermovil']) && $this->nmgp_cmp_hidden['bannermovil'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bannermovil" value="<?php echo NM_encode_input($bannermovil) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_bannermovil" style="<?php echo $sStyleHidden_bannermovil; ?>;"><span id="id_label_bannermovil"><?php echo $this->nm_new_label['bannermovil']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_bannermovil" style="<?php echo $sStyleHidden_bannermovil; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
 <script>var var_ajax_img_bannermovil = '<?php echo $out1_bannermovil; ?>';</script><?php if (!empty($out_bannermovil)){ echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_bannermovil, '" . $this->nmgp_return_img['bannermovil'][0] . "', '" . $this->nmgp_return_img['bannermovil'][1] . "')\"><img id=\"id_ajax_img_bannermovil\" border=\"0\" src=\"$out_bannermovil\"></a> &nbsp;" . "<span id=\"txt_ajax_img_bannermovil\">" . $bannermovil . "</span>"; if (!empty($bannermovil)){ echo "<br>";} } else { echo "<img id=\"id_ajax_img_bannermovil\" border=\"0\" style=\"display: none\"> &nbsp;<span id=\"txt_ajax_img_bannermovil\"></span><br />"; } ?>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bannermovil"]) &&  $this->nmgp_cmp_readonly["bannermovil"] == "on") { 

 ?>
<img id=\"bannermovil_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="bannermovil" value="<?php echo NM_encode_input($bannermovil) . "\">" . $bannermovil . ""; ?>
<?php } else { ?>
<span id="id_read_off_bannermovil" style="white-space: nowrap;<?php echo $sStyleReadInp_bannermovil; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" type="file" name="bannermovil[]" id="id_sc_field_bannermovil" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>" alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><span id="chk_ajax_img_bannermovil"<?php if ($this->nmgp_opcao == "novo" || empty($bannermovil)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="bannermovil_limpa" value="<?php echo $bannermovil_limpa . '" '; if ($bannermovil_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="bannermovil_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_sc_dragdrop_bannermovil" class="scFormDataDragNDrop"><?php echo $this->Ini->Nm_lang['lang_errm_mu_dragimg'] ?></div>
<div id="id_img_loader_bannermovil" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_bannermovil" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
&nbsp;Tamaño de la imagen: 300x250 px.
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bannermovil_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bannermovil_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['bannerdesktop']))
    {
        $this->nm_new_label['bannerdesktop'] = "Banner Desktop";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bannerdesktop = $this->bannerdesktop;
   $sStyleHidden_bannerdesktop = '';
   if (isset($this->nmgp_cmp_hidden['bannerdesktop']) && $this->nmgp_cmp_hidden['bannerdesktop'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bannerdesktop']);
       $sStyleHidden_bannerdesktop = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bannerdesktop = 'display: none;';
   $sStyleReadInp_bannerdesktop = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bannerdesktop']) && $this->nmgp_cmp_readonly['bannerdesktop'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bannerdesktop']);
       $sStyleReadLab_bannerdesktop = '';
       $sStyleReadInp_bannerdesktop = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bannerdesktop']) && $this->nmgp_cmp_hidden['bannerdesktop'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bannerdesktop" value="<?php echo NM_encode_input($bannerdesktop) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix" id="hidden_field_label_bannerdesktop" style="<?php echo $sStyleHidden_bannerdesktop; ?>;"><span id="id_label_bannerdesktop"><?php echo $this->nm_new_label['bannerdesktop']; ?></span></TD>
    <TD class="scFormDataOdd" id="hidden_field_data_bannerdesktop" style="<?php echo $sStyleHidden_bannerdesktop; ?>;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
 <script>var var_ajax_img_bannerdesktop = '<?php echo $out1_bannerdesktop; ?>';</script><?php if (!empty($out_bannerdesktop)){ echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_bannerdesktop, '" . $this->nmgp_return_img['bannerdesktop'][0] . "', '" . $this->nmgp_return_img['bannerdesktop'][1] . "')\"><img id=\"id_ajax_img_bannerdesktop\" border=\"0\" src=\"$out_bannerdesktop\"></a> &nbsp;" . "<span id=\"txt_ajax_img_bannerdesktop\">" . $bannerdesktop . "</span>"; if (!empty($bannerdesktop)){ echo "<br>";} } else { echo "<img id=\"id_ajax_img_bannerdesktop\" border=\"0\" style=\"display: none\"> &nbsp;<span id=\"txt_ajax_img_bannerdesktop\"></span><br />"; } ?>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bannerdesktop"]) &&  $this->nmgp_cmp_readonly["bannerdesktop"] == "on") { 

 ?>
<img id=\"bannerdesktop_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="bannerdesktop" value="<?php echo NM_encode_input($bannerdesktop) . "\">" . $bannerdesktop . ""; ?>
<?php } else { ?>
<span id="id_read_off_bannerdesktop" style="white-space: nowrap;<?php echo $sStyleReadInp_bannerdesktop; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" type="file" name="bannerdesktop[]" id="id_sc_field_bannerdesktop" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>" alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><span id="chk_ajax_img_bannerdesktop"<?php if ($this->nmgp_opcao == "novo" || empty($bannerdesktop)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="bannerdesktop_limpa" value="<?php echo $bannerdesktop_limpa . '" '; if ($bannerdesktop_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="bannerdesktop_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_sc_dragdrop_bannerdesktop" class="scFormDataDragNDrop"><?php echo $this->Ini->Nm_lang['lang_errm_mu_dragimg'] ?></div>
<div id="id_img_loader_bannerdesktop" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_bannerdesktop" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
&nbsp;Tamaño de la imagen 728x90 px.
</td></tr><tr><td style="vertical-align: top; padding: 1px 0px 0px 0px"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bannerdesktop_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bannerdesktop_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
</td></tr>
</td></tr> 
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
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "birpara", " nm_navpage(document.F1.nmgp_rec_b.value, 'P');document.F1.nmgp_rec_b.value = ''", " nm_navpage(document.F1.nmgp_rec_b.value, 'P');document.F1.nmgp_rec_b.value = ''", "brec_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio_off", "nm_move ('inicio');", "nm_move ('inicio');", "sc_b_ini_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "nm_move ('retorna');", "nm_move ('retorna');", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna_off", "nm_move ('retorna');", "nm_move ('retorna');", "sc_b_ret_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "nm_move ('avanca');", "nm_move ('avanca');", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca_off", "nm_move ('avanca');", "nm_move ('avanca');", "sc_b_avc_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "nm_move ('final');", "nm_move ('final');", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal_off", "nm_move ('final');", "nm_move ('final');", "sc_b_fim_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
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
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] != "F") { ?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['total'] + 1)?>);</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

<div id="id_youtube_window" style="display: none"></div>

</form> 
<script> 
<?php
 $NM_pag_atual = "form_publicaciones_form0";
 if (isset($this->nmgp_ancora) && $this->nmgp_ancora != "")
 {
     $NM_pag_atual = "form_publicaciones_form" . $this->nmgp_ancora;
 }
?>
  document.getElementById('<?php echo $NM_pag_atual; ?>').style.width='';
  document.getElementById('<?php echo $NM_pag_atual; ?>').style.height='';
  document.getElementById('<?php echo $NM_pag_atual; ?>').style.display='';
  document.getElementById('<?php echo $NM_pag_atual; ?>').style.overflow='visible';
</script> 
<?php
      $Tzone = ini_get('date.timezone');
      if (empty($Tzone))
      {
?>
<script> 
  _scAjaxShowMessage('', "<?php echo $this->Ini->Nm_lang['lang_errm_tz']; ?>", false, 0, false, "Ok", 0, 0, 0, 0, "", "", "", true, false);
</script> 
<?php
      }
?>
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
<script>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_publicaciones");
 parent.scAjaxDetailHeight("form_publicaciones", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailHeight("form_publicaciones", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
?>
<script type="text/javascript">
_scAjaxShowMessage(scMsgDefTitle, "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", false, sc_ajaxMsgTime, false, "Ok", 0, 0, 0, 0, "", "", "", false, true);
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_publicaciones']['sc_modal'])
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
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
<?php
       }
?>
</body> 
</html> 
