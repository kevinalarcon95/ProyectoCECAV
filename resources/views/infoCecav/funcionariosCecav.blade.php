@if($objDirectora != null)
<div class="col-12 text-center">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{$objDirectora->nombre}}</h5>
            <h6 class="card-subtitle text-muted">Cargo: Directora</h6>
            <p class="card-text" style="font-size: 15px;">
                <strong>Correo:</strong> {{$objDirectora->correo}}.
                <br>
                <strong>Tel.</strong> {{$objDirectora->telefono}} <strong>Ext.</strong> {{$objDirectora->extension}}.
            </p>
        </div>
    </div>
</div>
@endif
@if($objFuncionario != null)
@foreach($objFuncionario as $objFuncionario)
@if($objFuncionario->cargo != 'DIRECTORA')
<div class="col-4 text-center">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{$objFuncionario->nombre}}</h5>
            <p class="card-text" style="font-size: 15px;">
                <strong>Correo:</strong> {{$objFuncionario->correo}}.
                <br>
                <strong>Tel.</strong> {{$objFuncionario->telefono}} <strong>Ext.</strong> {{$objFuncionario->extension}}.
            </p>
        </div>
    </div>
</div>
@endif
@endforeach
@endif
</div>
<style>
    .card {
        border: none;

    }
</style>