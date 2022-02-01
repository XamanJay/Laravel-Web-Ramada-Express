<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pago Exitoso</title>
</head>

<body>
    <div style="width: 600px;display:block;margin:0px auto;padding:16px;">
        <div style='width: 481px;'>
            <table>
                <thead>
                    <tr>
                        <th colspan='2'>
                            <img src='https://adharacancun.com/img/logos/adhara.png' style='width: 150px; text-align: center;'>
                            <div style='font-size: 24px;'>Pago exitoso</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>Hotel</b></td>
                        <td>Hotel Adhara Express Cancún</td>
                    </tr>
                    <tr>
                        <td><b>Nombre</b></td>
                        <td>{{ $huesped->nombre}} {{$huesped->apellidos}}</td>
                    </tr>
                    <tr>
                        <td><b>Email</b></td>
                        <td>{{ $response->email }}</td>
                    </tr>
                    <tr>
                        <td><b>Fecha de la transacción</b></td>
                        <td>{{ $response->date }} {{ $response->time }}</td>
                    </tr>
                    <tr>
                        <td><b>Referencia</b></td>
                        <td>{{ $response->reference }}</td>
                    </tr>
                    <tr>
                        <td><b>Número de autorización</b></td>
                        <td>{{ $response->auth }}</td>
                    </tr>
                    <tr>
                        <td><b>Tipo de Tarjeta</b></td>
                        <td>{{ $response->cc_type }}</td>
                    </tr>
                    <tr>
                        <td><b>Nº Tarjeta</b></td>
                        <td>*****{{ $response->cc_number }}</td>
                    </tr>
                    <tr>
                        <td><b>Importe</b></td>
                        <td>{{ $response->amount }} {{ $currency }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
