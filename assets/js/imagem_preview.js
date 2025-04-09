
var imagens = document.querySelectorAll(".imagem_preview");
for (let i = 0; i < imagens.length; i++){
    imagens[i].addEventListener("click", (e) => {        
        var area_imagem = document.createElement("div");
        area_imagem.className = "view_imagem";
        area_imagem.style.cssText = "position: fixed; display: flex; align-items: center; justify-content: center; width: 100vw; height: 100vh; left: 0; top: 0; background-color: rgba(115, 115, 115, 0.522); z-index: 100000000000000000000000000000000000000000000000000000000000000000000;";
        
        var imgview = document.createElement("img")
        imgview.src = e.target.src
        imgview.className = "imagem_expandida"
        imgview.style.cssText = "width: 60%; height: 65%; border-radius: 15px;"
        area_imagem.appendChild(imgview)
        document.body.appendChild(area_imagem);
    })
}
function fecha_imagem() {
    var imagens_expandidas = document.querySelectorAll(".view_imagem");
    imagens_expandidas.forEach(function (imagem_expandida) {
        var divsParaDeletar = document.querySelectorAll(".view_imagem");
        divsParaDeletar.forEach(function (div) {
            div.remove();
        });
    });
}
document.addEventListener("click", function (event) {
    if (event.target.classList.contains("view_imagem")) {
        var divsParaDeletar = document.querySelectorAll(".view_imagem");
        divsParaDeletar.forEach(function (div) {
            div.remove();
        });
    }
});
