    // Selecione o checkbox principal por ID
    const mais_usados_administrador = document.getElementById("mais_usados_administrador");
    const mais_usados_docente = document.getElementById("mais_usados_docente");
    const mais_usados_logistica = document.getElementById("mais_usados_logistica");
    
  
    var array_mais_usados = [mais_usados_administrador, mais_usados_docente, mais_usados_logistica]
  
    // Selecione as checkboxes a serem preenchidas por ID
    const checkbox1 = document.getElementById("gerenciar_salas");
    const checkbox2 = document.getElementById("gerenciar_perguntas");
    const checkbox3 = document.getElementById("gerenciar_checklists");
    const checkbox4 = document.getElementById("gerenciar_recados");
    const checkbox5 = document.getElementById("gerenciar_notificacoes");
    const checkbox6 = document.getElementById("realizar_checklist");
    const checkbox7 = document.getElementById("realizar_nao_conformidade");
    const checkbox8 = document.getElementById("gerenciar_usuarios");
    const checkbox9 = document.getElementById("gerenciar_perfis");
    const checkbox10 = document.getElementById("ver_relatorios");

    

    //Verifica se algum dos mais usados ja esta checado


    mais_usados_administrador.addEventListener("change", function() {
        
        if (mais_usados_administrador.checked)
        {
            checkbox1.checked = true;
            checkbox2.checked = true;
            checkbox3.checked = true;
            checkbox4.checked = true;
            checkbox5.checked = true;
            checkbox6.checked = true;
            checkbox7.checked = true;
            checkbox8.checked = true;
            checkbox9.checked = true;
            checkbox10.checked = true;
            mais_usados_docente.checked = false;
            mais_usados_logistica.checked = false;
        }
        else
        {
            checkbox1.checked = false;
            checkbox2.checked = false;
            checkbox3.checked = false;
            checkbox4.checked = false;
            checkbox5.checked = false;
            checkbox6.checked = false;
            checkbox7.checked = false;
            checkbox8.checked = false;
            checkbox9.checked = false;
            checkbox10.checked = false;

        }
    });

    mais_usados_docente.addEventListener("change", function() {
        if (mais_usados_docente.checked)
        {
            checkbox1.checked = false;
            checkbox2.checked = false;
            checkbox3.checked = false;
            checkbox4.checked = false;
            checkbox5.checked = false;
            checkbox7.checked = false;
            checkbox10.checked = false;

            checkbox6.checked = true;
            mais_usados_administrador.checked = false;
            mais_usados_logistica.checked = false;
            
        }
        else
        {
            checkbox6.checked = false;
            checkbox10.checked = false;
        }
    });

    mais_usados_logistica.addEventListener("change", function() {
        if (mais_usados_logistica.checked)
        {
            checkbox1.checked = false;
            checkbox2.checked = false;
            checkbox3.checked = true;
            checkbox6.checked = false;
            checkbox10.checked = false;

            checkbox4.checked = true;
            checkbox5.checked = true;
            checkbox7.checked = true;
            mais_usados_docente.checked = false;
            mais_usados_administrador.checked = false;
        }
        else
        {
            checkbox4.checked = false;
            checkbox3.checked = false;
            checkbox5.checked = false;
            checkbox7.checked = false;
            checkbox10.checked = false;

        }
    });

