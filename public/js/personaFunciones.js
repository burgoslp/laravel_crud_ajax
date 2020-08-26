
let uri="http://localhost/codigo_reutilizable_laravel/crud_con_ajax/public/";

function cargar(){
    let datatable=$('#tablaPersona')
    let route=uri+"persona/listing";
    datatable.empty();
    $.ajax({

        type:"GET",
        url:route,
        success:function(msj){

            msj.forEach(function(clave,valor){
                datatable.append(`  <tr>
                                        <th scope="row">${clave.id}</th>
                                        <td>${clave.nombre}</td>
                                        <td>${clave.apellido}</td>
                                        <td>V-${clave.cedula}</td>
                                        <td>
                                            <button class="btn btn-success" value="${clave.id}" onclick="mostrar(this)">EDITAR</button>
                                            <button id="borrar" class="borrar btn btn-danger" value="${clave.id}" onclick="eliminar(this)">BORRAR</button>
                                        </td>
                                    </tr>    
                                `);
            });
        }
    });

}

function crear(){

    $('form[id="personacreate"]').submit(function(e){

        let datos=$(this).serialize();
    
        $.ajax({
            type:"POST",
            url:uri+"persona",
            dataType:'json',
            data:datos,
            beforeSend:function(){
                
                $('div[class="invalid-feedback"]').empty();
                $('input[type="text"]').removeClass('is-invalid');
            },
            success:function(msj){
    
                $('#personacreate input[type="text"]').val('');
                $('#modalCreatePersona').modal('hide')
                cargar();
            },
            error:function(msj){
    
                let errors=msj.responseJSON.errors;
    
                for (const x in errors) {
                let text=errors[x];
                    $(`input[name="${x}"]`).addClass('is-invalid')
                    $(`#error${x}`).append(text);
    
                }
                $('button[form="personacreate"]').text('Guardar');
    
                
            }
        });
        event.preventDefault();
        })
    
        $('#botoncerrarmodal').on('click', function (e) {
    
            $('div[class="invalid-feedback"]').empty();
            $('#personacreate input[type="text"]').val('');
            $('input[type="text"]').removeClass('is-invalid');
        });
}

function actualizar(){

    $('form[id="personaedit"]').on('submit',function(e){

        let datos=$(this).serialize();
        let token=$('meta[name="csrf-token"]').attr('content')
        let id=$('#personaedit input[name="id"]').val();
        let route=uri+"persona/"+id;

        $.ajax({
            type:"PUT",
            headers: {'X-CSRF-TOKEN': token},
            url:route,
            dataType:'json',
            data:datos,
            beforeSend:function(){
                
                $('div[class="invalid-feedback"]').empty();
                $('input[type="text"]').removeClass('is-invalid');
            },  
            success:function(msj){
    
                $('#modalEditPersona').modal(   'hide')
                cargar();
            },
            error:function(msj){
    
                let errors=msj.responseJSON.errors;
    
                for (const x in errors) {
                    let text=errors[x];
                    $(`input[name="${x}"]`).addClass('is-invalid')
                    $(`#erroredit${x}`).append(text);
    
                }
            }
        });
        event.preventDefault();
    })
}

function mostrar(btn){

    let route=uri+"persona/"+btn.value+"/edit";

    $.get( route, function(data) {
        
        $('#personaedit input[name="id"]').val(data.id);
        $('#personaedit input[name="nombre"]').val(data.nombre);
        $('#personaedit input[name="apellido"]').val(data.apellido);
        $('#personaedit input[name="cedula"]').val(data.cedula);
        $('#modalEditPersona').modal('show');
    });
    
}

function busqueda(){

    $('form[id="form-busqueda"]').on('submit',function(e){

            let datos=$(this).serialize(),
            route=uri+"persona/busqueda",
            token=$('meta[name="csrf-token"]').attr('content'),
            datatable=$('#tablaPersona');


        $.ajax({
            type:"POST",
            headers: {'X-CSRF-TOKEN': token},
            url:route,
            dataType:'json',
            data:datos, 
            success:function(obj){
                datatable.empty()
                var obj=obj;
                $.each(obj, function(index,clave ){
                    datatable.append(`  <tr>
                                        <th scope="row">${clave.id}</th>
                                        <td>${clave.nombre}</td>
                                        <td>${clave.apellido}</td>
                                        <td>V-${clave.cedula}</td>
                                        <td>
                                            <button class="btn btn-success" value="${clave.id}" onclick="mostrar(this)">EDITAR</button>
                                            <button id="borrar" class="borrar btn btn-danger" value="${clave.id}" onclick="eliminar(this)">BORRAR</button>
                                        </td>
                                    </tr>    
                                `);
                })
            }
        });
    event.preventDefault();
    })

}

function eliminar(btn){

let route=uri+"persona/"+btn.value;
let token=$('meta[name="csrf-token"]').attr('content')


$.ajax({

    type:"DELETE",
    url:route,
    headers: {'X-CSRF-TOKEN': token},
    dataType:'json',
    success:function(msj){

        cargar()
    }
})


}