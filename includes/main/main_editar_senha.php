<link rel="stylesheet" href="../assets/css/editar_senha/input_button_editar_senha.css">
<link rel="stylesheet" href="../assets/css/editar_senha/editar_senha.css">


<body>
    <main class="pai-de-todos">
        <section class='titulo_alterar_senha'>
            <h1>Alterar Senha</h1>
        </section>

        <form method="POST" class="centralizar-back"> 
            <section class="centralizar_input_alterar_senha">

        

                    <!--Input Senha-->
                <div class="input_senha_group field">
                    <input name="senhaantiga" type="password" class="input_senha_field" placeholder="Name" required="">
                    <label for="name" class="input_senha_label">Senha antiga</label> <!--Alterar para o nome do input-->
                </div>

                <div class="input_senha_group field2">
                    <input name="novasenha" type="password" class="input_senha_field" placeholder="Name" required="">
                    <label for="name" class="input_senha_label">Criar nova senha</label> <!--Alterar para o nome do input-->
                </div>

                <div class="input_senha_group field3">
                    <input name="confirmarnovasenha" type="password" class="input_senha_field" placeholder="Name" required="">
                    <label for="name" class="input_senha_label">Confirmar nova senha</label> <!--Alterar para o nome do input-->
                </div>
            </section>

        

            <section class="centralizar_botoes_alterar_senha">

                    <!--Botão Voltar-->
                <div class="botao-padrao-voltar">
                    <a href="#"><input type="submit" class="botao-voltar-submit"  value="VOLTAR"></a>
                </div>

                    <!--Botão Confirmar-->
                <div class="botao-padrao-confirmar">
                    <a href="#"><input name="btn_submit" type="submit" class="botao-confirmar-submit"  value="CONFIRMAR"></a>
                </div>

            </section>
        </form>   
    </main>

</body>
