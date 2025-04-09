function openPopupValidar() {
    let popup = document.getElementById('popup-up-notificacao');
    let btn = document.getElementById("submit-btn-notificacao");

    btn.style.display = "none";
    popup.classList.add("open-popup");
}

function closePopupValidar() {
    let popup = document.getElementById("popup-up-notificacao");
    let btn = document.getElementById("submit-btn-notificacao");

    btn.style.display = "block";

    popup.classList.remove("open-popup");
}
