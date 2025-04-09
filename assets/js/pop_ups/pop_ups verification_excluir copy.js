
 
function openPopupexcluir(){
    let popup = document.getElementById('popup-up-excluir');
    let popup_excluir = document.querySelector('.container-pop-up-excluir');
  

    popup.classList.add("open-popup");
    popup_excluir.classList.add("active");
    
}

function closePopupexcluir(){
    let popup_excluir = document.querySelector('.container-pop-up-excluir');

    let popup = document.getElementById('popup-up-excluir');
    popup.classList.remove("open-popup");
    popup_excluir.classList.remove("active");
    location.reload();
}