@extends('vva.profilVVA')
@section('hebergements')

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"> Reservations </h3>
        </div>

        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th> N°Heb</th>
                <th> Nom </th>
                <th> Type Heb </th>
                <th> Nb Places</th>
                <th> Surface </th>
                <th> Internet </th>
                <th> Année  </th>
                <th> Secteur </th>
                <th> Orientation </th>
                <th> Etat </th>
                <th> Descriptif </th>
            </tr>
            </thead>
            <tbody>
            @foreach($hebergements as $hebergement)
                <tr>
                    <td>{{$hebergement->NOHEB}}</td>
                    <td>{{$hebergement->NOMHEB}}</td>
                    <td>{{$hebergement->NOMTYPEHEB}}</td>
                    <td>{{$hebergement->NBPLACEHEB}}</td>
                    <td>{{$hebergement->SURFACEHEB}} </td>
                    <td>{{$hebergement->INTERNET}}</td>
                    <td>{{$hebergement->ANNEEHEB}}</td>
                    <td>{{$hebergement->SECTEURHEB}}</td>
                    <td>{{$hebergement->ORIENTATIONHEB}}</td>
                    <td>{{$hebergement->ETATHEB}}</td>
                    <td>{{$hebergement->DESCRIHEB}}</td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
@endsection