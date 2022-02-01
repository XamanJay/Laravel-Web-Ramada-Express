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











    <div id="express01" class="container" style="margin-top:80px">
        <div class="row" style="margin-top:0px">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <p class="center"><h4>@lang('main.room-item1')</h4></p>
                <p class="center">@lang('main.room-item2') </p>
                <p class="center">@lang('main.room-item3') </p>
            </div>
        </div>

        <div class="row" style="margin-top:0px">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <p>
                <img class="" src="{{ asset('images/habitaciones/accommodations_3.png') }}" alt="" width="320" height="250">
                <h4>@lang('main.room-item04')</h4>
                </p>
                <p>@lang('main.room-item5')  </p>
                <p>@lang('main.room-item6')  </p>
                <p>@lang('main.room-item7')  </p>
                <p>@lang('main.room-item8')  </p>
                <p>@lang('main.room-item9')  </p>
                <p>@lang('main.room-item10') </p>
                <p>@lang('main.room-item11') </p>
                <p>@lang('main.room-item12') </p>
                <p>@lang('main.room-item13') </p>
                <p>@lang('main.room-item14') </p>
                <p>@lang('main.room-item15') </p>
                
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <p>
                <img class="" src="{{ asset('images/habitaciones/accommodations_1.png') }}" alt="" width="320" height="250">
                <h4>@lang('main.room-item016')</h4>
                </p>
                <p>@lang('main.room-item16') </p>
                <p>@lang('main.room-item17') </p>
                <p>@lang('main.room-item18') </p>
                <p>@lang('main.room-item19') </p>
                <p>@lang('main.room-item20') </p>
                <p>@lang('main.room-item21') </p>
                <p>@lang('main.room-item22') </p>
                <p>@lang('main.room-item23') </p>
                <p>@lang('main.room-item24') </p>
                <p>@lang('main.room-item25') </p>
                <p>@lang('main.room-item26') </p>
                <p>@lang('main.room-item27') </p>
            
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <p>
                <img class="" src="{{ asset('images/habitaciones/accommodations_2.png') }}" alt="" width="320" height="250">
                <h4>@lang('main.room-item028')</h4>
                </p>
                <p>@lang('main.room-item28') </p>
                <p>@lang('main.room-item29') </p>
                <p>@lang('main.room-item30') </p>
                <p>@lang('main.room-item31') </p>
                <p>@lang('main.room-item32') </p>
                <p>@lang('main.room-item33') </p>
                <p>@lang('main.room-item34') </p>
                <p>@lang('main.room-item35') </p>
                <p>@lang('main.room-item36') </p>
                <p>@lang('main.room-item37') </p>
                <p>@lang('main.room-item38') </p>
                <p>@lang('main.room-item39') </p>
                <p>@lang('main.room-item40') </p>
                <p>@lang('main.room-item41') </p>
                <p>@lang('main.room-item42') </p>
                <p>@lang('main.room-item43') </p>
                <p>@lang('main.room-item44') </p>
                <p>@lang('main.room-item45') </p>
                <p>@lang('main.room-item46') </p>
            </div>
        </div>
    </div>

@endsection
