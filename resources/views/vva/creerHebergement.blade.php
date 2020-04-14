@extends('vva.profilVVA')
@section('creation')

    <div class="row">
        <div class="col-xs-8 col-sm-12 col-md-11 col-lg-12">
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
            <div class="well">
            <form action="{{route('creerHebergementPost')}}" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <legend>Création Hebergement</legend>
            <div class="form-group">
                <label for="">(*) Champs Obligatoires</label>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <label for="typeID">Type Hebergement * : </label>
                        <select name="typehebergement" id="typeID" class="form-control">
                            @foreach(\App\Type_Heb::all() as $type)
                                <option value="{{$type->CODETYPEHEB}}">{{$type->NOMTYPEHEB}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <label for="nomID"> Nom Hebergement *</label>
                        <input type="text" class="form-control" name="nomhebergement" id="nomID" placeholder="nom Hebergement">
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <label for="nbplaceID"> Nombre de places * </label>
                        <input type="text" class="form-control" name="placehebergement" id="nbplaceID" placeholder="Nombre Places">
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <label for="surfaceID">Surface (m2) </label>
                            <input type="text" class="form-control" name="surfacehebergement" id="surfaceID" placeholder="Surface">
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <label for="internetID"> Internet </label>
                            <select name="internethebergement" id="internetID" class="form-control">
                                <option value="1"> Oui </option>
                                <option value="2">Non</option>
                            </select>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <label for="anneeID">Année</label>
                            <input type="text" class="form-control" name="anneehebergement" id="anneeID" placeholder="">

                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <label for="secteurID">Secteur</label>
                            <select name="secteurhebergement" id="secteurID" class="form-control">
                                {{--@foreach(\App\Hebergement::getSecteurs()->get() as $secteur)--}}
                                {{--<option value="{{$secteur->SECTEURHEB}}">{{$secteur->SECTEURHEB}}</option>--}}
                                {{--@endforeach--}}

                                <option value="secteur 1">Secteur 1</option>
                                <option value="secteur 2">Secteur 2</option>
                                <option value="secteur 3">Secteur 3</option>
                            </select>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <label for="orientationID">Orientation</label>
                            <select name="orientationhebergement" id="orientationID" class="form-control">
                                <option value="sud">sud</option>
                                <option value="nord">nord</option>
                                <option value="est">est</option>
                                <option value="ouest">ouest</option>

                            </select>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <label for="prixID">Tarif * </label>
                            <input type="text" class="form-control" name="tarifhebergement" id="prixID">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <label for="etatID">Etat</label>
                            <select name="etathebergement" id="etatID" class="form-control">
                                <option value="valide">disponible</option>
                                <option value="travaux">travaux</option>
                            </select>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <label for="imageID"> Photo </label>
                            <input type="file" class="form-control" id="imageID" name="photohebergement">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-9 col-lg-9">
                            <label for="descriptID">Descriptif</label>
                            <textarea name ="descripthebergement" class="form-control" rows="10" cols="40" id="descriptID"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-offset-4">

                                <button type="submit" class="btn btn-success">Valider</button>
                        </div>
                    </div>
                </div>
        </form>

    </div>
        </div>
</div>
@endsection