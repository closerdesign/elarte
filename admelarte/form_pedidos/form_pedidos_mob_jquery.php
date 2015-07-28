
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
  scEventControl_data["id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["usuario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["valor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["status" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["formapago" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["orderid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["transactionid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["state" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pendingreason" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["responsecode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["urlpaymentreceipthtml" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["reference" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["usuario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usuario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["formapago" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["formapago" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["orderid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["orderid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["transactionid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["transactionid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["state" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["state" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pendingreason" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pendingreason" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["responsecode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["responsecode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["urlpaymentreceipthtml" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["urlpaymentreceipthtml" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["reference" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["reference" + iSeqRow]["change"]) {
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
  $('#id_sc_field_id' + iSeqRow).bind('blur', function() { sc_form_pedidos_id_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_pedidos_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_usuario' + iSeqRow).bind('blur', function() { sc_form_pedidos_usuario_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_pedidos_usuario_onfocus(this, iSeqRow) });
  $('#id_sc_field_valor' + iSeqRow).bind('blur', function() { sc_form_pedidos_valor_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_pedidos_valor_onfocus(this, iSeqRow) });
  $('#id_sc_field_status' + iSeqRow).bind('blur', function() { sc_form_pedidos_status_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_pedidos_status_onfocus(this, iSeqRow) });
  $('#id_sc_field_formapago' + iSeqRow).bind('blur', function() { sc_form_pedidos_formapago_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_pedidos_formapago_onfocus(this, iSeqRow) });
  $('#id_sc_field_orderid' + iSeqRow).bind('blur', function() { sc_form_pedidos_orderid_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_pedidos_orderid_onfocus(this, iSeqRow) });
  $('#id_sc_field_transactionid' + iSeqRow).bind('blur', function() { sc_form_pedidos_transactionid_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_pedidos_transactionid_onfocus(this, iSeqRow) });
  $('#id_sc_field_state' + iSeqRow).bind('blur', function() { sc_form_pedidos_state_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_pedidos_state_onfocus(this, iSeqRow) });
  $('#id_sc_field_pendingreason' + iSeqRow).bind('blur', function() { sc_form_pedidos_pendingreason_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_pedidos_pendingreason_onfocus(this, iSeqRow) });
  $('#id_sc_field_responsecode' + iSeqRow).bind('blur', function() { sc_form_pedidos_responsecode_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_pedidos_responsecode_onfocus(this, iSeqRow) });
  $('#id_sc_field_urlpaymentreceipthtml' + iSeqRow).bind('blur', function() { sc_form_pedidos_urlpaymentreceipthtml_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_pedidos_urlpaymentreceipthtml_onfocus(this, iSeqRow) });
  $('#id_sc_field_reference' + iSeqRow).bind('blur', function() { sc_form_pedidos_reference_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_pedidos_reference_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_pedidos_id_onblur(oThis, iSeqRow) {
  do_ajax_form_pedidos_mob_validate_id();
  scCssBlur(oThis);
}

function sc_form_pedidos_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedidos_usuario_onblur(oThis, iSeqRow) {
  do_ajax_form_pedidos_mob_validate_usuario();
  scCssBlur(oThis);
}

function sc_form_pedidos_usuario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedidos_valor_onblur(oThis, iSeqRow) {
  do_ajax_form_pedidos_mob_validate_valor();
  scCssBlur(oThis);
}

function sc_form_pedidos_valor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedidos_status_onblur(oThis, iSeqRow) {
  do_ajax_form_pedidos_mob_validate_status();
  scCssBlur(oThis);
}

function sc_form_pedidos_status_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedidos_formapago_onblur(oThis, iSeqRow) {
  do_ajax_form_pedidos_mob_validate_formapago();
  scCssBlur(oThis);
}

function sc_form_pedidos_formapago_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedidos_orderid_onblur(oThis, iSeqRow) {
  do_ajax_form_pedidos_mob_validate_orderid();
  scCssBlur(oThis);
}

function sc_form_pedidos_orderid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedidos_transactionid_onblur(oThis, iSeqRow) {
  do_ajax_form_pedidos_mob_validate_transactionid();
  scCssBlur(oThis);
}

function sc_form_pedidos_transactionid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedidos_state_onblur(oThis, iSeqRow) {
  do_ajax_form_pedidos_mob_validate_state();
  scCssBlur(oThis);
}

function sc_form_pedidos_state_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedidos_pendingreason_onblur(oThis, iSeqRow) {
  do_ajax_form_pedidos_mob_validate_pendingreason();
  scCssBlur(oThis);
}

function sc_form_pedidos_pendingreason_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedidos_responsecode_onblur(oThis, iSeqRow) {
  do_ajax_form_pedidos_mob_validate_responsecode();
  scCssBlur(oThis);
}

function sc_form_pedidos_responsecode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedidos_urlpaymentreceipthtml_onblur(oThis, iSeqRow) {
  do_ajax_form_pedidos_mob_validate_urlpaymentreceipthtml();
  scCssBlur(oThis);
}

function sc_form_pedidos_urlpaymentreceipthtml_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_pedidos_reference_onblur(oThis, iSeqRow) {
  do_ajax_form_pedidos_mob_validate_reference();
  scCssBlur(oThis);
}

function sc_form_pedidos_reference_onfocus(oThis, iSeqRow) {
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

var scBtnGrpStatus = {};
function scBtnGrpShow(sGroup) {
  var btnPos = $('#sc_btgp_btn_' + sGroup).offset();
  scBtnGrpStatus[sGroup] = 'open';
  $('#sc_btgp_btn_' + sGroup).mouseout(function() {
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  });
  $('#sc_btgp_div_' + sGroup + ' span a').click(function() {
    scBtnGrpStatus[sGroup] = 'out';
    scBtnGrpHide(sGroup);
  });
  $('#sc_btgp_div_' + sGroup).css({
    'left': btnPos.left
  })
  .mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  })
  .mouseleave(function() {
    scBtnGrpStatus[sGroup] = 'out';
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  })
  .show('fast');
}
function scBtnGrpHide(sGroup) {
  if ('over' != scBtnGrpStatus[sGroup]) {
    $('#sc_btgp_div_' + sGroup).hide('fast');
  }
}
