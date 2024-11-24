<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Informe de Salidas</title>
</head>
<body>
    <!-- Logo -->
    <img src="{{ public_path('images/logo2.0.jpg') }}" alt="Logo" style="width: 90px; height: 95px;">

    <!-- Título -->
    <h1 style="text-align: center; margin-top: -65px; font-family: Arial, sans-serif; color: #0C0032;">
        Informe de Salidas
    </h1>

    <!-- Tabla -->
    <table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif; margin-top: 20px; border: 1px solid #ddd;">
        <thead>
            <tr>
                <th style="background-color: #040c50; color: white; padding: 10px; border: 1px solid #ddd; text-align: left;">
                    Producto
                </th>
                <th style="background-color: #040c50; color: white; padding: 10px; border: 1px solid #ddd; text-align: left;">
                    Cantidad
                </th>
                <th style="background-color: #040c50; color: white; padding: 10px; border: 1px solid #ddd; text-align: left;">
                    Motivo
                </th>
                <th style="background-color: #040c50; color: white; padding: 10px; border: 1px solid #ddd; text-align: left;">
                    Fecha
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($salidas as $salida)
                <tr>
                    <td style="padding: 8px; border: 1px solid #ddd; text-align: left;">
                        {{ $salida->producto->nombre }}
                    </td>
                    <td style="padding: 8px; border: 1px solid #ddd; text-align: left;">
                        {{ $salida->cantidad }}
                    </td>
                    <td style="padding: 8px; border: 1px solid #ddd; text-align: left;">
                        {{ $salida->motivo }}
                    </td>
                    <td style="padding: 8px; border: 1px solid #ddd; text-align: left;">
                        {{ $salida->fecha }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
