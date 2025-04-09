<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #ddd;
        }
        .area_btn{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: end;
            padding-bottom: 15px;
        }
        .area_btn button{
            margin-right: 20px;
            background-color: #064A8C;
            border-radius: 10px;
            padding: 5px;
            color: #fff;
            font-size: 20px;
            font-family: "Montsserat";
            cursor: pointer;

        }
        @media print {
            .cabecalho-menu{
                display: none;
            }
            .area_btn{
                display: none;
            }
        }
    </style>
    <title>Relatório de não conformidades</title>
</head>
<body>
    <h2 id='nome_titulo'>Relatório de Usuários</h2>
    <div class="area_btn">
        <button id='btn_imprimir'><i class="fa-solid fa-print"></i> Imprimir</button>
    </div>

    <table>
        <thead>
            <tr>
                <th>Data</th>
                <th>Nome</th>
                <th>Sala</th>
                <th>Checklist</th>
                <th>Não Conforme</th>
                <th>Intervenção</th>
            </tr>
        </thead>
        <tbody id="tbody_pdf">
             
             
        </tbody>
    </table>
</body>
<script>

    
    if(localStorage.getItem('dadosPDFUser') != 'undefined'){


        var dadosPDF = JSON.parse(localStorage.getItem('dadosPDFUser')) 
        console.log(dadosPDF)
        dadosPDF.forEach(element => {
            
            let td =document.createElement('tr')
            td.innerHTML = `
                    <td>${element.data_fechamento}</td>
                    <td>${element.nome}</td>
                    <td>${element.nome_sala}</td>
                    <td>${element.nome_check}</td>
                    <td>${element.qnt_nc > 0 ? 'Sim': 'Não'}</td>
                    <td>${element.qnt_c > 0 ? 'Sim': 'Não'}</td>`
            $('#tbody_pdf').append(td)
    
        });

    }
    
    $('#btn_imprimir').on('click',(e) => {

        document.body.classList = ''
        $(".darkmode-background").remove()
        $(".darkmode-layer").remove()
        $(".darkmode-toggle").remove()
        darkModeProject('#fff')
        print()
    })

</script>