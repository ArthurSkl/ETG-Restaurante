var dadosPerguntas
var id_atual_excluir_pergunta
var id_atual_editar_pergunta

async function listarChecklists(){
    $("#perguntas").empty()
    let dados_php = await fetch('../pages/actions/action_get_checklists.php')
    dadosPerguntas = await dados_php.json()

     for(check in dadosPerguntas){
        
        let divPergunta = '<div class="question1 move" animation="right"> <div class="resp_pergunta"> <p name="question_text" id="question_text">'+dadosPerguntas[check].nome+' </p> </div> <div class="icons-question1"> <button class="editar" id="btn_pencil_editar_pergunta" btn_editar="'+dadosPerguntas[check].id+'" ><i class="bi bi-pencil-square"></i></button> <button class="excluir" id="btn_trash_excluir_pergunta" btn_excluir="'+dadosPerguntas[check].id+'" onclick="openPopup3()"><i class="bi bi-trash"></i></button> </div> </div>'
 
        $('#perguntas').append(divPergunta)
    }  
 

    $('[id="btn_trash_excluir_pergunta"]').on('click',async function(){ 
        id_atual_excluir_pergunta = $(this).attr('btn_excluir')  
        
    })

    $('[id="btn_pencil_editar_pergunta"]').on('click',async function(){ 
        
        let id_checklist = $(this).attr('btn_editar')
        

        let data_php = await fetch('../pages/actions/action_get_checklist_resp.php?id_checklist='+id_checklist)
        let res = await data_php.json()

        if(res){
            // checklist ja foi respondido pelo menos uma vez 
            modalStatus('Impossível editar esse checklist, ele ja foi respondido pelo menos uma vez!','error')

        }else{
            toEditarChecklist($(this).attr('btn_editar'))

        }

        
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

