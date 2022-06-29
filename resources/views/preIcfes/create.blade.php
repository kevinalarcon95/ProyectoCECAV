@extends('layouts.template')

@section('content')
<div class="conteiner m-5">
<form method="post" action="{{ url('/admin/savePreicfes')}}" enctype="multipart/form-data">
@csrf
@include('preicfes.form',['modo'=>'Añadir'])
</form>
</div>
@endsection