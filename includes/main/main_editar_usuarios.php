<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<link rel="stylesheet" href="../assets/css/editar_usuarios.css">
<script src="https://code.jquery.com/jquery-3.7.0.js"integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="crossorigin="anonymous"></script>
 
<body class="pai-de-todos1">


    <main class="pai-de-todos">
        <form  class="form-minha-conta" method="POST" enctype="multipart/form-data">
            <section class="titulo">
                <h1 class="titulo-perfil">Editar Conta</h1>
            </section>
            
            
            <div>
                <section class="quadrado-perfil">
                    <div class="foto-perfil">
                        <img id="img_user" src="../assets/imgs/users/<?=$foto?>" alt="">
                    </div>
                </section>
                
                <div class="icon-edit">
                    <input  id="arquivo" type="file" style="display:none" name="foto">
                    <i id="img-btn" class="bi bi-pencil-square" style="cursor: pointer;" onclick="escolherArquivo()"></i> 
                </div>
            </div> 


            
            <section class="name">
                <h2 class="name-name">Nome</h2>
            </section>

            <div method="POST" class="alinhar-input">
                
                <div class="input_group field">
                    <input type="input" class="input_field" maxlength="45" id="input_name_cad" placeholder="Name" required="" name="nome" value="<?=$dados_editar["nome"]?>" maxLength="105">
                    <label for="name" class="input_label"></label><!--Alterar para o nome do input-->
                    <i class="bi bi-pencil-square" onclick="habilitar()" id="icon-input"></i>
                </div>

                <div class="area_btn_alterar_nome" id="area_btn_alterar_nome">

                    <input type="submit" name="btn_alterar_nome" value="Alterar Nome">

                </div>
                
            </div>

            <section class="editar_senha">
                    <section class='titulo_alterar_senha'>
                    <h1>Alterar Senha</h1>
                </section>

                <div class="centralizar-back"> 
                    <section class="centralizar_input_alterar_senha">

                        
                       
                        <div class="input_senha_group field">
                            <input name="senhaantiga" type="password" class="input_senha_field" placeholder="Name">
                            <label for="name" class="input_senha_label">Senha antiga</label> <!--Alterar para o nome do input-->
                        </div>

                        <div class="input_senha_group field2">
                            <input name="novasenha" type="password" class="input_senha_field" placeholder="Name">
                            <label for="name" class="input_senha_label">Criar nova senha</label> <!--Alterar para o nome do input-->
                        </div>

                        <div class="input_senha_group field3">
                            <input name="confirmarnovasenha" type="password" class="input_senha_field" placeholder="Name" >
                            <label for="name" class="input_senha_label">Confirmar nova senha</label> <!--Alterar para o nome do input-->
                        </div>
                    </section>

                

                    
                </div>   
            </section>

            <section class="centralizar_botoes_alterar_senha">
    
                                <!--Botão Voltar-->
                            <div class="botao-padrao-voltar">
                                <a href="listar_recados.php" class="botao-voltar-submit" >VOLTAR</a>
                            </div>
    
                                <!--Botão Confirmar-->
                            <div class="botao-padrao-confirmar">
                                <input name="btn_submit" type="submit" id="btn_submit" class="botao-confirmar-submit"  value="SALVAR">
                            </div>
    
            </section>
            
        </form>

    </main>
    <script>

$(document).ready(function() {
    $('#arquivo').on('change', function(e) {
        var file = e.target.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            var fileExtension = file.name.split('.').pop().toLowerCase();
            var aceitados = ['jpg', 'jpeg', 'gif', 'png'];
            if (aceitados.includes(fileExtension)) {
                $('#img_user').attr('src', e.target.result);
                // remover.classList.add("active");
                // novo_css.classList.add("active");
            } else {
                // Caso a extensão do arquivo não seja suportada, você pode adicionar um comportamento específico aqui, como exibir uma mensagem de erro.
                console.log('Extensão de arquivo não suportada.');
            }
        }
        reader.readAsDataURL(file);
    });
});



    var nome = document.querySelector("#input_name_cad");
    var area_btn_cad_user = document.getElementById("area_btn_alterar_nome")

    nome.disabled = true


    area_btn_cad_user.addEventListener('click',teste)

    // async function teste(){
    //     area_btn_cad_user.preventDefault(); 
    //     setTimeout(function(){
    //         alert(241321    )
    //         window.reload();
 
    //     },3000)
    // }

    function habilitar(){
        console.log(nome)
        nome.disabled = false;
        nome.classList.add("active") 

    }

    
 function escolherArquivo(){
    var arquivo = document.getElementById("arquivo");
    arquivo.click();  
  }

    // btn_submit =document.getElementById("btn_submit")

    // btn_submit.addEventListener("click", async (e) =>{
        
    //     const dados = new FormData(f1);
    //     e.preventDefault(); 
    //     // etapa 1: validando cpf
    //     const dados_php = await fetch("./actions/validar_cpf.php", {
    
    //         method: 'POST',
    //         body: dados
    //     } )
    
    //     const resposta = await dados_php.json();

    </script>
    
</body>
