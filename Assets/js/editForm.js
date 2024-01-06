'use strict'

$(document).on('click', '.editar', function () {
  let id = $(this).attr('id');

  $.ajax({
    url: `/?id=${id}`,
    type: 'GET',
    success: function (response) {
      let resposta = JSON.parse(response);

      $('#idEdit').val(resposta.id);
      $('#nomeEdit').val(resposta.nome);
      $('#data_nascimentoEdit').val(resposta.data_nascimento);
      $('#emailEdit').val(resposta.email);
      $('#profissaoEdit').val(resposta.profissao);
      $('#telefoneEdit').val(resposta.telefone);
      $('#celularEdit').val(resposta.celular);
      $('#tem_whatsappEdit').prop('checked', resposta.tem_whatsapp == true);
      $('#notificacao_emailEdit').prop('checked', resposta.notificacao_email == true);
      $('#notificacao_smsEdit').prop('checked', resposta.notificacao_sms == true);
    }
  });
});

$(document).on('click', '.deletar', function () {
  let id = $(this).attr('id');

  $('#confirm').on('click', function () {
    window.location.href = `/deletar?id=${id}`;
  });
});