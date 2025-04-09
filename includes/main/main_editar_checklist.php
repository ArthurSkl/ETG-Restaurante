 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
 <link rel="stylesheet" href="../assets/css/editar_checklist_input.css">
 <link rel="stylesheet" href="../assets/css/editar_checklist_posicao.css">
 <link rel="stylesheet" href="../assets/css/editar_checklist_caixa_pergunta.css">
 <link rel="stylesheet" href="../assets/css/editar_checklist_botoes.css">
 <script defer src="../assets/js/editar_checklist.js"></script>
 <script src="../assets/js/modais.js"></script>

 <link rel="preconnect" href="https://fonts.googleapis.com">


 <body class="pai_de_todos">
     <?php include_once("../includes/menu.php"); ?>
     <div class="titulo-topo">
         <h1 id="titulo">Editar CheckList</h1>
     </div>

     <div class="wasd"></div>
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


     <main class="todo-projeto">

         <form class="cadastro-checklist" method="POST" name="form-perguntas" id="meuFormulario">

             <div class="inputs-cadastro-checklist">
                 <div class="input_group field">
                     <input type="text" id="input_nome_checklist" class="input_field" placeholder="" required="" name="nome_checklist" maxlength="45">
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
             </ul>
             <!-- Conteúdo das abas -->
             <div id="tab1" class="tab" style="display: block;">
                 <div class="titulo-selecione-pergunta-pre">
                     <h1 id="titulo-pergunta-pos">Selecione as Perguntas Pré Aula:</h1>
                     <!-- <i class="bi bi-plus-circle"></i> -->
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
             <script>
                 function voltarPagina() {
                     window.history.back();
                 }

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


             <div class="botoes">
                 <div class="botoes-cadastro-checklist">
                     <!--Botão Voltar-->
                     <div class="botao-padrao-voltar">
                         <a onclick="voltarPagina()" class="botao-voltar-submit">VOLTAR</a>
                     </div>

                     <!--Botão Cadastrar-->
                     <div class="botao-padrao-cadastrar">
                         
                         <button name="btn_cadastrar" type="submit" class="botao-cadastrar-submit" id="btn_cadastrar" value="CADASTRAR"> SALVAR </button>
                     </div>
                 </div>
             </div>
            
         </form>
     </main>

 </body>