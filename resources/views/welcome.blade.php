@extends('layouts/app' )


@section('content')

    <h1>hola mundo</h1>
    <form action="{{ route('paypal.payment') }}" method="POST">
        @csrf
        <button type="submit">Holis</button>
    </form>

    <form action="{{ route('store.reserva') }}" method="post">
        @csrf
        <label >Nombre</label><br>
        <input type="text" name="nombre" value="Juan Pablo">
        <label >Apellidos</label><br>
        <input type="text" name="apellidos" value="Gomez Tejeda">
        <label >Email</label><br>
        <input type="email" name="email" value="juan.alucard.02@gmail.com">
        <label >Telefono</label><br>
        <input type="number" name="telefono" value=9983208924>

        <p>Es numero de WhatsApp</p>
        <input type="radio" id="html" name="isWhatsApp" value="TRUE">
        <label for="html">Si</label><br>
        <input type="radio" id="css" name="isWhatsApp" value="TRUE">
        <label for="css">No</label><br>

        <p>Eres cliente ClubEstrella</p>
        <input type="radio"  name="isClub" value="TRUE">
        <label >Si</label><br>
        <input type="radio"  name="isClub" value="TRUE">
        <label >No</label><br>

        <label >Ciudad</label><br>
        <input type="text" name="ciudad" value="Cancun">
        <label >Pais</label><br>
        <input type="number" name="pais" value=1>
        <label >Habitacion</label><br>
        <input type="number" name="habitacion" value=1>

        <label >Pago Destino</label><br>
        <input type="number" name="pais" value=0>

        <label >CheckIn</label><br>
        <input type="text" name="checkIn" value="2021-11-23">
        <label >CheckOut</label><br>
        <input type="text" name="checkOut" value="2021-11-27">
        <label >Plataforma</label><br>
        <input type="text" name="plataforma" value="web">
        <label >Noches</label><br>
        <input type="number" name="noches" value=4>
        <label >Habitaciones</label><br>
        <input type="number" name="habitaciones" value=1>
        <label >Habitacion_id</label><br>
        <input type="number" name="habitacion_id" value=1>
        <label >Adultos</label><br>
        <input type="number" name="adultos" value=2>
        <label >Infantes</label><br>
        <input type="number" name="infantes" value=2>
        <label >Precio</label><br>
        <input type="number" name="precio" value=14567>
        <label >cuurency</label><br>
        <input type="text" name="currency" value='MXN'>
        <label >Metodo pago</label><br>
        <input type="text" name="metodo_pago" value='paypal'>
        <button type="submit">Enviar</button>

    </form>


@endsection
