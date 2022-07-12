@extends('layouts.template')

@section('content')
<div class="conteiner m-5">
<form  class="row g-3 needs-validation" method="post" action="{{ url('/admin/savePreicfes')}}" enctype="multipart/form-data" novalidate>
@csrf
@include('preicfes.form',['modo'=>'Añadir'])
</form>
</div>
@endsection