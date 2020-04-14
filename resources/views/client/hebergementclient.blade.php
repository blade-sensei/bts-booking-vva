@extends('index')
@section('content')
   <div class="row">

       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
       	    @include('templates.barreRecherche')

       </div>
   </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        	@if(count($hebergements)>0)
                @include('templates.barreFiltres')
            @endif
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

            	@forelse($hebergements as $hebergement)
                    <article class="row thumbnail">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-4">

                            <img src="{{url('images').'/'.$hebergement->PHOTOHEB}}" class="img-rounded pull-sm-left img-fluid" alt="...">

                        </div>
                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-3">

                            <h1>{{$hebergement->NOMHEB}}</h1>
                            <p>{{$hebergement->SECTEURHEB}}</p>
                            <li>{{$hebergement->NBPLACEHEB}} Places</li>
                            <li>orientation {{$hebergement->ORIENTATIONHEB}}</li>
                            @if($hebergement->INTERNET = 1)
                                <li>Internet</li>
                            @endif
                        </div>


                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 col-lg-offset-1">

                            <div class="control verticalLine">
                                <h3>{{$hebergement->PRIXHEB}}€/semaine</h3>
                            </div>
                            <a class="btn btn-success btn-lg "href="{{url('/hebergement/details/'.$hebergement->NOHEB)}}"> Details</a>
                        </div>

                    </article>
                @empty
                    <div class="well">
                         <h4>Aucun hébergement  correspond à ces critères</h4>
                    </div>

                    @endforelse
                <div class="row">
                    {{--{!! $hebergements->render() !!}--}}
                </div>

            </div>
        </div>

    </div>
@endsection
