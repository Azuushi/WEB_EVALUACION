var guardarPaciente = function(nombre, primerApellido, segundoApellido, peso, altura, fechaNacimiento, genero, direccion, numTelefono, correo, tipoSangre, sexo) {
    var data = {
        'nombre': nombre,
        'primerApellido': primerApellido,
        'segundoApellido': segundoApellido,
        'peso': peso,
        'altura': altura,
        'fechaNacimiento': fechaNacimiento,
        'genero': genero,
        'direccion': direccion,
        'numTelefono': numTelefono,
        'correo': correo,
        'tipoSangre': tipoSangre,
        'sexo': sexo
    };

    // insertarDatos es una función que se espera que inserte los datos y llame a una función de devolución de llamada con el resultado
    insertarDatos(data, 'insertarPacientes.php', 'resultado');
};

// Función para obtener la lista de médicos
var getListaPacientes = function() {
    cargaHTML('templates/listapacientes.html', '#listaPacientes');
    var listaPac = obtenerDatos('php/listaPacientes.php', '');
    compilaHTML(listaPac, 'pacientes', 'listaPacientes');
};

$(document).ready(function() {
    $('#btnCrearPaciente').click(function(event) {
        event.preventDefault();

        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            if (form.checkValidity() === false) {
                form.classList.add('was-validated');
                return false;
            } else {
                var nombre = $('#nombre').val();
                var primerApellido = $('#primerApellido').val();
                var segundoApellido = $('#segundoApellido').val();
                var peso = $('#peso').val();
                var altura = $('#altura').val();
                var fechaNacimiento = $('#fechaNacimiento').val();
                var genero = $('#genero').val();
                var direccion = $('#direccion').val();
                var numTelefono = $('#numTelefono').val();
                var correo = $('#correo').val();
                var tipoSangre = $('#tipoSangre').val();
                var sexo = $('#sexo').val();
                guardarPaciente(nombre, primerApellido, segundoApellido, peso, altura, fechaNacimiento, genero, direccion, numTelefono, correo, tipoSangre, sexo);
                return true;
            }
        });
    });

    // Llamar a la función getListaPacientes para cargar la lista de médicos al cargar el documento
    getListaPacientes();
});

