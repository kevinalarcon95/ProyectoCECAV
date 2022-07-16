@if($objDirectora != null && $objFuncionario != null)
<div class="col-12 text-center">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{$objDirectora->nombre}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Cargo: Directora</h6>
            <p class="card-text">
                <strong>Tel.</strong> {{$objDirectora->telefono}} <strong>Ext.</strong> {{$objDirectora->extension}}.
                <br>
                <strong>Correo:</strong> {{$objDirectora->correo}}.
            </p>
        </div>
    </div>
</div>

@foreach($objFuncionario as $objFuncionario)
@if($objFuncionario->cargo != 'DIRECTORA')
<div class="col-4 text-center">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{$objFuncionario->nombre}}</h5>
            <p class="card-text" style="font-size: 17px;">
                <strong>Tel.</strong> {{$objFuncionario->telefono}} <strong>Ext.</strong> {{$objFuncionario->extension}}.
                <br>
                <strong>Correo:</strong> {{$objFuncionario->correo}}.
            </p>
        </div>
    </div>
</div>
@endif
@endforeach
</div>
@endif
<style>
    .card{
        border:none;

    }
</style>