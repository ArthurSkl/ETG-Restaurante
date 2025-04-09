function modalStatusAcaoCorretiva(texto, tipo, callbackFunction = null, callbackFunction2 = null){
    
    resetModalSections()
     
    let icon_modal = '';
    let tit_modal = ''
    let color_btn_modal = ''
    
    let htmlModal = ''

    if(tipo == 'success'){
        icon_modal = '<i class="fa-regular fa-circle-check"></i>'
        tit_modal = 'Concluído'
        color_btn_modal = '#609437'

    }else if(tipo == 'error'){

        icon_modal = '<i class="fa-regular fa-circle-xmark" style="color: #ec0000;"></i>'
        tit_modal = 'Erro'
        color_btn_modal = '#ec0000'
    }

    var linkElement = document.createElement('link');

    if((tipo == "success") || (tipo == "error")){
        
        linkElement.rel = 'stylesheet';
        linkElement.type = 'text/css';
        linkElement.href = '../assets/css/modalSucesso.css';
        document.head.appendChild(linkElement);

        htmlModal = '<section class="section_modal"> <span class="overlay-modal"></span> <div class="modal-box">'+icon_modal+' <h2 class="titulo_pop_up">'+tit_modal+'</h2> <h3 class="subtitulo_pop_up">'+texto+'</h3> <div class="buttons-pop_up"> <div class="container_dos_btns"> <button id="confirmarOK" class="close-btn" style="background-color: '+color_btn_modal+'">Ok</button> </div> </div> </div> </section>'


    }else if(tipo == "question"){

        linkElement.rel = 'stylesheet';
        linkElement.type = 'text/css';
        linkElement.href = '../assets/css/modalQuestion.css';
        document.head.appendChild(linkElement);

        htmlModal = '<span class="overlay-modal"></span> <div class="modal-box"> <i class="fa-solid fa-question" id="icon-pergunta"></i> <h2 class="titulo_pop_up">Tem certeza</h2> <h3 class="subtitulo_pop_up">'+texto+'</h3> <div class="buttons-pop_up"> <button  id="confirmarOK" class="close-btn" id="close-btn-exclur">Não</button> <button class="open-btn-excluir" >Sim</button> <!-- Adicionando um botão de fechar --> <button class="close-modal-btn" style="display: none;">Fechar</button> </div> </div>'

    }

    // <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    var linkFontAwesome = document.createElement('link')
    linkFontAwesome.rel = 'stylesheet'; 
    linkFontAwesome.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css'
    document.head.appendChild(linkFontAwesome);

    
    var fonte = document.createElement('link');
    fonte.rel = 'stylesheet';
    fonte.type = 'text/css';
    fonte.href = 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,100&family=Poppins:wght@300;400;500;600&family=Raleway:wght@200&display=swap';
    document.head.appendChild(fonte);

 

    var sectionModal = document.createElement('section')
    sectionModal.innerHTML = htmlModal
    sectionModal.id = 'area_modal_del'
    
    

    // insere no html 
    document.body.insertBefore(sectionModal, document.body.firstChild);

    let overlay = document.querySelector(".overlay-modal")
    let modal = document.querySelector(".modal-box") 

    if((tipo == "success") || (tipo == "error")){

        function openModal() { 
            overlay.style.opacity = '1';
            overlay.style.pointerEvents = 'auto';
            modal.style.opacity = '1';
            modal.style.pointerEvents = 'auto'; 
        }

        function closeModal() {
            overlay.style.opacity = '0';
            overlay.style.pointerEvents = 'none';
            modal.style.opacity = '0';
            modal.style.pointerEvents = 'none';
        }

        let closeModalBtn = document.querySelector('.close-btn'); 

        closeModalBtn.addEventListener('click', function(){  
            resetModalSections()
            if(callbackFunction != null){ 
                
                callbackFunction()
            }

            
            closeModal()
        }); 
        
    }else if(tipo == "question"){
 
        function openModal() { 
            overlay.style.opacity = '1';
            overlay.style.pointerEvents = 'auto';
            modal.style.opacity = '1';
            modal.style.pointerEvents = 'auto'; 
        }

        function closeModal() { 
            overlay.style.opacity = '0';
            overlay.style.pointerEvents = 'none';
            modal.style.opacity = '0';
            modal.style.pointerEvents = 'none';
        } 
        
        document.querySelector('.open-btn-excluir').addEventListener('click',function(){ 
            
            if(callbackFunction != null){  
                callbackFunction()
            } 
            closeModal() 
        })
        document.querySelector('.close-btn').addEventListener('click',function(){
            if(callbackFunction2 != null){  
                callbackFunction2()
            } 
            closeModal() 


        })

     
    } 
    openModal() 
} 



function resetModalSections(){

    var sectionModal = document.querySelectorAll(".section_modal");
    var area_modal_del = document.querySelectorAll("#area_modal_del")
     
    // Verifique se o elemento foi encontrado antes de tentar removê-lo
    if (sectionModal) {
        sectionModal.forEach((item) => {
            item.remove()
        })
    } 

    if (area_modal_del) {
        area_modal_del.forEach((item) => {
            item.remove()
        })
    } 

}