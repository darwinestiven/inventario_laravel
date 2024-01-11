@extends('adminlte::page')

@section('title', 'Dashboard de Inventario - El Granero Don Lucho')

@section('content_header')
    <h1 style="text-align: center; color: #307095; font-size: 2.5em;">Inventario Granero Don Lucho</h1>
@stop

@section('content')
<div class="inventory-intro">
    <div class="image-container" style="text-align: center; margin-bottom: 2em;">
        <img src="{{ asset('/img/presentacion.png') }}" alt="El Granero Don Lucho Inventory Software" style="max-width: 65%; height: auto;">
    </div>
    <div class="company-info" style="text-align: center;">
        <h2 style="color: #307095; font-size: 2em; margin-bottom: 0.5em;">Bienvenido al Inventario de El Granero Don Lucho</h2>
        <p style="font-size: 1.2em; line-height: 1.5;">El granero Don Lucho es una tienda de abarrotes ubicada en la ciudad de Ipiales, conocida por trabajar con productos tanto nacionales como internacionales, incluyendo productos ecuatorianos. Nos dedicamos principalmente a surtir los hogares ipialeños, ofreciendo una gran variedad de productos de alta calidad y a muy buen precio.</p>
        <p style="font-size: 1.2em; line-height: 1.5;">A través de este panel, podrás gestionar eficientemente todos los recursos y asegurar la máxima productividad de tu granero, manteniendo un control detallado del inventario y facilitando la operación diaria de la empresa.</p>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    {{-- Agrega tus estilos personalizados aquí o asegúrate de que admin_custom.css contenga los estilos necesarios --}}
    <style>
        /* Estilos personalizados */
        .company-info h2, .company-info p {
            color: #333; /* Color de texto */
        }
        .company-info p {
            font-size: 1.1em; /* Tamaño de texto */
            margin-top: 1em;
        }
        /* Aquí puedes añadir más estilos si lo necesitas */
    </style>
@stop

@section('js')
    <script> console.log('¡Sistema de Inventario El Granero Don Lucho cargado!'); </script>
@stop
