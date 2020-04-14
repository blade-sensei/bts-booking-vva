@extends('index')
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-md-offset-4 ">
            @include('templates.actionsVillageois')
        </div>
    </div>
    <div class="row">
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        	@yield('barre_recherche_reservation')
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            @include('templates.infosUser')
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            @yield('reservations')
            @yield('hebergements')
        </div>
    </div>
    @endsection

