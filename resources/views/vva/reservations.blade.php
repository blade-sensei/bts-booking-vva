@extends('vva.profilVVA')
@section('reservations')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"> Reservations </h3>
        </div>

        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th> N° Hebergement </th>
                <th> Date Debut</th>
                <th> Villageois N°</th>
                <th> Nom Heb</th>
                <th> Etat </th>
                <th> Date Resa</th>
                <th> Date Reception </th>
                <th> Date Arrhes</th>
                <th> Montant Arrhes</th>
                <th> Personnes </th>
                <th> Prix </th>
                <th> Actions </th>
            </tr>
            </thead>
            <tbody>
            @forelse($reservations as $resa)
                <tr>

                        <td>
                            <label for="">{{$resa->NOHEB}}</label>
                        </td>
                        <td>
                            <label for="">{{$resa->DATEDEBSEM}}</label>

                        </td>
                    <td>
                        <label for="">{{$resa->NOVILLAGEOIS}}</label>
                    </td>
                        
                        <td>
                            <label for="">{{$resa->NOMHEB}}</label>

                        </td>
                        <td>
                            <label for="">{{$resa->NOMETATRESA}}</label>

                        </td>
                        <td>
                            <label for="">{{$resa->DATERESA}}</label>
                        </td>
                        <td>
                            <label for="">{{$resa->DATEACCUSERECEPT}}</label>
                        </td>
                        <td>
                            <label for="">{{$resa->DATEARRHES}}</label>
                        </td>
                        <td>
                            <label for="">{{$resa->MONTANTARRHES}}</label>
                        </td>
                        <td>
                            <label for="">{{$resa->NBOCCUPANT}}</label>
                        </td>
                        <td>
                            <label for="">{{$resa->PRIXRESA}}</label>
                        </td>

                            @if(auth()->user()->TYPECOMPTE == 'vva')
                                @if($resa->DATEFINSEM != null && $resa->CODEETATRESA == '1')
                                <td>
                                    <a href="{{route('reservation.modification.vva',
                                    ['noHebergement' => $resa->NOHEB,
                                    'date'=> $resa->DATEDEBSEM]
                                    )}}" class="btn btn-primary">Modifier</a>

                                </td>
                                @else
                                    <td>
                                        <span class="label label-primary"> Non Modifiable</span>
                                    </td>
                                @endif
                            @endif
                </tr>

            @empty
                <tr>
                    <td> Aucune Reservation </td>
                </tr>
            @endforelse
            </tbody>
        </table>

    </div>
@endsection