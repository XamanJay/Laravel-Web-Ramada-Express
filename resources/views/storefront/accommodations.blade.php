@extends('layouts.app')        @section('content')










<div id="accommodations" class="container " style="margin-top:10px">
    <div class="row" style="margin-top:0px">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <p class="center"><h4>Accommodations with new controllerr </h4></p>
            <p class="center"> Test Text1 {{ $empieza }} </p>
            <p class="center"> Test Text2 {{ $code }}</p> 
            <p class="center"> Test Text3 {{ $startDate }}</p> 
            <p class="center"> Test Text4 {{ $endDate }}</p> 
            <p class="center"> Test Text5 {{ $adults }}</p> 
            <p class="center"> Test Text6 {{ $kids }}</p> 
            <p class="center"> Test Text7 {{ $rooms }}</p> 
            <p class="center"> day1 {{ $day1."/".$month1."/".$year1 }}</p> 
            <p class="center"> day2 {{ $day2."/".$month2."/".$year2 }}</p> 




            
        </div>
    </div>
</div>


















@endsection