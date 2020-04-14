@extends('index')
@section('content')
    <div class="row">
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-md-offset-3">
            <div class="panel panel-success">
            	  <div class="panel-heading">
            			<h3 class="panel-title">Message</h3>
            	  </div>
            	  <div class="panel-body">
                      <p>{{$message}}</p>
                      <a class="alert-link" href="{{route('compte.profil')}}"> Retour page de profil </a>


            	  </div>
            </div>
        </div>
    </div>
@endsection