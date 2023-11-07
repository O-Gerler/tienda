<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
  <title>Tienda</title>
</head>

<body>
  <h1>Hola mundo</h1>
  <button>Iniciar Sesion</button>
  <button>Registro</button>
  <button id="btnCambiarPagina">Cambiar de pagina</button>
  <script>
    const btnCambiarPagina = document.getElementById('btnCambiarPagina')

    btnCambiarPagina.addEventListener('click', () => {
      fetch('pagina2', {
          method: 'GET',
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          }
        })
        .then(response => {
          if (!response.ok) {
            throw new Error('Error en la solicitud');
          }
          return response.json();
        })
        .then(data => {
          // Maneja la respuesta de la ruta aquí
          console.log(data);
        })
        .catch(error => {
          // console.error('Error:', error);
        });
    });
  </script>
</body>

</html>