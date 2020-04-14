	<nav class="navbar navbar-default navbar-fixed-top sep" role="navigation">
		<div class = "navbar-header">
			<button type = "button" class = "navbar-toggle"
					data-toggle = "collapse" data-target = "#example-navbar-collapse">
				<span class = "sr-only">Toggle navigation</span>
				<span class = "icon-bar"></span>
				<span class = "icon-bar"></span>
				<span class = "icon-bar"></span>
			</button>

			<a class = "navbar-brand" href = "{{route('home')}}">Home</a>
		</div>

		<div class = "collapse navbar-collapse" id = "example-navbar-collapse">

			<ul class = "nav navbar-nav">
				<li class = "active"><a href = "{{route('rechercheHebergement')}}">Hebergements</a></li>
				<li><a href = "#">Le Village</a></li>

			</ul>
			<ul class="nav navbar-nav navbar-right">
				@if(auth()->check())
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Utilisateur: {{ auth()->user()->NOMCOMPTE }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{route('compte.logout')}}"> Déconnecter </a></li>
							@if(auth()->user()->TYPECOMPE == 'vil')
								<li><a href="{{route('compte.profil')}}"> Profil </a></li>
							@else
								<li><a href="{{route('compte.profil')}}"> Profil </a></li>
							@endif
						</ul>
					</li>
				@else
					<li>
						<a href="{{route('compte.login')}}"> Connexion </a>
					</li>
				@endif
			</ul>
		</div>

  </nav>

