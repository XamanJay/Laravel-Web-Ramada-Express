@extends('layouts.app')

@section('content')




<div id="main-img" style="margin-top:0px">
    <img src="{{ asset('images/White-Background.png') }}" alt="" style="width:100%"  > 
</div>









    <div id="500" class="container" style="margin-top:100px">
        <div class="row" style="margin-top:0px">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <p class="center"><h4>Oops! something went wrong</h4></p>
                <p class="center"><h4>Error 500</h4></p>
                <p class="center"><img src="{{ asset('images/500.JPG') }}" alt="500"></p>
                
            </div>
        </div>
    </div>

@endsection
