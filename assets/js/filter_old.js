var intervaloInput 
var filter_perguntas = [true,true]


$("#input").on("input", async function(){ 
    filter_listar_perguntas()
})

async function filter_listar_perguntas(){
    clearTimeout(intervaloInput); 
    // definindo setTimeout para que dps de 500ms apareça as perguntas
    intervaloInput = setTimeout(async function(){
        $("#perguntas").empty()
        for(pergunta in dadosPerguntas){
            
            // <button class="checklist" id="popup_cad_checklist" onclick="openPopup4()"><i class="bi bi-file-earmark-plus"></i></button>
            
            let descricao =  dadosPerguntas[pergunta].descricao.toLowerCase()
            if(descricao.includes($("#input").val().toLowerCase())){
                
                if(   (((dadosPerguntas[pergunta].tipo == 0) || dadosPerguntas[pergunta].tipo == 2) && filter_perguntas[0]) || (((dadosPerguntas[pergunta].tipo == 1) || dadosPerguntas[pergunta].tipo == 2) && filter_perguntas[1])  ){

                    let divPergunta = '<div class="question1 move" animation="right"> <div class="resp_pergunta"> <p name="question_text" id="question_text">'+dadosPerguntas[pergunta].descricao+' </p></div> <div class="icons-question1"> <button class="editar" id="btn_pencil_editar_pergunta" btn_editar="'+dadosPerguntas[pergunta].id+'" onclick="openPopup2()"><i class="bi bi-pencil-square"></i></button> <button class="excluir" btn_excluir="'+dadosPerguntas[pergunta].id+'" id="btn_trash_excluir_pergunta" onclick="openPopup3()"><i class="bi bi-trash"></i></button> </div> </div>'
                    
                    $('#perguntas').append(divPergunta)
                }
            }
        }
        $('[id="btn_trash_excluir_pergunta"]').on('click',async function(){ 
            id_atual_excluir_pergunta = $(this).attr('btn_excluir')  
        })

        $('[id="btn_pencil_editar_pergunta"]').on('click',async function(){ 

            setDadosPerguntaById($(this).attr('btn_editar'))
            
        })

           
        const observer = new IntersectionObserver((entries) => {
    
            entries.forEach((entry) => {
        
                // console.log(entry);
                
                if(entry.isIntersecting){
        
                    entry.target.classList.add('show');
        
                }
            });
        })
        var hiddenElements = document.querySelectorAll('.move');
        hiddenElements.forEach((el) => observer.observe(el))

    },500)



}
// botao de confirmar cadastro de pergunta 
 
$("#btn_cad_pergunta").click(async function(event){
    event.preventDefault()

    // se todos os campos estiverem corretamente preenchidos
    if((($('#nova_pergunta').val().trim().length) > 0) && ( $('#check1').prop('checked') || $('#check2').prop('checked')) ){
       
        let formData = new FormData($('#form_cad_pergunta')[0])    

        let dados_php = await fetch('./actions/cad_pergunta.php',{
            method:'POST',
            body: formData
        })
        let response = await dados_php.json()

        closePopup1()
        $("#nova_pergunta").val('')
        $('#check1').prop('checked',false)
        $('#check2').prop('checked',false)

        modalStatus('cadastrado com Sucesso!','success')
        
        listarPerguntass() 


     }else{
      modalStatus('preencha todos os dados corretamente!','error')
        
    } 
})  

$("#btn_cancelar_cad_pergunta").click(async function(event){
    event.preventDefault()

    closePopup1()
    $("#nova_pergunta").val('')
    $('#check1').prop('checked',false)
    $('#check2').prop('checked',false)

}) 
// botao sim excluir pergunta 
$("#botao-sim-submit").on('click',async function(event){
    event.preventDefault()
    closePopup3()
    closePopup1()
    let dados_php = await fetch('../pages/actions/action_excluir_pergunta.php?id_pergunta='+id_atual_excluir_pergunta)

    let response = await dados_php.json()
    console.log(response)
    if(response.status){ 

        listarPerguntass()
          modalStatus('Pergunta excluída com sucesso!','success')

    }else{
      modalStatus('Pergunta já cadastrada num checklist!','error')

    }
})  
function setDadosPerguntaById(id){
    let dados_sala = ''
    for(let i = 0; i < dadosPerguntas.length; i++){
        if(dadosPerguntas[i]['id'] == id){
            dados_sala = dadosPerguntas[i]
        }
    }
    id_atual_editar_pergunta = dados_sala['id']
    console.log(id_atual_editar_pergunta)
    if(dados_sala['tipo'] == '0'){
        $('#check3').prop('checked',true)
    }

    if(dados_sala['tipo'] == '1'){
        $('#check4').prop('checked',true)
    }

    if(dados_sala['tipo'] == '2'){
        $('#check3').prop('checked',true)

        $('#check4').prop('checked',true)
    }

    $("#text_editar_pergunta").val(dados_sala['descricao'])  
} 
// function botao cancelar editar 
$("#botao_cancelar_editar").on('click',async function(event){

    event.preventDefault()  

    closePopup2()
    closePopup1()
})  

// action editar pergunta  
$("#botao_confirmar_editar").on('click',async function(e){
    e.preventDefault()
 
    if(($("#text_editar_pergunta").val().trim().length > 0) && ($('#check3').prop('checked') || $('#check4').prop('checked'))){

        let formData = new FormData($('#form_editar_pergunta')[0])    

        let dados_php = await fetch('./actions/action_editar_pergunta.php?id_pergunta='+id_atual_editar_pergunta,{
            method:"POST",
            body: formData

        }) 
        let response = await dados_php.json()
        if(response.status){
 
            listarPerguntass()

            closePopup2()
            closePopup1()

            modalStatus('editado com sucesso!','success') 
        }  
    }else{

      modalStatus('Preencha todos os campos!','error')
    } 
}) 

$("#botao-nao-submit-excluir-pergunta").on('click',function(e){
  e.preventDefault()
  closePopup3()
  closePopup1() 
})

$('#checkPre').on('change',function(e){ 
    filter_perguntas[0] = this.checked 
    filter_listar_perguntas()
}) 
$('#checkPos').on('change',function(e){ 
    filter_perguntas[1] = this.checked 
    filter_listar_perguntas()
})