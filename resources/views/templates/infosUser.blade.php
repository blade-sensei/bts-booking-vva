<div class="panel panel-primary">
    <div class="panel-heading">
        <h2 class="panel-title"> Information Utilisateur </h2>

    </div>
    <div class="panel-body">
        {{--<ul>--}}
            {{--<li class="items1"> <strong>Nom :</strong>{{auth()->user()->NOMCOMPTE}}</li>--}}
            {{--<li class="items2"> <strong>Prenom:</strong>{{auth()->user()->PRENOMCOMPTE}} </li>--}}
            {{--<li class="items3"> <strong>Type Compte: </strong>{{auth()->user()->TYPECOMPTE}}</li>--}}
            {{--<li class="items4"> <strong>Inscription : </strong>{{auth()->user()->DATEINSCRIP}}</li>--}}
        {{--</ul>--}}
        <ul>
            <li class="items1"> <strong>Nom :</strong>{{auth()->user()->NOMCOMPTE}}</li>
            <li class="items2"> <strong>Prenom:</strong>{{auth()->user()->PRENOMCOMPTE}} </li>
            <li class="items3"> <strong>Type Compte: </strong>{{auth()->user()->TYPECOMPTE}}</li>
            <li class="items4"> <strong>Inscription : </strong>{{auth()->user()->DATEINSCRIP}}</li>
        </ul>
    </div>
</div>