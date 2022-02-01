@extends('layouts.app')
@section('content')






<div class="container" id="pays" style="margin-top:10px">
    <form action=" {{ route('ultimate',['locale'=>App::getLocale()]) }}    " method="POST" id="reservations_ultimate" >
        @csrf   
    
        <div class="Space">
            <div class="row">
                <div class="col-sm-12">
                    <p><strong>@lang('main.reservations-item023')</strong> {{ $habitacioness }} &nbsp; <strong>@lang('main.reservations-item024')</strong> {{ $_tot_adultos }} &nbsp; <strong>@lang('main.reservations-item025')</strong> {{ $_tot_infantes  }}</p>
                    <p><strong>@lang('main.reservations-item026')</strong> {{ $nochess }}</p>
                    <p><strong>@lang('main.reservations-item029')</strong> $ {{ $gtotall  }}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p><strong>@lang('main.reservations-item027')</strong>  {{ $day1 }}/{{$month_label1 }}/{{ $year1 }}</p>
                    <p><strong>@lang('main.reservations-item028')</strong> {{ $day2 }}/{{$month_label2 }}/{{ $year2 }}</p>
                    
                </div>
                <div class="col-sm-6">
                        <p>  </p>
                </div>
        </div>        
            </div>
        <div class="row">
            <div class="col-sm-12">
                <hr>
                <p>@lang('main.reservations-item008')</p>
            </div>
        </div>

        <div class="Space">
            <div class="row " >
                <div class="col-sm-6">
                    <p>@lang('main.reservations-item010') <input type="text" name="nombre" class="form-control" onfocus="onloadjay()" > </p>
                </div>
                <div class="col-sm-6">
                    <p>@lang('main.reservations-item011') <input type="text" name="apellidos" class="form-control"> </p>
                </div>
            </div>
        
        <div class="row">
            <div class="col-sm-6">
                <p>@lang('main.reservations-item013') <input type="text" name="email" class="form-control"> </p>
            </div>
            <div class="col-sm-6">
                <p>@lang('main.reservations-item013')  <input type="text" name="eeemail" class="form-control form-control-sm"> </p>
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch2" name="isClub" value="1">
                <label class="custom-control-label" for="customSwitch2">@lang('main.reservations-item007')</label>
            </div>
        </div>

            





        </div>
        
            <div class="row">
                <div class="col-sm-6">
                
                    <p>@lang('main.reservations-item014')<input type="text" name="ciudad" class="form-control"> </p>
                </div>
                <div class="col-sm-6">
                    
                    <p>@lang('main.reservations-item015') <input type="text" name="estado_region" class="form-control"></p>
                    
                </div>
            </div>
        
        <div class="row">
            <div class="col-sm-6">
                <p>@lang('main.reservations-item016')  
                <select name="pais_id" class="form-control">
                        <option value="145" selected> México </option>
                        <option value="240"> USA </option>
                @foreach ($paiss as $paiss )    
                        <option value="{{ $paiss->id }}">{{ $paiss->nombre }}</option>
                @endforeach
                </select>
                </p>
            </div>

            <div class="col-sm-6">
                <p >@lang('main.reservations-item017')<input type="text" name="telefono" class="form-control form-control-sm">   </p>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1" name="isWhatsApp" value="1">
                    <label class="custom-control-label" for="customSwitch1">@lang('main.reservations-item009')</label>
                </div>
            </div>

        </div>
        
            <div class="row">
                <div class="col-sm-12">
                    <p>@lang('main.reservations-item018') <textarea name="comentarios" id="" cols="30" rows="5" style="resize: none;" class="form-control"></textarea>
                    
                    </p>
                </div>
            </div>
        </div>    
        <div class="row">
            <div class="col-sm-1">
                <p><input type="checkbox" name="condiciones" value="1" class="form-control" id="TC" onclick="activatejay()"> </p>
            </div>
            <div class="col-sm-11">
                <p class="manota"> @lang('main.reservations-item019a') <a class="opt-ft-ok " data-toggle="modal" data-target="#myModal">@lang('main.body-item35')</a>  @lang('main.reservations-item019b')</p>
                <p>@lang('main.reservations-item020')</p>
            </div>
        </div>
        <div class="Space">
            <div class="row">
                <div class="col-sm-4">
                    <br>
                    <p class="center"><input type="radio" name="metodo_pago"  value="1" class="form-control" checked> </p>
                    <p class="center"> <img src="{{ asset('images/cotizacion/tarjeta.png') }}" width="200" height="70" title="Magica"> </p>
                </div>
                <div class="col-sm-4">
                    <br>
                    <p class="center"><input type="radio" name="metodo_pago"  value="2" class="form-control" > </p>
                    <p class="center"> <img src="{{ asset('images/cotizacion/paypal.png') }}" width="150" height="40" title="Magica"> </p>
                </div>
                <div class="col-sm-4">
                    <br>
                    <p class="center"><input type="radio" name="metodo_pago"   value="3" class="form-control"> </p>
                    <p class="center">@lang('main.reservations-item021') </p>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <hr>
                    <p class="center"><input type="submit" value="@lang('main.reservations-item022')" id="activate" class="btn btn-danger"> </p>
                    <input type="hidden" name="habitaciones"    value="{{ $habitacioness }}">  
                    <input type="hidden" name="checkIn"         value="{{ $checkInn }}">  
                    <input type="hidden" name="checkOut"        value="{{ $checkOutt }}">  
                    <input type="hidden" name="precio"          value="{{ $tarifa_basee }}">
                    <input type="hidden" name="currency"        value="{{ $currencyy }}">
                    <input type="hidden" name="noches"          value="{{ $nochess }}">
                    @foreach ($adultoss as $adulto)
                                    
                        <input type="hidden" name="adultoss[]" value="{{ $adulto }}">
                    @endforeach
                    @foreach ($infantess as $infante)
                        <input type="hidden" name="infantess[]" value="{{ $infante }}">
                    @endforeach
                    <input type="hidden" name="plataforma"      value="WEB">
                    <input type="hidden" name="habitacion_id"   value="{{ $habitacion_idd }}">
                </div>
            </div>
        </div>   
    </form>
        



</div>

    <script>
        function onloadjay(){
            document.getElementById('activate').disabled=true;
            document.getElementById('TC').disabled=false
        }
        function activatejay()
            {
                document.getElementById('activate').disabled=false;
                document.getElementById('TC').disabled=true;
            }
    </script>

@endsection
