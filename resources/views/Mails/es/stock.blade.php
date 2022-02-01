<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sin Stock</title>
    <style type="text/css">
        @media(prefers-color-scheme:dark) {
            body {
                background-color: #312c32;
                color: white;
            }
        }

        @media(prefers-color-scheme:light) {
            body {
                background-color: #ffffff;
                color: rgb(0, 0, 0);
            }
        }

    </style>
</head>

<body>
    <div style="width: 600px;display:block;margin:0px auto;padding:16px;">
        <img style="display: block; width: 150px;margin-bottom:30px;"
            src="https://www.adharacancun.com/img/logos/adhara.png"
            alt="Adhara Express" />
        <h3 style="text-align: center;">No hay Habitaciones para el cuarto: <strong>{{ $habitacion->categoria->nombre_es }}</strong></h3>
    </div>
</body>

</html>
