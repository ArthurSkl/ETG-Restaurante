var id_atual = 0;
const botao_excluir = document.querySelectorAll(".botao_excluir");
function openPopup_Conf(id_perfil) {
    var overlay_conf = document.getElementById("overlay_conf");
    var popup = document.querySelector(".popup");
  
    overlay_conf.style.opacity = 1;
    overlay_conf.style.visibility = "visible";
  
    id_atual=id_perfil

  }
  
  // Função para fechar o pop-up
  function closePopup_Conf() {
    var overlay_conf = document.getElementById("overlay_conf");
    var popup = document.querySelector(".popup");
  
    overlay_conf.style.opacity = 0;
    overlay_conf.style.visibility = "hidden";
    location.reload();
  }

 
