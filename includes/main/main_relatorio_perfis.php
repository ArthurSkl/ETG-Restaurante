
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/relatorio_perfis.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <script src="../assets/js/relatorio_perfis.js" defer></script>
    

<body class="paidetodos">
<main class="report_principal">
        <h1 class="titulo_filtros">Relatório Perfis</h1>

        <section class="teste">
            <div class="testePrimeiraSecao">
                    <div id="user_relatorio" class="user_relatorio">
                        <!-- <div class="user-report"><i class="bi bi-person-square"></i>Usuários<i class="fa fa-chevron-down"></i></div> -->
                        <select name="" id="" class="link">
                        <option selected>Perfis</option>
                        <?php
                            foreach($dadosUsuario as $row) {
                                echo 
                                "
                                <option>".$row["nome"]."</option>
                                ";
                            }
                            ?>
                        </select>
                            <select name="" id="" class="check_relatorio">
                            <option selected>Checklist</option>
                            <?php
                                foreach($dadosUsuario as $row) {
                                    echo 
                                    "
                                    <option>".$row["nome"]."</option>
                                    ";
                                }
                                ?>
                            </select>
                    </div>
                        <div class="btn-filter">
                            <button type="submit" class="limpar-filtros">Limpar filtros</button>
                            <button type="submit" class="filtros">Filtrar</button>
                        </div>
            </div>

        <div class="testeSegundaSecao">
                    <div class="form-group">
                        <div class="input-container">
                            <label for="init_date" class="label-datas" >Data inicial</label>
                            <input type="date" class="data_inicial" id="init_date" required>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <div class="input-container2">
                            <label for="close_date" class="label-datas">Data final</label>
                            <input type="date" class="data_final" id="close_date" required>
                        </div>


                        </div>
                    </div>
                </div>
           
        </section>
       
            <div class="card_grafic">
                    <div class="grafico_conf">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="grafico_qtd">
                        <canvas id="Chart"></canvas>
                    </div>
   
                    <section class="area-botao">
                        <div class="detalhes">
                            <form action="" method="post" target="_blank">
                                <button class="btn-detalhes" type="submit">Detalhes</button>
                            </form>
                        </div>
                        <div class="dev-relatorio">
                            <form action="../pages/nao_conformidade_user.php" method="post" target="_blanck">
                                <button class="btn-relatorio" type="submit">Gerar PDF</button>
                            </form>
                        </div>
                    </section>
            </div>
   
    </main>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
