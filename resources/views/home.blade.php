@extends('index')
@section('content')
 <div class="home">
  <div class="row">
    <div class="present">
      <h1>Passez un séjour chez VVA Village Vacances</h1>
    </div>
   </div>
 <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 barreRecherche">
   @include('templates.barreRecherche')
  </div>
 </div>
 </div>
@endsection