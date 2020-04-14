@extends('vva.profilVVA')
@section('creation')
    <div class="well">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Problème de saisie.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @foreach($hebergements as $hebergement)

        <form action="{{route('reservation.creation.vva')}}" method="post" role="form" class="form-inline">
            {!! csrf_field() !!}
            <legend>Création Réservation - Hebergement n° : {{$hebergement->NOHEB}}</legend>
            <input type="hidden" name="noheb" value="{{$hebergement->NOHEB}}">
            <div class="form-group">
                <label for="dateId">Date Debut </label>
                <select name="debutreservation" id="dateId" class="form-control">

                    @foreach(\App\Hebergement::getSemaineDisponibles($hebergement->NOHEB)->get() as $semaine)
                        <option value="{{$semaine->DATEDEBSEM}}">{{$semaine->DATEDEBSEM}}</option>
                    @endforeach


                </select>

            </div>

            <div class="form-group">
                <label for="surfaceID">Utilisateur</label>
                <input type="text" class="form-control" name="userreservation" id="userID" placeholder="User">
            </div>
            <div class="form-group">
                <label for="occupantID">Nombre de personnes</label>
                <select name="occupantreservation" id="occupantID" class="form-control">
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-md-offset-5">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Valider</button>
                    </div>
                </div>
            </div>

        </form>
            @endforeach
    </div>
@endsection