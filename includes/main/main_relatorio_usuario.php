<script>
     countC = <?=$qntC?>;
     countNC = <?=$qntNC?>;
     countCorrecao = <?=$qntCorrecao?>;
    dadosPDF = <?=$dadosPDF?>;

</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<link rel="stylesheet" href="../assets/css/relatorio_user.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../assets/js/relatorio_user.js" defer></script>
<script src="../assets/js/modais.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<body class="paidetodos">
    <main class="report_principal">
        <h1 class="titulo_filtros darkModeEdit">Relatório Usuários</h1>

        <form method="POST" class="teste">
            <div class="testePrimeiraSecao">
                <div id="user_relatorio" class="user_relatorio">
                    <select name="users_select" id="select_user" class="link">
                        <option selected>Selecione o Usuário</option>
                        <?php
                        foreach ($dadosUsuario as $row) {
                            echo
                                "
                                <option value=".$row['id'].">" . $row["nome"] . "</option>
                                ";
                        }
                        ?>
                    </select>
                    <select name="checks_select" id="select_checks" class="check_relatorio">
                        <option selected>Selecione o Checklist</option>
                        <?php
                        foreach ($dados_checklist as $check) {
                            echo($check);
                            echo
                                "
                                    <option value=".$check[0]."> " . $check[1] . "</option>
                                ";
                        }
                        ?>
                    </select>
                </div>
                <div class="btn-filter">
                    <button type="reset" class="limpar-filtros">Limpar filtros</button>
                    <button type="submit" name="btn_submit_relatorio" class="filtros">Filtrar</button>
                </div>
            </div>

            <div class="testeSegundaSecao">
                <div class="form-group">
                    <div class="input-container">
                        <label for="init_date" class="label-datas  darkModeEdit">Data inicial</label>
                        <input type="date" class="data_inicial" name="data_inicial" id="init_date" required >
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-container2">
                        <label for="close_date" class="label-datas darkModeEdit">Data final</label>
                        <input type="date" class="data_final" name="data_final" id="close_date" required>
                    </div>


                </div>
            </div>
            </div>

        </form>

        <div class="card_grafic">
            <div class="grafico_conf">
                <canvas id="myChart"></canvas>
            </div>
            <div class="grafico_qtd">
                <canvas id="Chart"></canvas>
            </div>

            <div class="dashboard-card">
                        <div class="dashboard-card-content">
                            <h3 id="qnt_checklist"><?=$qntC + $qntNC?></h3>
                            <p>Checklists</p>
                        </div>
            </div>

            <section class="area-botao">
                <div class="detalhes">
                    <button class="btn-detalhes" id="btn_detalhes_pdf_007" type="submit">Detalhes</button>
                    
                </div>
                <div class="dev-relatorio">
                    
                    <button class="btn-relatorio" id="bnt_gerar_pdf" type="submit">Gerar PDF</button>
                    
                </div>
            </section>
        </div>
            
        </section>
       
           
   
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>