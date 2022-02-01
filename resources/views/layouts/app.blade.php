<!DOCTYPE html>
<html lang="es">
<head>
    <title>| Adhara Express |</title>

    <meta charset="UTF-8">
    <meta name="description" content="Hotel Adhara Express con un moderno diseño especialmente orientado al ambiente de negocio, que ofrece: un restaurante de primera categoría, bar - lounge & terraza, gimnasio, alberca y salones de trabajo |Hotel Adhara Express with a modern design specially oriented to the business environment, which offers: a first class restaurant, bar - lounge & terrace, gym, pool and work rooms.">
    <meta name="author" content=" juan.alucard.02@gmail.com ; xamanjay@gmail.com">
    <meta name="keywords" content="Adhara, Adhara Express, Caribe Mexicano, Cancun, Reserva en línea tu hospedaje con nuestra tarifa mágica, somos tu mejor  opción en el centro de Cancún, nuestra ubicación es privilegiada, viajeros de negocios y placer, habitaciones muy amplias y confortables, Wifi gratis, alberca, gimnasio, desayuno buffet, transportación gratis en horario establecido sujeto a  disponibilidad, contamos  con nuestro  programa de  lealtad  Club  Estrella ,  acumula  puntos  y  obtén recompensas, reserva  en  nuestro  sitio  oficial y  obtén  grandes beneficios, hoteles en  Cancun, hoteles en  el  centro de  Cancun, Hot sale  2021 ,buen  fin 2021 ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    
    <link rel="icon" type="image/png" href="images/icons/favicon.png" />

    <link rel="stylesheet" href="{{ asset('css/style_main.css')}}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">


    <link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">
    <style> .font__tangerine {font-family: 'Tangerine', serif; font-size: 20px;} </style>


    <!-- <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet"> <style> .font_lato {  font-family: 'Lato', sans-serif; font-size: 20px; } </style>-->

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Scripts 
    <script src="{{ asset('js/app.js') }}" defer></script>-->

    <!-- Fonts 
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->

</head>

<body>

    <?php 
        $lang = 'en';
        if(App::getLocale() == 'en')
            $lang = 'es';   
    ?>

    <nav class="navbar navbar-expand-sm navbar-light shadow-sm " style="background-color: #e2e6e7;">
        
        <a class="navbar-brand" href="{{ route('home',['locale' => App::getLocale()]) }}"> 
            <img src="{{ asset('images/logo.png') }}" alt="Hotel Adhara Express"> 
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav" id="shadow_dc">
                <li class="nav-item">
                    <a class="nav-link active  " href="{{ route('inicio',['locale' => App::getLocale()]) }}" style="color: #{{  ($link1 == null or $link1 == '') ? '' : $link1  }};" >@lang('main.nav-home')</a>
                </li>                                                                                                       
                <li class="nav-item">
                    <a class="nav-link" href="">|</a>
                </li>
                <li class="nav-item">
                    
                <a class="nav-link " href="{{ route('rooms',['locale' => App::getLocale()]) }}" style="color: #{{ $link2 }};">@lang('main.nav-rooms')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">|</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('contact',['locale' => App::getLocale()]) }}" style="color: #{{ $link3 }};">@lang('main.nav-contact')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">|</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route(Route::currentRouteName(),$lang)}}"><img src="{{asset('images/flags/')}}/@lang('main.nav-flag')" width="25px" height="13px"> @lang('main.nav-lang') </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('covid',['locale' => App::getLocale()]) }}" style="color: #{{ $link4 }};"><img src="{{ asset('images/covid_shield.png') }}" width="30px" height="40px"  alt="Free covid"> @lang('main.nav-covid-label')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="{{ asset('images/icons/social_media/whatsapp.png') }}" width="35px" height="35px"> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="{{ asset('images/icons/clubestrella.png') }}" width="190px" height="40px"> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('http://facebook.com/AdharaExpress')}}" target="_blank"><img src="{{ asset('images/icons/social_media/facebook.png') }}" width="35" height="35px" alt="facebook" > </a>
                </li>
            </ul>
        </div>
    </nav>

    

    @yield('content')


    <div id="app" class="container" style="margin-top:80px">
        <div class="row" style="margin-top:80px">
            <div class="col-sm-4">
                <p class="center"> </p>
            </div>
            <div class="col-sm-4">
                <p class="center"> <img src="{{ asset('images/footer/gph_family/Hotel_Adhara_Express1.png') }}" style="img-fluid"> </p>
                <br>
                <p class="center-black">@lang('main.body-item33') </p>
                <br>
                <br>
                <p class="center"> <img src="{{ asset('images/footer/gph_family/Grupo_Peninsular_de_Hoteles_30.png') }}"> </p>
            </div>
            <div class="col-sm-4">
                <p class="center nanay"> </p>
            </div>
        </div>

        <div class="row" style="margin-top:80px">
            <div class="col-sm-4">
                <p class="center"> <img src="{{ asset('images/footer/gph_family/Grupo_Peninsular_de_Hoteles_1.png') }}" style="img-fluid"> </p>
            </div>
            <div class="col-sm-4">
                <p class="center"> <img src="{{ asset('images/footer/gph_family/Ok_trip_MX_1.png') }}" style="img-fluid"> </p>
            </div>
            <div class="col-sm-4">
                <p class="center"> <img src="{{ asset('images/footer/gph_family/Eventos_Adhara_1.png') }}" style="img-fluid"> </p>
            </div>
        </div>

        <div class="row" style="margin-top:80px">
            <div class="col-sm-4">
                <p class="center"> <img src="{{ asset('images/footer/gph_family/Adhara_Grill_1.png') }}" style="img-fluid"> </p>
            </div>
            <div class="col-sm-4">
                <p class="center"> <img src="{{ asset('images/footer/gph_family/Club_Estrella_Adhara_1.png') }}" style="img-fluid"> </p>
            </div>
            <div class="col-sm-4">
                <p class="center"> <img src="{{ asset('images/footer/gph_family/Cocodrillos1.png') }}" style="img-fluid"> </p>
            </div>
        </div>

        <div class="row" style="margin-top:80px">
            <div class="col-sm-12">
                <p class="center">
                    <hr class="new-red">
                </p>
            </div>
        </div>

        <div class="row" style="margin-top:80px">
            <div class="col-sm-12">
                <p class="center"> <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1860.3695097197567!2d-86.82930027690459!3d21.16278192360963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2smx!4v1625164322134!5m2!1sen!2smx"
                        width="400" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> </p>
                <p class="center nanay"> Av Yaxchilán 41,22, C.P. 77500 Cancún, Q.R. </p>
            </div>
        </div>

        <div class="row" style="margin-top:80px">
            <div class="col-sm-12">
                <p class="center">
                    <hr class="new-red">
                </p>
            </div>
        </div>

        <div class="row" style="margin-top:80px">
            <div class="col-sm-6">
                <p class="center manota"><a class="opt-ft-ok " data-toggle="modal" data-target="#privacidadModal">@lang('main.body-item34')</a></p>
            </div>
            <div class="col-sm-6">
                <p class="center manota"><a class="opt-ft-ok " data-toggle="modal" data-target="#myModal">@lang('main.body-item35')</a></p>         
            </div>
        </div>

        <div class="row" style="margin-top:80px">
            <div class="col-sm-2">
                <p class="center"> <img src="{{ asset('images/footer/pago_seguro1.png') }}" width="120" height="100"> </p>
            </div>
            <div class="col-sm-2">
                <p class="center"> <img src="{{ asset('images/footer/advance1.png') }}" width="120" height="100"> </p>
            </div>
            <div class="col-sm-2">
                <p class="center"> <img src="{{ asset('images/footer/ssl-300.png') }}" width="100" height="100"></p>
            </div>
            <div class="col-sm-2">
                <p class="center"> <img src="{{ asset('images/footer/security.png') }}" width="100" height="100"></p>
            </div>
            <div class="col-sm-2">
                <p class="center"> <img src="{{ asset('images/footer/mexico1.png') }}" width="100" height="100"></p>
            </div>
            <div class="col-sm-2">
                <p class="center"> <img src="{{ asset('images/footer/visa_mastercard1.png') }}" width="100" height="100"></p>
            </div>
        </div>
    </div>




<!-- Modal Terminos y Condiciones -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

	<div class="modal-dialog" role="document">

		<div class="modal-content">

			<div class="modal-header">

				<h4 class="modal-title" id="myModalLabel">@lang('main.body-item35')</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>


			</div>

			<div class="modal-body">

				<div id="about" style="font-size:12px">

					<p>
						<strong><u>INTRODUCCION</u></strong><br />Bienvenido a la página <a href="http://www.adharacancun.com">www.adharacancun.com</a> , una de las páginas de Internet publicadas y administradas por OK TRAVEL S.A. de C.V. colectivamente denominado como el&nbsp;<strong>&ldquo;Sitio&rdquo;.</strong>&nbsp;El uso que haga de este Sitio está expresamente condicionado a su aceptación de los presentes Términos y Condiciones. Al usar este sitio, manifiesta su consentimiento con los Términos y Condiciones. OK TRAVEL S.A. de C.V.  sus marcas y filiales se reservan el derecho de adicionar o modificar los Términos y Condiciones en cualquier momento. Todos los términos adicionados o modificados causarán efecto en el momento en que éstos sean actualizados. El uso continuo de este sitio incluso posterior a la publicación de los cambios realizados a los Términos y Condiciones significará que Usted acepta dichos cambios. Por favor regrese periódicamente a esta página para consultar cualquier cambio.
					</p>

					<p><strong><u>DECLARACIONES.</u></strong></p>

					<p>
						a) GPHOTELES S.A. de C.V.es un prestador de servicios turísticos para agencia de viajes (operadora), y consumidor final, con constancia de inscripción en el Registro Nacional de Turismo número ## en la Secretaría de Turismo. 
					</p>


					<p>
						b) GPHOTELES S. A. de C.V., al prestar sus servicios, observa y se obliga estrictamente a las disposiciones de la Ley General de Turismo, la Ley Federal de Protección al Consumidor y demás legislación aplicable.&nbsp;<strong>&nbsp;</strong>Así mismo se encuentra registrada ante las autoridades Hacendarias con el Registro Federal de Contribuyentes clave <strong>OKT130624DUA</strong>.
					</p>

					<p>
						c) Que su domicilio se encuentra ubicado en Avenida Carlos Nader, Manzana 1 Lotes 1 a 3, Ciudad de Cancun, Municipio Benito Juárez, Quintana Roo, C.P. 77500
					</p>

					<p>
						d) Usted declara bajo protesta de decir verdad, compareciendo por su propio y personal derecho y/o a través de su apoderado legal, que es una persona física o moral, mayor de edad, hábil, y con los medios suficientes ó con capacitad económica para obligarse bajo los presentes Términos y Condiciones, así como con interés en adquirir los servicios de intermediación y reservación que aquí se especifican, y que para ello recurre a&nbsp;&nbsp;OK TRAVEL S. A. de C.V. directamente ó a través de sus diferentes páginas de Internet  a efecto de que funja como mera&nbsp;<strong><u>intermediaria</u></strong>&nbsp;entre Usted y los Proveedores prestadores directos de servicios turísticos.
					</p>

					<p>e) Usted declara bajo protesta de decir verdad, que reconoce que los servicios proporcionados por GPHOTELES S. A. de C.V. y su Sitio, consisten&nbsp;
						<strong><u>UNICA Y EXLUSIVAMENTE EN LA INTERMEDIACIÓN ENTRE USTED Y EL PROVEEDOR DIRECTO DE LOS SERVICIOS.</u></strong><br />
					</p>

					<p><strong><u>OBJETO</u></strong><br /></p>

					<p>
						f) Que su objeto social consiste en la facultad para: Actuar como <strong><u>intermediaria</u></strong>&nbsp;para la reservación de espacios en los medios de transporte y expedir de parte de los transportistas y a favor de los turistas los boletos correspondientes; servir de&nbsp;<strong><u>intermediario</u></strong>&nbsp;entre los turistas y los prestadores de servicios de transportes de cualquier género; reservar para los turistas habitaciones y demás servicios conexos, en hoteles y establecimientos de hospedaje; prestar a los turistas servicios de reservación de sitios de atracción turística; servir de&nbsp;<strong><u>intermediario</u></strong>&nbsp;entre los demás prestadores de servicios turísticos y otras agencias de viajes; proporcionar servicio de información turística y difundir el material de propaganda de esta índole que sea de distribución gratuita. (e) Que para efectos de los presentes Términos y Condiciones, únicamente actúa como <strong><u>INTERMEDIARIA</u></strong>&nbsp;entre Usted&nbsp;&nbsp;y los Proveedores de dichos servicios turísticos, y que para tal objeto, cuenta con la capacidad técnica y administrativa, así como con los elementos materiales y humanos necesarios&nbsp; para reservar por cuenta y a petición de Usted los servicios a los que hace referencia estos Términos y Condiciones.
					</p>

					<p> g) Que con base en las Declaraciones que anteceden, acepta los presentes Términos y Condiciones </p>

					<p>
						<strong><u>USO DEL SITIO.</u></strong> <br />GPHOTELES S. A. de C.V. le otorga una licencia limitada, intransferible, revocable, para usar este Sitio de acuerdo a los presentes Términos y Condiciones. Usted debe usar este sitio solamente para solicitar o comprar reservaciones legítimas de servicios de viaje, actividades recreativas y en general todos los servicios comercializados por OK TRAVEL S. A. de C.V. en calidad de intermediación  y no lo podrá usar para ningún otro propósito, incluida pero sin limitación el hacer alguna reservación especulativa, falsa o fraudulenta. Este Sitio y el contenido referido en él, de manera enunciativa más no limitativa: los textos, párrafos, enunciados, combinación específica de palabras, letras o elementos fonéticos, gráficos, iconos de botones, marcas, logotipos, obras de diseño gráfico, fotografías, avisos comerciales, patentes, método comercial, combinación específica de colores y formas, material editorial, formatos impresos, formatos de búsqueda, descargas digitales, compilaciones de datos, códigos fuente, software, son propiedad exclusiva de OK TRAVEL S. A. de C.V. o bien cuenta con todas las Licencias y Autorizaciones para tal uso, por tanto Usted no puede copiar, reproducir, volver a publicar, cargar, modificar, transmitir o distribuir dicho contenido sin tener la autorización previa y por escrito de OK TRAVEL S. A. de C.V., excepto, en los casos (a) en que Usted descargue para ver e imprimir el material que se encuentra contenido en este Sitio ó (b) descargue o imprima el material que le sea enviado a su correo electrónico por parte de OK TRAVEL S. A. de C.V., en ambas situaciones Usted única y exclusivamente podrá utilizarlo para su uso personal, debiendo incluir el material impreso siempre la leyenda &ldquo;©&nbsp;OK TRAVEL S.A. DE C.V. Todos los derechos reservados.&rdquo; quedando estrictamente prohibida cualquier reproducción total o parcial del Sitio o cualquier uso de su contenido destinado al lucro comercial. Usted no puede usar ningún dispositivo &quot;robótico,&quot; de &quot;spider&quot; u otro dispositivo automático, programa, algoritmo o metodología que tenga procesos o funciones similares, o ningún proceso manual, para monitorear o copiar cualquiera de las páginas Web, datos o contenido, código fuente, que se encuentre en este Sitio en ningún caso y sin el consentimiento previo y por escrito de OK TRAVEL S. A. de C.V.. De acuerdo a lo anterior, Usted manifiesta estar de acuerdo en que no copiará, publicará, transmitirá, modificará o transferirá de ninguna otra manera los datos o contenido de este Sitio a ningún computador, servidor, sitio Web, o a otro medio de distribución masiva, para uso de ninguna empresa comercial, cualquier sitio, página web, o empresa nacional o extranjera que represente una actividad económica. Usted también manifiesta estar de acuerdo en que no usará ningún dispositivo de ninguna índole, software o rutina para interferir con el desempeño propio de este sitio. El uso no autorizado que Usted haga de este sitio ó cualquier reproducción total o parcial del Sitio y/o contenido y de su material, puede violar las leyes que rigen la propiedad de Derechos de Autor, Derechos de Propiedad Industrial y otras leyes. Usted deberá respetar todos los avisos sobre Derechos de Autor y Derechos de Propiedad Industrial y no podrá alterar, ocultar, o destruir ninguno de estos avisos. El uso de tal material en cualquier otro sitio web o en cualquier ambiente de computadores en red, está prohibido. Está prohibido por OK TRAVEL S. A. de C.V. que usted coloque o transmita cualquier material que vaya en contra de la ley, amenazante, injurioso, difamatorio, obsceno, indecente, pornográfico, profano, o cualquier material que pueda constituir o animar a otros a tener conductas que se puedan considerar delitos criminales, que deriven en delitos civiles, o que de cualquier otra forma violen cualquier ley. Además, Usted tiene prohibido exhibir o transmitir cualquier información que (a) infrinja los derechos que tengan otras personas, o que violen su privacidad, o derechos de publicidad, (b) esté protegida por Derechos de Autor, de Marca Registrada u otros Derechos de Propiedad, a menos que se tenga la autorización expresa y por escrito de OK TRAVEL S. A. de C.V. o del propietario de tales derechos, (c) que contenga un virus, bug o cualquier otro ítem peligroso o (d) que sea usada para confabularse ilegalmente en contra de otra persona en detrimento de su derecho a comercializar o a competir. Usted será el único responsable por cualquier daño que se cause por cualquier violación a los Derechos de Autor, de Propiedad Industrial, o a cualquier otra clase de Propiedad de Derechos, o por cualquier otro daño que se ocasione por el mal uso que usted haga de este sitio.
					</p>



					<p>
						<strong><u>EDAD Y RESPONSABILIDAD</u></strong><u>.</u> <br />Usted manifiesta, independientemente de su País de procedencia, que tiene la edad legal suficiente para usar este sitio y suscribir y obligarse ante los presentes Términos y Condiciones, así como para hacerse responsable a las obligaciones legales que lo unan con cualquier responsabilidad en que incurra por el uso de este Sitio. Usted comprende que será económicamente responsable por todo el uso que Usted haga de este Sitio y aquellos que lo usen utilizando su información para ingresar a él.
					</p>

					<p>
						<strong><u>POLITICAS DE RESERVACIÓN.</u></strong> <br />Las tarifas mostradas en el sitio Web, son solamente válidas al momento de su cotización. Las tarifas aplicarán para su respectivo cargo, solo en caso de reservar el servicio deseado, pues de lo contrario dichas tarifas pueden variar. Una reservación se considera completada, cuando Usted cuenta con un número de confirmación y el cargo correspondiente ha sido aplicado. Al momento de reservar, Usted nos autoriza de manera escrita y/o verbal a usar su número de tarjeta de crédito para realizar su pago, y confirma expresamente conocer y aceptar los presentes Términos y Condiciones así como la política de privacidad de OKTRAVEL S. A. de C. V. Todas las reservaciones están sujetas a disponibilidad al momento de procesar su solicitud. La disponibilidad no puede ser garantizada hasta haber recibido el pago total. Para algunas reservaciones (debidamente identificadas antes de llenar sus detalles de contacto y de la tarjeta de crédito), tenemos que verificar disponibilidad directamente con el departamento de reservaciones del proveedor antes de poder confirmárselas. OK TRAVEL S. A. de C.V. le pide un máximo de 24 horas para dicha verificación de disponibilidad y confirmación. Con el fin de evitar contratiempos, Usted debe imprimir su cupón correspondiente y presentarlo al momento de requerir su servicio pagado. Si Usted desea cambiar o cancelar su reservación, por favor póngase en contacto a la brevedad posible, con su Asesor de Viajes asignado, mencionando su número de reservación. OK TRAVEL S. A. de C.V. le sugiere leer cuidadosamente la cláusula correspondiente a las POLITICAS DE CANCELACION <br />Políticas de Pago <br />Al reservar en línea o por teléfono autorizas el uso de tu número de tarjeta de crédito para realizar el pago, y confirmas expresamente conocer y aceptar nuestras políticas de reservación, pago, deslinde de responsabilidad y cancelación. Todos los cambios en una reservación están sujetos a disponibilidad y re-cotización de tarifas<br />Si Usted no cuenta con alguna de estas tarjetas de crédito, puede enviarnos una transferencia bancaria. Para mayor información favor de contactar uno de nuestros Asesores de Viajes. Las tarifas publicadas en nuestro sitio están cotizadas en varios tipos de monedas, las cuales son debidamente especificadas en su momento. Pesos Mexicanos serán cobrados en Pesos Mexicanos. En el caso de cualquier otro tipo de moneda, el monto de la transacción será convertido a Dólares Americanos al tipo de cambio vigente a la fecha de la transacción. Favor de tomar en cuenta que el monto que aparecerá en su recibo de pago de su tarjeta de crédito, puede variar hasta un tres por ciento con motivo de la fluctuación internacional del tipo de cambios de divisas.&nbsp;<a href="http://www.oktrip.mx"><strong>OK TRAVEL S. A. de C.V.&nbsp;</strong></a>&nbsp;no es responsable de dicha fluctuación. Usted reconoce haber sido informado de la fluctuación del tipo de cambio y estar de acuerdo con el cargo correspondiente en Dólares Americanos. En caso de requerir factura fiscal, favor ingresar a la liga para facturación electrónica que se envía en su confirmación de itinerario. Cabe mencionar que por razones fiscales las facturas serán elaboradas después de generar el pago o después de haber disfrutado el (los) servicio(s) reservado(s).
					</p>

					<p>&nbsp; </p>

					<p>
						<strong><u>POLÍTICA DE CANCELACIÓN.</u></strong> <br />Toda solicitud de cancelación debe ser informada por Usted por escrito vía e-mail a su Asesor de Viajes asignado, mencionando su número de reservación.<strong>&nbsp;</strong><br /><strong>Para Cancelación de Reservaciones de Hoteles:</strong>&nbsp;Al momento de seleccionar el hotel de su preferencia, Usted podrá consultar en los links denominados&nbsp;<u>Política de Cancelación</u>, los términos y condiciones de cancelación aplicables para cada Hotel. No obstante de la información que Usted podrá consultar en dichos links, a continuación OK TRAVEL S. A. de C.V. le describe sus políticas generales de cancelación aplicables para la mayoría de los hoteles:&nbsp;<br />
						- Las reservaciones canceladas 15 días o más antes de la fecha de llegada están sujetas a un cargo del 10% del total de la cantidad de su reservación.<br />
						- Las reservaciones canceladas de 14 a 3 días antes de la fecha de llegada están sujetas a un cargo de 2 noches.<br />
						- Las reservaciones canceladas de 2 a 0 días antes de la fecha de llegada, o en caso de no llegar, no serán reembolsadas. De igual manera no aplican reembolsos para salidas anticipadas.&nbsp;<br />
						- Para las temporadas de Navidad, Año Nuevo y Semana Santa, las políticas de cancelación son diferentes, si desea información al respecto, por favor contacte a uno de nuestros Asesores de Viajes.<strong>&nbsp;</strong><br />
						<strong>Para Cancelación de Reservaciones de Tours y/o Transportación Terrestre:</strong>&nbsp;Al momento reservar, las políticas de cancelación aplicables para el tour o la transportación terrestre específica, se publicaran en pantalla para su conocimiento al momento de hacer su reservacion. A continuación OK TRAVEL S. A. de C.V. le describe sus políticas generales de cancelación, aplicables para la mayoría de los tours y servicios de transportación terrestre:&nbsp;<br />
						- Las reservaciones canceladas 3 días o más antes de la fecha del servicio, están sujetas a un cargo del 10% del total de la cantidad de su reservación.&nbsp;<br />
						- Las reservaciones canceladas de 2 a 0 días antes de la fecha del servicio, o en caso de no llegar, no serán reembolsadas.<br />
						OK TRAVEL S. A. DE C.V. se reserva el derecho de contratar por cuenta de&nbsp;Usted,&nbsp;los servicios a que se refiere este y se especifican en los presentes Términos y Condiciones precisamente en la calidad y/o categorías contratadas, en cuanto a transportistas, hoteles y arrendadoras de autos se refiere, independientemente del prestador último de los servicios, salvo que expresamente se convenga que estos serán prestados invariablemente por un proveedor determinado. En caso de modificación del prestador directo del servicio, este será proporcionado por otro de calidad equivalente, si&nbsp;Usted hace uso del servicio, se entenderá que consintió dicha modificación y no procederá reclamación, compensación o reembolso alguno. Una vez que&nbsp;OK TRAVEL S. A. de C.V. recibe por parte de&nbsp;Usted el importe de los servicios contratados, sean estos aéreos, terrestres, de hospedaje, en conjunto (paquete) o cualquier otro, &nbsp;OK TRAVEL S. A. de C.V. cuenta con la autorización inmediata de&nbsp;Usted para emitir, expedir o adquirir los boletos aéreos a su nombre, apegándose y aceptando tanto OK TRAVEL S. A. de C.V. como Usted las políticas de cancelación, emisión y venta de boletos de las compañías aéreas nacionales e internacionales, las políticas de expedición, emisión y venta de boletos aéreos de IATA International y a las Políticas de Reservación y Cancelación de este Sitio. En el caso concreto de los servicios contratados con empresas aéreas, tanto nacionales como extranjeras, la política de cancelación opera de la siguiente manera: Si Usted tiene conocimiento pleno y absoluto que cualquier boleto aéreo ya expedido o emitido a &nbsp;OK TRAVEL S. A. de C.V. y en consecuencia entregado a Usted o una vez que se le haya dado a conocer su número de confirmación, no es reembolsable en parte ni en la totalidad de su costo bajo ningún caso o circunstancia. Una vez expedidos los boletos aéreos a favor de Usted, OK TRAVEL S. A. de C.V. no se responsabiliza por ningún cambio de itinerario, o por cualquier cambio o error en datos proporcionados por&nbsp;Usted para la emisión de boletos aéreos como puede ser el caso de nombres, apellidos, edades, sexo, fechas, rutas, líneas aéreas, clases, categorías, etc,&nbsp;ocurriendo lo mismo para el caso de las reservaciones terrestres y de servicios marítimos o de cruceros.
					</p>

					<p>
						<strong>DESTINOS DE VIAJE</strong><br />Usted es responsable de garantizar que cumple con los requerimientos de entrada extranjeros y que sus documentos de viaje, como pasaportes y visas (de tránsito, negocios, turista u otro) están vigentes y de cumplir cualquier otro requerimiento de entrada extranjero. OK TRAVEL S. A de C. V. no tiene conocimientos específicos relacionados con los requerimientos de entrada  a extranjeros o documentos de viaje. Insistimos en que los clientes revisen las prohibiciones de viaje, advertencias, anuncios y notificaciones publicadas por los gobiernos pertinentes antes de reservar viajes a destinos internacionales.<br />Pasaporte y visa: Debe consultar con las Embajadas o Consulados pertinentes para obtener esta información. Los requerimientos pueden cambiar y debe revisar la información actualizada antes de reservar y salir. No aceptamos ninguna responsabilidad si se le niega la entrada a un vuelo o a cualquier país si no lleva el pasaporte, visa y otros documentos de viaje correctos y adecuados requeridos por cualquier línea aérea, autoridad o país, incluso países por los que solo vaya de paso. Esto incluye todas las paradas hechas por la aeronave, incluso si no tiene que salir del avión o del aeropuerto.<br />Salud: Las inoculaciones recomendadas para los viajes pueden cambiar y usted debe consultar con su médico las recomendaciones actuales antes de partir. Es su responsabilidad asegurarse de cumplir con todos los requerimientos de entrada de salud, obtener las inoculaciones recomendadas, tomar todos los medicamentos recomendados y seguir todos los consejos médicos relacionados con su viaje.<br />AL OFRECER PRODUCTOS DE VIAJE PARA DESTINOS INTERNACIONALES ESPECÍFICOS, OK TRAVEL S. A DE C. V. NO REPRESENTA NI GARANTIZA QUE EL VIAJE A DICHOS LUGARES SEA ACONSEJABLE O LIBRE DE RIESGOS Y NO SERÁ RESPONSABLE DE DAÑOS O PÉRDIDAS QUE PUEDAN RESULTAR DE VIAJAR A DICHOS DESTINOS.
					</p>

					<p>
						<strong><u>RESPONSABILIDADES</u></strong><br />GPHOTELES S. A. de C.V. presta servicios en calidad de intermediario entre el cliente y el prestador de los bienes y servicios publicados en este sitio web. OK TRAVEL S. A. de C.V. establece negociaciones comerciales dentro de sus propios estándares de calidad y servicio, tales como, pero no limitados a, hospedaje, transportación terrestre, transportación aérea, eligiendo sólo a los proveedores más calificados y de mayor prestigio del mercado.<br />Por este medio el cliente autoriza a OK TRAVEL S. A. de C.V., a actuar como mediador en la contratación de los distintos servicios elegidos, para conformar su paquete turístico.<br />El servicio de mediación mercantil es realizado directamente por OK TRAVEL S. A. de C.V., desde su centro de operaciones situado en la Ciudad de Cancún, Quintana Roo, utilizando su plataforma tecnológica, independientemente de la forma en la que se realice la compra, ya sea a través de Internet, puntos de atención a clientes, atención telefónica o cualquier otra forma de contacto.<br />En caso de contratación de Paquetes de Viaje en el extranjero, el cliente acepta que el aprovechamiento de los mismos será realizado fuera de territorio nacional, motivo por el cual OK TRAVEL S. A. de C.V. traslada el Impuesto al Valor Agregado a la tasa del 0%, de conformidad con lo dispuesto por el artículo 29, fracción IV, de la LIVA.<br />La adquisición de &quot;Paquetes de Viaje&quot; con destino en el extranjero, que incluyan el servicio de transportación aérea iniciado en territorio nacional, OK TRAVEL S. A. de C.V., traslada el Impuesto al Valor Agregado a la tasa del 11%, únicamente sobre la parte que represente el 25% de dicho medio de transporte.<br />Las fotografías mostradas en su portal de Internet son con fines representativos y no garantizan que a su llegada, todo sea exactamente igual como aquí se describe
					</p>

					<p>
						La categoría de estrellas asignada a los hoteles, está basada en la interpretación de GPHOTELES S. A. de C.V. determinada por la gama de instalaciones y servicios con que cuenta cada hotel así como su estado de conservación y mantenimiento por lo que puede diferir de las categorías reportadas en otros lugares. <br />Las descripciones de los servicios de viaje son actualizadas por OK TRAVEL S. A. de C.V. de manera constante pero no garantizan que todo será exactamente igual a tu llegada.
					</p>

					<p>OK TRAVEL S. A. de C.V. se reserva el derecho de rechazar a cualquier persona o cliente en el momento que considere necesario. </p>

					<p>
						Cualquier reclamación o notificación por escrito en contra de GPHOTELES S. A. de C.V., deberá ser recibida a más tardar treinta (30) días después de concluido el viaje.&nbsp;<br /><br />Usted deberá responder de los daños que genere a OK TRAVEL S. A. de C.V., que resulten de cualquier mal uso o uso incorrecto que pudiera hacer del Sitio, o sobre cualquier operación fraudulenta o con fines contrarios a los servicios prestados en el sitio o aquellos que vayan en contra de las leyes y reglamentos vigentes y aplicables.
					</p>

					<p>
						<strong><u>ENLACES.</u></strong> <br />Este Sitio contiene enlaces a otros sitios Web los cuales se proporcionan únicamente para su conveniencia y no como respaldo a GPHOTELES S. A. de C.V. y ellos pertenecen a los proveedores o distribuidores terceras partes de los contenidos de tales otros sitios Web. OK TRAVEL S. A. de C.V. no será responsable por el contenido de ningún otro sitio Web y no representa o garantiza ningún otro sitio Web o el contenido o material de tales sitios. Si Usted decide acceder a otros sitios Web, lo hace bajo su propia responsabilidad.
					</p>

					<p>
						<strong><u>SITIOS FACEBOOK, TWITTER, YOU TUBE.</u></strong> <br />Este Sitio contiene enlace a diversas páginas sociales, entre ellas, las páginas de Facebook con nombre de usuario:&nbsp;<strong>OK TRIP, </strong>&nbsp;página de twitter con nombre de usuario: @OKTRIP y You Tube con usuario&nbsp;<strong>OK TRIP.</strong>&nbsp;cuentas administradas por OK TRAVEL S. A. de C.V.; Usted reconoce que dichas páginas son exclusivamente para uso informativo y difusión social de OK TRAVEL S. A. de C.V.; Por lo tanto OK TRAVEL S. A. de C.V. no será responsable de manera enunciativa más no limitativa por el contenido, información, publicación de terceros, comentarios, fotografías, videos, contenido de <em>&ldquo;hashtags&rdquo;</em>, ni cualquier otro material fuera del alcance de la administración directa de OK TRAVEL S. A. de C.V., ni por el material que compartido en dichos sitios sociales por Usted o cualquier tercero y fuera de la administración de OK TRAVEL S. A. de C.V. pueda violar los derechos de propiedad industrial o derechos de autor. Usted es responsable del uso que le pueda dar a dichos sitios, y Usted libera de toda responsabilidad a OK TRAVEL S. A. de C.V. por cualquier uso incorrecto o mal intencionado que pudiera hacer de los mismos, o por publicaciones, información, comentarios, y material diverso que pudiera resultar ofensivo, insidioso, erróneo, pornográfico o que pudiera incitar a la violencia, rebelión, huelga, o cualquier actividad no permitida por la ley y las buenas costumbres.
					</p>

					<p>
						<strong><u>CLIMA.</u></strong> <br />Este Sitio le proporciona a Usted el servicio de información y actualización del clima, mismo que se publica única y exclusivamente para fines informativos; Usted deslinda de la responsabilidad a  <a href="http://www.oktrip.mx">www.oktrip.mx</a>  y OK TRAVEL S. A. de C.V. por cualquier inconsistencia, inexactitud o información publicada dentro de su servicio del Clima, OK TRAVEL S. A. de C.V. no se hace responsable por cualquier cambio en las condiciones climáticas, ello por encontrarse fuera del control absoluto de OK TRAVEL S. A. de C.V., por tanto Usted reconoce y libera de toda responsabilidad a OK TRAVEL S. A. de C.V. de manera limitativa, más no enunciativa, sobre cualquier, reclamación, reembolso, queja, compensación, crédito, cambio, cancelación, inconveniencias, molestias, accidente, heridas, enfermedades, pérdidas físicas o materiales, daños, detrimento o afectación en su persona o en su patrimonio, muerte y todas aquellas derivadas de las condiciones climáticas de cualquiera de los destinos ofertados por OK TRAVEL S. A. de C.V.. en cualquiera de sus páginas propias y afiliadas.
					</p>

					<p>
						<strong><u>MAPAS.</u></strong> <br />Este Sitio le proporciona a Usted el enlace exclusivamente para fines informativos de Google Maps ©, respecto de la ubicación de diversos servicios proporcionados por OK TRAVEL S. A. de C.V.; Usted reconoce que los mapas mostrados en el Sitio, así como la ubicación de tales servicios, son únicamente para fines de ubicación y localización aproximada, no obstante, Usted reconoce y conviene que al hacer uso de los mapas, Usted se sujeta a los términos y condiciones de uso que establece Google Maps ©, por lo que Usted libera a OK TRAVEL S. A. de C.V. de cualquier responsabilidad derivada de cualquier inconsistencia respecto a la ubicación o direcciones mostradas en los mapas, libera a OK TRAVEL S. A. de C.V. sobre cualquier desorientación, o cualquier pérdida de ubicación que pudiera sufrir derivada del uso de los mapas y libera a OK TRAVEL S. A. de C.V. de manera enunciativa mas no limitativa sobre cualquier cambio, reembolso, queja, cancelación, recargos, no show, reclamo, crédito, compensación y cualquier otro que pudiera derivar de las inconsistencias o uso inapropiado de los mapas publicados en este Sitio y propiedad exclusiva de Google Maps ©
					</p>

					<p>
						<strong><u>INFORMACIÓN VERDADERA.</u></strong> <br />Usted &nbsp;reconoce y acepta su total obligación y responsabilidad de proporcionar datos veraces y correctos sobre las edades, sexo, nombres o apellidos tanto de Usted como de los demás usuarios-turistas que lo acompañen o que lo comisionen para hacer uso de éste Sitio, así como de los datos e información completa para la formación del itinerario y la reservación de servicios terrestres y marítimos (hoteles, visitas, autos de alquiler, restaurantes, cruceros, etc) liberando a&nbsp;OK TRAVEL S. A. DE C.V. de cualquier responsabilidad por cambios de itinerario generados por datos mal proporcionados, o por cualquier error en los datos proporcionados por&nbsp;Usted para la emisión o compra de boletos aéreos como puede ser el caso de edades, sexo, nombres, apellidos, fechas, formas de pago, rutas, líneas aéreas, horarios, clases, categorías, condiciones especiales, etc., apegándose en su caso a las cláusulas de cancelación para servicios aéreos, terrestres, marítimos o de cruceros expresadas en estos Términos y Condiciones
					</p>

					<p>
						<strong><u>LIMITACIÓN DE RESPONSABILIDAD.</u></strong> <br />OK TRAVEL S. A. DE C.V. No será responsable, ni asume ninguna responsabilidad  por cualquier daño o virus que pueda infectar  su computadora o cualquier otra propiedad  de ustede debido al acceso , uso o navegación que realice en este sitio, o por la descarga de cualquier material, dat, texto, imagen, video o audio desde el cualquiera de los sitios de OKTRAVEL S. A. de C. V. En ningún caso OK TRAVEL S. A. DE C.V. será responsable por cualquier lesión, daño, perjuicio, pérdida, reclamo o cualquier daño especial o punitivo, indirecto, incidental por negligencia, o ilícito que resulte de:
					</p>

					<ol>
						<li>Cualquier uso de este sitio o del contenido que aquí se encuentra</li>
						<li>Cualquier falla o demora (incluyendo sin que haya límite de uso o la imposibilidad de usar cualquier componente de este sitio para los servicios de reservación o emisión de boletos</li>
						<li>El funcionamiento o no funcionamiento del proveedor. Incluido, pero sin estar limitado a, el no funcionamiento resultado de la bancarrota, reorganización, declaración de insolvencia, disolución o liquidación </li>

					</ol>

					<p>
						<strong>LIBERACIÓN DE RESPONSABILIDAD</strong><br />La información, software, productos y servicios que se publiquen en el sitio pueden contener errores o inexactitudes, incluyendo errores de precios. Las compañía COMPAÑÍA OKTRAVEL S. A DE C. V. y sus filiales no garantizan la exactitud de, y no asumen responsabilidad alguna por las inexactitudes o errores relacionados con la información y descripción de los productos y servicios Turísticos de Hoteles, Aviones, Cruceros, Automóviles y similares exhibidos en el sitio (incluyendo, sin limitación, los precios, fotografías o imágenes, lista  de amenidades de los hoteles, descripción general de los productos, etc.). Adicionalmente, OKTRAVEL S. A DE C. V. expresamente se reserva el derecho de corregir cualquier error de los precios en el sitio y/o en reservaciones pendientes que hubieren sido realizadas con base en un precio incorrecto. En este caso, de ser posible le brindaremos la oportunidad de mantener la reservación con base en el precio correcto o cancelaremos su reservación sin penalización.
					</p>

					<p>
						LA COMPAÑÍA GPHOTELES S. A DE C. V., o filiales y/o sus respectivos proveedores no hacen manifestación o garantía alguna respecto a que la información, software, productos y servicios contenidos en el sitio sean adecuados o útiles para cualquier finalidad. El hecho que se incluyan u ofrezcan productos o servicios en el sitio no significa que la compañía OKTRAVEL S.A. de C.V. o sus filiales los patrocinen o recomienden. La información, software, productos y servicios se proporcionan &ldquo;como están&rdquo; sin garantía alguna. La compañía OK TRAVEL S. A DE C. V. , fliales y/o sus respectivos proveedores no aceptan ni asumen garantías o condiciones respecto a que el sitio , sus servidores y correos electrónicos enviados por las compañía OK TRAVEL S. A DE C. V. filiales y/o sus respectivos proveedores, se encuentren libres de virus u otros componentes dañinos. <br />Los transportista, hoteles y otros proveedores o prestadores de servicios turísticos o de cualquier otra clase del sitio, son contratistas independientes y no son empelados o agentes de la compañía
					</p>

					<p>
						GPHOTELES S. A DE C. V. o las filiales no son responsables de los actos, errores, omisiones, manifestaciones, garantiaas, incumplimientyo o negligencia de cualquiera de dichos proveedores o prestadores de servicio o por cualquier lesión, muerte, daños personales, o cualquier otro daño o gasto que de ahí se deriven.
					</p>

					<p>LA COMPAÑÍA GPHOTELES S. A DE C. V. y sus filiales, no tienen responsabilidad alguna y no efectuaran reembolso alguno con motivo de demoras, cancelaciones, sobrecupo, huelga, caso fortuito fuerza mayor o cualquier otra causa fuera de control directo, así como tampoco tienen responsabilidad alguna relacionada con cualquier gasto adicional, omisión, demora, cambios de ruta o actos de cualquier autoridad o gobierno</p>

					<p>
						La empresa de GPHOTELES S. A DE C. V., y/o afiliados o sus respectivos proveedores, por ninguna razón y en ningún caso son responsables de la cualquier daño directo , indirecto punitivo incidental, especial, consecuencial, compensatorio u otro que surja de o en conexión con la entrada, exhibición o uso del sitio con el retraso o incapacidad para entrar, mostrar, exhibir o utilizar este sitio (incluso pero sin limitarse a hacerlo confiar en opiniones que aparecen en el sitio, virus de computadoras, información, software, enlaces a otros sitio, productos y servicios obtenidos a través del sitio  u otra cosa que surja de acceso a visualización de o uso del sitio), sin considerar que si se basa en una teoría de negligencia, contrato, procedimiento fraudulento, responsabilidad absoluta directa, estatutos de protección al consumidor u otros e incluso en caso de que la empresa OK TRAVEL S. A DE C. V., sus afiliados o sus proveedores  han sido advertidos de la posibilidad de daños<br /><br />Si, a pesar de las limitaciones anteriores, se llegare a determinar que la Compañía OK TRAVEL S. A de C. V., y sus respectivos proveedores son responsables de cualquier daño o perjuicio que derive de o bien en cualquier forma se encuentre relacionado con cualquiera de los supuestos descritos anteriormente, entonces la responsabilidad de la Compañía OK TRAVEL S. A de C. V.,  y/o de sus respectivos proveedores, en ningún caso excederá, en su conjunto, del importe mayor entre la tarifa de servicios que usted hubiere pagado a OK TRAVEL S. A de C. V.,  en relación con tales operaciones realizadas en el Sitio, o Mil Pesos mexicanos o su equivalente en moneda local.<br />Las limitaciones y excluyentes de responsabilidad reflejan la distribución de riesgos entre las partes. Las limitaciones contenidas en el presente apartado subsistirán y serán aplicables aún en el supuesto que se llegare a determinar que alguna de las disposiciones en particular no cumple con su finalidad esencial. Las limitaciones y excluyentes de responsabilidad se establecen en beneficio de las Compañías OK TRAVEL S. A de C. V., y/o sus respectivos proveedores.
					</p>

					<p>&nbsp;</p>

					<p>
						<strong><u>DESLINDE DE RESPONSABILIDAD</u></strong><br />OK TRAVEL S. A. de C.V. no asumirá responsabilidad por ninguna reclamación, costo o gasto producido por heridas personales o de terceras personas, accidentes o deceso, pérdida o daños de objetos personales, falta de diversión, enojo, desilusión, angustia o frustración (ya sea mental o física) que resulte de las siguientes causas:
					</p>

					<ol>

						<li>Actos u omisiones de cualquiera otra persona que no sea OK TRAVEL S. A. de C.V. o sus empleados; </li>

						<li>Enfermedad, robo, disputas laborales, huelgas, fallas mecánicas, cuarentena, acciones gubernamentales, condiciones climáticas, o cualquier otra causa ajena al control directo de OK TRAVEL S. A. de C.V.; </li>

						<li>Imposibilidad del cliente para viajar por no contar con los documentos requeridos tales como, pero no limitados a pasaportes con al menos 6 meses de vigencia después de la fecha de inicio del viaje, visas, identificación personal, recetas o documentos médicos y certificados. OK TRAVEL S. A. de C.V. no es responsable frente al cliente o cualquier tercero debido a la imposibilidad o falta de documentos del cliente. </li>

						<li>Incumplimiento del cliente en seguir instrucciones incluyendo, pero no limitadas a horarios de salida de vuelos, hora y fecha de entrada y salida en hoteles, y políticas de canje de cupones; </li>

						<li>En caso de Cancelación o cambio por cualquier razón de los servicios de viaje ofrecidos. OK TRAVEL S. A. de C.V. se reserva el derecho de cancelar o cambiar los servicios publicados, pero se tratará de sustituirlos con servicios similares. Si una reservación debe ser cancelada, la responsabilidad de OK TRAVEL S. A. de C.V. estará limitada al reembolso de todo el dinero pagado por el cliente; </li>

						<li>No aplican reembolsos totales en situaciones en las que el viaje tenga que ser cancelado, interrumpido o pospuesto por OK TRAVEL S. A. de C.V. por razones que estén fuera de su control (causas de fuerza mayor, tales como, pero no limitadas a, condiciones climáticas, huracanes, terremotos, huelgas, guerras, actos de terrorismo, etc.) y en los que las obligaciones contractuales de OK TRAVEL S. A. de C.V. con sus proveedores no le permitan obtener reembolso de la suma pagada o a ser pagada al proveedor por cuenta del cliente. En estos casos, OK TRAVEL S. A. de C.V. se reserva el derecho de retener un 10% del total de la cantidad pagada por la reservación como gasto administrativo. </li>

						<li>A pesar de que actualizamos las tarifas de manera constante, en casos remotos existe la posibilidad de que haya cambios en las tarifas sin previo aviso por contingencias o causas de fuerza mayor. En estos casos, es posible que el proveedor no tenga forma de actualizar rápidamente las tarifas en la base de datos de OK TRAVEL S. A. de C.V., OK TRAVEL S. A. de C.V. hace revisiones periódicas donde es posible que haya diferencias entre el precio pagado por la reservación y el precio requerido para usar el servicio. En caso de haber cambios en las tarifas, si ésta resulta en un precio menor, se cobrará ese precio y se reembolsará la diferencia. Si resulta en un precio mayor, uno de nuestros Asesores de Viaje se pondrá en contacto con usted y le informará sobre el cambio. Si no está de acuerdo, OK TRAVEL S. A. de C.V. le reembolsará el 100% del monto pagado, pero no se hace responsable por reclamaciones o inconvenientes derivados del cambio de tarifas o la cancelación de la reservación. </li>

					</ol>

					<ol start="8" type="1">

						<li>Las      fotografías mostradas en el (los) portal (es)  de Internet propiedad de o administradas      por OK TRAVEL S.A de C.V son con fines representativos y no garantizan que      a su llegada, todo sea exactamente igual como se describe en los sitios de      OK TRAVEL S. A. de C. V. </li>

						<li>La      categoría de estrellas asignada a los hoteles, está basada en la      interpretación de OK TRAVEL S. A. de C.V. y / o  la información proporcionada por el      hotel, por lo tanto  puede diferir      de las categorías reportadas en otros lugares. </li>

						<li>Las      descripciones de los servicios de viaje son actualizadas por OK TRAVEL S.      A. de C.V. de manera constante pero no garantizan que todo será      exactamente igual a su llegada. Ya sea por mejoras en las instalaciones      afectaciones de uso, influencia de las condiciones climáticas o por obras      de mantenimiento de equipo e instalaciones o cualquier otra causa. </li>

						<li>OK      TRAVEL S. A. de C.V. se reserva el derecho de rechazar a cualquier persona      o cliente en el momento que considere necesario por incurrir en conducta      inapropiada, alteración del orden público, comunicación obscena o lenguaje      ofensivo, por acoso de toda índole o bien por presentarse en estado de      ebriedad o bajo los efectos de drogas y narcóticos o cualquier otra causa      que vulnere o afecte en cualquier manera los intereses, propiedad, imagen      y operación de OK TRAVEL S. A. de C.V. o sus proveedores </li>

						<li>OK      TRAVEL S. A. de C.V. habiendo rechazado o cancelado los servicios      solicitados por aquellos clientes cuya conducta  sea inapropiada  o incurran en la alteración del orden      público, comunicación obscena o lenguaje ofensivo, por acoso de toda      índole o bien por presentarse en estado de ebriedad o bajo los efectos de      drogas y narcóticos o cualquier otra causa que vulnere o afecte en      cualquier manera los intereses, propiedad, imagen y operación  de OK TRAVEL S. A. de C.V. o sus      proveedores, estará en libertad de ejercer su derecho para realizar las      diligencias necesarias y proceder legalmente ante las instancias correspondientes,      para demandar el resarcimiento y compensación por los daños  que pudiera haber recibido por las      acciones impropias del cliente. </li>

						<li>Cualquier      reclamación o notificación por escrito en contra de OK TRAVEL S. A. de      C.V., deberá ser recibida a más tardar con treinta (30) días después de concluido      el viaje </li>

					</ol>

					<p>
						<u>Imposibilidad De Firma Manuscrita. </u><br />Debido a las especiales características de la contratación a distancia, el CLIENTE reconoce la imposibilidad de firmar la carta de pago, entendida como aquel documento mediante el cual se presta habitualmente la conformidad de la transacción. Es por ello que renuncia a la firma del mismo para toda transacción electrónica generada como consecuencia de la reserva a través de la Integración XML de OK TRAVEL S. A. de C.V. y/o sus proveedores
					</p>

					<p>
						RESPONSABILIDAD DEL CLIENTE<br />El CLIENTE será responsable de la conducta de los consumidores finales en casos de comportamiento anormal o vandálico. En este supuesto, OK TRAVEL S. A. de C.V. se reserva el derecho de cancelar automáticamente la estancia o reservas del consumidor final sin abono de compensación alguna. Igual derecho, y para el mismo caso, asistirá al establecimiento de alojamiento en que estuvieren alojados o, en su caso, al proveedor de los servicios de traslados o excursiones.
					</p>


					<p>El CLIENTE abonará a OK TRAVEL S. A. DE C. V. cualquier cantidad derivada de las conductas y conceptos antes expresados que le fuera reclamada por cualquier tercero. Asimismo, las incidencias que puedan ser resueltas durante la estancia de los consumidores finales en el establecimiento de alojamiento deberán ser resueltas directamente por el CLIENTE</p>


					<p>
						<strong>REGLAS Y RESTRICCIONES DE PROVEEDORES</strong><br />Las reservaciones y compras de bienes y servicios turísticos se encuentran sujetos a términos y condiciones adicionales. Por favor lea cuidadosamente estos términos y condiciones adicionales. Usted está de acuerdo en sujetarse a los términos y condiciones de compra establecidos por un proveedor con el que usted elige llevar a cabo una operación, incluyendo pero no limitado a pagar oportunamente cualquier adeudo, así como cumplir las reglas y restricciones establecidas por el proveedor en relación con el uso y disponibilidad de tarifas, productos y servicios. Los vuelos solo se garantizan una vez que la compra se ha completado y se hayan emitido los boletos. Las compañías aéreas y otros proveedores de viaje pueden cambiar los precios sin previo aviso. Nos reservamos el derecho de cancelar su reservación si no se recibe oportunamente el pago completo. Es factible que al momento de registrarse algunos hoteles le soliciten que presente una tarjeta de crédito o entregue un depósito en efectivo para cubrir gastos adicionales. Dicho depósito es ajeno a cualquier pago que OK TRAVEL S. A de C. V., hubiere recibido con motivo de su reservación. Usted reconoce que algunos terceros que ofrecen ciertos servicios y/o actividades le pueden solicitar que suscriba una liberación o responsabilidad para poder participar en los servicios y/o actividades. Usted entiende que la violación de cualquiera de las reglas o restricciones anteriores, pueden tener como consecuencia la cancelación de su reservación, que se le niegue el acceso a los productos o servicios turísticos, que usted pierda cualquier cantidad que hubiere entregado para dicha reservación y/o que OK TRAVEL S. A de C. V. debite de su cuenta cualquier gasto en el que tenga que incurrir derivado de su incumplimiento.
					</p>


					<p>
						<strong><u>RESPETO DE LOS REGLAMENTOS Y CONDICIONES DE LOS SERVICIOS.</u></strong> <br />Usted se compromete a apegarse y a respetar los reglamentos y condiciones de servicio establecidas por cada uno de los Proveedores y prestadores directos de servicios contratados por Usted a través de la intermediación de&nbsp;OK TRAVEL S. A. DE C.V., por lo que&nbsp;OK TRAVEL S. A. DE C.V. debe hacer de su conocimiento las que sean más importantes, no obstante el Proveedor podrá hacer de su conocimiento nuevas o adicionales condiciones de servicio sobre las cuales OK TRAVEL S. A. de C.V. no tiene responsabilidad alguna y en consecuencia declina cualquier responsabilidad que pudiera derivar por su incumplimiento. Así mismo,&nbsp;Usted deberá por medios propios proveerse de los pasaportes o documentos de migración requeridos por las autoridades de los Estados Unidos Mexicanos, y de los países de destino o de tránsito, tales como visas, permisos sanitarios, y todos aquellos documentos requeridos por las autoridades Aduaneras, Aéreas, Marítimas, Aeroportuarias, Federales, Estatales, Municipales etc., que resulten necesarias para realizar su viaje, liberando a OK TRAVEL S. A. de C.V. sobre cualquier problema que llegare a surgir con dichas autoridades. En los casos de viajes internacionales Usted se compromete a presentarse en los aeropuertos y documentarse ante las aerolíneas mínimo con&nbsp;TRES HORAS DE ANTICIPACION en vuelos internacionales&nbsp; y DOS HORAS DE ANTICIPACION en vuelos nacionales, salvo la instrucción expresa y por escrito que reciba de&nbsp;OK TRAVEL S. A. de C.V. y/o alguna otra instrucción para presentarse aún antes por parte dichas Autoridades.
					</p>

					<p>
						<strong><u>DERECHOS DE AUTOR</u></strong><u>.</u> <br />Usted reconoce de manera enunciativa más no limitativa que todos los textos, párrafos, enunciados, combinación específica de palabras, letras o elementos fonéticos, gráficos, iconos de botones, obras de diseño gráfico, fotografías, combinación específica de colores y formas, material editorial, formatos impresos, formatos de búsqueda, descargas digitales, compilaciones de datos, códigos fuente, software, programas de computación, bases de datos, anuncios publicitarios, que aparecen ó funcionan en este Sitio, constituyen Derechos de Autor que se encuentran registrados o en proceso de registro y son propiedad exclusiva de OK TRAVEL S. A. de C.V. o del proveedor que presta el servicio, con titularidad de derechos patrimoniales, o sobre los cuales se cuenta con Licencia de uso o Autorización respectiva y fueron proporcionadas para el uso del Sitio, por tanto Usted no puede copiar, reproducir, volver a publicar, cargar, publicar, transmitir, modificar o distribuir dichos derechos ni el contenido de este Sitio, sin tener la autorización previa y por escrito de OK TRAVEL S. A. de C.V., excepto, en los casos (a) en que Usted descargue para ver e imprimir el material que se encuentra contenido en este Sitio ó (b) descargue o imprima el material que le sea enviado a su correo electrónico por parte de OK TRAVEL S. A. de C.V., en cuyas situaciones, Usted única y exclusivamente podrá utilizarlo para su uso personal, debiendo incluir la leyenda OK TRAVEL S. A. de C.V Todos los derechos reservados.&rdquo;. En razón de lo anterior, nada de lo contenido en este Sitio incluyendo los derechos protegidos por la Ley Federal de Derechos de Autor aplicable, y por las Leyes y Tratados Internacionales, podrá ser considerado por Usted como una licencia o derecho a usar cualquiera de estos Derechos de Autor sin el previo consentimiento por escrito de OK TRAVEL S. A. de C.V.. Y se le prohíbe usarlas en cualquier aplicación que no sea permitida por OK TRAVEL S. A. de C.V. o cualquier otro uso comercial. Usted acuerda en no alterar los Derechos de Autor de OK TRAVEL S. A. de C.V. en modo alguno, ni se permitirá la acción que de cualquier manera que pueda menoscabar, denigrar o disminuir los Derechos de Autor de OK TRAVEL S. A. de C.V.. Usted se compromete a no colocar todo o en parte de los Derechos de Autor de OK TRAVEL S. A. de C.V. como publicidad en internet sin previo consentimiento por escrito de OK TRAVEL S. A. de C.V..&nbsp; Usted reconoce que el uso o impresión para su uso particular de los Derechos de Autor de OK TRAVEL S. A. de C.V. no le otorgará a Usted ningún derecho, título o interés en materia de Derechos de Autor. OK TRAVEL S. A. de C.V. se reserva el derecho de vigilar la calidad del uso de sus Derechos de Autor, además, notificará a Usted de inmediato por escrito en el caso de percatarse de la existencia de cualquier violación de sus Derechos de Autor. Cualquier uso inapropiado del contenido y de los Derechos de Autor de este Sitio es susceptible de violación de las Leyes Federales de Derechos de Autor, Mexicanas y Extranjeras, de Tratados Internacionales así como derechos consignados en el Código Civil, Penal y de Comercio. Si Usted incurriera en algún uso inapropiado del contenido y Derechos de Autor de este Sitio, OK TRAVEL S. A. de C.V. tendrá el derecho de requerirle (a) que deje de utilizar el contenido y Derechos de Autor del Sitio, (b) que deje de copiar total o parcialmente, reproducir, volver a publicar, cargar, publicar, transmitir, distribuir o modificar el uso del contenido y de los Derechos de Autor de este Sitio (c) podrá requerirle establecer un uso adecuado de los Derechos de Autor o bien (d) podrá iniciar los procedimientos legales necesarios para defender sus Derechos de Autor.
					</p>

					<p>
						<strong>POLÍTICAS DE PRIVACIDAD</strong><br />OK TRAVEL S. A de C. V., Inc. cree en proteger su privacidad. Por favor siga esta liga para revisar nuestras Políticas de Privacidad vigentes, que también rige el uso del Sitio, y comprender nuestras prácticas:&nbsp;<a href="privacidad.php">Políticas de Privacidad</a>
					</p>



				</div>

			</div>

			<div class="modal-footer">

				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>

		</div>

	</div>
</div>


<!-- Modal Politica de Privacidad -->

<div class="modal fade" id="privacidadModal" tabindex="-1" role="dialog" aria-labelledby="privacidad">

	<div class="modal-dialog" role="document">

		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="privacidad">@lang('main.body-item34')</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

			</div>

			<div class="modal-body">

				<div id="about2" style="font-size:12px">

					<p>
						<br /><strong>OKTRAVEL SA DE CV</strong>,  Identificado también como <strong>OKTRIP</strong>, para fines prácticos y en cumplimiento con lo dispuesto por la Ley,   con domicilio en Av. Carlos Nader lotes 1, a 3, Interior B, Manzana 1, SM 2, Ciudad de Cancún, municipio Benito Juárez, CP 77500, en la entidad de Quintana Roo, país México, cuyo portal de internet es <a href="http://www.oktrip.mx">www.oktrip.mx</a>,  es el responsable del uso y protección de sus datos personales, y al respecto le informamos lo siguiente:
					</p>

					<p>
						<strong>¿Para qué fines utilizaremos sus datos personales?</strong><br />Los datos personales que recabamos de usted, los utilizaremos para las siguientes finalidades que son necesarias para el servicio que solicita:
					</p>

					<ul>
						<li>Procesar solicitudes de Servicios de Viaje</li>
						<li>Realizar el cobro de los servicios de Viaje solicitados y reservados</li>
						<li>Emitir la confirmación de los Servicios de Viaje contratados</li>
						<li>Hacer llegar información relacionado con los servicios de viaje contratados, cambios, cancelaciones, avisos, suplementos de viaje</li>
						<li>Mercadotecnia o publicidad para informarle sobre beneficios, ofertas y novedades sobre viajes y turismo</li>
						<li>Inscripción en nuestros programas de CRM (<strong>C</strong>ustomer <strong>R</strong>elationship <strong>M</strong>anagement)</li>
						<li>Prospección comercial</li>

					</ul>

					<p>
						<strong>¿Qué datos personales utilizaremos para estos fines?</strong><br />Para llevar a cabo las finalidades descritas en el presente aviso de privacidad, utilizaremos los siguientes datos personales:
					</p>

					<ul>
						<li>Nombre</li>
						<li>Estado Civil</li>
						<li>Registro Federal de Contribuyentes(RFC)</li>
						<li>Clave única de Registro de Población (CURP)</li>
						<li>Lugar de nacimiento</li>
						<li>Fecha de nacimiento</li>
						<li>Nacionalidad</li>
						<li>Domicilio</li>
						<li>Teléfono particular</li>
						<li>Teléfono celular</li>
						<li>Correo electrónico</li>
						<li>Edad</li>
						<li>Puesto o cargo que desempeña</li>
						<li>Domicilio de trabajo</li>
						<li>Correo electrónico institucional</li>
						<li>Teléfono institucional</li>
						<li>Trayectoria educativa</li>
						<li>Títulos</li>
						<li>Pasatiempos</li>
					</ul>

					<p>
						<strong>¿Cómo puede acceder, rectificar o cancelar sus datos personales, u oponerse a su uso?</strong><br />Usted tiene derecho a conocer qué datos personales tenemos de usted, para qué los utilizamos y las condiciones del uso que les damos (Acceso). Asimismo, es su derecho solicitar la corrección de su información personal en caso de que esté desactualizada, sea inexacta o incompleta (Rectificación); que la eliminemos de nuestros registros o bases de datos cuando considere que la misma no está siendo utilizada adecuadamente (Cancelación); así como oponerse al uso de sus datos personales para fines específicos (Oposición). Estos derechos se conocen como derechos ARCO.
					</p>

					<p>Para el ejercicio de cualquiera de los derechos ARCO, usted deberá presentar la solicitud respectiva a través del siguiente medio:</p>

					<ul>
						<li>Envío de correo electrónico a <a href="mailto:privacidad@oktravel.mx">privacidad@oktravel.mx</a>  &nbsp;&nbsp;&nbsp; <a href="#">Ver forma ARCO</a></li>

					</ul>


					<p>
						Con relación al procedimiento y requisitos para el ejercicio de sus derechos ARCO, le informamos lo siguiente:<br />
						a) ¿A través de qué medios pueden acreditar su identidad el titular y, en su caso, su representante, así como la personalidad este último?<br /><strong>R=</strong> Registro On Line
					</p>

					<p> b) ¿Qué información y/o documentación deberá contener la solicitud?<br /><strong>R= </strong>Usuario y contraseña</p>
					<p> c) ¿En cuántos días le daremos respuesta a su solicitud?<br /><strong>R= </strong>24 hrs.</p>
					<p> d) ¿Por qué medio le comunicaremos la respuesta a su solicitud?<br /><strong>R= </strong>Vía e-mail</p>
					<p> e) ¿En qué medios se pueden reproducir los datos personales que, en su caso, solicite?<br /><strong>R= </strong>Ninguno</p>
					<p>
						f) Ponemos a sus órdenes los siguientes formularios o sistemas para facilitar el ejercicio de derechos ARCO:<br /><strong>R= </strong>Hoja de Perfil y / o registro
					</p>
					<p>
						g) Para mayor información sobre el procedimiento, ponemos a disposición los siguientes medios:<br /><strong>R= </strong>Número telefónico  (52) 998 140 65 70<br />Correo electrónico <a href="mailto:privacidad@oktravel.mx">privacidad@oktravel.mx</a>
					</p>

					<p>Los datos de contacto de la persona o departamento de datos personales, que está a cargo de dar trámite a las solicitudes de derechos ARCO, son los siguientes:</p>

					<ul>

						<li>Nombre de la persona o departamento de datos personales: Servicio a Clientes</li>
						<li>Domicilio: Av. Carlos Nader lotes 1, a 3, Interior B, Manzana 1, SM 2, Ciudad de Cancún, municipio Benito Juárez, CP 77500, en la entidad de Quintana Roo, país México </li>

						<li>Correo electrónico: <a href="mailto:privacidad@oktravel.mx">privacidad@oktravel.mx</a></li>
						<li>Número telefónico: (52) 998 140 65 70</li>
						<li>Otro dato de contacto: <a href="mailto:customerservice@oktravel.mx">customerservice@oktravel.mx</a></li>
					</ul>



					<p>
						<strong>Usted puede revocar su consentimiento para el uso de sus datos personales</strong><br />Usted puede revocar el consentimiento que, en su caso, nos haya otorgado para el tratamiento de sus datos personales. Sin embargo, es importante que tenga en cuenta que no en todos los casos podremos atender su solicitud o concluir el uso de forma inmediata, ya que es posible que por alguna obligación legal requiramos seguir tratando sus datos personales. Así mismo, usted deberá considerar que para ciertos fines, la revocación de su consentimiento implicará que no le podamos seguir prestando el servicio que nos solicitó, o la conclusión de su relación con OKTRAVEL SA DE CV y/o nuestras representaciones comerciales.<br />Para revocar su consentimiento deberá presentar su solicitud a través del siguiente medio:
					</p>

					<ul>
						<li>Correo electrónico <a href="mailto:privacidad@oktravel.mx">privacidad@oktravel.mx</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Ver forma ARCO</a></li>
					</ul>
					<p>&nbsp;</p>
					<p>Con relación al procedimiento y requisitos para la revocación de su consentimiento, le informamos lo siguiente:</p>

					<p>a) ¿A través de qué medios pueden acreditar su identidad el titular y, en su caso, su representante, así como la personalidad este último?<br /><strong>R=</strong> Registro On Line</p>
					<p>b) ¿Qué información y/o documentación deberá contener la solicitud?<br /><strong>R= </strong>Usuario y contraseña</p>
					<p>c) ¿En cuántos días le daremos respuesta a su solicitud?<br /><strong>R= </strong>24 horas.</p>
					<p>d) ¿Por qué medio le comunicaremos la respuesta a su solicitud?<br /><strong>R= </strong>Vía e-mail</p>
					<p>e) ¿En qué medios se pueden reproducir los datos personales que, en su caso, solicite?<br /><strong>R= </strong>Ninguno</p>
					<p>f) Ponemos a sus órdenes los siguientes formularios o sistemas para facilitar el ejercicio de derechos ARCO:<br /><strong>R= </strong>Hoja de Perfil y / o registro</p>
					<p>g) Para mayor información sobre el procedimiento, ponemos a disposición los siguientes medios:<br /><strong>R= </strong>Número telefónico  (52) 998 140 65 70<br />Correo electrónico <a href="mailto:privacidad@oktravel.mx">privacidad@oktravel.mx</a></p>
					<p><strong>¿Cómo puede limitar el uso o divulgación de su información personal?</strong><br />Con objeto de que usted pueda limitar el uso y divulgación de su información personal, le ofrecemos los siguientes medios:</p>
					<ul>

						<li>Envío de correo electrónico a <a href="mailto:privacidad@oktravel.mx">privacidad@oktravel.mx</a>   (crear vinculo a formato de correo ARCO)</li>
					</ul>
					<p>Asimismo, usted se podrá escribir a los siguientes registros, en caso de que no desee obtener publicidad de nuestra parte:</p>

					<ul>

						<li>Envío de correo electrónico a <a href="mailto:privacidad@oktravel.mx">privacidad@oktravel.mx</a>   (crear vinculo a formato de correo ARCO)</li>
					</ul>

					<p>&nbsp;</p>
					<p>Registro Público de Usuarios, para mayor información consulte el portal de internet de la CONDUSEF</p>
					<p>
						<strong>El uso de tecnologías de rastreo en nuestro portal de internet</strong><br />Le informamos que en nuestra página de internet utilizamos cookies, web beacons u otras tecnologías, a través de las cuales es posible monitorear su comportamiento como usuario de internet, así como brindarle un mejor servicio y experiencia al navegar en nuestra página. Los datos personales que recabamos a través de estas tecnologías, los utilizaremos para los siguientes fines:
					</p>

					<ul>
						<li>Identificación de Tendencias de consulta y comportamiento de consumo. Fines estadísticos y optimización de sitio</li>
						<li>Los datos personales que obtenemos de estas tecnologías de rastreo son los siguientes:</li>
						<ul>
							<li>Identificadores, nombre de usuario y contraseñas de una sesión</li>
							<li>Idioma preferido por el usuario</li>
							<li>Región en la que se encuentra el usuario</li>
							<li>Tipo de navegador del usuario</li>
							<li>Tipo de sistema operativo del usuario</li>
							<li>Fecha y hora del inicio y final de una sesión de un usuario</li>
							<li>Páginas web visitadas por un usuario</li>
							<li>Búsquedas realizadas por un usuario</li>
							<li>Publicidad revisada por un usuario</li>
							<li>Listas y hábitos de consumo en páginas de compras</li>
						</ul>
						<li>Estas tecnologías podrán deshabilitarse siguiendo los siguientes pasos: Envío de correo electrónico a <a href="mailto:privacidad@oktravel.mx">privacidad@oktravel.mx</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Ver forma ARCO</a></li>
					</ul>

					<p>
						<br /><strong>¿Cómo puede conocer los cambios en este aviso de privacidad?</strong><br />El presente aviso de privacidad puede sufrir modificaciones, cambios o actualizaciones derivadas de nuevos requerimientos legales; de nuestras propias necesidades por los productos o servicios que ofrecemos; de nuestras prácticas de privacidad; de cambios en nuestro modelo de negocio, o por otras causas.
					</p>

					<p>Nos comprometemos a mantenerlo informado sobre los cambios que pueda sufrir el presente aviso de privacidad, a través de la publicación directa en nuestra (s) página (s) de Internet.</p>

					<p>El procedimiento a través del cual se llevarán a cabo las notificaciones sobre cambios o actualizaciones al presente aviso de privacidad es ingresando en el siguiente Link disponible también en nuestra(s) página(s) principal(es)</p>
					<p><a href="http://www.oktrip.mx/privacidad.php">http://www.oktrip.mx/privacidad.php</a></p>
					<p><strong>Su consentimiento para el tratamiento de sus datos personales</strong><br />Consiento que mis datos personales sean tratados de conformidad con los términos y condiciones informados en el presente aviso de privacidad.<strong>[ ]</strong></p>

					<p>Última actualización: 08 Enero 2014 </p>

				</div>       

			</div>

			<div class="modal-footer">

				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>

		</div>

	</div>

</div>





</body>

</html>



<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>
<script src="{{ asset('js/moment.min.js')}}"></script>
<script type="text/javascript">
	
    $(document).ready(function(){
    
        var picker = new Litepicker({ 
            element: document.getElementById('start'),
            singleMode: false,
            format: 'DD-MM-YYYY',
            resetButton: true,
            minDate:moment(),
            
            onSelect: function(date1, date2) { 
                console.log(picker.getStartDate().format('YYYY-MM-DD'));
                $("input[name='startDate']").val(picker.getStartDate().format('YYYY-MM-DD'));
                $("input[name='endDate']").val(picker.getEndDate().format('YYYY-MM-DD'));
            }
        });
    
        var iconPick = new Litepicker({ 
            element: document.getElementById('calendar'),
            singleMode: false,
            format: 'DD-MM-YYYY',
            resetButton: true,
            minDate:moment(),
            onSelect: function(date1, date2) { 
                console.log(iconPick.getStartDate().format('YYYY-MM-DD'));
                $("input[name='startDate']").val(iconPick.getStartDate().format('YYYY-MM-DD'));
                $("input[name='endDate']").val(iconPick.getEndDate().format('YYYY-MM-DD'));
                var str = "";
                str = iconPick.getStartDate().format('YYYY-MM-DD')+' - '+iconPick.getEndDate().format('YYYY-MM-DD');
                $('#start').val(str);
            }
        });
    
        var rooms = 1;
        var years = 'años';
       /* if(Cookies.get("lang") == "en"){
            years = "years";
        } years = "years";*/
        $("#pax_rooms").on('click',function(){
            $(".rooms_all").css('display','block');
        });
    
        $('.date-input').on('click',function(){
            if($(".rooms_all").css('display') == 'block'){
                $(".rooms_all").css('display','none');
            }
        });
    
        $("#search-btn").on('click',function(){
            if($(".rooms_all").css('display') == 'block'){
                $(".rooms_all").css('display','none');
            }
        });
    
        $(".plus-room").on('click',function(e){
            
            e.preventDefault();
            if($(".rooms_all").css('display') == 'block'){
                $(".rooms_all").css('display','none');
            }
        });
    
        var warning_kids = '<p style="font-size: 11px;text-align: center;">Edad de los menores (0 a 12 años)</p>';
    
        var age_template = '<select name="" id="" class="form-control ageKids">'+
                            '<option value="0">0 @lang("main.mini-banner2-07") </option>'+
                            '<option value="1">1 @lang("main.mini-banner2-07")</option>'+
                            '<option value="2">2 @lang("main.mini-banner2-07")</option>'+
                            '<option value="3">3 @lang("main.mini-banner2-07")</option>'+
                            '<option value="4">4 @lang("main.mini-banner2-07")</option>'+
                            '<option value="5">5 @lang("main.mini-banner2-07")</option>'+
                            '<option value="6">6 @lang("main.mini-banner2-07")</option>'+
                            '<option value="7">7 @lang("main.mini-banner2-07")</option>'+
                            '<option value="8">8 @lang("main.mini-banner2-07")</option>'+
                            '<option value="9">9 @lang("main.mini-banner2-07")</option>'+
                            '<option value="10">10 @lang("main.mini-banner2-07")</option>'+
                            '<option value="11">11 @lang("main.mini-banner2-07")</option>'+
                            '<option value="12">12 @lang("main.mini-banner2-07")</option>'+
                            '</select>';			
    
        $(".room_feature .label-plus").on('click',addRoom);
    
        $(".minus-room").on('click',deleteRoom);
    
        function deleteRoom(){
            var element = $(this).parents()[1];
            var spanAdults = $(element).find('span')[1];
            var spanKids = $(element).find('span')[2];
            //Para obtener valores de un W.fn.init JQUERY
            var pax_ = parseInt($(spanAdults).text()) + parseInt($(spanKids).text());
            var paxs = $("input[name='total-paxs']").val();
            var total = paxs - pax_;
            
    
            if(rooms == 3){
                var parent = $(element).siblings()[1];
                $("input[name='room.3.adults']").remove();
                $("input[name='room.3.kids']").remove();
            }
            else{
                var parent = $(element).siblings()[0];
                $("input[name='room.2.adults']").remove();
                $("input[name='room.2.kids']").remove();
            }
    
            var children = $(parent).find('span')[3];
            $(children).parent().css('display','block');
            $(element).css('display','none');
            rooms--;
    
            var newPlaceholder = total+"pax, "+rooms+"hab";
            $("#pax_rooms").attr('placeholder',newPlaceholder);
            $("input[name='total-paxs']").val(total);
            $("input[name='adults']").val(total);
            $("input[name='rooms']").val(rooms);
        }
    
        function addRoom(){
            console.log($(this).parent());
            var element = $(this).parent().css('display','none');
            var paxs = 0;
            if(rooms < 3){
    
                rooms++;
                $("input[name='rooms']").val(rooms);
                if(rooms == 2){
                    paxs = $("input[name='total-paxs']").val();
                    paxs++;
                    var newPlaceholder = paxs+"pax, "+rooms+"hab";
    
                    $("#pax_rooms").attr('placeholder',newPlaceholder);
                    $("input[name='total-paxs']").val(paxs);
                    var adult = $("input[name='adults']").val();
                    adult++
                    $("input[name='adults']").val(adult);
                    $("#room_2").css('display','block');
                    var inputs_room = '<input type="hidden" class="form-control" name="room.'+rooms+'.adults" value="1" readonly><input type="hidden" class="form-control" name="room.'+rooms+'.kids" value="0" readonly>';
                    $("#extras").append(inputs_room);
                    
    
                }
    
                if(rooms == 3){
                    paxs = $("input[name='total-paxs']").val();
                    paxs++;
                    var newPlaceholder = paxs+"pax, "+rooms+"hab";
                    
                    $("#pax_rooms").attr('placeholder',newPlaceholder);
                    $("input[name='total-paxs']").val(paxs);
                    var adult = $("input[name='adults']").val();
                    adult++
                    $("input[name='adults']").val(adult);
                    $("#room_3").css('display','block');
                    var inputs_room = '<input type="hidden" class="form-control" name="room.'+rooms+'.adults" value="1" readonly><input type="hidden" class="form-control" name="room.'+rooms+'.kids" value="0" readonly>';
                    $("#extras").append(inputs_room);
                    
                }
            }
        
        }
    
    
        $(".room_adult .up").on('click',function(e){
            e.preventDefault();
            var element = $(this).siblings('.total-pax');
            var divParent = $(this).parents()[1];
            var pax = parseInt(element[0].innerHTML);
            if(pax < 4){
                pax++; 
                element.html(pax);
                var pax_ = parseInt($("input[name='total-paxs']").val());
                if(pax_)
                    pax_++;
    
                var newPlaceholder = pax_+"pax, "+rooms+"hab";
                $("#pax_rooms").attr('placeholder',newPlaceholder);
                $("input[name='total-paxs']").val(pax_);
                var actualAdults = $("input[name='adults']").val();
                actualAdults++;
                $("input[name='adults']").val(actualAdults);
    
                switch($(divParent).attr('id')){
    
                    case 'room_1_adult':
                        $("input[name='room.1.adults']").val(pax);
                        break;
                    case 'room_2_adult':
                        $("input[name='room.2.adults']").val(pax);
                        break;
                    case 'room_3_adult':
                        $("input[name='room.3.adults']").val(pax);
                        break;
                }
    
            }
    
    
            if(pax == 2){
                var element = $(this).siblings('.disabled');
                $(element).removeClass('disabled').addClass('down');
                $(element).css('cursor','pointer');
            }
    
            if(pax == 4){
                $(this).removeClass('up').addClass('disabled');
                $(this).css('cursor','not-allowed');
            }
    
        });
    
        $(".room_adult .down").on('click',function(e){
            e.preventDefault();
            var element = $(this).siblings('.total-pax');
            var divParent = $(this).parents()[1];
            var pax = parseInt(element[0].innerHTML);
            if(pax > 1){
                pax--; 
                element.html(pax);
                var pax_ = parseInt($("input[name='total-paxs']").val());
                if(pax_)
                    pax_--;
    
                var newPlaceholder = pax_+"pax, "+rooms+"hab";
                $("#pax_rooms").attr('placeholder',newPlaceholder);
                $("input[name='total-paxs']").val(pax_);
                var actualAdults = $("input[name='adults']").val();
                actualAdults--;
                $("input[name='adults']").val(actualAdults);
    
                switch($(divParent).attr('id')){
    
                    case 'room_1_adult':
                        console.log("room 1 adult");
                        $("input[name='room.1.adults']").val(pax);
                        break;
                    case 'room_2_adult':
                        $("input[name='room.2.adults']").val(pax);
                        break;
                    case 'room_3_adult':
                        $("input[name='room.3.adults']").val(pax);
                        break;
                }
    
            }
    
            
            if(pax == 1){
                $(this).removeClass('down').addClass('disabled');
                $(this).css('cursor','not-allowed');
            }
    
            if(pax ==3){
                var element = $(this).siblings('.disabled');
                $(element).removeClass('disabled').addClass('up');
                $(element).css('cursor','pointer');
            }
    
        });
    
    
        $(".room_kid .up").on('click',function(e){
            e.preventDefault();
            var element = $(this).siblings('.total-pax');
            var divParent = $(this).parents()[1];
            var pax = parseInt(element[0].innerHTML);
            if(pax < 3){
                pax++; 
                element.html(pax);
                var pax_ = parseInt($("input[name='total-paxs']").val());
                if(pax_)
                    pax_++;
    
                var newPlaceholder = pax_+"pax, "+rooms+"hab";
                $("#pax_rooms").attr('placeholder',newPlaceholder);
                $("input[name='total-paxs']").val(pax_);
                var actualKids = $("input[name='kids']").val();
                actualKids++;
                $("input[name='kids']").val(actualKids);
    
                //pax_Age es la clase donde deben de ir los selects para la edad
                switch($(divParent).attr('id')){
    
                    case 'room_1_kid':
                        $("input[name='room.1.kids']").val(pax);
                        $("#room_1_age").append(age_template);
                        break;
                    case 'room_2_kid':
                        $("input[name='room.2.kids']").val(pax);
                        $("#room_2_age").append(age_template);
                        break;
                    case 'room_3_kid':
                        $("input[name='room.3.kids']").val(pax);
                        $("#room_3_age").append(age_template);
                        break;
                }
    
            }
    
    
            if(pax == 1){
                var element = $(this).siblings('.disabled');
                $(element).removeClass('disabled').addClass('down');
                $(element).css('cursor','pointer');
            }
    
            if(pax == 3){
                $(this).removeClass('up').addClass('disabled');
                $(this).css('cursor','not-allowed');
            }
    
        });
    
        $(".room_kid .down").on('click',function(e){
            e.preventDefault();
            var element = $(this).siblings('.total-pax');
            var divParent = $(this).parents()[1];
            var pax = parseInt(element[0].innerHTML);
            if(pax >= 1){
                pax--; 
                element.html(pax);
                var pax_ = parseInt($("input[name='total-paxs']").val());
                if(pax_)
                    pax_--;
    
                var newPlaceholder = pax_+"pax, "+rooms+"hab";
                $("#pax_rooms").attr('placeholder',newPlaceholder);
                $("input[name='total-paxs']").val(pax_);
                var actualKids = $("input[name='kids']").val();
                actualKids--;
                $("input[name='kids']").val(actualKids);
    
                switch($(divParent).attr('id')){
    
                    case 'room_1_kid':
                        $("input[name='room.1.kids']").val(pax);
                        $("#room_1_age select:last-child").remove();
                        break;
                    case 'room_2_kid':
                        $("input[name='room.2.kids']").val(pax);
                        $("#room_2_age select:last-child").remove();
                        break;
                    case 'room_3_kid':
                        $("input[name='room.3.kids']").val(pax);
                        $("#room_3_age select:last-child").remove();
                        break;
                }
    
            }
    
    
            if(pax == 0){
                $(this).removeClass('down').addClass('disabled');
                $(this).css('cursor','not-allowed');
            }
    
            if(pax ==2){
                var element = $(this).siblings('.disabled');
                $(element).removeClass('disabled').addClass('up');
                $(element).css('cursor','pointer');
            }
    
        });
    
    });
</script>










