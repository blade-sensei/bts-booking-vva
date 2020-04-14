@extends('index')
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @include('templates.barreRecherche')
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-4 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Details
                </div>
                <div class="panel-body">
                    @if($errors->has())
                        <div class="alert alert-danger">
                            <strong>Message d'erreur</strong>
                            <li><p>{{($errors->first())}}</p></li>
                            <a href="{{route('compte.login')}}" class="alert-link">Se connecter</a>
                        </div>
                    @endif
                    <h1>{{$hebergement[0]->NOMHEB}}</h1>
                    <p> Type Hebergement : {{$hebergement[0]->NOMTYPEHEB}}</p>
                    <p>Secteur Hebergement :{{$hebergement[0]->SECTEURHEB}}</p>
                    <p> {{$hebergement[0]->PRIXHEB}}€/semaine</p>
                    <form action="{{route('reservation.creer.villageois')}}" method="post" role="form">
                        {!! csrf_field() !!}
                    	<div class="form-group">
                            <input type="hidden" name="noheb" value="{{$hebergement[0]->NOHEB}}">
                            <label for="dateID"> Dates disponibles </label>
                            <select name="dateReservation" id="dateID" class="form-control">

                                @foreach(\App\Hebergement::getSemaineDisponibles($hebergement[0]->NOHEB)->get() as $semaine)
                                    <option value="{{$semaine->DATEDEBSEM}}">{{$semaine->DATEDEBSEM}}</option>
                                @endforeach

                                {{--@foreach(\App\Semaine::getAllSemainesSupDate(date("Y-m-d"))->get() as $semaine)--}}
                                    {{--<option value="{{$semaine->DATEDEBSEM}}">{{$semaine->DATEDEBSEM}}</option>--}}
                                {{--@endforeach--}}

                            </select>
                    	</div>
                        <div class="form-group">
                            <label for="nbplacesID">Nombre de personnes</label>
                            <select name="placeReservation" id="nbplacesID">
                                @for($i = 1; $i<=$hebergement[0]->NBPLACEHEB;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Réserver</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-6">
            <a href="" class="thumbnail" >
                <img src="{{url('images').'/'.$hebergement[0]->PHOTOHEB}}" alt="">
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Description
                </div>
            	<div class="panel-body">
                    <p>{{$hebergement[0]->DESCRIHEB}}</p>
            	</div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-md-offset-1">
            <div class="panel panel-primary">
            <div class="panel-heading">
                Information Supplémentaire
            </div>
            <div class="panel-body">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <p>Surface : {{$hebergement[0]->SURFACEHEB}}</p>
                        <p>Nombre de places : {{$hebergement[0]->NBPLACEHEB}}</p>
                        <p>Orientation: {{$hebergement[0]->ORIENTATIONHEB}}</p>
                        <p>Secteur : {{$hebergement[0]->SECTEURHEB}}</p>
                </div>


            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">

            </div>
            </div>
        </div>
        </div>
    </div>
@endsection