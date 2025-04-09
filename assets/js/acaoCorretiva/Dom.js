
export class Dom {     
    constructor(entry) {
        this.data_acao_corretiva = []
        this.dataPerguta = entry
        this.manipulacao_botoes = []
        this.fotos = []
        this.contador_limite_fotos_nao_conformidade = 0
    }

    post_malone_rockstar() {
        return this.data_acao_corretiva
    }

    showPerguntas() {
        var tipo_preaula = []
        var tipo_posaula = []
        var self_0 = this
        for (let pergunta of this.dataPerguta) {
            // console.log(pergunta)
            self_0.criarElementoRespondidoErrado(pergunta["descricao_NC"], pergunta["id_pergunta"], pergunta)

        }

    }
    criarElementoRespondidoErrado(pergunta, idPergunta, dadosPergunta) {
        this.criarLabelIncorreta("label_checklist-wrong", pergunta, idPergunta, dadosPergunta)
    }

    criarLabelIncorreta(labelClass, pergunta, idPergunta, dadosPergunta) {
        var self_0 = this
        this.manipulacao_botoes.push({"id": idPergunta, "certo": 0, "errado": 0})
        // this.nao_conformidade_docente.push()
        var manipulacao_botoes = this.manipulacao_botoes

        var mainDiv = document.createElement("div")
        mainDiv.className = "input_checklist"
        
        var labelDiv = document.createElement("div")
        labelDiv.id = "label-div"
        labelDiv.className = labelClass
        labelDiv.style.display = "flex"

        var div_esquerda_labelDiv = document.createElement("div")
        div_esquerda_labelDiv.style.width = "80%"
        div_esquerda_labelDiv.style.height = "100%"

        var teto_colorido = document.createElement("div")
        teto_colorido.style.backgroundColor = "red"
        teto_colorido.style.position = "relative"
        teto_colorido.style.width = "100%"
        teto_colorido.style.height = "10%"
        teto_colorido.style.minHeight = "5px"
        labelDiv.style.overflow = "hidden"
        teto_colorido.style.borderTopLeftRadius = "20px"
        teto_colorido.style.borderRadius = "20px"


        var debaixo_teto_colorido = document.createElement("div")
        // debaixo_teto_colorido.style.backgroundColor = "blue"
        debaixo_teto_colorido.style.minHeight = "95px"
        debaixo_teto_colorido.style.height = "90%"
        debaixo_teto_colorido.style.width = "100%"

        var descricao_pergunta = document.createElement("p")
        descricao_pergunta.textContent = pergunta
        descricao_pergunta.style.textAlign = "justify"
        descricao_pergunta.style.padding = "15px"
        // descricao_pergunta.style.minHeight = "90%"     


        var div_direita_labelDiv = document.createElement("div")
        div_direita_labelDiv.style.width = "20%"
        div_direita_labelDiv.style.height = "100%"
        // div_direita_labelDiv.style.backgroundColor = "blue"
        div_direita_labelDiv.style.minHeight = "100px"
        // div_direita_labelDiv.style.border = "solid black 5px"
        div_direita_labelDiv.style.borderTopRightRadius = "20px"
        div_direita_labelDiv.style.borderBottomRightRadius = "20px"
        div_direita_labelDiv.style.display = "flex"
        div_direita_labelDiv.style.justifyContent = "center"
        div_direita_labelDiv.style.alignItems = "center"

        var olhinho_div_direita = document.createElement("i")
        olhinho_div_direita.className = "bi bi-eye"
        olhinho_div_direita.style.cursor = "pointer"
        olhinho_div_direita.style.fontSize = "50px"
        olhinho_div_direita.onclick = function() {
            self_0.chamar_visualizar_nao_conformidade(dadosPergunta)
        }


        var botoes_direita = document.createElement("div")
        botoes_direita.className = "botoes_direita"
        botoes_direita.style.width = "20%";
        botoes_direita.style.height = "100%";
        // botoes_direita.style.background = "red";
        botoes_direita.style.fontSize = "40px";
        botoes_direita.style.display = "flex";
        botoes_direita.style.justifyContent = "center";

        var botao_correto = document.createElement("i")
        botao_correto.className = "bi bi-check"
        botao_correto.style.cursor = "pointer"
        botao_correto.style.fontSize = "60px"
        botao_correto.id = "este_e_da_pergunta"
        botao_correto.onclick = function() {
            if (botao_correto.classList.contains("bi-check-circle")) {
                botao_correto.className = "bi bi-check"
                botao_correto.style.color = "black"
            } else {
                self_0.chamar_modal_nao_conf(dadosPergunta, botao_correto)
                botao_correto.className = "bi-check-circle"
                botao_correto.style.color = "green"
            }
        }

        var botao_estatico = document.createElement("i")
        botao_estatico.className = "bi bi-x-circle"
        botao_estatico.style.position = "relative"
        botao_estatico.style.color = "red"
        botao_estatico.style.fontSize = "40px"
        botao_estatico.style.marginRight = "20px"
        debaixo_teto_colorido.appendChild(descricao_pergunta)
        div_esquerda_labelDiv.appendChild(teto_colorido)
        div_esquerda_labelDiv.appendChild(debaixo_teto_colorido)
        div_direita_labelDiv.appendChild(olhinho_div_direita)
        labelDiv.appendChild(div_esquerda_labelDiv)
        labelDiv.appendChild(div_direita_labelDiv)
        botoes_direita.appendChild(botao_correto)
        mainDiv.appendChild(botao_estatico)
        mainDiv.appendChild(labelDiv)
        mainDiv.appendChild(botoes_direita)
        document.querySelector(".list-pre-aula").appendChild(mainDiv)
    }

    chamar_modal_nao_conf(pergunta, botao_correto) {
        document.querySelector(".pergunta_nao_conf").innerHTML = ""
        document.querySelector(".descricao_nao_conf").value = ""
        document.querySelector(".upload-img").innerHTML = ""


        var self_0 = this
        var modal = document.querySelector(".mom")
        modal.style.display = "block"
        modal.style.position = "fixed"
        modal.style.margin = "150px 0px 0px 0px"
        modal.style.width = "100vw"
        modal.style.display = 'flex'
        modal.style.zIndex = "1";
        modal.style.backgroundColor = "rgba(255, 255, 255, 1)"
        document.querySelector(".meio").style.margin = "0px 0px 0px 0px"
        modal.style.justifyContent = "center"

        var perguntaMae = document.querySelector(".pergunta_nao_conf")
        var descricaoPergunta = document.createElement("h6")
        descricaoPergunta.innerText = pergunta["descricao_NC"]
        perguntaMae.appendChild(descricaoPergunta)
        this.onclickToUploadArea()
        var modal = document.querySelector(".mom")
        var descricaoPergunta = document.createElement("h6")
        perguntaMae.appendChild(descricaoPergunta)
        
        var divBotoes = document.querySelector(".botoes")

        var cancelButton = document.createElement("button")
        cancelButton.className = "botao-cancelar-submit"
        cancelButton.textContent = "Cancelar"
        
        
        cancelButton.onclick = function() {
            if (botao_correto.classList.contains("bi-check-circle")) {
                botao_correto.className = "bi bi-check"
                botao_correto.style.color = "black"
            } else {
                botao_correto.className = "bi-check-circle"
                botao_correto.style.color = "green"
            }

            cancelButton.remove()
            confirmButton.remove()
            modal.style.display = "none"
        }
        
        var confirmButton = document.createElement("button")
        confirmButton.className = "botao-confirmar-submit"
        confirmButton.textContent = "Confirmar"
        confirmButton.onclick = function() {
            

            if (document.querySelector(".descricao_nao_conf").value.trim().length == 0) {                
                modalStatus("Preencha a descrição", "error", () => {})
                return
            }
            if (document.querySelector(".upload-img").querySelectorAll("div").length == 0) {
                modalStatus("Preencha ao menos uma imagem", "error", () => {})
                return 
            }


            cancelButton.remove()
            confirmButton.remove()
            modal.style.display = "none"
            
            var lista_dados = {}
            var imageszinhas = []
            var div_pai = document.querySelector(".upload-img")
            var divs_filhas = div_pai.getElementsByTagName("div")
            for (let i = 0; i < divs_filhas.length; i++) {
                var img = divs_filhas[i].getElementsByTagName('img')[0];
                if (img){
                    imageszinhas.push(img.src);
                }
            } 
            
            
            lista_dados["images"] = imageszinhas
            lista_dados["descricao_n_conf"] = document.querySelector(".descricao_nao_conf").value
            lista_dados["id_n_conf"] = pergunta["id"]

            self_0.salvar_modal_nao_conf(lista_dados)
        }
 
        divBotoes.appendChild(cancelButton)
        divBotoes.appendChild(confirmButton)
    }


    salvar_modal_nao_conf(param) {
    
        // ARMAZENANDO AS IMAGENScriarLabelIncorret
        this.data_acao_corretiva.push(param)
        console.log(this.data_acao_corretiva)
    }

    onclickToUploadArea() {
        var uploadImage = document.querySelector(".upload-img")

        var inputFile = document.createElement("input")

        inputFile.setAttribute("type", "file")

        inputFile.setAttribute("id", "input-file")

        inputFile.setAttribute("accept", "image/*")

        inputFile.setAttribute("multiple", "")

        inputFile.style.display = "none"

        uploadImage.appendChild(inputFile)

        var uploadArea = document.querySelector(".upload-area")
        var inputUploadImage = document.querySelector("#input-file")
        uploadArea.onclick = function() {
            inputUploadImage.click()
        }
        inputUploadImage.addEventListener("change", this.loadImagesToPreview)
    }

    loadImagesToPreview(event) {
        var div_pai = document.querySelector(".upload-img")
        var divs_filhas = div_pai.getElementsByTagName("div")
        // console.log(divs_filhas.length)
        if (divs_filhas.length > 4) {
            modalStatus("Apenas um máximo de três imagens pode ser inserido.", "error", () => {})
            return
        }

        var self_0 = this
        const MULTIPLE_FILES = event.target.files
        const IMAGES_TO_PROCESS = MULTIPLE_FILES.length
        if (IMAGES_TO_PROCESS > 1) {
            modalStatus("Selecione uma imagem de cada vez", "error", () => {})
            return 
        }

        const FILE = MULTIPLE_FILES[0]
        
        if (!FILE.type.startsWith("image/")) {
            return 
        }
        
        const IMG = document.createElement("img")
        IMG.className = "beluga"
        
        let reader = new FileReader()

        reader.onload = (e) => {
            IMG.src = e.target.result
        }

        reader.readAsDataURL(FILE)  
        
        
        
        var container_img = document.createElement("div")
        var botao_de_cada_foto = document.createElement("div")
        let butao = document.createElement("i")
        var varPreview = document.querySelector(".upload-img")
        container_img.style.display = "flex"
        container_img.style.justifyContent = "center"
        container_img.style.alignItems = "center"
        container_img.style.margin = "30px 0px 0px 0px"
        container_img.style.position = "relative"
        botao_de_cada_foto.style.position = "absolute"
        botao_de_cada_foto.style.borderRadius = "15px"
        botao_de_cada_foto.style.width = "6vw"
        botao_de_cada_foto.style.height = "40px"
        botao_de_cada_foto.style.backgroundColor = "black"
        botao_de_cada_foto.style.top = "0%"
        botao_de_cada_foto.style.right = "0%"
        botao_de_cada_foto.style.cursor = "pointer"
        botao_de_cada_foto.style.display = "flex"
        botao_de_cada_foto.style.justifyContent = "center"
        botao_de_cada_foto.style.alignItems = "center"
        
        
        IMG.style.maxWidth = "100%"
        
        
        butao.classList.add("bi", "bi-x")
        butao.style.fontSize = "35px"
        butao.style.color = "white"
        container_img.appendChild(IMG)
        container_img.appendChild(botao_de_cada_foto)
        botao_de_cada_foto.appendChild(butao)
        
        
        
        varPreview.appendChild(container_img)
        botao_de_cada_foto.onclick = function () {
            container_img.remove()
        }

        

    }
    
    
    
    chamar_visualizar_nao_conformidade(nao_conformidade) {
        var modal_mostrar_nao_conformidade = document.querySelector("#mostrar-nao-conformidade")
        modal_mostrar_nao_conformidade.style.display = "block"
        

        document.querySelector("#img__0").src = "../storage/n_conformidade/"+nao_conformidade["img1"]
        document.querySelector("#img__1").src = "../storage/n_conformidade/"+nao_conformidade["img2"]
        document.querySelector("#img__2").src = "../storage/n_conformidade/"+nao_conformidade["img3"]
        var div_descricao_nao_conformidade = document.querySelector("#texto_em_agora_n_conf p")
        div_descricao_nao_conformidade.innerText = nao_conformidade["descricao_NC"]
        var botao_sair = document.querySelector(".bi-x-circle")
        botao_sair.onclick = function() {
            modal_mostrar_nao_conformidade.style.display = "none"

            var divpai = document.querySelector(".images-nao-conformidade")
            var divsfilhas = divpai.querySelectorAll(".imgs")
            
            document.querySelector("#img__0").src = ""
            document.querySelector("#img__1").src = ""
            document.querySelector("#img__2").src = ""
        }
        
    }
}   

 


