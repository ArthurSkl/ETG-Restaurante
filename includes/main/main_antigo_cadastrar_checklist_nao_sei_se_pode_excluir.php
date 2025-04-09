<!-- <link rel="stylesheet" href="https/cdnjs.cloudflare.comlibs/font-awesome/6.4.0/css/all.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<link rel="stylesheet" href="../assets/css/cadastrar_checklist/input_checklist.css">
<link rel="stylesheet" href="../assets/css/cadastrar_checklist/posicao.css">
<link rel="stylesheet" href="../assets/css/cadastrar_checklist/caixa_pergunta.css">
<link rel="stylesheet" href="../assets/css/cadastrar_checklist/botões_checklist.css">


<link rel="preconnect" href="https://fonts.googleapis.com">


<body class="pai_de_todos">


    <div class="titulo-topo">
        <h1 id="titulo">Cadastro de CheckList</h1>
    </div>

    <main class="todo-projeto">

        <form class="cadastro-checklist" method="POST" name="form-perguntas">

            <div class="inputs-cadastro-checklist">
                <div class="input_group field">
                    <input type="input" class="input_field" placeholder="Name" required="" name='nome-checklist'>
                    <label for="name" class="input_label">Nome do CheckList</label> <!--Alterar para o nome do input-->
                </div>

                    <div class="titulo-selecione-pergunta-pre">
                        <h1 id="titulo-pergunta-pos">Selecione as Perguntas Pré-Aula:</h1>
                    </div>

                <section class="selecao-pergunta">
                    <table class="tabela-perguntas">
                        <tr class="topo-tabela">
                            <th>Selecione</th>
                            <th>Pergunta</th>
                        </tr>
                        <?=$tr?>


                    </table>
                </section>
                <div class="titulo-selecione-pergunta-pos">
                        <h1 id="titulo-pergunta-pos">Selecione as Perguntas Pós-Aula:</h1>
                    </div>
                <section class="selecao-pergunta">
                    <table class="tabela-perguntas">
                        <tr class="topo-tabela">
                            <th>Selecione</th>
                            <th>Pergunta</th>
                        </tr>
                        <?=$tr?>


                    </table>
                </section>
            </div>

            <div class="botoes">
                <div class="botoes-cadastro-checklist">
                    <!--Botão Voltar-->
                    <div class="botao-padrao-voltar">
                        <a href="#"><input type="submit" class="botao-voltar-submit" value="VOLTAR"></a>
                    </div>

                    <!--Botão Cadastrar-->
                    <div class="botao-padrao-cadastrar">
                        <a href="#"><input type="submit" class="botao-cadastrar-submit" name="cadastrar" value="CADASTRAR" onclick="abrir_modal()"></a>
                    </div>
                </div>
            </div>
        </form>
    </main>



</body>
