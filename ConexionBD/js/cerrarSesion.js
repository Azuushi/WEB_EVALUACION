    function cerrarSesion() {
        // Limpiar cualquier información de sesión
        localStorage.removeItem('usuario'); // Suponiendo que 'usuario' es la clave donde guardas información del usuario
        
        // Redireccionar al usuario a la página de inicio de sesión
        window.location.href = "index.html";
    }

    history.replaceState(null, null, window.location.href);