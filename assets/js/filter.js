var dadosPerguntas
var id_atual_excluir_pergunta
var id_atual_editar_pergunta
async function listarPerguntass(){
    $("#perguntas").empty()
    let dados_php = await fetch('../pages/actions/action_get_perguntas.php')
    dadosPerguntas = await dados_php.json()

    // console.log(dadosPerguntas)
    for(pergunta in dadosPerguntas){
        // <button class="checklist" id="popup_cad_checklist" onclick="openPopup4()"><i class="bi bi-file-earmark-plus"></i></button>
        // pausei aqui algo
        
        let divPergunta = '<div class="question1 move" animation="right"><div class="resp_pergunta"> <p name="question_text" id="question_text">'+dadosPerguntas[pergunta].descricao+' </p> </div> <div class="icons-question1"> <button class="editar" id="btn_pencil_editar_pergunta" btn_editar="'+dadosPerguntas[pergunta].id+'" onclick="openPopup2()"><i class="bi bi-pencil-square"></i></button> <button class="excluir" id="btn_trash_excluir_pergunta" btn_excluir="'+dadosPerguntas[pergunta].id+'" onclick="openPopup3()"><i class="bi bi-trash"></i></button> </div> </div>'

        $('#perguntas').append(divPergunta)
    }  


    $('[id="btn_trash_excluir_pergunta"]').on('click',async function(){ 
        id_atual_excluir_pergunta = $(this).attr('btn_excluir')  
        
    })

    $('[id="btn_pencil_editar_pergunta"]').on('click',async function(){ 

        setDadosPerguntaById($(this).attr('btn_editar'))
        
    }) 

    // depois no botao de 'NAO' adicionar função para resetar o id_atual 
    
    const observer = new IntersectionObserver((entries) => {

        entries.forEach((entry) => {
     
            if(entry.isIntersecting){
    
                entry.target.classList.add('show');
    
            }
        });
    
    }) 
    
    var hiddenElements = document.querySelectorAll('.move');
    hiddenElements.forEach((el) => observer.observe(el))


};

