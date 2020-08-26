@extends('../layouts.persona')
@include('personas.partials.formcreate')
@include('personas.partials.formedit')
@section('contenido')
<div class="col-12">
   
    <div class="row">
        <div class="col-4 mb-3">
            @include('personas.partials.formbusqueda')
        </div>
        <div class="col-12">
            <table class="table" >
                <thead class="thead-dark">
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">cedula</th>
                        <th scope="col">Acción</th>
                        </tr>
                </thead>
                <tbody id="tablaPersona">
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$().ready(function(){
    cargar();
    crear();
    actualizar();
    busqueda();
})
</script>
@endsection