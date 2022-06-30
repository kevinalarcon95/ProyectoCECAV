@extends('layouts.template')

@section('content')
<div class="conteiner m-5">
    <form action="{{ url('/admin/updatePreicfes/'.$preicfes->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH')}}
        @include('preicfes.form',['modo'=>'Editar'])
    </form>
</div>
@endsection