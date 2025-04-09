export class Pergunta {
    // hasNaoConf, idSala, idPergunta, checklistName, salaName, pergunta, tipo
    constructor(dataPergunta) {
        this.dataPergunta = dataPergunta; //array 
    }

    getAll() { 
        return this.dataPergunta;
    }

}