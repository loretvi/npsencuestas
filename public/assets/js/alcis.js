$(document).ready(function() {
    $('select.select2').multiselect({
        nonSelectedText: 'Selecciona una opción',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth: '100%',
        includeSelectAllOption: true,
        selectAllText: 'Seleccionar todo',
        allSelectedText: 'Todos seleccionados',
        nSelectedText: 'seleccionados'
    });
});