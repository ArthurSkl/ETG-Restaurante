<link rel="stylesheet" href="../assets/css/detalhes_relatorio.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="../assets/js/imagem_preview.js" defer></script>
<body class="tela_detalhes">
    <div class="titulo">
        <p class="texto_titulo">Detalhes Das Não Conformidades</p>
    </div>

    <section class="todas_nao_conf">


        <!-- <div class="dados_responsavel">
        
        <div class="esquerda"><p>Nome: Professor
        <p>Sala: Cozinha 1 </p>
        </div>  
        
        <div class="direita"><p>Nome: Professor</p><p>hora: 14:00 data: 21/03/2024</p></div>
                                                                                                                    </div> -->
        <?= $dados_responsavel ?> <div class="area_nao_conformidade">
            <?= $nao_conformidade ?>
            <!-- <div class="nao_conformidade">
            <P class="texto_nao_conformidade"> 1 </P>

            <div class="area_imagens">
                <img class="imagem_nao_conformidade" src="https://img.freepik.com/fotos-gratis/respingo-colorido-abstrato-3d-background-generativo-ai-background_60438-2509.jpg?w=1380&t=st=1711047503~exp=1711048103~hmac=472fc498b2cc8b6fc96e3d1ea8b51e8f89d95596e7d51017a70e16de77cd9338" alt="">
                <img class="imagem_nao_conformidade" src="https://img.freepik.com/fotos-gratis/fundo-de-textura-com-diferentes-folhas-exoticas-generativas-al_169016-28564.jpg?w=1380&t=st=1711049255~exp=1711049855~hmac=11ede85c779d48caf54dc71d4ee8391caa28f240d852aa8197a07a35fd8748a0" alt="">
                <img class="imagem_nao_conformidade" src="https://img.freepik.com/fotos-gratis/mistura-de-pigmentos-brilhantes_23-2147763561.jpg?w=1380&t=st=1711049279~exp=1711049879~hmac=f11cc832dd8cdd575ef2bbc6fedb4da0ddfa28a66ad863b2185009752dbc3db6" alt="">  
            </div>
                                                                                                                        </div>-->


        </div>
    </section>
    <div class="area_botões">
        <div class="botao-padrao-voltar">
            <a href="./relatorio_user.php" class="botao-voltar-link">VOLTAR</a>
        </div>

        <div class="gerar_relatorio">
            <div class="imprimir">
                <button class="botao-cadastrar-link" onclick="actionImprimir()">IMPRIMIR</button>
                <!-- <a href="listar_salas.php" class="botao-voltar-link">Imprimir</a> -->
            </div>
              <!--Botão Cadastrar-->
            <!-- <div class="botao-padrao-cadastrar">
                <a href="#"><input type="submit" class="botao-cadastrar-link"  value="CADASTRAR"></a>
            </div> -->
        </div>
    </div>
    <!-- <script>
        var imagens = document.querySelectorAll(".imagem_nao_conformidade");
        for (let i = 0; i < imagens.length; i++) {
            // console.log(imagens[i].src);
            imagens[i].addEventListener("click", (e) => {
                // console.log(e.target.src)
                var area_imagem = document.createElement("div");
                area_imagem.className = "view_imagem";
                area_imagem.style.cssText = "position: fixed; display: flex; align-items: center; justify-content: center; width: 100vw; height: 100vh; left: 0; top: 0; background-color: rgba(115, 115, 115, 0.522); z-index: 100000000000000000000000000000000000000000000000000000000000000000000;";
                var imgview = document.createElement("img")
                imgview.src = e.target.src
                imgview.className = "imagem_expandida"
                imgview.style.cssText = "width: 60%; height: 65%; border-radius: 15px;"
                area_imagem.appendChild(imgview)
                document.body.appendChild(area_imagem);
            })
        }    
        function fecha_imagem() {
            var imagens_expandidas = document.querySelectorAll(".view_imagem");
            imagens_expandidas.forEach(function(imagem_expandida) {
                // imagem_expandida.style.display = "none";
                var divsParaDeletar = document.querySelectorAll(".view_imagem");
                divsParaDeletar.forEach(function(div) {
                    div.remove();
                });
            });
        }
        document.addEventListener("click", function(event) {
            if (event.target.classList.contains("view_imagem")) {
                // event.target.style.display = "none";
                var divsParaDeletar = document.querySelectorAll(".view_imagem");
                divsParaDeletar.forEach(function(div) {
                    div.remove();
                });
            }
        });
    </script> -->
</body>
<script>

function actionImprimir(){

    document.body.classList = ''
    $(".darkmode-background").remove()
    $(".darkmode-layer").remove()
    $(".darkmode-toggle").remove()
    darkModeProject('#fff')
    print()

}


</script>



</html>