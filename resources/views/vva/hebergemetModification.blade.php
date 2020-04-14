@extends('vva.profilVVA')
@section('hebergement_modification')
    <div class="well">
            <form action="{{route('hebergement_update')}}" method="post" role="form" class="form-horizontal">
                {!!csrf_field()!!}
                <legend>Hebergement N°: {{$hebergement[0]->NOHEB}}</legend>
                <input type="hidden" name="noheb"value="{{$hebergement[0]->NOHEB}}">
                    <div class="form-group">
                        <label for="">(*) Champs Obligatoires</label>
                        <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <label for="typehebID">Type Hébergement</label>
                                <select name="typehebergement" id="typehebID" class="form-control">
                                    @foreach(\App\Type_Heb::all() as $type)
                                        <option value="{{$type->CODETYPEHEB}}">{{$type->NOMTYPEHEB}}</option>
                                        @endforeach
                                </select>
                            </div>

                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <label for="nomhebergementID"> Nom * : </label>
                                <input class="form-control" type="text" name="nomhebergement" id="nomhebergementID" value="{{$hebergement[0]->NOMHEB}}">
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <label for="surfaceID"> Surface :</label>
                                <input class="form-control" type="text" name="surfacehebergement" id="surfaceID" value="{{old('surfacehebergement',$hebergement[0]->SURFACEHEB)}}">
                            </div>
                        </div>
                    </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-3">
                            <label for="etatID"> Etat  : </label>
                            <select name="etathebergement" id="etatID" class="form-control">
                                <option value="{{$hebergement[0]->ETATHEB}}">{{$hebergement[0]->ETATHEB}}</option>
                                <option value="dispoible">disponible</option>
                                <option value="valide">valide</option>
                                <option value="travaux">travaux</option>
                            </select>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-3">
                            <label for="secteurID"> Secteur  : </label>
                            <select name="secteurhebergement" id="secteurID" class="form-control">
                                <option value="secteur1">secteur1</option>
                                <option value="secteur2">secteur2</option>
                                <option value="secteur3">secteur3</option>
                                <option value="secteur4">secteur4</option>
                                <option value="secteur5">secteur5</option>

                            </select>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <label for="orientationID"> Orientation  : </label>
                            <select name="orientationhebergement" id="orientationID" class="form-control">
                                <option value="nord">nord</option>
                                <option value="sud">sud</option>
                                <option value="est">est</option>
                                <option value="ouest">ouest</option>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <label for="nbplaceID"> Nombre de places * </label>
                            <input type="text" class="form-control" name="placehebergement" id="nbplaceID" placeholder="Nombre Places"
                                   value="{{$hebergement[0]->NBPLACEHEB}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <label for="descriptID">Commentaire : </label>
                    	 <textarea name="descripthebergement" rows="10" cols="60" id="descriptID" class="form-control">{{$hebergement[0]->DESCRIHEB}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <legend> Changement de prix </legend>
                    <div class="row">
                        <div class="col-xs-5 col-sm-3 col-md-3 col-lg-3">
                            <label for="prixID">Tarif</label><i> (Saison en cours)</i>
                            @if($tarif == NULL)
                                <input type="text" name="prixHebergement" id="prixID" class="form-control" value="" title="" >
                            @else
                                <input type="text" name="prixHebergement" id="prixID" class="form-control" value="{{$tarif->PRIXHEB}}" title="" >
                            @endif
                        </div>
                    </div>
                    {{--<div class="row">--}}
                        {{--<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">--}}
                            {{--<label for="tarif">Ajouter tarif saison en cours</label>--}}
                            {{--<input type="text" name="newtarif" id="tarif" class="form-control">--}}
                        {{--</div>--}}
                    {{--</div>--}}
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

