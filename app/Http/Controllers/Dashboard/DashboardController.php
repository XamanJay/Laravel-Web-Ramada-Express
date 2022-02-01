<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Reserva;
use App\Models\Huesped;
use App\Models\TipoCambio;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tipo_cambio = TipoCambio::first();
        $summary_months = array();
        $total = 0;
        for ($i=0; $i < 12 ; $i++) 
        { 
            $month = $i +1;
            $precio_mxn = Reserva::whereMonth('created_at',$month)->where('currency','MXN')->sum('precio');
            $precio_usd = Reserva::whereMonth('created_at',$month)->where('currency','USD')->sum('precio');
            $precio = $precio_mxn + ($precio_usd * $tipo_cambio['valor_x_moneda']);
            $total += $precio;
            array_push($summary_months,$precio);
        }

        $huespedes = Huesped::count();
        
        return view('Admin.home')->with([
            'summary' => $summary_months,
            'total' => $total,
            'huespedes' => $huespedes
        ]);
    }
}
