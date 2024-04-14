var insertarDatos = function(data,php,selector){
        $.ajax({
                data:  data, //{"variable1": variable1, "variable2":variable2}
                url:   "php/"+php, //archivo que recibe la peticion
                type:  'post', //método de envio
                
        });

        $('#'+selector).html('<h2>Datos Guardados</h2>');
}

var obtenerDatos = function(url,data){
        var lista;
        $.ajax({
            url: url,
            type: 'POST',
            data:  data,
            async: false, 
            dataType: 'json',
            success: function(data) {
                lista = data;
            },
            error: function(error) {
                lista = error;
            }
        });

        return lista;
}