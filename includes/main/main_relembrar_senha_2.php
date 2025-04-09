<link rel="stylesheet" href="../assets/css/relembrar_senha_2.css">
<script src="../assets/js/tela_esqueceu_senha2.js"></script>


<body class="Pai-de-todos">

    <main class="tudo_esqueceu_senha2">
        <section class='titulo_esqueceu_senha2'>
            <h1>Insira o código enviado em seu E-mail:</h1>
    <form method="POST">
        
        </section>
            

 
                    <section class="centralizar_input_esqueceu_senha2"> 
                <!--Input Email-->
                        <div class="input_e-mail_group field">
                            <input name="email" type="" class="input_e-mail_field" placeholder="_" autocomplete="on">
                            <label for="name" class="input_e-mail_label">Código Enviado </label><!--Alterar para o nome do input-->
                        </div>
                
                        <div class="alinhar-item-timer">
                            <div class="item-timer">
                                <h1 id="text-timer">Solicitar outro código:</h1>   
                                <h1 id="timer">00:60</h1>
                                
                            </div>
                            <div>
                                <input type="submit" class="botao-enviar-dnv" id="actionBtn" name="btn_resend" value="Enviar novamente">
                            </div>
                        </div>
                    </section>
                

        </section>   


                
        <section class="centralizar_botoes_alterar_senha">
    
                <!--Botão Voltar-->
            <div class="botao-padrao-voltar">
                <a href="./relembrar_senha_1.php" class="botao-voltar-submit" >VOLTAR</a>
            </div>

                <!--Botão Confirmar-->
            <div class="botao-padrao-confirmar">
                <input name="btn_submit" type="submit" id="btn_submit" class="botao-confirmar-submit"  value="CONFIRMAR">
            </div>

        </section>

        
        <!-- <section class="centralizar_botoes_esqueceu_senha">


            <div class="botao-padrao-voltar">
                <a href="tela_esqueceu_senha1.php"><input type="submit" class="botao-voltar-submit"  value="VOLTAR"></a>
            </div>

            <div class="botao-padrao-confirmar">
                <input name="btn_submit" type="submit" class="botao-confirmar-submit"  value="CONFIRMAR">
            </div>

        </section> -->

    </form>
    </main>

</body>
