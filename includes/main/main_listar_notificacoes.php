<link rel="stylesheet" href="../assets/css/listar_notificacoes.css">
<link rel="stylesheet" href="../assets/css/estilo_botões_padronizados.css">


<body class="tela_notificacao">

    <h1 id="titulo">Notificações</h1>


    <section class="container">
        <main class="area_not">
            <?= $todas_notificacao ?>

        </main>

    </section>

    <div class="alinhar_botao_voltar">
        <div class="botao-padrao-voltar">
            <a onclick="voltarPagina()" class="botao-voltar-link">VOLTAR</a>
        </div>

        <div class="botao-padrao-cadastrar">
            <a onclick="voltarPagina()"><input type="submit" class="botao-cadastrar-submit" value="CADASTRAR"></a>
        </div>

        <!-- <?= $ifgennot ? '
                <div class="botao-padrao-cadastrar">
                    <a href="cadastrar_notificacao.php"><input type="submit" class="botao-cadastrar-submit"  value="CADASTRAR"></a>
                </div>' : ''
                ?>  -->

    </div>

    <script>
        function voltarPagina() {
            window.history.back();
        }
        async function desmarcar(id) {
            // alert(id)

            const dados = await fetch('./actions/desmarcar_notificacao.php?id_notificacao=' + id);

            const response = await dados.json();
            if (response.status == true) {
                // location.reload()



                const coracaoVazio = document.getElementById("coracaoVazio" + id);
                const coracaoPreenchido = document.getElementById("coracaoPreenchido" + id);
                const card_notificacao = document.getElementById("card_notificacao" + id);
                coracaoVazio.classList.remove("active");
                coracaoPreenchido.classList.remove("active");

                card_notificacao.setAttribute("onclick", 'trocar_coracao(' + id + ')');

            }

        }



        async function trocar_coracao(id) {
            console.log(id)
            const coracaoVazio = document.getElementById("coracaoVazio" + id);
            const coracaoPreenchido = document.getElementById("coracaoPreenchido" + id);
            const card_notificacao = document.getElementById("card_notificacao" + id);


            coracaoVazio.classList.add("active");
            coracaoPreenchido.classList.add("active");

            // removendo função onclick do card clickado 
            card_notificacao.removeAttribute("onclick");

            card_notificacao.setAttribute("onclick", 'desmarcar(' + id + ')');


            const dados = await fetch('./actions/visualizar_notificacao.php?id_notificacao=' + id);

            const response = await dados.json();
            if (response['status']) {

                // Swal.fire({
                //     title: 'OHHHHHHHH!',
                //     text: 'Visualizado com Sucesso!',
                //     imageUrl: 'https://m.media-amazon.com/images/I/51NPUA7Kk2L._AC_UF894,1000_QL80_.jpg',
                //     imageWidth: 400,
                //     imageHeight: 200,
                //     imageAlt: 'Custom image',
                // })

            }

        }
    </script>

</body>