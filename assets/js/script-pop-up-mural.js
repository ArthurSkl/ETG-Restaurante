function openPopup() {
  var overlay = document.getElementById("overlay");
  var popup = document.querySelector(".popup");

  overlay.style.opacity = 1;
  overlay.style.visibility = "visible";

  
}

// Função para fechar o pop-up
 function closePopup() {
  var overlay = document.getElementById("overlay");
  var popup = document.querySelector(".popup");

  overlay.style.opacity = 0;
  overlay.style.visibility = "hidden";

  

  
}
