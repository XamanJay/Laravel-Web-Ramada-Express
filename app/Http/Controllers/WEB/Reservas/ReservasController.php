<?php

namespace App\Http\Controllers\WEB\Reservas;

use Illuminate\Http\Client\ConnectionException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail; // mail
use Illuminate\Support\Str;
use App\Models\Pais;
    use App\Mail\ConfirmationMail;    // mail





#Modelos
use App\Model\Reserva;

#Fecha libreria
use Carbon\Carbon;

class ReservasController extends Controller
{
    public function index(Request $request)
    {
        config(['app.timezone' => 'America/Cancun']);

        $dates = Str::of($request->empieza)->explode(' - ');
        $checkIn = Carbon::parse($dates[0])->format('Y-m-d');
        $checkOut = Carbon::parse($dates[1])->format('Y-m-d');
        $Fecha_1 = Carbon::parse($dates[0])->format('d F Y');
        $Fecha_2 = Carbon::parse($dates[1])->format('d F Y');

        $adultos = [];
        $infantes = [];
        array_push($adultos,$request->room_1_adults);

        //dd($checkIn);
        if($request->rooms > 1)
        {
            if($request->rooms == 2)
            {
                array_push($adultos,$request->room_2_adults);
            }
            if($request->rooms == 3)
            {
                array_push($adultos,$request->room_3_adults);
            }
        }

        if($request->kids > 0)
        {
            array_push($infantes,$request->room_1_kids);
            if($request->rooms > 1)
            {
                if(isset($request->room_2_kids))
                    array_push($infantes,$request->room_2_kids);

                if(isset($request->room_3_kids))
                    array_push($infantes,$request->room_3_kids);
            }
        }else{
            for ($i=0; $i < $request->rooms ; $i++) { 
                array_push($infantes,0);
            }
        }

        $response = Http::asForm()->post('http://gphoteles.test/api/es/temporada-habitacion', [
            'checkIn' => $checkIn,
            'checkOut' => $checkOut,
            'habitaciones' => $request->rooms,
            'adultos' => $adultos,
            'infantes' => $infantes
        ]);

        $result = $response->json();
  
        // Original dd
                  //  dd($result);
        #vista de la reserva    


        $_0habitacion             = $result["data"][0]["habitacion"];
        $_0isTarifaMagica         = $result["data"][0]["isTarifaMagica"];
        $_0plan_x_alimentos       = $result["data"][0]["plan_x_alimentos"];
        $_0tarifa_base            = $result["data"][0]["tarifa_base"];
        $_0tarifa_base_cs         = $_0tarifa_base - ($_0tarifa_base * 0.10);
        $_0noches                 = $result["data"][0]["noches"];
        $_0cuartos                = $result["data"][0]["cuartos"];
        $_0currency               = $result["data"][0]["currency"];

        $_0id                     = $result["data"][0]["id"];
        $_1id                     = $result["data"][1]["id"];
        $_2id                     = $result["data"][2]["id"];
        $_3id                     = $result["data"][3]["id"];
        $_4id                     = $result["data"][4]["id"];
        $_5id                     = $result["data"][5]["id"];
        $_6id                     = $result["data"][6]["id"];
        $_7id                     = $result["data"][7]["id"];
        $_8id                     = $result["data"][8]["id"];
        $_9id                     = $result["data"][9]["id"];
        $_10id                     = $result["data"][10]["id"];
        $_11id                     = $result["data"][11]["id"];


        $_0gtotal                      = $result["data"][0]["total"];
        $_1gtotal                      = $result["data"][1]["total"];
        $_2gtotal                      = $result["data"][2]["total"];
        $_3gtotal                      = $result["data"][3]["total"];
        $_4gtotal                      = $result["data"][4]["total"];
        $_5gtotal                      = $result["data"][5]["total"];
        $_6gtotal                      = $result["data"][6]["total"];
        $_7gtotal                      = $result["data"][7]["total"];
        $_8gtotal                      = $result["data"][8]["total"];
        $_9gtotal                      = $result["data"][9]["total"];
        $_10gtotal                     = $result["data"][10]["total"];
        $_11gtotal                     = $result["data"][11]["total"];



        $_tot_adultos             = $request->room_1_adults + $request->room_2_adults + $request->room_3_adults;
        $_tot_infantes            = $request->room_1_kids + $request->room_2_kids + $request->room_3_kids;

    /*  $_adultos                 = implode(",", $adultos);
        $_infantes                = implode(",", $infantes);

        $_adultos                 = Str::of($_adultos)->explode(',');
        $_infantes                = Str::of($_infantes)->explode(',');*/

        /*dd($adultos, $infantes);*/
        $_adultos = $adultos;
        $_infantes = $infantes;

        
        $_1habitacion             = $result["data"][1]["habitacion"];
        $_1isTarifaMagica         = $result["data"][1]["isTarifaMagica"];
        $_1plan_x_alimentos       = $result["data"][1]["plan_x_alimentos"];
        $_1tarifa_base            = $result["data"][1]["tarifa_base"];
        $_1tarifa_base_cs         = $_1tarifa_base - ($_1tarifa_base * 0.10);
        $_1noches                 = $result["data"][1]["noches"];
        $_1cuartos                = $result["data"][1]["cuartos"];

        $_2habitacion             = $result["data"][2]["habitacion"];
        $_2isTarifaMagica         = $result["data"][2]["isTarifaMagica"];
        $_2plan_x_alimentos       = $result["data"][2]["plan_x_alimentos"];
        $_2tarifa_base            = $result["data"][2]["tarifa_base"];
        $_2tarifa_base_cs         = $_2tarifa_base - ($_2tarifa_base * 0.10);
        $_2noches                 = $result["data"][2]["noches"];
        $_2cuartos                = $result["data"][2]["cuartos"];

        $_3habitacion             = $result["data"][3]["habitacion"];
        $_3isTarifaMagica         = $result["data"][3]["isTarifaMagica"];
        $_3plan_x_alimentos       = $result["data"][3]["plan_x_alimentos"];
        $_3tarifa_base            = $result["data"][3]["tarifa_base"];
        $_3tarifa_base_cs         = $_3tarifa_base - ($_3tarifa_base * 0.10);
        $_3noches                 = $result["data"][3]["noches"];
        $_3cuartos                = $result["data"][3]["cuartos"];

        $_4tarifa_base            = $result["data"][4]["tarifa_base"];
        $_4tarifa_base_cs         = $_4tarifa_base - ($_4tarifa_base * 0.10);
        $_5tarifa_base            = $result["data"][5]["tarifa_base"];
        $_5tarifa_base_cs         = $_5tarifa_base - ($_5tarifa_base * 0.10);
        $_6tarifa_base            = $result["data"][6]["tarifa_base"];
        $_6tarifa_base_cs         = $_6tarifa_base - ($_6tarifa_base * 0.10);
        $_7tarifa_base            = $result["data"][7]["tarifa_base"];
        $_7tarifa_base_cs         = $_7tarifa_base - ($_7tarifa_base * 0.10);

        $_8tarifa_base            = $result["data"][8]["tarifa_base"];
        $_8tarifa_base_cs         = $_8tarifa_base - ($_8tarifa_base * 0.10);
        $_9tarifa_base            = $result["data"][9]["tarifa_base"];
        $_9tarifa_base_cs         = $_9tarifa_base - ($_9tarifa_base * 0.10);
        $_10tarifa_base            = $result["data"][10]["tarifa_base"];
        $_10tarifa_base_cs         = $_10tarifa_base - ($_10tarifa_base * 0.10);
        $_11tarifa_base            = $result["data"][11]["tarifa_base"];
        $_11tarifa_base_cs         = $_11tarifa_base - ($_11tarifa_base * 0.10);

            
        $day1 =     Carbon::parse($dates[0])->format('d');
        $month1 =   Carbon::parse($dates[0])->format('m');
        $year1 =    Carbon::parse($dates[0])->format('Y');
        $day2 =     Carbon::parse($dates[1])->format('d');
        $month2 =   Carbon::parse($dates[1])->format('m');
        $year2 =    Carbon::parse($dates[1])->format('Y');
    
        switch ($month1){
            case  "1"; $month_label1 = "Enero";      break;  case  "2"; $month_label1 = "Febrero";    break;   case  "3"; $month_label1 = "Marzo";      break;
            case  "4"; $month_label1 = "Abril";      break;  case  "5"; $month_label1 = "Mayo";       break;   case  "6"; $month_label1 = "Junio";      break;
            case  "7"; $month_label1 = "Julio";      break;  case  "8"; $month_label1 = "Agosto";     break;   case  "9"; $month_label1 = "Septiembre"; break;
            case "10"; $month_label1 = "Octubre";    break;  case "11"; $month_label1 = "Noviembre";  break;   case "12"; $month_label1 = "Diciembre";  break;
        }

        switch ($month2){
            case  "1"; $month_label2 = "Enero";      break;  case  "2"; $month_label2 = "Febrero";    break;   case  "3"; $month_label2 = "Marzo";      break;
            case  "4"; $month_label2 = "Abril";      break;  case  "5"; $month_label2 = "Mayo";       break;   case  "6"; $month_label2 = "Junio";      break;
            case  "7"; $month_label2 = "Julio";      break;  case  "8"; $month_label2 = "Agosto";     break;   case  "9"; $month_label2 = "Septiembre"; break;
            case "10"; $month_label2 = "Octubre";    break;  case "11"; $month_label2 = "Noviembre";  break;   case "12"; $month_label2 = "Diciembre";  break;
        }
                


        //dd($adultos);
        

        return view('storefront.cotizacion')->with([
            'checkIn'           => $checkIn,
            'checkOut'          => $checkOut,
            'Fecha_1'           => $Fecha_1,
            'Fecha_2'           => $Fecha_2,
            'day1'              => $day1,
            'month1'            => $month1,
            'year1'             => $year1,
            'day2'              => $day2,
            'month2'            => $month2,
            'year2'             => $year2,
            'month_label1'       => $month_label1,
            'month_label2'       => $month_label2,
            'habitaciones'      => $request->rooms,
            'adultos'           => $_adultos,
            'infantes'          => $_infantes,
            '_tot_adultos'           => $_tot_adultos,
            '_tot_infantes'          => $_tot_infantes, 
            
            '_0habitacion'        => $_0habitacion,
            '_0isTarifaMagica'    => $_0isTarifaMagica,
            '_0plan_x_alimentos'  => $_0plan_x_alimentos,
            '_0tarifa_base'       => $_0tarifa_base,
            '_0tarifa_base_cs'    => $_0tarifa_base_cs,
            '_0noches'            => $_0noches,
            '_0cuartos'           => $_0cuartos,
            '_0currency'          => $_0currency,




            '_1habitacion'        => $_1habitacion,
            '_1isTarifaMagica'    => $_1isTarifaMagica,
            '_1plan_x_alimentos'  => $_1plan_x_alimentos,
            '_1tarifa_base'       => $_1tarifa_base,
            '_1tarifa_base_cs'    => $_1tarifa_base_cs,
            '_1noches'            => $_1noches,
            '_1cuartos'           => $_1cuartos,

            '_2habitacion'        => $_2habitacion,
            '_2isTarifaMagica'    => $_2isTarifaMagica,
            '_2plan_x_alimentos'  => $_2plan_x_alimentos,
            '_2tarifa_base'       => $_2tarifa_base,
            '_2tarifa_base_cs'    => $_2tarifa_base_cs,
            '_2noches'            => $_2noches,
            '_2cuartos'           => $_2cuartos,

            '_3habitacion'        => $_3habitacion,
            '_3isTarifaMagica'    => $_3isTarifaMagica,
            '_3plan_x_alimentos'  => $_3plan_x_alimentos,
            '_3tarifa_base'       => $_3tarifa_base,
            '_3tarifa_base_cs'    => $_3tarifa_base_cs,
            '_3noches'            => $_3noches,
            '_3cuartos'           => $_3cuartos,

            '_4tarifa_base'       => $_4tarifa_base,
            '_4tarifa_base_cs'    => $_4tarifa_base_cs,
            '_5tarifa_base'       => $_5tarifa_base,
            '_5tarifa_base_cs'    => $_5tarifa_base_cs,
            '_6tarifa_base'       => $_6tarifa_base,
            '_6tarifa_base_cs'    => $_6tarifa_base_cs,
            '_7tarifa_base'       => $_7tarifa_base,
            '_7tarifa_base_cs'    => $_7tarifa_base_cs,
            '_8tarifa_base'       => $_8tarifa_base,
            '_8tarifa_base_cs'    => $_8tarifa_base_cs,
            '_9tarifa_base'       => $_9tarifa_base,
            '_9tarifa_base_cs'    => $_9tarifa_base_cs,
            '_10tarifa_base'       => $_10tarifa_base,
            '_10tarifa_base_cs'    => $_10tarifa_base_cs,
            '_11tarifa_base'       => $_11tarifa_base,
            '_11tarifa_base_cs'    => $_11tarifa_base_cs,

            '_0id'  => $_0id,
            '_1id'  => $_1id,
            '_2id'  => $_2id,
            '_3id'  => $_3id,
            '_4id'  => $_4id,
            '_5id'  => $_5id,
            '_6id'  => $_6id,
            '_7id'  => $_7id,
            '_8id'  => $_8id,
            '_9id'  => $_9id,
            '_10id' => $_10id,
            '_11id' => $_11id,

            'link1' => '',
            'link2' => '',
            'link3' => '',
            'link4' => '',

            '_0gtotal' => $_0gtotal,
            '_1gtotal' => $_1gtotal,
            '_2gtotal' => $_2gtotal,
            '_3gtotal' => $_3gtotal,
            '_4gtotal' => $_4gtotal,
            '_5gtotal' => $_5gtotal,
            '_6gtotal' => $_6gtotal,
            '_7gtotal' => $_7gtotal,
            '_8gtotal' => $_8gtotal,
            '_9gtotal' => $_9gtotal,
            '_10gtotal' => $_10gtotal,
            '_11gtotal' => $_11gtotal,



                               



        ]);
    }


    public function reservations(Request $request)
    {
        $paiss = Pais::all();


       


        return view('storefront.reservations',[
            'paiss' => $paiss,
            'habitacioness' =>  $request->habitacioness,
            'checkInn'      =>  $request->checkInn,
            'checkOutt'     =>  $request->checkOutt,
            'tarifa_basee'  =>  $request->tarifa_basee,
            'currencyy'     =>  $request->currencyy,
            'nochess'       =>  $request->nochess,
            'adultoss'      =>  $request->adultoss,
            'infantess'     =>  $request->infantess, 
            'habitacion_idd'=>  $request->habitacion_idd,
            'gtotall'       =>  $request->gtotall,
            'link1' => '',
            'link2' => '',
            'link3' => '',
            'link4' => '',
            '_tot_adultos'  =>  $request->_tot_adultos,
            '_tot_infantes' =>  $request->_tot_infantes,
            'day1'          =>  $request->day1,
            'month_label1'  =>  $request->month_label1,
            'year1'         =>  $request->year1,
            'day2'          =>  $request->day2,
            'month_label2'  =>  $request->month_label2,
            'year2'         =>  $request->year2,
            
        ]);

    }


    



    public function store(Request $request )
    {
                 /*   dd($_adultos);
                    dd($request->adultos); */
                /*dd($request->nombre, $request->apellidos, $request->email, $request->ciudad,
                    $request->estado_region, $request->pais_id, $request->telefono, $request->comentarios,
                    $request->metodo_pago, $request->habitaciones, $request->checkIn, $request->checkOut,
                    $request->precio , $request->currency, $request->noches, $request->adultos,
                    $request->infantes, $request->plataforma, $request->habitacion_id, $request->isWhatsApp, 
                    $request->isClub, $request->pago_x_destino,);*/ 
               // dd($request->isWhatsApp);  

        $response = Http::asForm()->post('http://phplaravel-478781-1505684.cloudwaysapps.com/api/es/reserva', [
                    'nombre' => $request->nombre,
                    'apellidos' => $request->apellidos,
                    'email' => $request->email,
                    'telefono' => $request->telefono,
                    'estado_region' => $request->estado_region,
                    'isWhatsApp' => ($request->isWhatsApp == null) ? 0 : $request->isWhatsApp,
                    'isClub' => ($request->isClub == null) ? 0 : $request->isClub,
                    'ciudad' => $request->ciudad,
                    'pais_id' => $request->pais_id,
                    'habitacion_id' => $request->habitacion_id,
                    'pago_x_destino' => 0,
                    'checkIn' => $request->checkIn,
                    'checkOut' => $request->checkOut,
                    'plataforma' => $request->plataforma,
                    'noches' => $request->noches,
                    'habitaciones' => $request->habitaciones,
                    'adultos' => $request->adultoss,   
                    'infantes' => $request->infantess,
                    'precio' => $request->precio,
                    'currency' => $request->currency,
                    'comentarios' => $request->comentarios,
                    'hotel_id' => 1,
                    'payment' => $request->metodo_pago #pago_seguro , pago_destino
        ]);


        $result = $response->json();

        dd($result);
        if((int)$result['code'] == 500)
        {
            dd($result['message']);
        }

        switch ($result['data']['metodo_pago']) {
            case '3':
                #El numero 3 representa pago en destino
                return redirect()->route('response.reserva', ['locale' => 'es','id' => $result['data']['folio']]);
                break;

            case 'pago_seguro':
                
                $response = Http::asForm()->post('http://phplaravel-478781-1505684.cloudwaysapps.com/api/santander',[
                    'id' => $result['data']['folio']
                ]);
                $result = $response->json();

                if($response['code'] == 500)
                {
                    return back()->with('error','Error al generar su metodo de pago, ponganse en contacto con el area de reservas con numero de folio: '.$result['data']['folio']);
                }else{
                    return redirect()->away($result['data']['url'][0]);
                }
                break;

            case 'paypal':
            
                $response = Http::asForm()->post('https://gphoteles.herokuapp.com//api/paypal',[
                    'id' => $result['data']['folio']
                ]);
                $result = $response->json();

                if($response['code'] == 500)
                {
                    return back()->with('error','Error al generar su metodo de pago, ponganse en contacto con el area de reservas con numero de folio: '.$result['data']['folio']);
                }else{
                    return redirect()->away($result['data']['url'][0]);
                }
                break;
            
            default:
                return redirect()->route('response.reserva', ['id' => $result['data']['folio']]);
                break;
        }
    }


    public function response($locale,$id)
    {
        return view('storefront.response')->with('folio',$id, [
            'link1' => '',
            'link2' => '',
            'link3' => '',
            'link4' => '',
        ]);


    }



   


    public function contact_mail()
    {

        // dd('ok');
        Mail::to('xamanjay@gmail.com')->send(new ConfirmationMail);
            

        return redirect('/contact'); 
    }

}
