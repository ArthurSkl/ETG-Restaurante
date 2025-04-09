<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<script src="../assets/js/modais.js"></script>

<title>Cadastro de Perguntas</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<link rel="stylesheet" href="../assets/css/gerenciar_checklist.css">


<script src="../assets/js/modais.js"></script>

<script src="../assets/js/filter_checklist.js"></script>
<script defer src="../assets/js/filter_old_checklist.js"></script> 

<!-- <script defer src="../assets/js/effect_scroll.js" ></script> -->

 
<body>
    
    <main class="meio">

        <!-- TÍTULO DA PÁGINA -->

        <h1 id="titulo">Gerenciar Checklist</h1>

        <div class="aunt">

            <!-- PARTE DA PESQUISA  -->

                <div class="pesquisa">
                    <div class="input_group field darkModeEdit">
                        <input type="input" id ="input" class="input_field darkModeEditLineBottom" placeholder="." required="" name="nome-checklist" autocomplete="off">
                        <label for="name" class="input_label">Pesquisar checklist</label> 
                        <i class="bi bi-search" id="lupa"></i>
                    </div>
                </div>
            
            <!-- AQUI ELE ESTÁ PRINTANDO AS PERGUNTAS DO BANCO NOS CARDS (ver em "cadastrar_pergunta.php")-->
                
                <section class="perguntas" id="perguntas">
                    <?php

                        // echo($divs);
                    ?>
                    
                </section>

                <!-- AJAXXXXXXX DO SIMÃO??? -->
                <script>
                    listarChecklists()
                </script>
                
            <!-- BOTÃO DE CADASTRAR -->
                <div class="botaoo">
                    <a id="cadastrar" href="../pages/cadastrar_checklist.php"><button  class="botao-cadastrar-submit">CADASTRAR</button></a>
                </div>
        </div>

            <!-- POPUP DE CONFIRMAÇÃO DE EXCLUSÃO DA PERGUNTA -->
        <form class="overlay" id="overlay" style="opacity: 1;">

            <div class="popup_conf_exclusao" id="popup_conf_exclusao">
                <h9>Tem certeza que deseja excluir o checklist?</h9>

                <!-- DIV DOS BOTÕES (sim e não) -->

            <div class="botoes">
                <button class="botao-nao-submit" id="botao-nao-submit-excluir-pergunta" value="NÃO" >NÃO</button>
                <button class="botao-sim-submit" id="botao-sim-submit" value="SIM">SIM</button>
            </div>
            
            </div> 
        </form>
    </main>




<script>
 
    // SCRIPT DO POPUP DE CADASTRAR PERGUNTAS

    let popup_cadastro_pergunta = document.getElementById("popup-cadastro-pergunta");
    function openPopup1(){

        document.getElementById("overlay").style.visibility="visible";
        popup_cadastro_pergunta.classList.add("open-popup1");
        
    }
    function closePopup1(){ 
        
        document.getElementById("overlay").style.visibility= 'hidden';
        // popup_cadastro_pergunta.classList.remove("open-popup3");
    }

    // SCRIPT DO POPUP DE EDITAR PERGUNTAS

    let popup_editar_pergunta = document.getElementById("popup-editar-pergunta");
    function openPopup2(){

        document.getElementById("overlay").style.visibility="visible";
        popup_editar_pergunta.classList.add("open-popup2");
        
    }
    function closePopup2(){
        popup_editar_pergunta.classList.remove("open-popup2");
    }

    let popup_conf_exclusao = document.getElementById("popup_conf_exclusao");
    function openPopup3(){

        document.getElementById("overlay").style.visibility="visible";
        popup_conf_exclusao.classList.add("open-popup3");
        
    }
    function closePopup3(){
        document.getElementById("overlay").style.visibility="none";
        popup_conf_exclusao.classList.remove("open-popup3");
    }

</script>

</body>

<!-- Script -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

<!-- jQuery UI -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
<!-- <script src="../assets/js/autocomplete_cadastrar_notificacao.js"></script> -->