<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<script src="../assets/js/deletar_perfil.js"></script>
<link rel="stylesheet" href="../assets/css/listar_perfis.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<?php
// include_once('../includes/modal_excluir/perfil_bloqueado.php');
?>

<body class="tela_gerenciam_perfis">
    <main class="pai-de-todos">
        <form action="" method="GET" class="renner">
            <div class="container_gp">
                <h1 class="Perfis">Perfis Cadastrados</h1>
                <ul class="cardsgerenc">
                    <?= $imprimir ?>
                </ul>

            </div>
            <div class="container_gp2">

                <div class="alinar-botoes">

                    <div class="botao-padrao-voltar">
                        <a onclick="voltarPagina()" class="botao-voltar-submit">VOLTAR</a>
                    </div>

                    <div class="botao-padrao-cadastrar">
                        <a href="cadastrar_perfil.php" class="botao-cadastrar-link">CADASTRAR</a>
                    </div>

                </div>

            </div>
        </form>
    </main>
    <!-- <script src="../includes/modal_excluir/perfil_bloqueado.js"></script> -->
    <script src="../assets/js/modais.js"></script>
</body>

<script>
    function voltarPagina() {
        window.history.back();
    }
    async function deletarPerfil(id) {
        let dados = await fetch('./actions/perfil_delete_action.php?id_perfil=' + id);
        let response = await dados.json();
        // window.location.reload();

    }

    function callPopUp(data) {
        var idtemp = data['children'][0]['attributes']['dataid']['value']
        var lock = data['children'][0]['attributes']['lock']['value']
        if (lock == 'true') {

            modalStatus('Esse perfil não pode ser excluído!!', 'error')

        } else {
            modalStatus('Tem certeza que deseja excluir esse perfil?', 'question', () => {
                modalStatus('Perfil excluído com sucesso!', 'success', () => {
                    window.location.reload();
                })
                deletarPerfil(idtemp);
            })
        }


    }
</script>