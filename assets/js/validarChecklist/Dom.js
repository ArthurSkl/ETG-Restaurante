import { Pergunta } from './Pergunta.js'

export class Dom {     
    constructor() {
        this.dataNaoConf = []
        this.objPergunta = new Pergunta(perguntasJson)
        this.dataPerguta = this.objPergunta.getAll()
        this.manipulacao_botoes = []
        this.fotos = []
        this.contador_limite_fotos_nao_conformidade = 0
    }

    get_dataNaoConf() {
        return this.dataNaoConf
    }
    // addNaoConfToDataNaoConf(pergunta) {
    //     this.dataNaoConf.push(pergunta)
    // }

    showPerguntas() {
        var tipo_preaula = []
        var tipo_posaula = []

        for (let pergunta of this.dataPerguta) { 

            if (pergunta["tipo"] == "0") {
                tipo_preaula.push(pergunta)

                continue
            }
            else if (pergunta["tipo"] == "1") {
                tipo_posaula.push(pergunta)

                continue
            }

            else if (pergunta["tipo"] == "2") {

                tipo_preaula.push(pergunta)
                tipo_posaula.push(pergunta)
            }


        }
        
        var observacao_pre_aula = this.dataPerguta[0]["observacoes"][0]
        var observacao_pos_aula = this.dataPerguta[0]["observacoes"][1]

        var div_perguntas_pre = document.createElement("div")
        div_perguntas_pre.style.width = "100%"
        div_perguntas_pre.style.height = "30px"
        div_perguntas_pre.style.marginBottom = "20px"
        // div_perguntas_pre.style.backgroundColor = "red"
        var titulo_perguntas_pre = document.createElement("h2");
        titulo_perguntas_pre.fontSize = "20px"
        titulo_perguntas_pre.style.textAlign = "center"
        titulo_perguntas_pre.textContent = "PRE AULA"
        titulo_perguntas_pre.style.textDecoration = "underline"
        div_perguntas_pre.appendChild(titulo_perguntas_pre)
        var container_pai = document.querySelector(".list-pre-aula")
        container_pai.appendChild(div_perguntas_pre)

        var coutador_pre = 0
        for (var pergunta of tipo_preaula) {
            coutador_pre++ 
            if (pergunta["NaoConformidade"]) {
                // this.addNaoConfToDataNaoConf(pergunta)  
                this.criarElementoRespondidoErrado(pergunta["pergunta"], pergunta["id_pergunta"], pergunta) //checando se a pergunta tem uma nao conformidade
                continue
            }
            this.criarElementoRespondidoCerto(pergunta["pergunta"], pergunta["id_pergunta"], pergunta)
        }

        var div_perguntas_pos = document.createElement("div")
        div_perguntas_pos.style.width = "100%"
        div_perguntas_pos.style.height = "30px"
        div_perguntas_pos.style.marginBottom = "20px"
        // div_perguntas_pos.style.backgroundColor = "red"
        var titulo_perguntas_pos = document.createElement("h2");
        titulo_perguntas_pos.fontSize = "20px"
        titulo_perguntas_pos.style.textAlign = "center"
        titulo_perguntas_pos.style.textDecoration = "underline"
        titulo_perguntas_pos.textContent = "POS AULA"
        div_perguntas_pos.appendChild(titulo_perguntas_pos)
        var container_pai = document.querySelector(".list-pre-aula")
        container_pai.appendChild(div_perguntas_pos)

        for (var pergunta of tipo_posaula) {

            if (pergunta["NaoConformidade"]) {
                // this.addNaoConfToDataNaoConf(pergunta)
                this.criarElementoRespondidoErrado(pergunta["pergunta"], pergunta["id_pergunta"], pergunta) //checando se a pergunta tem uma nao conformidade
                continue
            }
            this.criarElementoRespondidoCerto(pergunta["pergunta"], pergunta["id_pergunta"], pergunta)
            
        }
        var div_do_titulo = document.createElement("div")
        div_do_titulo.style.display = "flex"
        div_do_titulo.style.justifyContent = "center"
        div_do_titulo.style.alignItems = "center"
        div_do_titulo.style.width = "75%"
        div_do_titulo.style.padding = "15px"
        div_do_titulo.style.marginLeft = "53px"
        var titulo_observacao_pre = document.createElement("p")
        titulo_observacao_pre.textContent = "Observação Pré Aula"
        titulo_observacao_pre.style.fontSize = "20px"
        titulo_observacao_pre.style.fontWeight = "bold"
        div_do_titulo.appendChild(titulo_observacao_pre)
        var campo_observacoes = document.createElement("div")
        campo_observacoes.style.width = "100%"
        campo_observacoes.style.minHeight = "100px"
        campo_observacoes.appendChild(div_do_titulo)
        // campo_observacoes.style.display = "flex"
        // campo_observacoes.style.justifyContent = "flex-start"
        var texto_observacoes = document.createElement("div")
        texto_observacoes.style.border = "solid black 1px"
        // texto_observacoes.style.backgroundColor = "red"
        texto_observacoes.style.borderRadius = "15px"
        texto_observacoes.style.width = "75%"
        texto_observacoes.style.height = "100%"
        // texto_observacoes.style.textAlign = "justify"
        texto_observacoes.style.padding = "15px"
        texto_observacoes.style.marginLeft = "53px"

        var texto_que_realmente_e_texto_observacoes = document.createElement("p")
        texto_que_realmente_e_texto_observacoes.style.width = "100%"
        texto_que_realmente_e_texto_observacoes.style.height = "100%"
        texto_que_realmente_e_texto_observacoes.style.wordWrap = "break-word"

        
        texto_que_realmente_e_texto_observacoes.textContent = observacao_pre_aula
        texto_observacoes.appendChild(texto_que_realmente_e_texto_observacoes)
        campo_observacoes.appendChild(texto_observacoes)
        document.querySelector(".list-pre-aula").appendChild(campo_observacoes)

        var div_do_titulo = document.createElement("div")
        div_do_titulo.style.display = "flex"
        div_do_titulo.style.justifyContent = "center"
        div_do_titulo.style.alignItems = "center"
        div_do_titulo.style.width = "75%"
        div_do_titulo.style.padding = "15px"
        div_do_titulo.style.marginLeft = "53px"
        var titulo_observacao_pre = document.createElement("p")
        titulo_observacao_pre.textContent = "Observação Pos Aula"
        titulo_observacao_pre.style.fontSize = "20px"
        titulo_observacao_pre.style.fontWeight = "bold"
        div_do_titulo.appendChild(titulo_observacao_pre)
        var campo_observacoes = document.createElement("div")
        campo_observacoes.style.width = "100%"
        campo_observacoes.style.minHeight = "100px"
        campo_observacoes.appendChild(div_do_titulo)
        // campo_observacoes.style.display = "flex"
        // campo_observacoes.style.justifyContent = "flex-start"
        var texto_observacoes = document.createElement("div")
        texto_observacoes.style.border = "solid black 1px"
        // texto_observacoes.style.backgroundColor = "red"
        texto_observacoes.style.borderRadius = "15px"
        texto_observacoes.style.width = "75%"
        texto_observacoes.style.height = "100%"
        // texto_observacoes.style.textAlign = "justify"
        texto_observacoes.style.padding = "15px"
        texto_observacoes.style.marginLeft = "53px"

        var texto_que_realmente_e_texto_observacoes = document.createElement("p")
        texto_que_realmente_e_texto_observacoes.style.width = "100%"
        texto_que_realmente_e_texto_observacoes.style.height = "100%"
        texto_que_realmente_e_texto_observacoes.style.wordWrap = "break-word"

        
        texto_que_realmente_e_texto_observacoes.textContent = observacao_pos_aula
        texto_observacoes.appendChild(texto_que_realmente_e_texto_observacoes)
        campo_observacoes.appendChild(texto_observacoes)
        document.querySelector(".list-pre-aula").appendChild(campo_observacoes)
    }

    criarElementoRespondidoCerto(pergunta, idPergunta, dadosPergunta) {
        this.criarLabelCorreta("label_checklist-right", pergunta, idPergunta, dadosPergunta)
    }

    criarElementoRespondidoErrado(pergunta, idPergunta, dadosPergunta) {
        this.criarLabelIncorreta("label_checklist-wrong", pergunta, idPergunta, dadosPergunta)
    }

    criarLabelCorreta(labelClass, pergunta, idPergunta, dadosPergunta) {
        this.manipulacao_botoes.push({"id": idPergunta, "certo": 0, "errado": 0})
        var manipulacao_botoes = this.manipulacao_botoes
        var mainDiv = document.createElement("div")
        mainDiv.className = "input_checklist"
        
        var labelDiv = document.createElement("div")
        labelDiv.id = "label-div"
        labelDiv.className = labelClass

        var teto_colorido = document.createElement("div")
        teto_colorido.style.backgroundColor = "green"
        teto_colorido.style.position = "relative"
        teto_colorido.style.width = "100%"
        teto_colorido.style.height = "10%"
        teto_colorido.style.minHeight = "5px"
        labelDiv.style.overflow = "hidden"
        teto_colorido.style.borderTopLeftRadius = "20px"
        teto_colorido.style.borderTopRightRadius = "20px"

        var descricao_pergunta = document.createElement("p")
        descricao_pergunta.textContent = pergunta
        descricao_pergunta.style.textAlign = "justify"
        descricao_pergunta.style.padding = "15px"
        // descricao_pergunta.style.minHeight = "90%"     

        var botoes_direita = document.createElement("div")
        botoes_direita.className = "botoes_direita"
        botoes_direita.style.width = "20%";
        botoes_direita.style.height = "100%";
        // botoes_direita.style.background = "red";
        botoes_direita.style.fontSize = "40px";
        botoes_direita.style.display = "flex";
        botoes_direita.style.justifyContent = "center";

        var botao_incorreto = document.createElement("i")
        botao_incorreto.className = "bi bi-x"
        botao_incorreto.style.cursor = "pointer"
        botao_incorreto.id = "este_e_da_pergunta" 

        var self_0=this
        botao_incorreto.onclick = function() {
            
 
            for (let i = 0; i < self_0.dataNaoConf.length; i++) {
                if (self_0.dataNaoConf[i]["id_pergunta"] == idPergunta) {
                    self_0.dataNaoConf.splice(i, 1)
                }
            }


        
            if (botao_incorreto.classList.contains("bi-x-circle")) {
                botao_incorreto.className = "bi bi-x"
                botao_incorreto.style.color = "black"
                for (let i = 0; i < self_0.manipulacao_botoes.length; i++) {
                    if (self_0.manipulacao_botoes[i]["id"] == idPergunta) {
                        self_0.manipulacao_botoes[i]["errado"] = 0
                        self_0.manipulacao_botoes[i]["certo"] = 0
                    }
                }
            } else {

                botao_incorreto.className = "bi-x-circle"
                botao_incorreto.style.color = "red"
                self_0.chamar_modal_nao_conf(dadosPergunta, botao_incorreto, idPergunta)
                for (let i = 0; i < self_0.manipulacao_botoes.length; i++) {
                    if (self_0.manipulacao_botoes[i]["id"] == idPergunta) {
                        self_0.manipulacao_botoes[i]["errado"] = 1
                        self_0.manipulacao_botoes[i]["certo"] = 0
                    }
                }
                if (botao_correto.classList.contains("bi-check-circle")) {
                    botao_correto.className = "bi-check"
                    botao_correto.style.color = "black"
                }
            }


        }



        var botao_correto = document.createElement("i")
        botao_correto.className = "bi bi-check"
        botao_correto.style.cursor = "pointer"
        botao_correto.id = "este_e_da_pergunta"
        botao_correto.onclick = function() { 
            for (let i = 0; i < self_0.dataNaoConf.length; i++) {
                if (self_0.dataNaoConf[i]["id_pergunta"] == idPergunta) {
                    self_0.dataNaoConf.splice(i, 1)
                }
            }


            if (botao_correto.classList.contains("bi-check-circle")) {
                botao_correto.className = "bi bi-check"
                botao_correto.style.color = "black"
            } else {

                botao_correto.className = "bi-check-circle"
                botao_correto.style.color = "green"
                if (botao_incorreto.classList.contains("bi-x-circle")) {
                    botao_incorreto.className = "bi-x"
                    botao_incorreto.style.color = "black"
                }
            }
        }

        var botao_estatico = document.createElement("i")
        botao_estatico.className = "bi bi-check-circle"
        botao_estatico.style.color = "green"
        botao_estatico.style.position = "relative"

        botao_estatico.style.fontSize = "40px"
        botao_estatico.style.marginRight = "20px"
        // botao_incorreto.className = "bi bi-check-circle"
        // botao_incorreto.style.color = "green"

        labelDiv.appendChild(teto_colorido)
        labelDiv.appendChild(descricao_pergunta);
        botoes_direita.appendChild(botao_correto)
        botoes_direita.appendChild(botao_incorreto)
        mainDiv.appendChild(botao_estatico)
        mainDiv.appendChild(labelDiv)
        mainDiv.appendChild(botoes_direita)
        document.querySelector(".list-pre-aula").appendChild(mainDiv)
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

        // var botao_incorreto = document.createElement("i")
        // botao_incorreto.className = "bi bi-x"
        // botao_incorreto.style.cursor = "pointer"
        // botao_incorreto.id = "este_e_da_pergunta"
        // botao_incorreto.onclick = function() { 
        //         for (let i = 0; i < self_0.dataNaoConf.length; i++) {
        //             if (self_0.dataNaoConf[i]["id_pergunta"] == idPergunta) {
        //                 self_0.dataNaoConf.splice(i, 1)
        //             }
        //         }




        //         if (botao_incorreto.classList.contains("bi-x-circle")) {
        //             botao_incorreto.className = "bi bi-x"
        //             botao_incorreto.style.color = "black"

        //             for (let i = 0; i < self_0.manipulacao_botoes.length; i++) {
        //                 if (self_0.manipulacao_botoes[i]["id"] == idPergunta) {
        //                     self_0.manipulacao_botoes[i]["errado"] = 0
        //                     self_0.manipulacao_botoes[i]["certo"] = 0
        //                 }
        //             }
        //         } else {

        //             botao_incorreto.className = "bi-x-circle"
        //             botao_incorreto.style.color = "red"
        //             botao_incorreto.id = "este_e_da_pergunta"
        //             self_0.chamar_modal_nao_conf(dadosPergunta, botao_incorreto, idPergunta)
        //             for (let i = 0; i < self_0.manipulacao_botoes.length; i++) {
        //                 if (self_0.manipulacao_botoes[i]["id"] == idPergunta) {
        //                     self_0.manipulacao_botoes[i]["errado"] = 1
        //                     self_0.manipulacao_botoes[i]["certo"] = 0
        //                 }
        //             }
        //             if (botao_correto.classList.contains("bi-check-circle")) {
        //                 botao_correto.className = "bi-check"
        //                 botao_correto.style.color = "black"
        //             }
        //         }
        //     }



        var botao_correto = document.createElement("i")
        botao_correto.className = "bi bi-check"
        botao_correto.style.cursor = "pointer"
        botao_correto.id = "este_e_da_pergunta"
         
            for (let i = 0; i < self_0.dataNaoConf.length; i++) {
                if (self_0.dataNaoConf[i]["id_pergunta"] == idPergunta) {
                    self_0.dataNaoConf.splice(i, 1)
                }
            }
            

            if (botao_correto.classList.contains("bi-check-circle")) {
                botao_correto.className = "bi bi-check"
                botao_correto.style.color = "black"

                for (let i = 0; i < self_0.manipulacao_botoes.length; i++) {
                    if (self_0.manipulacao_botoes[i]["id"] == idPergunta) {
                        self_0.manipulacao_botoes[i]["certo"] = 0
                        self_0.manipulacao_botoes[i]["errado"] = 0
                    }
                }
            } else {

                botao_correto.className = "bi-check-circle"
                botao_correto.style.color = "green"
                for (let i = 0; i < self_0.manipulacao_botoes.length; i++) {
                    if (self_0.manipulacao_botoes[i]["id"] == idPergunta) {
                        self_0.manipulacao_botoes[i]["certo"] = 1
                        self_0.manipulacao_botoes[i]["errado"] = 0
                    }
                }
                // if (botao_incorreto.classList.contains("bi-x-circle")) {
                //     botao_incorreto.className = "bi-x"
                //     botao_incorreto.style.color = "black"
                // }
            }
       
        botao_correto.style.display = "none"

        var botao_estatico = document.createElement("i")
        botao_estatico.className = "bi bi-x-circle"
        botao_estatico.style.position = "relative"
        botao_estatico.style.color = "red"
        botao_estatico.style.fontSize = "40px"
        botao_estatico.style.marginRight = "20px"
        // botao_incorreto.className = "bi bi-check-circle"
        // botao_incorreto.style.color = "green"

        debaixo_teto_colorido.appendChild(descricao_pergunta)
        div_esquerda_labelDiv.appendChild(teto_colorido)
        div_esquerda_labelDiv.appendChild(debaixo_teto_colorido)
        div_direita_labelDiv.appendChild(olhinho_div_direita)
        labelDiv.appendChild(div_esquerda_labelDiv)
        labelDiv.appendChild(div_direita_labelDiv)
        botoes_direita.appendChild(botao_correto)
        // botoes_direita.appendChild(botao_incorreto)
        mainDiv.appendChild(botao_estatico)
        mainDiv.appendChild(labelDiv)
        mainDiv.appendChild(botoes_direita)
        document.querySelector(".list-pre-aula").appendChild(mainDiv)
    }

    chamar_modal_nao_conf(pergunta, botao_incorreto, idPergunta) {

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
        descricaoPergunta.innerText = pergunta["pergunta"]
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

            cancelButton.remove()
            confirmButton.remove()
            modal.style.display = "none"
            botao_incorreto.className = "bi bi-x"
            botao_incorreto.style.color = "black"
            for (let i = 0; i < self_0.manipulacao_botoes.length; i++) {
                if (self_0.manipulacao_botoes[i]["id"] == idPergunta) {
                    self_0.manipulacao_botoes[i]["certo"] = 0
                    self_0.manipulacao_botoes[i]["errado"] = 0
                }
            }
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
            botao_incorreto.className = "bi bi-x-circle"
            botao_incorreto.style.color = "red"
            
            var lista_dados = []
            // lista_dados["imagens"] = []
            // lista_dados["dados_pergunta"] = []
            
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
            lista_dados["id_pergunta"] = idPergunta
            // lista_dados["dados_pergunta"][] = pergunta

            self_0.salvar_modal_nao_conf(lista_dados)

            for (let i = 0; i < self_0.manipulacao_botoes.length; i++) {
                if (self_0.manipulacao_botoes[i]["id"] == idPergunta) {
                    self_0.manipulacao_botoes[i]["certo"] = 0
                    self_0.manipulacao_botoes[i]["errado"] = 1
                }
            }
        }
 
        divBotoes.appendChild(cancelButton)
        divBotoes.appendChild(confirmButton)
    }


    salvar_modal_nao_conf(param) {
        var imagens = param["images"]
        var data = {}
    
        // ARMAZENANDO AS IMAGENScriarLabelIncorreta

        data["descricao_n_conformidade"] = param["descricao_n_conf"]
        data["id_pergunta"] = param["id_pergunta"]
        data["imagens"] = imagens
        this.dataNaoConf.push(data)

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
        // butao.style.fontWeight = "bold"
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
        

        for (let i = 0; i < nao_conformidade["imagesToPHP"].length; i++) {
            if (nao_conformidade["imagesToPHP"][i].length == 0) {
                continue
            }
            var nome_img = "img__"+i
            var img = document.querySelector("#"+nome_img) 
            img.src =  "../storage/n_conformidade/"+nao_conformidade["imagesToPHP"][i]
        }
        var div_descricao_nao_conformidade = document.querySelector("#texto_em_agora_n_conf p")
        div_descricao_nao_conformidade.innerText = nao_conformidade["descricao_nao_confirmidade_docente"]
        var botao_sair = document.querySelector(".bi-x-circle")
        botao_sair.onclick = function() {
            modal_mostrar_nao_conformidade.style.display = "none"

            var divpai = document.querySelector(".images-nao-conformidade")
            var divsfilhas = divpai.querySelectorAll(".imgs")
            
            document.querySelector("#img__0").src = ""
            document.querySelector("#img__1").src = ""
            document.querySelector("#img__2").src = ""
            nome_img = ""
        }
        
    }
}   

 


