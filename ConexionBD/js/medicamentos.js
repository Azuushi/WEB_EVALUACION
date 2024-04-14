var guardarMedicamento = function(nombreMedicamento, principioActivo, formaFarmaceutica, precioUnitario, descripcion, contraindicaciones, stock) {

    var data = {
        'nombreMedicamento': nombreMedicamento,
        'principioActivo': principioActivo,
        'formaFarmaceutica': formaFarmaceutica,
        'precioUnitario': precioUnitario,
        'descripcion': descripcion,
        'contraindicaciones': contraindicaciones,
        'stock': stock
    };

    // insertarDatos es una función que se espera que inserte los datos y llame a una función de devolución de llamada con el resultado
    insertarDatos(data, 'insertarMedicamento.php', 'resultado');
};

// Función para obtener la lista de médicos
var getListaMedicamentos = function() {
    cargaHTML('templates/listamedicamentos.html', '#listaMedicamentos');
    var listaMed = obtenerDatos('php/listaMedicamentos.php', '');
    compilaHTML(listaMed, 'medicamentos', 'listaMedicamentos');
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
                // Si el formulario es válido, llamar a la función guardarMedicamento
                var nombreMedicamento = $('#nombreMedicamento').val(); // Corregido aquí
                var principioActivo = $('#principioActivo').val();
                var formaFarmaceutica = $('#formaFarmaceutica').val();
                var precioUnitario = $('#precioUnitario').val();
                var descripcion = $('#descripcion').val();
                var contraindicaciones = $('#contraindicaciones').val();
                var stock = $('#stock').val();
                guardarMedicamento(nombreMedicamento, principioActivo, formaFarmaceutica, precioUnitario, descripcion, contraindicaciones, stock);
                return true;
            }
        });
    });

    // Llamar a la función getListaMedicamentos para cargar la lista de médicos al cargar el documento
    getListaMedicamentos();
});