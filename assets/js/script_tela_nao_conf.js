var listasrc = []
var disponiveis = {'1': false, '2': false, '3': false}
var temporaria = null

$(document).ready(function(){
    $(".upload-area").click(function(){  
        $('#upload-input').trigger('click');

    });


    $('#upload-input').change( async (event) => {
 
        
        if(event.target.files){
 
            // se tiver vagas nas imgs 
            if(listaData[id_atual].imgs.length < 3){

                // if(listaData[id_atual].imgs.length)
                let file = event.target.files[0];
                    
                let reader = new FileReader();
                
                reader.onload = (e) => {
    
                    listaData[id_atual].imgs.push(e.target.result)
                    loadImgs()
                }
    
                reader.readAsDataURL(file) 

            }else{  
                modalStatus('Você pode cadastrar no máximo 3 imagens','error')
            }

        } 
            
            


            $('#upload-input').val('');

    });

    $(window).click(function(event){
       
        if($(event.target).hasClass('remove-btn')){ 
            listaData[id_atual].imgs.pop($(event.target).parent().attr('btn_rm')) 
            $(event.target).parent().remove();
            loadImgs()
            // btn = $(event.target).attr('btn');
            
        }
    })


});
let currentID;
function acao(id){
    
     var areaPergunta = document.querySelector(".pergunta");
    // areaPergunta.style.textAlign = "center";
    areaPergunta.style.display = "flex";
    areaPergunta.style.justifyContent = "center";
 


  
    
    currentID = id
    let modal = document.querySelector('.mom')

    modal.classList.add('active'); 
    
}

function fechar(){
    
    removerimgs()

    let modal = document.querySelector('.mom')
    modal.classList.remove('active');

    let  red = document.getElementById('red'+currentID)
    red.classList = 'bi bi-x'
}

function removerimgs()
{
    let imagens = document.querySelectorAll('.uploaded-img')
    for (var div of imagens) {
        div.remove();
    }
}
