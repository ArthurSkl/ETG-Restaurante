const btn_cadastrar = document.getElementById("btn_cadastrar");

btn_cadastrar.addEventListener("click", async function(e) {
    e.preventDefault();
    
    let form = document.getElementById('meuFormulario');
    let nome_pergunta = document.getElementById("nome_checklist").value;
    let perguntas = document.querySelectorAll("#checkbox");
    let arrayPerguntas = [];
    
    perguntas.forEach(element => {
        if (element.checked) {
            arrayPerguntas.push(element.value);
        }
    });

    if (!validarCampos(nome_pergunta, arrayPerguntas)) {
        return;
    }

    let formData = new FormData(form);
    formData.append("nome_pergunta", nome_pergunta);
    formData.append("perguntas", arrayPerguntas);

    let data = await fetch('./actions/action_cad_checklist.php', {
        method: 'POST',
        body: formData
    });
    let response = await data.json();

    console.log(response);

    if (response) {
        modalStatus('Checklist cadastrado com sucesso!', 'success', () => {
            location.href = 'gerenciar_checklist.php';
        });
    } else {
        modalStatus('Erro ao cadastrar a pergunta!', 'error');
    }
});

function validarCampos(nome_pergunta, perguntas) {
    if (nome_pergunta.trim() === "") {
        modalStatus('Preencha o campo de nome do checklist!', 'error');
        return false;
    }

    if (perguntas.length === 0) {
        modalStatus('Selecione pelo menos uma pergunta!', 'error');
        return false;
    }

    return true;
}

function voltarPagina() {
    window.history.back();
}
function atualizarPagina() {
    location.reload();
}