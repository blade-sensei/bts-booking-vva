@extends('index')
@section('content')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Connexion</div>
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

                        <form class="form-horizontal" role="form" method="POST" action="{{route('compte.login')}}">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label class="col-md-4"for=""> Nom d'utilisateur </label>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="nomUtilisateur" id="nomutilisateur" placeholder="Nom user">
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-4" for=""> Mot de passe </label>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="motDePasse" id="motdepasse" placeholder=" Mot de passe">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-success"> Login </button>
                                </div>

                            </div>
                        </form>
                            <div class="row">


                            <form action="{{route('compte.register')}}" method="GET">
                                <div class="form-group">
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary"> Créer compte </button>
                                    </div>
                                </div>
                            </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
