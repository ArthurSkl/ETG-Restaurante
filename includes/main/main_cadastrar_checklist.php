<link rel="stylesheet" href="estilo_perfil.css">
<link rel="stylesheet" href="https/cdnjs.cloudflare.comlibs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="../assets/css/cadastrar_checklist/input-checklist.css">
<link rel="stylesheet" href="../assets/css/cadastrar_checklist/posicao.css">
<link rel="stylesheet" href="../assets/css/cadastrar_checklist/caixa_pergunta.css">
<link rel="stylesheet" href="../assets/css/cadastrar_checklist/botões-checklist.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script defer src="../assets/js/modais.js"></script>
<script defer src="../assets/js/ajax_checklist.js"></script>
<script defer src="../assets/js/modal_pergunta_checklist.js"></script>
<script defer src="../assets/js/cadastro-checklist.js"></script>

<body class="pai_de_todos">
    <?php include_once("../includes/menu.php"); ?>
    <div class="titulo-topo">
        <h1 id="titulo">Cadastro de CheckList</h1>
    </div>
    
    <div class="container-pop-up-notificacao">
        <!-- <button type="submit" class="btn-pop-up-notificacao" id="submit-btn-notificacao" onclick="openPopupValidar()">Submit</button> -->
        <div class="popup-notificacao" id="popup-up-notificacao">
            <div class="div-img">
                <img src="../includes/pop-ups/img/Check_ring.png" alt="carregando" id="img_check">
                <p>Checklist Cadastrada com sucesso! </p>
            </div>
            
            <div class="botao-padrao-ok">
                <script>
                    function closePopupValidar() {
                        let popup = document.getElementById("popup-up-notificacao");
                        let btn = document.getElementById("submit-btn-notificacao");

                        // btn.style.display = "block";

                        popup.classList.remove("open-popup");
                    }
                </script>
                <a href="cadastrar_checklist.php"><input type="submit" class="botao-ok-submit" onclick="closePopupValidar()" value="OK"></a>
            </div>
        </div>
    </div>

    <div class="container-pop-up-notificacao">

        <div class="popup-notificacao" id="popup-up-notificacao">
            <div class="div-img">
                <img src="img/erro.png" alt="carregando" id="img_check">
                <p>Recado excluído com sucesso! </p>
            </div>
            <div class="botao-padrao-ok">
                <a href="#"><input type="submit" class="botao-ok-submit" onclick="closePopupValidar()" value="OK"></a>
            </div>
        </div>
    </div>

    <main class="todo-projeto">

        <form class="cadastro-checklist" method="POST" action="../../teste.php" name="form-perguntas" id="meuFormulario">

            <div class="inputs-cadastro-checklist">
                <div class="input_group field">
                    <input type="text" class="input_field" placeholder="Nome da Checklist" id="nome_checklist" name="nome_checklist" maxlength="45">
                    <label for="name" class="input_label">Nome da CheckList</label> <!--Alterar para o nome do input-->

                </div>

            </div>
            <div class="inputs-cadastro-checklist">
                <div class="input_group field">
                    <input type="text" id="ajaxPergunta" class="input_field" placeholder="" maxlength="45">
                    <label for="name" class="input_label">Pesquisa a Pergunta</label> <!--Alterar para o nome do input-->

                </div>

            </div>

            <!-- Menu das abas -->
            <ul class="tab-menu">
                <li class="tab-button active" id="btn_pre" onclick="showTab('tab1')">Pré-Aula</li>
                <li class="tab-button" id="btn_pos" onclick="showTab('tab2')">Pós-Aula</li>
                <div class="line" id="line"></div>
                <div class="adicionar_pergunta">
                    <a id="add_pergunta" onclick="openPopup1()"><i class="fa-solid fa-plus" id="icon_add"></i></a>
                </div>

                <!-- POPUP DE CADASTRAR PERGUNTA -->

                <form class="overlay" id='novo_form_cadastrar_pergunta' style="opacity: 1;">
                    <div class="popup_cadastrar" id="popup-cadastro-pergunta">
                        <h4>Cadastrar pergunta:</h4>

                        <textarea maxlength="210" name="nova_pergunta" id="nova_pergunta" class="nova_pergunta" placeholder="Escreva a pergunta" cols="30" rows="10" autocomplete="off"></textarea>

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
                            <button class="botao-cancelar-submit" id="btn_cancelar_cad_pergunta" value="CANCELAR" onclick="closePopup1()">CANCELAR</button>
                            <button class="botao-confirmar-submit" id="btn_cad_pergunta" value="CONFIRMAR">CONFIRMAR</button>

                            <!-- REVISAO -->
                        </div>
                    </div>
                </form>
                <form class="overlay" id="overlay" style="opacity: 1;"></form>
            </ul>
            <!-- Conteúdo das abas -->
            <div id="tab1" class="tab" style="display: block;">
                <div class="titulo-selecione-pergunta-pre">
                    <h1 id="titulo-pergunta-pos">Selecione as Perguntas Pré Aula:</h1>
                </div>
                <section class="selecao-pergunta">
                    <table class="tabela-perguntas" id="tablePre" name="pergunta">
                        <!-- <tr class="topo-tabela">
                            <th>Selecione</th>
                            <th>Pergunta Pré</th>
                        </tr> -->
                        <?php

                        // $trpre
                        ?>
                    </table>
                </section>
            </div>
            <div id="tab2" class="tab">
                <div class="titulo-selecione-pergunta-pos">
                    <h1 id="titulo-pergunta-pos">Selecione as Perguntas Pós Aula:</h1>
                </div>
                <section class="selecao-pergunta">
                    <table class="tabela-perguntas" id="tablePos">
                        <!-- <tr class="topo-tabela">
                            <th>Selecione</th>
                            <th>Pergunta Pós</th>
                        </tr> -->
                        <?php
                        //  $trpos 
                        ?>
                    </table>
                </section>
            </div>

            <div class="botoes">
                <div class="botoes-cadastro-checklist">
                    <!--Botão Voltar-->
                    <div class="botao-padrao-voltar">
                        <a onclick="voltarPagina()"><input type="submit" class="botao-voltar-submit" value="VOLTAR"></a>
                    </div>

                    <!--Botão Cadastrar-->
                    <div class="botao-padrao-cadastrar">
                        <input type="submit" name="btn_cadastrar" class="botao-cadastrar-submit" id="btn_cadastrar" value="CADASTRAR">
                    </div>
                </div>
            </div>

        </form>

    </main>
    <script>
            function showTab(tabId) {

                ResetListaPerguntas()

                const tabs = document.querySelectorAll('.tab');
                const buttons = document.querySelectorAll('.tab-button');
                tabs.forEach(tab => tab.style.display = 'none');
                buttons.forEach(button => button.classList.remove('active'));
                document.getElementById(tabId).style.display = 'block';
                document.querySelector(`[onclick="showTab('${tabId}')"`).classList.add('active');
            }
            const btn_pos = document.getElementById('btn_pos');
            btn_pos.addEventListener('click', proxTab);

            function proxTab() {
                const line = document.getElementById('line');
                line.classList.add('active');
            }
            const btn_pre = document.getElementById('btn_pre');
            btn_pre.addEventListener('click', preTab);

            function preTab() {
                const line = document.getElementById('line');
                line.classList.remove('active');
            }
        </script>
    
    <script>
        // SCRIPT DO POPUP DE CADASTRAR PERGUNTAS

        let popup_cadastro_pergunta = document.getElementById("popup-cadastro-pergunta");

        function openPopup1() {

            document.getElementById("overlay").style.visibility = "visible";
            popup_cadastro_pergunta.classList.add("open-popup1");

        }

        function closePopup1() {

            document.getElementById("overlay").style.visibility = 'hidden';
            popup_cadastro_pergunta.classList.remove("open-popup1");
        }

        const btn = document.getElementById("btn_cad_pergunta");
        const formulario = document.getElementById("form_cad_pergunta");

        //botao de confirmar cadastro de pergunta 

        btn.addEventListener("click", async function(event) {
            event.preventDefault()
            let bot1 = false;
            let bot2 = false;
            let pergunta = document.getElementById("nova_pergunta");
            const check1 = document.getElementById("check1");
            const check2 = document.getElementById("check2");

            if (pergunta.value.trim() === "") {
                modalStatus('Preencha todos os campos!', 'error')
                return;
            }

            if (check1.checked) {
                bot1 = true;
            }
            if (check2.checked) {
                bot2 = true;
            }

            let formData = new FormData()
            formData.append("nova_pergunta", pergunta.value);
            formData.append("antes_da_aula", bot1);
            formData.append("depois_da_aula", bot2);

            let dados_php = await fetch('./actions/cad_pergunta_modal.php', {
                method: 'POST',
                body: formData
            })

            let response = await dados_php.json()
            console.log(response.status)

            if (response.status == "OK") {
                modalStatus('Pergunta cadastrada com sucesso!', 'success');
                closePopup1()
                listarPerguntas()   
                atualizarPagina() 

            } else {
                modalStatus('Preencha todos os campos!', 'error')
            }
        })

        $("#btn_cancelar_cad_pergunta").click(async function(event) {
            event.preventDefault()

            closePopup1()
            $("#nova_pergunta").val('')
            $('#check1').prop('checked', false)
            $('#check2').prop('checked', false)

        })
    </script>
</body>