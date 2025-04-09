import { Dom } from './Dom.js';
var preenchidas = perguntasJson.length;
const id_salaa = perguntasJson[0]["id_sala"]
console.log(perguntasJson)
 

const DOM = new Dom(perguntasJson);

document.querySelector(".botao-cadastrar-submit").addEventListener("click", function(event){
    event.preventDefault();

    var todas_corretas = document.querySelectorAll('.bi-check-circle[id="este_e_da_pergunta"]')
    
    if (!(todas_corretas.length == preenchidas)) {
        modalStatus("Responda todas as perguntas", "error") 
    } else {
        modalStatus("Você tem certeza que deseja cadastrar as ações corretivas? ", "question", () => {
            modalStatus("Ações corretivas cadastradas com sucesso! ", "success", () => {
                cadastrar_acao_corretiva()
                window.location.href = "listar_salas.php"
            })
        })
    }
})

document.querySelector(".botao-voltar-link").addEventListener("click", function(event) {
    event.preventDefault()
    modalStatus("Você tem certeza que deseja sair sem realizar as ações corretivas? ", "question", () => {
        window.location.href = "listar_checklist_concluidas.php"
    })
}) 

async function cadastrar_acao_corretiva() {

    const queryString123 = window.location.search;  
    const params123 = new URLSearchParams(queryString123); 
    const id_realizacao = params123.get('id_realizacao');
 

    let url = "./actions/action_cadastrar_acao_corretiva.php?id_sala="+id_salaa+"&id_realizacao="+id_realizacao
    let request = await fetch(url, {
        method: "POST",
        headers:{
                "Content-Type": "application/json"
        },
        body: JSON.stringify(DOM.post_malone_rockstar())
    })

    let response = await request.json()
    console.log(response)
}


DOM.showPerguntas();


