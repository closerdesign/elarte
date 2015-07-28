
function scJQGeneralAdd() {
  $('input:text.sc-js-input').listen();
  $('input:password.sc-js-input').listen();
  $('input:checkbox.sc-js-input').listen();
  $('select.sc-js-input').listen();
  $('textarea.sc-js-input').listen();

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if (false == scSetFocusOnField($oField) && 0 < $("#id_ac_" + sField).length) {
    scSetFocusOnField($("#id_ac_" + sField));
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if (0 < $oField.length && 0 < $oField[0].offsetHeight && 0 < $oField[0].offsetWidth && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["nombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["portada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["descripcion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["video" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["publicaciones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["precio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["status" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["nombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descripcion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descripcion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["video" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["video" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["publicaciones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["publicaciones" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_nombre' + iSeqRow).bind('blur', function() { sc_form_paquetes_nombre_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_paquetes_nombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_portada' + iSeqRow).bind('blur', function() { sc_form_paquetes_portada_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_paquetes_portada_onfocus(this, iSeqRow) });
  $('#id_sc_field_descripcion' + iSeqRow).bind('blur', function() { sc_form_paquetes_descripcion_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_paquetes_descripcion_onfocus(this, iSeqRow) });
  $('#id_sc_field_video' + iSeqRow).bind('blur', function() { sc_form_paquetes_video_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_paquetes_video_onfocus(this, iSeqRow) });
  $('#id_sc_field_publicaciones' + iSeqRow).bind('blur', function() { sc_form_paquetes_publicaciones_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_paquetes_publicaciones_onfocus(this, iSeqRow) });
  $('#id_sc_field_precio' + iSeqRow).bind('blur', function() { sc_form_paquetes_precio_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_paquetes_precio_onfocus(this, iSeqRow) });
  $('#id_sc_field_status' + iSeqRow).bind('blur', function() { sc_form_paquetes_status_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_paquetes_status_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_paquetes_nombre_onblur(oThis, iSeqRow) {
  do_ajax_form_paquetes_validate_nombre();
  scCssBlur(oThis);
}

function sc_form_paquetes_nombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_paquetes_portada_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_paquetes_portada_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_paquetes_descripcion_onblur(oThis, iSeqRow) {
  do_ajax_form_paquetes_validate_descripcion();
  scCssBlur(oThis);
}

function sc_form_paquetes_descripcion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_paquetes_video_onblur(oThis, iSeqRow) {
  do_ajax_form_paquetes_validate_video();
  scCssBlur(oThis);
}

function sc_form_paquetes_video_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_paquetes_publicaciones_onblur(oThis, iSeqRow) {
  do_ajax_form_paquetes_validate_publicaciones();
  scCssBlur(oThis);
}

function sc_form_paquetes_publicaciones_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_paquetes_precio_onblur(oThis, iSeqRow) {
  do_ajax_form_paquetes_validate_precio();
  scCssBlur(oThis);
}

function sc_form_paquetes_precio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_paquetes_status_onblur(oThis, iSeqRow) {
  do_ajax_form_paquetes_validate_status();
  scCssBlur(oThis);
}

function sc_form_paquetes_status_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_creado" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_creado" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['creado']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['creado']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ['<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>'],
    dayNamesMin: ['<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>'],
    monthNamesShort: ['<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>'],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['creado']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true
  });

} // scJQCalendarAdd

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_portada" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_paquetes_ul_save.php",
    dropZone: $("#hidden_field_data_portada" + iSeqRow),
    formData: function() {
      return [
        {name: 'app_dir', value: '<?php echo $this->Ini->path_aplicacao; ?>'},
        {name: 'app_name', value: 'form_paquetes'},
        {name: 'upload_dir', value: '<?php echo $this->Ini->root . $this->Ini->path_imag_temp; ?>/'},
        {name: 'upload_url', value: '<?php echo $this->Ini->path_imag_temp; ?>/'},
        {name: 'upload_url', value: '<?php echo $this->Ini->path_imag_temp; ?>/'},
        {name: 'upload_type', value: 'single'},
        {name: 'param_name', value: 'portada' + iSeqRow},
        {name: 'upload_file_height', value: '480'},
        {name: 'upload_file_width', value: '640'},
        {name: 'upload_file_aspect', value: 'S'},
        {name: 'upload_file_type', value: 'I'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_portada" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_portada" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, thumbDisplay, checkDisplay, var_ajax_img_thumb;
      if (data.result[0].body) {
        fileData = $.parseJSON(data.result[0].body.innerText);
      }
      else {
        fileData = eval(data.result);
      }
      $("#id_sc_field_portada" + iSeqRow).val("");
      $("#id_sc_field_portada_ul_name" + iSeqRow).val(fileData[0].sc_random_prot);
      $("#id_sc_field_portada_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_portada = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_random_prot;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_portada) ? "none" : "";
      $("#id_ajax_img_portada" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_portada" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_portada) {
        document.F1.temp_out_portada.value = var_ajax_img_thumb;
        document.F1.temp_out1_portada.value = var_ajax_img_portada;
      }
      else if (document.F1.temp_out_portada) {
        document.F1.temp_out_portada.value = var_ajax_img_portada;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_portada" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_portada" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
      $("#txt_ajax_img_portada" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_portada" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_portada" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_portada" + iSeqRow).hide();
      }
    }
  });

} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

