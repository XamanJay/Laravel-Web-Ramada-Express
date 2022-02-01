@extends('layouts.app')
@section('content')


    <script> 
        var isMobile = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/);
        if(isMobile) {	 // document.write("Version mobile ٩͡[๏̯͡๏]۶");  
                            document.write("<div id='main-img' style='margin-top:0px'>");
                            document.write("<img src='{{ asset('images/mob_image.png') }}' alt='Adhara Express' style='width:100%'  > ");
        }
        else {  document.write("<div class='_1container'>");
                document.write("<div id='posición-absoluta'>");
                document.write("<div id='texto-absoluto'><br>");
                document.write("<p class='center'><strong>@lang('main.mini-banner1-01')</strong> <br><br> <img src='{{ asset('images/icons/social_media/whatsapp.png') }}' width='40' height='40'></p>");
                document.write("<strong><h4 class='digits'>@lang('main.mini-banner1-02')</h4></strong> <h4 class='digits'> @lang('main.mini-banner1-03')</h4> ");
                document.write("<p id='demo'> </p>    </div>   </div>   </div>");

                document.write("<div id='main-img' style='margin-top:0px'>");
                document.write("<img src='{{ asset('images/main_image3.jpg') }}' alt='Adhara Express' style='width:100%'  > ");
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

    <div id="express01" class="container" style="margin-top:140px">
        <div class="row">
            <div class="col-sm-6">
                <p class="center"><h4 class="left">Hotel Adhara Express</h4></p>
                <p>@lang('main.body-item1') </p>
                <p>@lang('main.body-item2')</p>
                <p><strong> @lang('main.body-item3')</strong> </p>
                <p><strong>@lang('main.body-item4')</strong></p>
            </div>
            <div class="col-sm-6">
                <br>
                <p class="center"><img class="" src="{{ asset('images/Teocalli_Sand_1.png') }}" alt="" style="img-fluid" ></p>
            </div>
        </div>
    </div>

    <div class="container" id="rooms" style="margin-top:80px">
        <div class="row">
            <div class="col-sm-8">
                <br>
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/accommodations_1.png') }}" alt="Cancun" width="800" height="450">
                            <div class="carousel-caption">
                                <h3>&nbsp;</h3>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/accommodations_2.png') }}" alt="Cancun" width="800" height="450">
                            <div class="carousel-caption">
                                <h3>&nbsp;</h3>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/accommodations_3.png') }}" alt="Cancun" width="800" height="450">
                            <div class="carousel-caption">
                                <h3>&nbsp;</h3>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                    </div>
                    <!-- <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a> -->
                </div>
            </div>

            <div class="col-sm-4">
                <p><h4 class="left">@lang('main.body-item5')</h4></p>
                <p>@lang('main.body-item6')</p>
            </div>
        </div>
    </div>

    <div id="express011" class="container" style="margin-top:80px">
        <div class="row" style="margin-top:0px">
            <div class="col-sm-6">
                <p class="center"><h4 class="left">@lang('main.body-item7')</h4></p>
                <p>@lang('main.body-item8') </p>
                <p><strong>@lang('main.body-item9')</strong></p>
            </div>
            <div class="col-sm-6">
                <br>
                <p class="center"><img class="" src="{{ asset('images/Bar_Adhara_Express_1.png') }}" alt="" style="img-fluid"></p>
            </div>
        </div>
    </div>

    <div class="container" id="pool" style="margin-top:80px">
        <div class="row">
            <div class="col-sm-8">
                <br>
                <div id="demo1" class="carousel slide" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <li data-target="#demo1" data-slide-to="0" class="active"></li>
                        <li data-target="#demo1" data-slide-to="1"></li>
                        <!--  <li data-target="#demo1" data-slide-to="2"></li> -->
                    </ul>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/Pool_Adhara_Express_1.png') }}" alt="Cancun" width="800" height="450">
                            <div class="carousel-caption">
                                <h3>&nbsp;</h3>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/Pool_Adhara_Express_2.png') }}" alt="Cancun" width="800" height="450">
                            <div class="carousel-caption">
                                <h3>&nbsp;</h3>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                        <!-- <div class="carousel-item">
                            <img src="{{ asset('images/pool3.jpg') }}" alt="Cancun" width="800" height="400">
                            <div class="carousel-caption">
                                <h3>&nbsp;</h3>
                                <p>&nbsp;</p>
                            </div>
                        </div> -->
                    </div>
                    <a class="carousel-control-prev" href="#demo1" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo1" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <p><h4 class="left">@lang('main.body-item10')</h4></p>
                <p>@lang('main.body-item11') </p>
            </div>
        </div>
    </div>

    <div id="express06" class="container" style="margin-top:80px">
        <p><h4>@lang('main.body-item12')</h4></p>
        <br><br>
        <div class="row" style="margin-top:0px">
            <div class="col-sm-4">
                <p class="center"><h6 class="black">@lang('main.body-item13')</h6></p>
                <br>
                <p class="center"><img class="" src="{{ asset('images/Transportación_Adhara_Express_1.png') }}" alt="" width="200" height="200" ></p>
                <br> <br>
                <p class="center">@lang('main.body-item14')</p>
            </div>
            <div class="col-sm-4">
                <p class="center"><h6 class="black">@lang('main.body-item15')</h6> </p>
                <br>
                <p class="center"><img class="" src="{{ asset('images/Estacionamiento_Adhara_Express_1.png') }}" alt="" width="200" height="200" ></p>
                <br> <br>
                <p class="center">@lang('main.body-item16')</p>
            </div>
            <div class="col-sm-4">
                <p class="center"><h6 class="black">@lang('main.body-item17') </h6></p>
                <br>
                <p class="center"><img class="" src="{{ asset('images/Gimnasio_Adhara_Express_1.png') }}" alt="" width="200" height="200" ></p>
                <br> <br>
                <p class="center">@lang('main.body-item18')</p>
            </div>
        </div>
    </div>







    <div class="container" id="events" style="margin-top:80px">
        <div class="row">
            <div class="col-sm-8">
                <br>
                <div id="demo2" class="carousel slide" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <li data-target="#demo2" data-slide-to="0" class="active"></li>
                        <li data-target="#demo2" data-slide-to="1"></li>
                        <li data-target="#demo2" data-slide-to="2"></li>
                    </ul>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/Eventos_Adhara_Express_1.png') }}" alt="Cancun" width="800" height="450">
                            <div class="carousel-caption">
                                <h3>&nbsp;</h3>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/Eventos_Adhara_Express_2.png') }}" alt="Cancun" width="800" height="450">
                            <div class="carousel-caption">
                                <h3>&nbsp;</h3>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/Eventos_Adhara_Express_3.png') }}" alt="Cancun" width="800" height="450">
                            <div class="carousel-caption">
                                <h3>&nbsp;</h3>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#demo2" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo2" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>

            </div>

            <div class="col-sm-4">
                <p>
                <h4 class="left">@lang('main.body-item19')</h4>
                </p>
                <p><strong>@lang('main.body-item20')</strong> </p>
                <p>@lang('main.body-item21')</p>
                <p>@lang('main.body-item22') </p>
                <p><strong>@lang('main.body-item23')</strong></p>
                <p>
                <h4 class="left"><img src="{{ asset('images/icons/social_media/whatsapp.png') }}" width="25" height="25">
                    @lang('main.body-item24')</h4>
                </p>
            </div>

        </div>
    </div>



    <div id="express6.5" class="container" style="margin-top:80px">
        <div class="row" style="margin-top:0px">
            <div class="col-sm-12">
                <p>
                <h4>Cocodrillos Grilled sándwiches</h4>
                </p>
                
                <p class="center"> <img src="{{ asset('images/footer/gph_family/Cocodrillos1.png') }}" style="img-fluid"> </p>
                <p class="center">@lang('main.body-item25')</p>
                <p class="center">@lang('main.body-item26')</p>
                <br><br>


            </div>
        </div>

        <div class="row" style="margin-top:0px">
            <div class="col-sm-4">
                <p class="center"><img class="" src="{{ asset('images/CocodrilloCerdoalabbq.png') }}" alt="Cocodrillo Cerdo a la bbq" style="img-fluid"
                        height="250"></p>
            </div>
            <div class="col-sm-4">
                <p class="center"><img class="" src="{{ asset('images/CocodrilloPolloCrujiente.png') }}" alt="Cocodrillo Pollo Crujiente" style="img-fluid"
                        height="250"></p>
            </div>
            <div class="col-sm-4">
                <p class="center"><img class="" src="{{ asset('images/CocodrilloCerdoalacerveza.png') }}" alt="Cocodrillo Cerdo a la cerveza" style="img-fluid"
                        height="250"></p>
            </div>
        </div>

        <div class="row" style="margin-top:0px">
            <div class="col-sm-4">
                <p class="center"><img class="" src="{{ asset('images/CocodrilloResalacerveza.png') }}" alt="Cocodrillo Res a la cerveza" style="img-fluid"
                        height="250"></p>
            </div>
            <div class="col-sm-4">
                <p class="center"><img class="" src="{{ asset('images/CocodrilloArrachera.png') }}" alt="Cocodrillo Arrachera" style="img-fluid"
                        height="250"></p>
            </div>
            <div class="col-sm-4">
                <p class="center"><img class="" src="{{ asset('images/CocodrilloReuben.png') }}" alt="Cocodrillo Reuben" style="img-fluid"
                        height="250"></p>
            </div>
        </div>

        <div class="row" style="margin-top:0px">
            <div class="col-sm-4">
                
            </div>
            <div class="col-sm-4">
                <p class="center"><img class="" src="{{ asset('images/CocodrilloRoastbeef.png') }}" alt="Cocodrillo Roast beef" style="img-fluid"
                    height="250"></p>
            </div>
            <div class="col-sm-4">
                
            </div>
        </div>

        <div class="row" style="margin-top:0px">
            <div class="col-sm-4">
                <p class="center"></p>
            </div>
            <div class="col-sm-4">
                <p class="center">@lang('main.body-item27')</p>
                <p class="center" ><a style="color: #0bd2f5;" target="_blank" href="https://www.cocodrillos.com" > www.cocodrillos.com</a></p>
            </div>
            <div class="col-sm-4">
                <p class="center"></p>
            </div>
        </div>

    </div>






    <div id="express07" class="container" style="margin-top:80px">

        <div class="row" style="margin-top:0px">

            <div class="col-sm-12">
                <p>
                <h4>OKTrip</h4>
                </p>
                <p class="center">@lang('main.body-item28') </p>
                <p class="center">@lang('main.body-item27')</p>
                <p class="center"><a style="color: #0bd2f5;" target="_blank" href="https://www.oktrip.mx">www.oktrip.mx </a></p>
                <br>
                <img class="" src="{{ asset('images/Oktrippanoramica2.jpg') }}" alt="" style="width:100%">
            </div>
        </div>
    </div>

    <div id="express077" class="container" style="margin-top:80px">
        <div class="row" style="margin-top:0px">
            <div class="col-sm-6">
                <p class="center">
                <h4 class="left">@lang('main.body-item29')</h4>
                </p>
                <p>@lang('main.body-item30')</p>
                <p>@lang('main.body-item31')</p>
                <p><strong>@lang('main.body-item32')</strong></p>
                <p><a style="color: #0bd2f5;" target="_blank" href="http://www.clubestrella.com.mx">www.clubestrella.com.mx </a></p>
            </div>
            <div class="col-sm-6">
                <br>
                <p class="center">&nbsp;&nbsp;<img class="" src="{{ asset('images/ClubEstrellaLogo.JPG') }}" alt="" style="img-fluid" ></p>
                <!--  <p class="center"> <img src="resources/js/js.JPG"> </p>-->
            </div>
        </div>
    </div>




@endsection
