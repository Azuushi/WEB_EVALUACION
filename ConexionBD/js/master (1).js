$(document).ready(function() {
    // Manejo del evento clic del botón de envío
    $('#btnEnviar').click(function(event) {
        // Detener el envío del formulario por defecto
        event.preventDefault();
        // Llamar a la función iniciarSesion
        iniciarSesion();
    });
});

// Función para iniciar sesión
var iniciarSesion = function(){
    if ($('#usuario').val() != '' && $('#contrasena').val() !='') {
        var data = {
            'user': $('#usuario').val(),
            'pswd': $('#contrasena').val()
        };

        // Realizar la llamada a la función que maneja la sesión
        var datosSesion = obtenerDatos('php/inicioSesion.php', data);

        // Hacer algo con los datos de sesión obtenidos, como redireccionar a otra página
        // o mostrar un mensaje al usuario
        
        // Por ejemplo, redirigir a la página de inicio si la sesión fue iniciada con éxito
        if (datosSesion) {
            window.location.href = 'menu.html';
        } else {
            // Mostrar un mensaje de error si la sesión no pudo ser iniciada
            alert('Error: Nombre de usuario o contraseña incorrectos.');
        }
    } else {
        // Mostrar un mensaje si los campos de usuario y contraseña están vacíos
        alert('Por favor, ingrese el nombre de usuario y la contraseña.');
    }
};
