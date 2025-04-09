
    // const showModalBtn = document.querySelector('.show-modal');
    // const closeModalBtn = document.querySelector('.close-btn');
    const openModalBtn = document.querySelector('.open-btn-excluir');
    const closeFinalBtn = document.querySelector('.close-modal-btn');
    const overlay = document.querySelector('.overlay-modal');
    const modal2 = document.querySelector('.modal-box');

    function openModal2() {
        console.log('teste')
        overlay.style.opacity = '1';
        overlay.style.pointerEvents = 'auto';
        modal2.style.opacity = '1';
        modal2.style.pointerEvents = 'auto'; 
    }   

    function closeModalExcluir() {
        console.log('teste')
        overlay.style.opacity = '0';
        overlay.style.pointerEvents = 'none';
        modal2.style.opacity = '0';
        modal2.style.pointerEvents = 'none';
    }

    function changeIconAndMessage() {
        const icon = document.querySelector('.fa-solid.fa-question');
        const title = document.querySelector('.titulo_pop_up');
        const message = document.querySelector('.subtitulo_pop_up');

        const cancelButton = document.querySelector('.close-btn');
        const confirmButton = document.querySelector('.open-btn-excluir');

        icon.classList.remove('fa-solid', 'fa-question');
        icon.classList.add('fa-regular', 'fa-circle-check'); // Corrigindo a classe do ícone

        title.textContent = 'Excluído com sucesso';
        message.textContent = 'O item foi excluído com sucesso!';

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

    
