<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/Assets/js/form.js"></script>
    <script src="/Assets/js/editForm.js"></script>
    <link rel="stylesheet" href="/Assets/css/style.css">
    <link rel="stylesheet" href="/Assets/css/reset.css">
    <link rel="stylesheet" href="/Assets/css/header.css">
    <link rel="stylesheet" href="/Assets/css/main.css">
    <link rel="stylesheet" href="/Assets/css/footer.css">
    <title>Registrar Contato</title>
</head>

<body>
    <header>
        <img src="/Assets/img/logo_alphacode.png" alt="logo Alphacode">
        <H1>Cadastro de contatos</H1>
    </header>
    <main>
        <form method="POST" action="/" id="form">
            <div class="row mb-5">
                <div class="col-sm-5 inputForm">
                    <label for="nome">Nome completo</label>
                    <input type="text" name="nome" id="nome" class="form-control"
                        placeholder="Ex.: Letícia Pacheco dos Santos" required>
                </div>
                <div class="col-sm-5 inputForm">
                    <label for="data_nascimento">Data de nascimento</label>
                    <input type="date" name="data_nascimento" id="data_nascimento" class="form-control"
                        placeholder="Ex.: 03/10/2003" required>
                </div>
                <div class="col-sm-5 inputForm">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control"
                        placeholder="Ex.: leticia@gmail.com" required>
                </div>
                <div class="col-sm-5 inputForm">
                    <label for="profissao">Profissão</label>
                    <input type="text" name="profissao" id="profissao" class="form-control"
                        placeholder="Ex.: Desenvolvedor Web" required>
                </div>
                <div class="col-sm-5 inputForm">
                    <label for="telefone">Telefone para contato</label>
                    <input type="tel" name="telefone" id="telefone" class="form-control"
                        placeholder="Ex.: (11) 4033-2019" required>
                </div>
                <div class="col-sm-5 inputForm">
                    <label for="celular">Celular para contato</label>
                    <input type="tel" name="celular" id="celular" class="form-control"
                        placeholder="Ex.: (11) 98492-2039" required>
                </div>
                <div class="col-sm-5 inputForm">
                    <input class="form-check-input" type="checkbox" value="" name="tem_whatsapp" id="tem_whatsapp">
                    <label class="form-check-label" for="tem_whatsapp">
                        Número de celular possui Whatsapp
                    </label>
                </div>
                <div class="col-sm-5 inputForm">
                    <input class="form-check-input" type="checkbox" value="" name="notificacao_email"
                        id="notificacao_email">
                    <label class="form-check-label" for="notificacao_email">
                        Enviar notificações por E-mail
                    </label>
                </div>
                <div class="col-sm-5 inputForm">
                    <input class="form-check-input" type="checkbox" value="" name="notificacao_sms"
                        id="notificacao_sms">
                    <label class="form-check-label" for="notificacao_sms">
                        Enviar notificações por SMS
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary float-end">Cadastrar contato</button>
        </form>

        <div class="lista_contatos">
            <table class="table text-center">
                <thead>
                    <tr class="th">
                        <th style="background-color: #068ED0; color: white;">Nome</th>
                        <th style="background-color: #068ED0; color: white;">Data de nascimento</th>
                        <th style="background-color: #068ED0; color: white;">E-mail</th>
                        <th style="background-color: #068ED0; color: white;">Celular para contato</th>
                        <th style="background-color: #068ED0; color: white;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($model->rows as $contato): ?>
                        <tr class="td">
                            <td>
                                <?= $contato->nome ?>
                            </td>
                            <td>
                                <?= date('d/m/Y', strtotime($contato->data_nascimento)) ?>
                            </td>
                            <td>
                                <?= $contato->email ?>
                            </td>
                            <td>
                                <?= $contato->celular ?>
                            </td>
                            <td>
                                <img id="<?= $contato->id ?>" class="acao editar" style="margin-right: 5px;"
                                    src="Assets/img/editar.png" alt="editar contato" data-bs-toggle="modal"
                                    data-bs-target="#editar">
                                <img id="<?= $contato->id ?>" class="acao deletar" src="Assets/img/excluir.png"
                                    alt="excluir contato" data-bs-toggle="modal" data-bs-target="#deletar">
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="editar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Contato</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/" id="editarContato">
                                <input type="hidden" name="id" id="idEdit">
                                <div class="col inputForm nome">
                                    <label for="nomeEdit">Nome completo</label>
                                    <input type="text" name="nome" id="nomeEdit" class="form-control"
                                        placeholder="Ex.: Letícia Pacheco dos Santos" required>
                                </div>
                                <div class="col inputForm dataNascimento">
                                    <label for="data_nascimentoEdit">Data de nascimento</label>
                                    <input type="date" name="data_nascimento" id="data_nascimentoEdit" class="form-control"
                                        placeholder="Ex.: 03/10/2003" required>
                                </div>
                                <div class="col inputForm email">
                                    <label for="emailEdit">E-mail</label>
                                    <input type="email" name="email" id="emailEdit" class="form-control"
                                        placeholder="Ex.: leticia@gmail.com" required>
                                </div>
                                <div class="col inputForm profissao">
                                    <label for="profissaoEdit">Profissão</label>
                                    <input type="text" name="profissao" id="profissaoEdit" class="form-control"
                                        placeholder="Ex.: Desenvolvedor Web" required>
                                </div>
                                <div class="col5 inputForm telefone">
                                    <label for="telefoneEdit">Telefone para contato</label>
                                    <input type="tel" name="telefone" id="telefoneEdit" class="form-control"
                                        placeholder="Ex.: (11) 4033-2019" required>
                                </div>
                                <div class="col inputForm celular">
                                    <label for="celularEdit">Celular para contato</label>
                                    <input type="tel" name="celular" id="celularEdit" class="form-control"
                                        placeholder="Ex.: (11) 98492-2039" required>
                                </div>
                                <div class="col inputForm temWhatsapp">
                                    <input class="form-check-input" type="checkbox" value="" name="tem_whatsapp"
                                        id="tem_whatsappEdit">
                                    <label class="form-check-label" for="tem_whatsappEdit">
                                        Número de celular possui Whatsapp
                                    </label>
                                </div>
                                <div class="col inputForm notificacaoEmail">
                                    <input class="form-check-input" type="checkbox" value="" name="notificacao_email"
                                        id="notificacao_emailEdit">
                                    <label class="form-check-label" for="notificacao_emailEdit">
                                        Enviar notificações por E-mail
                                    </label>
                                </div>
                                <div class="col inputForm notificacaoSms">
                                    <input class="form-check-input" type="checkbox" value="" name="notificacao_sms"
                                        id="notificacao_smsEdit">
                                    <label class="form-check-label" for="notificacao_smsEdit">
                                        Enviar notificações por SMS
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary float-end" id="editarContato">Editar contato</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deletar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Apagar Contato</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Você tem certeza que quer apagar esse contato?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary" id="confirm">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>Termos | Políticas</p>
        <div class="copyright">
            <p>© Copyright 2022 | Desenvolvido por</p>
            <img src="/Assets/img/logo_rodape_alphacode.png" alt="Logo Alphacode de rodapé">
        </div>
        <p>©Alphacode IT Solutions 2022</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>