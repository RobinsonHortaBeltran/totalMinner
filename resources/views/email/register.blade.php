<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Estilos específicos del encabezado */
        .header {
            text-align: center;
        }

        .header h1 {
            color: #333;
        }

        /* Estilos del contenido del correo */
        .content {
            padding: 20px;
            color: #555;
        }

        /* Estilos del botón */
        .button {
            text-align: center;
            margin-top: 20px;
        }

        .button a {
            display: inline-block;
            text-decoration: none;
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .button a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Registro Exitoso</h1>
        </div>
        <div class="content">
            <p>Estimado usuario,</p>
            <p>Su cuenta ha sido creada con éxito. A continuación, se proporcionan sus detalles de inicio de sesión:</p>
            <ul>
                <li>Usuario: <strong>{{$datos['email']}}</strong></li>
                <li>Contraseña: <strong>{{$datos['password']}}</strong></li>
            </ul>
            <p>Por favor, guárdelos en un lugar seguro. Puede iniciar sesión en cualquier momento utilizando estos datos.</p>
        </div>
        <div class="button">
            <a href="http://localhost:4200/#/login">Iniciar Sesión</a>
        </div>
    </div>
</body>
</html>
