<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<link rel="stylesheet" href="//use.fontawesome.com/releases/v6.5.1/css/all.css">
<script defer src="../assets/js/ajax_checklist.js"></script>
<title>Cadastro de Perguntas</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<link rel="stylesheet" href="../assets/css/cadastrar_pergunta.css">

<!-- importando modais  -->
<script src="../assets/js/modais.js"></script>

<script src="../assets/js/filter.js"></script>
<script defer src="../assets/js/filter_old.js"></script> 

<!-- <script defer src="../assets/js/effect_scroll.js" ></script> -->

<body>
    
    <main class="meio">

        <!-- TÍTULO DA PÁGINA -->
        <h1 id="titulo">Listar Perguntas</h1>
        <div class="aunt">

            <!-- PARTE DA PESQUISA  -->

                <div class="pesquisa">
                    <div class="input_group field">
                        <input type="input" id ="input" class="input_field darkModeEditLineBottom" placeholder="." required="" name="nome-checklist" autocomplete="off">
                        <label for="name" class="input_label darkModeEdit">Pesquisar pergunta</label> 
                        <i class="bi bi-search darkModeEdit" id="lupa"></i>
                    </div>
                </div>

                

            
            <!-- PARTE DO FILTRO -->

            <section class="filtro ">

                <a class="text_filtro">SELECIONE:</a>

                <label class="checkbox-container1">
                    <input class="custom-checkbox" id="checkPre" checked="" type="checkbox">
                    <a class="text_filtro darkModeEdit">Pré-Aula</a>
                    <span class="checkmark"></span>
                </label>

                
                <label class="checkbox-container2">
                    <input class="custom-checkbox" id="checkPos" checked="" type="checkbox">
                    <a class="text_filtro darkModeEdit">Pós-Aula</a>
                    <span class="checkmark"></span>
                </label>

            </section>
            
        
            <!-- AQUI ELE ESTÁ PRINTANDO AS PERGUNTAS DO BANCO NOS CARDS (ver em "cadastrar_pergunta.php")-->
                
                <section class="perguntas" id="perguntas">
                    <?php

                        // echo($divs);
                    ?>
                    
                </section>

                <script>
                    listarPerguntass()
                </script>
                
            <!-- BOTÃO DE CADASTRAR -->
                <div class="botao">
                    <button  class="botao-cadastrar-submit"   value="CADASTRAR" onclick="openPopup1()">CADASTRAR</button>
                </div>
        </div>
 
        <!-- POPUP DE CADASTRAR PERGUNTA -->

        <form id='form_cad_pergunta' class="overlay" style="opacity: 1;">
            <div class="popup_cadastrar" id="popup-cadastro-pergunta">
                <h4>Cadastrar pergunta:</h4>

                <textarea maxlength="200" name="nova_pergunta" id="nova_pergunta"  class="nova_pergunta" placeholder= "Escreva a pergunta"cols="30" rows="10" autocomplete= "off"></textarea>

                <h4>Selecione a categoria da pergunta:</h4>

                <!-- DIV DAS 2 CHECKBOX'S -->
                
                <div class="checks">
                    <div class="check1">
                        <input type="checkbox" name="antes_da_aula" id="check1"> Pré-Aula
                    </div>
                    <div class="check2">
                        <input type="checkbox" name="depois_da_aula" id="check2"> Pós-Aula
                    </div>
                </div>

                <!-- DIV DOS BOTÕES (cancelar e confirmar) -->
                <div class="botoes">
                    <button class="botao-cancelar-submit" id="btn_cancelar_cad_pergunta" value="CANCELAR"  >CANCELAR</button>
                    <button class="botao-confirmar-submit" id="btn_cad_pergunta" value="CONFIRMAR">CONFIRMAR</button>
                </div>
            </div>
        </form>




        <!-- POPUP CADASTRAR PERGUNTA NO CHECKLIST-->

        <form class="overlay" id="form_cad_pergunta_checklist" style="opacity: 1;">

            <div class="popup_cad_checklist" id="popup_cad_checklist">

                <h4>Escolha um checklist para inserir ou excluir a pergunta:</h4>

                <section class="area_checklists">
                    <div class="checklist_card">
                    <i class="bi bi-plus-circle"></i>
                    <div class="card_text"> Nome de checklist </div>
                    </div>
                </section>
                
                <!-- DIV DOS BOTÕES (cancelar e confirmar) -->

                <div class="botoes">
                    <button class="botao-ok-submit" onclick="closePopup4()" id='botao_cancelar_editar' value="OK" > OK, FECHAR</button>
                </div>
            </div>
        </form>

 
        

            <!-- POPUP EDITAR PERGUNTA -->

        <form class="overlay" id="form_editar_pergunta" style="opacity: 1;">

            <div class="popup_editar" id="popup-editar-pergunta">
                <h4>Editar pergunta:</h4>

                <textarea maxlength="200" name="nova_pergunta" id="text_editar_pergunta" class="nova_pergunta" placeholder= "Escreva a pergunta"cols="30" rows="10" autocomplete= "off"></textarea>

                <h4>Selecione a categoria da pergunta:</h4>

                <!-- DIV DAS 2 CHECKBOX'S -->
                
                <div class="checks">
                    <div class="check1">
                        <input type="checkbox" name="antes_da_aula" id="check3"> Pré-Aula
                    </div>
                    <div class="check2">
                        <input type="checkbox" name="depois_da_aula" id="check4"> Pós-Aula
                    </div>
                </div>

                <!-- DIV DOS BOTÕES (cancelar e confirmar) -->

                <div class="botoes">
                    <button class="botao-cancelar-submit" id='botao_cancelar_editar' value="CANCELAR" >CANCELAR</button>
                    <button class="botao-confirmar-submit" id='botao_confirmar_editar' value="CONFIRMAR">CONFIRMAR</button>
                </div>
            </div>
        </form>
        
         

            <!-- POPUP DE CONFIRMAÇÃO DE EXCLUSÃO DA PERGUNTA -->
        <form class="overlay" id="overlay" style="opacity: 1;">

            <div class="popup_conf_exclusao" id="popup_conf_exclusao">
                <h9>Tem certeza que deseja excluir a pergunta?</h9>

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
        popup_cadastro_pergunta.classList.remove("open-popup1");
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



    // SCRIPT DO POPUP DE EXCLUIR PERGUNTAS

    let popup_conf_exclusao = document.getElementById("popup_conf_exclusao");
    function openPopup3(){

        document.getElementById("overlay").style.visibility="visible";
        popup_conf_exclusao.classList.add("open-popup3");
        
    }
    function closePopup3(){
        popup_conf_exclusao.classList.remove("open-popup3");
    }



    // SCRIPT DO POPUP DE INSERIR PERGUNTAS NO CHECKLIST

    let popup_cad_checklist = document.getElementById("popup_cad_checklist");
    function openPopup4(){

        document.getElementById("overlay").style.visibility="visible";
        popup_cad_checklist.classList.add("open-popup4");
        
    }
    function closePopup4(){ 
        
        document.getElementById("overlay").style.visibility="hidden";
        popup_cad_checklist.classList.remove("open-popup4");
    }

</script>

</body>

<!-- Script -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

<!-- jQuery UI -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
<!-- <script src="../assets/js/autocomplete_cadastrar_notificacao.js"></script> -->