
    // SCRIPT DO POPUP DE CADASTRAR PERGUNTAS

    let popup_cadastro_pergunta = document.getElementById("popup-cadastro-pergunta");
    function openPopup1(){

        document.getElementById("overlay").style.visibility="visible";
        popup_cadastro_pergunta.classList.add("open-popup1");
        console.log("popup_cadastro_pergunta");
        
    }
    function closePopup1(){ 
        
        document.getElementById("overlay").style.visibility= 'hidden';
        popup_cadastro_pergunta.classList.remove("open-popup1");
    }

