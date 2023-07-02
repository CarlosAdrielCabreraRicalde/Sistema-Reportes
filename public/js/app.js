$(function() {
    // Asignar evento de cambio al elemento con ID "list-of-projects"
    $('#list-of-projects').on('change', onNewProjectSelected);
});

function onNewProjectSelected() {
    // Obtener el ID del proyecto seleccionado
    var project_id = $(this).val();
    
    // Redireccionar a la URL correspondiente con el ID del proyecto en la ruta
    location.href = '/seleccionar/proyecto/' + project_id;
}
