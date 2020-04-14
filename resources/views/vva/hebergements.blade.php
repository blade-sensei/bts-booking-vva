@extends('vva.profilVVA')
@section('hebergements')
        <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"> Hebergements </h3>
        </div>


            <table class="table table-bordered table-hover ">
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
                <th> Prix </th>
                <th>action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($hebergements as $hebergement)
                <tr>
                        <td>
                            {{$hebergement->NOHEB}}
                            <input type="hidden" name="noheb" value="{{$hebergement->NOHEB}}">
                        </td>
                        <td >{{$hebergement->NOMHEB}}</td>
                        <td>{{$hebergement->NOMTYPEHEB}}</td>
                        <td>{{$hebergement->NBPLACEHEB}}</td>
                        <td>{{$hebergement->SURFACEHEB}} </td>
                        @if($hebergement->INTERNET == '1')
                            <td> Oui </td>
                        @else
                            <td> Non </td>
                        @endif
                        <td>{{$hebergement->ANNEEHEB}}</td>
                        <td>{{$hebergement->SECTEURHEB}}</td>
                        <td>{{$hebergement->ORIENTATIONHEB}}</td>
                        <td>{{$hebergement->ETATHEB}}</td>
                        <td width=60%">{{$hebergement->DESCRIHEB}}</td>
                        <td>{{$hebergement->PRIXHEB}}</td>
                        <td>
                            <a href="{{route('vva_modification_hebergement',['noHebergement' => $hebergement->NOHEB])}}" class="btn btn-primary">Modifier</a>
                            <a href="{{route('reservation.creer',['noHebergement' => $hebergement->NOHEB])}}" class="btn btn-primary">Reserver</a>
                        </td>
                </tr>
            @endforeach
            </tbody>
        </table>

</div>

@endsection