<link rel="stylesheet" href="../assets/css/relembrar_senha_3.css">

<body>
    <main class="pai-de-todos">
        
        <section class='titulo_alterar_senha'>
            <h1>Redefinir Senha</h1>
        </section>
    <form method="POST" action="">
        <section class="centralizar_input_alterar_senha"> 
             
            <div class="input_senha_group field2">
                <input name="senha" type="password" class="input_senha_field" placeholder="Name" required="">
                <label for="name" class="input_senha_label">Criar nova senha</label> <!--Alterar para o nome do input-->
            </div>

            <div class="input_senha_group field3">
                <input name="senha_confirma" type="password" class="input_senha_field" placeholder="Name" required="">
                <label for="name" class="input_senha_label">Confirmar nova senha</label> <!--Alterar para o nome do input-->
            </div>

        </section>   




                
        <section class="centralizar_botoes_alterar_senha">
    
                <!--Botão Voltar-->
            <div class="botao-padrao-voltar">
                <a href="./main_relembrar_senha_2.php" class="botao-voltar-submit" >VOLTAR</a>
            </div>

                <!--Botão Confirmar-->
            <div class="botao-padrao-confirmar">
                <input  name="btn_submit" type="submit" id="btn_submit" class="botao-confirmar-submit"  value="CONFIRMAR">
            </div>

        </section>




        <!-- <section class="centralizar_botoes_alterar_senha">

               
            <div class="botao-padrao-voltar">
                <a href="tela_esqueceu_senha2.php"><input type="submit" class="botao-voltar-submit"  value="VOLTAR"></a>
            </div>

                
            <div class="botao-padrao-confirmar">
                <input name="btn_submit" type="submit" class="botao-confirmar-submit"  value="CONFIRMAR">
            </div> -->
    </form>
        </section>
    </main>
</body>
