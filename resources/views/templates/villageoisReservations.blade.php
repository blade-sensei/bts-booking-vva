@extends('villageois.profilVillageois')
@section('reservations')
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"> Reservations </h3>
    </div>

    <table class="table table-bordered table-hover">
        <thead>
        <tr>

            <th> N° Hebergement </th>
            <th> Etat </th>
            <th> Date Debut</th>
            <th> Date Fin </th>
            <th> Nombre de Personnes</th>
            <th> Prix </th>
        </tr>
        </thead>
        <tbody>
        @forelse($reservations as $resa)
            <tr>
                <td>{{$resa->NOHEB}}</td>
                <td>{{$resa->NOMETATRESA}}</td>
                <td>{{$resa->DATEDEBSEM}}</td>
                <td>{{$resa->DATEFINSEM}}</td>
                <td>{{$resa->NBOCCUPANT}}</td>
                <td>{{$resa->PRIXRESA}}</td>
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