@extends('vva.profilVVA')
@section('reservation_modification')
    <div class="well">
    <form action="{{route('reservation.modification.valide',['noHebergement'=> $reservation[0]->NOHEB,'date'=> $reservation[0]->DATEDEBSEM])}}" method="post" role="form" class="form-inline">
        {!!csrf_field()!!}
    	<legend>Reservation N°: {{$reservation[0]->NOHEB.' '.'semaine: '.$reservation[0]->DATEDEBSEM}}</legend>
        <div class="row">
    	<div class="form-group">
    		<label for="Etat">Etat</label>
    		<select name="etatresa" id="etatResaID" class="form-control">
                @foreach(\App\Etat_Resa::All() as $etat)
    			    <option value="{{$etat->CODEETATRESA}}"> {{$etat->NOMETATRESA}}</option>
                @endforeach
    		</select>
            <input type="hidden" value="{{$reservation[0]->NOHEB}}" name="noheb">
            <input type="hidden" value="{{$reservation[0]->DATEDEBSEM}}" name="datedebsem">
    	</div>
        <div class="form-group">
            <label for=""> Date Accusée Reception : </label>
            <input type="text" name="dateReception" id="dateReception" placeholder="{{$reservation[0]->DATEACCUSERECEPT}}">
        </div>
        <div class="form-group">
            <label for="">Date Arrhes :</label>
            <input type="text" name="dateArrhes" id="dateArrhes" placeholder="{{$reservation[0]->DATEARRHES}}">
        </div>
        <div class="form-group">
            <label for="">Montant arrhes : </label>
            <input type="text" name="montant" id="montant" placeholder="{{$reservation[0]->MONTANTARRHES}}">
        </div>
        <div class="form-group">
            <label for="">Nombre Occupants : </label>
            <select name="nbPersonne" id="nbPersonne" class="form-control">
            	<option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

        </div>
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <label for="">Prix  : </label>
                <input type="text" name="prix" id="prix" placeholder="{{$reservation[0]->PRIXRESA}}">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-md-offset-5">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Valider</button>
                    </div>
            </div>

        </div>
    </form>
    </div>
@endsection

