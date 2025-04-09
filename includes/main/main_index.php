 
 

 
<link type="text/css" rel="stylesheet" href="assets/css/login.css" media="screen"/> 
<body>
    
    
    <section class="area_login">

    <img class="wave_login" src="assets/imgs/waves/wave (4).png" alt="">
    <img class="wave_login wave2" src="assets/imgs/waves/wave 2.png" alt="">
    <img class="wave_login wave3" src="assets/imgs/waves/wave 2.png" alt="">
    <img class="img_logo_login" src="assets/imgs/logos/senacFec_white.png" alt="">
         

        <div class="quadrado_input_login"></div>
        <div class="area_inputs_tela_login">

            <form class="content_input" method="POST" action="">

                <div class="area_input">
                    <div class="area_img_input">

                        <img class="img_input perfil" src="assets/imgs/icons/icon_profile.png" >

                    </div>
                    <div class="input_person">

                        <input type="text" name="email" class="input_default_login" required="" >
                        <label for="" class="label_for_input_login">E-mail</label>
                        <div class="line_login"></div>

                    </div>

                </div>

                

                <div class="area_input">
                    <div class="area_img_input">

                        <img class="img_input matricula" src="assets/imgs/icons/icon_matricula.png" >

                    </div>
                    <div class="input_person">

                        <input type="text" name="matricula" class="input_default_login" required="" >
                        <label for="" class="label_for_input_login">Matrícula</label>
                        <div class="line_login"></div>
                    </div>

                </div>

                <div class="area_input">
                    <div class="area_img_input">

                        <img class="img_input password" src="assets/imgs/icons/fechadura.png" >

                    </div>
                    <div class="input_person">

                        <input type="password" name="senha" class="input_default_login" required="" >
                        <label for="" class="label_for_input_login">Senha</label>
                        <div class="line_login"></div>

                        <?php
                        // Verifica se existe uma mensagem de erro na URL
                        if (isset($_GET['erro']) && $_GET['erro'] == 'credenciais_incorretas') {
                            echo '<p class = "credIncor";>Credenciais incorretas.
                             Tente novamente.</p>';
                        }
                        ?>
                    </div>

                </div>

                <div class="area_link">
                    <a href="./pages/relembrar_senha_1.php">Esqueci minha senha</a>
                </div>
                
                
                 <div class="area_btn_sub_login">
                     
                    <input type="submit" value="Entrar" name="btn_sub" class="btn_sub_login">

                 </div>

            </form>
        </div>
    </section>
</body>
 