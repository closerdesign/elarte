
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
  scEventControl_data["id_inscripcion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["estado_inscripcion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["metodo_pago" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["transaction_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["valor_inscripcion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["id_pedido" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["creado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_inscripcion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_inscripcion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estado_inscripcion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estado_inscripcion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["metodo_pago" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["metodo_pago" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["transaction_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["transaction_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valor_inscripcion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valor_inscripcion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_pedido" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_pedido" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["creado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["creado" + iSeqRow]["change"]) {
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
  $('#id_sc_field_id_inscripcion' + iSeqRow).bind('blur', function() { sc_form_inscritos_conferencia_edit_id_inscripcion_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_inscritos_conferencia_edit_id_inscripcion_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_pedido' + iSeqRow).bind('blur', function() { sc_form_inscritos_conferencia_edit_id_pedido_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_inscritos_conferencia_edit_id_pedido_onfocus(this, iSeqRow) });
  $('#id_sc_field_estado_inscripcion' + iSeqRow).bind('blur', function() { sc_form_inscritos_conferencia_edit_estado_inscripcion_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_inscritos_conferencia_edit_estado_inscripcion_onfocus(this, iSeqRow) });
  $('#id_sc_field_metodo_pago' + iSeqRow).bind('blur', function() { sc_form_inscritos_conferencia_edit_metodo_pago_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_inscritos_conferencia_edit_metodo_pago_onfocus(this, iSeqRow) });
  $('#id_sc_field_transaction_id' + iSeqRow).bind('blur', function() { sc_form_inscritos_conferencia_edit_transaction_id_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_inscritos_conferencia_edit_transaction_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_valor_inscripcion' + iSeqRow).bind('blur', function() { sc_form_inscritos_conferencia_edit_valor_inscripcion_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_inscritos_conferencia_edit_valor_inscripcion_onfocus(this, iSeqRow) });
  $('#id_sc_field_creado' + iSeqRow).bind('blur', function() { sc_form_inscritos_conferencia_edit_creado_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_inscritos_conferencia_edit_creado_onfocus(this, iSeqRow) });
  $('#id_sc_field_creado_hora' + iSeqRow).bind('blur', function() { sc_form_inscritos_conferencia_edit_creado_hora_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_inscritos_conferencia_edit_creado_hora_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_inscritos_conferencia_edit_id_inscripcion_onblur(oThis, iSeqRow) {
  do_ajax_form_inscritos_conferencia_edit_validate_id_inscripcion();
  scCssBlur(oThis);
}

function sc_form_inscritos_conferencia_edit_id_inscripcion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_inscritos_conferencia_edit_id_pedido_onblur(oThis, iSeqRow) {
  do_ajax_form_inscritos_conferencia_edit_validate_id_pedido();
  scCssBlur(oThis);
}

function sc_form_inscritos_conferencia_edit_id_pedido_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_inscritos_conferencia_edit_estado_inscripcion_onblur(oThis, iSeqRow) {
  do_ajax_form_inscritos_conferencia_edit_validate_estado_inscripcion();
  scCssBlur(oThis);
}

function sc_form_inscritos_conferencia_edit_estado_inscripcion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_inscritos_conferencia_edit_metodo_pago_onblur(oThis, iSeqRow) {
  do_ajax_form_inscritos_conferencia_edit_validate_metodo_pago();
  scCssBlur(oThis);
}

function sc_form_inscritos_conferencia_edit_metodo_pago_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_inscritos_conferencia_edit_transaction_id_onblur(oThis, iSeqRow) {
  do_ajax_form_inscritos_conferencia_edit_validate_transaction_id();
  scCssBlur(oThis);
}

function sc_form_inscritos_conferencia_edit_transaction_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_inscritos_conferencia_edit_valor_inscripcion_onblur(oThis, iSeqRow) {
  do_ajax_form_inscritos_conferencia_edit_validate_valor_inscripcion();
  scCssBlur(oThis);
}

function sc_form_inscritos_conferencia_edit_valor_inscripcion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_inscritos_conferencia_edit_creado_onblur(oThis, iSeqRow) {
  do_ajax_form_inscritos_conferencia_edit_validate_creado();
  scCssBlur(oThis);
}

function sc_form_inscritos_conferencia_edit_creado_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_inscritos_conferencia_edit_validate_creado();
  scCssBlur(oThis);
}

function sc_form_inscritos_conferencia_edit_creado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_inscritos_conferencia_edit_creado_hora_onfocus(oThis, iSeqRow) {
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
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd
