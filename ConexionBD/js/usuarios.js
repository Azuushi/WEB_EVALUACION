var guardarUsuario = function(usuario, contrasena, nivel) {
    var data = {
        'usuario': usuario,
        'contrasena': contrasena,
        'nivel': nivel
    };

    // insertarDatos es una función que se espera que inserte los datos y llame a una función de devolución de llamada con el resultado
    insertarDatos(data, 'insertarUsuarios.php', 'resultado');
};

// Función para obtener la lista de médicos
var getListaUsuarios = function() {
    cargaHTML('templates/listausuarios.html', '#listaUsuarios');
    var listaUsu = obtenerDatos('php/listaUsuarios.php', '');
    compilaHTML(listaUsu, 'usuarios', 'listaUsuarios');
};

$(document).ready(function() {
    // Manejo del evento clic del botón de envío
    $('#btnCrearUsuario').click(function(event) {
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
                // Si el formulario es válido, llamar a la función guardarUsuario
                var usuario = $('#usuario').val();
                var contrasena = $('#contrasena').val();
                var nivel = $('#nivel').val();
                guardarUsuario(usuario, contrasena, nivel);
                return true;
            }
        });
    });

    // Llamar a la función getListaPacientes para cargar la lista de médicos al cargar el documento
    getListaUsuarios();
});
