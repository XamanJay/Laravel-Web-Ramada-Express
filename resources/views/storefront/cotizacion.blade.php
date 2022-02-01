@extends('layouts.app')
@section('content')



<script> 
    var isMobile = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/);
    if(isMobile) {	 // document.write("Version mobile ٩͡[๏̯͡๏]۶");  
                        document.write("<div id='main-img' style='margin-top:0px'>");
                        document.write("<img src='{{ asset('images/cotizacion/HeaderCotizacionMob.jpg') }}' alt='Adhara Express' style='width:100%'  > ");
    }
    else {  

            document.write("<div id='main-img' style='margin-top:0px'>");
            document.write("<img src='{{ asset('images/cotizacion/HeaderCotizacion.jpg') }}' alt='Adhara Express' style='width:100%'  > ");
        }
</script> 







                

                <!-- INICIO DEL BUSCADOR -->
            <div class="row" id="delimiter-box">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 offset-md-2 offset-lg-2 offset-xl-2">
                    
                    <form action="  {{ route('booking',['locale'=>App::getLocale()]) }} " method="POST" id="sendData"> 
                    @csrf
                    
                        <div class="row" id="box-search">
                            <div class="col-12 col-sm-6 col-md-4-col-lg-4 col-xl-4 input-group">
                                <div class="input-group-prepend">
                                    <img src="{{ asset('images/icons/buscador/calendar.png')}}" class="calendar-b" id="calendar" alt="">
                                </div>
                                <input type="text" class="form-control date-input" placeholder="@lang('main.mini-banner2-09')" id="start" autocomplete="off" aria-label="Fechas a reservar" name="empieza">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 input-group input-guest">
                                <div class="input-group-prepend">
                                    <img src="{{ asset('images/icons/buscador/guests.png') }}" class="icon-search" alt="">
                                </div>
                                <input type="text" class="form-control input-style" name="paxs_rooms" id="pax_rooms" readonly placeholder="1pax, 1hab">
                                <div class="layout-room">
                                    <div class="rooms_all">
                                        <div id="room_1" class="pax-room">
                                            <div class="header.room">
                                                <span><img src="{{ asset('images/icons/buscador/bed.png') }}" alt="Room.1" class="bed-room" style="width: 25px;">@lang('main.mini-banner2-03') 1</span>
                                            </div>
                                            <div class="body room">
                                                <div class="room_feature" id="room_1_adult">
                                                    @lang('main.mini-banner2-04')
                                                    <div class="controls-box room_adult">
                                                        <button class="btn-controls down"><img src="{{ asset('images/icons/buscador/minus.png') }}" alt=""></button>
                                                        <span class="total-pax">1</span>
                                                        <button class="btn-controls up"><img src="{{ asset('images/icons/buscador/plus.png') }}" alt=""></button>
                                                    </div>
                                                </div>
                                                <div class="room_feature" id="room_1_kid">
                                                    @lang('main.mini-banner2-05')
                                                    <div class="controls-box room_kid">
                                                        <button class="btn-controls down"><img src="{{ asset('images/icons/buscador/minus.png') }}" alt=""></button>
                                                        <span class="total-pax">0</span>
                                                        <button class="btn-controls up"><img src="{{ asset('images/icons/buscador/plus.png') }}" alt=""></button>
                                                    </div>
                                                </div>
                                                <div class="room_feature pax_Age" id="room_1_age">
                                                    <p style="font-size: 11px;text-align: center;">@lang('main.mini-banner2-08')</p>
                                                    
                                                </div>
                                                <div class="room_feature" id="room_apply">
                                                    <span class="label-plus">+ @lang('main.mini-banner2-03')</span>
                                                    <button class="plus-room" style="float:right;">@lang('main.mini-banner2-02')</button>
                                                </div>
                                            </div>   
                                        </div>
                                        <div id="room_2" class="pax-room">
                                            <div class="header.room">
                                                <span><img src="{{ asset('images/icons/bed.png') }}" alt="Room.1" class="bed-room" style="width: 25px;">@lang('main.mini-banner2-03') 2</span>
                                                <div class="minus-room">@lang('main.mini-banner2-06')</div>
                                            </div>
                                            <div class="body room">
                                                <div class="room_feature" id="room_2_adult">
                                                @lang('main.mini-banner2-04')
                                                    <div class="controls-box room_adult">
                                                        <button class="btn-controls down"><img src="{{ asset('images/icons/buscador/minus.png') }}" alt=""></button>
                                                        <span class="total-pax">1</span>
                                                        <button class="btn-controls up"><img src="{{ asset('images/icons/buscador/plus.png') }}" alt=""></button>
                                                    </div>
                                                </div>
                                                <div class="room_feature" id="room_2_kid">
                                                @lang('main.mini-banner2-05')
                                                    <div class="controls-box room_kid">
                                                        <button class="btn-controls down"><img src="{{ asset('images/icons/buscador/minus.png') }}" alt=""></button>
                                                        <span class="total-pax">0</span>
                                                        <button class="btn-controls up"><img src="{{ asset('images/icons/buscador/plus.png') }}" alt=""></button>
                                                    </div>
                                                </div>
                                                <div class="room_feature pax_Age" id="room_2_age">
                                                    <p style="font-size: 11px;text-align: center;">@lang('main.mini-banner2-08')</p>
                                                </div>
                                                <div class="room_feature" id="room_apply">
                                                    <span class="label-plus">+ @lang('main.mini-banner2-03')</span>
                                                    <button class="plus-room" style="float:right;">@lang('main.mini-banner2-02')</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="room_3" class="pax-room">
                                            <div class="header.room">
                                                <span><img src="{{ asset('images/icons/buscador/bed.png') }}" alt="Room.1" class="bed-room" style="width: 25px;">@lang('main.mini-banner2-03') 3</span>
                                                <div class="minus-room"> @lang('main.mini-banner2-06') </div>
                                            </div>
                                            <div class="body room">
                                                <div class="room_feature" id="room_3_adult">
                                                @lang('main.mini-banner2-04')
                                                    <div class="controls-box room_adult">
                                                        <button class="btn-controls down"><img src="{{ asset('images/icons/buscador/minus.png') }}" alt=""></button>
                                                        <span class="total-pax">1</span>
                                                        <button class="btn-controls up"><img src="{{ asset('images/icons/buscador/plus.png') }}" alt=""></button>
                                                    </div>
                                                </div>
                                                <div class="room_feature" id="room_3_kid">
                                                @lang('main.mini-banner2-05')
                                                    <div class="controls-box room_kid">
                                                        <button class="btn-controls down"><img src="{{ asset('images/icons/buscador/minus.png') }}" alt=""></button>
                                                        <span class="total-pax">0</span>
                                                        <button class="btn-controls up"><img src="{{ asset('images/icons/buscador/plus.png') }}" alt=""></button>
                                                    </div>
                                                </div>
                                                <div class="room_feature pax_Age" id="room_3_age">
                                                    <p style="font-size: 11px;text-align: center;">@lang('main.mini-banner2-08')</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-3 col-lg-2 col-xl-2">
                                <input type="text" class="form-control date-input" name="code" id="code" placeholder="#Code">
                            </div>
                            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <button type="submit" class="btn btn-primary" id="search-btn">@lang('main.mini-banner2-01')</button>
                                <input type="hidden" class="form-control" name="startDate" id="startDate" readonly>
                                <input type="hidden" class="form-control" name="endDate" id="endDate" readonly>
                                <input type="hidden" class="form-control" name="total-paxs" value="1" readonly>
                                <input type="hidden" class="form-control" name="room.1.adults" id="room_1" value="1" readonly>
                                <input type="hidden" class="form-control" name="room.1.kids" id="kid_1" value="0" readonly>
                                <input type="hidden" class="form-control" name="adults" value="1" readonly>
                                <input type="hidden" class="form-control" name="kids" value="0" readonly>
                                <input type="hidden" class="form-control" name="rooms" value="1" readonly>
                                <input type="hidden" value="csrf_token" readonly name="csrf_token">
                                <div id="extras"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- FIN DEL BUSCADOR -->
        </div>

            

        <div class="container-fluid" id="rooms" style="margin-top:80px">
        
            
            <div class="row">
                <div class="col-sm-6">
                    <p><img src="{{ asset('images/cotizacion/down.png') }}" width="20" height="20"> @lang('main.quotation-item002') {{ $day1 }} @lang('main.quotation-item006') {{ $month_label1 }} @lang('main.quotation-item006') {{ $year1 }} </p>
                    <p><img src="{{ asset('images/cotizacion/up.png') }}" width="20" height="20" > @lang('main.quotation-item003') {{ $day2 }} @lang('main.quotation-item006') {{ $month_label2 }} @lang('main.quotation-item006') {{ $year2 }}</p>
                    <p><img src="{{ asset('images/cotizacion/bed.png') }}" width="20" height="20" > @lang('main.quotation-item004') {{ $habitaciones }} &nbsp; <img src="{{ asset('images/cotizacion/Adulto.png') }}" width="20" height="20">: {{ $_tot_adultos }}  &nbsp; &nbsp;<img src="{{ asset('images/cotizacion/Adulto.png') }}" width="15" height="15"> : {{ $_tot_infantes }}</p>
                </div>
                <div class="col-sm-6">
                    <h4 id='price_taxes'>@lang('main.quotation-item001')</h4>
                    
                    
                </div>
            </div>

            <div class="row" style="margin-top:20px">
                <div class="col-sm-6">   
                    <p><h4>@lang('main.room-item04')</h4></p>
                    <p class="center"><img src="{{ asset('images/accommodations_1.png') }}" alt="Cancun" 	width="100%"  height="450"> </p>
                    <p class="center">
                        <ul class='room-facilities'>
                            <li><img src="{{ asset('images/cotizacion/wifi.png') }}" width="22" height="22" title="Wifi">&nbsp;</li>
                            <li><img src="{{ asset('images/cotizacion/coffee.png') }}" width="22" height="22" title="Cafetera"> &nbsp; </li>
                            <li><img src="{{ asset('images/cotizacion/roomservice.png') }}" width="22" height="22" title="Servicio a la habitación"></li>
                            <li><a data-toggle='collapse' data-target='#estandar-facilities'> @lang('main.quotation-item014')</a></li>
                        </ul>
                        <div id='estandar-facilities' class='collapse'>
                            <ul class='plus-facilities'>
                                <li>@lang('main.room-item4')</li>
                                <li>@lang('main.room-item5')</li>
                                <li>@lang('main.room-item6')</li>
                                <li>@lang('main.room-item7')</li>
                                <li>@lang('main.room-item8')</li>
                                <li>@lang('main.room-item9')</li>
                                <li>@lang('main.room-item10')</li>
                            </ul>
                        </div>
                    </p>        
                </div>
                



                <div class="col-sm-6">
                    <br>
                    <table class="display table  table-striped table-responsive " style="width:100% " >
                        <tr>
                            <td rowspan="2"><br><p class="center"> <img src="{{ asset('images/cotizacion/magica.png') }}" width="40" height="50" title="Magica"></p></td>
                            <td> <p class="center">@lang('main.quotation-item012')</p> </p></td>
                            <td> &nbsp;</td>
                            <td> <p class="center">@lang('main.quotation-item013') </p></td>
                            <td>&nbsp;</td>
                        </tr>    
                        <tr >
                            <form action="  {{ route('reservations',['locale'=>App::getLocale()]) }} " method="POST" id="sendData"> 
                                @csrf
                                    <td><p class="center"> $ {{ $_0tarifa_base }} @lang('main.quotation-item007') </p></td>
                                    <td> &nbsp;</td>
                                    <td><p class="center"> $ {{ $_0tarifa_base_cs }} @lang(('main.quotation-item007')) </p> </td>
                                    <td><p class="center"><button type="submit" id="" class="btn btn-outline-danger btn-sm">@lang('main.quotation-item016')</button> </td>
                                    <input type="hidden" name="habitacioness" value="{{ $habitaciones }}">   
                                    <input type="hidden" name="checkInn" value="{{ $checkIn  }}">   
                                    <input type="hidden" name="checkOutt" value="{{ $checkOut }}">   
                                    <input type="hidden" name="tarifa_basee" value="{{ $_0tarifa_base }}">
                                    <input type="hidden" name="currencyy" value="{{ $_0currency }}">
                                    <input type="hidden" name="nochess" value="{{ $_0noches }}">
                                    @foreach ($adultos as $adulto)
                                    
                                        <input type="hidden" name="adultoss[]" value="{{ $adulto }}">
                                    @endforeach
                                    @foreach ($infantes as $infante)
                                        <input type="hidden" name="infantess[]" value="{{ $infante }}">
                                    @endforeach
                                    <input type="hidden" name="habitacion_idd" value="{{ $_0id }}">
                                    <input type="hidden" name="gtotall" value="{{ $_0gtotal }}">
                                    <input type="hidden" name="_tot_adultos" value="{{ $_tot_adultos }}">
                                    <input type="hidden" name="_tot_infantes" value="{{ $_tot_infantes }}">
                                    <input type="hidden" name="day1" value="{{ $day1 }}">
                                    <input type="hidden" name="month_label1" value="{{ $month_label1 }}">
                                    <input type="hidden" name="year1" value="{{ $year1 }}">
                                    <input type="hidden" name="day2" value="{{ $day2 }}">
                                    <input type="hidden" name="month_label2" value="{{ $month_label2 }}">
                                    <input type="hidden" name="year2" value="{{ $year2 }}">
                                    

                                    
                            </form>        
                        </tr>  
                        <tr>
                            <td rowspan="2"><p class="center"><strong>@lang('main.quotation-item015')</strong></p> <p class="center">@lang('main.quotation-item017')</p></td>
                            <td><p class="center"> @lang('main.quotation-item011') </p></td>
                            <td> &nbsp;</td>
                            <td><p class="center"> @lang('main.quotation-item013') </p></td>
                            <td>&nbsp;</td>
                        </tr>    
                        <tr >
                            <form action="  {{ route('reservations',['locale'=>App::getLocale()]) }} " method="POST" id="sendData"> 
                                @csrf
                                    <td><p class="center"> $ {{ $_1tarifa_base }} @lang('main.quotation-item007') </p></td>
                                    <td> &nbsp;</td>
                                    <td><p class="center"> $ {{ $_1tarifa_base_cs }} @lang(('main.quotation-item007')) </p> </td>
                                    <td><p class="center"><button type="submit" id="" class="btn btn-outline-danger btn-sm">@lang('main.quotation-item016')</button> </td>
                                    <input type="hidden" name="habitacioness" value="{{ $habitaciones }}">   
                                    <input type="hidden" name="checkInn" value="{{ $checkIn  }}">   
                                    <input type="hidden" name="checkOutt" value="{{ $checkOut }}">   
                                    <input type="hidden" name="tarifa_basee" value="{{ $_1tarifa_base }}">
                                    <input type="hidden" name="currencyy" value="{{ $_0currency }}">
                                    <input type="hidden" name="nochess" value="{{ $_0noches }}">
                                    @foreach ($adultos as $adulto)
                                    
                                        <input type="hidden" name="adultoss[]" value="{{ $adulto }}">
                                    @endforeach
                                    @foreach ($infantes as $infante)
                                        <input type="hidden" name="infantess[]" value="{{ $infante }}">
                                    @endforeach
                                    <input type="hidden" name="habitacion_idd" value="{{ $_1id }}">
                                    <input type="hidden" name="gtotall" value="{{ $_1gtotal }}">
                                    <input type="hidden" name="_tot_adultos" value="{{ $_tot_adultos }}">
                                    <input type="hidden" name="_tot_infantes" value="{{ $_tot_infantes }}">
                                    <input type="hidden" name="day1" value="{{ $day1 }}">
                                    <input type="hidden" name="month_label1" value="{{ $month_label1 }}">
                                    <input type="hidden" name="year1" value="{{ $year1 }}">
                                    <input type="hidden" name="day2" value="{{ $day2 }}">
                                    <input type="hidden" name="month_label2" value="{{ $month_label2 }}">
                                    <input type="hidden" name="year2" value="{{ $year2 }}">
                            </form>
                        </tr>   
                        <tr>
                            <td rowspan="2"><p class="center"><strong>@lang('main.quotation-item018')</strong></p> </td>
                            <td><p class="center"> @lang('main.quotation-item012') </p></td>
                            <td> &nbsp;</td>
                            <td><p class="center"> @lang('main.quotation-item013') </p></td>
                            <td>&nbsp;</td>

                        </tr>    
                        <tr >
                            <form action="  {{ route('reservations',['locale'=>App::getLocale()]) }} " method="POST" id="sendData"> 
                                @csrf
                                    <td><p class="center"> $ {{ $_2tarifa_base }} @lang('main.quotation-item007') </p></td>
                                    <td> &nbsp;</td>
                                    <td><p class="center"> $ {{ $_2tarifa_base_cs }} @lang(('main.quotation-item007')) </p> </td>
                                    <td><p class="center"><button type="submit" id="" class="btn btn-outline-danger btn-sm">@lang('main.quotation-item016')</button> </td>
                                    <input type="hidden" name="habitacioness" value="{{ $habitaciones }}">   
                                    <input type="hidden" name="checkInn" value="{{ $checkIn  }}">   
                                    <input type="hidden" name="checkOutt" value="{{ $checkOut }}">   
                                    <input type="hidden" name="tarifa_basee" value="{{ $_2tarifa_base }}">
                                    <input type="hidden" name="currencyy" value="{{ $_0currency }}">
                                    <input type="hidden" name="nochess" value="{{ $_0noches }}">
                                    @foreach ($adultos as $adulto)
                                    
                                        <input type="hidden" name="adultoss[]" value="{{ $adulto }}">
                                    @endforeach
                                    @foreach ($infantes as $infante)
                                        <input type="hidden" name="infantess[]" value="{{ $infante }}">
                                @endforeach
                                    <input type="hidden" name="habitacion_idd" value="{{ $_2id }}">
                                    <input type="hidden" name="gtotall" value="{{ $_2gtotal }}">
                                    <input type="hidden" name="_tot_adultos" value="{{ $_tot_adultos }}">
                                    <input type="hidden" name="_tot_infantes" value="{{ $_tot_infantes }}">
                                    <input type="hidden" name="day1" value="{{ $day1 }}">
                                    <input type="hidden" name="month_label1" value="{{ $month_label1 }}">
                                    <input type="hidden" name="year1" value="{{ $year1 }}">
                                    <input type="hidden" name="day2" value="{{ $day2 }}">
                                    <input type="hidden" name="month_label2" value="{{ $month_label2 }}">
                                    <input type="hidden" name="year2" value="{{ $year2 }}">
                            </form>
                        </tr>  
                        <tr>
                            <td rowspan="2"><p class="center">@lang('main.quotation-item019')</p> </td>
                            <td><p class="center"> @lang('main.quotation-item011') </p></td>
                            <td> &nbsp;</td>
                            <td><p class="center"> @lang('main.quotation-item013') </p></td>
                            <td>&nbsp;</td>
                            
                        </tr>    
                        <tr >
                            <form action="  {{ route('reservations',['locale'=>App::getLocale()]) }} " method="POST" id="sendData"> 
                                @csrf
                                    <td><p class="center"> $ {{ $_3tarifa_base }} @lang('main.quotation-item007') </p></td>
                                    <td> &nbsp;</td>
                                    <td><p class="center"> $ {{ $_3tarifa_base_cs }} @lang(('main.quotation-item007')) </p> </td>
                                    <td><p class="center"><button type="submit" id="" class="btn btn-outline-danger btn-sm">@lang('main.quotation-item016')</button> </td>
                                    <input type="hidden" name="habitacioness" value="{{ $habitaciones }}">   
                                    <input type="hidden" name="checkInn" value="{{ $checkIn  }}">   
                                    <input type="hidden" name="checkOutt" value="{{ $checkOut }}">   
                                    <input type="hidden" name="tarifa_basee" value="{{ $_3tarifa_base }}">
                                    <input type="hidden" name="currencyy" value="{{ $_0currency }}">
                                    <input type="hidden" name="nochess" value="{{ $_0noches }}">
                                    @foreach ($adultos as $adulto)
                                    
                                        <input type="hidden" name="adultoss[]" value="{{ $adulto }}">
                                    @endforeach
                                    @foreach ($infantes as $infante)
                                        <input type="hidden" name="infantess[]" value="{{ $infante }}">
                                    @endforeach
                                    <input type="hidden" name="habitacion_idd" value="{{ $_3id }}">
                                    <input type="hidden" name="gtotall" value="{{ $_3gtotal }}">
                                    <input type="hidden" name="_tot_adultos" value="{{ $_tot_adultos }}">
                                    <input type="hidden" name="_tot_infantes" value="{{ $_tot_infantes }}">
                                    <input type="hidden" name="day1" value="{{ $day1 }}">
                                    <input type="hidden" name="month_label1" value="{{ $month_label1 }}">
                                    <input type="hidden" name="year1" value="{{ $year1 }}">
                                    <input type="hidden" name="day2" value="{{ $day2 }}">
                                    <input type="hidden" name="month_label2" value="{{ $month_label2 }}">
                                    <input type="hidden" name="year2" value="{{ $year2 }}">
                            </form>
                        </tr>  
                        <tr>
                            <td colspan="5"><p class="center"> &nbsp; </p> </td>
                            
                            
                        </tr>
                        </table>
                
                </div>

            </div>





            <div class="row" style="margin-top:80px">
                <div class="col-sm-6">
                        
                            <p><h4>@lang('main.room-item016')</h4></p>
                            <p class="center"><img src="{{ asset('images/accommodations_2.png') }}" alt="Cancun" 	width="100%"  height="450"> </p>
                            <p class="center">
                            <ul class='room-facilities'>
                                <li><img src="{{ asset('images/cotizacion/wifi.png') }}" width="22" height="22" title="Wifi">&nbsp;</li>
                                <li><img src="{{ asset('images/cotizacion/coffee.png') }}" width="22" height="22" title="Cafetera"> &nbsp; </li>
                                <li><img src="{{ asset('images/cotizacion/roomservice.png') }}" width="22" height="22" title="Servicio a la habitación"></li>
                                <li><a data-toggle='collapse' data-target='#estandar-facilities1'> @lang('main.quotation-item014') </a></li>
                            </ul>
                            
                            
                            <div id='estandar-facilities1' class='collapse'>
                                <ul class='plus-facilities'>
                                    <li>@lang('main.room-item16')</li>
                                    <li>@lang('main.room-item17')</li>
                                    <li>@lang('main.room-item18')</li>
                                    <li>@lang('main.room-item19')</li>
                                    <li>@lang('main.room-item20')</li>
                                    <li>@lang('main.room-item21')</li>
                                    <li>@lang('main.room-item22')</li>
                                </ul>
                            </div>
                            </p>
                        

                    
                </div>
                



                <div class="col-sm-6">
                    <br>

                    
                        <table class="display table  table-striped table-responsive " style="width:100% " >
                        
                        
                        
                        <tr>
                            <td rowspan="2"><br><p class="center"> <img src="{{ asset('images/cotizacion/magica.png') }}" width="40" height="50" title="Magica"></p></td>
                            <td> <p class="center">@lang('main.quotation-item012')</p> </p></td>
                            <td> &nbsp;</td>
                            <td> <p class="center">@lang('main.quotation-item013') </p></td>
                            <td>&nbsp;</td>
                            
                        </tr>    
                        <tr >
                            <form action="  {{ route('reservations',['locale'=>App::getLocale()]) }} " method="POST" id="sendData"> 
                                @csrf
                                    <td><p class="center"> $ {{ $_4tarifa_base }} @lang('main.quotation-item007') </p></td>
                                    <td> &nbsp;</td>
                                    <td><p class="center"> $ {{ $_4tarifa_base_cs }} @lang(('main.quotation-item007')) </p> </td>
                                    <td><p class="center"><button type="submit" id="" class="btn btn-outline-danger btn-sm">@lang('main.quotation-item016')</button> </td>
                                    <input type="hidden" name="habitacioness" value="{{ $habitaciones }}">   
                                    <input type="hidden" name="checkInn" value="{{ $checkIn  }}">   
                                    <input type="hidden" name="checkOutt" value="{{ $checkOut }}">   
                                    <input type="hidden" name="tarifa_basee" value="{{ $_4tarifa_base }}">
                                    <input type="hidden" name="currencyy" value="{{ $_0currency }}">
                                    <input type="hidden" name="nochess" value="{{ $_0noches }}">
                                    @foreach ($adultos as $adulto)
                                    
                                        <input type="hidden" name="adultoss[]" value="{{ $adulto }}">
                                    @endforeach
                                    @foreach ($infantes as $infante)
                                        <input type="hidden" name="infantess[]" value="{{ $infante }}">
                                    @endforeach
                                    <input type="hidden" name="habitacion_idd" value="{{ $_4id }}">
                                    <input type="hidden" name="gtotall" value="{{ $_4gtotal }}">
                                    <input type="hidden" name="_tot_adultos" value="{{ $_tot_adultos }}">
                                    <input type="hidden" name="_tot_infantes" value="{{ $_tot_infantes }}">
                                    <input type="hidden" name="day1" value="{{ $day1 }}">
                                    <input type="hidden" name="month_label1" value="{{ $month_label1 }}">
                                    <input type="hidden" name="year1" value="{{ $year1 }}">
                                    <input type="hidden" name="day2" value="{{ $day2 }}">
                                    <input type="hidden" name="month_label2" value="{{ $month_label2 }}">
                                    <input type="hidden" name="year2" value="{{ $year2 }}">
                            </form>
                        </tr>  
                        <tr>
                            <td rowspan="2"><p class="center"><strong>@lang('main.quotation-item015')</strong></p> <p class="center">@lang('main.quotation-item017')</p></td>
                            <td><p class="center"> @lang('main.quotation-item011') </p></td>
                            <td> &nbsp;</td>
                            <td><p class="center"> @lang('main.quotation-item013') </p></td>
                            <td>&nbsp;</td>
                            
                        </tr>    
                        <tr >
                            <form action="  {{ route('reservations',['locale'=>App::getLocale()]) }} " method="POST" id="sendData"> 
                                @csrf
                                    <td><p class="center"> $ {{ $_5tarifa_base }} @lang('main.quotation-item007') </p></td>
                                    <td> &nbsp;</td>
                                    <td><p class="center"> $ {{ $_5tarifa_base_cs }} @lang(('main.quotation-item007')) </p> </td>
                                    <td><p class="center"><button type="submit" id="" class="btn btn-outline-danger btn-sm">@lang('main.quotation-item016')</button> </td>
                                    <input type="hidden" name="habitacioness" value="{{ $habitaciones }}">   
                                    <input type="hidden" name="checkInn" value="{{ $checkIn  }}">   
                                    <input type="hidden" name="checkOutt" value="{{ $checkOut }}">   
                                    <input type="hidden" name="tarifa_basee" value="{{ $_5tarifa_base }}">
                                    <input type="hidden" name="currencyy" value="{{ $_0currency }}">
                                    <input type="hidden" name="nochess" value="{{ $_0noches }}">
                                    @foreach ($adultos as $adulto)
                                    
                                        <input type="hidden" name="adultoss[]" value="{{ $adulto }}">
                                    @endforeach
                                    @foreach ($infantes as $infante)
                                        <input type="hidden" name="infantess[]" value="{{ $infante }}">
                                    @endforeach
                                    <input type="hidden" name="habitacion_idd" value="{{ $_5id }}">
                                    <input type="hidden" name="gtotall" value="{{ $_5gtotal }}">
                                    <input type="hidden" name="_tot_adultos" value="{{ $_tot_adultos }}">
                                    <input type="hidden" name="_tot_infantes" value="{{ $_tot_infantes }}">
                                    <input type="hidden" name="day1" value="{{ $day1 }}">
                                    <input type="hidden" name="month_label1" value="{{ $month_label1 }}">
                                    <input type="hidden" name="year1" value="{{ $year1 }}">
                                    <input type="hidden" name="day2" value="{{ $day2 }}">
                                    <input type="hidden" name="month_label2" value="{{ $month_label2 }}">
                                    <input type="hidden" name="year2" value="{{ $year2 }}">
                            </form>
                        </tr>   
                        <tr>
                            <td rowspan="2"><p class="center"><strong>@lang('main.quotation-item018')</strong></p> </td>
                            <td><p class="center"> @lang('main.quotation-item012') </p></td>
                            <td> &nbsp;</td>
                            <td><p class="center"> @lang('main.quotation-item013') </p></td>
                            <td>&nbsp;</td>
                            
                        </tr>    
                        <tr >
                            <form action="  {{ route('reservations',['locale'=>App::getLocale()]) }} " method="POST" id="sendData"> 
                                @csrf
                                    <td><p class="center"> $ {{ $_6tarifa_base }} @lang('main.quotation-item007') </p></td>
                                    <td> &nbsp;</td>
                                    <td><p class="center"> $ {{ $_6tarifa_base_cs }} @lang(('main.quotation-item007')) </p> </td>
                                    <td><p class="center"><button type="submit" id="" class="btn btn-outline-danger btn-sm">@lang('main.quotation-item016')</button> </td>
                                    <input type="hidden" name="habitacioness" value="{{ $habitaciones }}">   
                                    <input type="hidden" name="checkInn" value="{{ $checkIn  }}">   
                                    <input type="hidden" name="checkOutt" value="{{ $checkOut }}">   
                                    <input type="hidden" name="tarifa_basee" value="{{ $_6tarifa_base }}">
                                    <input type="hidden" name="currencyy" value="{{ $_0currency }}">
                                    <input type="hidden" name="nochess" value="{{ $_0noches }}">
                                    @foreach ($adultos as $adulto)
                                    
                                        <input type="hidden" name="adultoss[]" value="{{ $adulto }}">
                                    @endforeach
                                    @foreach ($infantes as $infante)
                                        <input type="hidden" name="infantess[]" value="{{ $infante }}">
                                    @endforeach
                                    <input type="hidden" name="habitacion_idd" value="{{ $_6id }}">
                                    <input type="hidden" name="gtotall" value="{{ $_6gtotal }}">
                                    <input type="hidden" name="_tot_adultos" value="{{ $_tot_adultos }}">
                                    <input type="hidden" name="_tot_infantes" value="{{ $_tot_infantes }}">
                                    <input type="hidden" name="day1" value="{{ $day1 }}">
                                    <input type="hidden" name="month_label1" value="{{ $month_label1 }}">
                                    <input type="hidden" name="year1" value="{{ $year1 }}">
                                    <input type="hidden" name="day2" value="{{ $day2 }}">
                                    <input type="hidden" name="month_label2" value="{{ $month_label2 }}">
                                    <input type="hidden" name="year2" value="{{ $year2 }}">
                            </form>
                        </tr>  
                        <tr>
                            <td rowspan="2"><p class="center">@lang('main.quotation-item019')</p> </td>
                            <td><p class="center"> @lang('main.quotation-item011') </p></td>
                            <td> &nbsp;</td>
                            <td><p class="center"> @lang('main.quotation-item013') </p></td>
                            <td>&nbsp;</td>
                            
                        </tr>    
                        <tr >
                            <form action="  {{ route('reservations',['locale'=>App::getLocale()]) }} " method="POST" id="sendData"> 
                                @csrf
                                    <td><p class="center"> $ {{ $_7tarifa_base }} @lang('main.quotation-item007') </p></td>
                                    <td> &nbsp;</td>
                                    <td><p class="center"> $ {{ $_7tarifa_base_cs }} @lang(('main.quotation-item007')) </p> </td>
                                    <td><p class="center"><button type="submit" id="" class="btn btn-outline-danger btn-sm">@lang('main.quotation-item016')</button> </td>
                                    <input type="hidden" name="habitacioness" value="{{ $habitaciones }}">   
                                    <input type="hidden" name="checkInn" value="{{ $checkIn  }}">   
                                    <input type="hidden" name="checkOutt" value="{{ $checkOut }}">   
                                    <input type="hidden" name="tarifa_basee" value="{{ $_7tarifa_base }}">
                                    <input type="hidden" name="currencyy" value="{{ $_0currency }}">
                                    <input type="hidden" name="nochess" value="{{ $_0noches }}">
                                    @foreach ($adultos as $adulto)
                                    
                                        <input type="hidden" name="adultoss[]" value="{{ $adulto }}">
                                    @endforeach
                                    @foreach ($infantes as $infante)
                                        <input type="hidden" name="infantess[]" value="{{ $infante }}">
                                    @endforeach
                                    <input type="hidden" name="habitacion_idd" value="{{ $_7id }}">
                                    <input type="hidden" name="gtotall" value="{{ $_7gtotal }}">
                                    <input type="hidden" name="_tot_adultos" value="{{ $_tot_adultos }}">
                                    <input type="hidden" name="_tot_infantes" value="{{ $_tot_infantes }}">
                                    <input type="hidden" name="day1" value="{{ $day1 }}">
                                    <input type="hidden" name="month_label1" value="{{ $month_label1 }}">
                                    <input type="hidden" name="year1" value="{{ $year1 }}">
                                    <input type="hidden" name="day2" value="{{ $day2 }}">
                                    <input type="hidden" name="month_label2" value="{{ $month_label2 }}">
                                    <input type="hidden" name="year2" value="{{ $year2 }}">
                            </form>
                        </tr>  
                        <tr>
                            <td colspan="5">&nbsp;</td>
                            
                            
                        </tr>
                        </table>
                
                </div>

            </div>

        

            
            <div class="row" style="margin-top:80px">
                <div class="col-sm-6">
                        
                            <p><h4>@lang('main.room-item028')</h4></p>
                            <p class="center"><img src="{{ asset('images/accommodations_3.png') }}" alt="Cancun" 	width="100%"  height="450"> </p>
                            <p class="center">
                            <ul class='room-facilities'>
                                <li><img src="{{ asset('images/cotizacion/wifi.png') }}" width="22" height="22" title="Wifi">&nbsp;</li>
                                <li><img src="{{ asset('images/cotizacion/coffee.png') }}" width="22" height="22" title="Cafetera"> &nbsp; </li>
                                <li><img src="{{ asset('images/cotizacion/roomservice.png') }}" width="22" height="22" title="Servicio a la habitación"></li>
                                <li><a data-toggle='collapse' data-target='#estandar-facilities2'> @lang('main.quotation-item014')</a></li>
                            </ul>
                            
                            
                            <div id='estandar-facilities2' class='collapse'>
                                <ul class='plus-facilities'>
                                    <li>@lang('main.room-item28')</li>
                                    <li>@lang('main.room-item29')</li>
                                    <li>@lang('main.room-item30')</li>
                                    <li>@lang('main.room-item31')</li>
                                    <li>@lang('main.room-item32')</li>
                                    <li>@lang('main.room-item33')</li>
                                    <li>@lang('main.room-item34')</li>
                                    <li>@lang('main.room-item35')</li>
                                    <li>@lang('main.room-item36')</li>
                                    <li>@lang('main.room-item37')</li>
                                    <li>@lang('main.room-item38')</li>
                                </ul>
                            </div>
                            </p>
                        

                    
                </div>
                



                <div class="col-sm-6">
                    <br>

                    
                        <table class="display table  table-striped table-responsive " style="width:100% " >
                        
                        
                        
                        <tr>
                            <td rowspan="2"><br><p class="center"> <img src="{{ asset('images/cotizacion/magica.png') }}" width="40" height="50" title="Magica"></p></td>
                            <td> <p class="center">@lang('main.quotation-item012')</p> </p></td>
                            <td> &nbsp;</td>
                            <td> <p class="center">@lang('main.quotation-item013') </p></td>
                            <td>&nbsp;</td>
                            
                        </tr>    
                        <tr >
                            <form action="  {{ route('reservations',['locale'=>App::getLocale()]) }} " method="POST" id="sendData"> 
                                @csrf
                                    <td><p class="center"> $ {{ $_8tarifa_base }} @lang('main.quotation-item007') </p></td>
                                    <td> &nbsp;</td>
                                    <td><p class="center"> $ {{ $_8tarifa_base_cs }} @lang(('main.quotation-item007')) </p> </td>
                                    <td><p class="center"><button type="submit" id="" class="btn btn-outline-danger btn-sm">@lang('main.quotation-item016')</button> </td>
                                    <input type="hidden" name="habitacioness" value="{{ $habitaciones }}">   
                                    <input type="hidden" name="checkInn" value="{{ $checkIn  }}">   
                                    <input type="hidden" name="checkOutt" value="{{ $checkOut }}">   
                                    <input type="hidden" name="tarifa_basee" value="{{ $_8tarifa_base }}">
                                    <input type="hidden" name="currencyy" value="{{ $_0currency }}">
                                    <input type="hidden" name="nochess" value="{{ $_0noches }}">
                                    @foreach ($adultos as $adulto)
                                        
                                        <input type="hidden" name="adultoss[]" value="{{ $adulto }}">
                                    @endforeach
                                    @foreach ($infantes as $infante)
                                        <input type="hidden" name="infantess[]" value="{{ $infante }}">
                                    @endforeach
                                    <input type="hidden" name="habitacion_idd" value="{{ $_8id }}">
                                    <input type="hidden" name="gtotall" value="{{ $_8gtotal }}">
                                    <input type="hidden" name="_tot_adultos" value="{{ $_tot_adultos }}">
                                    <input type="hidden" name="_tot_infantes" value="{{ $_tot_infantes }}">
                                    <input type="hidden" name="day1" value="{{ $day1 }}">
                                    <input type="hidden" name="month_label1" value="{{ $month_label1 }}">
                                    <input type="hidden" name="year1" value="{{ $year1 }}">
                                    <input type="hidden" name="day2" value="{{ $day2 }}">
                                    <input type="hidden" name="month_label2" value="{{ $month_label2 }}">
                                    <input type="hidden" name="year2" value="{{ $year2 }}">
                            </form>
                        </tr>  
                        <tr>
                            <td rowspan="2"><p class="center"><strong>@lang('main.quotation-item015')</strong></p> <p class="center">@lang('main.quotation-item017')</p></td>
                            <td><p class="center"> @lang('main.quotation-item011') </p></td>
                            <td> &nbsp;</td>
                            <td><p class="center"> @lang('main.quotation-item013') </p></td>
                            <td>&nbsp;</td>
                            
                        </tr>    
                        <tr >
                            <form action="  {{ route('reservations',['locale'=>App::getLocale()]) }} " method="POST" id="sendData"> 
                                @csrf
                                    <td><p class="center"> $ {{ $_9tarifa_base }} @lang('main.quotation-item007') </p></td>
                                    <td> &nbsp;</td>
                                    <td><p class="center"> $ {{ $_9tarifa_base_cs }} @lang(('main.quotation-item007')) </p> </td>
                                    <td><p class="center"><button type="submit" id="" class="btn btn-outline-danger btn-sm">@lang('main.quotation-item016')</button> </td>
                                    <input type="hidden" name="habitacioness" value="{{ $habitaciones }}">   
                                    <input type="hidden" name="checkInn" value="{{ $checkIn  }}">   
                                    <input type="hidden" name="checkOutt" value="{{ $checkOut }}">   
                                    <input type="hidden" name="tarifa_basee" value="{{ $_9tarifa_base }}">
                                    <input type="hidden" name="currencyy" value="{{ $_0currency }}">
                                    <input type="hidden" name="nochess" value="{{ $_0noches }}">
                                    @foreach ($adultos as $adulto)
                                    
                                        <input type="hidden" name="adultoss[]" value="{{ $adulto }}">
                                    @endforeach
                                    @foreach ($infantes as $infante)
                                        <input type="hidden" name="infantess[]" value="{{ $infante }}">
                                    @endforeach
                                    <input type="hidden" name="habitacion_idd" value="{{ $_9id }}">
                                    <input type="hidden" name="gtotall" value="{{ $_9gtotal }}">
                                    <input type="hidden" name="_tot_adultos" value="{{ $_tot_adultos }}">
                                    <input type="hidden" name="_tot_infantes" value="{{ $_tot_infantes }}">
                                    <input type="hidden" name="day1" value="{{ $day1 }}">
                                    <input type="hidden" name="month_label1" value="{{ $month_label1 }}">
                                    <input type="hidden" name="year1" value="{{ $year1 }}">
                                    <input type="hidden" name="day2" value="{{ $day2 }}">
                                    <input type="hidden" name="month_label2" value="{{ $month_label2 }}">
                                    <input type="hidden" name="year2" value="{{ $year2 }}">
                            </form>
                        </tr>   
                        <tr>
                            <td rowspan="2"><p class="center"><strong>@lang('main.quotation-item018')</strong></p> </td>
                            <td><p class="center"> @lang('main.quotation-item012') </p></td>
                            <td> &nbsp;</td>
                            <td><p class="center"> @lang('main.quotation-item013') </p></td>
                            <td>&nbsp;</td>
                            
                        </tr>    
                        <tr >
                            <form action="  {{ route('reservations',['locale'=>App::getLocale()]) }} " method="POST" id="sendData"> 
                                @csrf
                                    <td><p class="center"> $ {{ $_10tarifa_base }} @lang('main.quotation-item007') </p></td>
                                    <td> &nbsp;</td>
                                    <td><p class="center"> $ {{ $_10tarifa_base_cs }} @lang(('main.quotation-item007')) </p> </td>
                                    <td><p class="center"><button type="submit" id="" class="btn btn-outline-danger btn-sm">@lang('main.quotation-item016')</button> </td>
                                    <input type="hidden" name="habitacioness" value="{{ $habitaciones }}">   
                                    <input type="hidden" name="checkInn" value="{{ $checkIn  }}">   
                                    <input type="hidden" name="checkOutt" value="{{ $checkOut }}">   
                                    <input type="hidden" name="tarifa_basee" value="{{ $_10tarifa_base }}">
                                    <input type="hidden" name="currencyy" value="{{ $_0currency }}">
                                    <input type="hidden" name="nochess" value="{{ $_0noches }}">
                                    @foreach ($adultos as $adulto)
                                    
                                        <input type="hidden" name="adultoss[]" value="{{ $adulto }}">
                                    @endforeach
                                    @foreach ($infantes as $infante)
                                        <input type="hidden" name="infantess[]" value="{{ $infante }}">
                                    @endforeach
                                    <input type="hidden" name="habitacion_idd" value="{{ $_10id }}">
                                    <input type="hidden" name="gtotall" value="{{ $_10gtotal }}">
                                    <input type="hidden" name="_tot_adultos" value="{{ $_tot_adultos }}">
                                    <input type="hidden" name="_tot_infantes" value="{{ $_tot_infantes }}">
                                    <input type="hidden" name="day1" value="{{ $day1 }}">
                                    <input type="hidden" name="month_label1" value="{{ $month_label1 }}">
                                    <input type="hidden" name="year1" value="{{ $year1 }}">
                                    <input type="hidden" name="day2" value="{{ $day2 }}">
                                    <input type="hidden" name="month_label2" value="{{ $month_label2 }}">
                                    <input type="hidden" name="year2" value="{{ $year2 }}">
                            </form>
                        </tr>  
                        <tr>
                            <td rowspan="2"><p class="center">@lang('main.quotation-item019')</p> </td>
                            <td><p class="center"> @lang('main.quotation-item011') </p></td>
                            <td> &nbsp;</td>
                            <td><p class="center"> @lang('main.quotation-item013') </p></td>
                            <td>&nbsp;</td>
                            
                        </tr>    
                        <tr >
                            <form action="  {{ route('reservations',['locale'=>App::getLocale()]) }} " method="POST" id="sendData"> 
                                @csrf
                                    <td><p class="center"> $ {{ $_11tarifa_base }} @lang('main.quotation-item007') </p></td>
                                    <td> &nbsp;</td>
                                    <td><p class="center"> $ {{ $_11tarifa_base_cs }} @lang(('main.quotation-item007')) </p> </td>
                                    <td><p class="center"><button type="submit" id="" class="btn btn-outline-danger btn-sm">@lang('main.quotation-item016')</button> </td>
                                    <input type="hidden" name="habitacioness" value="{{ $habitaciones }}">   
                                    <input type="hidden" name="checkInn" value="{{ $checkIn  }}">   
                                    <input type="hidden" name="checkOutt" value="{{ $checkOut }}">   
                                    <input type="hidden" name="tarifa_basee" value="{{ $_11tarifa_base }}">
                                    <input type="hidden" name="currencyy" value="{{ $_0currency }}">
                                    <input type="hidden" name="nochess" value="{{ $_0noches }}">
                                    @foreach ($adultos as $adulto)
                                        <input type="hidden" name="adultoss[]" value="{{ $adulto }}">
                                    @endforeach
                                    @foreach ($infantes as $infante)
                                    <input type="hidden" name="infantess[]" value="{{ $infante }}">
                                    @endforeach
                                    
                                    <input type="hidden" name="habitacion_idd" value="{{ $_11id }}">
                                    <input type="hidden" name="gtotall" value="{{ $_11gtotal }}">
                                    <input type="hidden" name="_tot_adultos" value="{{ $_tot_adultos }}">
                                    <input type="hidden" name="_tot_infantes" value="{{ $_tot_infantes }}">
                                    <input type="hidden" name="day1" value="{{ $day1 }}">
                                    <input type="hidden" name="month_label1" value="{{ $month_label1 }}">
                                    <input type="hidden" name="year1" value="{{ $year1 }}">
                                    <input type="hidden" name="day2" value="{{ $day2 }}">
                                    <input type="hidden" name="month_label2" value="{{ $month_label2 }}">
                                    <input type="hidden" name="year2" value="{{ $year2 }}">
                            </form>
                        </tr>  
                        <tr>
                            <td colspan="5">&nbsp; </td>
                            
                            
                        </tr>
                        </table>
                
                </div>

            </div>

        </div>

@endsection
