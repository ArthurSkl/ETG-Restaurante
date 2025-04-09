<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETG</title>
    <link rel="stylesheet" href="pop-up-verification.css">
</head>
<body>

    <div class="container-pop-up-notificacao">
        <button type="submit" class="btn-pop-up-notificacao" id="submit-btn-notificacao" onclick="openPopupValidar()">Submit</button>
        <div class="popup-notificacao" id="popup-up-notificacao">
            <div class="div-img">
                <img src="../img/Check_ring.png" alt="carregando" id="img_check">
                <p>Alteração salva com sucesso! </p>
            </div>
            <div class="botao-padrao-ok">
                <a href="#"><input type="submit" class="botao-ok-submit" onclick="closePopupValidar()" value="OK"></a>
            </div>
        </div>
    </div>

    <script src="pop-up-verification.js"></script>
</body>
</html>