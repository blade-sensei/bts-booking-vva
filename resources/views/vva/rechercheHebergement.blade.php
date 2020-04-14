@extends('vva.profilVVA')
@section('rechercheHebergement')
    <div class="well">

        <form action="{{route('vva_liste_hebergement')}}" method="get" role="form" class="form-inline">
            {!! csrf_field() !!}
            <legend>Recherche Hebergement </legend>
            <div class="form-group">
                <label for="nomID"> Nom </label>
                <input type="text" name="nomhebergement" id="nomID" class="form-control" placeholder="nom hebergement">
                
            </div>
            <div class="form-group">
                <label for="typebergementID">Type Hebergement</label>
               <select name="typehebergement" id="typebergementID" class="form-control">
                   <option ></option>
                   <option value="maison">maison</option>
                   <option value="gite">gite</option>
                   <option value="hotel">hotel</option>

               </select>
            </div>
            <div class="form-group">
                <label for="nbplacesID">Nombre Places</label>
                <select name="nbplace" id="nbplacesID" class="form-control">

                    <option ></option>
                	<option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
            </div>
            <div class="form-group">
                <label for="surfaceID"></label>
                <input type="text" name="surfacehebergement" id="surfaceID" class="form-control" placeholder="surface">
                
            </div>
            <button type="submit" class="btn btn-success">Recherche</button>
        </form>
    </div>
@endsection