
  <!-- <link rel="stylesheet" href="pop_ups_mural_recado.css"> -->
  
  
 
  <main class="main-pop-up-thays">
    <!-- <div class="btn-pop">
      <button class="btn-popup-thays" onclick="openPopup_recado()">Abrir Pop-up</button>
    </div> -->

    <section>
      <!-- Pop-up -->
      <form method="post" class="overlay_recado" id="overlay_recado">
        <div class="popup-mural-recado">
          <div class="texto-recado-mural">
            <p class="edita-recado-mural">Novo recado:</p>
          </div>
          <div class="div-pop">
              <textarea maxlength="255"  placeholder="Digite seu recado: " name="descricao_sala" id="texto_novo_recado" cols="90" rows="20" class="text-descricao-pop-up"></textarea>
          </div>
          <section class="container-pop-up-botaoes">
            <div class="botao-padrao-cancelar">
              <input type="reset" class="botao-cancelar-submit"  value="CANCELAR" onclick="closePopup_recado()">
            </div>
            <div class="botao-padrao-confirmar">
              <input type="reset" class="botao-confirmar-submit" name="btn_confirmar_submit" value="CONFIRMAR" onclick="cadastrarRecado()">
            </div>
          </section>
      
        </div>
      </form>
    </section>
  </main>

  

  <!-- <script src="pop_ups_mural_recado.js"></script> -->
