$(document).ready(function() {
    $('#formAplicante').submit(function(e) {
        e.preventDefault();
        
        const data = {
            nombre: $('#nombre').val(),
            edad: $('#edad').val(),
            sueldo: $('#sueldo').val()
        };

        $.ajax({
            url: 'procesar.php',
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(res) {
                Swal.fire({
                    icon: res.status ? 'success' : 'error',
                    title: res.status ? 'Perfil Aceptado' : 'Perfil No Apto',
                    text: res.mensaje,
                    confirmButtonColor: '#007bff'
                });
            }
        });
    });
});