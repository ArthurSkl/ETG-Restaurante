<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<!-- <script src="../assets/js/script_tela_nao_conf.js"></script> -->

<!-- comentario aleatorio -->
<link rel="stylesheet" href="../assets/css/cadastrar_nao_conformidade.css">

<input type='hidden' value='$linha["gambiarra"]' name='gambiarra'>

<body>
    <!-- <i onclick="acao()" class="bi bi-x-circle"></i> -->

    <main class="mom darkModeEditReverseBackground">
        <div class="meio darkModeEditReverseBackground">
            <div class="pergunta darkModeEdit">
                <div class="pergunta_nao_conf">
                </div>
                <!-- <svg xmlns="http://www.w3.org/2000/svg" class="xis" viewBox="0 0 24 24" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg> -->
            </div> 
            <div class="descricao">
                    <textarea id="descricao_nao_conf"  name="descricao_nao_conf" class="descricao_nao_conf" placeholder="Descrição da não conformidade" cols="30" rows="10" autocomplete="off"></textarea>
                    <div class="container">
                        <div class = "upload-area">       
                            <i class="bi bi-camera"></i>
                        </div>
                    </div>
                </div>
            <div class="botoes">
                    <button class="botao-cancelar-submit"  onclick="cancelarNc()">CANCELAR</button>
                    <button type="submit" name="btn_submit_modal"  class="botao-confirmar-submit" id='btn_confirm_cad' >CONFIRMAR</button>                
            </div>
            
            <div class = "upload-img"></div>
                    <input type = "file" class = "visually-hidden" id = "upload-input">
        </div>
    </main>
</body>

