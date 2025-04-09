$("#nome1").autocomplete({
    source: function(request, response) {
        // Fetch data
        $.ajax({
            url: "../app/Ajax/cadastrar_notificacao.php",
            type: 'GET',
            dataType: "json",
            success: function(data) {
                var term = request.term.toLowerCase();
                var filteredData = $.grep(data, function(value) {
                    return value.nome.toLowerCase().indexOf(term) !== -1 ||
                           value.email.toLowerCase().indexOf(term) !== -1;
                });

                var aData = $.map(filteredData, function(value, index) {
                    return {
                        id: value.id,
                        label: value.nome + ' (' + value.email + ')', // Nome e email no mesmo seletor
                        value: value.email // Utilize 'value' para o valor a ser enviado
                    };
                });
                console.log(aData)
                response(aData); // Adicionado para retornar os dados para o autocompletar
            },
            error: function(xhr, status, error) {
                console.error("Erro na requisição AJAX: ", status, error);
            }
        });
    },
    minLength: 2, // Defina um comprimento mínimo para acionar a pesquisa
    select: function(event, ui) {
        // Preencher o input com o valor do item selecionado
        $("#email").val(ui.item.value);
    }
});
