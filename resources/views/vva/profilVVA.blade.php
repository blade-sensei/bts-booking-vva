@extends('index')
@section('content')
    <div class="row">
        <div class="col-xs-8 col-sm-8 col-md-3 col-lg-3">
            @include('templates.infosUser')
        </div>

        
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           @include('templates.actionsVVA')
       </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        	@yield('rechercheReservation')
            @yield('rechercheHebergement')
        </div>
    </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @yield('reservations')
                @yield('hebergements')
                @yield('reservation_modification')
                @yield('hebergement_modification')
                @yield('creation')
            </div>
        </div>
    @endsection

