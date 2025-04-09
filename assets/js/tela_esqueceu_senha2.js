var interval; // Variável global para armazenar o intervalo do timer

window.onload = function() {
  startTimer(); // Inicia o timer automaticamente quando a página carrega
};

function startTimer() {
  var timer = 60; //  minuto em segundos
  var display = document.getElementById('timer');
  var actionBtn = document.getElementById('actionBtn');

  actionBtn.disabled = true; // Desabilita o botão de ação inicialmente

  interval = setInterval(function() {
    var minutes = Math.floor(timer / 60);
    var seconds = timer % 60;

    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;

    display.textContent = minutes + ':' + seconds;

    if (--timer < 0) {
      clearInterval(interval);
      actionBtn.disabled = false; // Habilita o botão de ação quando o tempo acaba
      actionBtn.style.display = '';
    }
  }, 1000);

  if(--timer > 0){
   actionBtn.style.display = 'none';

   }
}

function performAction() {
  clearInterval(interval); // Limpa o intervalo anterior (se houver)
  startTimer(); // Reinicia o timer ao clicar no botão "Clique-me"
}