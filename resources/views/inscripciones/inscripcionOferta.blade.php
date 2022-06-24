@extends('layouts.template')

@section('content')
<!--Formulario inscripcion oferta-->

<div class="row mb-4">
    <div class="row text-center mt-5 mb-3">
        <h3 class="fw-bold">FORMULARIO DE INSCRIPCIÓN EN LINEA</h3>
    </div>
</div>
<div class="row mx-5">
    <label class="form-label fw-bold">Seleccione el evento al cual se quiere inscribir</label>
    <select class="form-select" style="background-color: #ececec;">
        @foreach($allOfertas as $key => $value)
            <option selected disabled value="{{$objOferta->id}}">{{$objOferta->nombre}}</option>
          @if($value->nombre != $objOferta->nombre)
            <option value="{{$key}}">{{$value->nombre}}</option>
          @endif
        @endforeach
    </select>
</div>
<div class="row mt-3 mx-5">
    <label class="form-label">Por favor escribir los nombres completos en mayúsculas y sin tildes, esté requisito es fundamental para la expedición del recibo de pago.</label>
</div>
<div class="row">
    <div class="col">

    </div>
    <div class="col">

    </div>
</div>



<!--{{$user=Auth::user()->numIdentificacion}} fin formulario-->
@endsection