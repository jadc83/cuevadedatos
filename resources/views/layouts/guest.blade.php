<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My Application') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-image: url('/images/nyar.png');
            background-size: contain; /* Ajustar para que encaje en el viewport */
            background-position: center; /* Centrar la imagen */
            background-repeat: no-repeat; /* Evitar repetir */
            height: 100vh; /* Altura completa del viewport */
            display: flex; /* Usar flexbox para centrar */
            justify-content: center; /* Centrar horizontalmente */
            align-items: center; /* Centrar verticalmente */
            margin: 0; /* Eliminar margen por defecto */
        }
        .form-container {
            width: 90%; /* Ancho responsivo */
            max-width: 400px; /* Ancho máximo para pantallas grandes */
            padding: 20px; /* Espaciado interno */
            border-radius: 10px; /* Bordes redondeados */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Sombra suave para profundidad */
            background-color: transparent; /* Fondo completamente transparente */
        }
        h2 {
            text-align: center; /* Centrar el texto del encabezado */
            font-size: 1.5rem; /* Tamaño de fuente responsivo */
            margin-bottom: 20px; /* Espaciado debajo del encabezado */
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">

    <div class="form-container">
        <h2>Bienvenido a la cueva de los datos</h2>
        {{ $slot }}
    </div>

</body>
</html>
