<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <span class="overlay-modal"></span>
        <div class="modal-box">
            <i class="fa-solid fa-question" id="icon-pergunta"></i>
            <h2 class="titulo_pop_up">Tem certeza</h2>
            <h3 class="subtitulo_pop_up">que deseja excluir?</h3>

            <div class="buttons-pop_up">
                <button class="close-btn" id="close-btn-exclur">Cancelar</button>
                <button class="open-btn-excluir" >Sim</button>
                <!-- Adicionando um botão de fechar -->
                <button class="close-modal-btn" style="display: none;">Fechar</button>
            </div>
        </div> 
        <style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,100&family=Poppins:wght@300;400;500;600&family=Raleway:wght@200&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}
.section_modal{ 
    position: absolute;
    height: 100%;
    width: 100%;
    background-color: #e3f2fd;
}
button.show-modal,
.modal-box{
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    font-size: 18px;
    color: #e3f2fd;
    padding: 14px 22px;
    border: none;
    background-color: #4070f4;
    border-radius: 6px;
    cursor: pointer;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);

}
button.show-modal:hover{
    background-color: #265df2;
}

.overlay-modal{
    position: fixed;
    z-index: 99999;
    height: 100vh;
    left: 0;
    top: 0;
    width: 100%;
    background: rgba(0, 0, 0, 0.3);
    opacity: 0;
    pointer-events: none;
}
.modal-box{
    display: flex;
    z-index: 99999;
    flex-direction: column;
    align-items: center;
    max-width: 380px;
    width: 100%;
    background-color: #fff;
    border-radius: 24px;
    padding: 30px 20px;
    opacity: 0;
    pointer-events: none;

}
.modal-box #icon-pergunta {
    font-size: 70px;
    color: #609437; 
}

       
.modal-box .fa-regular.fa-circle-xmark {
    color: #CB1010 !important; 
}
.modal-box .titulo_pop_up{
    margin-top: 20px;
    font-size: 25px;
    font-weight: 500;
    color: #333;
}
.modal-box .subtitulo_pop_up{
    font-size: 16px;
    font-weight: 400;
    color: #726e6e;
    text-align: center;
}
.modal-box button{
    font-size: 14px;
    padding: 6px 12px;
    margin: 0 10px;

}
.modal-box .buttons-pop_up{
    margin-top: 25px;
}
.buttons-pop_up{
    display: flex;
    align-items: center;
    justify-content: center;
}
.close-btn{
    margin-top: 20px;
    width: 120px;
    height: 45px;
    background-color: #CB1010; 
    border-radius: 20px;
    cursor: pointer;
    color: white;
    font-style: normal;
    font-size: 15px;
    font-weight: 580;

}
.open-btn-excluir{
    margin-top: 20px;
    width: 120px;
    height: 45px;
    background-color: #609437;
    border: 3px solid var(--cor-primaria-botao-green);
    border-radius: 20px;
    cursor: pointer;
    color: #e3f2fd;
    font-style: normal;
    font-size: 15px;
    font-weight: 580;
}
.close-modal-btn{
    margin-top: 20px;
    width: 120px;
    height: 45px;
    background-color: #609437; 
    border-radius: 20px;
    cursor: pointer;
    color: white;
    font-style: normal;
    font-size: 15px;
    font-weight: 580;
}
.fa-circle-xmark  {
    color: #CB1010;
}

        </style>

        <script> 
            // const showModalBtn = document.querySelector('.show-modal');
            // const closeModalBtn = document.querySelector('.close-btn');
            const openModalBtn = document.querySelector('.open-btn-excluir');
            const closeFinalBtn = document.querySelector('.close-modal-btn');
            const overlay = document.querySelector('.overlay-modal');
            const modal2 = document.querySelector('.modal-box');

            function openModal2() {
                // console.log('teste')
                overlay.style.opacity = '1';
                overlay.style.pointerEvents = 'auto';
                modal2.style.opacity = '1';
                modal2.style.pointerEvents = 'auto'; 
            }   

            function closeModalExcluir() {
                // console.log('teste')
                overlay.style.opacity = '0';
                overlay.style.pointerEvents = 'none';
                modal2.style.opacity = '0';
                modal2.style.pointerEvents = 'none';
            }

            function changeIconAndMessage(message_parametro = "O item foi excluído com sucesso!") {
                const icon = document.querySelector('.fa-solid.fa-question');
                const title = document.querySelector('.titulo_pop_up');
                const message = document.querySelector('.subtitulo_pop_up');

                const cancelButton = document.querySelector('.close-btn');
                const confirmButton = document.querySelector('.open-btn-excluir');

                icon.classList.remove('fa-solid', 'fa-question');
                icon.classList.add('fa-regular', 'fa-circle-check'); // Corrigindo a classe do ícone

                title.textContent = 'Excluído com sucesso';
                message.textContent = message_parametro;

                cancelButton.style.display = 'none';
                confirmButton.style.display = 'none';
                closeFinalBtn.style.display = 'block';  
                closeFinalBtn.addEventListener('click',fecharPopup)

                
            }

            function changeIconAndMessageReverse() { 
                 
                const icon = document.querySelector('.fa-regular.fa-circle-check');
                const title = document.querySelector('.titulo_pop_up');
                const message = document.querySelector('.subtitulo_pop_up');

                const cancelButton = document.querySelector('.close-btn');
                const confirmButton = document.querySelector('.open-btn-excluir');

                icon.classList.remove('fa-regular', 'fa-circle-check'); // Corrigindo a classe do ícone
                icon.classList.add('fa-solid', 'fa-question');

                title.textContent = 'Tem certeza';
                message.textContent = 'que deseja excluir?';

                cancelButton.style.display = 'block';
                confirmButton.style.display = 'block';
                closeFinalBtn.style.display = 'none';   
            }
            

            function fecharPopup(){

                changeIconAndMessageReverse()
                closeModalExcluir()
            }

            
        </script>
 