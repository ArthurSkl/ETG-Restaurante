function openPopup() {
  var overlay = document.getElementById("overlay");
  var popup = document.querySelector(".popup");

  overlay.style.opacity = 1;
  overlay.style.visibility = "visible";

  popup.style.opacity = 1;
  popup.style.transform = "scale(1)";
}

// Função para fechar o pop-up
function closePopup() {
  var overlay = document.getElementById("overlay");
  var popup = document.querySelector(".popup");

  overlay.style.opacity = 0;
  overlay.style.visibility = "hidden";

  popup.style.opacity = 0;
  popup.style.transform = "scale(0.8)";
}
