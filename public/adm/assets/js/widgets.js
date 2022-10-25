$(function () {
    /*
    DataTable
    */
    $.each($('table'), function () {
        let dataTable = $(this);
        dataTable.DataTable({
            responsive: true,
            lengthMenu: [6, 10, 25, 50, 75, 100],
            pageLength: 6,
            info: false,
            language: {
                "decimal": "",
                "emptyTable": "Sem dados disponíveis na tabela",
                "info": "Mostrando de _START_ a _END_ de _TOTAL_ resultados",
                "infoEmpty": "Mostrando de 0 a 0 de 0 resultados",
                "infoFiltered": "(filtrado de um total de _MAX_ resultados)",
                "lengthMenu": "Mostrar _MENU_ resultados",
                "loadingRecords": "Carregando...",
                "processing": "Processando...",
                "search": "",
                "searchPlaceholder": "Pesquisar",
                "zeroRecords": "Sua pesquisa não retornou resultados",
                "paginate": {
                    "first": "Primeira",
                    "last": "Última",
                    "next": "Próxima",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": ativar para classificar coluna ascendente",
                    "sortDescending": ": ativar para classificar coluna descendente"
                }
            }
        });
    });
});
