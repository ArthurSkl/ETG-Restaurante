<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<link rel="stylesheet" href="../assets/css/validar_checklist.css">
<script type="module" src="../assets/js/acaoCorretiva/main.js"></script>
<script src="../assets/js/modais.js"></script>


<script>
    var perguntasJson = <?php echo $perguntasJson;?>;
</script>

<!-- GERAL -->
<body class="container_checklist">

    <!-- TITULO DA PAGINA -->
    <h1 class="titulo_checklist">Ação Corretiva</h1>

    <!-- TIULO DA SALA (importado do banco) -->
    <h2 class="nome_sala"><?=isset($dados_sala[0]['nome']) ? $dados_sala[0]['nome'] : ''?></h2>

    <!-- PARTE DO MEIO (checklist e botões) -->
    <main class="main_checklist">
        <form method="POST" class="checklist_pre_aula">

            <!-- PARTE DO CHECKLIST -->
            <div class="list-pre-aula">
                
            </div>

            <div class="alinar-botoes">

                <div class="botao-padrao-voltar">
                    <a href="listar_checklist_concluidas.php" class="botao-voltar-link" id="buttonBackModalNaoConf">Sair</a>
                </div>
                <div class="botao-padrao-cadastrar">
                    <button name="btn_submit" type="submit" class="botao-cadastrar-submit" id="botao-cadastrar-submit" value="CADASTRAR">Ação Corretiva</button>
                </div>
            </div>

        </form>

    </main>

    
</body>