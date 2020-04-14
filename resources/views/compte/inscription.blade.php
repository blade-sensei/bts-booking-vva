@extends('index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Inscription</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Problème de saisie.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{route('compte.register')}}">
                            {!! csrf_field() !!}
                            <label for=""> Champs Obligatoires (*)</label>
                            <div class="form-group">
                                <label class="col-md-4"for=""> Nom d'utilisateur *</label>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="nomUtilisateur" id="nomutilisateur" placeholder="Nom user">
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-4" for=""> Mot de passe *</label>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="motDePasse" id="motdepasse" placeholder=" Mot de passe">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4" for=""> Votre Nom *</label>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4" for=""> Votre Prénom *</label>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4" for=""> Adresse mail</label>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="mail" id="mail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4" for=""> Téléphone</label>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Téléphone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4" for=""> Portable</label>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="portable" id="portable" placeholder="Portable">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">Valider</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
