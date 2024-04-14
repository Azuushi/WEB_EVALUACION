var guardarDoctor = function(nombre, primerApellido, segundoApellido, cedula) {
    var data = {
        'nombre': nombre,
        'primerApellido': primerApellido,
        'segundoApellido': segundoApellido,
        'cedula': cedula
    };

    insertarDatos(data, 'insertarMedico.php', 'resultado');
};

// Función para obtener la lista de médicos
var getListaMedicos = function() {
    cargaHTML('templates/listamedicos.html', '#listaMedicos');
    var listaMed = obtenerDatos('php/listaMedicos.php', '');
    compilaHTML(listaMed, 'medicos', 'listaMedicos');
};

$(document).ready(function() {
    // Manejo del evento clic del botón de envío
    $('#btnEnviar').click(function(event) {
        // Detener el envío del formulario por defecto
        event.preventDefault();
        // Validar el formulario usando las clases de validación de Bootstrap
        var forms = document.getElementsByClassName('needs-validation');
        // Loop sobre los formularios para prevenir el envío si algún campo no está válido
        var validation = Array.prototype.filter.call(forms, function(form) {
            if (form.checkValidity() === false) {
                form.classList.add('was-validated');
                return false;
            } else {
                // Si el formulario es válido, llamar a la función guardarDoctor
                var nombre = $('#name').val();
                var primerApellido = $('#primerApellido').val();
                var segundoApellido = $('#segundoApellido').val();
                var cedula = $('#cedula').val();
                guardarDoctor(nombre, primerApellido, segundoApellido, cedula);
                return true;
            }
        });
    });
    
    // Llamar a la función getListaMedicos para cargar la lista de médicos al cargar el documento
    getListaMedicos();
});