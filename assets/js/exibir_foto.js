function exibirImagemMaior() {

    var imagemOriginal = document.getElementById("imagem");
    var imagemExpandida = document.getElementById("imagemExpandida");


    var src = imagemOriginal.src;


    imagemExpandida.innerHTML = '<img src="' + src + '" alt="Imagem Expandida">';

    var linkElement = document.createElement('link');
    linkElement.rel = 'stylesheet';
    linkElement.type = 'text/css';
    linkElement.href = '../assets/css/exibir_foto.css'; // Verifique o caminho correto do seu arquivo CSS

    document.head.appendChild(linkElement);

    imagemExpandida.style.visibility = "visible";
    document.getElementById("overlay_imagem").style.visibility = "visible";
}

function fecharImagemMaior() {

    var imagemExpandida = document.getElementById("imagemExpandida");
    imagemExpandida.style.visibility = "hidden";
    document.getElementById("overlay_imagem").style.visibility = "hidden";
}

// function exibirImagemMaior() {
//     
//     var imagemOriginal = document.getElementById("imagem");
//     var imagemExpandida = document.getElementById("imagemExpandida");
//     var src = imagemOriginal.src;
//     
//     imagemExpandida.innerHTML = '<img src="' + src + '" alt="Imagem Expandida">';
//     linkElement.href = '../assets/css/exibir_foto.css';
//     document.head.appendChild(imagemExpandida);
//     
//     imagemExpandida.style.visibility="visible";
//     document.getElementById("overlay_imagem").style.visibility="visible";
// } 
// function fecharImagemMaior() {
//    
//     var imagemExpandida = document.getElementById("imagemExpandida");
//     imagemExpandida.style.visibility="hidden";
//     document.getElementById("overlay_imagem").style.visibility="hidden";
// }



