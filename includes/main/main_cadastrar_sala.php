<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="../assets/css/cadastrar_editar_sala.css">
<!-- <link rel="stylesheet" href="../../assets/css/pop_ups/pop-up-verification.css"> -->
<script src="../assets/js/modais.js"></script>



<body class="tela-cadastro-salas">

    <?php

    include_once("../includes/modais/modal_salas.php");


    ?>

    <section class="container">

        <div class="container-cadastro-salas">
            <div class="wrap-cadastro-salas">
                <form class="cadastro-sala-form" id="form_cad" method="POST" enctype="multipart/form-data">
                    <div class="titulo_de_cadastro">

                        <h1 class="title_principal"> Cadastro de Salas </h1>

                    </div>
                    <div class="cadastro_codigo">
                        <div class="wrap-input margin-top-35 margin-bottom-35">
                            <div class="input_group field" id="input_coisa_nome">
                                <input type="input" class="input_field toguroo required" id='nome_sala' placeholder="Name" name="nome_sala" maxLength="32">
                                <h4 class="span-required">Preenchimento obrigatório</h4>
                                <label for="name" class="input_label">Nome Da Sala </label> <!--Alterar para o nome do input-->
                            </div>
                        </div>

                        <div class="wrap-inputx margin-top-35 margin-bottomx-35">
                            <div class="input_group field ">
                                <input type="number" class="input_field toguro required" placeholder="Name" id="codigo_sala" name="codigo_sala" maxLength="4" style="text-transform:uppercase">
                                <h4 class="span-required diferentao">Preenchimento obrigatório</h4>
                                <label for="name" class="input_label toguro"> Código </label> <!--Alterar para o nome do input-->
                            </div>
                        </div>

                    </div>


                    <div class="dropdown-ck">
                        <select name="checklist" class="option required" id="checklist">

                            <option>Selecione O Checklist </option>

                            <?= $options ?>

                        </select>


                        <a href="cadastrar_checklist.php" style="color: black;">
                            <i class="bi bi-plus-circle  darkModeEdit" style="font-size: 30px; opacity: 0.7;"></i>
                        </a>

                    </div>

                    <div class="barra"></div>
                    <h4 class="span-required">Preenchimento obrigatório</h4>



                    <h3 class="alinar_titulo_h3">Dias de Funcionamento </h3>

                    <div class="area_Dos_check_box" id="area_dos_dias">

                        <div class="Check_Box_individual">
                            <p class="coisa_tag_p darkModeEdit">Segunda</p>
                            <input name="segunda" class="espaco_check_box" type="checkbox" />
                        </div>
                        <div class="Check_Box_individual">
                            <p class="coisa_tag_p darkModeEdit">Terça</p>
                            <input name="terca" class="espaco_check_box" type="checkbox" />
                        </div>

                        <div class="Check_Box_individual">
                            <p class="coisa_tag_p darkModeEdit">Quarta</p>
                            <input name="quarta" class="espaco_check_box" type="checkbox" />
                        </div>

                        <div class="Check_Box_individual">
                            <p class="coisa_tag_p darkModeEdit">Quinta</p>
                            <input name="quinta" class="espaco_check_box" type="checkbox" />
                        </div>

                        <div class="Check_Box_individual">
                            <p class="coisa_tag_p darkModeEdit">Sexta</p>
                            <input name="sexta" class="espaco_check_box" type="checkbox" />
                        </div>

                        <div class="Check_Box_individual">
                            <p class="coisa_tag_p darkModeEdit">Sábado</p>
                            <input name="sabado" class="espaco_check_box" type="checkbox" />
                        </div>


                    </div>


                    <h3 class="alinar_titulo_h3">Turnos de Funcionamento </h3>
                    <div class="area_Dos_check_box" id="area_turnos">



                        <div class="Check_Box_individual">
                            <p class="coisa_tag_p darkModeEdit">Matutino</p>
                            <input name="matutino" class="espaco_check_box" type="checkbox" />
                        </div>

                        <div class="Check_Box_individual">
                            <p class="coisa_tag_p darkModeEdit">Vespertino</p>
                            <input name="vespertino" class="espaco_check_box" type="checkbox" />
                        </div>

                        <div class="Check_Box_individual">
                            <p class="coisa_tag_p darkModeEdit">Noturno</p>
                            <input name="noturno" class="espaco_check_box" type="checkbox" />
                        </div>

                    </div>

                    <div class="img-area">

                        <div class="text-area">
                            <span class="span_semmod  darkModeEdit" id=descrição>Descrição</span>

                            <textarea placeholder="Area de texto " name="descricao_sala" id="" cols="70" rows="10" class="text-descricao" maxLength="254"></textarea>
                        </div>
                        <div class="cor-sala">
                            <div class="alinar-img">

                                <div class="coisas_enilda">
                                    <span class="span_semmod darkModeEdit" id="img-text"> Insira a imagem : Resolução 416x150 <br>A foto deve estar na horizontal  </span>
                                    

                                    <label id="botão-img" class="btn_img_cadastrar_sala" for="arquivo">Selecionar Foto</label>
                                </div>



                                <input type="file" name="img_sala" id="arquivo">

                                <div class="area-anexo">


                                    <img id="camera_imagem" class="imagem_aparecer" src="../assets/imgs/others/camera.png" alt="">

                                    <img id="imagem_agora_vai" class="novo_css_imagem" src="" alt="">

                                </div>
                            </div>
                            <div class="alinar-botao-cor">
                                <span class="span_semmod  darkModeEdit" id="selecao-cor-text">Cor da sala : </span>
                                <input class="botao-cor" name="cor_sala" type="color">
                            </div>
                        </div>




                    </div>

                    <div class="alinar-botoes">

                        <!--Botão voltar-->
                        <div class="botao-padrao-voltar">
                            <a onclick="voltarPagina()" class="botao-voltar-link">VOLTAR</a>
                        </div>


                        <div class="botao-padrao-cadastrar">


                            <button name="btn_submit" type="submit" class="botao-cadastrar-submit" id="botao-cadastrar-submit" value="CADASTRAR"> CADASTRAR </button>

                        </div>
                    </div>
                    <script>
                        function voltarPagina() {
                            window.history.back();
                        }

                        document.querySelectorAll('input[type="number"]').forEach(input => {
                            input.oninput = () => {
                                if (input.value.length > input.maxLength) input.value = input.value.slice(0, input.maxLength);
                            };
                        });


                        const campos = document.querySelectorAll(".required");
                        const spans = document.querySelectorAll(".span-required");


                        // console.log(spans);

                        function setError(index) {
                            campos[index].classList.add('error'); // Adiciona a classe 'error' ao elemento
                            spans[index].style = 'display: block; width: 100%;';
                        }

                        function removeError(index) {
                            campos[index].classList.remove('error'); // Remove a classe 'error' do elemento
                            spans[index].style.display = 'none';
                        }

                        let button = document.getElementById("botao-cadastrar-submit")

                        button.addEventListener('click', async (e) => {

                            e.preventDefault()

                            let nome_sala = document.getElementById('nome_sala')

                            if (nome_sala.value.length > 0) {

                                nome_sala = true;

                                removeError(0);

                            } else {
                                nome_sala = false;

                                setError(0);

                                // console.log("nome nao pode estar vazio ")

                            }

                            let codigo_sala = document.getElementById('codigo_sala')

                            if (nome_sala) {

                                if ((codigo_sala.value.length > 0)) {

                                    codigo_sala = true;

                                    removeError(1);

                                } else {

                                    codigo_sala = false

                                    setError(1);
                                }

                            } else {
                                codigo_sala = false
                            }

                            // console.log(codigo_sala)

                            let checklist = document.getElementById('checklist')


                            if (codigo_sala) {

                                if ((checklist.value > 0)) {

                                    // console.log(codigo_sala);

                                    checklist = true;
                                    removeError(2);

                                } else {

                                    setError(2);
                                }
                            } else {
                                checklist = false
                            }

                            if (checklist)

                                var div1Checkboxes = document.querySelectorAll('#area_dos_dias input[type="checkbox"]');
                            var div2Checkboxes = document.querySelectorAll('#area_turnos input[type="checkbox"]');

                            var div1Checked = false;
                            var div2Checked = false;

                            // Verifica se pelo menos um checkbox está marcado na primeira div
                            div1Checkboxes.forEach(function(checkbox) {
                                if (checkbox.checked) {
                                    div1Checked = true;
                                }
                            });

                            // Verifica se pelo menos um checkbox está marcado na segunda div
                            div2Checkboxes.forEach(function(checkbox) {
                                if (checkbox.checked) {
                                    div2Checked = true;
                                }
                            });

                            // Se em alguma div nenhum checkbox estiver marcado, exibe uma mensagem de alerta
                            if ((!div1Checked == true) || (!div2Checked == true)) {

                                modalStatus("Escolha pelo menos um dia de Funcionamento e um periodo de funcionamento.", "error")
                            }

                            if (nome_sala == true && codigo_sala == true && checklist == true && div1Checked == true && div2Checked == true) {

                                let form = document.getElementById('form_cad')
                                // console.log(form)

                                let formData = new FormData(form)
                                let dados_php = await fetch("../pages/actions/abrir_modal_cadastrar_sala.php", {
                                    method: "POST",
                                    body: formData
                                })

                                let response = await dados_php.json()
                                
                                if(response){
                                                                      
                                    modalStatus("Sala Cadastrada com sucesso.","success",()=>{window.location.href="./listar_salas.php"})
                                
                                }else{
                                    console.log("2")
                                }

                            } else {
                                console.log("deu merda piá");
                            }
                        })
                    </script>


                </form>
            </div>
        </div>
    </section>


    <script>
        const remover = document.querySelector(".imagem_aparecer");
        const novo_css = document.querySelector(".novo_css_imagem");
        $(document).ready(function() {
            $('#arquivo').on('change', function(e) {
                var file = e.target.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    var fileExtension = file.name.split('.').pop().toLowerCase();
                    var aceitados = ['jpg', 'jpeg', 'gif', 'png', 'jfif'];
                    if (aceitados.includes(fileExtension)) {
                        $('#imagem_agora_vai').attr('src', e.target.result);
                        remover.classList.add("active");
                        novo_css.classList.add("active");
                    } else {
                        // Caso a extensão do arquivo não seja suportada, você pode adicionar um comportamento específico aqui, como exibir uma mensagem de erro.
                        console.log('Extensão de arquivo não suportada.');
                    }
                }
                reader.readAsDataURL(file);
            });
        });




        function voltarPagina() {
            window.history.back();
        }

        function abrir_modal() {
            Swal.fire({
                title: 'Cadastrado com sucesso!', //TITULO DO POP_UP DE ACORDO COM SUA TELA 
                icon: 'success', // success, error e warning
                confirmButtonColor: '#609437', // DEFINE A COR DO BOTÃO OK
                confirmButtonText: 'OK'
            });
        }
    </script>



</body>

</html>