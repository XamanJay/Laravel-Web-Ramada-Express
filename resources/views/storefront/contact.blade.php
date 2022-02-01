@extends('layouts.app')
@section('content')


<div id="main-img" style="margin-top:0px">
    <img src="{{ asset('images/White-Background.png') }}" alt=""  style="width:100%"  height="180" > 
    
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














    <div id="express01" class="container" style="margin-top:10px">
        
        <div class="row" style="margin-top:0px">
            <div class="col-sm-12">
                <p class="center"><h4>@lang('main.contact-item001') </h4> </p>
                <br>
                <p class="center">@lang('main.contact-item002') </p>
                <p class="center">@lang('main.room-item3')</p> 
            </div>
        </div>

        <div class="row" style="margin-top:20px">
            <div class="col-sm-12">
                <p class="center"> <img src="{{ asset('images/Contacto/1.png') }}" width="100%"> </p>
            </div>
        </div>

        <div class="row" style="margin-top:20px">
            <div class="col-sm-12">
                <p class="center"> @lang('main.contact-item003') </p>
            </div>
        </div>

        <div class="row" style="margin-top:20px">
            <div class="col-sm-12">
                <p class="center"> <img src="{{ asset('images/Contacto/minifle.png') }}" > </p>
            </div>
        </div>

        <div class="row" style="margin-top:20px">
            <div class="col-sm-12">
                <p class="center"> @lang('main.contact-item004') </p>
            </div>
        </div>

        <div class="row" style="margin-top:20px">
            <div class="col-sm-12">
                <p class="center"> @lang('main.contact-item005') </p>
            </div>
        </div>

        <div class="row" style="margin-top:20px">
            <div class="col-sm-12">
                <p class="center"> <img src="{{ asset('images/Contacto/3.png') }}" width="100%" > </p>
            </div>
        </div>

        <div class="row" style="margin-top:20px">
            
            <div class="col-sm-6">
                <form action=" {{ route('contact_mail',['locale'=>App::getLocale()]) }} " method="POST" id="contactt" >
                    
                    @csrf  
                        
                <p>@lang('main.contact-item008') <input type="text" name="name1" id="name1" class="form-control" placeholder="Nombre:" > </p>
                <p>@lang('main.contact-item009') <input type="text" name="email1" id="email1" class="form-control" placeholder="Correo electrónico:"> </p>
                <p>@lang('main.contact-item010') <input type="text" name="issue1" id="issue1" class="form-control" placeholder="Asunto:"> </p>
                <p>@lang('main.contact-item011') <textarea name="coments1" id="coments1"  class="form-control" value="" size=10 rows=3 cols=35 placeholder="Mensaje:"> </textarea> </p>
                <p class="center"> <input type="submit" class="btn btn-danger" value="@lang('main.contact-item012')"> </p>
                        
                </form>
            </div>
            <div class="col-sm-6">
                <div>
                    <p class="center"><img src="{{ asset('images/Contacto/minifle.png') }}" > &nbsp; @lang('main.contact-item006') </p>
                </div>
            </div>
        </div>
        
        <div class="row" style="margin-top:20px">
            <div class="col-sm-12">
                <p class="center"> </p>
            </div>
        </div>
    </div>

@endsection
