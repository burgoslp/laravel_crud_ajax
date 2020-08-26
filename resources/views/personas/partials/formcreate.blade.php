<div class="modal fade" id="modalCreatePersona" tabindex="-1" role="dialog" aria-labelledby="modalCreatePersona" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Crear Persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="personacreate" action="" method="POST" >
          {{csrf_field()}}
          <div class="form-group">
              <label for="textInputName">Nombre:</label>
              <input type="text" name="nombre" class="form-control" placeholder="" >
              <div class="invalid-feedback" id="errornombre"></div>
          </div>
          <div class="form-group">
              <label for="textInputLastname">Apellido:</label>
              <input type="text" name="apellido" class="form-control" placeholder="" >
              <div class="invalid-feedback" id="errorapellido"></div>
          </div>
          <div class="form-group">
              <label for="textInputDni">cedula:</label>
              <input type="text" name="cedula" class="form-control" placeholder="">
              <div class="invalid-feedback" id="errorcedula"></div>
          </div>
         

        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" form="personacreate" >Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="botoncerrarmodal">Cerrar</button>
      </div>
    </div>
  </div>
</div>