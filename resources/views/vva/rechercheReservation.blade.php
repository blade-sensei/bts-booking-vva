@extends('vva.profilVVA')
@section('rechercheReservation')
	<div class="well">

	<form action="{{route('reservation.compte.reservations')}}" method="get" role="form" class="form-inline">
		{!! csrf_field() !!}
		<legend>Recherche Reservations </legend>
		<div class="form-group">
			<label for=""> Nom Hebergement :</label>
			<input type="text" class="form-control" name="nomHebergement" id="nomHebergement" placeholder="Nom">
		</div>
		<div class="form-group">
			<label for=""> Semaine : </label>
			<select name="semaineHebergement" id="nbplacesID" class="form-control select-primary">
				<option value=""></option>

				@foreach(\App\Semaine::getAllSemainesSupDate(date("Y-m-d"))->get() as $semaine)
					<option value="{{$semaine->DATEDEBSEM}}">{{$semaine->DATEDEBSEM}}</option>
				@endforeach

			</select>
		</div>
		<button type="submit" class="btn btn-success">Recherche</button>
	</form>
	</div>
@endsection