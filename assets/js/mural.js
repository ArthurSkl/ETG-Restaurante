 

const modalExcluirRecado = document.querySelector('.area_modal_excluir_recado');
const btn_confirmar = document.querySelector('.botao-confirmar-submit');
const textareaEditar = document.getElementById("text-descricao-pop-up");
 
var id_atual = '';
 
bnt_excluir = document.querySelectorAll(".icon_card_recado_excluir");
bnt_editar = document.querySelectorAll(".icon_card_recado_editar");
overlay_excluir = document.querySelector(".overlay_modal_excluir_recado");

const btn_salvar_editar = document.querySelector('.botao-salvar-submit');
// const btn_salvar_excluir = document.querySelector('.botao-excluir-submit');


// btn_salvar_excluir.addEventListener('click',deletarRecado);

btn_salvar_editar.addEventListener('click',confirmarEditar);

 
bnt_excluir.forEach(btn => {
    btn.addEventListener('click',openModalExcluir)
});
 
bnt_editar.forEach(btnE => {
    btnE.addEventListener('click',openModalEditar)
  
});

async function openModalEditar(){

    openPopup()
    
    var id_recado = this.getAttribute('id_recado');
    id_atual = id_recado
    

    dados = {
        id: id_recado
    }
    console.log(id_recado)
    
    response =  await fetch('actions/mural_get_descricao.php',{
        method: 'POST',
        
        headers: {
            'Content-Type': 'application/json'
        },

        body:  JSON.stringify(dados)

    });


    const conteudo = await response.json();

    // console.log(conteudo);

    textareaEditar.value = conteudo['texto']

    // btn_salvar_excluir.setAttribute('id_recado',conteudo['id'])
    btn_salvar_editar.setAttribute('id_recado',conteudo['id'])

}

// function salvar alterações 
async function confirmarEditar(){

    
    var id_recado = btn_salvar_editar.getAttribute('id_recado');
    var descricao = textareaEditar.value;
    
    if(descricao.trim()){


        dados = {
   
           id : id_recado,
           novaDescricao: descricao
        }
       
       request = await fetch('actions/mural_update_descricao.php',{
   
           method: "POST",
           headers: {
               'Content-Type': 'application/json'
           },
           body: JSON.stringify(dados)
   
       });
   
       response = await request.json();
       console.log(response)
       if(response['status']){ 

        // modalStatus('Recado editado com Sucesso!','success',() => { 

        location.reload(); 
        // })


       }else{
           // mensagem de erro 
       }


    }else{

      modalStatus('Digite algo','error')

    } 
}

function openModalExcluir(){

    var id_recado = this.getAttribute('id_recado');
    id_atual = id_recado;
    
     
    btn_confirmar.setAttribute('id_recado',id_recado);
    
    modalStatus('Deseja excluir esse recado?','question',() => {
        deletarRecado()
    })

    // bnt_excluir.forEach(btn => {
    //     btn.removeEventListener('click', openModalExcluir)
    // })  

}
function retornaAlgo(){
    console.log('algo')
}

function closeModalExcluir(){

    bnt_excluir.forEach(btn => {
        btn.addEventListener('click',openModalExcluir)
    });
    modalExcluirRecado.classList.remove('active');
    overlay_excluir.classList.remove('active');
    

}

async function deletarRecado(){
    
 
    let id_recado_delete = id_atual;
   
    const dados = await fetch('../pages/actions/recado_delete_action.php?id_recado='+id_recado_delete);
 
    const response = await dados.json();
    if(response['status']){
        modalStatus('Recado excluído com Sucesso!','success',() => { 
            location.reload() 
        })

    }else{
        modalStatus('Algo inesperado aconteceu','error',() => { 
            location.reload() 
        })
    } 
}
 
async function cadastrarRecado(){

    var texto = document.getElementById("texto_novo_recado").value

    if(texto.trim()){
        closePopup_recado()
        bodyDados = {
            "texto":texto
        }
    
        const dados = await fetch("./actions/mural_novo_recado.php",{
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(bodyDados)
        })

        const response = await dados.json()
        if(response['status']){

            modalStatus('Cadastrado com Sucesso!','success',() => {
                location.reload()
            }) 
            
        }else{ 
            console.log(response['status'])
        } 
    }else{ 
        modalStatus('Digite Algo','error') 
    }



}