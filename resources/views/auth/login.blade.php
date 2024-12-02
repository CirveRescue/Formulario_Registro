<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo para la imagen de fondo */
        .bg-image {
            background-image: url('{{ asset('img/login2.jpg') }}'); /* Ruta de la imagen de fondo */
            background-size: cover;
            background-position: center;
            height: 100vh; /* Ocupa toda la altura de la ventana */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        /* Estilo para el contenedor del formulario */
        .login-card {
            background-color: rgba(255, 255, 255, 0.9); /* Fondo blanco semitransparente */
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(51, 23, 156, 0.5); /* Sombra con color #33179c */
            padding: 30px;
            width: 100%;
            max-width: 400px; /* Ancho máximo del formulario */
            margin: 20px; /* Agrega margen alrededor del formulario */
        }
        /* Estilo para el botón */
        .btn-custom {
            background-color: #54c98f; /* Color del botón */
            color: white;
        }
        .btn-custom:hover {
            background-color: #4dbb80; /* Color más oscuro al pasar el mouse */
        }
        /* Estilo para los encabezados */
        h4 {
            color: #33179c; /* Color del texto */
            margin-bottom: 20px; /* Espaciado inferior */
        }
        /* Estilo para los inputs */
        input {
            border-radius: 5px; /* Bordes redondeados */
            border: 10px solid #33179c; /* Borde de color morado */
            box-shadow: 0 2px 5px rgba(51, 23, 156, 0.6); /* Sombra de los inputs */
        }
        input:focus {
            border-color: #33179c; /* Color del borde al enfocarse */
            box-shadow: 0 2px 5px rgba(51, 23, 156, 1); /* Sombra más intensa al enfocarse */
            outline: none; /* Quitar el contorno predeterminado */
        }
    </style>
</head>
<body>
    <div class="bg-image">
        <div class="login-card text-center">
            <img src="{{ asset('img/logoTsj.png') }}" alt="Logo" class="mb-3" style="width: 60%; height: auto;"> <!-- Ajusta la imagen según tus necesidades -->
            <h4>Iniciar sesión</h4>
            <p>Inicia sesión con tu matrícula</p>

            <!-- Mensaje de error si es necesario -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulario para ingresar matrícula -->
            <form action="{{ route('auth.login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="matricula" placeholder="Matrícula" required>
                </div>
                <button type="submit" class="btn btn-custom btn-block">INGRESAR</button>
            </form>
        </div>
    </div>

    <!-- Enlace a Bootstrap JS y dependencias (opcional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
