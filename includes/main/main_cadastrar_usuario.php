<link rel="stylesheet" href="../assets/css/cadastrar_usuario.css">
<script src="../assets/js/modais.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- <link rel="stylesheet" href="../assets/css/estilo_botoes_padronizados.css"> -->
<!-- <link rel="stylesheet" href="../modais/usuario_cadastrado.php"> -->

<body class="Pai-de-todos">
    
    <main class="tudo_esqueceu_senha1">
        <form method="POST" id="form_cad" class="slaaaaa">
            <section class='titulo_cadastro_usuario'>
                <h1 class="title_cadastrar_usuario_page">Cadastrar Usuário</h1>
            </section>
            
            <section class="centralizar_input_cadastrar_usuario">                
                <!-- input nome -->
                <div class="input_group field">
                    <input type="input" maxlength="45" class="input_field" name="nome" id="nomes" placeholder="Name" required="">
                    <label for="name" class="input_label">Nome</label> <!--Alterar para o nome do input-->
                </div>
                
                <!--Input Email-->
                <div class="input_e-mail_group field">
                    <input type="email" class="input_e-mail_field" name="email" id="emails"  placeholder="Name" required="" autocomplete="on">
                    <label for="name" class="input_e-mail_label">E-mail</label> <!--Alterar para o nome do input-->
                </div>
                
                
                <div class="ajusta-botao2">

                    <div class="dropdown-ck">
                        <select name="id_perfil" id="options" class="option">
                            <option value="">Selecione seu Perfil</option>
                            <?=$options?>
                            
                        </select> 
                        <div class="barra"></div> 
                    </div>


                    <div class="input_group_M field">
                        <input type="input" class="input_field_M" name="num_matricula" id="matricula" placeholder="Name" required="">
                        <label for="name" class="input_label_M">N° de Matrícula</label> 
                    </div> 
                        
                        

                </div>
                    
    
            
            <!--Input Senha-->
            <div class="input_senha_group field">
                <input type="password" class="input_senha_field" name="senha" id="senhas" placeholder="Name" required="">
                <label for="name" class="input_senha_label">Senha</label> <!--Alterar para o nome do input-->
            </div>
        </section>   

        <section class="centralizar_botoes_cadastrar_usuario">
            <!--Botão voltar-->
            <div class="botao-padrao-voltar">
                <a onclick="voltarPagina()" class="botao-voltar-submit" value="VOLTAR">VOLTAR</a>
            </div>
            
            <!--Botão Confirmar-->
            <div class="botao-padrao-confirmar">
                    <a><input type="submit" class="botao-confirmar-submit" id="botao-confirmar-submit" name="btn_submit" value="CONFIRMAR"></a>
                </div>
            </section>
            
        </form>
    </main>
<script>

// function redirecionarParaPagina() {
//     window.location.href = 'http://192.168.22.9/etg_escola_homologacao/pages/visualizar_usuario.php';
// } 


function voltarPagina() {
    window.history.back();
}
let button =document.getElementById('botao-confirmar-submit')
        
button.addEventListener('click', async (e) =>{
        
    e.preventDefault()
    
    const nomes = document.getElementById('nomes').value;
    const emails = document.getElementById('emails').value;
    const options = document.getElementById('options').value;
    const matricula = document.getElementById('matricula').value;
    const senhas = document.getElementById('senhas').value;
 
    // console.log(nomes);
    
    // if (nomes.length > 0) {
    //     console.log("Campo de nome preenchido");
    // } 
    // else{
    //     console.log("Campo de nome não preenchido");
    // } 
    
    if (nomes.length > 0 && emails.length > 0 && options.length > 0 && matricula.length > 0 && senhas.length > 0) {

        if(emails.includes('@')){ 

            let form = document.getElementById('form_cad')


            let formData = new FormData(form)
              
                //na criação da variável dados_php, envia o form via POST e espera o resultado!!!
                    let dados_php = await fetch('./actions/action_cadastrar_user.php',{
                    method:'POST',
                    body: formData
                })

                //recupera o array que veio do PHP
                let resposta = await dados_php.json()

                console.log(resposta)
                console.log(resposta.status)
    
            if(resposta.status == "OK"){

                $('#nomes').val('')
                $('#emails').val('')
                $('#matricula').val('')
                $('#senhas').val('') 

                modalStatus('Usuário cadastrado com Sucesso!','success',()=>{
                    window.location.href= './visualizar_usuario.php'; 
                })
            }
            else{
                modalStatus(resposta.status,'error')
            }

        }else{

            modalStatus('Insira um E-mail Válido!','error')


        }
     


    } else {
        modalStatus('Preencha todos os campos!','error')
    }

});

</script>
     

</body>

