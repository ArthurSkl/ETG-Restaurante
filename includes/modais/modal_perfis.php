<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <section class="section_modal">
        <button class="show-modal">Abrir</button>
        <span class="overlay-modal"></span>
        <div class="modal-box">
            <i class="fa-regular fa-circle-check"></i>
            <h2 class="titulo_pop_up">Concluido</h2>
            <h3 class="subtitulo_pop_up">perfil criado com sucesso!</h3>

        <div class="buttons-pop_up">
            <div class="container_dos_btns">
                <button type="submit" class="close-btn">Ok, fechar</button>
            </div>
        </div>
        </div>
    </section>
    
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
    position: absolute;
    height: 100%;
    width: 100%;
    background: rgba(0, 0, 0, 0.3);
    opacity: 0;
    pointer-events: none;
}
.modal-box{
    display: flex;
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
.modal-box i {
    font-size: 70px;
    color: #609437;
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
    background-color: #609437;
    border: 3px solid var(--cor-primaria-botao-green);
    border-radius: 20px;
    cursor: pointer;
    color: var(--cor-primaria-botao-green);
    font-style: normal;
    font-size: 15px;
    font-weight: 580;

}

    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const showModalBtn = document.querySelector('.show-modal');
            const closeModalBtn = document.querySelector('.close-btn');
            const openModalBtn = document.querySelector('.open-btn');
            const overlay = document.querySelector('.overlay-modal');
            const modal = document.querySelector('.modal-box');
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
            showModalBtn.addEventListener('click', openModal);
            closeModalBtn.addEventListener('click', closeModal);
            openModalBtn.addEventListener('click', openModal);
        });
        

    </script>
