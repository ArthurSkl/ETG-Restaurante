<link rel="stylesheet" href="../assets/css/cadastrar_notificacao.css">

<body class="pai_de_todos">

    <div class="tudo">

        <div class="pagina">
            <section class="Enviar-notificacao">
                <h1>Enviar Notificação</h1>
            </section>

            <!--Input-->

            <section class="centralizar-inputs-tela-enviar-notificacao">
                <form action="" method="POST" class="form_enviar_notificacao">

                    <div class="input_group field">
                        <input name="email_destinatario" id="nome1" type="email" class="input_field" placeholder="Name" required="">
                        <label for="name" class="input_label">Para:</label> <!--Alterar para o nome do input-->
                    </div>

                    <!--Textarea-->
                    <div class="textarea">
                        <label class="titulo-notificacao" for="story">Notificação:</label>
                        <textarea maxlength="250" name="descricao" class="quadrado_text" name="story" rows="5" cols="33"></textarea>
                    </div>

            </section>

            <!--Botões-->

            <section class="centralizar_botoes_enviar_notificacao">

                <!--Botão Voltar-->
                <div class="botao-padrao-voltar">
                    <a onclick="voltarPagina()" class="botao-voltar-submit">VOLTAR</a>
                </div>

                <!--Botão Confirmar-->
                <div class="botao-padrao-confirmar">
                    <a><input name="btn_submit" type="submit" class="botao-confirmar-submit" value="CONFIRMAR"></a>
                </div>
                </form>

            </section>

        </div>
    </div>
    <!-- Script -->
    <script>
        function voltarPagina() {
            window.history.back();
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="../assets/js/modais.js"></script>
    <!-- jQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="../assets/js/autocomplete_cadastrar_notificacao.js"></script>
    
</body>