$(function() {
    // Asignar evento de clic a los elementos con atributo data-category
    $('[data-category]').on('click', editCategoryModal);
    
    // Asignar evento de clic a los elementos con atributo data-level
    $('[data-level]').on('click', editLevelModal);
});

function editCategoryModal() {
    // Obtener el ID de la categoría desde el atributo data-category
    var category_id = $(this).data('category');
    
    // Asignar el ID al campo de entrada del modal
    $('#category_id').val(category_id);
    
    // Obtener el nombre de la categoría desde el elemento HTML
    var category_name = $(this).parent().prev().text();
    
    // Asignar el nombre al campo de entrada del modal
    $('#category_name').val(category_name);
    
    // Mostrar el modal de edición de categoría
    $('#modalEditCategory').modal('show');
}

function editLevelModal() {
    // Obtener el ID del nivel desde el atributo data-level
    var level_id = $(this).data('level');
    
    // Asignar el ID al campo de entrada del modal
    $('#level_id').val(level_id);
    
    // Obtener el nombre del nivel desde el elemento HTML
    var level_name = $(this).parent().prev().text();
    
    // Asignar el nombre al campo de entrada del modal
    $('#level_name').val(level_name);
    
    // Mostrar el modal de edición de nivel
    $('#modalEditLevel').modal('show');
}