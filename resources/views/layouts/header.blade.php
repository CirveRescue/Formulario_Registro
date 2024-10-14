<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Formulario de Solicitud Vehicular')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS for styling -->
    <style>
        /* Estilos para los campos del formulario */
        .form-control {
            border-color: #33179c; /* Borde morado */
        }
        .form-control:focus {
            border-color: #33179c;
            box-shadow: 0 0 5px rgba(111, 66, 193, 0.5); /* Añadir brillo morado en foco */
        }

        /* Borde morado alrededor del formulario */
        .form-section {
            border: 2px solid #33179c; /* Borde morado */
            box-shadow: 0 0 15px rgba(111, 66, 193, 0.2); /* Sombra alrededor del formulario */
            padding: 20px;
            border-radius: 10px; /* Bordes redondeados */
        }



        /* Footer fijo al fondo */
        footer {
            margin-top: auto; /* Empuja el footer al final */
            text-align: center;
            background-color: #33179c; /* Color morado para el fondo del footer */
            color: white;
            padding: 10px 0;
            width: 100%; /* Asegura que ocupe todo el ancho de la página */
        }

        /* Elimina el margen inferior del contenido */
        .container {
            flex-grow: 1; /* Asegura que el contenido ocupe el espacio disponible sin dejar espacio en blanco */
        }

    </style>
</head>
<body>

    <header>
        <div class="container">
            <div class="text-center">
                <img src="{{ asset('imag/portada.jpg') }}" alt="Institución" class="image-header img-fluid">
            </div>
        </div>
        <br>

    </header>
