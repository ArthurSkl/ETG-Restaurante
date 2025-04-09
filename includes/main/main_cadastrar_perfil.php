
<!-- <link rel="stylesheet" href="https/cdnjs.cloudflare.comlibs/font-awesome/6.4.0/css/all.min.css"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<!-- POP_UP -->

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link rel="preconnect" href="https://fonts.googleapis.com">
<!-- POP_UP -->

<link rel="stylesheet" href="../assets/css/estilo_botoes_padronizados.css">
<link rel="stylesheet" href="../assets/css/cadastrar_editar_perfil.css">
<script src = "../assets/js/modais.js"></script>



<body class="tela_cadastro_perfil">
    
    <div class="container">
        <div class="titulo_cad" >
            <h1 class="titulo_cad_perfil">Cadastro de Perfil</h1>
        </div>
        <form  class="form_permissoes" id="form_cad">
            <div class="input_group">
                <input type="input" class="input_field" placeholder="Name" name="nome" maxlength=25>
                <label for="name" class="input_label">Nome</label> <!--Alterar para o nome do input-->
            </div>
            <div class="permissoes_salas">
                <label class="titulo_permissoes">Mais usados:</label>
                <div class="permissoes_salas_tipos">
                    <div class="permissoes_salas_itens">
                        <label class="label_permissao">Administrador</label>
                        <input type="checkbox" class="checkbox_permissoes" name="mais_usados_administrador"  id="mais_usados_administrador" autocomplete="off"/>
                    </div>
                    <div class="permissoes_salas_itens">
                        <label class="label_permissao">Logística</label>
                        <input type="checkbox" class="checkbox_permissoes" name="mais_usados_logistica" id="mais_usados_logistica" autocomplete="off"/>
                    </div>
                    <div class="permissoes_salas_itens">
                        <label class="label_permissao">Docente</label>
                        <input type="checkbox" class="checkbox_permissoes" name="mais_usados_docente" id="mais_usados_docente" autocomplete="off"/>
                    </div>
                 </div>
            <div class="permissoes_salas">
                <label class="titulo_permissoes">Gerenciamento de Cadastro:</label>
                <div class="permissoes_salas_tipos">
                    <div class="permissoes_salas_itens">
                        <label class="label_permissao">Gerenciar Salas</label>
                        <input type="checkbox" class="checkbox_permissoes" name="gerenciar_salas" id="gerenciar_salas"  autocomplete="off"/>
                    </div>
                    <div class="permissoes_salas_itens">
                        <label class="label_permissao">Gerenciar Perguntas</label>
                        <input type="checkbox" class="checkbox_permissoes" name="gerenciar_perguntas"  id="gerenciar_perguntas" autocomplete="off" />
                    </div>
                    <div class="permissoes_salas_itens">
                        <label class="label_permissao">Gerenciar Checklists</label>
                        <input type="checkbox" class="checkbox_permissoes" name="gerenciar_checklists"  id="gerenciar_checklists" autocomplete="off"/>
                    </div>
                    <div class="permissoes_salas_itens">
                        <label class="label_permissao">Gerenciar Recados</label>
                        <input type="checkbox" class="checkbox_permissoes" name="gerenciar_recados" id="gerenciar_recados" autocomplete="off"/>
                    </div>
                    <div class="permissoes_salas_itens">
                        <label class="label_permissao">Gerenciar Notificações</label>
                        <input type="checkbox" class="checkbox_permissoes" name="gerenciar_notificacoes"  id="gerenciar_notificacoes" autocomplete="off"/>
                    </div>
                    <div class="permissoes_salas_itens">
                        <label class="label_permissao">Gerenciar Usuários</label>
                        <input type="checkbox" class="checkbox_permissoes" name="gerenciar_usuarios"  id="gerenciar_usuarios" autocomplete="off"/>
                    </div>
                    <div class="permissoes_salas_itens">
                        <label class="label_permissao">Gerenciar Perfis</label>
                        <input type="checkbox" class="checkbox_permissoes" name="gerenciar_perfis"  id="gerenciar_perfis" autocomplete="off"/>
                    </div>
                </div>
            </div>
            <div class="permissoes_salas">
                <label class="titulo_permissoes">Checklist:</label>
                <div class="permissoes_salas_tipos">
                    <div class="permissoes_salas_itens">
                        <label class="label_permissao">Realizar Checklist</label>
                        <input type="checkbox" class="checkbox_permissoes" name="realizar_checklist"  id="realizar_checklist" autocomplete="off"/>
                    </div>
                    <div class="permissoes_salas_itens">
                        <label class="label_permissao">Não conformidade e Ação Corretiva</label>
                        <input type="checkbox" class="checkbox_permissoes" name="realizar_nao_conformidade" id="realizar_nao_conformidade" autocomplete="off"/>
                    </div>
                    <div class="permissoes_salas_itens">
                        <label class="label_permissao">Ver Relatórios</label>
                        <input type="checkbox" class="checkbox_permissoes" name="ver_relatorios" id="ver_relatorios" autocomplete="off"/>
                    </div>
                </div>
            </div>
        </form>
    </div>     
    <div class="container_gp2">
        <div class="botoes">
            <!--Botão Voltar-->
            <div class="botao-padrao-voltar">
                <a href="listar_perfis.php" class="botao-voltar-submit">VOLTAR</a>
            </div>
            <!--Botão Salvar-->
            <div class="botao-padrao-salvar">
                <input type="submit" id="btn-submit-cadastrar" class="botao-salvar-submit" value="SALVAR">
            </div>
        </div>
    </div>
</body>


<script>
    var btn_submit = document.getElementById('btn-submit-cadastrar');
    btn_submit.addEventListener('click', async (e) => {
        let form = document.getElementById('form_cad')
        console.log(form)
        let formData = new FormData(form)
        // console.log(formData)


        
        let dados_php = await fetch("../pages/actions/action_cadastrar_perfil.php",{method:"POST",
                                    body: formData
                                })
        // let dados_php = await dados_php_php.json()
        let response = await dados_php.json();
        console.log(response);

        if (response == true)
        {
            modalStatus('Perfil cadastrado com sucesso!', 'success', () => {
                window.location.href="listar_perfis.php";
            })
        }
    });

</script>

<script src="../assets/js/preencher_checkbox_mais_usados.js"></script>
