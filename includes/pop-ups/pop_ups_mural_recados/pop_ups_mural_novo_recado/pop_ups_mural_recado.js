function openPopup_recado() {
  var overlay_recado = document.getElementById("overlay_recado");
  var popup = document.querySelector(".popup");

  overlay_recado.style.opacity = 1;
  overlay_recado.style.visibility = "visible";

  popup.style.opacity = 1;
  popup.style.transform = "scale(1)";
}

// Função para fechar o pop-up
function closePopup_recado() {
  var overlay_recado = document.getElementById("overlay_recado");
  var popup = document.querySelector(".popup");

  overlay_recado.style.opacity = 0;
  overlay_recado.style.visibility = "hidden";

  popup.style.opacity = 0;
  popup.style.transform = "scale(0.8)";
}
