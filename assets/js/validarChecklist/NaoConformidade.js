// import Dom from './Dom.js';

export class NaoConformidade {
    constructor (DataNaoConf) {
        this.DataNaoConf =  DataNaoConf;
    }

    buildButtons(labelDiv, buttonBIBI) {
        self = this;
        var divBotoes = document.querySelector(".botoes");

        var cancelButton = document.createElement("button");
        cancelButton.className = "botao-cancelar-submit";
        cancelButton.textContent = "Cancelar";
        
        cancelButton.onclick = function() {
            self.close();
        }

        var confirmButton = document.createElement("button");
        confirmButton.className = "botao-confirmar-submit";
        confirmButton.textContent = "Confirmar";
        // confirmButton.onclick = function() {
        //     labelDiv = document.querySelector("#label-div");
        //     labelDiv.classList.add("incorrect");
            //vermelho
            labelDiv.style.backgroundColor = 'red';
            labelDiv.classList.add("incorrect");
            buttonBIBI.className = "bi bi-arrow-clockwise";

        //     var textAreaContent = document.querySelector(".descricao_nao_conf").value
        //     var varPreview = document.querySelector(".upload-img");
        //     var images = varPreview.querySelectorAll("img");
        //     self.save(textAreaContent, images);
        //     self.close();
        // }

        divBotoes.appendChild(cancelButton);
        divBotoes.appendChild(confirmButton);

    }

    call() {
        this.onclickToUploadArea();
        this.buildButtons();
        var modal = document.querySelector(".mom");
        modal.style.display = "block";
    }

    close() {
        var varPreview = document.querySelector(".upload-img");
        varPreview.innerHTML = "";
        var textAreaContent = document.querySelector(".descricao_nao_conf");
        textAreaContent.value = "";
        var divBotoes = document.querySelector(".botoes");
        divBotoes.innerHTML = "";
        var modal = document.querySelector(".mom");
        modal.style.display = "none";
    }

    save(textAreaContent, images) {
        var data = [];
        var imagesToPHP = [];
    
        // ARMAZENANDO AS IMAGENS
        for (let i = 0; i < images.length; i++) {
            var src = images[i].getAttribute("src");
            imagesToPHP[i] = src;
        }
    
        // ARMAZENANDO O INPUT
        var textAreaContent = document.querySelector(".descricao_nao_conf").value;
    
    
        data.push(textAreaContent);
        data.push(imagesToPHP);
    

        this.DataNaoConf.push(data);
        console.log(this.DataNaoConf)

    }


    onclickToUploadArea() {
        var uploadImage = document.querySelector(".upload-img")

        var inputFile = document.createElement("input");

        inputFile.setAttribute("type", "file");

        inputFile.setAttribute("id", "input-file");

        inputFile.setAttribute("accept", "image/*");

        inputFile.setAttribute("multiple", "");

        inputFile.style.display = "none";

        uploadImage.appendChild(inputFile);

        var uploadArea = document.querySelector(".upload-area")
        var inputUploadImage = document.querySelector("#input-file")
        uploadArea.onclick = function() {
            inputUploadImage.click();
        }
        inputUploadImage.addEventListener("change", this.loadImagesToPreview);
    }

    loadImagesToPreview(event) {
        const MULTIPLE_FILES = event.target.files;

        const MAX_IMAGES = 3;
        const IMAGES_TO_PROCESS = Math.min(MAX_IMAGES, MULTIPLE_FILES.length);
    
        for (let i = 0; i < IMAGES_TO_PROCESS; i++) {
            const FILE = MULTIPLE_FILES[i];
    
            if (!FILE.type.startsWith("image/")) {
                continue;
            }
    
            const IMG = document.createElement("img");
            IMG.className = "beluga";
            
            
            IMG.src = URL.createObjectURL(FILE);
            
            var container_img = document.createElement("div");
    
            const BUTTON_DELETE_IMAGE = document.createElement("button");
    
            BUTTON_DELETE_IMAGE.textContent = "EXCLUIR";
            BUTTON_DELETE_IMAGE.addEventListener("click", function() {
                var varPreview = document.querySelector(".upload-img");
                while(varPreview.firstChild) {
                    varPreview.removeChild(varPreview.firstChild);
                }
            });
    
            container_img.appendChild(IMG);
            container_img.appendChild(BUTTON_DELETE_IMAGE);
    
            var varPreview = document.querySelector(".upload-img");
            varPreview.appendChild(container_img);
        }
    }


}